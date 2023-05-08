<?php
session_start();
$sname = "localhost";
$unmae = "root";
$password = "";

$db_name = "webprojectdb";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: login1.php?error=User Name is required");
		exit();
	} else if (empty($pass)) {
		header("Location: login1.php?error=Password is required");
		exit();
	} else {
		// hashing the password
		$pass = md5($pass);


		$sql = "SELECT * FROM nguoidung WHERE TenDangNhap='$uname' AND MatKhau='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			if ($row['TenDangNhap'] === $uname && $row['MatKhau'] === $pass) {
				if ($row['role'] === 'Customer') {
					$_SESSION['TenDangNhap'] = $row['TenDangNhap'];
					$_SESSION['HoTen'] = $row['HoTen'];
					$_SESSION['MaNguoiDung'] = $row['MaNguoiDung'];
					header("Location: index.php");
					exit();
				}  
				if ($row['role'] === 'Admin') {
					$_SESSION['TenDangNhap'] = $row['TenDangNhap'];
					$_SESSION['HoTen'] = $row['HoTen'];
					$_SESSION['MaNguoiDung'] = $row['MaNguoiDung'];
					header("Location: admin_index.php");
					exit();
				}
			} else {
				header("Location: login1.php?error=Incorect User name or password");
				exit();
			}
		} else {
			header("Location: login1.php?error=Incorect User name or password");
			exit();
		}
	}
} else {
	header("Location: login1.php");
	exit();
}
