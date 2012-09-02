<?php 
//ajax_update_vasparams.php

require_once 'includes/global.inc.php';
if(isset($_SESSION['user']))
{
	$user = unserialize($_SESSION["user"]);
	
	//SMS Alerts
	$params = array();
	foreach ($_POST['chkSMSAlert'] as $value) 
	{ 
		array_push($params,$value);
		
	} 
	$result = $user->setSMSAlerts($params);
	
	//Research
	$params = array();
	foreach ($_POST['chkResearch'] as $value) 
	{ 
		array_push($params,$value);
		
	} 
	$result = $user->setResearchParams($params);
	
	//SMS Query
	$params = array();
	foreach ($_POST['chkSMSQuery'] as $value) 
	{ 
		array_push($params,$value);
		
	} 
	$result = $user->setSMSQuery($params);
	
	//VAS
	$params = array();
	foreach ($_POST['chkVAS'] as $value) 
	{ 
		array_push($params,$value);
		
	} 
	$result = $user->setVASParams($params);
	
	
	
	if($result)
	{
		echo "Value Added Service Parameters successfully updated!";
	}
	else
	{
		echo "Database update failed";
	}
}

?>