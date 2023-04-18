<!DOCTYPE html>
<html>

<head>
     <title>SIGN UP</title>
     <link rel="stylesheet" type="text/css" href="login_register_css/style.css?v= <?php echo time() ?>">
</head>

<body>
     <form class="form-signup" action="signup-check.php" method="post">
          <h2>SIGN UP</h2>
          <?php if (isset($_GET['error'])) { ?>
               <p class="error"><?php echo $_GET['error']; ?></p>
          <?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <?php if (isset($_GET['name'])) { ?>
               <input type="text" name="name" placeholder="Name" value="<?php echo $_GET['name']; ?>"><br>
          <?php } else { ?>
               <input type="text" name="name" placeholder="Name"><br>
          <?php } ?>

          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" name="uname" placeholder="User Name" value="<?php echo $_GET['uname']; ?>"><br>
          <?php } else { ?>
               <input type="text" name="uname" placeholder="User Name"><br>
          <?php } ?>

          <input type="text" name="email" class="frm-control" placeholder="Email">

          <input type="text" name="phone" class="frm-control" placeholder="Phone Number">

          <input type="password" name="password" placeholder="Password"><br>

          <input type="password" name="re_password" placeholder="Confirm Password"><br>
          <div class="foot-form">
               <button type="submit">Sign Up</button>
               <a href="login1.php" class="ca">Already have an account?</a>
          </div>

     </form>
</body>

</html>