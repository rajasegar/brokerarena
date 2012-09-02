<?php 
//ajax_add_brokercons.php

require_once 'includes/global.inc.php';
if(isset($_SESSION['broker_id']))
{
	$id = $_SESSION['broker_id'];
	$pro = mysql_real_escape_string($_POST['txtDisadvantage']);
	$insert_fields = array(
		"nBrokerID" => "$id",
		"sDisadvantage" => "'$pro'");
		
	
	
	$result = $db->insert($insert_fields,"tbl_broker_cons");
	
	if($result)
	{
		echo "Broker Dis-Advantage successfully added!";
	}
	else
	{
		echo "Database update failed";
	}
}

?>
