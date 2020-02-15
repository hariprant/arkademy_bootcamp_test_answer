<?php   
    include 'db_connect.php';

    if(isset($_POST["id"])){  
        $id = $_POST['id'];
        $query = "SELECT product.id as id,cashier.id as id_cashier,category.id as id_category,cashier.name as cashier, product.name as product, category.name as category,price FROM product INNER JOIN category ON category.id=product.id_category INNER JOIN cashier ON cashier.id=product.id_cashier WHERE product.id='".$id."'";
        // $query = "SELECT * FROM product WHERE id = '".$_POST["id"]."'";  
        $result = mysqli_query($conn, $query);  
        $row = mysqli_fetch_array($result);
        session_start();
        echo json_encode($row);  
    }  