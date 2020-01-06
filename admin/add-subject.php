<?php
	require('header.php');
?>
			<!-- Content Start -->
			<div class="col-sm-9">
				<h3 class="border-bottom pb-2 mb-3">Add Subject
					<a href="subjects.php" class="btn btn-success btn-sm float-right"><i class="fa fa-long-arrow-left"></i></a>
				</h3>
				<?php
				if(isset($_POST['add_data'])){
					$dbRes=add_subject($_POST);
					if($dbRes['bool']==true){
						echo '<p class="alert alert-success">Data has been added.</p>';
					}else{
						echo '<p class="alert alert-success">'.$dbRes['error'].'</p>';
					}
				}
				?>
				<table class="table table-bordered">
					<form method="post" action="">
					<tr>
						<th>Subject Title <span class="text-danger">*</span></th>
						<td><input type="text" required name="title" class="form-control"></td>
					</tr>
					<tr>
						<th>Subject Option 1 <span class="text-danger">*</span></th>
						<td><input type="text" required name="sub_opt_1" class="form-control"></td>
					</tr>
					<tr>
						<th>Subject Option 2 <span class="text-danger">*</span></th>
						<td><input type="text" required name="sub_opt_2" class="form-control"></td>
					</tr>
					<tr>
						<th>Subject Option 3 <span class="text-danger">*</span></th>
						<td><input type="text" required name="sub_opt_3" class="form-control"></td>
					</tr>
					<tr>
						<th>Subject Option 4 <span class="text-danger">*</span></th>
						<td><input type="text" required name="sub_opt_4" class="form-control"></td>
					</tr>
					<tr>
						<th>Subject Option 5 <span class="text-danger">*</span></th>
						<td><input type="text" required name="sub_opt_5" class="form-control"></td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="submit" required class="btn btn-danger" name="add_data" value="Add Data" />
						</td>
					</tr>
				</form>
				</table>
			</div>
<?php
include('footer.php');
?>