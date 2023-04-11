<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script>
  function showresult(str){
    if(str.length==1){
      document.getElementById("livesearch").innerHTML=str;
      document.getElementById("livesearch").style.border="1px solid black";
      return;
    }
  }
</script>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.php">BKMT WATCH</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
				aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="shop.php" id="dropdown04" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">Shop</a>
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
					<input type="search" placeholder="Search" class="input" id="search" onkeyup="showresult(this.value)">
					<div id="livesearch"></div>
					<div class="search"><i class="fa-solid fa-magnifying-glass"></i></div>
				</form>
			</div>

			<div class="collapse navbar-collapse ftco-nav-right" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a href="cart.php" class="nav-link"><i
								class="fa-solid fa-cart-shopping"></i></a></li>
					<li class="nav-item"><a href="login1.html" class="nav-link"><i
								class="fa-solid fa-user"></i></a></li>
				</ul>
			</div>
		</div>
	</nav>
</body>
</html>