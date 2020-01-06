<?php
	session_start();
	if(isset($_SESSION['userData'])){
		unset($_SESSION['userData']);
		header("location:index.php");
	}
?>