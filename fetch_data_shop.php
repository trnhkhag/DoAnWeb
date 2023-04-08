<?php

//fetch_data.php

include('connect_db.php');

if(isset($_POST["action"]))
{
	$query = "
		SELECT * FROM sanpham WHERE TrangThai = '1'
	";
	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
		$query .= "
		 AND Gia BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
		";
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	//PRODUCT
	if($total_row > 0)
	{
		foreach($result as $row)
		{
			$output .= '
			<div class="col-md-6 col-lg-3 ftco-animate">
			<div class="product">
				<a href="product-single.html" class="img-prod"><img class="img-fluid" src="'. $row['Hinh'] .'"
						alt="Colorlib Template">
					<div class="overlay"></div>
				</a>
				<div class="text py-3 pb-4 px-3 text-center">
					<h3><a href="#">'. $row['TenSP'] .'</a></h3>
					<div class="d-flex">
						<div class="pricing">
							<p class="price"><span class="price-sale">'. $row['Gia'] .'</span></p>
						</div>
					</div>
					<div class="bottom-area d-flex px-3">
						<div class="m-auto d-flex">
							<a href="product-single.html"
								class="add-to-cart d-flex justify-content-center align-items-center text-center">
								<span><i class="ion-ios-menu"></i></span>
							</a>
							<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
								<span><i class="ion-ios-cart btn-buynow"></i></span>
							</a>
							<a href="#" class="add-wishlist heart d-flex justify-content-center align-items-center ">
								<span><i class="ion-ios-heart"></i></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
			';
		}
	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}

?>