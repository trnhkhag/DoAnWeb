<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="index.php">BKMT WATCH</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="shop.php" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</a>
          <div class="dropdown-menu" aria-labelledby="dropdown04">
            <a class="dropdown-item" href="shop.php">Men's Watches</a>
            <a class="dropdown-item" href="shop.php">Women's Watches</a>
            <a class="dropdown-item" href="shop.php">Couple's Watches</a>
            <a class="dropdown-item" href="shop.php">Unisex Watches</a>
          </div>
        </li>
        <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
        <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
      </ul>

    </div>

    <div id="right">
      <form method="POST" style="display: flex">
        <input type="text" class="form-control" placeholder="Search" id="search_product_name" name="search_product_name" style="height: 36px !important">
        <button type="submit" style="background-color: #ffad33; width: 40px; border: none"><i class="fa fa-search"></i></button>
      </form>
    </div>

    <div class="collapse navbar-collapse ftco-nav-right" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="cart.html" class="nav-link"><i class="fa-solid fa-cart-shopping"></i></a></li>
        <?php
        if (isset($_SESSION['TenDangNhap'])) {
        ?>
          <li class="nav-item"><a href="#" class="nav-link"><i class="fa-solid fa-user"></i></a></li>
          <li class="nav-item"><a href="logout.php" class="nav-link"><i class="fa-solid fa-right-from-bracket"></i></a></li>
        <?php
        } else {
        ?>
          <li class="nav-item"><a href="login1.php" class="nav-link"><i class="fa-solid fa-user"></i></a></li>
        <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>