<?php include 'header.php';?>
	<div class="container">
	    <div class="row">
	        <div class="span8">
				<div id="myCarousel" class="carousel">
					<div class="carousel-inner">
						<div class="active item">
							<img src="images/featured_1.jpg" alt="slide1"/>
						</div>
						<div class="item">
							<img src="images/featured_2.jpg" alt="slide1"/>
						</div>
						<div class="item">
							<img src="images/featured_3.jpg" alt="slide1"/>
						</div>
						<div class="item">
							<img src="images/featured_4.jpg" alt="slide1"/>
						</div>
					</div>
					<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
					<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
				</div>
				<div class="well">
				<p>BrokerArena is a seriously fast and No-Nonsense portal to compare the services of various Investment Brokers with the things that YOU consider the most "important" to your investment goals.</p>
				<p>And in case you find your specific criteria missing... don't hesitate to tell us about it <a href="contact_us.php">here</a>!! We will make sure that it is heard amongst the Broking Community.
				</p>
				<a href="contact_us.php" class="btn">Got something to tell about...</a>
				<a href="new_broker.php" class="btn">Register Your Brokerage</a>
				</div>
				<div class="row">
					<div class="span4">
						<div class="well">
							<h3>Are you an Investment Broker?</h3>
							Your Brokerage listing gives you...
							<ul class="listing_benefits">
								<li><strong>Login access</strong> to update your listing</li>
								<li><strong>Review email alerts</strong>, sent when reviews are posted under your listing</li>
								<li><strong>Review commenting</strong>, allowing you to comment on any user review</li>
								<li><strong>Special offer promotion</strong> within your listing</li>
								<li><strong>A link to your site</strong> or account opening form</li>
								<li><strong>And much more...</strong></li>
							</ul>
							<a href="new_broker.php" class="btn">Register with us</a>
							<a href="login_broker.php" class="btn">Broker Login</a>
						</div>
					</div>
				
				<div class="span4">
					<div class="well">
						<h3>Are you a Customer/Client?</h3>
						Got something to tell about Your Brokerage...
						<ul class="listing_benefits">
							<li><strong>Login access</strong> to post your comments/reviews</li>
							<li><strong>Manage email alerts</strong>, sent when new reviews are posted</li>
							<li><strong>Comment</strong> on any new broker listing/user review</li>
							<li><strong>Special offer promotion</strong> from your favorite brokerage houses</li>
							<li><strong>Recognition </strong> from the fellow user community</li>
							<li><strong>And much more...</strong></li>
						</ul>
						<a href="new_user.php" class="btn">Sign Up</a>
						<a href="brokers.php" class="btn btn-primary">Explore <i class="icon icon-white icon-chevron-right"></i></a>
					</div>
				</div>
				</div>
	        </div>
	        <div id="sidebar" class="span4">
	            <?php include 'sidebar.php';?>
	        </div>
	    </div>
	</div>
	
<?php include 'footer.php';?>
