<?php 
//ajax_update_reviewdesc.php

require_once 'includes/global.inc.php';
if(isset($_SESSION['broker_id']))
{
	$id = $_SESSION['broker_id'];
	$desc = mysql_real_escape_string($_POST['txtDescription']);
	$where = " nBrokerID = $id";
	$broker = $userTools->getBroker($id);
	$params = array();
	array_push($params,$desc);
		
	
	$result = $broker->setAdminReviews($params);
	
	if($result)
	{
		echo "Broker Review description successfully updated!";
	}
	else
	{
		echo "Database update failed";
	}
}

?>
