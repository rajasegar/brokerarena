<?php 
//ajax_getNewsFeeds.php

require_once 'includes/global.inc.php';
$feeds = $db->select("news");
$url = array();
foreach($feeds as $feed) {
	array_push($url,$feed);
}
echo json_encode($url);

?>
