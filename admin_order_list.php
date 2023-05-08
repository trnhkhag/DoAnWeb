<!DOCTYPE html>
<html lang="en">

<?php
ini_set('display_errors', 0);
$servername = "localhost";
$username = "root";
$password = "";
//đổi giùm cái tên database
$dbname = "webprojectdb1";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!isset ($_GET['page']) ) {
  $page = 1; 
  } else {  
  $page = $_GET['page'];  
  }

$limit=10;
$sqlcount = "SELECT * FROM donhang";
$resultcount = mysqli_query($conn, $sqlcount);
$page_first_result = ($page-1) * $limit;
$number_of_result = mysqli_num_rows($resultcount);
$number_of_page = ceil ($number_of_result / $limit);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['searchBtn'])){
  if(isset($_POST['searchKey'])){
    $searchKey=$_POST['searchKey'];
    $sql = "SELECT d.*, TenDangNhap FROM donhang d JOIN nguoidung n ON d.MaNguoiDung = n.MaNguoiDung WHERE MaDH LIKE '%$searchKey%' or TenDangNhap LIKE  '%$searchKey%' OR Hoten LIKE '%$searchKey%' ORDER BY TrangThai DESC LIMIT $page_first_result, $limit";
    $result = mysqli_query($conn, $sql);
  }
}
else{
  $statusSort;
  $Datefrom;
  $Dateto;
  if(isset($_REQUEST['statusSort'])){
    $statusSort= $_REQUEST['statusSort'];
  }
  if(!isset($_REQUEST['statusSort'])){
    $statusSort= $_REQUEST['statusSort'];
  }
  if(isset($_REQUEST['datefrom'])){
    $Datefrom= $_REQUEST['datefrom'];
  }
  if(isset($_REQUEST['dateto'])){
    $Dateto= $_REQUEST['dateto'];
  }
$sql = "SELECT d.*, TenDangNhap FROM donhang d JOIN nguoidung n ON d.MaNguoiDung = n.MaNguoiDung";
if(isset($_REQUEST['dateto'])&&isset($_REQUEST['datefrom'])){
  $sql = "SELECT d.*, TenDangNhap FROM donhang d JOIN nguoidung n ON d.MaNguoiDung = n.MaNguoiDung WHERE TrangThai like '$statusSort%' and (NgayLap BETWEEN '$Datefrom' and '$Dateto')";
}
if(!isset($_REQUEST['dateto'])&&!isset($_REQUEST['datefrom'])&&isset($_REQUEST['statusSort']))
  $sql = "SELECT d.*, TenDangNhap FROM donhang d JOIN nguoidung n ON d.MaNguoiDung = n.MaNguoiDung WHERE TrangThai like '$statusSort%'";
$result = mysqli_query($conn, $sql);}
//trường hợp nếu không isset ngày tháng
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BKMT WATCH | Admin - Order_List</title>
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
        <a href="admin_statistical.html">
          <i class='bx bx-pie-chart-alt-2'></i>
          <span class="links_name">Statistical</span>
        </a>
      </li>
      <li>
        <a href="admin_user.html">
          <i class='bx bx-user'></i>
          <span class="links_name">User</span>
        </a>
      </li>
      <li class="log_out">
        <a href="index.html">
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
        <span class="dashboard">Order list</span>
      </div>
      <!-- <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search'></i>
      </div> -->
      <div class="profile-details">
        <img src="images/profile.jpg" alt="">
        <span class="admin_name">Admin</span>
        <i class='bx bx-chevron-down'></i>
      </div>
    </nav>

    <div class="home-content">
      <div class="header">
        <div class="nav">
        <form action="" method="POST">
          <div class="search-box">
            <input type="text" name="searchKey" placeholder="Search by username, ID order...">
            <button type="submit" class='bx bx-search' name="searchBtn"></button>
            </div>
</form>
          <div class="action">
            <div class="filter-list btn">
              <i class="bx bx-filter"></i>
            </div>
          </div>
        </div>

        <form action="" method="GET" id="sortOrder">
        <div class="filter">
          <div class="option">
            <p class="title">Time & Date</p>
                <label for="datefrom">From:</label>
                <input type="date" name="datefrom" value="<?php if(isset($_REQUEST['datefrom'])) echo $_REQUEST['datefrom'];  ?>">
                <label for="dateto">To    :</label>
                <input type="date" name="dateto" value="<?php if(isset($_REQUEST['datefrom'])) echo $_REQUEST['dateto'];  ?>">
</br>
            <button onclick="submitForm()">ok</button>
            </div>
            <div class="option">
            <p class="title">Status</p>
            <div class="option-list user-manage">
                <select name="statusSort" onchange="submitForm()">
                  <option value="" <?= $_REQUEST['statusSort'] == "" ? 'selected' : '';?>>All</option>
                  <option value="-1" <?= $_REQUEST['statusSort'] == -1 ? 'selected' : '';?>>Waiting</option>
                  <option value="0" <?= $_REQUEST['statusSort'] == 0 ? 'selected' : '';?>>Refused</option>
                  <option value="1" <?= $_REQUEST['statusSort'] == 1 ? 'selected' : '';?>>Accepted</option>
                </select>
            </div>
          </div>
          </div>
</form>
          
            </div>
          </div>


      <div class="order-list">
</br>
        <table>
          <thead>
            <tr>
              <th>ID Order</th>
              <th>Account</th>
              <th>Date</th>
              <th>Total</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $s="";
          if (mysqli_num_rows($result) == 0){
            echo "<h2>Không có kết quả nào được tìm thấy</h2></br>";
          }
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {			
              				
              // new row
                $s .= '<tr>';
                $s .=sprintf('<td>%s</td>',$row['MaDH']);
                $s .=sprintf('<td>%s</td>',$row['TenDangNhap']);
                $s .=sprintf('<td>%s</td>',$row['NgayLap']);
                $s .=sprintf('<td>%s $</td>',$row['ThanhTien']);
                if($row['TrangThai']==-1)
                {
                  $s .='<td><span class="status-waiting">Waiting</span></td>';
                }
                if($row['TrangThai']==0)
                {
                  $s .='<td><span class="status-unpaid">Canceled</span></td>';
                }
                if($row['TrangThai']==1)
                {
                  $s .='<td><span class="status-paid">Succesful</span></td>';
                }
                //tạm thời đặt 2 cái nút này, mình nghĩ nên css cái nút khác
                $s .=sprintf("
              <td>
                <i class='bx bxs-check-square' onclick='AcceptOrder(%s)'>
                  <span class='tooltip'>OK</span>
                </i>
                <i class='bx bxs-x-square' onclick='refuseOrder(%s)'>
                  <span class='tooltip'>cancel</span>
                </i>
                  <i class='bx bxs-detail' onclick='Orderdetail(%s)'>
                    <span class='tooltip'>Details</span>
                  </i>
              </td></tr>",$row['MaDH'],$row['MaDH'],$row['MaDH']);
            }}
            echo str_replace('"', ' ', $s);
          ?>           
          </tbody>
        </table>
      </div>
      <div class="footer">
      <div class="page">
        <?php
        if($page>=2){
          printf('<button><i class="bx bx-left-arrow-alt" onclick="nextPage(%d-1)"></i></button>', $page);
        }
        $temp=$page;
        $temp=$page;
        for($page = 1; $page<= $number_of_page; $page++) {
          if($page==$temp){
            printf('<button class="current-page" onclick="nextPage(%d)">%d</button>', $page, $page);
          }
          else{
            printf('<button onclick="nextPage(%d)">%d</button>', $page, $page);         
          }
        }
        if($temp<$number_of_page){
          printf('<button><i class="bx bx-right-arrow-alt" onclick="nextPage(%d+1)"></i></button>', $temp);
        }
        ?>
      </div>
    </div>
    </div>
  </section>


  <form action="refuse_Order.php" name="refuse_Order" method="post" enctype="multipart/form-data">
    <div class="modal product-delete">
      <div class="container animate">
      <input type="hidden" value="" id="idrefuse" name="idrefuse">
        <h2>Are you sure you want to<br>
          refuse this order?</h2>
        <div class="action">
        <button type="button" class="cancel-deletion">Cancel</button>
          <button type="submit" class="confirm" name="refuseOrder">Confirm</button>
        </div>
      </div>
    </div>
  </form>

  <form action="accept_Order.php" name="accept_Order" method="post" enctype="multipart/form-data">
    <div class="modal product-delete-1">
      <div class="container animate">
      <input type="hidden" value="" id="idaccept" name="idaccept">
        <h2>Are you sure you want to<br>
        accept this order?</h2>
        <div class="action">
        <button type="button" class="cancel-deletion-1">Cancel</button>
          <button type="submit" class="confirm-1" name="acceptOrder">Confirm</button>
        </div>
      </div>
    </div>
  </form>

  <script>
    function nextPage(x){
      window.location.href="admin_order_list.php?page="+x;
    }

    function submitForm() {
      document.getElementById("sortOrder").submit();
  }
    
    let refuseConfirm = document.querySelector('.product-delete');
    let acceptConfirm = document.querySelector('.product-delete-1');
    let confirmDeletion = document.querySelector('.confirm');
    let confirmDeletion1 = document.querySelector('.confirm-1');
    let cancelDeletion = document.querySelector('.cancel-deletion');
    let cancelDeletion1= document.querySelector('.cancel-deletion-1');

    confirmDeletion.addEventListener('click', () => {
      refuseConfirm.style.display = 'none';
    });
    cancelDeletion.addEventListener('click', () => {
      refuseConfirm.style.display = 'none';
    });

    function refuseOrder(x) {
          var myInput = document.getElementById("idrefuse");
          myInput.value = x;
          refuseConfirm.style.display = 'flex';
}

    confirmDeletion1.addEventListener('click', () => {
        acceptConfirm.style.display = 'none';
    });

    cancelDeletion1.addEventListener('click', () => {
        acceptConfirm.style.display = 'none';
    });

    function AcceptOrder(x) {
          var myInput1 = document.getElementById("idaccept");
          myInput1.value = x;
          acceptConfirm.style.display = 'flex';
}

function Orderdetail(x){
  window.location.href = "order_detail.php?id="+x;
}
    //bxs-check-square ok
    //bx bxs-x-square cancel
     // expand and shrink sidebar
     let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function () {
      sidebar.classList.toggle("active");
      if (sidebar.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }

    // open and close filter list
    let filterBtn = document.querySelector(".filter-list");
    let header = document.querySelector('.header');
    filterBtn.addEventListener('click', () => {
      header.classList.toggle('active');
    })

    

    
  </script>
</body>
<?php
mysqli_close($conn);
?>
</html>