<?php 
	session_start();
	include('connect.php');
	if (isset($_POST['email']) && isset($_POST['password'])) {
		$user = $_POST['username'];
		$pass = $_POST['password'];
		$query = "SELECT id,TenDangNhap,MatKhau FROM nguoidung";
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) > 0) {
			$authenticated = false;
			while ($row = mysqli_fetch_assoc($result)) {
				if ($user == $row['TenDangNhap'] && $pass == $row['MatKhau']) {
					$_SESSION['login'] = true;
					$_SESSION['user'] = $row['id'];
					$authenticated = true;
					break;
				}
			}
			if ($authenticated) {
				header("Location:/checkout.php");
			} else {
				header("Location:/login1.php");

			}
		}
	}
	
?>