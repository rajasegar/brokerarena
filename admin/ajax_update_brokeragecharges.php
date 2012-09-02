<?php 
//ajax_update_brokeragecharges.php
require_once 'includes/global.inc.php';
if(isset($_SESSION['broker_id']))
{
	$id = $_SESSION['broker_id'];
	$broker = $userTools->getBroker($id);
	$margin = sanitizeString($_POST['txtMargin']);
	$delivery = sanitizeString($_POST['txtDelivery']);
	$ptst = sanitizeString($_POST['txtPTST']);
	$mtf = sanitizeString($_POST['txtMTF']);
	$sl = sanitizeString($_POST['txtShortSelling']);
	$marginwithsl = sanitizeString($_POST['txtMarginwithSL']);
	
	$params = array();
	array_push($params,$margin);
	array_push($params,$delivery);
	array_push($params,$ptst);
	array_push($params,$mtf);
	array_push($params,$sl);
	array_push($params,$marginwithsl);

	//print_r($params);
	$result = $broker->setBrokerageCharges($params);
	
	if($result)
	{
		echo  "Brokerage Charges parameters successfully updated";
		
	}
	else
	{
		echo "Database update failed";
		
	}
}

?>
