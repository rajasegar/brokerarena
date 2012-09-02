<?php include 'header.php';?>
	<div id="content_wrap">
	    <div id="content" class="container_12 clearfix">
	        <div class="grid_9">
	            <div class="box">
	                <h1>User - Registration Process Complete</h1>
					<?php

if( (isset($_GET['email'])) && (isset($_GET['code'])))
{
	$email = sanitizeString($_GET['email']);
	$code = sanitizeString($_GET['code']);
	$result = $userTools->activate_user($email,$code);
	if($result)
	{
		echo "<div class='msg_info'><p>Your account has been activated</p></div>";

	}
	else
	{
		echo "<div class='msg_error'><p>Invalid Confirmation code</p></div>";
		
	}

}
?>
	            </div>
	        </div>
	        <div id="sidebar" class="grid_3">
	            <?php include 'sidebar.php';?>
	        </div>
	    </div>
	</div>
<?php include 'footer.php';?>
