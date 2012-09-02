<?php 
//ajax_update_serviceparams.php

require_once 'includes/global.inc.php';
if(isset($_SESSION['broker_id']))
{
	$id = $_SESSION['broker_id'];
	$user = $userTools->getBroker($id);
	
	//services
	$params = array();
	foreach ($_POST['chkServices'] as $value) 
	{ 
		array_push($params,$value);
		
	} 
	$result = $user->setServiceParams($params);
	
	//online acct services
	$params = array();
	foreach ($_POST['chkOnlineAcctServ'] as $value) 
	{ 
		array_push($params,$value);
		
	} 
	$result = $user->setOnlineAcctServices($params);
	
	//trading services
	$params = array();
	foreach ($_POST['chkTradingServ'] as $value) 
	{ 
		array_push($params,$value);
		
	} 
	$result = $user->setTradingServices($params);
	
	//charting services
	$params = array();
	foreach ($_POST['chkChartingServ'] as $value) 
	{ 
		array_push($params,$value);
		
	} 
	$result = $user->setChartingServices($params);
	
	//pms services
	$params = array();
	foreach ($_POST['chkPMSServ'] as $value) 
	{ 
		array_push($params,$value);
		
	} 
	$result = $user->setPMSServices($params);
	
	if($result)
	{
		echo "Service Parameters successfully updated!";
	}
	else
	{
		echo "Database update failed";
	}
}

?>