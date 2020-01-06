<?php
	require('functions.php');
	if(!isset($_SESSION['userData'])){
		header("location:index.php");
	}
?>
<?php require('common/header.php'); ?>
		<div class="row mt-5">
			<div class="col-sm-9">
				<h3 class="border-bottom pb-2">Update Profile</h3>
				<?php
				if(isset($_POST['submit'])){
					$fullName=$_POST['full_name'];
					$dbRes=update_profile($fullName);
					if($dbRes['bool']==true){
						echo '<p class="alert alert-success">Profile has been updated.</p>';
					}else{
						echo '<p class="alert alert-warning">Nothing has been chnaged.</p>';
					}
				}
				$userId=$_SESSION['userData']['user_id'];
				$userDetail=get_user_detail($userId);
				?>
				<table class="table table-bordered mt-3">
					<form action="" method="post">
					<tr>
						<th>Full Name</th>
						<td><input type="text" value="<?php echo $userDetail['allData']['full_name']; ?>" name="full_name" class="form-control" /></td>
					</tr>
					<tr>
						<th>Email</th>
						<td><input type="email" readonly value="<?php echo $userDetail['allData']['email']; ?>" name="email" class="form-control" /></td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="submit" value="Update" name="submit" class="btn btn-danger" />
						</td>
					</tr>
					</form>
				</table>
			</div>
			<!-- Right Sidebar -->
			<?php include('right-sidebar.php'); ?>
		</div>
	</div>
<!-- Custom Js -->
<script type="text/javascript" src="js/custom.js"></script>
<?php require('common/footer.php'); ?>