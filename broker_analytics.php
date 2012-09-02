<?php 
include 'header.php';

if(isset($_SESSION['user']))
{
	$broker = unserialize($_SESSION["user"]);
	$broker_id = $broker->m_BrokerID;
// initialize the google analytics object
	$ga = new gapi($ga_email,$ga_password);
	
	$dimensions = array('visitCount');
	$metrics = array('visits','pageviews','timeOnPage','percentNewVisits','newVisits','pageviewsPerVisit','visitBounceRate');
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
						<h2>Analytics-Visitors</h2>
						<div id="ajaxStatus"></div>
						<div id="visualization">Loading...</div>
						<h4 class="well"><?php echo $ga->getNewVisits();?> people visited your page.</h4>
						<div class="row">
							<div class="span3">
								<div id="divVisits">
									<table class="table table-striped">
									<tr><td>Visits</td><td> <strong><?php echo $ga->getVisits();?></strong></td></tr>
									<tr><td>Unique Visitors</td><td> <strong><?php echo $ga->getNewVisits();?></strong></td></tr>
									<tr><td>Pageviews</td><td> <strong><?php echo $ga->getPageViews();?></strong></td></tr>
									<tr><td>Pages/Visit</td><td> <strong><?php echo round($ga->getPageViewsPerVisit(),2);?></strong></td></tr>
									<tr><td>Avg. Visit Duration</td><td> <strong><?php echo convertSecsToTime($ga->getTimeOnPage());?></strong></td></tr>
									<tr><td>Bounce Rate</td><td> <strong><?php echo round($ga->getVisitBounceRate(),2);?></strong> %</td></tr>
									<tr><td>% New Visits</td><td> <strong><?php echo round($ga->getPercentNewVisits(),2);?></strong> %</td></tr>
									</table>
								</div>
							</div>
							<div class="span4">
								<div id="divPieChart"></div>
							</div>
						</div>
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
      google.load('visualization', '1', {packages: ['corechart']});
	
      function drawVisualization() {
    var dataTable = new google.visualization.DataTable();    
       $.ajax( 
		{ 
			type: "POST",
			url: "ajax_ga_visits.php", 
			data: {},
			dataType:'json', 
			success: 
				function(t) 
				{  
					var gdata = eval(t);
					dataTable.addRows(gdata.length);
					dataTable.addColumn('date', 'Date');
					  dataTable.addColumn('number', 'Visits');
					  for(i=0;i<gdata.length;i++) {
						dataTable.setValue(i, 0, new Date(gdata[i].year,gdata[i].month,gdata[i].date));
						dataTable.setValue(i, 1, gdata[i].visits);
					}

					  var dataView = new google.visualization.DataView(dataTable);
					  dataView.setColumns([{calc: function(data, row) { return data.getFormattedValue(row, 0); }, type:'string'}, 1]);

					  $('#visualization').html('');
					  var chart = new google.visualization.LineChart(document.getElementById('visualization'));
					  var options = {
						 charArea:{left:0,top:0,width:"100%",height:"100%"},
						legend: 'Day',
						pointSize: 5,
						hAxis:{maxAlternation:14,slantedText:false,showTextEvery:14}
					  };
					  chart.draw(dataView, options);
					  
					  
					  // Pie chart
					  // Create and populate the data table.
					var data = google.visualization.arrayToDataTable([
					  ['Visitor_Type', 'Visits_Percentage'],
					  ['29.27 % New Visitor', 24],
					  ['54.34 % Returning Visitor', 58]
					]);
				  
					// Create and draw the visualization.
					new google.visualization.PieChart(document.getElementById('divPieChart')).
						draw(data, {});

				}, 
			error: 
				function() 
				{ 
					$("div#info").append("An error occured during processing")
						.addClass("msg_error"); 
				} 
		});
      
      }
      

      google.setOnLoadCallback(drawVisualization);
    </script>
  
