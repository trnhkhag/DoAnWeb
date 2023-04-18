<!DOCTYPE html>
<html lang="en">

<?php
$conn = new mysqli("localhost", "root", "", "webprojectdb");
if ($conn->connect_error) {
  die("Connect failed: " . $conn->connect_error);
}
$sql = "SELECT d.*, HoTen, SoDienThoai FROM donhang d JOIN nguoidung n ON d.MaNguoiDung = n.MaNguoiDung";
$result = $conn->query($sql);

$conn->close();
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
          <div class="search-box">
            <input type="text" placeholder="Search order">
            <i class='bx bx-search'></i>
          </div>
          <div class="action">
            <div class="add-order btn">
              <i class="bx bx-plus"></i>
            </div>
            <div class="filter-list btn">
              <i class="bx bx-filter"></i>
            </div>
          </div>
        </div>

        <div class="filter">
          <div class="option">
            <p class="title">Time & Date</p>
            <div class="option-list">
              <form action="" class="time">
                <label for="time">Time</label>
                <select name="time" id="time">
                  <option value="24h">Last 24 hours</option>
                  <option value="week">Last week</option>
                  <option value="month">Last month</option>
                </select>
              </form>
              <form action="" class="date">
                <label for="date">Date</label>
                <input type="date" id="date">
              </form>
            </div>
          </div>
          <div class="option">
            <p class="title">Price range</p>
            <div class="option-list">
              <form action="" class="price-range">
                <div style="padding-bottom: 5px;">
                  <label for="from">From</label>
                  <input type="text" id="from" placeholder=" 0$">
                </div>
                <div style="padding-top: 5px;">
                  <label for="to">To</label>
                  <input type="text" id="to" placeholder=" 1000$">
                </div>
              </form>
            </div>
          </div>
          <div class="option">
            <p class="title">Status</p>
            <div class="option-list">
              <div class="status">
                <button id="paid">Paid</button>
              </div>
              <div class="status">
                <button id="unpaid">Unpaid</button>
              </div>
            </div>
          </div>
          <div class="option">
            <p class="title">Sort</p>
            <div class="option-list">
              <div class="sort">
                <button id="bytime"><i class="fa-solid fa-arrow-up"></i> By time</button>
              </div>
              <div class="sort">
                <button id="byprice"><i class="fa-solid fa-arrow-up"></i> By price</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="order-list">
        <table>
          <thead>
            <tr>
              <th>Customer</th>
              <th>Phone Number</th>
              <th>Total</th>
              <th>Date</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $s = "";
            while($row = $result->fetch_assoc()) {
              $s .= "<tr>";
              $s .= "<td>" . $row["HoTen"] . "</td>";
              $s .= "<td>" . $row["SoDienThoai"] . "</td>";
              $s .= "<td>" . number_format($row["ThanhTien"], 2, '.', '') . '$</td>';
              $s .= "<td>" . $row["NgayLap"] . "</td>";
              $s .= "<td>" . $row["TrangThai"] . "</td>";
              $s .= sprintf("<td><i class='bx bxs-edit-alt' onclick='editOrder(%d)'><span class='tooltip'>Edit</span></i><a href='order_detail.html'><i class='bx bxs-detail'><span class='tooltip'>Detail</span></i></a></td>", $row["MaDH"]);
              $s .= "</tr>";
            }
            echo ($s);
            ?>



            <!-- <tr>
              <td>Pham Hoang Bach</td>
              <td>0123456789</td>
              <td>200$</td>
              <td>22-11-2022</td>
              <td><span class="status-paid">Complete</span></td>
              <td>
                <i class='bx bxs-edit-alt'>
                  <span class="tooltip">Edit</span>
                </i>
                <a href="order_detail.html">
                  <i class='bx bxs-detail'>
                    <span class="tooltip">Details</span>
                  </i>
                </a>
              </td>
            </tr>
            <tr>
              <td>Tran Ha Khang</td>
              <td>0987654321</td>
              <td>380$</td>
              <td>11-11-2022</td>
              <td><span class="status-paid">Complete</span></td>
              <td>
                <i class='bx bxs-edit-alt'>
                  <span class="tooltip">Edit</span>
                </i>
                <a href="order_detail.html">
                  <i class='bx bxs-detail'>
                    <span class="tooltip">Details</span>
                  </i>
                </a>
              </td>
            </tr>
            <tr>
              <td>Lam Kien Minh</td>
              <td>0125543265</td>
              <td>300$</td>
              <td>23-06-2022</td>
              <td><span class="status-unpaid">Incomplete</span></td>
              <td>
                <i class='bx bxs-edit-alt'>
                  <span class="tooltip">Edit</span>
                </i>
                <a href="order_detail.html">
                  <i class='bx bxs-detail'>
                    <span class="tooltip">Details</span>
                  </i>
                </a>
              </td>
            </tr>
            <tr>
              <td>Nguyen Duc Tai</td>
              <td>0983275463</td>
              <td>500$</td>
              <td>31-07-2022</td>
              <td><span class="status-unpaid">Incomplete</span></td>
              <td>
                <i class='bx bxs-edit-alt'>
                  <span class="tooltip">Edit</span>
                </i>
                <a href="order_detail.html">
                  <i class='bx bxs-detail'>
                    <span class="tooltip">Details</span>
                  </i>
                </a>
              </td>
            </tr>
            <tr>
              <td>Nguyen Tuan Kiet</td>
              <td>0983254321</td>
              <td>1000$</td>
              <td>21-05-2022</td>
              <td><span class="status-paid">Complete</span></td>
              <td>
                <i class='bx bxs-edit-alt'>
                  <span class="tooltip">Edit</span>
                </i>
                <a href="order_detail.html">
                  <i class='bx bxs-detail'>
                    <span class="tooltip">Details</span>
                  </i>
                </a>
              </td>
            </tr>
            <tr>
              <td>Huynh Minh Nhut</td>
              <td>0987282645</td>
              <td>800$</td>
              <td>12-12-2022</td>
              <td><span class="status-unpaid">Incomplete</span></td>
              <td>
                <i class='bx bxs-edit-alt'>
                  <span class="tooltip">Edit</span>
                </i>
                <a href="order_detail.html">
                  <i class='bx bxs-detail'>
                    <span class="tooltip">Details</span>
                  </i>
                </a>
              </td>
            </tr> -->
          </tbody>
        </table>
      </div>
      <div class="footer">
        <div class="page">
          <button><i class='bx bx-left-arrow-alt'></i></button>
          <button class="current-page">1</button>
          <button>2</button>
          <button>3</button>
          <button>4</button>
          <button>5</button>
          <button><i class='bx bx-right-arrow-alt'></i></button>
        </div>
      </div>
    </div>
  </section>

  <div class="modal order-form">
    <form action="" class="modal-content animate" name="order-form" method="POST">
      <div class="header">
        <h2>Order Information</h2>
      </div>
      <div class="container">
        <label for="customer">Customer's name</label>
        <input type="text" name="customer" value="">
        <label for="cphone">Phone number</label>
        <input type="text" name="cphone" value="">
        <label for="total">Total price</label>
        <input type="text" name="total" value="">
        <label for="status">Status</label>
        <select name="status">
          <option value="Complete">Complete</option>
          <option value="Incomplete">Incomplete</option>
          <option value="Processing">Processing</option>
        </select>
        <label for="date">Date</label>
        <input type="date" name="date">
      </div>
      <hr>
      <div class="footer">
        <button type="button" class="cancel">Cancel</button>
        <button type="submit" class="done" name="submit-order-form">Done</button>
      </div>
    </form>
  </div>

  <script>
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

    // increase and decrease according to time
    let sortByTimeBtn = document.querySelector('#bytime');
    sortByTimeBtn.addEventListener('click', () => {
      sortByTime = sortByTimeBtn.firstChild;
      if (sortByTime.classList.contains('fa-arrow-up')) {
        sortByTime.classList.replace('fa-arrow-up', 'fa-arrow-down');
      }
      else {
        sortByTime.classList.replace('fa-arrow-down', 'fa-arrow-up');
      }
    })

    // increase and decrease according to price
    let sortByPriceBtn = document.querySelector('#byprice');
    sortByPriceBtn.addEventListener('click', () => {
      sortByPrice = sortByPriceBtn.firstChild;
      if (sortByPrice.classList.contains('fa-arrow-up')) {
        sortByPrice.classList.replace('fa-arrow-up', 'fa-arrow-down');
      }
      else {
        sortByPrice.classList.replace('fa-arrow-down', 'fa-arrow-up');
      }
    })
  </script>
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/admin_order_list.js"></script>
</body>

</html>