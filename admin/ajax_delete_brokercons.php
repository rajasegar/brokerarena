<?php 
//ajax_delete_brokercons.php

require_once 'includes/global.inc.php';
if(isset($_SESSION['broker_id']))
{
	$id = $_POST['id'];
	$where = "id = $id";

	$result = $db->delete("tbl_broker_cons",$where);
	
	if($result)
	{
		echo "Broker Dis-Advantage parameter successfully removed!";
	}
	else
	{
		echo "Database update failed";
	}
}

?>
