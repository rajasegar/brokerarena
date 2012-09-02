<?php include 'header.php';?>
<?php
if(!isset($_SESSION['admin'])) {
	header("Location:index.php");
}

$ga = new gapi($ga_email,$ga_password);
	
	$dimensions = array('visitCount');
	//$metrics = array('pageviews','visits','timeOnPage');
	$metrics = array('visits','pageviews','avgTimeOnSite','percentNewVisits','newVisits','pageviewsPerVisit','visitBounceRate');
	//$filters = "country==India && pagePath==/broker_info.php?id=".$broker_id;
	$filters = "";
	$start_date=date('Y-m-d',strtotime('1 month ago'));
	$end_date=date('Y-m-d');
	$ga->requestReportData($ga_profile,$dimensions,$metrics,'-visits',$filters,$start_date,$end_date,1,50);
?>
	<div class="container-fluid">
	    <div class="row-fluid">
			<div class="span3">
				<?php include 'admin_menu.php';?>
			</div>
	        <div class="span9">
				<h2>Analytics-Visitors</h2>
				<div id="ajaxStatus"></div>
				<div id="visualization"></div>
				<div class="well">
					<h3><?php echo $ga->getNewVisits();?> people visited this site.</h3>
					</div>
				<div class="row">
					<div class="span3">
						<div id="divVisits">
							<table class='table table-striped'>
							<tr><td>Visits</td><td><strong><?php echo $ga->getVisits();?></strong></td></tr>
							<tr><td>Unique Visitors</td><td><strong> <?php echo $ga->getNewVisits();?></strong></td></tr>
							<tr><td>Pageviews</td><td> <strong><?php echo $ga->getPageViews();?></strong></td></tr>
							<tr><td>Pages/Visit</td><td> <strong><?php echo round($ga->getPageViewsPerVisit(),2);?></strong></td></tr>
							<tr><td>Avg. Visit Duration</td><td> <strong><?php echo convertSecsToTime(round($ga->getAvgTimeOnSite()));?></strong></td></tr>
							<tr><td>Bounce Rate</td><td> <strong><?php echo round($ga->getVisitBounceRate(),2);?> %</strong></td></tr>
							<tr><td>% New Visits</td><td> <strong><?php echo round($ga->getPercentNewVisits(),2);?> %</strong></td></tr>
							</table>
						</div>
					</div>
					<div class="span6">
						<div id="divPieChart"></div>
					</div>
				</div>
	        </div>
	    </div>
	</div>
	
<?php include 'footer.php';?>
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
						console.log(gdata[i].year + '-' + gdata[i].month + '-' + gdata[i].date);
						dataTable.setValue(i, 0, new Date(gdata[i].year,gdata[i].month - 1,gdata[i].date));
						
						dataTable.setValue(i, 1, gdata[i].visits);
					}

					  var dataView = new google.visualization.DataView(dataTable);
					  dataView.setColumns([{calc: function(data, row) { return data.getFormattedValue(row, 0); }, type:'string'}, 1]);

					  var chart = new google.visualization.LineChart(document.getElementById('visualization'));
					  var options = {
						 charArea:{left:0,top:0,width:"100%",height:"100%"},
						legend: 'Day',
						pointSize: 5,
						hAxis:{maxAlternation:14,slantedText:false,showTextEvery:14}
					  };
					  chart.draw(dataView, options);
					  
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
  
