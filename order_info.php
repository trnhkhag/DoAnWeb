<?php
$conn = new mysqli("localhost", "root", "", "webprojectdb");
$MaDH = $_GET["p"];
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT d.*, HoTen, SoDienThoai FROM donhang d JOIN nguoidung n ON d.MaNguoiDung = n.MaNguoiDung WHERE MaDH = $MaDH";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$conn->close();
echo json_encode($row);
?>