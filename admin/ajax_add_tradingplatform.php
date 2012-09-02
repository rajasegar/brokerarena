<?php 
//ajax_add_tradingplatform.php

require_once 'includes/global.inc.php';
if(isset($_SESSION['broker_id']))
{
	$id = $_SESSION['broker_id'];
	$name = mysql_real_escape_string($_POST['txtTPName']);
	$desc = mysql_real_escape_string($_POST['txtTPDesc']);
	$insert_fields = array(
		"nBrokerID" => "$id",
		"sName" => "'$name'",
		"sDescription" => "'$desc'");
		
	
	
	$result = $db->insert($insert_fields,"tbl_tradingplatforms");
	
	if($result)
	{
		echo "Trading Platform successfully added!";
	}
	else
	{
		echo "Database update failed";
	}
}

?>
