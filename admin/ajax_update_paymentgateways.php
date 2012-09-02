<?php 
//ajax_update_paymentgateways.php

require_once 'includes/global.inc.php';
if(isset($_SESSION['broker_id']))
{
	$id = $_SESSION['broker_id'];
	$broker = $userTools->getBroker($id);
	
	$banks = sanitizeString($_POST['txtBanks']);
	$aggs = sanitizeString($_POST['txtAggregators']);
	$params = array();
	array_push($params,$banks);
	array_push($params,$aggs);
	
	
	$result = $broker->setPaymentGateways($params);
		
	if($result)
	{
		echo "Payment Gateways Parameters successfully updated!";
	}
	else
	{
		echo "Database update failed";
	}
}

?>
