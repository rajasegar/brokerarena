<?php
require_once 'includes/global.inc.php';
$brokers = array();
$broker_count = 0;
$columns = 1;
// First try to get the list of brokers from url parameters
if((isset($_GET['b1'])) || (isset($_GET['b2'])) || (isset($_GET['b3'])) || (isset($_GET['b4']))) {
	if(isset($_GET['b1'])) {
		$broker = $userTools->getBroker($_GET['b1']);
		array_push($brokers,$broker);
	}
	if(isset($_GET['b2'])) {
		$broker = $userTools->getBroker($_GET['b2']);
		array_push($brokers,$broker);
	}
	if(isset($_GET['b3'])) {
		$broker = $userTools->getBroker($_GET['b3']);
		array_push($brokers,$broker);
	}
	if(isset($_GET['b4'])) {
		$broker = $userTools->getBroker($_GET['b4']);
		array_push($brokers,$broker);
	}
	foreach($brokers as $broker)
		{
			$broker->loadParams();
		}
}
else {	// if not , then search from the session variables
	if(isset($_SESSION['compare_tray'])) {
		$brokers = $_SESSION['compare_tray'];
		
		foreach($brokers as $brokerid => $broker)
		{
			$broker->loadParams();
		}
	}
	else {
		$brokers = array();
	}
}
$broker_count = count($brokers);
$columns =  $broker_count + 1;

?>
<?php include 'header.php';?>


	<div class="container">
	    <div class="row">
	        
	            <div class="span9">
	                <h1>Compare Brokers</h1>
					<p>
						<a id="btnExpandCollapse" class="btn btn-mini" href="#"><i class="icon icon-minus-sign"></i> Collapse All</a>
						<a class="btn btn-mini btn-primary pull-right" data-toggle="modal" href="#myModal"><i class="icon icon-white icon-edit"></i> Modify Brokers</a>
						</p>
						<div class="table_container">
						<table class="table table-striped table-condensed table-bordered">
						<thead>
						<tr>
						<th class='title'>Parameters</th>
						<?php
						foreach($brokers as $broker)
						{
							echo "<th><a href='#' rel='popover' data-content='<img src=\"$broker->m_Logo\" alt=\"$broker->m_BrokerName\">' data-original-title='$broker->m_BrokerName'>".$broker->m_BrokerName."</a></th>";
						}
						?>
						</tr>
						</thead>
						<tbody id="tbExch">
						<tr><th colspan="<?php echo $columns;?>" >Exchange Segment Memberships</th></tr>
						<tr>
						<td>NSE Equities</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td class='value'>".yes_or_no($broker->m_ExchSgmtParams['bNSEEq'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>BSE Equities</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_ExchSgmtParams['bBSEEq'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>NSE Derivatives</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_ExchSgmtParams['bNSEDerv'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>BSE Derivatives</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_ExchSgmtParams['bBSEDerv'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>NSE Currency Derivatives</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_ExchSgmtParams['bNSECurrencyDerv'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>USE Currency Derivatives</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_ExchSgmtParams['bUSECurrencyDerv'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>MCXSX Currency Derivatives</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_ExchSgmtParams['bMCXSXCurrencyDerv'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>NSEL Commodity Spot Exchange</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_ExchSgmtParams['bNSELCommoditySpot'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>MCX Commodity Derivatives</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_ExchSgmtParams['bMCXCommodityDerv'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>NCDEX Commodity Derivatives</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_ExchSgmtParams['bNCDEXCommodityDerv'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>ICEX Commodity Derivatives</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_ExchSgmtParams['bICEXCommodityDerv'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>NMCE Commodity Derivatives</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_ExchSgmtParams['bNMCECommodityDerv'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>ACE Commodity Derivatives</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_ExchSgmtParams['bACECommodityDerv'])."</td>";
						}
						?>
						</tr>
						</tbody>
						<tbody>
						<tr><th colspan="5" >Products</th></tr>
						<tr>
						<td>Margin</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_Products['bMargin'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Delivery</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_Products['bDelivery'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>PTST</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_Products['bPTST'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Margin Trade Funding</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_Products['bMarginTradeFunding'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Stock Lending & Borrowing (Short Selling)</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_Products['bShortSelling'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Margin with Stop Loss (High Leverage)</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_Products['bMarginwithSL'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Online IPO</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_Products['bOnlineIPO'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Online Mutual Funds</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_Products['bOnlineMF'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Online Bonds</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_Products['bOnlineBonds'])."</td>";
						}
						?>
						</tr>
						</tbody>
						<tbody>
						<tr><th colspan="5" >Branches</th></tr>
						<tr>
						<td>No. of own Branches</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".$broker->m_BranchParams['nOwnBranches']."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Own Branches List</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_BranchParams['sBranchList']."</td>";
							}
						?>
						</tr>
						<tr>
						<td>No. of Franchisee Branches</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".$broker->m_BranchParams['nFranchiseeBranches']."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Franchisee Branches List</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_BranchParams['sFranchiseeList']."</td>";
							}
						?>
						</tr>
						</tbody>
						<tbody>
						<tr><th colspan="5" >Payment Gateways</th></tr>
						<tr>
						<td>List of Banks</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_PaymentGateways['banks']."</td>";
							}
						?>
						</tr>
						<tr>
						<td>List of Aggregators</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_PaymentGateways['aggregators']."</td>";
							}
						?>
						</tr>
						</tbody>
						<tbody>
						<tr><th colspan="5" >DP Gateways</th></tr>
						<tr>
						<td>Self POA Only</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_DPGateways['self_poa']."</td>";
							}
						?>
						</tr>
						<tr>
						<td>List of Depository Participants</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_DPGateways['dp_participants']."</td>";
							}
						?>
						</tr>
						</tbody>
						<tbody>
						<tr><th colspan="5" >Mode of Account Opening</th></tr>
						<tr>
						<td>Door-step Service</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_AcctOpeningModes['bDoorStepService'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Walk-In</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_AcctOpeningModes['bWalkIn'])."</td>";
						}
						?>
						</tr>
						</tbody>
						<tbody>
						<tr><th colspan="5" >Risk Management</th></tr>
						<tr>
						<td class="sub_param" colspan="5">Margin Limit</td>
						</tr>
						<tr>
						<td class="sub_param_value">Margin</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_RMS_MarginParams['bMargin'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">Delivery</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_RMS_MarginParams['bDelivery'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">PTST</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_RMS_MarginParams['bPTST'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">Margin Trade Funding</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_RMS_MarginParams['bMarginTradeFunding'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">Stock Lending & Borrowing (Short Selling)</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_RMS_MarginParams['bShortSelling'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">Margin with Stop Loss</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_RMS_MarginParams['bMarginwithSL'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Mark to Market Limit</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_RMSParams['bMTMLimit'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Turn Over Limit</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_RMSParams['bTurnoverLimit'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Gross Exposure Limit</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_RMSParams['bGrossExposureLimit'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Net Exposure Limit</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_RMSParams['bNetExposureLimit'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Net Buy Limit</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_RMSParams['bNetBuyLimit'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Net Sell Limit</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_RMSParams['bNetSellLimit'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>MTM Auto Square-Off</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_RMSParams['bMTMAutoSqOff'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Timer Auto Square-Off</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_RMSParams['bTimerAutoSqOff'])."</td>";
						}
						?>
						</tr>
						</tbody>
						<tbody>
						<tr><th colspan="5" >Services</th></tr>
						<tr>
						<td>Offline Account</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_ServiceParams['bOfflineAcct'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td colspan="5" class="sub_param">Online Account</td>
						</tr>
						<tr>
						<td class="sub_param_value">EXE based Trading</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_OnlineAcctServices['bEXEBasedTrading'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">Browser based Trading</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_OnlineAcctServices['bBrowserBasedTrading'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">Mobile based Trading</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_OnlineAcctServices['bMobileBasedTrading'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">Call N Trade</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_OnlineAcctServices['bCallNTrade'])."</td>";
						}
						?>
						</tr>
						<td colspan="5" class="sub_param">Trading</td>
						</tr>
						<tr>
						<td class="sub_param_value">After Market Orders</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_TradingServices['bAMO'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">Pre-Market Orders</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_TradingServices['bPMO'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td class="sub_param1" colspan="5">Charting</td>
						</tr>
						<tr>
						<td class="sub_param1_value">Basic</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_ChartingServices['bBasic'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td class="sub_param1_value">Advanced (Technical Analysis)</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_ChartingServices['bAdvanced'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">Greek Neutralizer</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_TradingServices['bGreekNeutralizer'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">Options Analysis</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_TradingServices['bOptionsAnalysis'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">Smart Order Routing</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_TradingServices['bSmartOrderRouting'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Program Trading</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_ServiceParams['bProgramTrading'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td colspan="5" class="sub_param">PMS</td>
						</tr>
						<tr>
						<td class="sub_param_value">Discretionary</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_PMSServices['bDiscretionary'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">Non-Discretionary</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_PMSServices['bNonDiscretionary'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>IPO</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_ServiceParams['bIPO'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Mutual Fund</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_ServiceParams['bMutualFund'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Bonds</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_ServiceParams['bBonds'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Insurance</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_ServiceParams['bInsurance'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Fixed Deposits</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_ServiceParams['bFixedDeposits'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Real Estate</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_ServiceParams['bRealEstate'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Advisory Services</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_ServiceParams['bAdvisoryServices'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Forex</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_ServiceParams['bForex'])."</td>";
						}
						?>
						</tr>
						</tbody>
						<tbody>
						<tr><th colspan="5" >Value Added Services</th></tr>
						<tr>
						<td class="sub_param" colspan="5">SMS Alerts</td>
						</tr>
						<tr>
						<td class="sub_param_value">SMS on Order Confirmation</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_SMSAlerts['bOrderConfirmation'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">SMS on Order Modification</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_SMSAlerts['bOrderModification'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">SMS on Order Cancellation</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_SMSAlerts['bOrderCancellation'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">SMS on Trade Confirmation</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_SMSAlerts['bTradeConfiramtion'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">SMS on MTM Breach</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_SMSAlerts['bMTMBreach'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">SMS on Ledger Update</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_SMSAlerts['bLedgerUpdate'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">SMS on Fund Transfer</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_SMSAlerts['bFundTransfer'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">SMS on IPO Bid Entry</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_SMSAlerts['bIPOBidEntry'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">SMS on IPO Bid Confirmation</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_SMSAlerts['bIPOBidConfirmation'])."</td>";
						}
						?>						</tr>
						<tr>
						<td class="sub_param_value">SMS on MF Order Entry</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_SMSAlerts['bMFOrderEntry'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">SMS on MF Order Booking</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_SMSAlerts['bMFOrderBooking'])."</td>";
						}
						?>
						</tr>
						<tr><td colspan="5" class="sub_param">Research</td></tr>
						<tr>
						<td class="sub_param_value">Fundamental Research Reports</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_ResearchParams['bFundamental'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">Technical Research Reports</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_ResearchParams['bTechnical'])."</td>";
						}
						?>
						</tr>
						<tr><td colspan="5" class="sub_param">SMS Query</td></tr>
						<tr>
						<td class="sub_param_value">Ledger Balance</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_SMSQuery['bLedgerBalance'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">Orders</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_SMSQuery['bOrders'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">Trades</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_SMSQuery['bTrades'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">Net Position</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_SMSQuery['bNetPosition'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Portfolio Tracker</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td>".yes_or_no($broker->m_VASParams['bPortfolioTracker'])."</td>";
						}
						?>
						</tr>
						</tbody>
						<tbody>
						<tr><th colspan="5" >Security</th></tr>
						<tr>
						<td>Two Factor Authentication</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td class='value'>".yes_or_no($broker->m_SecurityParams['bTwoFactorAuth'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>SSL Encryption</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td class='value'>".yes_or_no($broker->m_SecurityParams['bSSLEncr'])."</td>";
						}
						?>
						</tr>
						</tbody>
						<tbody>
						<tr><th colspan="5" >Charges</th></tr>
						<tr>
						<td>Account Opening Charges</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_Charges['acct_opening']."</td>";
							}
						?>
						</tr>
						<tr><td colspan="5" class="sub_param">Annual Maintenance Charges</td></tr>
						<tr>
						<td class="sub_param_value">Annual</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_Charges['amc_annual']."</td>";
							}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">Monthly</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_Charges['amc_monthly']."</td>";
							}
						?>
						</tr>
						<tr><td colspan="5" class="sub_param">Brokerage Charges</td></tr>
						<tr>
						<td class="sub_param_value">Margin</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_BrokerageCharges['Margin']."</td>";
							}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">Delivery</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_BrokerageCharges['Delivery']."</td>";
							}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">PTST</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_BrokerageCharges['PTST']."</td>";
							}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">Margin Trade Funding</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_BrokerageCharges['MTF']."</td>";
							}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">Stock Lending & Borrowing (Short Selling)</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_BrokerageCharges['ShortSelling']."</td>";
							}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">Margin with Stop Loss</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_BrokerageCharges['MarginwithSL']."</td>";
							}
						?>
						</tr>
						<tr>
						<td>Other Service Charges</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_Charges['other_service']."</td>";
							}
						?>
						</tr>
						<tr><td colspan="5" class="sub_param">DP Charges</td></tr>
						<tr>
						<td class="sub_param_value">Demat-In Charges</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_DPCharges['demat_in']."</td>";
							}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">Demat-Out Charges</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_DPCharges['demat_out']."</td>";
							}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">Inter-Settlement Charges</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_DPCharges['inter_settlement']."</td>";
							}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">Re-Mat Charges</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_DPCharges['re_mat']."</td>";
							}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">Off-Market Transaction Charges</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_DPCharges['off_market_transaction']."</td>";
							}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">New DP Instruction Booklet Charges</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_DPCharges['dp_instruction_booklet']."</td>";
							}
						?>
						</tr>
						<tr>
						<td class="sub_param_value">Others</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_DPCharges['others']."</td>";
							}
						?>
						</tr>
						<tr>
						<td>EXE Trading Charges</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_Charges['exe_trading']."</td>";
							}
						?>
						</tr>
						<tr>
						<td>Browser Trading Charges</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_Charges['browser_trading']."</td>";
							}
						?>
						</tr>
						<tr>
						<td>Mobile Trading Charges</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_Charges['mobile_trading']."</td>";
							}
						?>
						</tr>
						<tr>
						<td>Call N Trade Trading Charges</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_Charges['call_n_trade']."</td>";
							}
						?>
						</tr>
						<tr>
						<td>Account Closure Charges</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_Charges['account_closure']."</td>";
							}
						?>
						</tr>
						<tr>
						<td>Program Trading</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_Charges['program_trading']."</td>";
							}
						?>
						</tr>
						<tr>
						<td>Futures Trading</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_Charges['future_trading']."</td>";
							}
						?>
						</tr>
						<tr>
						<td>Options</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_Charges['options']."</td>";
							}
						?>
						</tr>
						<tr>
						<td>Min. Brokerage</td>
						<?php 
							foreach($brokers as $broker)
							{
								echo "<td>".$broker->m_Charges['min_brokerage']."</td>";
							}
						?>
						</tr>
						</tbody>
						<tbody>
						<tr><th colspan="5" >Customer Centre</th></tr>
						<tr>
						<td>Dedicated Call Centre</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td class='value'>".yes_or_no($broker->m_CustomerServices['bDedCallCentre'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Toll-Free Number</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td class='value'>".yes_or_no($broker->m_CustomerServices['bTollFreeNo'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Average Response Time</td>
						<?php 
							for($i=0;$i<$broker_count;$i++)
							{
								echo "<td>NA</td>";
							}
						?>
						</tr>
						<tr>
						<td>Client Satisfaction</td>
						<?php 
							for($i=0;$i<$broker_count;$i++)
							{
								echo "<td>NA</td>";
							}
						?>
						</tr>
						</tbody>
						<tbody>
						<tr><th colspan="5">Awards</th></tr>
						<tr>
						<td>CNBC TV 18</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td class='value'>".yes_or_no($broker->m_Awards['bCNBCTV18'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Economic Times</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td class='value'>".yes_or_no($broker->m_Awards['bEconomicTimes'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Finance Asia</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td class='value'>".yes_or_no($broker->m_Awards['bFinanceAsia'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Asia Money</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td class='value'>".yes_or_no($broker->m_Awards['bAsiaMoney'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>CNBC Financial Advisor Awards</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td class='value'>".yes_or_no($broker->m_Awards['bCNBCFinancialAdvisor'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Thomson Extel Surveys Awards</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td class='value'>".yes_or_no($broker->m_Awards['bThomsonExtelSurveys'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Avaya Customer Responsiveness Awards</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td class='value'>".yes_or_no($broker->m_Awards['bAvayaCustomerResponsiveness'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Euromoney Award</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td class='value'>".yes_or_no($broker->m_Awards['bEuromoney'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Primeranking Award</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td class='value'>".yes_or_no($broker->m_Awards['bPrimeranking'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Zee Business</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td class='value'>".yes_or_no($broker->m_Awards['bZeeBusiness'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Outlook Money</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td class='value'>".yes_or_no($broker->m_Awards['bOutlookMoney'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>CNBC Awaaz Consumer Award</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td class='value'>".yes_or_no($broker->m_Awards['bCNBCAwaazConsumer'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>The Wall Street Journal</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td class='value'>".yes_or_no($broker->m_Awards['bTheWallStreetJournal'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Global Finance</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td class='value'>".yes_or_no($broker->m_Awards['bGlobalFinance'])."</td>";
						}
						?>
						</tr>
						<tr>
						<td>Indian Banks Association</td>
						<?php
						foreach($brokers as $broker)
						{
							echo "<td class='value'>".yes_or_no($broker->m_Awards['bIndianBanksAssociation'])."</td>";
						}
						?>
						</tr>
						</tbody>
						</table>
						</div>
<div class="alert alert-warning">
	<strong>Disclaimer.</strong> We can not guarantee that the information on this page is 100% correct. If you think that any information for the brokers is wrong or missing, please <a href="contact_us.php">contact us</a>.
	<br/>Some company and product names, logos on this site may be trademarks or registered trademarks of individual companies and are respectfully acknowledged.
</div>
				</div>
				<div id="sidebar" class="span3">
					<?php include 'sidebar.php';?>
				</div>
	    
	    </div>
		<div class="clear"></div>
	</div>
<?php include 'footer.php';?>
<!-- modal-->
<div class="modal hide" id="myModal">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3>Add / Remove Brokers</h3>
	</div>
	<div class="modal-body">
		<div class="span3">
			<form>
			<fieldset>
				<label for="txtBrokers">Select Brokers:</label>
				<?php
				$options = $db->select('tbl_brokermaster');
				foreach($options as $option)
				{
					echo '<label class="checkbox"><input type="checkbox" value="'.$option['nBrokerID'].'" > '.$option['sBrokerName'].'</label>';
				}
				?>
			</fieldset>
			</form>
		</div>
		<div class="span2">
			<h4>Selected Brokers:</h4>
			<?php
				
				if(is_array($brokers)) {
				foreach($brokers as $brkr) {
					$items = "<div class='alert'><a class='close' data-dismiss='alert' onclick='removefromTray($brkr->m_BrokerID)'>×</a>$brkr->m_BrokerName";
					$items .= "</div>";
					echo $items;
				}
			}
			?>
		</div>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Close</a>
		<a href="#" class="btn btn-primary">Save changes</a>
	</div>
</div>

<script type="text/javascript" src="assets/js/compare.js"></script>

