<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webprojectdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

$productId = $_POST["productId"];
$quantity = $_POST["quantity"];

$stmt = $conn->prepare("UPDATE giohang SET SoLuong = ?, TongGia = Gia * ? WHERE MaSP = ?");
$stmt->bind_param("iii", $quantity, $quantity, $productId);
$stmt->execute();

$stmt = $conn->prepare("SELECT SoLuong, TongGia FROM giohang WHERE MaSP = ?");
$stmt->bind_param("i", $productId);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$data = array(
  "quantity" => $row["SoLuong"],
  "totalPrice" => $row["TongGia"]
);

echo json_encode($data);
?>
