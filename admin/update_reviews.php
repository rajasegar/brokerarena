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
			<div id="myTab" class="tabbable well">
				<h1>Update Broker Reviews - <?php echo $broker->m_BrokerName;?></h1>
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
								<div class="control-group"><textarea id="txtDescription" name="txtDescription" style="width:100%"><?php echo $broker->m_RevDescription['sDescription'];?></textarea></div>
								<div class="control-group">
								<div class="controls"><input type="button" name="btnUpdateDesc" id="btnUpdateDesc" class="btn btn-primary" value="Update Description"></div>
							</div>
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
									<textarea class="span7" id="txtTPDesc" name="txtTPDesc" style="width:100%"></textarea>
								</div>
								<div class="controls">
									<input type="button" name="btnAddTP" id="btnAddTP" class="btn btn-primary" value="Add Trading Platform">
								</div>
							</fieldset>
						</form>
					</div>
					<div id="divBrokerage"  class="tab-pane">
						<form id="frmBrokerage">
							<fieldset>
								<div class="control-group">
								<textarea class="span7" name="txtBrokerage" id="txtBrokerage"><?php echo $broker->m_RevBrokerageFees['sDescription'];?></textarea>
								</div>
								<p><input type="button" name="btnUpdateBrokerage" id="btnUpdateBrokerage" class="btn btn-primary" value="Update Brokerage"></p>
							</fieldset>
						</form>
					</div>
					<div id="divAcctOpening"  class="tab-pane">
						<form id="frmAcctOpening">
							<fieldset>
								<div class="control-group">
								<textarea name="txtAcctOpening" id="txtAcctOpening" class="span5"><?php echo $broker->m_RevAcctOpening['sDescription'];?></textarea>
								</div>
								<p><input type="button" name="btnUpdateAcctOpening" id="btnUpdateAcctOpening" class="btn btn-primary" value="Update Account Opening"></p>
							</fieldset>
						</form>
					</div>
					<div id="divPros"  class="tab-pane">
						<?php $broker->renderTable_Pros();?>
						<form id="frmPros">
							<fieldset>
								<legend>New Advantage</legend>
								<label for="txtAdvantage">Advantage:</label>
								<input type="text" class="span7" name="txtAdvantage" id="txtAdvantage">
								<p><input type="button" class="btn btn-primary" id="btnAddPros" name="btnAddPros" value="Add Advantage"></p>
							</fieldset>
						</form>
					</div>
					<div id="divCons"  class="tab-pane">
						<?php $broker->renderTable_Cons();?>
						<form id="frmCons">
							<fieldset>
								<legend>New Dis-Advantage</legend>
								<label for="txtDisadvantage">Dis-Advantage:</label>
								<input type="text"  class="span7" name="txtDisadvantage" id="txtDisadvantage">
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
<script type="text/javascript" src="js/update_reviews.js"></script>
