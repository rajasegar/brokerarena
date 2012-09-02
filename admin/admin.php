<?php include 'header.php';?>
<?php
if(!isset($_SESSION['admin'])) {
	header("Location:index.php");
}
?>
	<div class="container-fluid">
	    <div class="row-fluid">
			<div class="span3">
				<?php include 'admin_menu.php';?>
			</div>
	        <div class="span9">
				<div class="well">
					<h1>ADMINISTRATOR</h1>
	                <p>BrokerArena is a seriously fast and No-Nonsense portal to compare the services of various Investment Brokers with the things that YOU consider the most "important" to your investment goals.</p>
				</div>
				<div class="row">
					<div class="span3">
						<div class="well">
							<img src="../assets/img/glyphicons/glyphicons_042_group.png" alt="users">
							<h3><?php echo $userTools->getTotalUsers();?> Users</h3>
						</div>
					</div>
					<div class="span3">
						<div class="well">
							<img src="../assets/img/glyphicons/glyphicons_003_user.png" alt="brokers">
							<h3><?php echo $userTools->getTotalBrokers();?> Brokers</h3></div>
					</div>
					<div class="span2">
						<div class="well">
							<img src="../assets/img/glyphicons/glyphicons_309_comments.png" alt="reviews">
							<h3><?php echo $userTools->getReviewsCount();?> Reviews</h3></div>
					</div>
					<div class="span2">
						<div class="well">
							<img src="../assets/img/glyphicons/glyphicons_049_star.png" alt="ratings">
							<h3><?php echo $userTools->getRatingsCount();?>  Ratings</h3></div>
					</div>
				</div>
	        </div>
	    </div>
	</div>
	
<?php include 'footer.php';?>
