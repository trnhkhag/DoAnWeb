<?php 
session_start(); 
$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "webprojectdb";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password'])
	&& isset($_POST['phone']) && isset($_POST['email'])
	) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);
	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);
	$email = validate($_POST['email']);
	$phone = validate($_POST['phone']);

	$user_data = 'uname='. $uname. '&name='. $name;

	if (empty($name)) {
		header("Location: signup.php?error=Full Name is required&$user_data");
	    exit();
	}
	else if (empty($uname)) {
		header("Location: signup.php?error=User Name is required&$user_data");
	    exit();
	}
	else if(empty($email)){
		header("Location: signup.php?error=Email is required&$user_data");
		exit();
	}
	else if(empty($phone)){
		header("Location: signup.php?error=Phone number is required&$user_data");
		exit();
	}
	else if(empty($pass)){
        header("Location: signup.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Re Password is required&$user_data");
	    exit();
	}
    else if (strlen($pass)<8) {
		header("Location: signup.php?error=Password must be larger than 8 charecter&$user_data");
	   }
	else if(empty($name)){
        header("Location: signup.php?error=Name is required&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: signup.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM nguoidung WHERE TenDangNhap='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The username is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO nguoidung(TenDangNhap, MatKhau, HoTen, Email, SoDienThoai) VALUES('$uname', '$pass', '$name','$email','$phone')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: signup.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: signup.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}