<?php
require_once 'includes/global.inc.php';
$config = dirname(__FILE__) . '/hybridauth/config.php';
require_once( "hybridauth/Hybrid/Auth.php" );
$error = $user = $pass = "";
if(isset($_GET['provider'])) {
	// the selected provider
	$provider_name = $_GET["provider"];
	 
	try{
	// initialize Hybrid_Auth with a given file
	$hybridauth = new Hybrid_Auth( $config );
	 
	// try to authenticate with the selected provider
	$adapter = $hybridauth->authenticate( $provider_name );
	 
	// then grab the user profile
	$user_profile = $adapter->getUserProfile();
	 
	# and that's it!
	 
	# beyond that, its up to you sign-in the user if he already exist on your database
	# or sign-up the user if not.
	 
	# the following pseudocode is provided only as an example:
	 
	if(!$userTools->social_signin($provider_name, $user_profile->identifier)) {
		// Form the record structure for usermaster table
		$acct_username = $user_profile->identifier;
		$firstname = $user_profile->firstName;
		$lastname = $user_profile->lastName;
		$acct_pwd = md5($user_profile->identifier);
		$acct_mail = $user_profile->email;
		$sq_type = 1;
		$secret_question = "What is your first name?";
		$answer = md5($user_profile->firstName);
		$ha_provider = $provider_name;
		$ha_uid = $user_profile->identifier;
		
		$insert_fields = array(
					"sUserName" => "'$acct_username'",
					"sFirstName" => "'$firstname'",
					"sLastName" => "'$lastname'",
					"sPassword" => "'$acct_pwd'",
					"sMailID" => "'$acct_mail'",
					"dtCreated" => "curdate()",
					"dtModified" => "curdate()",
					"bActive" => "1",
					"sSecretQuestion" => "'$secret_question'",
					"sSecretAnswer" => "'$answer'",
					"hybridauth_provider_name" => "'$ha_provider'",
					"hybridauth_provider_uid" => "'$ha_uid'");
		if(!$userTools->social_signup($insert_fields)) {
			echo "Unknown error while registering the user in the database\n";
			echo "Not enough information available for registration\n";
		}
		else {
			header("Location:index.php");
		}
	}
	else {
		header("Location:index.php");
	}
	
	}
	catch( Exception $e ){
	echo "<div class='alert alert-error'>Error: please try again!";
	echo "Original error message: " . $e->getMessage()."</div>";
	}
}
if (isset($_POST['int_login']))
{
	$user = sanitizeString($_POST['userid']);
	$pass = md5(sanitizeString($_POST['password']));
	$login_type = $_POST['login_type'];
	if ($user == "" || $pass == "")
	{
		$error = "Not all fields were entered<br />";
	}
	else
	{
		if($login_type == 0)
		{
			if($userTools->login_broker($user,$pass))
			{
				header("Location:index.php");
			}
			else
			{
				$error = "Incorrect username or password. Please try again.";
			}
		}
		else
		{
			if($userTools->login_user($user,$pass))
			{
				header("Location:index.php");
			}
			else
			{
				$error = "Incorrect username or password. Please try again.";
			}
		}
	}
}
?>
<?php include 'header.php';?>
	<div class="container">
	    <div class="row">
	        <div class="span9">
				<h1>Log In</h1>
				<div class="well">
					<div id="logintabs" class="tabbable">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tabUserLogin" data-toggle="tab">User</a></li>
						<li><a href="#tabBrokerLogin" data-toggle="tab">Broker</a></li>
					</ul>
					<div class="tab-content">
						<div id="tabUserLogin" class="tab-pane active">
							<div class="row">
								<div class="span4">
									<h2  class="pull-right">Use your social network</h2>
									<p  class="pull-right"><i class="icon icon-time"></i> Save time by using your existing account to sign in to BrokerArena</p>
									<p class="pull-right"><i class="icon icon-lock"></i> We'll never share your information  or post anything to your account without your permission.</p>
									<p><a href="login.php?provider=facebook" class="zocial facebook">Login with Facebook</a></p>
									<p><a href="login.php?provider=twitter" class="zocial twitter">Login using Twitter</a></p>
									<p><a href="login.php?provider=google" class="zocial gmail">Connect with Google</a></p>
									<p><a href="login.php?provider=linkedin" class="zocial linkedin">Connect using LinkedIn</a></p>
								</div>
								<div class="span1" id="divVSep">
									<p><span class="badge badge-inverse">OR</span></p>
									&nbsp;<br/>
									&nbsp;<br/>
									&nbsp;<br/>
									&nbsp;<br/>
									&nbsp;<br/>
									&nbsp;<br/>
									&nbsp;<br/>
									&nbsp;<br/>
									&nbsp;<br/>
									&nbsp;<br/>
									&nbsp;<br/>
									&nbsp;<br/>
								</div>
								<div class="span3">
									<form action="login_user.php" method="post">
									<fieldset>
									<label for="userid">User ID</label>
									<input type="text" name="user" id="txtUserid" class="textbox" />
									<label for="password">Password</label>
									<input type="password" name="pass" id="txtUserpassword" class="textbox" />
									<p>
									<input type="submit" id="login" value="Login" class="btn btn-primary" />
									</p>
									</fieldset>
									</form>
									<p><a href="new_user.php" >New User</a> | <a href="forget_pwd.php">Forgot your password?</a></p>
								</div>
								
							</div>
							
						</div><!-- #tabUserLogin -->
						<div id="tabBrokerLogin" class="tab-pane">
							<form action="login_broker.php" method="post">
								<fieldset>
										<label for="userid">Broker ID</label>
										<input type="text" name="user" id="userid" class="textbox" />
										<label for="password">Password</label>
										<input type="password" name="pass" id="password" class="textbox" />
									<p><input type="submit" id="login" value="Login" class="btn btn-primary" /></p>
								</fieldset>
							</form>
							<p><a href="new_broker.php" >New Broker</a> | <a href="forget_pwd.php">Forgot your password?</a></p>
						</div><!-- #tabBrokerLogin -->                
					</div><!-- .tab-content -->
		</div><!-- .tabbable -->
				</div>
				<div class='msg_error'><?php echo $error;?></div>
				
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
