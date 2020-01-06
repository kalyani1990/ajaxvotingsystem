<?php
	if(!isset($_SESSION['userData'])){
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Voting System</title>
	<!-- Bootstrap 3 -->
	<link rel="stylesheet" type="text/css" href="lib/bootstrap-4/css/bootstrap.min.css" />
	<!-- Jquery -->
	<script type="text/javascript" src="lib/jquery-3.3.1.min.js"></script>
	<!-- Bootstrap 3 -->
	<script type="text/javascript" src="lib/bootstrap-4/js/bootstrap.min.js"></script>
	<!-- Jquery Validation -->
	<script type="text/javascript" src="lib/jquery-validation-1.17.0/dist/jquery.validate.min.js"></script>
</head>
<body>
		<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-info border-bottom">
		<div class="container">
		  <a class="navbar-brand" href="<?php echo $baseUrl; ?>">Ajax Voting System</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav ml-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="<?php echo $baseUrl; ?>">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="<?php echo $baseUrl; ?>/update-profile.php">My Dashboard</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="signout.php">Signout</a>
		      </li>
		    </ul>
		  </div>
		</div>
		</nav>
	</header>
	<div class="container">