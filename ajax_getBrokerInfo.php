<?php 
//ajax_getBrokerInfo.php

require_once 'includes/global.inc.php';
if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$data = array();
	$broker = $userTools->getBroker($id);
	if($broker)
	{
		$data["status"] = "success";
		$data["logo"] = $broker->m_Logo;
		$data["name"] = $broker->m_BrokerName;
		$data["m_ExchSgmtParams"] = $broker->getExchSgmtParams();
		$data['m_Products'] = $broker->getProducts();
		$data['m_AcctOpeningModes'] = $broker->getAcctOpeningModes();
		$data['m_RMSParams'] = $broker->getRMSParameters();
		$data['m_RMS_MarginParams'] = $broker->getRMS_MarginParameters();
		$data['m_SecurityParams'] = $broker->getSecurityParameters();
		$data['m_BranchParams'] = $broker->getBranchParameters();
		$data['m_ServiceParams'] = $broker->getServiceParams();
		$data['m_OnlineAcctServices'] = $broker->getOnlineAcctServices();
		$data['m_TradingServices'] = $broker->getTradingServices();
		$data['m_ChartingServices'] = $broker->getChartingServices();
		$data['m_PMSServices'] = $broker->getPMSServices();
		$data['m_VASParams'] = $broker->getVASParams();
		$data['m_SMSAlerts'] = $broker->getSMSAlerts();
		$data['m_SMSQuery'] = $broker->getSMSQuery();
		$data['m_ResearchParams'] = $broker->getResearchParams();
		$data['m_CustomerServices'] = $broker->getCustomerServices();
		$data['m_Awards'] = $broker->getAwards();
		echo json_encode($data);
	}
	else
	{
		$data = array("status" => "failure",
					"message" => "The selected Broker information is not available in the database.");
		echo json_encode($data);
	}
	
}

?>