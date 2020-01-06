$(document).ready(function(){
	// Register User
	$("#registerBtn").on('click',function(){
		var _name=$(".full_name_r").val();
		var _email=$(".email_r").val();
		var _pwd=$(".pwd_r").val();
		if(_name=='' || _email=='' || _pwd==''){
			$(".ajax-res").html('All fields are required!!').css({color:'red'});
			return false;
		}
		// Run Ajax
		$.ajax({
			url:'../vote/functions.php',
			method:'post',
			data:{action:'add_user',full_name:_name,email:_email,pwd:_pwd},
			success:function(response){
				$(".ajax-res").html(response);
				$(".full_name_r").val('');
				$(".email_r").val('');
				$(".pwd_r").val('');
			}
		});
	});
	
	// Login User
	$("#loginBtn").on('click',function(){
		var _email=$(".email").val();
		var _pwd=$(".password").val();
		if(_email=='' || _pwd==''){
			$(".ajax-res").html('All fields are required!!').css({color:'red'});
			return false;
		}
		// Run Ajax
		$.ajax({
			url:'../vote/functions.php',
			method:'post',
			data:{action:'login_user',email:_email,pwd:_pwd},
			success:function(response){
				console.log(response);
				if(response=='0'){
					$(".ajax-res").html('<span class="text-danger">Invalid Email/Password</span>');
				}else{
					window.location.href='http://localhost/projects/corephp/vote/profile.php';
				}
				$(".email").val('');
				$(".pwd").val('');
			}
		});
	});
}); // Close Document Ready 


// Submit Vote with Ajax
$(".select-option").on('change',function(){
	var _optSubject=$(this).val();
	var _thisTable=$(this).attr('data-table');
	if(_optSubject==''){
		alert('please select option!!');
		return false;
	}
	// Run Ajax
	$.ajax({
		url:'../vote/functions.php',
		method:'post',
		data:{action:'submit_vote',voteData:_optSubject},
		success:function(response){
			console.log(response);
			if(response=='0'){
				$(".ajax-res").html('<span class="text-danger">Invalid Voting!!</span>');
			}else{
				$("."+_thisTable).fadeOut();
			}
		}
	});
});
