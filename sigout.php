<?php 
session_start();
unset($_SESSION['id']);
unset($_SESSION['username']);
setcookie('remember', null ,-1);
header('Location:login.php');