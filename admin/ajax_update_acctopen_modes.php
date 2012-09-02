<?php 
//update_acctopen_modes.php

require_once 'includes/global.inc.php';
if(isset($_SESSION['broker_id']))
{
	$id = $_SESSION['broker_id'];
	$broker = $userTools->getBroker($id);
	$params = array();
	foreach ($_POST['chkAcctOpenModes'] as $value) 
	{ 
		array_push($params,$value);
		
	} 
	//print_r($params);
	$result = $broker->setAcctOpeningModes($params);
	
	if($result)
	{
		echo "Account Opening Mode -  Parameters successfully updated!";
	}
	else
	{
		echo "Database update failed";
	}
}

?>