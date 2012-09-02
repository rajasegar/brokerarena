<?php 
//ajax_filterbrokers.php

require_once 'includes/global.inc.php';
if(isset($_GET['filter']))
{
	//Getting filter parameters from url
	$filter = $_GET['filter'];
	$mode = $_GET['mode']; // 1 - Add filter, 2 - Remove filter
	$html = "";
	$where = "";
	if($mode == 1) {
		$_SESSION['filters'][$filter] = $filter;
	}
	else {
		unset($_SESSION['filters'][$filter]);
	}
	if(isset($_SESSION['filters'])) {
		$filters = $_SESSION['filters'];
		
		foreach($filters as $f) {
			//$html .= $f;
			if($f == 1)	// Equities
			{
				$where .= "nbrokerid IN (SELECT nbrokerid FROM tbl_exchangememberships WHERE bNSEEq =1 or bBseeq =1) ";
			}
			else if($f == 2)	// Derivatives
			{
				$where .= "nbrokerid IN (SELECT nbrokerid FROM tbl_exchangememberships WHERE bNSEDerv =1 or bBSEDerv =1) ";
			}
			else if($f == 3)	// Commodities
			{
				$where .= "nbrokerid IN (SELECT nbrokerid FROM tbl_exchangememberships WHERE bNSELCommoditySpot =1 or bMCXCommodityDerv =1 or bNCDEXCommodityDerv = 1 or 
						bICEXCommodityDerv = 1 or bNMCECommodityDerv = 1 or bACECommodityDerv = 1) ";
			}
			else if($f == 4)	// Currency
			{
				$where .= "nbrokerid IN (SELECT nbrokerid FROM tbl_exchangememberships WHERE bNSECurrencyDerv =1 or bUSECurrencyDerv =1 or bMCXSXCurrencyDerv = 1) ";
			}
			else if($f == 5)	// Products - IPO
			{
				$where .= "nbrokerid IN (SELECT nbrokerid FROM tbl_products WHERE bOnlineIPO =1) ";
			}
			else if($f == 6)	// Products - Mutual Funds
			{
				$where .= "nbrokerid IN (SELECT nbrokerid FROM tbl_products WHERE bOnlineMF =1) ";
			}
			else if($f == 7)	// Products - Bonds
			{
				$where .= "nbrokerid IN (SELECT nbrokerid FROM tbl_products WHERE bOnlineBonds =1) ";
			}
			else if($f == 8)	// Services - Trading Software
			{
				$where .= "nbrokerid IN (SELECT nbrokerid FROM tbl_onlineacctservices WHERE bEXEBasedTrading =1) ";
			}
			else if($f == 9)	// Services - Mobile Trading
			{
				$where .= "nbrokerid IN (SELECT nbrokerid FROM tbl_onlineacctservices WHERE bMobileBasedTrading =1) ";
			}
			else if($f == 10)	// Services - Browser Trading
			{
				$where .= "nbrokerid IN (SELECT nbrokerid FROM tbl_onlineacctservices WHERE bBrowserBasedTrading =1) ";
			}
			else if($f == 11)	// Services - Call N Trade
			{
				$where .= "nbrokerid IN (SELECT nbrokerid FROM tbl_onlineacctservices WHERE bCallNTrade =1) ";
			}
			else if($f == 12)	// Services - Charting
			{
				$where .= "nbrokerid IN (SELECT nbrokerid FROM tbl_chartingservices WHERE bBasic =1 or bAdvanced = 1) ";
			}
			else if($f == 13)	// Services - PMS
			{
				$where .= "nbrokerid IN (SELECT nbrokerid FROM tbl_pmsservices WHERE bDiscretionary =1 or bNonDiscretionary = 1) ";
			}
			else if($f == 14)	// Value Added Services - SMS Alerts
			{
				$where .= "nbrokerid IN (SELECT nbrokerid FROM tbl_smsalerts WHERE bOrderConfirmation =1 or bOrderModification = 1 or bOrderCancellation = 1
					or bTradeConfiramtion = 1 or bMTMBreach = 1 or bLedgerUpdate = 1 or bFundTransfer = 1 or bIPOBidEntry = 1 or bIPOBidConfirmation = 1 or
					bMFOrderEntry = 1 or bMFOrderBooking = 1) ";
			}
			else if($f == 15)	// Value Added Services - Research
			{
				$where .= "nbrokerid IN (SELECT nbrokerid FROM tbl_research WHERE 	bFundamental =1 or bTechnical = 1) ";
			}
			else if($f == 16)	// Value Added Services - SMS Query
			{
				$where .= "nbrokerid IN (SELECT nbrokerid FROM tbl_smsquery WHERE bLedgerBalance =1 or bOrders = 1 or bTrades=1 or bNetPosition=1) ";
			}
			else if($f == 17)	// Security - 2 Factor Auth
			{
				$where .= "nbrokerid IN (SELECT nbrokerid FROM tbl_securityparams WHERE bTwoFactorAuth =1 ) ";
			}
			else if($f == 18)	// Security - SSL Encryption
			{
				$where .= "nbrokerid IN (SELECT nbrokerid FROM tbl_securityparams WHERE bSSLEncr = 1 ) ";
			}
			else if($f == 19)	// Account opening - Doorstep
			{
				$where .= "nbrokerid IN (SELECT nbrokerid FROM tbl_acctopenmode WHERE bDoorStepService =1 ) ";
			}
			else if($f == 20)	// Account opening - walk-in
			{
				$where .= "nbrokerid IN (SELECT nbrokerid FROM tbl_acctopenmode WHERE bWalkIn =1 ) ";
			}
			else if($f == 21)	// Customer service - Dedicated CC
			{
				$where .= "nbrokerid IN (SELECT nbrokerid FROM tbl_customerservice WHERE bDedCallCentre =1) ";
			}
			else if($f == 22)	// Customer service - Toll free
			{
				$where .= "nbrokerid IN (SELECT nbrokerid FROM tbl_customerservice WHERE bTollFreeNo =1) ";
			}
			$where .= " and ";
		}
	}
	
	// For determining total no of rows
	$where .= " 1=1 ";
	$_SESSION['filter_query'] = $where;
	$db->select('tbl_brokermaster',$where);
	$totalrows = $db->getnumRows();
	
	// Now for pagination
	$recordstart = 0;
	$pagesize = (isset($_SESSION['pagesize']))?$_SESSION['pagesize']:5;
	$orderby = (isset($_SESSION['orderby']))?$_SESSION['orderby']:"order by sBrokerName";
	$where .= " $orderby limit $recordstart ,$pagesize ";
	
	
	$brokers = $db->select('tbl_brokermaster',$where);
	
	$totalpages = ceil($totalrows / $pagesize);
	$currentpage = ($recordstart / $pagesize ) + 1;
	
	if(!($db->getnumRows() == 1)) {
		foreach($brokers as $broker)
		{
			$html .= $userTools->renderBroker($broker);

		}
	}
	else {
		$html .= $userTools->renderBroker($brokers);
	}
	
	// Now for pagination links
	if($brokers) {
		$html .= '<div class="pagination">';
		$html .= pageLinks($totalpages,$currentpage,$pagesize,"recordstart","brokers.php");
		$html .= "</div>";
		echo $html;
	}
	else echo "No Brokers Found.";
	
	
}

?>
