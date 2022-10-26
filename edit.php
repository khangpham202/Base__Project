<?php 
require 'connect.php';
if(isset($_POST['hoten'])&& isset($_POST['quequan'])&& isset($_POST['ngaysinh'])&& isset($_POST['tongiao'])&& isset($_POST['manv'])){
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
}
if(isset($_POST['cccd'])&& isset($_POST['ngaycapcccd'])&& isset($_POST['ngayhethancccd'])&& isset($_POST['manv'])){
    $cccd = $_POST['cccd'];
    $ngaycapcccd = $_POST['ngaycapcccd'];
    $ngayhethancccd = $_POST['ngayhethancccd'];
    $manv = $_POST['manv'];
    
    $sql = "UPDATE nhan_vien
    SET cccd = '$cccd', ngaycapcccd = '$ngaycapcccd', ngayhethancccd= '$ngayhethancccd' 
    WHERE manv = '$manv'";
    // die($sql);
    $result= mysqli_query($connect,$sql);
    header('location:profile.php');
}
if(isset($_POST['sobhyte'])&& isset($_POST['noicapbhyte'])&& isset($_POST['ngaycapbhyte'])&& isset($_POST['ngayhethanbhyte'])&& isset($_POST['manv'])){
    $sobhyte = $_POST['sobhyte'];
    $noicapbhyte = $_POST['noicapbhyte'];
    $ngaycapbhyte = $_POST['ngaycapbhyte'];
    $ngayhethanbhyte = $_POST['ngayhethanbhyte'];
    $manv = $_POST['manv'];
    
    $sql = "UPDATE nhan_vien
    SET sobhyte = '$sobhyte', noicapbhyte = '$noicapbhyte', ngaycapbhyte= '$ngaycapbhyte',ngayhethanbhyte='$ngayhethanbhyte'
    WHERE manv = '$manv'";
    // die($sql);
    $result= mysqli_query($connect,$sql);
    header('location:profile.php');
}
if(isset($_POST['sobhxh'])&& isset($_POST['noicapbhxh'])&& isset($_POST['ngaycapbhxh'])&& isset($_POST['ngayhethanbhxh'])&& isset($_POST['manv'])){
    $sobhxh = $_POST['sobhxh'];
    $noicapbhxh = $_POST['noicapbhxh'];
    $ngaycapbhxh = $_POST['ngaycapbhxh'];
    $ngayhethanbhxh = $_POST['ngayhethanbhxh'];
    $manv = $_POST['manv'];
    
    $sql = "UPDATE nhan_vien
    SET sobhxh = '$sobhxh', noicapbhxh = '$noicapbhxh', ngaycapbhxh= '$ngaycapbhxh',ngayhethanbhxh='$ngayhethanbhxh'
    WHERE manv = '$manv'";
    // die($sql);
    $result= mysqli_query($connect,$sql);
    header('location:profile.php');
}




?>