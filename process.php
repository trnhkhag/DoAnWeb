<?php
session_start();

include 'connect.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $query = "SELECT MaNguoiDung,TenDangNhap,MatKhau FROM nguoidung where TenDangNhap='$user' and MatKhau='$pass'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $authenticated = false;
        while ($row = mysqli_fetch_assoc($result)) {
            if ($user == $row['TenDangNhap'] && $pass == $row['MatKhau']) {
                $_SESSION['login'] = true;
                $_SESSION['TenDangNhap'] = $row['MaNguoiDung'];
                $authenticated = true;
                header("Location:/index.php?login=success");
                break;
            }
        }
        if ($authenticated||empty($user)&&empty($pass)) {
            header("Location:/login1.php?login=failed");
        }
    }
}
?>