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
	<div class="container-fluid">
	    <div class="row-fluid">
			<div class="span3">
				<?php include 'admin_menu.php';?>
			</div>
	        <div class="span9">
				<input type="hidden" name="hn_id" id="hn_id" value="<?php echo $_GET['id'];?>"/>
				<h1><?php echo $broker->m_BrokerName;?></h1>
				<a href="<?php echo $broker->m_Url; ?>"><img id="imgLogo" src="../<?php echo $broker->m_Logo; ?>" alt="Logo"/></a>
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
	    </div>
	</div>
	</div>
<?php include 'footer.php';?>

