<?php
require_once 'includes/global.inc.php';
$info = "";
$id = "";
if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$broker = $userTools->getBroker($_GET['id']);
	$broker->loadParams();
}
if(isset($_POST['btnCompare'])) {
	$b1 = $id;
	$b2 = $userTools->getBrokerIDByName($_POST['txtCompareWith']);
	$url = "Location:compare.php?b1=$b1&b2=$b2";
	header($url);
}
?>
<?php include 'header.php';?>
	<div class="container">
	    <div class="row">
	        <div class="span9">
					<input type="hidden" name="hn_id" id="hn_id" value="<?php echo $_GET['id'];?>"/>
	                <h1><?php echo $broker->m_BrokerName;?></h1>
	                <div class="row">
						<div class="span6">
							<a href="<?php echo $broker->m_Url; ?>"><img id="imgLogo" src="<?php echo $broker->m_Logo; ?>" alt="Logo"/></a>
						</div>
						<div class="span3">
							<div class="well">
								<h3>Compare with:</h3>
								<form name="frmCompareBrokers" method="post" action="">
									<fieldset>
										<?php
										$dalals = $db->select('tbl_brokermaster');
										$broker_names = array();
										foreach($dalals as $dalal) {
										array_push($broker_names,$dalal['sBrokerName']);
										}
										?>
										<input type="text" data-provide="typeahead" data-source='<?php echo json_encode($broker_names);?>' placeholder="Type your brokername" name="txtCompareWith">
									<input type="submit" name="btnCompare" id="btnCompare" class="btn btn-primary" value="Compare">
									</fieldset>
								</form>
							</div>
						</div>
	                </div>
					
					<p><?php echo $broker->m_Description; ?></p>
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
					<div id="myTabs" class="tabbable well">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#divSpecs" data-toggle="tab"><i class="icon icon-th-list"></i> Specifications</a></li>
							<li><a href="#divRatings" data-toggle="tab"><i class="icon icon-star"></i> Ratings</a></li>
							<li><a href="#divReviews" data-toggle="tab"><i class="icon icon-comment"></i> Reviews</a></li>
						</ul>
						<div class="tab-content">
						
						<div id="divSpecs" class="tab-pane active">
						<p><a id="btnExpandCollapse" class="btn btn-mini" href="#"><i class="icon icon-minus-sign"></i> Collapse All</a></p>
						
						<table class="table table-striped table-bordered table-condensed span7">
						<thead>
						<tr>
						<th>Parameters</th>
						<th>Services</th>
						</tr>
						</thead>
						<tbody>
						<tr><th colspan="2" class="param_heading">Exchange Segment Memberships</th></tr>
						<?php
						$params = array('NSE Equities',	'BSE Equities',	'NSE Derivatives',	'BSE Derivatives',	'NSE Currency Derivatives',	'USE Currency Derivatives',
							'MCXSX Currency Derivatives',	'NSEL Commodity Spot',	'MCX Commodity Derivatives', 'NCDEX Commodity Derivatives',
							'ICEX Commodity Derivatives',	'NMCE Commodity Derv',	'ACE Commodity Derv');
							renderSingleParam($params,$broker->m_ExchSgmtParams);
						?>
						</tbody>
						<tbody>
						<tr><th colspan="2" class="param_heading">Products</th></tr>
						<?php
							$params = array('Margin','Delivery','PTST','Margin Trade Funding','Stock Lending & Borrowing (Short Selling)','Margin with Stop Loss (High Leverage)',
								'Online IPO','Online Mutual Funds','Online Bonds');
							renderSingleParam($params,$broker->m_Products);
						?>
						</tbody>
						<tbody>
						<tr><th colspan="2" class="param_heading">Branches</th></tr>
						<?php
							$params = array('Own Branches',	'Branch List','Franchisee Branches','Franchisee List');
							renderSingleParam($params,$broker->m_BranchParams,true);
						?>
						</tbody>
						<tbody>
						<tr><th colspan="2" class="param_heading">Payment Gateways</th></tr>
						<?php
							$params = array('List of Banks',	'List of Aggregators');
							renderSingleParam($params,$broker->m_PaymentGateways,true);
						?>
						</tbody>
						<tbody>
						<tr><th colspan="2" class="param_heading">DP Gateways</th></tr>
						<?php
							$params = array('Self POA Only',	'List of Depository Participants');
							renderSingleParam($params,$broker->m_DPGateways,true);
						?>
						</tbody>
						<tbody>
						<tr><th colspan="2" class="param_heading">Mode of Account Opening</th></tr>
						<?php
							$params = array('Door-step Service',	'Walk-In');
							renderSingleParam($params,$broker->m_AcctOpeningModes);
						?>
						</tbody>
						<tbody>
						<tr><th colspan="2" class="param_heading">Risk Management</th></tr>
						<tr>
						<td class="sub_param" colspan="2">Margin Limit</td>
						</tr>
						<?php
							$params = array('Margin','Delivery','PTST',	'Margin Trade Funding','Stock Lending & Borrowing (Short Selling)',
									'Margin with Stop Loss');
							renderSingleParam($params,$broker->m_RMS_MarginParams);

							$params = array('Mark to Market Limit','Turn Over Limit','Gross Exposure Limit','Net Exposure Limit','Net Buy Limit',
									'Net Sell Limit', 'MTM Auto Square-Off','Timer Auto Square-Off');
							renderSingleParam($params,$broker->m_RMSParams);
						?>
						</tbody>
						<tbody>
						<tr><th colspan="2" class="param_heading">Services</th></tr>
						<?php
							$params = array('Offline Account',	'Program Trading','IPO','Mutual Funds','Bonds',
								'Insurance','Fixed Deposits','Real Estate','Advisory Services','Forex');
							renderSingleParam($params,$broker->m_ServiceParams);
						?>
						<tr>
						<td colspan="2" class="sub_param">Online Account</td>
						</tr>
						<?php
							$params = array('EXE Based Trading',	'Browser Based Trading','Mobile Based Trading','Call N Trade');
							renderSingleParam($params,$broker->m_OnlineAcctServices);
						?>
						<tr>
						<td colspan="2" class="sub_param">Trading</td>
						</tr>
						<?php
							$params = array('After Market Orders',	'Pre-Market Orders','Greek Neutralizer','Options Analysis','Smart Order Routing');
							renderSingleParam($params,$broker->m_TradingServices);
						?>
						<tr>
						<td class="sub_param1" colspan="2">Charting</td>
						</tr>
						<?php
							$params = array('Basic',	'Advanced(Technical Analysis)');
							renderSingleParam($params,$broker->m_ChartingServices);
						?>
						<tr>
						<td colspan="2" class="sub_param">PMS</td>
						</tr>
						<?php
							$params = array('Discretionary',	'Non-Discretionary');
							renderSingleParam($params,$broker->m_PMSServices);
						?>
						</tbody>
						<tbody>
						<tr><th colspan="2" class="param_heading">Value Added Services</th></tr>
						<tr>
						<td class="sub_param" colspan="2">SMS Alerts</td>
						</tr>
						<?php
							$params = array('SMS on Order Confirmation',	'SMS on Order Modification','SMS on Order Cancellation','SMS on Trade Confirmation',
								'SMS on MTM Breach','SMS on Ledger Update','SMS on Fund Transfer','SMS on IPO Bid Entry','SMS on IPO Bid Confirmation','SMS on MF Order Entry','SMS on MF Order Booking');
							renderSingleParam($params,$broker->m_SMSAlerts);
						?>
						<tr><td colspan="2" class="sub_param">Research</td></tr>
						<?php
							$params = array('Fundamental Research Reports',	'Technical Research Reports');
							renderSingleParam($params,$broker->m_ResearchParams);
						?>
						<tr><td colspan="2" class="sub_param">SMS Query</td></tr>
						<?php
							$params = array('Ledger Balance',	'Orders','Trades','Net Position');
							renderSingleParam($params,$broker->m_SMSQuery);
						?>
						<tr>
						<td>Portfolio Tracker</td>
						<td><?php echo yes_or_no($broker->m_VASParams['bPortfolioTracker']); ?></td>
						</tr>
						</tbody>
						<tbody>
						<tr><th colspan="2" class="param_heading">Security</th></tr>
						<?php
							$params = array('Two Factor Authentication',	'SSL Encryption');
							renderSingleParam($params,$broker->m_SecurityParams);
						?>
						</tbody>
						<tbody>
						<tr><th colspan="2" class="param_heading">Charges</th></tr>
						<tr>
						<td>Account Opening Charges</td>
						<td>NA</td>
						</tr>
						<tr><td colspan="2" class="sub_param">Annual Maintenance Charges</td></tr>
						<tr>
						<td class="sub_param_value">Annual</td>
						<td>NA</td>
						</tr>
						<tr>
						<td class="sub_param_value">Monthly</td>
						<td>NA</td>
						</tr>
						<tr><td colspan="2" class="sub_param">Brokerage Charges</td></tr>
						<?php
							$params = array('Margin','Delivery','PTST','MTF','Short Selling','Margin with Stop Loss');
							renderSingleParam($params,$broker->m_BrokerageCharges,true);
						?>
						<tr>
						<td>Other Service Charges</td>
						<td>NA</td>
						</tr>
						<tr><td colspan="2" class="sub_param">DP Charges</td></tr>
						<?php
							$params = array('Demat-In','Demat-Out','Inter-Settlement','Re-Mat','Off-Market Transaction','New DP Instruction Booklet','Others');
							renderSingleParam($params,$broker->m_DPCharges,true);
						?>
						<tr>
						<td>EXE Trading Charges</td>
						<td>NA</td>
						</tr>
						<tr>
						<td>Browser Trading Charges</td>
						<td>NA</td>
						</tr>
						<tr>
						<td>Mobile Trading Charges</td>
						<td>NA</td>
						</tr>
						<tr>
						<td>Call N Trade Trading Charges</td>
						<td>NA</td>
						</tr>
						<tr>
						<td>Account Closure Charges</td>
						<td>NA</td>
						</tr>
						<tr>
						<td>Program Trading</td>
						<td>NA</td>
						</tr>
						</tbody>
						<tbody>
						<tr><th colspan="2" class="param_heading">Customer Centre</th></tr>
						<?php
							$params = array('Dedicated Call Centre',	'Toll-Free Number','Average Response Time','Client Satisfaction');
							renderSingleParam($params,$broker->m_CustomerServices);
						?>
						</tbody>
						<tbody>
						<tr><th colspan="2" class="param_heading">Awards</th></tr>
						<?php
							$params = array('CNBC TV 18',	'Economic Times','Finance Asia','Asia Money','CNBC Financial Advisor Awards','Thomson Extel Surveys Awards','Avaya Customer Responsiveness Awards',
								'Euromoney Award','Primeranking Award','Zee Business','Outlook Money','CNBC Awaaz Consumer Award','The Wall Street Journal','Global Finance','Indian Banks Association');
							renderSingleParam($params,$broker->m_Awards);
						?>
						</tbody>
						</table>
						</div>
						<div id="divRatings" class="tab-pane">
							<div id="divNewRating">
								<div class="alert alert-info"><strong>Please note:</strong> Only detailed ratings will be posted live, hence kindly rate ALL the parameters. This helps other users
											make an educated choice on which broker they should use.</div>
								<form name="formreview" action="" method="post">
								<table class="table-condensed">
									<tr>
										<td></td>
										<td><i class="icon icon-star"></i></td>
										<td><i class="icon icon-star"></td>
										<td><i class="icon icon-star"></td>
										<td><i class="icon icon-star"></td>
										<td><i class="icon icon-star"></td>
									</tr>
									<tr>
										<td><h5>Overall</h5></td>
										<td><input type="radio" name="radOverall" value="1" title="1 Star"/></td>
										<td><input type="radio" name="radOverall" value="2" title="2 Stars"/></td>
										<td><input type="radio" name="radOverall" value="3" title="3 Stars"/></td>
										<td><input type="radio" name="radOverall" value="4" title="4 Stars"/></td>
										<td><input type="radio" name="radOverall" value="5" title="5 Stars"/></td>
									</tr>
									<tr>
										<td>Fees / AMC</td>
										<td><input type="radio" name="radFees" value="1" title="1 Star"/></td>
										<td><input type="radio" name="radFees" value="2" title="2 Stars"/></td>
										<td><input type="radio" name="radFees" value="3" title="3 Stars"/></td>
										<td><input type="radio" name="radFees" value="4" title="4 Stars"/></td>
										<td><input type="radio" name="radFees" value="5" title="5 Stars"/></td>
									</tr>
									<tr>
										<td>Commission / Brokerage</td>
										<td><input type="radio" name="radBrokerage" value="1" title="1 Star"/></td>
										<td><input type="radio" name="radBrokerage" value="2" title="2 Stars"/></td>
										<td><input type="radio" name="radBrokerage" value="3" title="3 Stars"/></td>
										<td><input type="radio" name="radBrokerage" value="4" title="4 Stars"/></td>
										<td><input type="radio" name="radBrokerage" value="5" title="5 Stars"/></td>
									</tr>
									<tr>
										<td>Trading Platform</td>
										<td><input type="radio" name="radTradingPlatform" value="1" title="1 Star"/></td>
										<td><input type="radio" name="radTradingPlatform" value="2" title="2 Stars"/></td>
										<td><input type="radio" name="radTradingPlatform" value="3" title="3 Stars"/></td>
										<td><input type="radio" name="radTradingPlatform" value="4" title="4 Stars"/></td>
										<td><input type="radio" name="radTradingPlatform" value="5" title="5 Stars"/></td>
									</tr>
									<tr>
										<td>Customer Service</td>
										<td><input type="radio" name="radCustomerService" value="1" title="1 Star"/></td>
										<td><input type="radio" name="radCustomerService" value="2" title="2 Stars"/></td>
										<td><input type="radio" name="radCustomerService" value="3" title="3 Stars"/></td>
										<td><input type="radio" name="radCustomerService" value="4" title="4 Stars"/></td>
										<td><input type="radio" name="radCustomerService" value="5" title="5 Stars"/></td>
									</tr>
								</table>
								<input value="Submit Rating" type="button" class="btn btn-primary" id="btnSubmitRating">
								</form>
								<hr/>
							</div>
							<div id="ratings_wrap">
								<?php $broker->getRatings();?>
							</div>
							

						</div>
						<div id="divReviews" class="tab-pane">
							<div id="info"></div>
							<div id="divNewReview" class="well">
								<h4>Write a Review</h4>
								<div class="alert alert-info">
								<strong>Please note:</strong> Only detailed reviews will be posted live. This helps other users
											make an educated choice on which broker they should use. <span class="hint">(Note, if you are unsatisfied with a broker, make sure you 
											detail this in a professional manner.)</span>
											</div>
								<form>
									<fieldset>
										<ol class="unstyled">
											<li>
											
											</li>
											<li>
												<label for="txtSubject">Topic:</label>
												<input type="text" name="txtSubject" id="txtSubject" class="span6"/>
											</li>
											<li>
												<label for="txtReview">Detailed Comment:</label>
												<textarea name="review" id="txtReview" rows="7" cols="90" class="span6"></textarea>
											</li>
											<li><input class="btn btn-primary" value="Submit Review" type="button" id="btnSubmitReview"></li>
										</ol>
									</fieldset>
								<form>
							</div>
							<div id="review_wrap">
								<?php $broker->getReviews();?>
							</div>
						</div><!-- #divReviews -->
						</div><!-- div.tab-content -->
					</div><!-- #myTab-->
		<div class="alert alert-warning"><strong>Disclaimer.</strong> We can not guarantee that the information on this page is 100% correct. If you think that any information for the current broker is wrong or missing, please <a href="contact_us.php">contact us</a>. 
		<br/>
		Some company and product names, logos on this site may be trademarks or registered trademarks of individual companies and are respectfully acknowledged.</div>
	        </div>
	        <div id="sidebar" class="span3">
	            <?php include 'sidebar.php';?>
	        </div>
	    </div>
	</div>
<?php include 'footer.php';?>
<script type="text/javascript" src="assets/js/broker_info.js"></script>
