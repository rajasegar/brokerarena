<?php
require_once 'includes/global.inc.php';
$user = $pass = "";
$error = $_GET['err'];
if (isset($_POST['user']))
{
	$user = sanitizeString($_POST['user']);
	$pass = md5(sanitizeString($_POST['pass']));
	if ($user == "" || $pass == "")
	{
		$error = "<div class='alert alert-error'>Not all fields were entered</div>";
	}
	else
	{
		if($userTools->login_broker($user,$pass))
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
	    <div id="content" class="row">
	        <div class="span9">
	            <div class="well">
	                <h1>Broker - Log In</h1>
					<?php echo $error;?>
					<form method='post' action='' onsubmit="return validateBrokerForm()">
					<table>
					<tr><td>Username </td><td><input type='text' maxlength='16' name='user'	id="txtBrokerId"/></td></tr>
					<tr><td>Password </td><td><input type='password' maxlength='16' name='pass'	id="txtBrokerPwd"/></td></tr>
					<tr><td colspan="2"><br/></td></tr>
					<tr><td><input type='submit' value='Login' class="btn btn-primary" /></td>
					<td><input type='reset' value='Reset' class="btn" /></td></tr>
					</table>
					<a href="forget_pwd.php">Forgot your password?</a>
					</form>
	            </div>
	        </div>
	        <div id="sidebar" class="span3">
	            <?php include 'sidebar.php';?>
	        </div>
	    </div>
	</div>
<?php include 'footer.php';?>
<script type="text/javascript">
function validateBrokerForm()
{
	$('input').removeClass('reqField');
	$('div.msg_validation').remove();
	
	// Username
	if($('#txtBrokerId').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('BrokerID should not be empty.')
				   .insertAfter('#txtBrokerId');
		$('#txtBrokerId').addClass('reqField')
					.focus();
		return false;
	}
	
	// Password
	if($('#txtBrokerPwd').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Password should not be empty.')
				   .insertAfter('#txtBrokerPwd');
		$('#txtBrokerPwd').addClass('reqField')
					.focus();
		return false;
	}
	return true;
}
</script>
