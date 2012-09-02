<?php 
//ajax_post_review.php
require_once 'includes/global.inc.php';
if(isset($_SESSION['user']))
{
	$user = unserialize($_SESSION["user"]);
	$broker_id = sanitizeString($_POST['id']);
	$review = sanitizeString($_POST['review']);
	$topic = sanitizeString($_POST['topic']);
	$insert_fields = array(
		"nBrokerID" => "$broker_id",
		"sUserID" => "'$user->m_UserID'",
		"sTopic" => "'$topic'",
		"sReview" => "'$review'",
		"dtCreated" => "curdate()");
		
	
	$result = $db->insert($insert_fields,"tbl_brokerreviews");
	
	if($result)
	{
		echo "<div class='msg_success'>Review successfully posted!</div>";
	}
	else
	{
		echo "<div class='msg_error'>Database update failed</div>";
	}
}
else
{
	echo "<div class='msg_warning'>Sorry! Only registered users can post reviews, Please register yourself before posting a review...</div>";
}

?>