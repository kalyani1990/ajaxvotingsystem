<?php
	require('functions.php');
	if(isset($_SESSION['userData'])){
		header("location:profile.php");
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
	<div class="container">
		<div class="row mt-5">
			<div class="col-sm-6 offset-sm-3">
				<h3 class="mb-4">Before Vote, Please Login or Signup</h3>
				<ul class="nav nav-tabs" id="myTab" role="tablist">
				  <li class="nav-item">
				    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#login" role="tab" aria-controls="home">Login</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#signup" role="tab">Signup</a>
				  </li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<!-- Login Form Start -->
				  <div class="tab-pane fade show active border border-top-0 p-3" id="login" role="tabpanel">
				  			<p class="ajax-res"></p>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
						    <div class="col-sm-10">
						      <input type="email" name="_email" class="form-control email" placeholder="Email">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
						    <div class="col-sm-10">
						      <input type="password" name="_pwd" class="form-control password" placeholder="Password">
						    </div>
						  </div>
					    <input type="submit" id="loginBtn" value="Login" class="btn btn-danger mt-3" />
				  </div>
				  <!-- Login Form End -->
				  <!-- Signup Form Start -->
				  <div class="tab-pane fade border border-top-0 p-3" id="signup" role="tabpanel">
				  		<!-- <form action="" id="signupForm" method="post"> -->
				  			<p class="ajax-res"></p>
			  				<div class="form-group row">
							    <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
							    <div class="col-sm-10">
							      <input type="text" name="_name" class="form-control full_name_r" placeholder="Full Name">
							    </div>
						  	</div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
						    <div class="col-sm-10">
						      <input type="email" name="_email" class="form-control email_r" placeholder="Email">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
						    <div class="col-sm-10">
						      <input type="password" name="_pwd" class="form-control pwd_r" placeholder="Password">
						    </div>
						  </div>
						  <input type="submit" value="Register" class="btn btn-danger mt-3" id="registerBtn" />
						<!-- </form> -->
				  </div>
				  <!-- Signup Form End -->
				</div>
			</div>
		</div>
<!-- Jquery Validate -->
<script type="text/javascript">
	$(document).ready(function(){
		// Login Form Validation
		$("#loginForm").validate({
			rules:{
				'_email':"required",
				'_pwd':"required"
			}
		});
		// Sighup form validation
		$("#signupForm").validate({
			rules:{
				'_name':"required",
				'_email':"required",
				'_pwd':"required"
			}
		});
	});
</script>
<!-- Custom Js -->
<script type="text/javascript" src="js/custom.js"></script>
<?php require('common/footer.php'); ?>
