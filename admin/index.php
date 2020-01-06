<?php
	require('header.php');
?>
<!-- Content Start -->
<div class="col-sm-10">
	<h3 class="border-bottom pb-2 mb-3">List Subjects 
		<a href="add-subject.php" class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i></a>
	</h3>
	<table class="table table-bordered table-hover">
		<thead>
			<tr class="bg-light">
				<th>#</th>
				<th>Title</th>
				<th>Opt 1</th>
				<th>Opt 2</th>
				<th>Opt 3</th>
				<th>Opt 4</th>
				<th>Opt 5</th>
				<th>Start</th>
				<th>Expire</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$subjects=get_all_subjects();
			if($subjects['totalResult']>0){
				foreach($subjects['allData'] as $d){
					$totalVotes=count_total_votes_via_subject($d['subject_id']);
					?>
					<tr>
						<td><?php echo $d['subject_id']; ?></td>
						<td><?php echo substr($d['subject_title'],0,30); ?>...</td>
						<td><?php echo $d['subject_opt_1']; ?></td>
						<td><?php echo $d['subject_opt_2']; ?></td>
						<td><?php echo $d['subject_opt_3']; ?></td>
						<td><?php echo $d['subject_opt_4']; ?></td>
						<td><?php echo $d['subject_opt_5']; ?></td>
						<td><?php echo date('d/m/Y',$d['start_time']); ?></td>
						<td><?php echo date('d/m/Y',$d['expiry_time']); ?></td>
						<td>
							<span class="badge badge-secondary"><?php echo $totalVotes['totalVotes']; ?></span>
							<a href="edit-subject.php?id=<?php echo $d['subject_id']; ?>" class="badge badge-info"><i class="fa fa-edit"></i></a>
							<a onclick="return confirm('Are you sure to delete this?')" href="delete-subject.php?id=<?php echo $d['subject_id']; ?>" class="badge badge-danger"><i class="fa fa-trash"></i></a>
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