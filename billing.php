<?php
include 'connect.php';
$fullname=$_POST['fullname'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$submit=$_POST['submit'];
$sql="UPDATE nguoidung set HoTen='$fullname',SoDienThoai='$phone',DiaChi='$address'";

$result=mysqli_query($conn,$sql);
if($submit==true){
    if($result){
    echo "insert successfully";
    header("Location:/checkout.php");
    }else{
    echo "error". mysqli_error($conn);
    }
}
$conn->close();
