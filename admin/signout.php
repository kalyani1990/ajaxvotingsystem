<?php
	session_start();
	if(isset($_SESSION['adminData']) && $_SESSION['adminData']==1){
		unset($_SESSION['adminData']);
		header("location:admin-login.php");
	}
?>