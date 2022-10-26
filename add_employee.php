<?php 
require 'connect.php';
// if(isset($_POST['hoten'])||isset($_POST['hoten'])|isset($_POST['hoten'])|isset($_POST['hoten'])|isset($_POST['hoten'])|isset($_POST['hoten'])|isset($_POST['hoten'])|isset($_POST['hoten'])|isset($_POST['hoten'])|isset($_POST['hoten'])|isset($_POST['hoten'])|isset($_POST['hoten'])|isset($_POST['hoten'])|isset($_POST['hoten']))
$hoten = $_POST['hoten'];
// $dantoc = $_POST['dantoc'];
$gioitinh = $_POST['gioitinh'];
if($gioitinh=='Male'){
    $gioitinh = 1;
}else{
    $gioitinh = 0;
}
$ngaysinh = $_POST['ngaysinh'];
$tongiao = $_POST['tongiao'];
$quequan = $_POST['quequan'];
$sdt = $_POST['sdt'];
$cccd = $_POST['cccd'];
$ngaycapcccd = $_POST['ngaycapcccd'];
$ngayhethancccd = $_POST['ngayhethancccd'];
$sobhyte = $_POST['sobhyte'];
$noicapbhyte = $_POST['noicapbhyte'];
$ngaycapbhyte = $_POST['ngaycapbhyte'];
$ngayhethanbhyte = $_POST['ngayhethanbhyte'];
$sobhxh = $_POST['sobhxh'];
$noicapbhxh = $_POST['noicapbhxh'];
$ngaycapbhxh = $_POST['ngaycapbhxh'];
$ngayhethanbhxh = $_POST['ngayhethanbhxh'];
// $sql = "insert into nhan_vien ('hoten','gioitinh','ngaysinh','tongiao','quequan','sdt','cccd','ngaycapcccd','ngayhethancccd','sobhyte','noicapbhyte','ngaycapbhyte','ngayhethanbhyte','sobhxh','noicapbhxh','ngaycapbhxh','ngayhethanbhxh') values('$hoten','$gioitinh','$ngaysinh','$tongiao','$quequan','$sdt','$cccd','$ngaycapcccd','$ngayhethancccd','$sobhyte','$noicapbhyte','$ngaycapbhyte','$ngayhethanbhyte','$sobhxh','$noicapbhxh','$ngaycapbhxh','$ngayhethanbhxh')";

$sql = "INSERT INTO `nhan_vien` (`manv`, `mapb`, `macv`, `hoten`, `matd`, `dantoc`, `gioitinh`, `ngaysinh`, `tongiao`, `quequan`, `sdt`, `cccd`, `ngaycapcccd`, `ngayhethancccd`, `sobhyte`, `noicapbhyte`, `ngaycapbhyte`, `ngayhethanbhyte`, `sobhxh`, `noicapbhxh`, `ngaycapbhxh`, `ngayhethanbhxh`) VALUES (NULL, '', '', '$hoten', '', 'chưa có', '$gioitinh', '$ngaysinh', '$tongiao', '$quequan', '$sdt', '$cccd', '$ngaycapcccd', '$ngayhethancccd', '$sobhyte', '$noicapbhyte', '$ngaycapbhyte', '$ngayhethanbhyte', '$sobhxh', '$noicapbhxh', '$ngaycapbhxh', '$ngayhethanbhxh')";
// die($sql);

$result = mysqli_query($connect,$sql);
$result1 = mysqli_query($connect,"SELECT    *
FROM       nhan_vien
ORDER BY  manv DESC
LIMIT     1;");

$each = mysqli_fetch_array($result1);
$manv = $each['manv'];
// echo $manv;
// die();
$tenphongban = $_POST['tenphongban'];
$tencv = $_POST['tencv'];
$tentrinhdo = $_POST['tentrinhdo'];
$trinhdongoaingu = $_POST['trinhdongoaingu'];
$chuyennganh = $_POST['chuyennganh'];
$ngaybatdau = $_POST['ngaybatdau'];
$noidung = $_POST['noidung'];
// INSERT INTO `phongban` (`maphongban`, `tenphongban`, `manv`, `macv`, `maluong`) VALUES (NULL, 'Web', '16', '', '');
$sql = "INSERT INTO `phongban` (`maphongban`, `tenphongban`, `manv`, `macv`, `maluong`) VALUES (NULL, '$tenphongban', '$manv 
', '', '');";
// die($sql);
$result = mysqli_query($connect,$sql);

$sql = "INSERT INTO `chucvu` (`macv`, `tencv`, `manv`) VALUES (NULL, '$tencv', '$manv');";
$result = mysqli_query($connect,$sql);
$sql = "INSERT INTO `hopdong` (`mahd`, `maluong`, `manv`, `ngaybatdau`, `ngayketthuc`, `ngayky`, `noidung`, `lanhky`, `thoihan`) VALUES (NULL, '', '$manv', '$ngaybatdau', '', '', '$noidung', '', '');";
$result = mysqli_query($connect,$sql);
$sql = "INSERT INTO `trinhdo` (`matrinhdo`, `tentrinhdo`, `chuyennganh`, `trinhdongoaingu`, `manv`) VALUES (NULL, '$tentrinhdo', '$chuyennganh', '$trinhdongoaingu', '$manv');";
$result = mysqli_query($connect,$sql);
header("location: employee.php");
?>