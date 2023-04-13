<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="webprojectdb";
$output="";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

if(isset($_REQUEST['search'])){
  $input=$_REQUEST['search'];
  $query="SELECT * FROM `sanpham` WHERE TenSP LIKE '%$input%'";
  $res=mysqli_query($conn,$query);
  while($row=mysqli_fetch_array($res)){?>
  <div class="col-md-6 col-lg-3 ftco-animate fadeInUp ftco-animated">
					<div class="product">
						<a href="product-single.html" class="img-prod"><img class="img-fluid" src="images/product_1.jpg" alt="Colorlib Template">
							<span class="status">30%</span>
							<div class="overlay"></div>
						</a>
						<div class="text py-3 pb-4 px-3 text-center">
							<h3><a href="#"></a></h3>
							<div class="d-flex">
								<div class="pricing">
									<p class="price"><span class="mr-2 price-dc"> </span><span class="price-sale"></span></p>
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
				</div>

        <?php
        }

}
?>
