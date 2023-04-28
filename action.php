<?php
session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webprojectdb";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(isset($_POST['pid'])){
    $pid= $_POST['pid'];
    $pname= $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pimage = $_POST['pimage'];
    $pcode = $_POST['pcode'];
    $pqty = 1;

    $stmt = $conn->prepare("SELECT CodeSP from giohang where CodeSP=? ");
    $stmt->bind_param("s",$pcode);
    $stmt->execute();
    $res = $stmt ->get_result();
    $r = $res->fetch_assoc();
    if ($r !== null) {
        $code = $r['CodeSP'];
    } else {
        $code = null;
    }
    

    if(!$code){
        $query = $conn->prepare("INSERT INTO giohang (TenSP, Gia, Hinh, SoLuong, TongGia, CodeSP) VALUES (?,?,?,?,?,?)");
        $query->bind_param("sssiss",$pname,$pprice,$pimage,$pqty,$pprice,$pcode);
        $query->execute();

        echo '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Item added to your cart!</strong>
        </div>';
    }
    else{
        echo '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Item already added to your cart!</strong>
        </div>';
    }
}
    if(isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item'){
        $stmt = $conn->prepare("SELECT * FROM giohang");
        $stmt->execute();
        $stmt->store_result();
        $rows = $stmt->num_rows;

        echo $rows;
    }
    if(isset($_GET['remove'])){
        $id = $_GET['remove'];
        $stmt = $conn->prepare("DELETE FROM giohang WHERE MaSP=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();

        $_SESSION['showAlert']='block';
        $_SESSION['message']='Item removed from the cart!';
        header('location:cart.php');
    }
    if(isset($_GET['clear'])){
        $stmt = $conn->prepare("DELETE FROM giohang");
        $stmt->execute();
        $_SESSION['showAlert'] = 'block';
        $_SESSION['message'] = 'All products removed from the cart!';
        header('location:cart.php');
    }
?>