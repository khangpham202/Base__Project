<?php 
$hoten = $_POST['hoten'];
require 'connect.php';
$sql = "INSERT INTO nhan_vien (hoten)
VALUES ('$hoten')";
$result = mysqli_query($connect,$sql);
header("location: employee.php");
?>