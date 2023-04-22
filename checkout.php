
<!DOCTYPE html>
<html lang="en">

<head>
	<title>BKTM WATCH | Checkout</title>
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
	
<?php include 'header.php'; 
	include_once 'connect.php';
	?>      

	<!-- END nav -->

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
			<div class="row justify-content-center">
				<div class="col-xl-7 ftco-animate">
					<form action="billingaddress.php" method="post" class="billing-form">
						<h3 class="mb-4 billing-heading">Billing Address</h3>
						<div class="row align-items-end">
							<div class="col-md-12">
								<div class="form-group">
									<label for="firstname">Full Name<span class="important"> *</span></label>
									<input type="text" name="fullname" class="form-control" placeholder="John M. Doe">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="lastname">Address<span class="important"> *</span></label>
									<input type="text" name="address" class="form-control" placeholder="542 W, 15th Street">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="lastname">Phone<span class="important"> *</span></label>
									<input type="text" name="phone" class="form-control" placeholder="0123456789">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="lastname">Email</label>
									<input type="text" name="email" class="form-control" placeholder="john@example.com">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="lastname">Note</label>
									<textarea class="form-control note" name="note" placeholder=""></textarea>
								</div>
							</div>
							<div class="w-100"></div>
							<div class="col-md-12">
								<?php
								if($_SESSION['logged']==true){?>
									<button type="submit" value="Login" name="save" class="btn float-right login_btn">save</button>
								<?php 
								}
								else{?>
									<a href="register.html">Create an Account</a>

								<?php
								}
								?>
							</div>
						</div>
					</form><!-- END -->
				</div>
				<div class="col-xl-5">
					<div class="row mt-5 pt-3">
						<div class="col-md-12 d-flex mb-5">
							<div class="cart-detail cart-total p-3 p-md-4">
								<h3 class="billing-heading mb-4">Your Order</h3>
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
									<span>11.910.000 VNĐ</span>
								</p>
							</div>
						</div>
						<div class="col-md-12">
							<div class="cart-detail p-3 p-md-4">
								<h3 class="billing-heading mb-3">Payment Options</h3>
								<div class="form-group">
									<div class="col-md-12">
										<div class="radio">
											<label><input type="radio" name="optradio" class="mr-2"> Cash</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<div class="radio">
											<label><input type="radio" name="optradio" class="mr-2"> Credit cards</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<div class="radio">
											<label><input type="radio" name="optradio" class="mr-2"> Mobile payments</label>
										</div>
									</div>
								</div>
								<p><a href="#" class="btn btn-primary py-3 px-4">Continue Checkout</a></p>
							</div>
						</div>
					</div>
				</div> <!-- .col-md-8 -->
			</div>
		</div>
	</section> <!-- .section -->

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
	</script>

</body>

</html>