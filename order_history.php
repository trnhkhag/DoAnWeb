<!DOCTYPE html>
<html lang="en">

<head>
    <title>BKMT WATCH | Home</title>
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
    <link rel="stylesheet" href="css/style.css?v=<?php echo time() ?>">
    <link rel="stylesheet" href="css/mystyle.css">
    <link rel="stylesheet" href="css/order_history.css">

</head>

<body class="goto-here">
<?php include 'header.php' ?>
    <!-- END nav -->
    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpeg');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Contact us</span></p>
          <h1 class="mb-0 bread">Contact us</h1>
        </div>
      </div>
    </div>
  </div>
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
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "webprojectdb2";
                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                    $image = array();
                    $tensp = array();
                    $qerry = "SELECT sanpham,ThanhTien,PMode,TrangThai,NgayLap,HINH FROM donhang,nguoidung WHERE donhang.MaNguoiDung=nguoidung.MaNguoiDung";
                    $result = mysqli_query($conn, $qerry);
                    //var_dump($result);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            if (!empty($row['HINH']) && !empty($row['sanpham'])) {
                                $images = explode(',', $row['HINH']);
                                $tensp = explode(',', $row['sanpham']); ?>
                                <div class="cart-detail cart-total p-3 p-md-4" style="margin-top: 20px;">
                                    <p class="d-flex">
                                        <span>SẢN PHẨM:</span>
                                        <div class="order-items">
                                        <?php
                                        foreach ($tensp as $tensp) {
                                            $tensp = '<span style="color: black; font-size:20px">' . $tensp . '</span>'; ?>
                                            <?php echo $tensp ?>
                                            
                                        <?php
                                        }
                                        ?>
                                        </div>
                                        <div class="order-items">
                                        <?php
                                        foreach ($images as $image) {
                                            $image = '<div><img src="' . $image . '" style="width:100px;height:100px;margin-top:5px" name="images"></div>'; ?>

                                            <?php echo $image ?>

                                        <?php
                                        }

                                        ?>
                                        </div>
                                        
                                    </p>


                                    <p class="d-flex">
                                        <span>THÀNH TIỀN</span>
                                        <span style="color: black; font-size:20px"><?php echo $row['ThanhTien'] ?></span>
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
                    }


                    ?>

                    </table>


                </div>
            </div>

        </div>

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
</body>

</html>