<?php 
if (isset($_SESSION['user']))
{
	$user = unserialize($_SESSION["user"]);
	$login_type = $_SESSION['login_type'];
	$loggedin = TRUE;
}
else $loggedin = FALSE;
if ($loggedin)
{
	
	if ($login_type == 0) // broker
	{
		echo "<p class='uid'><strong>$user->m_BrokerName</strong></p>";
		echo "<ul class='navigation'><li><a href='update_broker.php'>Profile</a></li>
		<li><a href='update_params.php'>Parameters</a></li>
		<li><a href='changepwd_broker.php'>Change Password</a></li>
		<li><a href='logout.php'>Log out</a></li></ul>";
	}
	else	//user
	{
		echo "<p class='uid'><strong>$user->m_FirstName $user->m_LastName</strong></p>";
		echo "<ul class='navigation'><li><a href='user_profile.php'>Profile</a></li>
		<li><a href='changepwd_user.php'>Change Password</a></li>
		<li><a href='logout.php'>Log out</a></li>";
	}
}
else
{
?>	
<!-- Login Starts Here -->
		<div id="loginContainer">
			<a href="#" id="loginButton"><span>Login</span><em></em></a>
			<div style="clear:both"></div>
			<div id="loginBox">
				<div id="logintabs">
					<ul>
					<li><a href="#tabUserLogin"><span>User</span></a></li>
					<li><a href="#tabBrokerLogin"><span>Broker</span></a></li>
					</ul>
					<div id="tabUserLogin">
						<form class="loginForm" action="login_user.php" method="post">
							<fieldset id="body">
								<fieldset>
									<label for="userid">User ID</label>
									<input type="text" name="user" id="txtUserid" class="textbox" />
								</fieldset>
								<fieldset>
									<label for="password">Password</label>
									<input type="password" name="pass" id="txtUserpassword" class="textbox" />
								</fieldset>
								<fieldset>
								<a href="new_user.php" >New User?</a>
								<input type="submit" id="login" value="Login" class="button medium blue" />
								</fieldset>
								<fieldset>
									<p><a href="login.php?provider=facebook" class="zocial facebook">Connect with Facebook</a></p>
									<p><a href="login.php?provider=twitter" class="zocial twitter">Connect with Twitter</a></p>
									<p><a href="login.php?provider=google" class="zocial gmail">Connect with Google</a></p>
									<p><a href="login.php?provider=linkedin" class="zocial linkedin">Connect with LinkedIn</a></p>
								</fieldset>
							</fieldset>
							<span><a href="forget_pwd.php">Forgot your password?</a></span>
						</form>
					</div>                
					<div id="tabBrokerLogin">
						<form class="loginForm" action="login_broker.php" method="post">
							<fieldset id="body">
								<fieldset>
									<label for="userid">Broker ID</label>
									<input type="text" name="user" id="userid" class="textbox" />
								</fieldset>
								<fieldset>
									<label for="password">Password</label>
									<input type="password" name="pass" id="password" class="textbox" />
								</fieldset>
								<a href="new_broker.php" >New Broker?</a>
								<input type="submit" id="login" value="Login" class="button medium blue" />
							</fieldset>
							<span><a href="forget_pwd.php">Forgot your password?</a></span>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Login Ends Here -->
	<ul class="nav navbar-fixed">
		<li class="divider-vertical"></li>
		<li><a href='about_us.php'>About Us</a></li>
		<li><a href='contact_us.php'>Contact</a></li>
		<li><a href='terms.php'>Terms</a></li>
		<li><a href='signup.php'>Sign up</a></li>
		<li class="divider-vertical"></li>
	</ul>
<?php 	
}
?>
