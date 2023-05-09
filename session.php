<?php
session_start();

function isAdminLogged() {
	//var_dump($_SESSION['current_username']);
	if(isset($_SESSION['TenDangNhap'])) {
		//var_dump($_SESSION['isAdmin']);
		if ($_SESSION['MaNguoiDung'] == true)
			return true;
	}
	
	return false;
}
?>