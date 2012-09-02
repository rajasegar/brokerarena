<?php 
//ajax_update_dpgateways.php

require_once 'includes/global.inc.php';
if(isset($_SESSION['broker_id']))
{
	$id = $_SESSION['broker_id'];
	$broker = $userTools->getBroker($id);
	
	$selfpoa = sanitizeString($_POST['txtSelfPoa']);
	$dpp = sanitizeString($_POST['txtDpParticipants']);
	$params = array();
	array_push($params,$selfpoa);
	array_push($params,$dpp);
	
	
	$result = $broker->setDPGateways($params);
		
	if($result)
	{
		echo "DP Gateways Parameters successfully updated!";
	}
	else
	{
		echo "Database update failed";
	}
}

?>
