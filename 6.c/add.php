<?php
include_once 'config/database.php'; 
$cashier_id = $_POST['cashier_id'];
$category_id = $_POST['category_id'];
$product_name = $_POST['name'];
$price = $_POST['price'];

$sql = "INSERT INTO product (product_name,id_cashier,id_category, price) VALUES ('$product_name','$cashier_id','$category_id','$price')";
$query = mysqli_query($conn,$sql);

if ($query) {
	header("Location: index.php");
} else {
	die(mysqli_error($conn));
} ?>
