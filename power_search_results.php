<?php
require_once 'includes/global.inc.php';
$query_like = $_GET['broker_name'];
$where = "sBrokerName like '$query_like%'";
$brokers = $db->select('tbl_brokermaster',$where);
?>
<?php include 'header.php';?>
	<div id="content_wrap">
	    <div id="content" class="container_12 clearfix">
			<h1>Search Results - <?php echo $db->getnumRows()." broker(s) found.";?></h1>
			<div id="list_wrap" class="grid_8">
				<form action="compare.php" method="post">
				
				<div id="brokers_wrap">
					<?php
						if($brokers)
						{
						?>
						<div class="compare_tray">
							<label><strong>Compare</strong> up to 4 Brokers</label>
							<input type="submit" value="Compare" name="btnCompare" class="button red medium"/>
							<ul>
								
							</ul>
							<div class="clearfix"></div>
						</div>
						<?php
							if($db->getnumRows() == 1)
							{
								$broker_id = $brokers['nBrokerID'];
							?>
							<div class="broker">
									<div class="broker_logo">
									<img src="<?php echo $brokers['sLogoImage'];?>" alt="<?php echo $brokers['sBrokerName'];?>" height="100" width="100"/>
										<input type="checkbox" class="compare" name="chkCompare[]" value="<?php echo $broker_id;?>" />Compare
										<div class="clearfix"></div>
									</div>
									<div class="broker_info">
									<h3><a href="broker_info.php?id=<?php echo $broker_id;?>"><?php echo $brokers['sBrokerName'];?></a></h3>
									<span class="website"><a href="<?php echo $brokers['sWebsite'];?>"><?php echo $brokers['sWebsite'];?></a></span>
										<p class="desc"><?php echo extract_str($brokers['sDescription'],250);?></p>
										<?php $userTools->getBrokerAvgRatings($broker_id); ?>
										<span class="reviews"><a href="broker_info.php?id=<?php echo $broker_id;?>#divReviews">Reviews (<?php $userTools->getTotalReviews($broker_id);?>)</a></span>
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
									$broker_id = $broker['nBrokerID'];
								?>
								<div class="broker">
									<div class="broker_logo">
									<img src="<?php echo $broker['sLogoImage'];?>" alt="<?php echo $broker['sBrokerName'];?>" height="100" width="100"/>
										<input type="checkbox" class="compare" name="chkCompare[]" value="<?php echo $broker_id;?>" />Compare
										<div class="clearfix"></div>
									</div>
									<div class="broker_info">
									<h3><a href="broker_info.php?id=<?php echo $broker_id;?>"><?php echo $broker['sBrokerName'];?></a></h3>
									<span class="website"><a href="<?php echo $broker['sWebsite'];?>"><?php echo $broker['sWebsite'];?></a></span>
										<p class="desc"><?php echo extract_str($broker['sDescription'],250);?></p>
										<?php $userTools->getBrokerAvgRatings($broker_id); ?>
										<span class="reviews"><a href="broker_info.php?id=<?php echo $broker_id;?>#divReviews">Reviews (<?php $userTools->getTotalReviews($broker_id);?>)</a></span>
										<span class="find_more">
										<a href="broker_info.php?id=<?php echo $broker_id;?>" class="button medium blue">Find out more</a>
										</span>
									</div>
									<div class="clearfix"></div>
								</div>
							<?php
								}
							}
						}
						else
						{
							echo "<div class='msg_error'>Sorry, no brokers found for the name '$query_like'</div>";
						}
						?>

				</div>
				</form>
			</div>
			<div id="side_wrap" class="grid_4">
				<!--<p>
				View:
				<select name="lstPageSize" id="lstPageSize">
					<option value="5">5 per page</option>
					<option value="10">10 per page</option>
					<option>See All</option>
				</select>
				</p>
				<p>
				Sort&nbsp;By:
				<select>
					<option>Best Selling</option>
					<option>Best Match</option>
					<option>New Arrivals</option>
				</select>
				</p>-->

			</div>
			
	    </div>
	</div>
<?php include 'footer.php';?>
<script type="text/javascript" src="js/brokers.js"></script>
