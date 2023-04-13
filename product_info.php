<?php
$p = $_GET['p'];

// Connect databse
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webprojectdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn -> connect_error) {
    die("Connection failed: " . $conn -> connect_error);
}

$sql = sprintf("SELECT * FROM sanpham WHERE MaSP = $p");
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

echo json_encode($row);

$conn -> close();
?>