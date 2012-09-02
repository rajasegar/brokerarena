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
			<h1>Brokers' Parameters - <?php echo $broker->m_BrokerName;?></h1>
			<div id="myTab" class="tabbable tabs-left well">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#0" data-toggle="tab">Exchange Segment Memberships</a></li>
					<li><a href="#1" data-toggle="tab">Products</a></li>
					<li><a href="#2" data-toggle="tab">Branches</a></li>
					<li><a href="#3" data-toggle="tab">Account Opening Mode</a></li>
					<li><a href="#4" data-toggle="tab">Risk Management</a></li>
					<li><a href="#5" data-toggle="tab">Security</a></li>
					<li><a href="#6" data-toggle="tab">Services</a></li>
					<li><a href="#7" data-toggle="tab">Value Added Services</a></li>
					<li><a href="#8" data-toggle="tab">Customer Service</a></li>
					<li><a href="#9" data-toggle="tab">Awards</a></li>
					<li><a href="#divCharges" data-toggle="tab">Charges</a></li>
					<li><a href="#divBrokerageCharges" data-toggle="tab">Brokerage</a></li>
					<li><a href="#divDPCharges" data-toggle="tab">DP Charges</a></li>
					<li><a href="#divPaymentGateway" data-toggle="tab">Payment Gateways</a></li>
					<li><a href="#divDPGateway" data-toggle="tab">DP Gateways</a></li>
				</ul>
				<div class="tab-content">
					<div id="0" class="tab-pane active">
						<p><input type="checkbox" name="chkExchSgmnts" value="1" <?php echo ($broker->m_ExchSgmtParams['bNSEEq'] == 1) ? "checked" : "" ;?> />NSE Equities</p>
						<p><input type="checkbox" name="chkExchSgmnts"  value="1" <?php echo ($broker->m_ExchSgmtParams['bBSEEq'] == 1) ? "checked" : "" ;?> />BSE Equities</p>
						<p><input type="checkbox" name="chkExchSgmnts"  value="1" <?php echo ($broker->m_ExchSgmtParams['bNSEDerv'] == 1) ? "checked" : "" ;?> />NSE Derivatives</p>
						<p><input type="checkbox" name="chkExchSgmnts"  value="1" <?php echo ($broker->m_ExchSgmtParams['bBSEDerv'] == 1) ? "checked" : "" ;?> />BSE Derivatives</p>
						<p><input type="checkbox" name="chkExchSgmnts"  value="1" <?php echo ($broker->m_ExchSgmtParams['bNSECurrencyDerv'] == 1) ? "checked" : "" ;?> />NSE Currency Derivatives</p>
						<p><input type="checkbox" name="chkExchSgmnts"  value="1" <?php echo ($broker->m_ExchSgmtParams['bUSECurrencyDerv'] == 1) ? "checked" : "" ;?> />USE Currency Derivatives</p>
						<p><input type="checkbox" name="chkExchSgmnts"  value="1" <?php echo ($broker->m_ExchSgmtParams['bMCXSXCurrencyDerv'] == 1) ? "checked" : "" ;?> />MCXSX Currency Derivatives</p>
						<p><input type="checkbox" name="chkExchSgmnts"  value="1" <?php echo ($broker->m_ExchSgmtParams['bNSELCommoditySpot'] == 1) ? "checked" : "" ;?> />NSEL Commodity Spot Exchange</p>
						<p><input type="checkbox" name="chkExchSgmnts"  value="1" <?php echo ($broker->m_ExchSgmtParams['bMCXCommodityDerv'] == 1) ? "checked" : "" ;?> />MCX Commodity Derivatives</p>
						<p><input type="checkbox" name="chkExchSgmnts"  value="1" <?php echo ($broker->m_ExchSgmtParams['bNCDEXCommodityDerv'] == 1) ? "checked" : "" ;?> />NCDEX Commodity Derivatives</p>
						<p><input type="checkbox" name="chkExchSgmnts"  value="1" <?php echo ($broker->m_ExchSgmtParams['bICEXCommodityDerv'] == 1) ? "checked" : "" ;?> />ICEX Commodity Derivatives</p>
						<p><input type="checkbox" name="chkExchSgmnts"  value="1" <?php echo ($broker->m_ExchSgmtParams['bNMCECommodityDerv'] == 1) ? "checked" : "" ;?> />NMCE Commodity Derivatives</p>
						<p><input type="checkbox" name="chkExchSgmnts"  value="1" <?php echo ($broker->m_ExchSgmtParams['bACECommodityDerv'] == 1) ? "checked" : "" ;?> />ACE Commodity Derivatives</p>
						<input type="button" name="btnUpdateExchSgmnts" id="btnUpdateExchSgmnts" value="Update" class="btn" />
					</div>
					<div id="1"  class="tab-pane">
						<p><input type="checkbox" name="chkProducts"  value="1" <?php echo ($broker->m_Products['bMargin'] == 1) ? "checked" : "" ;?>/>Margin</p>
						<p><input type="checkbox" name="chkProducts"   value="1" <?php echo ($broker->m_Products['bDelivery'] == 1) ? "checked" : "" ;?> />Delivery</p>
						<p><input type="checkbox" name="chkProducts"   value="1" <?php echo ($broker->m_Products['bPTST'] == 1) ? "checked" : "" ;?> />PTST</p>
						<p><input type="checkbox" name="chkProducts"   value="1" <?php echo ($broker->m_Products['bMarginTradeFunding'] == 1) ? "checked" : "" ;?> />Margin Trade Funding</p>
						<p><input type="checkbox" name="chkProducts"   value="1" <?php echo ($broker->m_Products['bShortSelling'] == 1) ? "checked" : "" ;?> />Stock Lending & Borrowing (Short Selling)</p>
						<p><input type="checkbox" name="chkProducts"   value="1" <?php echo ($broker->m_Products['bMarginwithSL'] == 1) ? "checked" : "" ;?> />Margin with Stop Loss (High Leverage)</p>
						<p><input type="checkbox" name="chkProducts"   value="1" <?php echo ($broker->m_Products['bOnlineIPO'] == 1) ? "checked" : "" ;?> />Online IPO</p>
						<p><input type="checkbox" name="chkProducts"   value="1" <?php echo ($broker->m_Products['bOnlineMF'] == 1) ? "checked" : "" ;?> />Online Mutual Funds</p>
						<p><input type="checkbox" name="chkProducts"   value="1" <?php echo ($broker->m_Products['bOnlineBonds'] == 1) ? "checked" : "" ;?> />Online Bonds</p>
						<input type="button" name="btnUpdateProducts" id="btnUpdateProducts" value="Update" class="btn" />
					</div>
					<div id="2"  class="tab-pane">
						<table>
							<tr>
								<td class="form_label">Own Branches</td>
								<td><input type="text" name="txtOwnBranches" id="txtOwnBranches" value="<?php echo $broker->m_BranchParams['nOwnBranches'];?>"/></td>
							</tr>
							<tr>
								<td class="form_label">Branches List</td>
								<td><input type="text" name="txtBranchesList" id="txtBranchesList" value="<?php echo $broker->m_BranchParams['sBranchList'];?>"/></td>
							</tr>
							<tr>
								<td class="form_label">Franchisee Branches</td>
								<td><input type="text" name="txtFranchiseeBranches" id="txtFranchiseeBranches" value="<?php echo $broker->m_BranchParams['nFranchiseeBranches'];?>"/></td>
							</tr>
							<tr>
								<td class="form_label">Franchisee Branch List</td>
								<td><input type="text" name="txtFranchiseeList" id="txtFranchiseeList" value="<?php echo $broker->m_BranchParams['sFranchiseeList'];?>"/></td>
							</tr>
							<tr><td colspan="2">
							<input type="button" name="btnUpdateBranch" id="btnUpdateBranch" value="Update" class="btn" />
							</td></tr>
						</table>
					</div>
					<div id="3"  class="tab-pane">
						<p><input type="checkbox" name="chkAcctOpenModes" value="1" <?php echo ($broker->m_AcctOpeningModes['bDoorStepService'] == 1) ? "checked" : "" ;?>/>Doorstep Service</p>
						<p><input type="checkbox"  name="chkAcctOpenModes"  value="1" <?php echo ($broker->m_AcctOpeningModes['bWalkIn'] == 1) ? "checked" : "" ;?>/>Walk-In</p>
						<input type="button" name="btnUpdateAcctOpenModes" id="btnUpdateAcctOpenModes" value="Update" class="btn" />
					</div>
					<div id="4"  class="tab-pane">
						<fieldset>
						<legend>Margin Limit</legend>
						<table>
						<tr><td><input type="checkbox" name="chkRMS_Margin" value="1" <?php echo ($broker->m_RMS_MarginParams['bMargin'] == 1) ? "checked" : "" ;?>/></td><td>Margin</td></tr>
						<tr><td><input type="checkbox" name="chkRMS_Margin" value="1" <?php echo ($broker->m_RMS_MarginParams['bDelivery'] == 1) ? "checked" : "" ;?>/></td><td>Delivery</td></tr>
						<tr><td><input type="checkbox" name="chkRMS_Margin" value="1" <?php echo ($broker->m_RMS_MarginParams['bPTST'] == 1) ? "checked" : "" ;?>/></td><td>PTST</td></tr>
						<tr><td><input type="checkbox" name="chkRMS_Margin" value="1" <?php echo ($broker->m_RMS_MarginParams['bMarginTradeFunding'] == 1) ? "checked" : "" ;?>/></td><td>Margin Trade Funding</td></tr>
						<tr><td><input type="checkbox" name="chkRMS_Margin" value="1" <?php echo ($broker->m_RMS_MarginParams['bShortSelling'] == 1) ? "checked" : "" ;?>/></td><td>Stock Lending & Borrowing (Short Selling)</td></tr>
						<tr><td><input type="checkbox" name="chkRMS_Margin" value="1" <?php echo ($broker->m_RMS_MarginParams['bMarginwithSL'] == 1) ? "checked" : "" ;?>/></td><td>Margin with Stop Loss</td></tr>
						</table>
						</fieldset>
						<table>
						<tr><td><input type="checkbox" name="chkRMS"  value="1" <?php echo ($broker->m_RMSParams['bMTMLimit'] == 1) ? "checked" : "" ;?>/></td><td>Mark to Market Limit</td></tr>
						<tr><td><input type="checkbox" name="chkRMS"  value="1" <?php echo ($broker->m_RMSParams['bTurnoverLimit'] == 1) ? "checked" : "" ;?>/></td><td>Turnover Limit</td></tr>
						<tr><td><input type="checkbox" name="chkRMS"  value="1" <?php echo ($broker->m_RMSParams['bGrossExposureLimit'] == 1) ? "checked" : "" ;?>/></td><td>Gross Exposure Limit</td></tr>
						<tr><td><input type="checkbox" name="chkRMS"  value="1" <?php echo ($broker->m_RMSParams['bNetExposureLimit'] == 1) ? "checked" : "" ;?>/></td><td>Net Exposure Limit</td></tr>
						<tr><td><input type="checkbox" name="chkRMS"  value="1" <?php echo ($broker->m_RMSParams['bNetBuyLimit'] == 1) ? "checked" : "" ;?>/></td><td>Net Buy Limit</td></tr>
						<tr><td><input type="checkbox" name="chkRMS"  value="1" <?php echo ($broker->m_RMSParams['bNetSellLimit'] == 1) ? "checked" : "" ;?>/></td><td>Net Sell Limit</td></tr>
						<tr><td><input type="checkbox" name="chkRMS"  value="1" <?php echo ($broker->m_RMSParams['bMTMAutoSqOff'] == 1) ? "checked" : "" ;?>/></td><td>MTM Auto Square-Off</td></tr>
						<tr><td><input type="checkbox" name="chkRMS"  value="1" <?php echo ($broker->m_RMSParams['bTimerAutoSqOff'] == 1) ? "checked" : "" ;?>/></td><td>Timer Auto Square-Off</td></tr>
						</table>
						<input type="button" name="btnUpdateRMS" id="btnUpdateRMS" value="Update" class="btn" />
					</div>
					<div id="5"  class="tab-pane">
						<p><input type="checkbox" name="chkSecurity" value="1" <?php echo ($broker->m_SecurityParams['bTwoFactorAuth'] == 1) ? "checked" : "" ;?>/>Two Factor Authentication</p>
						<p><input type="checkbox"  name="chkSecurity"  value="1" <?php echo ($broker->m_SecurityParams['bSSLEncr'] == 1) ? "checked" : "" ;?>/>SSL Encryption</p>
						<input type="button" name="btnUpdateSecurity" id="btnUpdateSecurity" value="Update" class="btn" />
					</div>
					<div id="6" class="tab-pane">
						<table>
						<tr><td><input type="checkbox" name="chkServices"  value="1" <?php echo ($broker->m_ServiceParams['bOfflineAcct'] == 1) ? "checked" : "" ;?>/></td><td>Offline Account</td></tr>
						<tr><td colspan="2">
						<fieldset>
							<legend>Online Account Services</legend>
							<table>
								<tr><td><input type="checkbox" name="chkOnlineAcctServ" value="1" <?php echo ($broker->m_OnlineAcctServices['bEXEBasedTrading'] == 1) ? "checked" : "" ;?>/></td><td>EXE Based Trading</td></tr>
								<tr><td><input type="checkbox" name="chkOnlineAcctServ" value="1" <?php echo ($broker->m_OnlineAcctServices['bBrowserBasedTrading'] == 1) ? "checked" : "" ;?>/></td><td>Browser Based Trading</td></tr>
								<tr><td><input type="checkbox" name="chkOnlineAcctServ" value="1" <?php echo ($broker->m_OnlineAcctServices['bMobileBasedTrading'] == 1) ? "checked" : "" ;?>/></td><td>Mobile Based Trading</td></tr>
								<tr><td><input type="checkbox" name="chkOnlineAcctServ" value="1" <?php echo ($broker->m_OnlineAcctServices['bCallNTrade'] == 1) ? "checked" : "" ;?>/></td><td>Call N Trade</td></tr>
							</table>
						</fieldset>
						</td></tr>
						<tr><td colspan="2">
						<fieldset>
							<legend>Trading</legend>
							<table>
								<tr><td><input type="checkbox" name="chkTradingServ" value="1" <?php echo ($broker->m_TradingServices['bAMO'] == 1) ? "checked" : "" ;?>/></td><td>After Market Orders</td></tr>
								<tr><td><input type="checkbox" name="chkTradingServ" value="1" <?php echo ($broker->m_TradingServices['bPMO'] == 1) ? "checked" : "" ;?>/></td><td>Pre Market Orders</td></tr>
								<tr><td colspan="2">
								<fieldset>
									<legend>Charting</legend>
									<table>
									<tr><td><input type="checkbox" name="chkChartingServ" value="1" <?php echo ($broker->m_ChartingServices['bBasic'] == 1) ? "checked" : "" ;?>/></td><td>Basic</td></tr>
									<tr><td><input type="checkbox" name="chkChartingServ" value="1" <?php echo ($broker->m_ChartingServices['bAdvanced'] == 1) ? "checked" : "" ;?>/></td><td>Advanced (Technical Analysis)</td></tr>
									</table>
								</fieldset>
								</td></tr>
								<tr><td><input type="checkbox" name="chkTradingServ" value="1" <?php echo ($broker->m_TradingServices['bGreekNeutralizer'] == 1) ? "checked" : "" ;?>/></td><td>Greek Neutralizer</td></tr>
								<tr><td><input type="checkbox" name="chkTradingServ" value="1" <?php echo ($broker->m_TradingServices['bOptionsAnalysis'] == 1) ? "checked" : "" ;?>/></td><td>Options Analysis</td></tr>
								<tr><td><input type="checkbox" name="chkTradingServ" value="1" <?php echo ($broker->m_TradingServices['bSmartOrderRouting'] == 1) ? "checked" : "" ;?>/></td><td>Smart Order Routing</td></tr>
							</table>
						</fieldset>
						</td></tr>
						<tr><td><input type="checkbox" name="chkServices"  value="1" <?php echo ($broker->m_ServiceParams['bProgramTrading'] == 1) ? "checked" : "" ;?>/></td><td>Program Trading</td></tr>
						<tr><td colspan="2">
						<fieldset>
						<legend>PMS</legend>
						<table>
						<tr><td><input type="checkbox" name="chkPMSServ" value="1" <?php echo ($broker->m_PMSServices['bDiscretionary'] == 1) ? "checked" : "" ;?>/></td><td>Discretionary</td></tr>
						<tr><td><input type="checkbox" name="chkPMSServ" value="1" <?php echo ($broker->m_PMSServices['bNonDiscretionary'] == 1) ? "checked" : "" ;?>/></td><td>Non-Discretionary</td></tr>
						</table>
						</fieldset>
						</td></tr>
						<tr><td><input type="checkbox" name="chkServices"  value="1" <?php echo ($broker->m_ServiceParams['bIPO'] == 1) ? "checked" : "" ;?>/></td><td>IPO</td></tr>
						<tr><td><input type="checkbox" name="chkServices"  value="1" <?php echo ($broker->m_ServiceParams['bMutualFund'] == 1) ? "checked" : "" ;?>/></td><td>Mutual Funds</td></tr>
						<tr><td><input type="checkbox" name="chkServices"  value="1" <?php echo ($broker->m_ServiceParams['bBonds'] == 1) ? "checked" : "" ;?>/></td><td>Bonds</td></tr>
						<tr><td><input type="checkbox" name="chkServices"  value="1" <?php echo ($broker->m_ServiceParams['bInsurance'] == 1) ? "checked" : "" ;?>/></td><td>Insurance</td></tr>
						<tr><td><input type="checkbox" name="chkServices"  value="1" <?php echo ($broker->m_ServiceParams['bFixedDeposits'] == 1) ? "checked" : "" ;?>/></td><td>Fixed Deposits</td></tr>
						<tr><td><input type="checkbox" name="chkServices"  value="1" <?php echo ($broker->m_ServiceParams['bRealEstate'] == 1) ? "checked" : "" ;?>/></td><td>Real Estate</td></tr>
						<tr><td><input type="checkbox" name="chkServices"  value="1" <?php echo ($broker->m_ServiceParams['bAdvisoryServices'] == 1) ? "checked" : "" ;?>/></td><td>Advisory Services</td></tr>
						<tr><td><input type="checkbox" name="chkServices"  value="1" <?php echo ($broker->m_ServiceParams['bForex'] == 1) ? "checked" : "" ;?>/></td><td>Forex</td></tr>
						</table>
						<input type="button" name="btnUpdateServices" id="btnUpdateServices" value="Update" class="btn" />
					</div>
					<div id="7" class="tab-pane">
						<table>
						<tr><td colspan="2">
						<fieldset>
							<legend>SMS Alerts</legend>
							<table>
								<tr><td><input type="checkbox" name="chkSMSAlert" value="1" <?php echo ($broker->m_SMSAlerts['bOrderConfirmation'] == 1) ? "checked" : "" ;?>/></td><td>SMS on Order Confirmation</td></tr>
								<tr><td><input type="checkbox" name="chkSMSAlert" value="1" <?php echo ($broker->m_SMSAlerts['bOrderModification'] == 1) ? "checked" : "" ;?>/></td><td>SMS on Order Modification</td></tr>
								<tr><td><input type="checkbox" name="chkSMSAlert" value="1" <?php echo ($broker->m_SMSAlerts['bOrderCancellation'] == 1) ? "checked" : "" ;?>/></td><td>SMS on Order Cancellation</td></tr>
								<tr><td><input type="checkbox" name="chkSMSAlert" value="1" <?php echo ($broker->m_SMSAlerts['bTradeConfiramtion'] == 1) ? "checked" : "" ;?>/></td><td>SMS on Trade Confirmation</td></tr>
								<tr><td><input type="checkbox" name="chkSMSAlert" value="1" <?php echo ($broker->m_SMSAlerts['bMTMBreach'] == 1) ? "checked" : "" ;?>/></td><td>SMS on MTM Breach</td></tr>
								<tr><td><input type="checkbox" name="chkSMSAlert" value="1" <?php echo ($broker->m_SMSAlerts['bLedgerUpdate'] == 1) ? "checked" : "" ;?>/></td><td>SMS on Ledger Update</td></tr>
								<tr><td><input type="checkbox" name="chkSMSAlert" value="1" <?php echo ($broker->m_SMSAlerts['bFundTransfer'] == 1) ? "checked" : "" ;?>/></td><td>SMS on Fund Transfer</td></tr>
								<tr><td><input type="checkbox" name="chkSMSAlert" value="1" <?php echo ($broker->m_SMSAlerts['bIPOBidEntry'] == 1) ? "checked" : "" ;?>/></td><td>SMS on IPO Bid Entry</td></tr>
								<tr><td><input type="checkbox" name="chkSMSAlert" value="1" <?php echo ($broker->m_SMSAlerts['bIPOBidConfirmation'] == 1) ? "checked" : "" ;?>/></td><td>SMS on IPO Bid Confirmation</td></tr>
								<tr><td><input type="checkbox" name="chkSMSAlert" value="1" <?php echo ($broker->m_SMSAlerts['bMFOrderEntry'] == 1) ? "checked" : "" ;?>/></td><td>SMS on MF Order Entry</td></tr>
								<tr><td><input type="checkbox" name="chkSMSAlert" value="1" <?php echo ($broker->m_SMSAlerts['bMFOrderBooking'] == 1) ? "checked" : "" ;?>/></td><td>SMS on MF Order Booking</td></tr>
							</table>
						</fieldset>
						</td></tr>
						<tr><td colspan="2">
						<fieldset>
							<legend>Research</legend>
							<table>
								<tr><td><input type="checkbox" name="chkResearch" value="1" <?php echo ($broker->m_ResearchParams['bFundamental'] == 1) ? "checked" : "" ;?>/></td><td>Fundamental Research Reports</td></tr>
								<tr><td><input type="checkbox" name="chkResearch" value="1" <?php echo ($broker->m_ResearchParams['bTechnical'] == 1) ? "checked" : "" ;?>/></td><td>Technical Research Reports</td></tr>
							</table>
						</fieldset>
						</td></tr>
						<tr><td colspan="2">
						<fieldset>
						<legend>SMS Query</legend>
						<table>
						<tr><td><input type="checkbox" name="chkSMSQuery" value="1" <?php echo ($broker->m_SMSQuery['bLedgerBalance'] == 1) ? "checked" : "" ;?>/></td><td>Ledger Balance</td></tr>
						<tr><td><input type="checkbox" name="chkSMSQuery" value="1" <?php echo ($broker->m_SMSQuery['bOrders'] == 1) ? "checked" : "" ;?>/></td><td>Orders</td></tr>
						<tr><td><input type="checkbox" name="chkSMSQuery" value="1" <?php echo ($broker->m_SMSQuery['bTrades'] == 1) ? "checked" : "" ;?>/></td><td>Trades</td></tr>
						<tr><td><input type="checkbox" name="chkSMSQuery" value="1" <?php echo ($broker->m_SMSQuery['bNetPosition'] == 1) ? "checked" : "" ;?>/></td><td>NetPosition</td></tr>
						</table>
						</fieldset>
						</td></tr>
						<tr><td><input type="checkbox" name="chkVAS"  value="1" <?php echo ($broker->m_VASParams['bPortfolioTracker'] == 1) ? "checked" : "" ;?>/></td><td>Portfolio Tracker</td></tr>
						</table>
						<input type="button" name="btnUpdateVAS" id="btnUpdateVAS" value="Update" class="btn" />
					</div>
					<div id="8" class="tab-pane">
						<p><input type="checkbox" name="chkCustomerService" value="1" <?php echo ($broker->m_CustomerServices['bDedCallCentre'] == 1) ? "checked" : "" ;?> />Dedicated Call Centre</p>
						<p><input type="checkbox" name="chkCustomerService"  value="1" <?php echo ($broker->m_CustomerServices['bTollFreeNo'] == 1) ? "checked" : "" ;?> />Toll Free Number</p>
						<input type="button" name="btnUpdateCustomerService" id="btnUpdateCustomerService" value="Update" class="btn" />
					</div>
					<div id="9" class="tab-pane">
						<p><input type="checkbox" name="chkAwards" value="1" <?php echo ($broker->m_Awards['bCNBCTV18'] == 1) ? "checked" : "" ;?> />CNBC TV 18</p>
						<p><input type="checkbox" name="chkAwards"  value="1" <?php echo ($broker->m_Awards['bEconomicTimes'] == 1) ? "checked" : "" ;?> />Economic Times</p>
						<p><input type="checkbox" name="chkAwards"  value="1" <?php echo ($broker->m_Awards['bFinanceAsia'] == 1) ? "checked" : "" ;?> />Finance Asia</p>
						<p><input type="checkbox" name="chkAwards"  value="1" <?php echo ($broker->m_Awards['bAsiaMoney'] == 1) ? "checked" : "" ;?> />Asia Money</p>
						<p><input type="checkbox" name="chkAwards"  value="1" <?php echo ($broker->m_Awards['bCNBCFinancialAdvisor'] == 1) ? "checked" : "" ;?> />CNBC Financial Advisor</p>
						<p><input type="checkbox" name="chkAwards"  value="1" <?php echo ($broker->m_Awards['bThomsonExtelSurveys'] == 1) ? "checked" : "" ;?> />Thomson Extel Surveys</p>
						<p><input type="checkbox" name="chkAwards"  value="1" <?php echo ($broker->m_Awards['bAvayaCustomerResponsiveness'] == 1) ? "checked" : "" ;?> />Avaya Customer Responsiveness</p>
						<p><input type="checkbox" name="chkAwards"  value="1" <?php echo ($broker->m_Awards['bEuromoney'] == 1) ? "checked" : "" ;?> />Euromoney</p>
						<p><input type="checkbox" name="chkAwards"  value="1" <?php echo ($broker->m_Awards['bPrimeranking'] == 1) ? "checked" : "" ;?> />Primeranking</p>
						<p><input type="checkbox" name="chkAwards"  value="1" <?php echo ($broker->m_Awards['bZeeBusiness'] == 1) ? "checked" : "" ;?> />Zee Business</p>
						<p><input type="checkbox" name="chkAwards"  value="1" <?php echo ($broker->m_Awards['bOutlookMoney'] == 1) ? "checked" : "" ;?> />Outlook Money</p>
						<p><input type="checkbox" name="chkAwards"  value="1" <?php echo ($broker->m_Awards['bCNBCAwaazConsumer'] == 1) ? "checked" : "" ;?> />CNBC Awaaz Consumer</p>
						<p><input type="checkbox" name="chkAwards"  value="1" <?php echo ($broker->m_Awards['bTheWallStreetJournal'] == 1) ? "checked" : "" ;?> />The Wall Street Journal</p>
						<p><input type="checkbox" name="chkAwards"  value="1" <?php echo ($broker->m_Awards['bGlobalFinance'] == 1) ? "checked" : "" ;?> />Global Finance</p>
						<p><input type="checkbox" name="chkAwards"  value="1" <?php echo ($broker->m_Awards['bIndianBanksAssociation'] == 1) ? "checked" : "" ;?> />Indian Banks Association</p>
						<input type="button" name="btnUpdateAwards" id="btnUpdateAwards" value="Update" class="btn" />
					</div>
					<div id="divCharges" class="tab-pane">
						<form id="frmCharges" class="form-horizontal">
							<fieldset>
								<legend>Charges</legend>
								<div class="control-group">
									<label class="control-label" for="txtAcctOpening">Account Opening:</label>
									<div class="controls">
										<div class="input-prepend">
											<span class="add-on">%</span><input type="text" name="txtAcctOpening" id="txtAcctOpening" value="<?php echo $broker->m_Charges['acct_opening'];?>">	
										</div>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="txtAMCAnnual">AMC - Annual:</label>
									<div class="controls">
										<div class="input-prepend">
											<span class="add-on">%</span><input type="text" name="txtAMCAnnual" id="txtAMCAnnual" value="<?php echo $broker->m_Charges['amc_annual'];?>">	
										</div>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="txtAMCMonthly">AMC - Monthly:</label>
									<div class="controls">
										<div class="input-prepend">
											<span class="add-on">%</span><input type="text" name="txtAMCMonthly" id="txtAMCMonthly" value="<?php echo $broker->m_Charges['amc_monthly'];?>">	
										</div>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="txtOtherService">Other Service:</label>
									<div class="controls">
										<div class="input-prepend">
											<span class="add-on">%</span><input type="text" name="txtOtherService" id="txtOtherService" value="<?php echo $broker->m_Charges['other_service'];?>">	
										</div>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="txtEXETrading">EXE Trading:</label>
									<div class="controls">
										<div class="input-prepend">
											<span class="add-on">%</span><input type="text" name="txtEXETrading" id="txtEXETrading" value="<?php echo $broker->m_Charges['exe_trading'];?>">	
										</div>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="txtBrowserTrading">Browser Trading:</label>
									<div class="controls">
										<div class="input-prepend">
											<span class="add-on">%</span><input type="text" name="txtBrowserTrading" id="txtBrowserTrading" value="<?php echo $broker->m_Charges['browser_trading'];?>">	
										</div>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="txtMobileTrading">Mobile Trading:</label>
									<div class="controls">
										<div class="input-prepend">
											<span class="add-on">%</span><input type="text" name="txtMobileTrading" id="txtMobileTrading" value="<?php echo $broker->m_Charges['mobile_trading'];?>">	
										</div>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="txtCallnTrade">Call n Trade:</label>
									<div class="controls">
										<div class="input-prepend">
											<span class="add-on">%</span><input type="text" name="txtCallnTrade" id="txtCallnTrade" value="<?php echo $broker->m_Charges['call_n_trade'];?>">	
										</div>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="txtAccountClosure">Account Closure:</label>
									<div class="controls">
										<div class="input-prepend">
											<span class="add-on">%</span><input type="text" name="txtAccountClosure" id="txtAccountClosure" value="<?php echo $broker->m_Charges['account_closure'];?>">	
										</div>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="txtProgramTrading">Program Trading:</label>
									<div class="controls">
										<div class="input-prepend">
											<span class="add-on">%</span><input type="text" name="txtProgramTrading" id="txtProgramTrading" value="<?php echo $broker->m_Charges['program_trading'];?>">	
										</div>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="txtFutureTrading">Future Trading:</label>
									<div class="controls">
										<div class="input-prepend">
											<span class="add-on">%</span><input type="text" name="txtFutureTrading" id="txtFutureTrading" value="<?php echo $broker->m_Charges['future_trading'];?>">	
										</div>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="txtOptions">Options:</label>
									<div class="controls">
										<div class="input-prepend">
											<span class="add-on">%</span><input type="text" name="txtOptions" id="txtOptions" value="<?php echo $broker->m_Charges['options'];?>">	
										</div>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="txtMinBrokerage">Min. Brokerage:</label>
									<div class="controls">
										<div class="input-prepend">
											<span class="add-on">%</span><input type="text" name="txtMinBrokerage" id="txtMinBrokerage" value="<?php echo $broker->m_Charges['min_brokerage'];?>">	
										</div>
									</div>
								</div>
								<input type="button" class="btn btn-primary pull-right" value="Update Charges" id="btnUpdateCharges">
							</fieldset>
						</form>
					</div>
					<div id="divBrokerageCharges" class="tab-pane">
						<form id="frmBrokerageCharges">
							<fieldset>
								<legend>Brokerage</legend>
								<label class="control-label" for="txtMargin">Margin:</label>
								<input type="text" name="txtMargin" id="txtMargin" value="<?php echo $broker->m_BrokerageCharges['Margin'];?>">
								<label class="control-label"  for="txtDelivery">Delivery:</label>
								<input type="text" name="txtDelivery" id="txtDelivery" value="<?php echo $broker->m_BrokerageCharges['Delivery'];?>">
								<label class="control-label"  for="txtPTST">PTST:</label>
								<input type="text" name="txtPTST" id="txtPTST" value="<?php echo $broker->m_BrokerageCharges['PTST'];?>">
								<label class="control-label"  for="txtMTF">MTF:</label>
								<input type="text" name="txtMTF" id="txtMTF" value="<?php echo $broker->m_BrokerageCharges['MTF'];?>">
								<label class="control-label"  for="txtShortSelling">ShortSelling:</label>
								<input type="text" name="txtShortSelling" id="txtShortSelling" value="<?php echo $broker->m_BrokerageCharges['ShortSelling'];?>">
								<label class="control-label"  for="txtMarginwithSL">MarginwithSL:</label>
								<input type="text" name="txtMarginwithSL" id="txtMarginwithSL" value="<?php echo $broker->m_BrokerageCharges['MarginwithSL'];?>">
								<p><input type="button" class="btn btn-primary pull-right" value="Update Brokerage" id="btnUpdateBrokerageCharges"></p>
							</fieldset>
						</form>
					</div><!-- #divBrokerageCharges -->
					<div id="divDPCharges" class="tab-pane">
						<form id="frmDPCharges" class="form-horizontal">
							<fieldset>
								<legend>Brokerage</legend>
								<div class="control-group">
									<label class="control-label" for="txtDematIn">Demat-In:</label>
									<div class="controls">
										<input type="text" name="txtDematIn" id="txtDematIn" value="<?php echo $broker->m_DPCharges['demat_in'];?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"  for="txtDematOut">Demat-Out:</label>
									<div class="controls">
										<input type="text" name="txtDematOut" id="txtDematOut" value="<?php echo $broker->m_DPCharges['demat_out'];?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"  for="txtInterSettlement">Inter-Settlement:</label>
									<div class="controls">
										<input type="text" name="txtInterSettlement" id="txtInterSettlement" value="<?php echo $broker->m_DPCharges['inter_settlement'];?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"  for="txtReMat">Re-Mat:</label>
									<div class="controls">
										<input type="text" name="txtReMat" id="txtReMat" value="<?php echo $broker->m_DPCharges['re_mat'];?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"  for="txtOffMarketTrans">Off Market Transaction:</label>
									<div class="controls">
										<input type="text" name="txtOffMarketTrans" id="txtOffMarketTrans" value="<?php echo $broker->m_DPCharges['off_market_transaction'];?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"  for="txtDpInstrBooklet">New DP Instruction Booklet:</label>
									<div class="controls">
										<input type="text" name="txtDpInstrBooklet" id="txtDpInstrBooklet" value="<?php echo $broker->m_DPCharges['dp_instruction_booklet'];?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"  for="txtDpOthers">Others:</label>
									<div class="controls">
										<input type="text" name="txtDpOthers" id="txtDpOthers" value="<?php echo $broker->m_DPCharges['others'];?>">
									</div>
								</div>
								<input type="button" class="btn btn-primary pull-right" value="Update Brokerage" id="btnUpdateDPCharges">
							</fieldset>
						</form>
					</div><!-- #divDPCharges -->
					<div id="divPaymentGateway" class="tab-pane">
						<form id="frmPG">
							<fieldset>
								<legend>Payment Gateways</legend>
								<label class="control-label" for="txtBanks">Banks:</label>
								<input type="text" name="txtBanks" id="txtBanks" value="<?php echo $broker->m_PaymentGateways['banks'];?>">
								<label class="control-label"  for="txtAggregators">Aggregators:</label>
								<input type="text" name="txtAggregators" id="txtAggregators" value="<?php echo $broker->m_PaymentGateways['aggregators'];?>">
								<p><input type="button" class="btn btn-primary pull-right" value="Update Payment Gateways" id="btnUpdatePG"></p>
							</fieldset>
						</form>
					</div><!-- #divPaymentGateway-->
					<div id="divDPGateway" class="tab-pane">
						<form id="frmDPGateways">
							<fieldset>
								<legend>DP Gateways</legend>
								<label class="control-label" for="txtSelfPoa">Self POA Only:</label>
								<input type="text" name="txtSelfPoa" id="txtSelfPoa" value="<?php echo $broker->m_DPGateways['self_poa'];?>">
								<label class="control-label"  for="txtDpParticipants">DP Participants:</label>
								<input type="text" name="txtDpParticipants" id="txtDpParticipants" value="<?php echo $broker->m_DPGateways['dp_participants'];?>">
								<p><input type="button" class="btn btn-primary pull-right" value="Update DP Gateways" id="btnUpdateDPGateways"></p>
							</fieldset>
						</form>
					</div><!-- #divDPGateway-->
				</div><!-- .tab-content-->
				
			</div><!-- .tabbable -->
			</div><!-- span9 -->
	    </div><!-- row-fluid-->
	</div><!-- container-fluid--->
<?php include 'footer.php';?>
<script type="text/javascript" src="js/update_params.js"></script>
