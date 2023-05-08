<!DOCTYPE html>
<html lang="en">

<head>
	<title>BKMT WATCH | Cart</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
		rel="stylesheet">
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
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/mystyle.css">
</head>

<body class="goto-here">
	<?php include 'header.php';?>      

				<div class="collapse navbar-collapse ftco-nav-right" id="ftco-nav">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a href="cart.php" class="nav-link"><i class="fa-solid fa-cart-shopping"></i></a></li>
						<?php
						if (isset($_SESSION['TenDangNhap'])) {
						?>
							<li class="nav-item"><a href="index.php" class="nav-link"><span class="user-header">Hello, <?php echo $_SESSION['TenDangNhap']; ?></span> </a></li>
							<li class="nav-item"><a href="logout.php" class="nav-link"><span class="user-header">Logout</span> </a></li>
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
  <!-- END nav -->
  
  <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpeg');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
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
                <tr class="text-center">
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                  <th>Product name</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody class="bodyofcart">
                <tr class="text-center2" id="row-<?= $row['MaSP'] ?>">
                  <?php
                  $servername = "localhost";
                  $username = "root";
                  $password = "";
                  $dbname = "webprojectdb";
                  $a=$_SESSION['TenDangNhap'];
                  $conn = mysqli_connect($servername, $username, $password, $dbname);
                  $qerry="SELECT * FROM giohang WHERE TenDangNhap='$a'";
                  $result1=mysqli_query($conn,$qerry);
                  $stmt = $conn->prepare("SELECT * FROM giohang WHERE TenDangNhap='$a'");
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
          <p class="text-center mt-5" style="display: flex; justify-content: space-between">
            <a href="shop.php" class="btn btn-primary">Continue shopping</a>
            <a href="order_history.php" class="btn btn-primary" style="float: right; margin-right:80px">Order History</a>
            <a href="action.php?clear=all" class="btn btn-primary" onclick="return confirm('Are you sure want to clear your cart?')">Clear Cart</a>

          </p>
        </div>
      </div>
  </section>

	<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
		<div class="row justify-content-end mb-5">
			<div class="col-lg-6 cart-wrap ftco-animate">
				<div class="cart-total mb-3">
					<h2 class="text-center">Coupon Code</h2>
					<p>Enter your coupon code if you have one</p>
					<form action="#" class="info">
						<div class="form-group">
							<label for="">Coupon code</label>
							<input type="text" class="form-control text-left px-3" placeholder="">
						</div>
					</form>
				</div>
				<p class="text-center"><a href="checkout.html" class="btn btn-primary py-3 px-4">Apply Coupon</a></p>
			</div>
			<div class="col-lg-6 cart-wrap ftco-animate" id="bodyoftotal">
				<div class="cart-total mb-3">
					<h2 class="text-center">Cart Totals</h2>
					<p class="d-flex">
						<span>Subtotal</span>
						<span>11.910.000 VNĐ</span>
					</p>
					<p class="d-flex">
						<span>Shipping</span>
						<span>0 VNĐ</span>
					</p>
					<p class="d-flex">
						<span>Discount</span>
						<span>0 VNĐ</span>
					</p>
					<hr>
					<p class="d-flex total-price">
						<span>Total</span>
						<span class="price">11.910.000 VNĐ</span>
					</p>
				</div>
				<p class="text-center"><a href="checkout.php" class="btn btn-primary py-3 px-4">Proceed to Checkout</a>
				</p>
			</div>
		</div>
		</div>
	</section>
	<?php include 'footer.html';?>      




	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
				stroke="#F96D00" />
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
	<script
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>
	<script src="js/cart.js"></script>


	<script>
		$(document).ready(function () {

			var quantitiy = 0;
			$('.quantity-right-plus').click(function (e) {

				// Stop acting like a button
				e.preventDefault();
				// Get the field name
				var quantity = parseInt($('#quantity').val());

				// If is not undefined

				$('#quantity').val(quantity + 1);


				// Increment

			});

			$('.quantity-left-minus').click(function (e) {
				// Stop acting like a button
				e.preventDefault();
				// Get the field name
				var quantity = parseInt($('#quantity').val());

				// If is not undefined

				// Increment
				if (quantity > 0) {
					$('#quantity').val(quantity - 1);
				}
			});

		});
			function totalcost(product){
   				let cartcost=localStorage.getItem('totalcost');
   				if(cartcost!=null){
      			cartcost=parseInt(cartcost);
      			localStorage.setItem('totalcost',cartcost+product.price);
   				}else{
     			 localStorage.setItem('totalcost',product.price);
   }
}

