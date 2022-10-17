<?php 
require 'connect.php';
$username = $_POST['username1'];
$password = $_POST['password1'];
$rows = mysqli_query($connect,"insert into user (username,password) values ('$username', '$password')",);
echo "<script>alert('You are successfully Logged in');</script>";
echo "<script>location.href='/employee.html';</script>";
