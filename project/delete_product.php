<?php   
    include 'db_connect.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $sql = "DELETE FROM product WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "$('#delete-modal-sm').modal('show');";
    }