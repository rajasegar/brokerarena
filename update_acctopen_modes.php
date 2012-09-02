<?php 
//update_acctopen_modes.php

require_once 'includes/global.inc.php';
if(isset($_SESSION['user']))
{
	$user = unserialize($_SESSION["user"]);
	$params = array();
	foreach ($_POST['chkAcctOpenModes'] as $value) 
	{ 
		array_push($params,$value);
		
	} 
	//print_r($params);
	$result = $user->setAcctOpeningModes($params);
	
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