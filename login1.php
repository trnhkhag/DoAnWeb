<!DOCTYPE html>
<html>

<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="login_register_css/style.css">
</head>

<body>
	<form class="form-login" action="login.php" method="post">
		<h2>LOGIN</h2>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<input type="text" name="uname" placeholder="User Name"><br>
		<input type="password" name="password" placeholder="Password"><br>
		<div class="foot-form">
			<button type="submit">Login</button>
			<a href="signup.php" class="ca">Create an account</a>
		</div>
	</form>
</body>

</html>