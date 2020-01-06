<?php
	$conn=mysqli_connect("localhost","root","","pp_core_voting");

	$baseUrl='http://localhost/projects/corephp/vote';

	if(isset($_POST['action'])){
		$action=$_POST['action'];
		$action();
	}

	session_start();

	// For Debug
	function _t($data){
		echo '<pre>';
		print_r($data);
		echo '</pre>';
	}

// ========================= Admin Functionality Start
	function admin_login($data){
		$res=array();
		global $conn;
		$username=$_POST['username'];
		$pwd=md5($_POST['pwd']);
		$sql="SELECT * FROM v_admin WHERE username='$username' AND pwd='$pwd'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			$res['bool']=true;
			$_SESSION['adminData']=1;
		}else{
			$res['bool']=false;
			$_SESSION['adminData']=0;
		}
		return $res;
	}

	// Get All Users
	function get_all_users(){
		$res=array();
		global $conn;
		$sql="SELECT * FROM v_users ORDER BY user_id DESC";
		$result=mysqli_query($conn,$sql);
		$totalResult=mysqli_num_rows($result);
		if($totalResult>0){
			$res['bool']=true;
			$res['totalResult']=$totalResult;
			while($data=mysqli_fetch_assoc($result)){
				$res['allData'][]=$data;
			}
		}else{
			$res['totalResult']=$totalResult;
			$res['bool']=false;
		}
		return $res;
	}

	// Delete User
	function delete_user($id){
		$res=array();
		global $conn;
		$sql="DELETE FROM v_users WHERE user_id='$id'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_affected_rows($conn)>0){
			$res['bool']=true;
		}else{
			$res['bool']=false;
			$res['error']=mysqli_error($conn);
		}
		return $res;
	}

	

	// Add User
	function add_user(){
		global $conn;
		$full_name=$_POST['full_name'];
		$email=$_POST['email'];
		$pwd=md5($_POST['pwd']);
		$sql="INSERT INTO v_users (full_name,email,pwd) VALUES ('$full_name','$email','$pwd')";
		$result=mysqli_query($conn,$sql);
		if(mysqli_affected_rows($conn)>0){
			echo 'You have registered successfully';
		}else{
			echo mysqli_error($conn);
		}
	}

	// Get User Detail
	function get_user_detail($user_id){
		$res=array();
		global $conn;
		$sql="SELECT * FROM v_users WHERE user_id='$user_id'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			$res['bool']=true;
			$res['allData']=mysqli_fetch_assoc($result);
		}else{
			$res['bool']=false;
		}
		return $res;
	}

	// Login User
	function login_user(){
		session_start();
		global $conn;
		$res=array();
		$email=$_POST['email'];
		$pwd=md5($_POST['pwd']);
		$sql="SELECT * FROM v_users WHERE email='$email' AND pwd='$pwd'";
		$result=mysqli_query($conn,$sql);
		$totalResult=mysqli_num_rows($result);
		if($totalResult>0){
			$data=mysqli_fetch_assoc($result);
			$_SESSION['userData']=$data;
		}else{
			echo '0';
		}
	}

// -----------------------------------------------------------------------
	// Admin Section Start

// Add Subjects
	function add_subject($data_array){
		global $conn;
		$res=array();
		$title=$data_array['title'];
		$sub_opt_1=$data_array['sub_opt_1'];
		$sub_opt_2=$data_array['sub_opt_2'];
		$sub_opt_3=$data_array['sub_opt_3'];
		$sub_opt_4=$data_array['sub_opt_4'];
		$sub_opt_5=$data_array['sub_opt_5'];
		$startTime=time();
		$endTime=$startTime+(7*86400);
		$sql="INSERT INTO v_subjects (subject_title,subject_opt_1,subject_opt_2,subject_opt_3,subject_opt_4,subject_opt_5,start_time,expiry_time) VALUES ('$title','$sub_opt_1','$sub_opt_2','$sub_opt_3','$sub_opt_4','$sub_opt_5','$startTime','$endTime')";
		$result=mysqli_query($conn,$sql);
		if(mysqli_affected_rows($conn)>0){
			$res['bool']=true;
		}else{
			$res['bool']=false;
			$res['error']=mysqli_error($conn);
		}
		return $res;
	}

// Update Subjects
function update_subject($data_array,$id){
	global $conn;
	$res=array();
	$title=$data_array['title'];
	$sub_opt_1=$data_array['sub_opt_1'];
	$sub_opt_2=$data_array['sub_opt_2'];
	$sub_opt_3=$data_array['sub_opt_3'];
	$sub_opt_4=$data_array['sub_opt_4'];
	$sub_opt_5=$data_array['sub_opt_5'];
	$sql="UPDATE v_subjects SET subject_title='$title',subject_opt_1='$sub_opt_1',subject_opt_2='$sub_opt_2',subject_opt_3='$sub_opt_3',subject_opt_4='$sub_opt_4',subject_opt_5='$sub_opt_5' WHERE subject_id='$id'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_affected_rows($conn)>0){
		$res['bool']=true;
	}else{
		$res['bool']=false;
		$res['error']=mysqli_error($conn);
	}
	return $res;
}

// Get All Subjects
	function get_all_subjects($currentTime=null){
		$res=array();
		global $conn;
		if($currentTime==null){
			$sql="SELECT * FROM v_subjects ORDER BY subject_id DESC";
		}else{
			$sql="SELECT * FROM v_subjects WHERE start_time<=$currentTime AND expiry_time>=$currentTime ORDER BY subject_id DESC";
		}
		$result=mysqli_query($conn,$sql);
		$totalResult=mysqli_num_rows($result);
		if($totalResult>0){
			$res['bool']=true;
			$res['totalResult']=$totalResult;
			while($data=mysqli_fetch_assoc($result)){
				$res['allData'][]=$data;
			}
		}else{
			$res['totalResult']=$totalResult;
			$res['bool']=false;
		}
		return $res;
	}

// Get One Subjects
function get_one_subject($id){
	$res=array();
	global $conn;
	$sql="SELECT * FROM v_subjects WHERE subject_id='$id'";
	$result=mysqli_query($conn,$sql);
	$totalResult=mysqli_num_rows($result);
	if($totalResult>0){
		$res['bool']=true;
		$res['allData']=mysqli_fetch_assoc($result);
	}else{
		$res['bool']=false;
	}
	return $res;
}

// Delete Subject
function delete_subject($id){
	$res=array();
	global $conn;
	$sql="DELETE FROM v_subjects WHERE subject_id='$id'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_affected_rows($conn)>0){
		$res['bool']=true;
	}else{
		$res['bool']=false;
		$res['error']=mysqli_error($conn);
	}
	return $res;
}

// Submit Voting
function submit_vote(){
	global $conn;
	$voteData=explode('_',$_POST['voteData']);
	$option=$voteData[0];
	$subject=$voteData[1];
	$user=$voteData[2];
	$sql="INSERT INTO v_user_votes (subject_id,opt_no,user_id) VALUES ('$subject','$option','$user')";
	$result=mysqli_query($conn,$sql);
	if(mysqli_affected_rows($conn)>0){
		echo '1';
	}else{
		echo '0';
	}
}

// Get All Votes Which are not answered by user
function get_unvoted_by_user($subject_id){
	$res=array();
	$userId=$_SESSION['userData']['user_id'];
	global $conn;
	$sql="SELECT * FROM v_user_votes WHERE user_id='$userId' AND subject_id='$subject_id'";
	$result=mysqli_query($conn,$sql);
	$totalResult=mysqli_num_rows($result);
	if($totalResult>0){
		$res['bool']=true;
	}else{
		$res['bool']=false;
		$res['query']="SELECT * FROM v_user_votes WHERE user_id!='$userId' AND subject_id='$subject_id'";
	}
	return $res;
}

function update_profile($full_name){
	global $conn;
	$res=array();
	$full_name=$full_name;
	$userId=$_SESSION['userData']['user_id'];
	$sql="UPDATE v_users SET full_name='$full_name' WHERE user_id='$userId'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_affected_rows($conn)>0){
		$res['bool']=true;
	}else{
		$res['bool']=false;
		$res['error']=mysqli_error($conn);
	}
	return $res;
}

// Check Old Password
function check_old_password($old_pwd){
	$res=array();
	global $conn;
	$oldPwd=md5($old_pwd);
	$user_id=$_SESSION['userData']['user_id'];
	$sql="SELECT * FROM v_users WHERE pwd='$oldPwd' AND user_id='$user_id'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
		$res['bool']=true;
	}else{
		$res['bool']=false;
	}
	return $res;
}

function change_password($new_pwd){
	global $conn;
	$res=array();
	$new_pwd=md5($new_pwd);
	$userId=$_SESSION['userData']['user_id'];
	$sql="UPDATE v_users SET pwd='$new_pwd' WHERE user_id='$userId'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_affected_rows($conn)>0){
		$res['bool']=true;
	}else{
		$res['bool']=false;
		$res['error']=mysqli_error($conn);
	}
	return $res;
}

// Fetch My Votes
function get_my_votes(){
	$res=array();
	global $conn;
	$userId=(int)$_SESSION['userData']['user_id'];
	$sql="SELECT * FROM v_user_votes WHERE user_id='$userId'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
		$res['bool']=true;
		while($data=mysqli_fetch_assoc($result)){
			$res['allData'][]=$data;
		}
	}else{
		$res['bool']=false;
	}
	return $res;
}

// Count Total Votes Via Subject
function count_total_votes_via_subject($subject_id){
	$res=array();
	global $conn;
	$sql="SELECT * FROM v_user_votes WHERE subject_id='$subject_id'";
	$result=mysqli_query($conn,$sql);
	$res['totalVotes']=mysqli_num_rows($result);
	return $res;
}

?>