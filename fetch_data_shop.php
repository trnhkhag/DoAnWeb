<?php

//fetch_data.php

include('connect_db.php');

$limit = 8;
$sql = "SELECT count(MaSP) AS total FROM sanpham";
$result = $connect->query($sql);
$row = $result->fetch();
$totalProducts = $row['total'];

// Get current page
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

// calculate total pages and start
$totalPages = ceil($totalProducts / $limit);
if ($currentPage > $totalPages) {
    $currentPage = $totalPages;
}
else if ($currentPage < 1) {
    $currentPage = 1;
}
$start = ($currentPage - 1) * $limit;

if (isset($_POST["action"])) {
	$query = "
    SELECT MaSP, Hang, Gia, sanpham.MaLoai, TenLoai, TenSP, Hinh, CodeSP
    FROM sanpham, loai 
    WHERE TrangThai = '1' and sanpham.MaLoai = loai.MaLoai";

	$parameters = array();

	if (isset($_POST["minimum_price"], $_POST["maximum_price"])) {
		$minimum_price = $_POST["minimum_price"];
		$maximum_price = $_POST["maximum_price"];
		if (!empty($minimum_price) && !empty($maximum_price)) {
			$query .= "
            AND Gia BETWEEN ? AND ?
        ";
			$parameters[] = $minimum_price;
			$parameters[] = $maximum_price;
		}
	}

	if (isset($_POST["brand"])) {
		$brand_filter = $_POST["brand"];
		if (!empty($brand_filter)) {
			$brand_placeholders = implode(',', array_fill(0, count($brand_filter), '?'));
			$query .= "
				AND Hang LIKE ($brand_placeholders)
			";
			$parameters = array_merge($parameters, $brand_filter);
		}
	}
	
	if (isset($_POST["maloai"])) {
		$maloai_filter = $_POST["maloai"];
		if (!empty($maloai_filter)) {
			$maloai_placeholders = implode(',', array_fill(0, count($maloai_filter), '?'));
			$query .= "
            AND TenLoai IN ($maloai_placeholders)
        ";
			$parameters = array_merge($parameters, $maloai_filter);
		}
	}

	if (isset($_POST["search_product_name"])) {
		$search_filter = $_POST["search_product_name"];
		if (!empty($search_filter)) {
			$query .= "
            AND TenSP LIKE ?
        ";
			$parameters[] = '%'. $search_filter . '%';
		}
	}

	$query .= " LIMIT $start, $limit";

	$statement = $connect->prepare($query);
	$statement->execute($parameters);
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();

	$output = '';

	//PRODUCT
	if ($total_row > 0) {
		foreach ($result as $row) {
			$output .= '
			<div id="message"></div>
			<div class="col-md-6 col-lg-3 ftco-animate">
			<div class="product">
				<a href="product-single.php?MaSP=' .$row['MaSP'] . '" class="img-prod"><img class="img-fluid" src="' . $row['Hinh'] . '"
						alt="Colorlib Template">
					<div class="overlay"></div>
				</a>
				<div class="text py-3 pb-4 px-3 text-center">
					<h3><a href="#">' . $row['TenSP'] . '</a></h3>
					<div class="d-flex">
						<div class="pricing">
							<p class="price"><span class="price-sale">' . $row['Gia'] . '.00$</span></p>
						</div>
					</div>
					<div class="bottom-area d-flex px-3">
						<div class="m-auto d-flex">
							<a href="product-single.html"
								class="add-to-cart d-flex justify-content-center align-items-center text-center">
								<span><i class="ion-ios-menu"></i></span>
							</a>
							<div>
							<form action="" class="form-submit">
								<input type="hidden" class="pid" value="' . $row['MaSP'] . '">
								<input type="hidden" class="pname" value="' . $row['TenSP'] . '">
								<input type="hidden" class="pprice" value="' . $row['Gia'] . '">
								<input type="hidden" class="pimage" value="' . $row['Hinh'] . '">
								<input type="hidden" class="pcode" value="' . $row['CodeSP'] . '">
								<button class="buy-now d-flex justify-content-center align-items-center mx-1 addItemBtn"><i class="ion-ios-cart btn-buynow"></i></button>
							</form>
							</div>
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
	} else {
		$output = '<h3 class="no-product">No Products Found</h3>';
	}
	echo $output;
}
?>
    <script>
        $(document).ready(function(){
            $(".addItemBtn").click(function(e){
                e.preventDefault();
                var $form = $(this).closest(".form-submit");
                var pid = $form.find(".pid").val();
                var pname = $form.find(".pname").val();
                var pprice = $form.find(".pprice").val();
                var pimage = $form.find(".pimage").val();
                var pcode = $form.find(".pcode").val();

                $.ajax({
                    url: 'action.php',
                    method: 'post',
                    data:{
                        pid:pid,
                        pname:pname, 
                        pprice:pprice,
                        pimage:pimage,
                        pcode:pcode
                        },
                        success:function(response){
                            $("#message").html(response);
							window.scrollTo(0,0);
							load_cart_item_number();
                        }
                });
            });

			load_cart_item_number();

			function load_cart_item_number(){
				$.ajax({
					url:'action.php',
					method:'get',
					data:{cartItem:"cart_item"},
					success:function(response){
						$("#cart-Item").html(response);
					}
				});
			}
        });
    </script>