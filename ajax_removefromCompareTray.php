<?php 
//ajax_removefromCompareTray.php

require_once 'includes/global.inc.php';
if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$key = "'$id'";
	$data = array();
	$broker = $userTools->getBroker($id);
	if($broker)
	{
		// Get the array of brokers from the Session object compare_tray
		

		// Search if he is not already in the array of brokers
		if(isset($_SESSION['compare_tray'][$key]))	{
			//array_push($brokers,$broker);
			unset($_SESSION['compare_tray'][$key]);

		}
		
		
		$brokers = $_SESSION['compare_tray'];
		// return the html
		$list_items = "";
		foreach($brokers as $brokerid => $brkr) {
			$list_items .= "<li><a href='#'><img src='$brkr->m_Logo' />";
			$list_items .= "<input type='button' value='Remove' class='button red small ct_overlay' onclick='removefromTray($brkr->m_BrokerID)'/></a></li>";
		}
		echo $list_items;
		//echo count($brokers);
		
	}
	else
	{
		$data = array("status" => "failure",
					"message" => "The selected Broker information is not available in the database.");
		echo json_encode($data);
	}
	
}

?>
