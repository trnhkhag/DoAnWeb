<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>

<head>
  <title>BKMT WATCH | Cart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/ionicons.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">

  <link rel="stylesheet" href="fontawesome-free-6.2.0-web/css/all.css">
  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/style.css?v= <?php echo time() ?>">
  <link rel="stylesheet" href="css/mystyle.css?v= <?php echo time() ?>">
</head>

<body class="goto-here">
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html">BKMT WATCH</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="shop.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="shop.html">Men's Watches</a>
              <a class="dropdown-item" href="shop.html">Women's Watches</a>
              <a class="dropdown-item" href="shop.html">Couple's Watches</a>
              <a class="dropdown-item" href="shop.html">Unisex Watches</a>
            </div>
          </li>
          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
        </ul>

      </div>

      <div id="right">
        <form class="example" action="shop.html">
          <input type="text" placeholder="Search.." name="search2">
          <button type="submit" style="background-color: #ffad33;"><i class="fa fa-search"></i></button>
        </form>
      </div>

      <div class="collapse navbar-collapse ftco-nav-right" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="cart.php" class="nav-link"><i class="fa-solid fa-cart-shopping" id="cart"><span id="cart-Item" style="font-size:15px; position:absolute; bottom:28px;left:36%"></span></i></a></li>
          <li class="nav-item"><a href="login1.html" class="nav-link"><i class="fa-solid fa-user"></i></a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->

  <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpeg');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center2">
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
          <h1 class="mb-0 bread">Cart</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section2 ftco-cart">
    <div style="display:<?php if (isset($_SESSION['showAlert'])) {
                          echo $_SESSION['showAlert'];
                        } else {
                          echo 'none';
                        }
                        unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong><?php if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
              }
              unset($_SESSION['showAlert']); ?></strong>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 ftco-animate">
          <div class="cart-list">
            <table class="table">
              <thead class="thead-primary">
                <tr class="text-center2">
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                  <th>Product name</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody class="bodyofcart">
                <tr class="text-center" id="row-<?= $row['MaSP'] ?>">
                  <?php
                  $servername = "localhost";
                  $username = "root";
                  $password = "";
                  $dbname = "webprojectdb";
                  $conn = mysqli_connect($servername, $username, $password, $dbname);

                  $stmt = $conn->prepare("SELECT * FROM giohang");
                  $stmt->execute();
                  $result = $stmt->get_result();
                  $grand_total = 0;
                  while ($row = $result->fetch_assoc()) :
                  ?>
                    <td><img style="width:50%;" src=" <?= $row['Hinh'] ?>" alt=""></td>
                    <input type="hidden" class="pid" value="<?= $row['MaSP'] ?>">
                    <td><?= $row['TenSP'] ?></td>
                    <td><?= number_format($row['Gia'], 2) ?>$</td>
                    <input type="hidden" class="pprice" value="<?= $row['Gia'] ?>">
                    <td><input type="number" class="itemQty" value="<?= $row['SoLuong'] ?>" style="width:30%;" onchange="updateCart(<?= $row['MaSP'] ?>, this.value);"></td>
                    <td><?= number_format($row['TongGia'], 2) ?>$</td>
                    <td><a href="action.php?remove=<?= $row['MaSP'] ?>" onclick="return confirm('Are you sure want to remove this product?');" class="text-danger"><i class="fas fa-trash-alt"></i></a></td>
                    <?php $grand_total += $row['TongGia'] ?>
                  <?php endwhile; ?>
                </tr>
              </tbody>
            </table>
          </div>
          <p class="text-center2 mt-5" style="display: flex; justify-content: space-between">
            <a href="shop.php" class="btn btn-primary">Continue shopping</a>
            <a href="action.php?clear=all" class="btn btn-primary" onclick="return confirm('Are you sure want to clear your cart?')">Clear Cart</a>

          </p>
        </div>
      </div>
  </section>

  <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
    <div class="col-lg-6 cart-wrap ftco-animate" id="bodyoftotal">
      <div class="cart-total mb-3">
        <h2 class="text-center2">Cart Totals</h2>
        <p class="d-flex">
          <span>Subtotal</span>
          <span><?= number_format($grand_total, 2) ?>$</span>
        </p>
      </div>
      <p class="text-center2"><a href="checkout.html" class="btn btn-primary py-3 px-4">Proceed to Checkout</a>
      </p>
    </div>
    </div>
  </section>
  <footer>
    <div class="Our_social_media">
      <a href="#"><i class="fa-brands fa-facebook"></i></a>
      <a href="#"><i class="fa-brands fa-instagram"></i></a>
      <a href="#"><i class="fa-brands fa-twitter"></i></a>
      <a href="#"><i class="fa-brands fa-youtube"></i></a>
    </div>
    <div class="more_info">
      <a href="#">Contact us</a>
      <a href="#">Our Services</a>
      <a href="#">Privacy Policy</a>
      <a href="#">Terms & Conditions</a>
      <a href="#">Career</a>
    </div>
    <p>INFERNO Copyright © 2021 Inferno - All rights reserved || Designed By: Mahesh</p>
  </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  <script src="js/cart.js"></script>
  <script>
    $(document).ready(function() {
      load_cart_item_number();

      function load_cart_item_number() {
        $.ajax({
          url: 'action.php',
          method: 'get',
          data: {
            cartItem: "cart_item"
          },
          success: function(response) {
            $("#cart-Item").html(response);
          }
        });
      }
    });
  </script>
  <script>
    function updateCart(productId, quantity) {
      location.reload(true);
      $.ajax({
        url: "total_price.php",
        method: "POST",
        data: {
          productId: productId,
          quantity: quantity
        },
        success: function(data) {
          var row = $("#row-" + productId);
          row.find(".itemQty").val(data.quantity);
          row.find(".totalPrice").text("$" + data.totalPrice.toFixed(2));
        }
      });
    }
  </script>


</body>

</html>