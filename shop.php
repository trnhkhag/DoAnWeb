<!DOCTYPE html>
<html lang="en">
<?php include('connect_db.php') ?>
<head>
	<title>BKMT WATCH | Shop</title>
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

	<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpeg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span>
					</p>
					<h1 class="mb-0 bread">Products</h1>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 mb-5 text-center">
					<ul class="product-category">
						<li><a href="shop.php" class="active">All</a></li>
						<li><a href="#">Lobinni</a></li>
						<li><a href="#">Tenitop</a></li>
						<li><a href="#">Hazeal</a></li>
						<li><a href="#">Mini-Focus</a></li>
					</ul>
				</div>
			</div>
					<?php 
						$countRow = 0;
						while($row=mysqli_fetch_assoc($result)){
							if($countRow == 0) {
								echo '<div id="row" class="row">';
							}
							echo '<div class="col-md-6 col-lg-3 ftco-animate">';

					?>

					<div class="product">
						<a href="product-single.html" class="img-prod"><img class="img-fluid" src="<?php echo  $row['Hinh'] ?>" alt="Colorlib Template">
							<div class="overlay"></div>
						</a>
						<div class="text py-3 pb-4 px-3 text-center">
							<h3><a href="#"><?php echo $row['TenSP'] ?></a></h3>
							<div class="d-flex">
								<div class="pricing">
									<p class="price"><span><?php echo number_format($row['Gia'], 0, '', ',')?> vnđ</span></p>
								</div>
							</div>
							<div class="bottom-area d-flex px-3">
								<div class="m-auto d-flex">
									<a href="product-single.html" class="add-to-cart d-flex justify-content-center align-items-center text-center">
										<span><i class="ion-ios-menu"></i></span>
									</a>
									<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
										<span><i class="ion-ios-cart btn-buynow"></i></span>
									</a>
									<a href="#" class="heart d-flex justify-content-center align-items-center ">
										<span><i class="ion-ios-heart"></i></span>
									</a>
								</div>
							</div>
						</div>
					</div>
					<?php
					echo '</div>'; // end of col
					$countRow++;
					
				};
				if($countRow > 0) {
					echo '</div>';
					
				}

                    ?>
                </div>

            </div>
            <div class="contain-shop2">
                <div class="row filter_data">

                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <li><a href="#">&lt;</a></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

	<?php include 'footer.html'; ?>



	<!-- loader
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
		</svg></div> -->


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
	<script src="js/cart.js"></script>
</body>

</html>