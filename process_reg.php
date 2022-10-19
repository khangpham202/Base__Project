<?php 
require 'connect.php';
$username = $_POST['username1'];
$password = $_POST['password1'];

$sql = "select  count(*) from user where username ='$username' ";
$result = mysqli_query($connect,$sql);
$number_rows = mysqli_fetch_array($result)['count(*)'];
// echo $row_num;
// die();
if($number_rows==1){
    header('location:login.php?error=Tên đã tồn tại');
    exit; 
}else{
   
      $rows = mysqli_query($connect,"insert into user (username,password) values ('$username', '$password')",);
      $sql = "select id from user where username = '$username'";
      $result = mysqli_query($connect,$sql);
      $id = mysqli_fetch_array($result)['id'];
      session_start();
      $_SESSION['id'] = $id;
      $_SESSION['username'] = $username;
    echo "<script>alert('You are successfully Logged in');</script>";
    echo "<script>location.href='/employee.php';</script>";
}

