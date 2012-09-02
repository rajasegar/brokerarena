<?php 
	require_once 'includes/global.inc.php';

$error = $user = $pass = "";
if (isset($_POST['user']))
{
	$user = sanitizeString($_POST['user']);
	$pass = md5(sanitizeString($_POST['pass']));
	if ($user == "" || $pass == "")
	{
		$error = "<div class='alert alert-error'>Not all fields were entered</div><br />";
	}
	else
	{
		if($userTools->login_user($user,$pass))
		{
			header("Location:index.php");
		}
		else
		{
			$error = "<div class='alert alert-error'>Incorrect username or password. Please try again.</div>";
		}
	}
}
?>
<?php include 'header.php';?>
	<div class="container">
	    <div class="row">
	        <div class="span9">
	            <div class="well">
	                <h1>User - Log In</h1>
					<?php echo $error; ?>
					<div class="row">
						<div class="span3">
							<p></p>
							<p class="pull-right"><a href="login.php?provider=facebook" class="zocial facebook">Login with Facebook</a></p>
							<p class="pull-right"><a href="login.php?provider=twitter" class="zocial twitter">Login using Twitter</a></p>
							<p class="pull-right"><a href="login.php?provider=google" class="zocial gmail">Connect with Google</a></p>
							<p class="pull-right"><a href="login.php?provider=linkedin" class="zocial linkedin">Connect using LinkedIn</a></p>
						</div>
						<div class="span4">
							<form method='post' action='' onsubmit="return validateUserForm()">
							<table>
							<tr><td>Username </td><td><input type='text' maxlength='16' name='user'	id="txtUserId" /></td></tr>
							<tr><td>Password </td><td><input type='password' maxlength='16' name='pass'	id="txtUserPwd" /></td></tr>
							<tr><td colspan="2"><br/></td></tr>
							<tr><td><input type='submit' value='Login' class="btn btn-primary" /></td>
							<td><input type='reset' value='Reset' class="btn" /></td></tr>
							</table>
							<a href="forget_pwd.php">Forgot Password?</a>
							</form>
						</div>
					</div>
					
	            </div>
	        </div>
	        <div id="sidebar" class="span3">
	            <?php include 'sidebar.php';?>
	        </div>
	    </div>
	</div>
<?php include 'footer.php';?>
<script type="text/javascript">
function validateUserForm()
{
	$('input').removeClass('reqField');
	$('div.msg_validation').remove();
	
	// Username
	if($('#txtUserId').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('UserID should not be empty.')
				   .insertAfter('#txtUserId');
		$('#txtUserId').addClass('reqField')
					.focus();
		return false;
	}
	
	// Password
	if($('#txtUserPwd').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Password should not be empty.')
				   .insertAfter('#txtUserPwd');
		$('#txtUserPwd').addClass('reqField')
					.focus();
		return false;
	}
	return true;
}
</script>
