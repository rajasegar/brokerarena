<?php 
//ajax_update_customerservices.php

require_once 'includes/global.inc.php';
if(isset($_SESSION['broker_id']))
{
	$id = $_SESSION['broker_id'];
	$user = $userTools->getBroker($id);
	
	//SMS Alerts
	$params = array();
	foreach ($_POST['chkCustomerService'] as $value) 
	{ 
		array_push($params,$value);
		
	} 
	$result = $user->setCustomerServices($params);
		
	if($result)
	{
		echo "Customer Service Parameters successfully updated!";
	}
	else
	{
		echo "Database update failed";
	}
}

?>