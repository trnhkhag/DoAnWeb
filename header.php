<?php
session_start();
include('connect_db.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.php">BKMT WATCH</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="shop.php" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="shop.php">Men's Watches</a>
                            <a class="dropdown-item" href="shop.php">Women's Watches</a>
                            <a class="dropdown-item" href="shop.php">Couple's Watches</a>
                            <a class="dropdown-item" href="shop.php">Unisex Watches</a>
                        </div>
                    </li>
                    <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
                </ul>

            </div>

            <form action="" method="POST" class="form-cl">
                <input type="text" class="form-control" placeholder="Search" id="search_product_name" name="search_product_name">
                <div class="row filter_data" id="product_output">

                </div>
            </form>




            <div class="collapse navbar-collapse ftco-nav-right" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="cart.php" class="nav-link"><i class="fa-solid fa-cart-shopping" id="cart"><span id="cart-Item" style="font-size:15px; position:absolute; bottom:28px;left:36%"></span></i></a></li>
                    <?php
                    if (isset($_SESSION['TenDangNhap'])) {
                    ?>
                        <li class="nav-item"><a href="index.php" class="nav-link"><span class="user-header">Hello, <?php echo $_SESSION['TenDangNhap']; ?></span> </a></li>
                        <li class="nav-item"><a href="logout.php" class="nav-link"><span class="user-header">Logout</span> </a></li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item"><a href="login.php" class="nav-link"><i class="fa-solid fa-user"></i></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

</body>
<script>
    $(document).ready(function() {
        filter_data();

        function filter_data() {
            var action = 'fetch_data_all';
            var search_product_name = $('#search_product_name').val();
            $.ajax({
                url: "fetch_data_all.php",
                method: "POST",
                data: {
                    action: action,
                    search_product_name: search_product_name
                },
                success: function(data) {
                    if (search_product_name == '') {
                        $('.filter_data').hide();
                    } else {
                        $('.filter_data').show();
                    }
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

        $('#search_product_name').keyup(function() {
            filter_data();
        });
    });
</script>

</html>