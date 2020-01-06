<?php require('../functions.php'); ?>
<?php 
	if(!isset($_SESSION['adminData']) && $_SESSION['adminData']!=1){
		header("location:admin-login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.3.0/css/font-awesome.min.css" />
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="../lib/bootstrap-4/css/bootstrap.min.css" />
</head>
<body>
	<header>
		<!-- Navigation -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
		  <a class="navbar-brand" href="<?php echo $baseUrl; ?>/admin">Admin - Ajax Voting System</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav ml-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="<?php echo $baseUrl; ?>/admin">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" target="_blank" href="<?php echo $baseUrl; ?>">Front Website</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="<?php echo $baseUrl; ?>/admin">Dashboard</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="signout.php">Signout</a>
		      </li>
		    </ul>
		  </div>
		</nav>
	</header>
	<section class="container-fluid">
		<div class="row mt-3">
			<!-- Left Sidebar Start -->
			<div class="col-sm-2">
				<div class="list-group">
					<a class="list-group-item" href="<?php echo $baseUrl; ?>/admin/subjects.php">Subjects</a>
					<a class="list-group-item" href="<?php echo $baseUrl; ?>/admin/users.php">Users</a>
				</div>
			</div>