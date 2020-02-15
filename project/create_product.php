<?php
include 'db_connect.php';

    $cashier = $_POST['cashier'];
    $category = $_POST['category'];
    $product = $_POST['product'];
    $price = $_POST['price'];

    $sql = "INSERT INTO product (name,price,id_category,id_cashier)
    VALUES ('$product','$price','$category','$cashier')";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);