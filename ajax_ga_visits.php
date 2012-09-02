<?php
// ajax_ga_visits.php
require_once 'includes/global.inc.php';
if(isset($_SESSION['user']))
{
	$broker = unserialize($_SESSION["user"]);
	$broker_id = $broker->m_BrokerID;
	// initialize the google analytics object
	$ga = new gapi($ga_email,$ga_password);
	
	$dimensions = array('date',);
	//$metrics = array('pageviews','visits','timeOnPage');
	$metrics = array('visits','pageviews');
	$filters = "country==India && pagePath==/broker_info.php?id=".$broker_id;
	//$filters = "country==India ";
	$start_date=date('Y-m-d',strtotime('1 month ago'));
	$end_date=date('Y-m-d');
	$ga->requestReportData($ga_profile,$dimensions,$metrics,'date',$filters,$start_date,$end_date,1,50);

	$visits_data = array();
	foreach($ga->getResults() as $result)
	{
		$dt = $result->getdate();
		$visits = $result->getVisits();
		$arr = array("year" => substr($dt,0,4),"month" => substr($dt,4,2) , "date" => substr($dt,6),"visits" => $visits);
		array_push($visits_data,$arr);
	}
	echo json_encode($visits_data);
}
?>
