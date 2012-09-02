<?php 
//ajax_post_rating.php
require_once 'includes/global.inc.php';
if(isset($_SESSION['user']))
{
	$user = unserialize($_SESSION["user"]);
	$broker_id = sanitizeString($_POST['id']);
	$overall = sanitizeString($_POST['all']);
	$fees = sanitizeString($_POST['fees']);
	$brokerage = sanitizeString($_POST['brkg']);
	$tradingplatform = sanitizeString($_POST['tp']);
	$customerservice = sanitizeString($_POST['cc']);
	$insert_fields = array(
		"nBrokerID" => "$broker_id",
		"sUserID" => "'$user->m_UserID'",
		"nRating" => "$overall",
		"nFees" => "$fees",
		"nBrokerage" => "$brokerage",
		"nTradingPlatform" => "$tradingplatform",
		"nCustomerService" => "$customerservice",
		"dtCreated" => "curdate()"
		);
		
	
	$result = $db->insert($insert_fields,"tbl_brokerratings");
	
	if($result)
	{
		echo "<div class='msg_success'>Rating successfully posted!</div>";
	}
	else
	{
		echo "<div class='msg_error'>Database update failed</div>";
	}
}
else
{
	echo "<div class='msg_warning'>Sorry! Only registered users can post ratings, Please register yourself before post a rating...</div>";
}

?>