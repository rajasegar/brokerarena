<?php 
//ajax_update_dpcharges.php
require_once 'includes/global.inc.php';
if(isset($_SESSION['broker_id']))
{
	$id = $_SESSION['broker_id'];
	$broker = $userTools->getBroker($id);
	$dematin = sanitizeString($_POST['txtDematIn']);
	$dematout = sanitizeString($_POST['txtDematOut']);
	$interset = sanitizeString($_POST['txtInterSettlement']);
	$remat = sanitizeString($_POST['txtReMat']);
	$offmarket = sanitizeString($_POST['txtOffMarketTrans']);
	$dpbook = sanitizeString($_POST['txtDpInstrBooklet']);
	$dpothers = sanitizeString($_POST['txtDpOthers']);
	
	$params = array();
	array_push($params,$dematin);
	array_push($params,$dematout);
	array_push($params,$interset);
	array_push($params,$remat);
	array_push($params,$offmarket);
	array_push($params,$dpbook);
	array_push($params,$dpothers);

	//print_r($params);
	$result = $broker->setDPCharges($params);
	
	if($result)
	{
		echo  "DP Charges parameters successfully updated";
		
	}
	else
	{
		echo "Database update failed";
		
	}
}

?>
