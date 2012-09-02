<?php 
//ajax_update_awardparams.php

require_once 'includes/global.inc.php';
if(isset($_SESSION['user']))
{
	$user = unserialize($_SESSION["user"]);
	
	
	$params = array();
	foreach ($_POST['chkAwards'] as $value) 
	{ 
		array_push($params,$value);
		
	} 
	$result = $user->setAwards($params);

	if($result)
	{
		echo "Award Parameters successfully updated!";
	}
	else
	{
		echo "Database update failed";
	}
}

?>