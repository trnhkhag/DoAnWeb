<?php
if(isset($_REQUEST['refuseOrder'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webprojectdb1";

    $id=$_REQUEST['idrefuse'];

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}
    $sql = sprintf("UPDATE `donhang` SET `TrangThai` = '0' WHERE `donhang`.`MaDH` = %d", $id);
	if ($conn->query($sql) === TRUE) {
	  header("Location: admin_order_list.php");
	  exit();
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	mysqli_close($conn);
}
?>