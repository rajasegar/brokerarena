<?php 
//ajax_delete_brokerpros.php

require_once 'includes/global.inc.php';
if(isset($_SESSION['broker_id']))
{
	$id = $_POST['id'];
	$where = "id = $id";

	$result = $db->delete("tbl_broker_pros",$where);
	
	if($result)
	{
		echo "Broker Advantage parameter successfully removed!";
	}
	else
	{
		echo "Database update failed";
	}
}

?>
