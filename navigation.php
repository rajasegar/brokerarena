<ul class="nav">
	<li class="divider-vertical"></li>
	<li><a href="brokers.php?recordstart=0">Brokers</a></li>
	<!--<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Brokers<b class="caret"></b></a>
		<ul class="dropdown-menu">
			<li><a href="brokers.php?recordstart=0">Brokers List</a></li>
			<li><a href="compare.php">Compare Brokers</a></li>
			<li><a href="power_search.php">Power Search</a></li>
		</ul>
	</li>
	<li class="divider-vertical"></li>
	<li><a href="reviews.php">Reviews</a></li>-->
	<li class="divider-vertical"></li>
	<li><a href="news.php">News</a></li>
	<!--<li class="divider-vertical"></li>
	<li><a href="blog/">Blog</a></li>-->
	<li class="divider-vertical"></li>
	<li><a href="glossary.php">Glossary</a></li>
</ul>
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
		echo "<p class='navbar-text pull-right'>Logged in as <a href='broker_home.php'>$user->m_BrokerName</a> | ";
		echo "<a href='logout.php'>Log out</a></p>";
	}
	else	//user
	{
		echo "<p class='navbar-text pull-right'>Logged in as <a href='user_profile.php'>$user->m_FirstName $user->m_LastName</a> | ";
		echo "<a href='logout.php'>Log out</a></p>";
	}
	
}
else
{
?>

	<a href="login.php" class="btn btn-primary">Login</a>
	<a href="signup.php" class="btn">Signup</a>
	
	
<?php 	
}
?>

