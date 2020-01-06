<?php
require('../functions.php');
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$dbRes=delete_subject($id);
	if($dbRes['bool']==true){
		header("location:subjects.php");
	}else{
		echo $dbRes['error'];
	}
}
?>