<?php
if(isset($_REQUEST['edituser'])) {
	$idUser = (int)$_REQUEST['uid'];
	$tenUser = $_REQUEST['uname'];
    $emailUser = $_REQUEST['uemail'];
    $phoneUser = $_REQUEST['uphone'];
	$roleUser = $_REQUEST['urole'];
	$actionUser=$_REQUEST['uban'];

	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webprojectdb2";


	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}
	//chưa có các đk kiểm tra đầu vào
    //chưa xử lý phần role
	$sql = sprintf("UPDATE `nguoidung` SET `HoTen` = '%s', `Email` = '%s', `SoDienThoai` = '%s', `updated_at` = CURRENT_TIMESTAMP(), `role` = '%s' , `TrangThaiNguoiDung`= '%s'  WHERE `nguoidung`.`MaNguoiDung` = %d", $tenUser, $emailUser, $phoneUser, $roleUser, $actionUser, $idUser);
	if ($conn->query($sql) === TRUE) {
	  header("Location: admin_user.php");
	  exit();
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	mysqli_close($conn);
}