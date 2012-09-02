<?php
require_once 'includes/global.inc.php';
if(isset($_SESSION['user']))
{
	$broker = unserialize($_SESSION["user"]);
}
?>
<?php include 'header.php';?>
	<div class="container">
	    <div class="row">
	        <div class="span9">
	            <div class="row">
					<div class="span2">
						<?php include 'broker_menu.php';?>
					</div>
					<div class="span7">
						<div class="well">
							<h1><?php echo $broker->m_BrokerName;?></h1>
							<?php echo $broker->m_Description;?>
						</div>
						<div class="row">
							<div class="span3">
								<div class="well">
									<?php echo $userTools->getBrokerAvgRatings($broker->m_BrokerID);?>
								<h2> Average Rating</h2>
								</div>
							</div>
							<div class="span2">
								<div class="well">
									<i class="icon icon-star"></i><h2><?php echo $userTools->getTotalRatings($broker->m_BrokerID);?> Ratings</h2>
								</div>
							</div>
							<div class="span2">
								<div class="well">
									<i class="icon icon-comment"></i><h2><?php echo $userTools->getTotalReviews($broker->m_BrokerID);?> Reviews</h2>
								</div>
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


