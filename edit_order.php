<?php
if (isset($_POST["submit-order-form"])) {
  $orderID = $_POST["oid"];
  $cname = $_POST["customer"];
  $cphone = $_POST["cphone"];
  $orderTotal = $_POST["total"];
  $orderStatus = $_POST["status"];
  $orderDate = $_POST["date"];

  // Connect database
  $conn = new mysqli("localhost", "root", "", "webprojectdb");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = sprintf("UPDATE donhang SET ");
}
?>