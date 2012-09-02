<?php
// ajax_getBrokerNames.php
require_once 'includes/global.inc.php';
$dalals = $db->select('tbl_brokermaster');
$broker_names = array();
foreach($dalals as $dalal) {
	array_push($broker_names,$dalal['sBrokerName']);
	}
	echo json_encode($broker_names);
?>
