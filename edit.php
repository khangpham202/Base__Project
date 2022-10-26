<?php 
require 'connect.php';
$hoten = $_POST['hoten'];
$quequan = $_POST['quequan'];
$ngaysinh = $_POST['ngaysinh'];
$tongiao = $_POST['tongiao'];
$manv = $_POST['manv'];

$sql = "UPDATE nhan_vien
SET hoten = '$hoten', quequan = '$quequan', ngaysinh= '$ngaysinh', tongiao= '$tongiao' 
WHERE manv = '$manv'";
// die($sql);
$result= mysqli_query($connect,$sql);
header('location:profile.php');
?>