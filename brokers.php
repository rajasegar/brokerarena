<?php
require_once 'includes/global.inc.php';
if(		(isset($_GET['filter'])) 
	&& 	($_GET['filter'] == 0)) {
	unset($_SESSION['filters']);
	unset($_SESSION['filter_query']);
}
	
$pagesize = (isset($_SESSION['pagesize']))?$_SESSION['pagesize']:5;
$recordstart = (isset($_GET['recordstart']))?((int) $_GET['recordstart']):0;
$where="";
//Getting filter parameters from url
if(isset($_SESSION['filter_query'])) {
	$where = $_SESSION['filter_query'];
}
else {	// First time visiting the page
	$where = " 1=1 ";
	$_SESSION['filter_query'] = $where;
}
// For determining total rows
$db->select('tbl_brokermaster',$where);
$totalrows = $db->getnumRows();

// Now fire the limited query
$orderby = (isset($_SESSION['orderby']))?$_SESSION['orderby']:"order by sBrokerName";
$where .= " $orderby limit $recordstart ,$pagesize ";
$brokers = $db->select('tbl_brokermaster',$where);
$totalpages = ceil($totalrows / $pagesize);
$currentpage = ($recordstart / $pagesize ) + 1;
?>
<?php include 'header.php';?>
	<div class="container">
	    <div class="row">
			<div id="ajaxStatus" class="hide">
				<div class="well">
				<img src="assets/img/glyphicons/glyphicons_023_cogwheels.png" alt="Loading">Loading...
				</div>
			</div>

			<div id="filter_wrap" class="span2">
				<div class="well">
				<h5>Narrow your search:</h5>
				<a id="clearfilter" class="btn btn-danger btn-mini" href="<?php echo $_SERVER['PHP_SELF'];?>?filter=0"><strong><i class="icon icon-remove icon-white"></i> Clear Filters</strong></a>
				<h6>Exchange Segments</h6>
				<ul class="unstyled">
					<li><input type="checkbox" value="1" class="chkFilter" <?php filterOnOff(1);?>>Equities</li>
					<li><input type="checkbox" value="2" class="chkFilter" <?php filterOnOff(2);?>>Derivatives</li>
					<li><input type="checkbox" value="3" class="chkFilter" <?php filterOnOff(3);?>>Commodity</li>
					<li><input type="checkbox" value="4" class="chkFilter" <?php filterOnOff(4);?>>Currency</li>
				</ul>
				<h6>Products</h6>
				<ul  class="unstyled">
					<li><input type="checkbox" value="5" class="chkFilter" <?php filterOnOff(5);?>>IPO</li>
					<li><input type="checkbox" value="6" class="chkFilter" <?php filterOnOff(6);?>>Mutual Funds</li>
					<li><input type="checkbox" value="7" class="chkFilter" <?php filterOnOff(7);?>>Bonds</li>
				</ul>
				<h6>Services</h6>
				<ul class="unstyled">
					<li><input type="checkbox" value="8" class="chkFilter" <?php filterOnOff(8);?>>Trading Software</li>
					<li><input type="checkbox" value="9" class="chkFilter" <?php filterOnOff(9);?>>Mobile Trading</li>
					<li><input type="checkbox" value="10" class="chkFilter" <?php filterOnOff(10);?>>Browser Trading</li>
					<li><input type="checkbox" value="11" class="chkFilter" <?php filterOnOff(11);?>>Call N Trade</li>
					<li><input type="checkbox" value="12" class="chkFilter" <?php filterOnOff(12);?>>Charting</li>
					<li><input type="checkbox" value="13" class="chkFilter" <?php filterOnOff(13);?>>PMS</li>
				</ul>
				<h6>Value Added Services</h6>
				<ul class="unstyled">
					<li><input type="checkbox" value="14" class="chkFilter" <?php filterOnOff(14);?>>SMS Alerts</li>
					<li><input type="checkbox" value="15" class="chkFilter" <?php filterOnOff(15);?>>Research</li>
					<li><input type="checkbox" value="16" class="chkFilter" <?php filterOnOff(16);?>>SMS Query</li>
				</ul>
				<h6>Security</h6>
				<ul class="unstyled">
					<li><input type="checkbox" value="17" class="chkFilter" <?php filterOnOff(17);?>>Two Factor Authentication</li>
					<li><input type="checkbox" value="18" class="chkFilter" <?php filterOnOff(18);?>>SSL Encryption</li>
				</ul>
				<h6>Account Opening Mode</h6>
				<ul class="unstyled">
					<li><input type="checkbox" value="19" class="chkFilter" <?php filterOnOff(19);?>>Door-Step Service</li>
					<li><input type="checkbox" value="20" class="chkFilter" <?php filterOnOff(20);?>>Walk-In</li>
				</ul>
				<h6>Customer Service</h6>
				<ul class="unstyled">
					<li><input type="checkbox" value="21" class="chkFilter" <?php filterOnOff(21);?>>Dedicated Call Centre</li>
					<li><input type="checkbox" value="22" class="chkFilter" <?php filterOnOff(22);?>>Toll Free No</li>
				</ul>
				</div>
			</div>
			
			<div id="list_wrap" class="span8">
				<div id="brokers_wrap">
				<?php
							if($db->getnumRows() == 1)
							{
								$broker_id = $brokers['nBrokerID'];
							?>
							<div class="broker">
									<div class="broker_logo">
									<img src="<?php echo $brokers['sLogoImage'];?>" alt="<?php echo $brokers['sBrokerName'];?>" />
										<input type="checkbox" class="compare" name="chkCompare[]" value="<?php echo $broker_id;?>" />Compare
										<div class="clearfix"></div>
									</div>
									<div class="broker_info">
									<h3><a href="broker_info.php?id=<?php echo $broker_id;?>"><?php echo $brokers['sBrokerName'];?></a></h3>
									<span class="website"><a href="<?php echo $brokers['sWebsite'];?>"><?php echo $brokers['sWebsite'];?></a></span>
										<p class="desc"><?php echo extract_str($brokers['sDescription'],250);?></p>
										<?php echo $userTools->getBrokerAvgRatings($broker_id); ?>
										<span class="reviews"><a href="broker_info.php?id=<?php echo $broker_id;?>#divReviews">Reviews (<?php echo $userTools->getTotalReviews($broker_id);?>)</a></span>
										<span class="find_more">
										<a href="broker_info.php?id=<?php echo $broker_id;?>" class="button medium blue">Find out more</a>
										</span>
									</div>
									<div class="clearfix"></div>
								</div>
							<?php	
							}
							else
							{
					
						
						foreach($brokers as $broker)
						{
							//$broker_id = $broker['nBrokerID'];
							echo $userTools->renderBroker($broker);
						}
					}
					?>
					<div class="pagination pagination-centered">
						<?php
							echo pageLinks($totalpages,$currentpage,$pagesize,"recordstart");
						?>
					</div>
				</div>
				
				
<div class="alert alert-warning"><i class="icon icon-warning-sign"></i> <strong>Disclaimer.</strong> We can not guarantee that the information on this page is 100% correct. If you think that any information for the brokers is wrong or missing, please <a href="contact_us.php">contact us</a>.
<br/>Some company and product names, logos on this site may be trademarks or registered trademarks of individual companies and are respectfully acknowledged.</div>
			</div>
			<div id="side_wrap" class="span2">
				<form action="" method="post">
				<div class="controls">
						<p><a href="compare.php" class="btn btn-primary">COMPARE</a></p>
				View Brokers:
				<select name="lstPageSize" id="lstPageSize">
					<option value="5">5 per page</option>
					<option value="10">10 per page</option>
					<option value="20">20 per page</option>
					<option value="999">See All</option>
				</select>
				</div>
				<p>
				Sort Brokers By:
				<select name="lstOrderBy" id="lstOrderBy">
					<option value=" order by sBrokerName ">Alphabetic - A to Z</option>
					<option value=" order by sBrokerName desc">Alphabetic - Z to A</option>
					<!--<option>Ratings</option>-->
				</select>
				</p>
				</form>
			</div>
			
	    </div>
	</div>
<?php include 'footer.php';?>
<script type="text/javascript" src="assets/js/brokers.js"></script>

