<?php session_start() ?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webprojectdb";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$a = $_SESSION['TenDangNhap'];
$grand_total = 0;
$allItems = '';
$items = array();
$images = array();
$pname = array();
$soluong = array();
$sql = "SELECT CONCAT(TenSP, '(',SoLuong,')') AS qty, Hinh, TongGia,TenSP,SoLuong FROM giohang WHERE TenDangNhap='$a'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
	$grand_total += $row['TongGia'];
	$qty = $row['qty'];
	$soluong[] = $row['SoLuong'];
	if (!empty($row['Hinh'])) {
		$img = '<img src="' . $row['Hinh'] . '" style="width:100px;height:100px;margin-top:5px" name="images">
                    ';
		$qty = $img . ' ' . $qty;
		$images[] = $row['Hinh'];
	}
	$items[] = $qty;
	$pname[] = $row['TenSP'];
}
$allItems = implode(", ", $items);
$img1 = implode(",", $images);
$pname = implode(",", $pname);
$soluong = implode(",", $soluong);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>BKTM WATCH | Checkout</title>
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
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/mystyle.css">
</head>

<body class="goto-here">

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

	<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpeg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span>
					</p>
					<h1 class="mb-0 bread">Checkout</h1>
				</div>
			</div>
		</div>
	</div>


	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center" id="order" style="width: 1000px;">
				<div class="col-xl-7 ftco-animate">
					<form action="action.php" class="billing-form" name="order" method="post" id="placeOrder">
						<!--  -->
						<h3 class="mb-4 billing-heading">Complete Your Order</h3>
						<div class="col-md-12 d-flex mb-5">
							<div class="cart-detail cart-total p-3 p-md-4">
								<h3 class="billing-heading mb-4">Your Order</h3>
								<p class="d-flex">
									<span>Product:</span>
									<span><?= $allItems ?></span>
								</p>
								<input type="hidden" name="products" value="<?= $pname ?>">

								<hr>
								<p class="d-flex total-price">
									<span>Total</span>
									<span><?= number_format($grand_total, 2) ?>$</span>
									<input type="hidden" name="grand_total" value="<?= $grand_total ?>">
									<input type="hidden" name="images" value="<?= $img1 ?>">
								</p>
							</div>

						</div>
						<div class="row align-items-end">
							<?php

							if (isset($_SESSION['TenDangNhap'])) {
								$a = $_SESSION['TenDangNhap'];
								$qerry = "SELECT HoTen,DiaChi,SDT FROM donhang WHERE TenDangNhap='$a'";
								$result1 = mysqli_query($conn, $qerry);
								if (!$result1) {
									die('Query failed: ' . mysqli_error($conn));
								}
								if (mysqli_num_rows($result1) > 0) {
									if ($row = mysqli_fetch_assoc($result1)) {

							?>
										<h3 class="mb-4 billing-heading"> Your Information</h3>
										<div class="col-md-12 d-flex mb-5">
											<div class="cart-detail cart-total p-3 p-md-4">
												<p class="d-flex">
													<span>FullName:</span>
													<span style="color: black; font-size:20px"><?php echo $row['HoTen'] ?></span>
												</p>
												<hr>
												<p class="d-flex">
													<span>Address</span>
													<span style="color: black; font-size:20px" name="address"><?php echo $row['DiaChi'] ?></span>
												</p>
												<hr>
												<p class="d-flex">
													<span>Phone</span>
													<span style="color: black; font-size:20px"><?php echo $row['SDT'] ?></span>
												</p>
												<hr>
												<p class="d-flex">
													<span>Payment Options</span>
													<span>
														<select name="pmode">
															<option value="" selected disabled>Select Payment Options</option>
															<option value="cards">Credit Card</option>
															<option value="cod">COD</option>
															<option value="netbanking">Net Banking</option>
														</select>
													</span>
												</p>
											</div>
										</div>
										<input style="margin-top:20px;" type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block">
								<?php
									}
								}
							} else {

								?>
								<div class="col -md-12">
									<div class="form-group">
										<label for="firstname">Full Name<span class="important"> *</span></label>
										<input type="text" name="name" class="form-control" placeholder="John M. Doe">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="lastname">Address<span class="important"> *</span></label>
										<input type="text" class="form-control" name="address" placeholder="542 W, 15th Street">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="lastname">Phone<span class="important"> *</span></label>
										<input type="text" class="form-control" name="phone" placeholder="0123456789">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="lastname">Email</label>
										<input type="text" class="form-control" name="email" placeholder="john@example.com">
									</div>
								</div>
						</div>
						<div class="col-md-12">
							<div class="cart-detail p-3 p-md-4">
								<h3 class="billing-heading mb-3">Payment Options</h3>
								<select name="pmode">
									<option value="" selected disabled>Select Payment Options</option>
									<option value="cards">Credit Card</option>
									<option value="cod">COD</option>
									<option value="netbanking">Net Banking</option>
								</select>
							</div>
						</div>
						<?php

								if (isset($_SESSION['TenDangNhap'])) {?>
						<?php
						 } else { ?>
							<a href="login1.php" name="login">Login</a>
					</form>
					<?php
								}
							}
					?>
				</div>
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
	<script src="js/sweetalert.all.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>