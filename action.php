<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webprojectdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    var_dump($pname);
    $pprice = $_POST['pprice'];
    $pimage = $_POST['pimage'];
    var_dump($pimage);
    $pcode = $_POST['pcode'];
    $pqty = 1;
    $a = $_SESSION['TenDangNhap'];

    $stmt = $conn->prepare("SELECT CodeSP from giohang where CodeSP=? AND TenDangNhap='$a' ");
    $stmt->bind_param("s", $pcode);
    $stmt->execute();



    $res = $stmt->get_result();
    $r = $res->fetch_assoc();
    if ($r !== null) {
        $code = $r['CodeSP'];
        var_dump($code);
    } else {
        $code = null;
    }


    if (!$code) {
        $query = $conn->prepare("INSERT INTO giohang (TenDangNhap,TenSP, Gia, Hinh, SoLuong, TongGia, CodeSP) VALUES ('$a',?,?,?,?,?,?)");
        $query->bind_param("sssiss", $pname, $pprice, $pimage, $pqty, $pprice, $pcode);
        $query->execute();

        echo '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Item added to your cart!</strong>
        </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Item already added to your cart!</strong>
        </div>';
    }
}
if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
    $stmt = $conn->prepare("SELECT * FROM giohang");
    $stmt->execute();
    $stmt->store_result();
    $rows = $stmt->num_rows;

    echo $rows;
}
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    $stmt = $conn->prepare("DELETE FROM giohang WHERE MaSP=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'Item removed from the cart!';
    header('location:cart.php');
}
if (isset($_GET['clear'])) {
    $a=$_SESSION['TenDangNhap'];
    $stmt = $conn->prepare("DELETE FROM giohang WHERE TenDangNhap='$a'");
    $stmt->execute();
    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'All products removed from the cart!';
    header('location:cart.php');
}
if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
    if (isset($_SESSION['TenDangNhap'])) {
        $a = $_SESSION['TenDangNhap'];
        $qerry = "SELECT HoTen,DiaChi,SDT,Email FROM donhang WHERE TenDangNhap='$a'";
        $result1 = mysqli_query($conn, $qerry);
        if (!$result1) {
            die('Query failed: ' . mysqli_error($conn));
        }
        if (mysqli_num_rows($result1) > 0) {
            if ($row = mysqli_fetch_assoc($result1)) {
                $name = $row['HoTen'];
                $email = $row['Email'];
                $phone = $row['SDT'];
                $products = $_POST['products'];
                var_dump($products);
                $grand_total = $_POST['grand_total'];
                var_dump($grand_total);
                $address = $row['DiaChi'];
                $pimage=$_POST['images'];
                $pmode = $_POST['pmode'];
             
                $data = '';
                $stmt = $conn->prepare("INSERT INTO donhang (HoTen,TenDangNhap,Email,SDT,DiaChi,PMode,SanPham,hinhanh,ThanhTien)VALUES(?,'$a',?,?,?,?,?,?,?)");
                $stmt->bind_param('sssssssd', $name, $email, $phone, $address, $pmode, $products,$pimage, $grand_total);
                $stmt->execute();
                $stmt2 = $conn->prepare("DELETE FROM giohang WHERE TenDangNhap='$a'");
                $stmt2->execute();
                $data .= '<div class="text-center">
                                            <h1 class="display-4 mt-2 text-danger">Thank You!</h1>
                                            <h2 class="text-success">Your Order Placed Successfully!</h2>
                                            <h4 class="bg-danger text-light rounded p-2">Items Purchased : ' . $products . '</h4>
                                            <h4>Your Name : ' . $name . '</h4>
                                            <h4>Your E-mail : ' . $email . '</h4>
                                            <h4>Your Phone : ' . $phone . '</h4>
                                            <h4>Total Amount Paid : ' .number_format($grand_total,2) . '</h4>
                                            <h4>Payment Mode : ' . $pmode . '</h4>
                                        </div>';
                echo $data;
            }
            } else {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $products = $_POST['products'];
                //$pname = $_POST['pname'];
                //$pprice = $_POST['pprice'];
                //$pimage = $_POST['pimage'];
                $grand_total = $_POST['grand_total'];
                $address = $_POST['address'];
                $pmode = $_POST['pmode'];
                $a = $_SESSION['TenDangNhap'];
                $data = '';
                $stmt = $conn->prepare("INSERT INTO donhang (HoTen,TenDangNhap,Email,SDT,DiaChi,PMode,SanPham,ThanhTien)VALUES(?,'$a',?,?,?,?,?,?)");
                $stmt->bind_param('sssssss', $name, $email, $phone, $address, $pmode, $products, $grand_total);
                $stmt->execute();
                $stmt2 = $conn->prepare("DELETE FROM giohang WHERE TenDangNhap='$a'");
                $stmt2->execute();
                $data .= '<div class="text-center">
                                  <h1 class="display-4 mt-2 text-danger">Thank You!</h1>
                                  <h2 class="text-success">Your Order Placed Successfully!</h2>
                                  <h4 class="bg-danger text-light rounded p-2">Items Purchased : ' . $pname . '</h4>
                                  <h4>Your Name : ' . $name . '</h4>
                                  <h4>Your E-mail : ' . $email . '</h4>
                                  <h4>Your Phone : ' . $phone . '</h4>
                                  <h4>Total Amount Paid : ' . number_format($grand_total, 2) . '</h4>
                                  <h4>Payment Mode : ' . $pmode . '</h4>
                            </div>';
                echo $data;
            }
        }
    }

