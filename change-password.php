<?php
	require('functions.php');
	if(!isset($_SESSION['userData'])){
		header("location:index.php");
	}
?>
<?php require('common/header.php'); ?>
		<div class="row mt-5">
			<div class="col-sm-9">
				<h3 class="border-bottom pb-2">Change Password</h3>
				<?php
				if(isset($_POST['submit'])){
					$old_pwd=$_POST['old_pwd'];
					$new_pwd=$_POST['new_pwd'];
					$checkPassword=check_old_password($old_pwd);
					if($checkPassword['bool']==true){
						$dbRes=change_password($new_pwd);
						if($dbRes['bool']==true){
							echo '<p class="alert alert-success">Password has been changed.</p>';
						}else{
							echo '<p class="alert alert-warning">Nothing has been chnaged.</p>';
						}
					}else{
						echo '<p class="alert alert-warning">Old password not matched!!</p>';
					}
				}
				?>
				<table class="table table-bordered mt-3">
					<form action="" method="post">
					<tr>
						<th>Old Password</th>
						<td><input type="password" name="old_pwd" class="form-control" /></td>
					</tr>
					<tr>
						<th>New Password</th>
						<td><input type="password" name="new_pwd" class="form-control" /></td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="submit" name="submit" value="Change Password" class="btn btn-danger" />
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