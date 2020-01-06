<?php
	require('functions.php');
	if(!isset($_SESSION['userData'])){
		header("location:index.php");
	}
?>
<?php require('common/header.php'); ?>
		<div class="row mt-5">
			<div class="col-sm-9">
				<?php
					$currentTime=time();
					$allSubjects=get_all_subjects($currentTime);
					if($allSubjects['totalResult']>0){
						$i=1;
						foreach($allSubjects['allData'] as $s){
							$dbRes=get_unvoted_by_user($s['subject_id']);
							if($dbRes['bool']==true){
								continue;
							}
							?>
							<table class="table table-hover table-bordered table<?php echo $i; ?>">
								<tr class="bg-light">
									<th><?php echo $i; ?></th>
									<th>
										<?php echo $s['subject_title']; ?>
										<small class="float-right badge badge-danger">Expire Time: <?php echo date('d/m/Y',$s['expiry_time']); ?></small>
									</th>
								</tr>
								<tr>
									<th><input data-table="table<?php echo $i; ?>" class="select-option" name="voteOp<?php echo $s['subject_id']; ?>" value="1_<?php echo $s['subject_id'].'_'.$_SESSION['userData']['user_id']; ?>" type="radio" /></th>
									<td><?php echo $s['subject_opt_1']; ?></td>
								</tr>
								<tr>
									<th><input data-table="table<?php echo $i; ?>" class="select-option" name="voteOp<?php echo $s['subject_id']; ?>" value="2_<?php echo $s['subject_id'].'_'.$_SESSION['userData']['user_id']; ?>" type="radio" /></th>
									<td><?php echo $s['subject_opt_2']; ?></td>
								</tr>
								<tr>
									<th><input data-table="table<?php echo $i; ?>" class="select-option" name="voteOp<?php echo $s['subject_id']; ?>" value="3_<?php echo $s['subject_id'].'_'.$_SESSION['userData']['user_id']; ?>" type="radio" /></th>
									<td><?php echo $s['subject_opt_3']; ?></td>
								</tr>
								<tr>
									<th><input data-table="table<?php echo $i; ?>" class="select-option" name="voteOp<?php echo $s['subject_id']; ?>" value="4_<?php echo $s['subject_id'].'_'.$_SESSION['userData']['user_id']; ?>" type="radio" /></th>
									<td><?php echo $s['subject_opt_4']; ?></td>
								</tr>
								<tr>
									<th><input data-table="table<?php echo $i; ?>" class="select-option" name="voteOp<?php echo $s['subject_id']; ?>" value="5_<?php echo $s['subject_id'].'_'.$_SESSION['userData']['user_id']; ?>" type="radio" /></th>
									<td><?php echo $s['subject_opt_5']; ?></td>
								</tr>
							</table>
							<?php
							$i++;
						}
					}else{
						echo '<p class="alert alert-warning">No Data Found!!</p>';
					}
				?>
			</div>
			<!-- Right Sidebar -->
			<?php include('right-sidebar.php'); ?>
		</div>
	</div>
<!-- Custom Js -->
<script type="text/javascript" src="js/custom.js"></script>
<?php require('common/footer.php'); ?>