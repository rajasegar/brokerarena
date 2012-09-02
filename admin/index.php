<?php
require_once 'includes/global.inc.php';
$error = $user = $pass = "";
if(isset($_SESSION['admin'])) {
	header("Location:admin.php");
}
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
		if($userTools->login_admin($user,$pass))
		{
			header("Location:admin.php");
		}
		else
		{
			$error = "<div class='alert alert-error'>Incorrect username or password. Please try again.</div>";
		}
	}
}
?>
<?php include 'header.php'?>
<div class="container-fluid">
<div class="row">
<div class="span4 offset4">
	<div class="well">
		<h1>Admin Login</h1>
		<?php echo $error; ?>
		<form method='post' action='' onsubmit="return validateUserForm()">
		<table>
		<tr><td>Username </td><td><input type='text' maxlength='16' name='user'	id="txtUserId" /></td></tr>
		<tr><td>Password </td><td><input type='password' maxlength='16' name='pass'	id="txtUserPwd" /></td></tr>
		<tr><td colspan="2"><br/></td></tr>
		<tr><td><input type='submit' value='Login' class="btn btn-primary" /></td>
		<td><input type='reset' value='Reset' class="btn" /></td></tr>
		</table>
		</form>
	</div>
</div>
</div>
</div>
<?php include 'footer.php';?>
