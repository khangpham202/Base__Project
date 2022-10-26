<?php 
require 'connect.php';
if(isset($_POST['remember'])){
    $remember = true;
}else{
    $remember = false;
}
$username = $_POST['username'];
$password = $_POST['password'];
$sql ="select * from admin where username = '$username' and password = '$password'";
// die($sql);
$rows = mysqli_query($connect,$sql);
// die($row);
$count = mysqli_num_rows($rows);
if($count==1){
    session_start();
    $each = mysqli_fetch_array($rows);
    $_SESSION['id']= $each['id'];
    $_SESSION['username']= $each['username'];
    if($remember){
        setcookie('remember',$each['id'],time()+60*60*24*24);
    }
    echo "<script>alert('You are successfully Logged in');</script>";
    echo "<script>location.href='/employee.php';</script>";
    exit;
   
}else{
    echo "<script>location.href='/login.php?error=Đăng nhập thất bại';</script>";
}
