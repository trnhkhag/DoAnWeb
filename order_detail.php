<!DOCTYPE html>
<html lang="en">

<?php
if(isset($_REQUEST['id'])){
  $id=$_REQUEST['id'];
  $servername = "localhost";
  $username = "root";
  $password = "";
  //đổi giùm cái tên database
  $dbname = "webprojectdb1";
  
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
    <div class="logo-details">
      <i class='bx bx-alarm'></i>
      <span class="logo_name">BKMT WATCH</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="admin_index.html">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="admin_product.html">
          <i class='bx bx-box'></i>
          <span class="links_name">Product</span>
        </a>
      </li>
      <li>
        <a href="#" class="active">
          <i class='bx bx-list-ul'></i>
          <span class="links_name">Order list</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-pie-chart-alt-2'></i>
          <span class="links_name">Analytics</span>
        </a>
      </li>
      <li>
        <a href="admin_user.html">
          <i class='bx bx-user'></i>
          <span class="links_name">User</span>
        </a>
      </li>
      <li class="log_out">
        <a href="#">
          <i class='bx bx-log-out'></i>
          <span class="links_name">Log out</span>
        </a>
      </li>
    </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Order detail</span>
      </div>
      <div class="profile-details">
        <img src="images/profile.jpg" alt="">
        <span class="admin_name">Admin</span>
        <i class='bx bx-chevron-down'></i>
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
                if($row['TrangThai']==0)
                {
                  echo '<td><span class="status-unpaid">Canceled</span></td>';
                }
                if($row['TrangThai']==1)
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
                <td><?php echo $row['Hoten'];?></td>
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
                <td><?php echo $row['email'];?></td>
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