<?php
require_once 'includes/global.inc.php';
$info = "";
if(isset($_GET['id']))
{
	$broker = $userTools->getBroker($_GET['id']);
	$broker->loadParams();
}
?>
<?php include 'header.php';?>
	<div class="container">
	    <div class="row">
	        <div class="span8">
				<input type="hidden" name="hn_id" id="hn_id" value="<?php echo $_GET['id'];?>"/>
				<h1><?php echo $broker->m_BrokerName;?></h1>
				<a href="<?php echo $broker->m_Url; ?>"><img id="imgLogo" src="<?php echo $broker->m_Logo; ?>" alt="Logo"/></a>
				<p><?php echo $broker->m_RevDescription['sDescription']; ?></p>
				<h2>Trading Platforms</h2>
				<?php
					$tps = $broker->getRevTradingPlatforms();
					if($db->getnumRows() == 1) {
						echo "<h3>".$tps['sName']."</h3>";
							echo $tps['sDescription'];
					}
					else {
						foreach($tps as $tp) {
							echo "<h3>".$tp['sName']."</h3>";
							echo $tp['sDescription'];
						}
					}
				?>
				<h2>Brokerage &amp; Fees</h2>
				<?php echo $broker->m_RevBrokerageFees['sDescription'];?>
				<h2>How to open an Account?</h2>
				<?php echo $broker->m_RevAcctOpening['sDescription'];?>
				<h2>Pros</h2>
				<?php
					$advs = $broker->getRevBrokerPros();
					
					echo "<ol>";
					if($db->getnumRows() == 1) {
						echo "<li>".$advs['sAdvantage']."</li>";
					}
					else {
						foreach($advs as $pro) {
							echo "<li>".$pro['sAdvantage']."</li>";
						}
					}
					echo "</ol>";
				?>
				<h2>Cons</h2>
				<?php
					$advs = $broker->getRevBrokerCons();
					echo "<ol>";
					if($db->getnumRows() == 1) {
						echo "<li>".$advs['sDisadvantage']."</li>";
					}
					else {
						foreach($advs as $pro) {
							echo "<li>".$pro['sDisadvantage']."</li>";
						}
					}
					echo "</ol>";
				?>
				<h2>Contacts</h2>
				<address>
					<strong>Registered / Corporate office:</strong><br>
					<?php echo $broker->m_Address; ?><br>
					<?php echo $broker->m_City; ?><br>
					<?php echo $broker->m_State; ?><br>
					<?php echo $broker->m_ZipCode; ?><br>
					<abbr title="Phone">Phone: </abbr><?php echo $broker->m_ContactNo; ?><br>
					<abbr title="Toll Free">Toll Free: </abbr><?php echo $broker->m_TollFreeNo; ?><br>
				</address>
				<address>
					<i class="icon icon-envelope"></i> <a href="mailto:<?php echo $broker->m_MailID; ?>"><?php echo $broker->m_MailID; ?></a><br>
					<i class="icon icon-home"></i> <a href="<?php echo $broker->m_Url; ?>"><?php echo $broker->m_Url; ?></a>
				</address>
				<div class="fb-like" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div>
				<!-- Place this tag where you want the +1 button to render -->
				<g:plusone></g:plusone>

				<!-- Place this render call where appropriate -->
				<script type="text/javascript">
				  (function() {
					var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
					po.src = 'https://apis.google.com/js/plusone.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
				  })();
				</script>
				<br/>
				

		<div class="alert alert-warning"><strong>Disclaimer.</strong> We can not guarantee that the information on this page is 100% correct. If you think that any information for the current broker is wrong or missing, please <a href="contact_us.php">contact us</a>. 
		<br/>
		Some company and product names, logos on this site may be trademarks or registered trademarks of individual companies and are respectfully acknowledged.</div>
	        </div>
	        <div id="sidebar" class="span4">
	            <?php include 'sidebar.php';?>
	        </div>
	    </div>
	</div>
<?php include 'footer.php';?>

