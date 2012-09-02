<?php 
//update_products.php

require_once 'includes/global.inc.php';
if(isset($_SESSION['broker_id']))
{
	$id = $_SESSION['broker_id'];
	$user = $userTools->getBroker($id);
	$params = array();
	foreach ($_POST['chkProducts'] as $value) 
	{ 
		array_push($params,$value);
		
	} 
	//print_r($params);
	$result = $user->setProducts($params);
	
	if($result)
	{
		echo "Products Parameters successfully updated!";
	}
	else
	{
		echo "Database update failed";
	}
}

?>