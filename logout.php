<?php
session_start();
unset($_SESSION["MaNguoiDung"]);
unset($_SESSION["TenDangNhap"]);
header("Location:index.php");
?>