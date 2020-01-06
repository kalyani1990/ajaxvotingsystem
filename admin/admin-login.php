<?php require('../functions.php'); ?>
<?php
	if(isset($_SESSION['adminData']) && $_SESSION['adminData']==1){
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.3.0/css/font-awesome.min.css" />
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="../lib/bootstrap-4/css/bootstrap.min.css" />
</head>
<body>
	<section class="container-fluid">
		<div class="row mt-5">
			<div class="col-sm-4 offset-sm-4">
				<div class="card">
					<h3 class="card-header">Admin Login</h3>
					<div class="card-body">
						<?php
							if(isset($_POST['submit'])){
								$dbRes=admin_login($_POST);
								// _t($dbRes);
								if($dbRes['bool']==true){
									header("location:index.php");
								}
							}
						?>
						<form action="" method="post">
							<table class="table table-bordered">
								<tr>
									<th>Username</th>
									<td><input type="text" name="username" class="form-control" placeholder="Username"></td>
								</tr>
								<tr>
									<th>Password</th>
									<td><input type="password" name="pwd" class="form-control" placeholder="*****"></td>
								</tr>
								<tr>
									<td colspan="2">
										<input type="submit" name="submit" class="btn btn-danger" />
									</td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>