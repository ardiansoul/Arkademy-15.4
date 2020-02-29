<?php
include_once 'config/database.php'; 
$id = $_POST['product_id'];
$cashier_id = $_POST['cashier_id'];
$category_id = $_POST['category_id'];
$product_name = $_POST['name'];
$price = $_POST['price'];

$mysql = "UPDATE product SET cashier_id=$cashier_id category_id = $category_id, product_name = $product_name price = $price WHERE id = $id";
$query = mysqli_query($conn,$sql);

if ($query) {
	header("Location: index.php");
}else {
	die(mysqli_error($conn));

 ?>