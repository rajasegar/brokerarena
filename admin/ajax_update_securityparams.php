<?php 
//update_securityparams.php

require_once 'includes/global.inc.php';
if(isset($_SESSION['broker_id']))
{
	$id = $_SESSION['broker_id'];
	$user = $userTools->getBroker($id);
	$params = array();
	foreach ($_POST['chkSecurity'] as $value) 
	{ 
		array_push($params,$value);
		
	} 
	//print_r($params);
	$result = $user->setSecurityParameters($params);
	
	if($result)
	{
		echo "Security Parameters successfully updated!";
	}
	else
	{
		echo "Database update failed";
	}
}

?>