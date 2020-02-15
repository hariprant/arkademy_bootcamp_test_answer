<?php
include 'db_connect.php';

$id = $_POST['id'];
$cashier = $_POST['cashier'];
$category = $_POST['category'];
$product = $_POST['product'];
$price = $_POST['price'];

$sql = "UPDATE product SET id='$id_produk', nama_produk='$nama_produk', warna='$warna', jumlah='$jumlah', id_merk='$id_merk', id_kategori='$id_kategori' WHERE id_produk=$id_produk";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();