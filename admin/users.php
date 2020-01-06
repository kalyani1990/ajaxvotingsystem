<?php
	require('header.php');
?>
<!-- Content Start -->
<div class="col-sm-10">
	<h3 class="border-bottom pb-2 mb-3">List Users</h3>
	<table class="table table-bordered table-hover">
		<thead>
			<tr class="bg-light">
				<th>#</th>
				<th>Full Name</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$subjects=get_all_users();
			if($subjects['totalResult']>0){
				foreach($subjects['allData'] as $d){
					?>
					<tr>
						<td><?php echo $d['user_id']; ?></td>
						<td><?php echo $d['full_name']; ?></td>
						<td><?php echo $d['email']; ?></td>
						<td>
							<a onclick="return confirm('Are you sure to delete this?')" href="delete-user.php?id=<?php echo $d['user_id']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<?php
				}
			}else{
				?>
				<tr>
					<td colspan="10">No Result Found!!</td>
				</tr>
				<?php
			}
			?>
		</tbody>
	</table>
</div>
<?php
include('footer.php');
?>