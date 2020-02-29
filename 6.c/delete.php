<?php
include_once 'config/database.php'; 
$id = $_POST['product_id'];

$mysql = "DELETE * FROM product WHERE id = $id";
$query = mysqli_query($conn,$sql);

if ($query) {
	header("Location: index.php");
}else {
	die(mysqli_error($conn));

 ?>