<?php include "db_connect.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe Arkademy</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
          <img src="assets/images/logo.png" width="70" height="35" alt="">
        </a>
        <form class="form-inline mr-auto">
            <input class="form-control" type="search" placeholder="Search" name="search">
        </form>
        <button class="btn btn-primary my-2 my-sm-0" data-toggle="modal" data-target="#addModal">Add</button>
      </nav>
      <div class="container mt-5">
          <div class="row">
              <div class="col-lg-12">
                <table class="table">
                    <thead class="thead">
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Cashier</th>
                        <th scope="col">Product</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT product.id as id,cashier.name as cashier, product.name as product, category.name as category,price FROM product INNER JOIN category ON category.id=product.id_category INNER JOIN cashier ON cashier.id=product.id_cashier;";
                            $result = mysqli_query($conn, $sql);
                            $i = 1;
                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {?>
                                <tr>
                                    <td><?php echo $i++;?></td>
                                    <td><?php echo $row['cashier']?></td>
                                    <td><?php echo $row['product']?></td>
                                    <td><?php echo $row['category']?></td>
                                    <td><?php echo $row['price']?></td>
                                    <td>
                                        <a class="btn btn-success mr-2 btn-sm edit_product" id="<?php echo $row['id']?>" role="button"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger mr-2 btn-sm" href="delete_product.php?id=<?php echo $row['id']?>"  role="button"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <?php
                                }
                            }else {
                                echo "0 results";
                            }
                        ?>
                    </tbody>
                  </table>
              </div>
          </div>
      </div>
    
    <!-- Modal Add -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">Add</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="create_product.php" method="post">
                    <div class="form-group">
                        <select class="form-control" name="cashier">
                            <option>Select Cashier</option>
                            <?php    
                                $result = mysqli_query($conn,"SELECT * FROM cashie");
                                if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_array($result)) {?>
                                    <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="category">
                            <option>Select Category</option>
                            <?php    
                                $result = mysqli_query($conn,"SELECT * FROM category");
                                if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_array($result)) {?>
                                    <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="product" placeholder="Product">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="price" placeholder="Price">
                    </div>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
        </div>
        </div>
    </div>
    
    <!-- Modal Edit -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="update_product.php" method="post" id="update_product">
                <input type="hidden" name="id">
                <fieldset disabled>
                    <div class="form-group">
                        <select class="form-control" id="cashier">
                            <option value="1">Pevita Pearce</option>
                            <option value="2">Raisa Andriana</option>
                            <option value="3">Hari Pranata</option>
                        </select>
                    </div>
                </fieldset>
                    <div class="form-group">
                        <select class="form-control" name="category">
                            <option value="1">Food</option>
                            <option value="2">Drink</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="product" id="product" placeholder="Product">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="price" id="price" placeholder="Price">
                    </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary">Edit</button>
            </div>
            </form>
        </div>
        </div>
    </div>
    <script>  
        $(document).ready(function(){  
            $(document).on('click', '.edit_product', function(){  
                var id = $(this).attr("id");  
                $.ajax({  
                        url:"fetch_product.php",  
                        method:"POST",  
                        data:{id: id},  
                        dataType:"json",
                        success:function(data){  
                            $('#id').val(data.id);  
                            $('#product').val(data.name);  
                            $('#price').val(data.price);  
                            $('#category').val(data.id_category);  
                            $('#cashier').val(data.id_cashier);   
                            $('#editModal').modal('show');  
                        }  
                });  
            });  
            $('#update_product').on("submit", function(event){  
                $.ajax({  
                    url:"update_data.php",  
                    method:"POST",  
                    data:$('#insert_form').serialize(),   
                    success:function(data){  
                        $('#editModal').modal('hide');    
                    }  
                });  
            });  
        });
    </script>

    <!-- Modal Delete -->
    <div class="modal fade delete-modal-sm" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content d-flex justify-content-center align-items-center">
                <h3 class="mt-4">Data <span id="cashierName"></span> ID <span id="cashierId"></span></h3>
                <img class="mt-3 mb-3" src="assets/images/checked.png" alt="checked" width="75" height="75">
                <h3 class="mb-4">Berhasil Dihapus!</h3>
            </div>
        </div>
      </div>
    <!-- <script src="assets/jquery-3.4.1.slim.min.js"></script> -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>