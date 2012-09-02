<?php
require_once 'includes/global.inc.php';
header("Location:404.php");
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
			<div id="ajaxStatus"></div>
			<div id="list_wrap" class="span9">
				<h1>Broker Reviews</h1>
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
							echo $userTools->renderBrokerReview($broker);
						}
					}
					?>
					<div class="pagination pagination-centered">
						<?php
							echo pageLinks($totalpages,$currentpage,$pagesize,"recordstart");
						?>
					</div>
				</div>
				
				
<div class="alert alert-warning"><strong>Disclaimer.</strong> We can not guarantee that the information on this page is 100% correct. If you think that any information for the brokers is wrong or missing, please <a href="contact_us.php">contact us</a>.
<br/>Some company and product names, logos on this site may be trademarks or registered trademarks of individual companies and are respectfully acknowledged.</div>
			</div>
			<div id="side_wrap" class="span3">
				<?php include 'sidebar.php';?>
			</div>
			
	    </div>
	</div>
<?php include 'footer.php';?>
<script type="text/javascript" src="assets/js/brokers.js"></script>

