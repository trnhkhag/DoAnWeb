<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BKMT WATCH | Admin - Product</title>
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
        <span class="dashboard">Product</span>
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
                  <option value="all">All</option>
                  <option value="men">Men's watches</option>
                  <option value="women">Women's watches</option>
                  <option value="couple">Couple's watches</option>
                  <option value="unisex">Unisex watches</option>
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
              <form action="" class="status">
                <select name="category" id="category">
                  <option value="all">All</option>
                  <option value="stocking">Stocking</option>
                  <option value="soldout">Sold out</option>
                  <option value="nearlysoldout">Nearly sold out</option>
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
              <th class="product-name text-left">Name</th>
              <th>Category</th>
              <th>Stock</th>
              <th>Status</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-left">Royal Oak</td>
              <td>Men's watches</td>
              <td>60</td>
              <td><span class="status-paid">Stocking</span></td>
              <td>50$</td>
              <td>
                <i class='bx bxs-detail'>
                  <span class="tooltip">detail</span>
                </i>
                <i class='bx bxs-edit-alt'>
                  <span class="tooltip">edit</span>
                </i>
                <i class='bx bxs-trash'>
                  <span class="tooltip">delete</span>
                </i>
              </td>
            </tr>
            <tr>
              <td class="text-left">Submariner</td>
              <td>Men's watches</td>
              <td>50</td>
              <td><span class="status-paid">Stocking</span></td>
              <td>50$</td>
              <td>
                <i class='bx bxs-detail'>
                  <span class="tooltip">detail</span>
                </i>
                <i class='bx bxs-edit-alt'>
                  <span class="tooltip">edit</span>
                </i>
                <i class='bx bxs-trash'>
                  <span class="tooltip">delete</span>
                </i>
              </td>
            </tr>
            <tr>
              <td class="text-left">Serpenti</td>
              <td>Women's watches</td>
              <td>40</td>
              <td><span class="status-paid">Stocking</span></td>
              <td>80$</td>
              <td>
                <i class='bx bxs-detail'>
                  <span class="tooltip">detail</span>
                </i>
                <i class='bx bxs-edit-alt'>
                  <span class="tooltip">edit</span>
                </i>
                <i class='bx bxs-trash'>
                  <span class="tooltip">delete</span>
                </i>
              </td>
            </tr>
            <tr>
              <td class="text-left">Ruchiea</td>
              <td>Women's watches</td>
              <td>0</td>
              <td><span class="status-unpaid">Sold out</span></td>
              <td>100$</td>
              <td>
                <i class='bx bxs-detail'>
                  <span class="tooltip">detail</span>
                </i>
                <i class='bx bxs-edit-alt'>
                  <span class="tooltip">edit</span>
                </i>
                <i class='bx bxs-trash'>
                  <span class="tooltip">delete</span>
                </i>
              </td>
            </tr>
            <tr>
              <td class="text-left">Onlyou</td>
              <td>Couple's watches</td>
              <td>20</td>
              <td><span class="status-paid">Stocking</span></td>
              <td>40$</td>
              <td>
                <i class='bx bxs-detail'>
                  <span class="tooltip">detail</span>
                </i>
                <i class='bx bxs-edit-alt'>
                  <span class="tooltip">edit</span>
                </i>
                <i class='bx bxs-trash'>
                  <span class="tooltip">delete</span>
                </i>
              </td>
            </tr>
            <tr>
              <td class="text-left">T-Race Chronograph</td>
              <td>Unisex watches</td>
              <td>100</td>
              <td><span class="status-paid">Stocking</span></td>
              <td>50$</td>
              <td>
                <i class='bx bxs-detail'>
                  <span class="tooltip">detail</span>
                </i>
                <i class='bx bxs-edit-alt'>
                  <span class="tooltip">edit</span>
                </i>
                <i class='bx bxs-trash'>
                  <span class="tooltip">delete</span>
                </i>
              </td>
            </tr>
            <tr>
              <td class="text-left">Hydro Conquest</td>
              <td>Unisex watches</td>
              <td>0</td>
              <td><span class="status-unpaid">Sold out</span></td>
              <td>60$</td>
              <td>
                <i class='bx bxs-detail'>
                  <span class="tooltip">detail</span>
                </i>
                <i class='bx bxs-edit-alt'>
                  <span class="tooltip">edit</span>
                </i>
                <i class='bx bxs-trash'>
                  <span class="tooltip">delete</span>
                </i>
              </td>
            </tr>
            <tr>
              <td class="text-left">Le Locle</td>
              <td>Unisex watches</td>
              <td>80</td>
              <td><span class="status-paid">Stocking</span></td>
              <td>35$</td>
              <td>
                <i class='bx bxs-detail'>
                  <span class="tooltip">detail</span>
                </i>
                <i class='bx bxs-edit-alt'>
                  <span class="tooltip">edit</span>
                </i>
                <i class='bx bxs-trash'>
                  <span class="tooltip">delete</span>
                </i>
              </td>
            </tr>
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
    <form action="" class="modal-content animate">
      <div class="header">
        <h2>Product Information</h2>
      </div>
      <div class="container">
        <label for="pname">Name</label>
        <input type="text" name="pname" value="">
        <label for="pcategory">Category</label>
        <input type="text" name="pcategory" value="">
        <label for="pstock">Stock</label>
        <input type="text" name="pstock" value="">
        <label for="pstatus">Status</label>
        <input type="text" name="pstatus" value="">
        <label for="pprice">Price</label>
        <input type="text" name="pprice" value="">
        <label for="pdecs">Description</label>
        <textarea name="pdecs" cols="30" rows="3"></textarea>
        <button type="button">Image</button>
      </div>
      <hr>
      <div class="footer">
        <button type="button" class="cancel">Cancel</button>
        <button type="submit" class="done">Done</button>
      </div>
    </form>
  </div>

  <div class="modal product-detail">
    <div class="container animate">
      <div class="product-img" style="background-image:url(images/product_8.jpg);"></div>
      <h4>Description</h4>
      <p>Far far away, behind the word mountains, far from the countries</p>
      <div class="footer"><button type="button" class="close">Close</button></div>
    </div>
  </div>

  <div class="modal product-delete">
    <div class="container animate">
      <h2>Are you sure you want to<br>
        delete this product?</h2>
      <div class="action">
        <button type="button" class="confirm">Confirm</button>
        <button type="button" class="cancel-deletion">Cancel</button>
      </div>
    </div>
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
    let sortByTimeBtn = document.querySelector('#byname');
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
  <script src="js/admin_product.js"></script>
</body>

</html>