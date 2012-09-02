<?php 
//ajax_delete_tradingplatform.php

require_once 'includes/global.inc.php';
if(isset($_SESSION['broker_id']))
{
	$id = $_POST['id'];
	$where = "id = $id";

	$result = $db->delete("tbl_tradingplatforms",$where);
	
	if($result)
	{
		echo "Trading Platform parameter successfully removed!";
	}
	else
	{
		echo "Database update failed";
	}
}

?>
