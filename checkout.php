<<<<<<< Updated upstream
=======
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
$soluong=array();
$sql = "SELECT CONCAT(TenSP, '(',SoLuong,')') AS qty, Hinh, TongGia,TenSP,SoLuong FROM giohang WHERE TenDangNhap='$a'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $grand_total += $row['TongGia'];
    $qty = $row['qty'];
    $soluong[]=$row['SoLuong'];
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
$soluong=implode(",",$soluong);
?>
>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
	<?php include 'header.php';
	?>

	<!-- END nav -->
=======
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
>>>>>>> Stashed changes

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
					<form action="billing.php" method="post" class="billing-form">
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
							<?php
							if ($_SESSION['login1'] == true) { ?>
								<div class="col-md-12">
									<button name="submit" type="submit">save</button>
								</div>
							<?php } else { ?>
								<div class="col-md-12">
									<a href="register.html">Create an Account</a>
								</div>
							<?php
							}
							?>

						</div>

<<<<<<< Updated upstream
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
								<p><a href="order_history.php" class="btn btn-primary py-3 px-4">Continue Checkout</a></p>
							</div>
						</div>
					</div>
				</div> <!-- .col-md-8 -->
			</div>
		</div>
	</section> <!-- .section -->

	<?php include 'footer.html'; ?>
=======
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center" id="order" style="width: 1000px;">
                <div class="col-xl-7 ftco-animate">
                    <form action="action.php" class="billing-form" method="post" id="placeOrder">
                        <!--  -->
                        <h3 class="mb-4 billing-heading">Complete Your Order</h3>
                        <div class="col-md-12 d-flex mb-5">
                            <div class="cart-detail cart-total p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Your Order</h3>
                                <p class="d-flex">
                                    <span>Product:</span>
                                    <span ><?= $allItems ?></span>
                                </p>
                                <input type="hidden" name="products"  value="<?= $pname?>">

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
>>>>>>> Stashed changes




	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
		</svg></div>


<<<<<<< Updated upstream
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

	<script>
		$(document).ready(function() {

			var quantitiy = 0;
			$('.quantity-right-plus').click(function(e) {
=======
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

                                    if (isset($_SESSION['TenDangNhap'])) {
                        ?>
>>>>>>> Stashed changes

				// Stop acting like a button
				e.preventDefault();
				// Get the field name
				var quantity = parseInt($('#quantity').val());

<<<<<<< Updated upstream
				// If is not undefined

				$('#quantity').val(quantity + 1);
=======
                        <?php } else { ?>
                            <a href="login1.php" name="login">Login</a>
                <?php }
                                }
                            }


                ?>
>>>>>>> Stashed changes


				// Increment

			});

			$('.quantity-left-minus').click(function(e) {
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