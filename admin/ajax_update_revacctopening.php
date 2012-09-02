<?php 
//ajax_update_revacctopening.php

require_once 'includes/global.inc.php';
if(isset($_SESSION['broker_id']))
{
	$id = $_SESSION['broker_id'];
	$desc = mysql_real_escape_string($_POST['txtAcctOpening']);
	$where = " nBrokerID = $id";
	$broker = $userTools->getBroker($id);
	$params = array();
	array_push($params,$desc);
		
	
	$result = $broker->setRevAcctOpening($params);
	
	if($result)
	{
		echo "Account Opening Review description successfully updated!";
	}
	else
	{
		echo "Database update failed";
	}
}

?>
