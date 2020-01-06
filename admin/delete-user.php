<?php
require('../functions.php');
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$dbRes=delete_user($id);
	if($dbRes['bool']==true){
		header("location:users.php");
	}else{
		echo $dbRes['error'];
	}
}
?>