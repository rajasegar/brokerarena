<?php include 'header.php';?>
	<div class="container">
	    <div class="row">
	        <div class="span9">
	            <div class="well">
	                <h1>Broker - Registration Process Complete</h1>
					<?php

if( (isset($_GET['email'])) && (isset($_GET['code'])))
{
	$email = sanitizeString($_GET['email']);
	$code = sanitizeString($_GET['code']);
	$result = $userTools->activate_broker($email,$code);
	if($result)
	{
		echo "<div class='alert alert-success'><p>Your account has been activated</p></div>";
	}
	else
	{
		echo "<div class='alert alert-error'><p>Invalid Confirmation code</p></div>";
	
	}

}
?>
	            </div>
	        </div>
	        <div id="sidebar" class="span3">
	            <?php include 'sidebar.php';?>
	        </div>
	    </div>
	</div>
<?php include 'footer.php';?>
