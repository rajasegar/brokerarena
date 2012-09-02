<?php
// ajax_ga_geo.php
require_once 'includes/global.inc.php';
if(isset($_SESSION['user']))
{
	$broker = unserialize($_SESSION["user"]);
	$broker_id = $broker->m_BrokerID;
	
	// initialize the google analytics object
	$ga = new gapi($ga_email,$ga_password);
	
	$dimensions = array('region');
	$metrics = array('visits','pageviewsPerVisit','avgTimeOnSite','percentNewVisits');
	$filters = "country==India && pagePath==/broker_info.php?id=".$broker_id;
	//$filters = "country==India";
	
	$ga->requestReportData($ga_profile,$dimensions,$metrics,'-visits',$filters,'2012-03-01','2012-04-10',1,50);

	$geo_data = array();
	foreach($ga->getResults() as $result)
	{
		$region = $result->getRegion();
		$visits = $result->getVisits();
		$arr = array("region" => $region, "visits" => $visits);
		array_push($geo_data,$arr);
	}
	
	echo json_encode($geo_data);
}
?>
