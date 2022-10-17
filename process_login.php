<?php 
require 'connect.php';
$username = $_POST['username'];
$password = $_POST['password'];
$rows = mysqli_query($connect,"select * from user where username = '$username' and password = '$password'");
$count = mysqli_num_rows($rows);
if($count==1){
    echo "<script>alert('You are successfully Logged in');</script>";
    echo "<script>location.href='/employee.html';</script>";
}else{
    echo "<script>alert('wrong answer');</script>";
    echo "<script>location.href='/login.php';</script>";

}
