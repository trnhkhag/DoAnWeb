<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if(isset($_REQUEST['id'])){
  $id=$_REQUEST['id'];
  $servername = "localhost";
  $username = "root";
  $password = "";
  //đổi giùm cái tên database
  $dbname = "webprojectdb2";
  
  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  //người dùng này có mã đơn hàng này
  //tí nữa xử lý các sản phẩm ở bảng chi tiết sản phẩm sau
  $sql = "SELECT d.*, n.* FROM donhang d JOIN nguoidung n ON d.MaNguoiDung = n.MaNguoiDung WHERE MaDH = $id";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 0){
    echo "<h2>Đơn hàng không tồn tại</h2></br>";
  }
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
  }
}
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BKMT WATCH | Admin - Order_detail</title>
  <link rel="stylesheet" href="fontawesome-free-6.2.0-web/css/all.min.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="css/admin_style.css">
</head>

<body>
<div class="sidebar">
    <?php
      include('admin_nav.php')
    ?>
    <section class="home-section">
<nav>
<div class="sidebar-button">
  <i class="bx bx-menu sidebarBtn"></i>
  <span class="dashboard">ADMIN-Order-Detail</span>
</div>
<div class="profile-details">
<?php
  if (isset($_SESSION['TenDangNhap'])) { 
    $s='';
    $s .= sprintf('<span class="admin_name">%s</span>', $_SESSION['TenDangNhap']);
    $s .= sprintf('  <img src="images/profile.jpg" alt="">');
    $s .= sprintf('  <i class="bx bx-chevron-down"></i>');
    echo $s;
  }
?>
  </div>
</nav>

    <div class="home-content order-detail">

      <div class="info">
        <div class="box order-info">
          <table>
            <caption>Order Infomation</caption>
            <tbody>
              <tr>
                <th>Order's ID</th>
                <td><?php echo $row['MaDH'];?></td>
              </tr>
              <tr>
                <th>Date</th>
                <td><?php echo $row['NgayLap'];?></td>
              </tr>
              <tr>
                <th>Total</th>
                <td><?php echo $row['ThanhTien'];?></td>
              </tr>
              <tr>
                <th>Status</th>
                <?php
                if($row['TrangThai']==-1)
                {
                  echo '<td><span class="status-waiting">Waiting</span></td>';
                }
                if($row['TrangThai']==1)
                {
                  echo '<td><span class="status-unpaid">Canceled</span></td>';
                }
                if($row['TrangThai']==2)
                {
                  echo '<td><span class="status-paid">Succesful</span></td>';
                }
                ?>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="box customer-info">
          <table>
            <caption>Customer Infomation</caption>
            <tbody>
              <tr>
                <th>Name</th>
                <td><?php echo $row['HoTen'];?></td>
              </tr>
              <tr>
                <th>Phone Number</th>
                <td><?php echo $row['SoDienThoai'];?></td>
              </tr>
              <tr>
                <th>Address</th>
                <td><?php echo $row['DiaChi'];?></td>
              </tr>
              <tr>
                <th>Email</th>
                <td><?php echo $row['Email'];?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="box product-list">
        <table>
          <caption>Product List</caption>
          <thead>
            <tr>
              <th></th>
              <th>Description</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql1 = "SELECT s.*, c.* FROM chitietdonhang c JOIN sanpham s ON c.MaSP = s.MaSP WHERE MaDH = $id";
            $result1 = mysqli_query($conn, $sql1);
            $s="";
            if (mysqli_num_rows($result1) > 0) {
              while ($row = mysqli_fetch_assoc($result1)) {
              $s .="<tr>";
              $s .= sprintf("<td><img src='%s' class='product-image'></td>", $row["Hinh"]);
              $s .= sprintf("<td><h4>%s</h4>",$row['TenSP']);
              $s .= sprintf("<p>%s</p></td>",$row['MoTa']);
              $s .= sprintf("<td>%f</td>", $row["Gia"]);
              $s .= sprintf("<td>%d</td>", $row["SoLuong"]);
              $s .= sprintf("<td>%d</td>", $row["SoLuong"]*$row["Gia"]);
              $s .="</tr>";
            }}
            echo ($s);           
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</body>
<?php
mysqli_close($conn);
?>
</html>