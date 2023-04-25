<?php
session_start();

$username = "root";
$password = "";
$servername = "localhost";
$dbname = "webprojectdb";

$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
    die("connnection failed" . mysqli_connect_error());
}

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
                $_SESSION['TenDangNhap'] = $row['id'];
                $authenticated = true;
                break;
            }
        }
        if ($authenticated) {
            header("Location:/checkout.php");
        } else {
            echo "wrong email or password";
        }
    }
}
?>