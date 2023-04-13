<!DOCTYPE html>
<html lang="en">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webprojectdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connect failed: " . $conn->connect_error);
}

$sql = "SELECT s.*, l.TenLoai FROM sanpham s join loai l on s.MaLoai = l.MaLoai";

$result = mysqli_query($conn, $sql);

$conn->close();
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BKMT WATCH | Admin - Product</title>
  <link rel="stylesheet" href="fontawesome-free-6.2.0-web/css/all.min.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="css/admin_style.css?v=<?php echo time(); ?>">
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
        <a href="#" class="active">
          <i class='bx bx-box'></i>
          <span class="links_name">Product</span>
        </a>
      </li>
      <li>
        <a href="admin_order_list.html">
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
        <span class="dashboard">Product - </span>
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

    <div class="home-content product">
      <div class="header">
        <div class="nav">
          <div class="search-box">
            <input type="text" placeholder="Search product">
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
            <p class="title">Category</p>
            <div class="option-list">
              <form action="" class="category">
                <select name="category" id="category">
                  <option value="">All</option>
                  <option value="Men's Watches">Men's watches</option>
                  <option value="Women's Watches">Women's watches</option>
                  <option value="Couple's Watches">Couple's watches</option>
                  <option value="Unisex Watches">Unisex watches</option>
                </select>
              </form>
            </div>
          </div>
          <div class="option">
            <p class="title">Price range</p>
            <div class="option-list">
              <form action="" class="price-range">
                <div class="from">
                  <label for="from">From</label>
                  <input type="text" id="from" placeholder=" 0$">
                </div>
                <div class="to">
                  <label for="to">To</label>
                  <input type="text" id="to" placeholder=" 1000$">
                </div>
              </form>
            </div>
          </div>
          <div class="option">
            <p class="title">Status</p>
            <div class="option-list">
              <form action="#" class="status">
                <select name="status" id="status">
                  <option value="">All</option>
                  <option value="Stocking">Stocking</option>
                  <option value="Sold out">Sold out</option>
                </select>
              </form>
            </div>
          </div>
          <div class="option">
            <p class="title">Sort</p>
            <div class="option-list">
              <div class="sort">
                <button id="byname"><i class="fa-solid fa-arrow-up"></i> By name</button>
              </div>
              <div class="sort">
                <button id="byprice"><i class="fa-solid fa-arrow-up"></i> By price</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="box product-list">
        <table>
          <thead>
            <tr>
              <th class="text-left">Name</th>
              <th>Price</th>
              <th>Stock</th>
              <th>Status</th>
              <th>Brand</th>
              <th>Category</th>
            </tr>
          </thead>
          <tbody id="product-table">
            <?php
            $s = "";
            while ($row = mysqli_fetch_assoc($result)) {
              $s .= "<tr>";
              $s .= sprintf("<td class='text-left'>%s</td>", $row["TenSP"]);
              $s .= sprintf("<td>%s</td>", number_format($row["Gia"], 2, '.', '') . '$');
              $s .= sprintf("<td>%d</td>", $row["LuongTon"]);
              $s .= sprintf("<td>%s</td>", $row["TrangThai"]);
              $s .= sprintf("<td>%s</td>", $row["Hang"]);
              $s .= sprintf("<td>%s</td>", $row["TenLoai"]);
              $s .= sprintf("<td><i class='bx bxs-detail' onclick='ProductDetail(%d)'><span class='tooltip'>detail</span></i><i class='bx bxs-edit-alt' onclick='editProduct(%d)'><span class='tooltip'>edit</span></i><i class='bx bxs-trash' onclick='deleteProduct(%d)'><span class='tooltip'>delete</span></i></td>", $row["MaSP"], $row["MaSP"], $row["MaSP"]);
              $s .= "</tr>";
            }
            echo ($s);
            ?>
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
  </section>

  <div class="modal product-form">
    <form action="add_product.php" class="modal-content animate" name="add_product" method="post" enctype="multipart/form-data">
      <div class="header">
        <h2>Product Information</h2>
      </div>
      <div class="container">
        <label for="pname">Name</label>
        <input type="text" name="pname" value="">
        <label for="pprice">Price</label>
        <input type="text" name="pprice" value="">
        <label for="pstock">Stock</label>
        <input type="text" name="pstock" value="">
        <label for="pstatus">Status</label>
        <input type="text" name="pstatus" value="">
        <label for="pbrand">Brand</label>
        <input type="text" name="pbrand" value="">
        <label for="pcategory">Category</label>
        <select name="pcategory">
          <option value="1">Men's Watches</option>
          <option value="2">Women's Watches</option>
          <option value="3">Couple's Watches</option>
          <option value="4">Unisex Watches</option>
        </select>
        <label for="pdesc">Description</label>
        <textarea name="pdesc" cols="30" rows="3"></textarea>
        <input type="file" name="pimage">
      </div>
      <hr>
      <div class="footer">
        <button type="button" class="cancel">Cancel</button>
        <button type="submit" class="done" name="addProduct">Done</button>
      </div>
    </form>
  </div>

  <div class="modal product-detail">
    <div class="container animate">
      <div class="product-img" style="background-image:url(images/product_8.jpg);"></div>
      <h4>Description</h4>
      <p class="product-desc">Far far away, behind the word mountains, far from the countries</p>
      <div class="footer"><button type="button" class="close">Close</button></div>
    </div>
  </div>

  <form action="delete_product.php" name="delete_product" method="post" enctype="multipart/form-data">
    <div class="modal product-delete">
      <div class="container animate">
        <h2>Are you sure you want to<br>
          delete this product?</h2>
        <div class="action">
          <button type="submit" class="confirm" name="deleteProduct">Confirm</button>
          <button type="button" class="cancel-deletion">Cancel</button>
        </div>
      </div>
    </div>
  </form>

  <script>
    // expand and shrink sidebar
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
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
    let sortByTimeBtn = document.querySelector('#byname');
    sortByTimeBtn.addEventListener('click', () => {
      sortByTime = sortByTimeBtn.firstChild;
      if (sortByTime.classList.contains('fa-arrow-up')) {
        sortByTime.classList.replace('fa-arrow-up', 'fa-arrow-down');
      } else {
        sortByTime.classList.replace('fa-arrow-down', 'fa-arrow-up');
      }
    })

    // increase and decrease according to price
    let sortByPriceBtn = document.querySelector('#byprice');
    sortByPriceBtn.addEventListener('click', () => {
      sortByPrice = sortByPriceBtn.firstChild;
      if (sortByPrice.classList.contains('fa-arrow-up')) {
        sortByPrice.classList.replace('fa-arrow-up', 'fa-arrow-down');
      } else {
        sortByPrice.classList.replace('fa-arrow-down', 'fa-arrow-up');
      }
    })
  </script>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="noreferrer"></script>
<script src="js/admin_productt.js"></script>

</html>

<!-- HELLO -->