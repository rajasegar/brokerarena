<?php 
//update_exchg_sgmnts.php
require_once 'includes/global.inc.php';
if(isset($_SESSION['user']))
{
	$user = unserialize($_SESSION["user"]);
	$params = array();
	foreach ($_POST['chkExchSgmnts'] as $value) 
	{ 
		array_push($params,$value);
		
	} 
	//print_r($params);
	$result = $user->setExchSgmtParams($params);
	
	if($result)
	{
		echo "Exchange Segment Membership Parameters successfully updated!";
	}
	else
	{
		echo "Database update failed";
	}
}

?>