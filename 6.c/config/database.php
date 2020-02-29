<?php 
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test_pos_app';

$conn = mysqli_connect($host,$username,$password);
mysqli_select_db($conn,$dbname);
?>