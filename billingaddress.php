<?php
require_once 'connect.php';
$fullname=$_POST['fullname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$note=$_POST['note'];
$querry="UPDATE nguoidung set HoTen='$fullname',SoDienThoai='$phone',DiaChi='$address'";


if($_SESSION['logged']==true){
    
        if(mysqli_affected_rows($conn)>0){
            return true;
        }else{
            return false;
        }
    }
    
   





?>