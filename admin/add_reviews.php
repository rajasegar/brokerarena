<?php
require_once 'includes/global.inc.php';
$info = "";
if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$_SESSION["broker_id"] = $id;
	$broker = $userTools->getBroker($id);
	$broker->loadParams();
	
	//print_r($broker->m_Charges);
}
?>
<?php include 'header.php';?>
	<div class="container-fluid">
	    <div class="row-fluid">
			<div class="span3">
				<?php include 'admin_menu.php';?>
			</div>
			<div class="span9">
			<h1>Brokers' Review - <?php echo $broker->m_BrokerName;?></h1>
			<div id="myTab" class="tabbable tabs-left well">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#divDescription" data-toggle="tab">Description</a></li>
					<li><a href="#divTradingPlatform" data-toggle="tab">Trading Platforms</a></li>
					<li><a href="#divBrokerage" data-toggle="tab">Brokerage &amp; Fees</a></li>
					<li><a href="#divAcctOpening" data-toggle="tab">Account Opening Mode</a></li>
					<li><a href="#divPros" data-toggle="tab">Advantages</a></li>
					<li><a href="#divCons" data-toggle="tab">Disadvantages</a></li>
				</ul>
				<div class="tab-content">
					<div id="divDescription" class="tab-pane active">
						<form id="frmDescription">
							<fieldset>
								<textarea  class="span5" name="txtDescription"><?php echo $broker->m_RevDescription['sDescription'];?></textarea>
								<p><input type="button" name="btnUpdateDesc" id="btnUpdateDesc" class="btn btn-primary" value="Update Description"></p>
							</fieldset>
						</form>
					</div>
					<div id="divTradingPlatform"  class="tab-pane">
						<?php echo $broker->rendertable_TradingPlatform();?>
						<form id="frmTradingPlatforms">
							<fieldset>
								<div class="control-group">
									<label class="control-label" for="txtTPName">Name:</label>
									<input type="text" name="txtTPName" id="txtTPName">
									<label class="control-label" for="txtTPDesc">Description:</label>
									<input type="text" name="txtTPDesc" id="txtTPDesc">
									<p><input type="button" name="btnAddTP" id="btnAddTP" class="btn btn-primary" value="Add Trading Platform"></p>
								</div>
							</fieldset>
						</form>
					</div>
					<div id="divBrokerage"  class="tab-pane">
						<form id="frmBrokerage">
							<fieldset>
								<textarea name="txtBrokerage" class="span5"><?php echo $broker->m_RevBrokerageFees['sDescription'];?></textarea>
								<p><input type="button" name="btnUpdateBrokerage" id="btnUpdateBrokerage" class="btn btn-primary" value="Update Brokerage"></p>
							</fieldset>
						</form>
					</div>
					<div id="divAcctOpening"  class="tab-pane">
						<form id="frmAcctOpening">
							<fieldset>
								<textarea name="txtAcctOpening" class="span5"><?php echo $broker->m_RevBrokerageFees['sDescription'];?></textarea>
								<p><input type="button" name="btnUpdateAcctOpening" id="btnUpdateAcctOpening" class="btn btn-primary" value="Update Account Opening"></p>
							</fieldset>
						</form>
					</div>
					<div id="divPros"  class="tab-pane">
						<table class="table table-striped">
						<tr><th>Advantage</th><th>Edit</th><th>Delete</th></tr>
						<?php
							$pros = $broker->getRevBrokerPros();
							foreach($pros as $adv)
							{
								echo "<tr>";
								echo "<td>".$adv['sAdvantage']."</td>";
								echo "<td><a class='btn' href='update_broker.php?id=".$adv['id']."' >Edit</a></td>";
								echo "<td><a class='btn' href='delete_broker.php?id=".$adv['id']."' >Delete</a></td>";
								echo "</tr>";
							}
						?>
						</table>
						<form id="frmPros">
							<fieldset>
								<legend>New Advantage</legend>
								<label for="txtAdvantage">Advantage:</label>
								<input type="text" name="txtAdvantage" id="txtAdvantage">
								<p><input type="button" class="btn btn-primary" id="btnAddPros" name="btnAddPros" value="Add Advantage"></p>
							</fieldset>
						</form>
					</div>
					<div id="divCons"  class="tab-pane">
						<table class="table table-striped">
						<tr><th>Dis-Advantage</th><th>Edit</th><th>Delete</th></tr>
						<?php
							$cons = $broker->getRevBrokerCons();
							foreach($cons as $con)
							{
								echo "<tr>";
								echo "<td>".$con['sDisadvantage']."</td>";
								echo "<td><a class='btn' href='update_broker.php?id=".$con['id']."' >Edit</a></td>";
								echo "<td><a class='btn' href='delete_broker.php?id=".$con['id']."' >Delete</a></td>";
								echo "</tr>";
							}
						?>
						</table>
						<form id="frmCons">
							<fieldset>
								<legend>New Dis-Advantage</legend>
								<label for="txtDisadvantage">Dis-Advantage:</label>
								<input type="text" name="txtDisadvantage" id="txtDisadvantage">
								<p><input type="button" class="btn btn-primary" id="btnAddCons" name="btnAddCons" value="Add Dis-Advantage"></p>
							</fieldset>
						</form>
					</div>
				</div><!-- .tab-content-->
				
			</div><!-- .tabbable -->
			</div><!-- span9 -->
	    </div><!-- row-fluid-->
	</div><!-- container-fluid--->
<?php include 'footer.php';?>
<script type="text/javascript" src="js/add_reviews.js"></script>
