<?php 
	include('connect.php');
	$inputuser=$_POST['username12'];
	$inputpass=$_POST['password1'];
	$querry="SELECT TenDangNhap,MatKhau FROM nguoidung ";
	$result=mysqli_query($conn,$querry);
	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_assoc($result)){
			if($inputuser==$row['TenDangNhap']&&$inputpass==$row['MatKhau']){
				header("Location: /checkout.php");
			}else{
				header("Location: /login1.php");
			}
		}
	}
	
?>