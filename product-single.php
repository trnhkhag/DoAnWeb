<!DOCTYPE html>
<html lang="en">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webprojectdb2";
$conn = new mysqli($servername, $username, $password, $dbname);
if(!$conn){
    die("Connect Fail" .mysqli_connect_error());
}
$tmp = $_REQUEST["MaSP"];
$sql = "SELECT * FROM sanpham WHERE MaSP=$tmp";
$result = mysqli_query($conn, $sql);
$r= mysqli_fetch_assoc($result);
?>
<head>
	<title>BKMT WATCH | Product</title>
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
    <link rel="stylesheet" href="css/style.css?v= <?php echo time() ?>">
    <link rel="stylesheet" href="css/mystyle.css?v= <?php echo time() ?>">
</head>

<body class="goto-here">
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.html">BKMT WATCH</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
				aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="shop.html" id="dropdown04" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">Category</a>
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
				<form class="example" action="shop.html" >
					<input type="text" placeholder="Search.." name="search2">
					<button type="submit" style="background-color: #ffad33;"><i class="fa fa-search"></i></button>
				  </form>
			</div>

			<div class="collapse navbar-collapse ftco-nav-right" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a href="cart.html" class="nav-link"><i
								class="fa-solid fa-cart-shopping"></i></a></li>
					<li class="nav-item"><a href="wishlist.html" class="nav-link"><i
								class="fa-solid fa-heart"></i></a></li>
					<li class="nav-item"><a href="login1.html" class="nav-link"><i
								class="fa-solid fa-user"></i></a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->

	<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpeg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a
								href="index.html">Product</a></span> <span>Product Single</span></p>
					<h1 class="mb-0 bread">Product Single</h1>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 mb-5 ftco-animate">
					<a href="#" class="image-popup"><img src="<?php echo($r["Hinh"]) ?>"
							class="img-fluid2" alt="Colorlib Template"></a>
				</div>
				<div class="col-lg-6 product-details pl-md-5 ftco-animate">
					<h3 class="RL"><?php echo($r["TenSP"]) ?></h3>
					<div class="rating d-flex">
						<p class="text-left mr-4">
							<a href="#" class="mr-2" style="color: #000;">100 <span
									style="color: #bbb;">Rating</span></a>
						</p>
						<p class="text-left">
							<a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
						</p>
					</div>
					<p class="price"><span><?php echo($r["Gia"]) ?>.00$</span></p>
					<p><?php echo($r["MoTa"]) ?>
					</p>
					<div class="row mt-4">
						<div class="col-md-6">

						</div>
						<div class="w-100"></div>
						<div class="input-group col-md-6 d-flex mb-3">
							<span class="input-group-btn mr-2">
								<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
									<i class="ion-ios-remove"></i>
								</button>
							</span>
							<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1"
								min="1" max="100">
							<span class="input-group-btn ml-2">
								<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
									<i class="ion-ios-add"></i>
								</button>
							</span>
						</div>
						<div class="w-100"></div>
						<div class="col-md-12">

						</div>
					</div>
					<p><a href="#" class="buy-now btn btn-black py-3 px-5" id="add_to_cart">Add to Cart</a></p>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section testimony-section">
		<div class="container">
			<div class="row ftco-animate">
				<div class="col-md-12">
					<div class="carousel-testimony owl-carousel">

						<div class="item">
							<div class="testimony-wrap p-4a pb-5a">
								<div class="col-lg-6a mb-5 ftco-animate">
									<a href="images/product-1.jpg" class="image-popup"><img src="images/lobini_01.jpg"
											class="img-fluid2" alt="Colorlib Template"></a>
								</div>
						
							</div>
						</div>

						<div class="item">
							<div class="testimony-wrap p-4a pb-5a">
								<div class="col-lg-6a mb-5 ftco-animate">
									<a href="images/product-1.jpg" class="image-popup"><img src="images/lobini_02.jpg"
											class="img-fluid2" alt="Colorlib Template"></a>
								</div>
							</div>
						</div>

						<div class="item">
							<div class="testimony-wrap p-4a pb-5a">
								<div class="col-lg-6a mb-5 ftco-animate">
									<a href="images/product-1.jpg" class="image-popup"><img src="images/lobini_03.jpg"
											class="img-fluid2" alt="Colorlib Template"></a>
								</div>
							</div>
						</div>

						<div class="item">
							<div class="testimony-wrap p-4a pb-5a">
								<div class="col-lg-6a mb-5 ftco-animate">
									<a href="images/product-1.jpg" class="image-popup"><img src="images/lobini_04.jpg"
											class="img-fluid2" alt="Colorlib Template"></a>
								</div>
							</div>
						</div>

					</div>
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
	<script src="js/sweetalert.all.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
