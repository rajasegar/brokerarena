<?php
// ajax_ga_mobile.php
require_once 'includes/global.inc.php';
if(isset($_SESSION['user']))
{
	$broker = unserialize($_SESSION["user"]);
	$broker_id = $broker->m_BrokerID;
	
	
	// initialize the google analytics object
	$ga = new gapi($ga_email,$ga_password);
	
	$dimensions = array('browser','operatingSystem','source','segment=gaid::-11');
	$metrics = array('visits','pageviews','timeOnSite');
	$segments = "";
	//$filters = "country==India && pagePath==/broker_info.php?id=".$broker_id;
	$filters = "country==India";
	
	$ga->requestReportData($ga_profile,$dimensions,$metrics,'-visits',$filters,'2012-03-01','2012-04-10',1,50);
	
	$html = "<table class='table table-striped table-bordered'>";
	$html .= "<tr><th>Pageviews</th><th>Visits</th><th>Time On Page</th></tr>";
	foreach($ga->getResults() as $result)
	{
		$html .= print_r($result);
	  /*$html .= "<tr>";
	  $html .= "<td>".$result->getPageviews()."</td>";
	  $html .= "<td>".$result->getVisits()."</td>";
	  $html .= "<td>".$result->getTimeOnPage()."</td>";
	  $html .= "</tr>";*/
	}
	$html .= "</table>";
	$html .= '<p>Total pageviews: ' . $ga->getPageviews() . ' total visits: ' . $ga->getVisits() . '</p>';
	echo $html;
}
?>
