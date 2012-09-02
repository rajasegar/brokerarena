<?php
require_once 'includes/global.inc.php';
$query_like = $_GET['broker_name'];
$where = "sBrokerName like '$query_like%'";
$brokers = $db->select('tbl_brokermaster',$where);
?>
<?php include 'header.php';?>
	<div class="container">
	    <div id="content" class="row">
			<div id="list_wrap" class="span8">
				<h1>Search Results - <?php echo $db->getnumRows()." broker(s) found.";?></h1>
				<form action="compare.php" method="post">
				
				<div id="brokers_wrap">
					<?php
						if($brokers)
						{
						?>
						<div class="compare_tray">
							<label><strong>Compare</strong> up to 4 Brokers</label>
							<input type="submit" value="Compare" name="btnCompare" class="btn btn-primary"/>
							<ul>
								
							</ul>
							<div class="clearfix"></div>
						</div>
						<?php
							if($db->getnumRows() == 1)
							{
								echo $userTools->renderBroker($brokers);
							}
							else
							{
								foreach($brokers as $broker)
								{
									echo $userTools->renderBroker($broker);
								}
							}
						}
						else
						{
							echo "<div class='alert alert-warning'>Sorry, no brokers found for the name '$query_like'</div>";
						}
						?>

				</div>
				</form>
			</div>
			<div id="side_wrap" class="span4">
				<?php include 'sidebar.php';?>
			</div>
			
	    </div>
	</div>
<?php include 'footer.php';?>
<script type="text/javascript" src="assets/js/search_brokers.js"></script>
