
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
    <link rel="stylesheet" href="css/style.css?v= <?php echo time() ?>">
    <link rel="stylesheet" href="css/mystyle.css?v= <?php echo time() ?>">
    <link href="css/jquery-ui-scroll-price.css?v= <?php echo time() ?>" rel="stylesheet">


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
                        <a class="nav-link dropdown-toggle" href="shop.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="shop.html">Men's Watches</a>
                            <a class="dropdown-item" href="shop.html">Women's Watches</a>
                            <a class="dropdown-item" href="shop.html">Mechanical Watches</a>
                            <a class="dropdown-item" href="shop.html">Battery Watches</a>
                        </div>
                    </li>
                    <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
                </ul>

            </div>

            <div id="right">
                <form method="POST">
                    <input type="text" class="form-control" placeholder="Search" id="search_product_name" name="search_product_name">
                </form>
            </div>

            <div class="collapse navbar-collapse ftco-nav-right" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="cart.php" class="nav-link"><i class="fa-solid fa-cart-shopping" id="cart"><span id="cart-Item" style="font-size:15px; position:absolute; bottom:28px;left:36%"></span></i></a></li>
                    <li class="nav-item"><a href="login.php" class="nav-link"><i class="fa-solid fa-user"></i></a>
                    </li>
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

    <section class="ftco-section2">
        <div class="container2">
            <div class="contain-shop1">
                <div class="item-shop1">
                    <h3>Giá</h3>
                    <input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="65000" />
                    <p id="price_show">1000 - 65000</p>
                    <div id="price_range"></div>
                </div>
                <div class="item-shop1">
                    <h3>Hãng</h3>
                    <?php
                    $query = "SELECT DISTINCT(Hang) FROM sanpham WHERE TrangThai = '1' ORDER BY MaSP DESC";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach ($result as $row) {
                    ?>
                        <div class="list-group-item checkbox">
                            <label><input type="checkbox" class="common_selector brand" value="<?php echo $row['Hang']; ?>"> <?php echo $row['Hang']; ?></label>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="item-shop1">
                    <h3>Mã Loại</h3>
                    <?php

                    $query = "
                    SELECT DISTINCT(TenLoai) FROM sanpham,loai WHERE TrangThai = '1'and sanpham.MaLoai=loai.MaLoai
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach ($result as $row) {
                    ?>
                        <div class="list-group-item checkbox">
                            <label><input type="checkbox" class="common_selector maloai" value="<?php echo $row['TenLoai']; ?>"> <?php echo $row['TenLoai']; ?></label>
                        </div>
                    <?php
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
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui-scroll-price.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
    <script src="js/wishlistproduct.js"></script>
    <!-- TAI_JS -->
    <script>
        $(document).ready(function() {
            filter_data();

            function filter_data() {
                var action = 'fetch_data_shop';
                var minimum_price = $('#hidden_minimum_price').val();
                var maximum_price = $('#hidden_maximum_price').val();
                var brand = get_filter('brand');
                var maloai = get_filter('maloai');
                var search_product_name = $('#search_product_name').val();
                $.ajax({
                    url: "fetch_data_shop.php",
                    method: "POST",
                    data: {
                        action: action,
                        minimum_price: minimum_price,
                        maximum_price: maximum_price,
                        brand: brand,
                        maloai: maloai,
                        search_product_name: search_product_name
                    },
                    success: function(data) {
                        $('.filter_data').html(data);
                    }
                });
            }

            function get_filter(class_name) {
                var filter = [];
                $('.' + class_name + ':checked').each(function() {
                    filter.push($(this).val());
                });
                return filter;
            }

            $('.common_selector').click(function() {
                filter_data();
            });

            $('#price_range').slider({
                range: true,
                min: 1000,
                max: 65000,
                values: [1000, 65000],
                step: 500,
                stop: function(event, ui) {
                    $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                    $('#hidden_minimum_price').val(ui.values[0]);
                    $('#hidden_maximum_price').val(ui.values[1]);
                    filter_data();
                }
            });

            $('#search_product_name').keyup(function() {
                filter_data();
            });
        });
    </script>
</body>

</html>