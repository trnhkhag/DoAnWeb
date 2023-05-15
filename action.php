<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webprojectdb2";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pimage = $_POST['pimage'];
    $pcode = $_POST['pcode'];
    $pqty = 1;
    $a = $_SESSION['TenDangNhap'];
    $stmt = $conn->prepare("SELECT CodeSP from giohang where CodeSP=? and TenDangNhap='$a' ");
    $stmt->bind_param("s", $pcode);
    $stmt->execute();
    $res = $stmt->get_result();
    $r = $res->fetch_assoc();
    if ($r !== null) {
        $code = $r['CodeSP'];
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
    $stmt = $conn->prepare("SELECT * FROM giohang ");
    $stmt->execute();
    $stmt->store_result();
    $rows = $stmt->num_rows;

    echo $rows;
}
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    $stmt = $conn->prepare("DELETE FROM giohang WHERE MaSP=? ");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'Item removed from the cart!';
    header('location:cart.php');
}
if (isset($_GET['clear'])) {
    $stmt = $conn->prepare("DELETE FROM giohang ");
    $stmt->execute();
    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'All products removed from the cart!';
    header('location:cart.php');
}
if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $products = $_POST['products'];
    $grand_total = $_POST['grand_total'];
    $address = $_POST['address'];
    $pmode = $_POST['pmode'];
    $a = $_SESSION['TenDangNhap'];
    $sql = "UPDATE nguoidung SET DiaChi='$address' WHERE TenDangNhap='$a'";
    $sql1 = "SELECT MaNguoiDung from nguoidung WHERE TenDangNhap='$a' ";
    $sql2 = "SELECT Hinh from giohang WHERE TenDangNhap='$a'";
    $result = mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn, $sql1);
    $result2 = mysqli_query($conn, $sql2);
    $image = array();
    if (mysqli_num_rows($result2) > 0) {
        while ($row1 = mysqli_fetch_assoc($result2)) {
            $image[] = $row1['Hinh'];
        }
        $img = implode(',', $image);
        if (mysqli_num_rows($result1) > 0) {
            if ($row = mysqli_fetch_assoc($result1)) {
                $stmt = $conn->prepare("INSERT INTO donhang (PMode,ThanhTien,MaNguoiDung,sanpham,HINH)VALUES(?,?,?,?,?)");
                $stmt->bind_param('sdsss', $pmode, $grand_total, $row['MaNguoiDung'], $products, $img);
                $stmt->execute();
                $stmt2 = $conn->prepare('DELETE FROM giohang');
                $stmt2->execute();
                $data = "";
                $data .= '<div class="text-center">
                                      <h1 class="display-4 mt-2 text-danger">Thank You!</h1>
                                      <h2 class="text-success">Your Order Placed Successfully!</h2>
                                      <h4 class="bg-danger text-light rounded p-2">Items Purchased : ' . $products . '</h4>
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
}
