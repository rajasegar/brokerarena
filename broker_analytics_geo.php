<?php 
include 'header.php';

if(isset($_SESSION['user']))
{
	$broker = unserialize($_SESSION["user"]);
	$broker_id = $broker->m_BrokerID;
// initialize the google analytics object
	$ga = new gapi($ga_email,$ga_password);
	
	$dimensions = array('visitCount');
	//$metrics = array('pageviews','visits','timeOnPage');
	$metrics = array('visits','pageviews','timeOnPage','percentNewVisits','newVisits');
	$filters = "country==India && pagePath==/broker_info.php?id=".$broker_id;
	$start_date=date('Y-m-d',strtotime('1 month ago'));
	$end_date=date('Y-m-d');
	$ga->requestReportData($ga_profile,$dimensions,$metrics,'-visits',$filters,$start_date,$end_date,1,50);
}
?>
	<div class="container">
	    <div class="row">
	        <div class="span9">
	            <div class="row">
					<div class="span2">
						<?php include 'broker_menu.php';?>
					</div>
					<div class="span7">
						<h2>Analytics - Demographics</h2>
						<div id="ajaxStatus"></div>
						<div id="map_canvas" style="width:600px;height:400px">Loading...</div>
						<div class="row">
							<div class="span1 well">
								Visits
								<h4><?php echo $ga->getVisits();?></h4>
							</div>
							<div class="span2 well">
								Avg.Visit Duration
								<h4><?php echo convertSecsToTime($ga->getTimeOnPage());?></h4>
							</div>
							<div class="span2 well">
								% New Visits
								<h4><?php echo round($ga->getPercentNewVisits(),2);?> %</h4>
							</div>
						</div>
						<h3>Region wise Statistics:</h3>
						<table class="table table-striped table-condensed">
							<tr><th>Region</th><th>Visits</th><th>Page Views/Visit</th><th>Avg. Time on Site</th><th>% New Visits</th></tr>
						<?php
						$dimensions = array('region');
						$metrics = array('visits','pageviewsPerVisit','avgTimeOnSite','percentNewVisits');
						$ga->requestReportData($ga_profile,$dimensions,$metrics,'-visits',$filters,'2012-03-01','2012-04-10',1,50);
						foreach($ga->getResults() as $result)
						{
							echo "<tr><td>".$result->getRegion()."</td>";
							echo "<td>".$result->getVisits()."</td>";
							echo "<td>".$result->getPageViewsPerVisit()."</td>";
							echo "<td>".convertSecsToTime(round($result->getAvgTimeOnSite()))."</td>";
							echo "<td>".round($result->getPercentNewVisits(),2)." %</td></tr>";
						}
						?>
						</table>
						<h3>City wise Statistics:</h3>
						<table class="table table-striped table-condensed">
							<tr><th>Region</th><th>Visits</th><th>Page Views/Visit</th><th>Avg. Time on Site</th><th>% New Visits</th></tr>
						<?php
						$dimensions = array('city');
						$metrics = array('visits','pageviewsPerVisit','avgTimeOnSite','percentNewVisits');
						$ga->requestReportData($ga_profile,$dimensions,$metrics,'-visits',$filters,'2012-03-01','2012-04-10',1,50);
						foreach($ga->getResults() as $result)
						{
							echo "<tr><td>".$result->getCity()."</td>";
							echo "<td>".$result->getVisits()."</td>";
							echo "<td>".$result->getPageViewsPerVisit()."</td>";
							echo "<td>".convertSecsToTime($result->getAvgTimeOnSite())."</td>";
							echo "<td>".round($result->getPercentNewVisits(),2)." %</td></tr>";
						}
						?>
						</table>
					</div>
	            </div>
	        </div>
	        <div id="sidebar" class="span3">
	            <?php include 'sidebar.php';?>
	        </div>
	    </div>
	</div>
<?php include 'footer.php';?>
<!--<script type="text/javascript" src="assets/js/broker_analytics.js"></script>-->

<script type="text/javascript">
	google.load('visualization', '1', {'packages': ['geomap']});
	function drawMap() {
		var data = new google.visualization.DataTable();
		$.ajax( 
		{ 
			type: "POST",
			url: "ajax_ga_geo.php", 
			data: {},
			dataType:'json', 
			success: 
				function(t) 
				{ 
					var gdata = eval(t);
					data.addRows(gdata.length);
					data.addColumn('string', 'City');
					data.addColumn('number', 'Visits');
					for(i=0;i<gdata.length;i++) {
						data.setValue(i, 0, gdata[i].region);
						data.setValue(i, 1, gdata[i].visits);
					}
					
					var options = {};
				  options['region'] = 'IN';
				  options['colors'] = [0xFF8747, 0xFFB581, 0xc06000]; //orange colors
				  //options['dataMode'] = 'markers';
				  options['dataMode'] = 'regions';

				  var container = document.getElementById('map_canvas');
				  container.innertHTML = "";
				  var geomap = new google.visualization.GeoMap(container);
				  geomap.draw(data, options);
					
				}, 
			error: 
				function() 
				{ 
					$("div#info").append("An error occured during processing")
						.addClass("msg_error"); 
				} 
		});
	  
	};
	
	google.setOnLoadCallback(drawMap);

</script>

