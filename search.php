<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webprojectdb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['input'])) {
	$input = $_POST['input'];
	$query = "SELECT * FROM sanpham WHERE TenSP LIKE '{$input}%'";
	$result = mysqli_query($conn, $query);

	if(mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			?>
			<div class="product" style="width: 300px; margin-left:20px;">
				<a href="product-single.html" class="img-prod"><img class="img-fluid" src="<?php echo  $row['Hinh'] ?>" alt="Colorlib Template">
					<div class="overlay"></div>
				</a>
				<div class="text py-3 pb-4 px-3 text-center">
					<h3><a href="#"><?php echo $row['TenSP'] ?></a></h3>
					<div class="d-flex">
						<div class="pricing">
							<p class="price"><span><?php echo number_format($row['Gia'], 0, '', ',') ?> vnđ</span></p>
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
			
		}
	} else {
		echo "No results found";
	}

}
?>

		
