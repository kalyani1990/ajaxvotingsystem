<?php
	$currentUrl=$_SERVER['PHP_SELF'];
	$currentPage=explode('/',$currentUrl);
	$thisPage=end($currentPage);
?>
<div class="col-sm-3">
	<div class="list-group shadow-lg">
		<li class="list-group-item list-group-item-warning">Settings</li>
		<a href="update-profile.php" class="list-group-item list-group-item-action <?php if($thisPage=='update-profile.php') {echo 'active';} ?>">My Profile</a>
		<a href="change-password.php" class="list-group-item list-group-item-action <?php if($thisPage=='change-password.php') {echo 'active';} ?>">Change Password</a>
		<a href="my-voting.php" class="list-group-item list-group-item-action <?php if($thisPage=='my-voting.php') {echo 'active';} ?>">My Votes</a>
	</div>
</div>