<!DOCTYPE html>
<html lang="en">
<<<<<<< Updated upstream
=======
<?php
$sname = "localhost";
$unmae = "root";
$password = "";
$db_name = "webprojectdb";
$conn = mysqli_connect($sname, $unmae, $password, $db_name);
$a = $_SESSION['TenDangNhap'];
$qerry = "SELECT SanPham,ThanhTien,PMode,TrangThai,NgayLap,hinhanh from donhang where TenDangNhap='$a' ";

$result = mysqli_query($conn, $qerry);

?>
>>>>>>> Stashed changes

<head>
	<title>BKMT WATCH | Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
		rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

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
    <link rel="stylesheet" href="css/order_history.css">


</head>
<<<<<<< Updated upstream
<body>
    <?php 
    include 'header.php';
    ?>
    <table>
    <tr>
        <th>Sản Phẩm</th>
        <th>Số Lượng</th>
        <th>Giá</th>
        <th>Tổng Tiền</th>
        <th>Trạng Thái</th>
    </tr>
    <tr>
        <td><img src="images/product_1.jpg"  alt=""></td>
        <td>1</td>
        <td>200</td>
        <td>200</td>
        <td style="color:green;">paid</td>
    </tr>





    </table>

    <?php include 'footer.html' ?>
=======

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
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-7 ftco-animate">
				<!-- <table id="orderhistory" style="margin: 0 auto; margin-top:10px">
					<tr>
						<th>Sản Phẩm</th>
						<th>Hình Ảnh</th>
						<th>Giá</th>
						<th>Hình thức thanh toán</th>
						<th>Trạng Thái</th>
					</tr> -->
				<h3 style="text-align:center;color:brown;font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">MY ORDER</h3>
				<div class="col-md-12 d-block mb-5">
					<?php
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
							$imagePaths = explode(',', $row['hinhanh']);
							$pname=explode(",",$row['SanPham']);
							


							//var_dump($row);
					?>
							<div class="cart-detail cart-total p-3 p-md-4">
								<p class="d-flex">
									<span>SẢN PHẨM:</span>
									<span style="color: black; font-size:20px"><?php
							
							
							foreach ($imagePaths as $imagePath) {
								echo '<img src=" '. $imagePath .' " style="width:100px;height:100px;margin-top:5px" name="images">';
								
							}	
						
									?>	
									 </span>
								</p>
								<hr>
								<p class="d-flex">
									<span>THÀNH TIỀN</span>
									<span style="color: black; font-size:20px" name="address"><?php echo $row['ThanhTien'] ?></span>
								</p>
								<hr>
								<p class="d-flex">
									<span>TRẠNG THÁI</span>
									<span style="color: black; font-size:20px"><?php echo $row['TrangThai'] ?></span>
								</p>
								<hr>
								<p class="d-flex">
									<span>HÌNH THỨC</span>
									<span style="color: black; font-size:20px"><?php echo $row['PMode'] ?></span>
								</p>
								<hr>
								<p class="d-flex">
									<span>NGÀY MUA </span>
									<span style="color: black; font-size:20px"><?php echo $row['NgayLap'] ?></span>
								</p>
							</div>

					<?php       }
					}


					?>

					</table>


				</div>
			</div>

		</div>
		<!-- <footer class="ftco-footer" style="background-color: #ffad33;">
		<div class="container" style="height: 180px;">

			<div class="row" style="height: 100%">

				<div class="col-md-4" style="height: 100%;">
					<div class="ftco-footer-widget ml-md-5">
						<h2 class="ftco-heading-2 mt-2">Follow us</h2>
						<ul class="list-unstyled">
							<li><a href="#" class="pb-2 d-block"><span class="facebook"><i
											class="fa-brands fa-facebook"></i></span> facebook</a></li>
							<li><a href="#" class="pb-2 d-block"><span class="ins"><i
											class="fa-brands fa-instagram"></i></span> instagram</a></li>
							<li><a href="#" class="pb-2 d-block"><span class="twitter"><i
											class="fa-brands fa-twitter"></i></span> twitter</a></li>

						</ul>
					</div>
				</div>
				<div class="col-md-4" style="height: 100%;">
					<div class="ftco-footer-widget">
						<h2 class="ftco-heading-2 mt-2">Help</h2>
							<ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
								<li><a href="#" class="pb-2 d-block">Shipping Information</a></li>
								<li><a href="#" class="pb-2 d-block">FAQs</a></li>
								<li><a href="#" class="pb-2 d-block">Terms &amp; Conditions</a></li>
								<li><a href="#" class="pb-2 d-block">Privacy Policy</a></li>
							</ul>
					</div>
				</div>
				<div class="col-md-4" style="height: 100%;">
					<div class="ftco-footer-widget">
						<h2 class="ftco-heading-2 mt-2">Have a Questions?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li class="mb-3 mt-3"><span class="icon icon-map-marker" style="color: #000;"></span><span class="text" style="color: #000;">203 Fake St. Mountain
										View, San Francisco, California, USA</span></li>
								<li><a href="#"><span class="icon icon-phone"></span><span class="text">+84
											0761234567</span></a></li>
								<li><a href="#"><span class="icon icon-envelope"></span><span
											class="text">bkmtwatch@gmail.com</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
	</footer> -->

		<footer style="margin-top: 15%;">
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
		<script src="js/sweetalert.all.min.js"></script>
		<script src="js/main.js"></script>
>>>>>>> Stashed changes
</body>
</html>