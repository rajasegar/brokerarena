<?php 
//ajax_update_charges.php
require_once 'includes/global.inc.php';
if(isset($_SESSION['broker_id']))
{
	$id = $_SESSION['broker_id'];
	$broker = $userTools->getBroker($id);
	$acct_opening = sanitizeString($_POST['txtAcctOpening']);
	$amca = sanitizeString($_POST['txtAMCAnnual']);
	$amcm = sanitizeString($_POST['txtAMCMonthly']);
	$other = sanitizeString($_POST['txtOtherService']);
	$exe = sanitizeString($_POST['txtEXETrading']);
	$browser = sanitizeString($_POST['txtBrowserTrading']);
	$mobile = sanitizeString($_POST['txtMobileTrading']);
	$cnt = sanitizeString($_POST['txtCallnTrade']);
	$acct_closure = sanitizeString($_POST['txtAccountClosure']);
	$pt = sanitizeString($_POST['txtProgramTrading']);
	$futures = sanitizeString($_POST['txtFutureTrading']);
	$options = sanitizeString($_POST['txtOptions']);
	$min = sanitizeString($_POST['txtMinBrokerage']);
	$params = array();
	array_push($params,$acct_opening);
	array_push($params,$other);
	array_push($params,$exe);
	array_push($params,$browser);
	array_push($params,$mobile);
	array_push($params,$cnt);
	array_push($params,$acct_closure);
	array_push($params,$pt);
	array_push($params,$futures);
	array_push($params,$options);
	array_push($params,$min);
	array_push($params,$amca);
	array_push($params,$amcm);
	
	
	//print_r($params);
	$result = $broker->setCharges($params);
	
	if($result)
	{
		echo  "Charges parameters successfully updated";
		
	}
	else
	{
		echo "Database update failed";
		
	}
}

?>
