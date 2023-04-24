<?php 
session_start();
$_SESSION['login1'] = false; 
header("Location:/checkout.php");
exit;

?>