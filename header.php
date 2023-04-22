<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

	<title>Document</title>
</head>
<script tyoe="text/javascript">
$(document).ready(function(){
  $('#search').keyup(function(){
    var input = $(this).val();
    if(input != ''){
      $.ajax({
        url: 'search.php',
        method: 'post',
        data: {input: input},
        success: function(data){
          $('#row').html(data);
        }
      });
    }
	
  });
});
</script>

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
						<a class="nav-link dropdown-toggle" href="shop.php" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
						<div class="dropdown-menu" aria-labelledby="dropdown04">
							<a class="dropdown-item" href="shop.php">Men's Watches</a>
							<a class="dropdown-item" href="shop.php">Women's Watches</a>
							<a class="dropdown-item" href="shop.php">Mechanical Watches</a>
							<a class="dropdown-item" href="shop.php">Battery Watches</a>
						</div>
					</li>
					<li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
					<li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
				</ul>

			</div>

			<div id="right">
				<form action="" method="post">
					<input type="search" placeholder="Search" class="input" id="search">
					<div class="search"><i class="fa-solid fa-magnifying-glass"></i></div>
				</form>
			</div>

			<div class="collapse navbar-collapse ftco-nav-right" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a href="cart.php" class="nav-link"><i class="fa-solid fa-cart-shopping"></i></a></li>
					<?php 
						if($_SESSION['username1']){
							
							?>
							
							
							<li class="nav-item"><a class="nav-link"><?php echo $_SESSION['username1']="Minh" ?></a></li>


					<?php }
						else{?>
							<li class="nav-item"><a href="login1.php" class="nav-link"><i class="fa-solid fa-user"></i></a></li>


					<?php	}
					
					?>
					
				
				</ul>
			</div>
		</div>
	</nav>
</body>

</html>