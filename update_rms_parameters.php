<?php 
//update_acctopen_modes.php

require_once 'includes/global.inc.php';
if(isset($_SESSION['user']))
{
	$user = unserialize($_SESSION["user"]);
	$params = array();
	foreach ($_POST['chkRMS'] as $value) 
	{ 
		array_push($params,$value);
		
	} 
	//print_r($params);
	$result = $user->setRMSParameters($params);
	
	$margin_params = array();
	foreach ($_POST['chkRMS_Margin'] as $value) 
	{ 
		array_push($margin_params,$value);
		
	} 
	
	$result = $user->setRMS_MarginParameters($margin_params);
	
	if($result)
	{
		echo "Risk Management -  Parameters successfully updated!";
	}
	else
	{
		echo "Database update failed";
	}
}

?>