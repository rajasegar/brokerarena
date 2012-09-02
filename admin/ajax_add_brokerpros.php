<?php 
//ajax_add_brokerpros.php

require_once 'includes/global.inc.php';
if(isset($_SESSION['broker_id']))
{
	$id = $_SESSION['broker_id'];
	$pro = mysql_real_escape_string($_POST['txtAdvantage']);
	$insert_fields = array(
		"nBrokerID" => "$id",
		"sAdvantage" => "'$pro'");
		
	
	
	$result = $db->insert($insert_fields,"tbl_broker_pros");
	
	if($result)
	{
		echo "Broker Advantage successfully added!";
	}
	else
	{
		echo "Database update failed";
	}
}

?>
