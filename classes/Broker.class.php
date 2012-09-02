<?php  
//Broker.class.php
require_once 'DB.class.php';


class Broker
{
	public $m_BrokerID;
	public $m_UserID;
	public $m_Password;
	public $m_MailID;
	public $m_joinDate;
	
	public $m_BrokerName;
	public $m_Address;
	public $m_City;
	public $m_State;
	public $m_ZipCode;
	public $m_ContactNo;
	public $m_TollFreeNo;
	public $m_Url;
	public $m_EsttMonth;
	public $m_EsttYear;
	public $m_Description;
	public $m_Logo;
	public $db;
	
	// Parameters
	public $m_ExchSgmtParams;
	public $m_Products;
	public $m_AcctOpeningModes;
	public $m_RMSParams;
	public $m_RMS_MarginParams;
	public $m_SecurityParams;
	public $m_BranchParams;
	public $m_ServiceParams;
	public $m_OnlineAcctServices;
	public $m_TradingServices;
	public $m_ChartingServices;
	public $m_PMSServices;
	public $m_VASParams;	// Value Added Services
	public $m_SMSAlerts;
	public $m_SMSQuery;
	public $m_ResearchParams;
	public $m_CustomerServices;
	public $m_Awards;
	public $m_Charges;
	public $m_BrokerageCharges;
	public $m_DPCharges;
	public $m_PaymentGateways;
	public $m_DPGateways;
	
	// Reviews
	public $m_RevDescription;
	public $m_RevTradingPlatforms;
	public $m_RevBrokerageFees;
	public $m_RevAcctOpening;
	public $m_RevAdvantages;
	public $m_RevDisadvantages;

	//Constructor is called whenever a new object is created.
	// Takes an associative array with the DB row as an argument.
	function __construct($data,$dbobj)
	{
		$this->m_BrokerID = (isset($data['nBrokerID'])) ? $data['nBrokerID'] : "";
		
		$this->m_UserID = (isset($data['sUserName'])) ? $data['sUserName'] : "";
		$this->m_MailID = (isset($data['sMail_ID'])) ? $data['sMail_ID'] : "";
		
		$this->m_BrokerName = (isset($data['sBrokerName'])) ? $data['sBrokerName'] : "";
		$this->m_Address = (isset($data['sAddress'])) ? $data['sAddress'] : "";
		$this->m_City = (isset($data['sCity'])) ? $data['sCity'] : "";
		$this->m_State = (isset($data['sState'])) ? $data['sState'] : "";
		$this->m_ZipCode = (isset($data['sZipCode'])) ? $data['sZipCode'] : "";
		$this->m_ContactNo = (isset($data['nContactNo'])) ? $data['nContactNo'] : "";
		$this->m_TollFreeNo = (isset($data['sTollFreeNo'])) ? $data['sTollFreeNo'] : "";
		$this->m_Url = (isset($data['sWebsite'])) ? $data['sWebsite'] : "";
		$this->m_EsttMonth = (isset($data['dtMonthEstt'])) ? $data['dtMonthEstt'] : "";
		$this->m_EsttYear = (isset($data['dtYearEstt'])) ? $data['dtYearEstt'] : "";
		$this->m_Description = (isset($data['sDescription'])) ? $data['sDescription'] : "";
		$this->m_Logo = (isset($data['sLogoImage'])) ? $data['sLogoImage'] : "";
		
		$this->db = $dbobj;
		
	}
	//Function to list the reviews of broker
	public function getReviews()
	{
		$where = "nBrokerID = '$this->m_BrokerID'";
		$reviews = $this->db->select("tbl_brokerreviews",$where);
		if($reviews)
		{
			
			echo "<div class='row'>";
			if($this->db->getnumRows() == 1) {
				echo "<div class='span1'><strong>".$reviews['sUserID']."</strong></div><div class='span6'>".$reviews['sReview']."<hr/></div>";
			}
			else {
				foreach($reviews as $review)
				{
					echo "<div class='span1'><strong>".$review['sUserID']."</strong></div><div class='span6'>".$review['sReview']."<hr/></div>";
				}
			}
			echo "</div>";
		}
		else
		{
			echo "No Reviews yet for this broker. Be the first to write a review!!";
		}
	}
	
	
		//Function to list the ratings of broker
	public function getRatings()
	{
		$where = "nBrokerID = '$this->m_BrokerID'";
		$ratings = $this->db->select("tbl_brokerratings",$where);
		if($ratings)
		{
			if($this->db->getnumRows() == 1)
			{
				echo $this->render_rating($ratings);
			}
			else
			{
				foreach($ratings as $rating)
				{
					echo $this->render_rating($rating);
				}
			}
		}
		else
		{
			echo "<h3>No Ratings yet for this broker. Be the first to rate this broker!!</h3>";
		}
	}

	//Function to draw the rating bar
	public function draw_rating($rating)
	{
		$un_rated = 5 - $rating;
		$code =  "";
		for($i=0;$i<$rating;$i++)
		{
			$code .= "<i class='icon icon-star'></i>";
		
		}
		for($i=0;$i<$un_rated;$i++)
		{
			$code .= "<i class='icon icon-star-empty'></i>";
			
		}
		
		return $code;
	}
	
	// Function to render the rating
	public function render_rating($rating) {
		$code = "<div class='rating'>";
		$code .= "<p>Rating given by <strong>".$rating['sUserID']."</strong>, on ".$rating['dtCreated']."</p>";
		$code .= "<div class='row'><div class='span2'>";
		$params = array('Overall','Fees/AMC','Commission','Trading Platform','Customer Service');
		foreach($params as $param) {
			$code .= "<p>$param</p>";
		}
		$code .= "</div><div class='span2'>";
		$code .="<p>".$this->draw_rating($rating['nRating'])."</p>";
		$code .="<p>".$this->draw_rating($rating['nFees'])."</p>";
		$code .="<p>".$this->draw_rating($rating['nBrokerage'])."</p>";
		$code .="<p>".$this->draw_rating($rating['nTradingPlatform'])."</p>";
		$code .="<p>".$this->draw_rating($rating['nCustomerService'])."</p>";
		$code .= "</div></div><hr/></div>";
		return $code;
		
	}
	
	//Function to check whether the broker is having records in the table
	public function IsHavingRecords($tablename)
	{
		$where = "nBrokerID = '$this->m_BrokerID'";
		$result = $this->db->select($tablename,$where);
		if($result)
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}
	
	//Function to load the parameters from the database - for comparison
	public function loadParams()
	{
		if($this->IsHavingRecords("tbl_exchangememberships") == false) { $this->create_defExchSgmtParams(); }
		if($this->IsHavingRecords("tbl_products") == false) {$this->create_defProducts();}
		if($this->IsHavingRecords("tbl_acctopenmode") == false) {$this->create_defAcctOpeningModes();}
		if($this->IsHavingRecords("tbl_riskmanagement") == false) {$this->create_defRMSParams();}
		if($this->IsHavingRecords("tbl_riskmgmt_margin") == false) {$this->create_defRMS_MarginParams();}
		if($this->IsHavingRecords("tbl_securityparams") == false) {$this->create_defSecurityParams();}
		if($this->IsHavingRecords("tbl_branches") == false) {$this->create_defBranchParams();}
		if($this->IsHavingRecords("tbl_onlineacctservices") == false) {$this->create_defOnlineAcctServices();}
		if($this->IsHavingRecords("tbl_brokerservices") == false) {$this->create_defServiceParams();}
		if($this->IsHavingRecords("tbl_tradingservices") == false) {$this->create_defTradingServices();}
		if($this->IsHavingRecords("tbl_chartingservices") == false) {$this->create_defChartingServices();}
		if($this->IsHavingRecords("tbl_pmsservices") == false) {$this->create_defPMSServices();}
		if($this->IsHavingRecords("tbl_vas") == false) {$this->create_defVASParams();}
		if($this->IsHavingRecords("tbl_smsalerts") == false) {$this->create_defSMSAlerts();}
		if($this->IsHavingRecords("tbl_smsquery") == false) {$this->create_defSMSQuery();}
		if($this->IsHavingRecords("tbl_research") == false) {$this->create_defResearchParams();}
		if($this->IsHavingRecords("tbl_customerservice") == false) {$this->create_defCustomerServices();}
		if($this->IsHavingRecords("tbl_brokerawards") == false) {$this->create_defAwards();}
		if($this->IsHavingRecords("tbl_charges") == false) {$this->create_defCharges();}
		if($this->IsHavingRecords("tbl_brokeragecharges") == false) {$this->create_defBrokerageCharges();}
		if($this->IsHavingRecords("tbl_dpcharges") == false) {$this->create_defDPCharges();}
		if($this->IsHavingRecords("tbl_payment_gateways") == false) {$this->create_defPaymentGateways();}
		if($this->IsHavingRecords("tbl_dp_gateways") == false) {$this->create_defDPGateways();}
		
		// Reviews
		if($this->IsHavingRecords("tbl_adminreviews") == false) {$this->create_defAdminReviews();}
		if($this->IsHavingRecords("tbl_tradingplatforms") == false) {$this->create_defRevTradingPlatforms();}
		if($this->IsHavingRecords("tbl_brokerfees") == false) {$this->create_defRevBrokerFees();}
		if($this->IsHavingRecords("tbl_broker_acctopening") == false) {$this->create_defRevAcctOpening();}
		if($this->IsHavingRecords("tbl_broker_pros") == false) {$this->create_defBrokerPros();}
		if($this->IsHavingRecords("tbl_broker_cons") == false) {$this->create_defBrokerCons();}
		
		$this->m_ExchSgmtParams = $this->getExchSgmtParams();
		$this->m_Products = $this->getProducts();
		$this->m_AcctOpeningModes = $this->getAcctOpeningModes();
		$this->m_RMSParams = $this->getRMSParameters();
		$this->m_RMS_MarginParams = $this->getRMS_MarginParameters();
		$this->m_SecurityParams = $this->getSecurityParameters();
		$this->m_BranchParams = $this->getBranchParameters();
		$this->m_ServiceParams = $this->getServiceParams();
		$this->m_OnlineAcctServices = $this->getOnlineAcctServices();
		$this->m_TradingServices = $this->getTradingServices();
		$this->m_ChartingServices = $this->getChartingServices();
		$this->m_PMSServices = $this->getPMSServices();
		$this->m_VASParams = $this->getVASParams();
		$this->m_SMSAlerts = $this->getSMSAlerts();
		$this->m_SMSQuery = $this->getSMSQuery();
		$this->m_ResearchParams = $this->getResearchParams();
		$this->m_CustomerServices = $this->getCustomerServices();
		$this->m_Awards = $this->getAwards();
		$this->m_Charges = $this->getCharges();
		$this->m_BrokerageCharges = $this->getBrokerageCharges();
		$this->m_DPCharges = $this->getDPCharges();
		$this->m_PaymentGateways = $this->getPaymentGateways();
		$this->m_DPGateways = $this->getDPGateways();
		
		// Reviews
		$this->m_RevDescription = $this->getAdminReviews();
		$this->m_RevTradingPlatforms = $this->getRevTradingPlatforms();
		$this->m_RevBrokerageFees = $this->getRevBrokerFees();
		$this->m_RevAcctOpening = $this->getRevAcctOpening();
		$this->m_RevAdvantages = $this->getRevBrokerPros();
		$this->m_RevDisadvantages = $this->getRevBrokerCons();
		
	}
	
	//Function to create default Parameters - all
	public function create_defParams()
	{
		$this->create_defExchSgmtParams();
		$this->create_defProducts();
		$this->create_defAcctOpeningModes();
		$this->create_defRMSParams();
		$this->create_defRMS_MarginParams();
		$this->create_defSecurityParams();
		$this->create_defBranchParams();
		$this->create_defOnlineAcctServices();
		$this->create_defServiceParams();
		$this->create_defTradingServices();
		$this->create_defChartingServices();
		$this->create_defPMSServices();
		$this->create_defVASParams();
		$this->create_defSMSAlerts();
		$this->create_defSMSQuery();
		$this->create_defResearchParams();
		$this->create_defCustomerServices();
		$this->create_defAwards();
		$this->create_defCharges();
		$this->create_defBrokerageCharges();
		$this->create_defDPCharges();
		$this->create_defPaymentGateways();
		$this->create_defDPGateways();
		
		//Reviews
		$this->create_defAdminReviews();
		$this->create_defRevTradingPlatforms();
		$this->create_defRevBrokerFees();
		$this->create_defRevAcctOpening();
		$this->create_defBrokerPros();
		$this->create_defBrokerCons();
	}

	//Function to create default Exchange segment memberships
	public function create_defExchSgmtParams()
	{
		$sql = "insert into tbl_exchangememberships(nBrokerID,	bNSEEq,	bBSEEq,	bNSEDerv,	bBSEDerv,	bNSECurrencyDerv,	bUSECurrencyDerv,	bMCXSXCurrencyDerv,	bNSELCommoditySpot,	bMCXCommodityDerv,
		bNCDEXCommodityDerv,	bICEXCommodityDerv,	bNMCECommodityDerv,	bACECommodityDerv) values($this->m_BrokerID,0,0,0,0,0,0,0,0,0,0,0,0,0)";
		$result = $this->db->execute($sql);
		return true;
	}
	
	
	//Function to retrieve Exchange segment memberships
	public function getExchSgmtParams()
	{
		$where = "nBrokerID = $this->m_BrokerID";
		$cols = "bNSEEq,	bBSEEq,	bNSEDerv,	bBSEDerv,	bNSECurrencyDerv,	bUSECurrencyDerv,	bMCXSXCurrencyDerv,	bNSELCommoditySpot,	bMCXCommodityDerv,
		bNCDEXCommodityDerv,	bICEXCommodityDerv,	bNMCECommodityDerv,	bACECommodityDerv";
		$result = $this->db->select('tbl_exchangememberships',$where,$cols);
		return $result;
	}
	//Function to update Exchange segment memberships
	public function setExchSgmtParams($params)
	{
		$update_fields = array(
		"bNSEEq" => "$params[0]",
		"bBSEEq" => "$params[1]",
		"bNSEDerv" =>"$params[2]",
		"bBSEDerv" => "$params[3]",
		"bNSECurrencyDerv" => "$params[4]",
		"bUSECurrencyDerv" =>	"$params[5]",
		"bMCXSXCurrencyDerv" =>	"$params[6]",
		"bNSELCommoditySpot" =>	"$params[7]",
		"bMCXCommodityDerv" =>	"$params[8]",
		"bNCDEXCommodityDerv" => "$params[9]",
		"bICEXCommodityDerv" =>	"$params[10]",
		"bNMCECommodityDerv" =>	"$params[11]",
		"bACECommodityDerv" =>	"$params[12]");
		$where = "nBrokerID = '$this->m_BrokerID'";
		$result = $this->db->update($update_fields,'tbl_exchangememberships ',$where);
		return $result;
		
	}
	
	//Function to create default Product parameters
	public function create_defProducts()
	{
		$sql = "insert into tbl_products(nBrokerID,	bMargin,	bDelivery,	bPTST,	bMarginTradeFunding,	bShortSelling,
		bMarginwithSL,	bOnlineIPO,	bOnlineMF,	bOnlineBonds) values($this->m_BrokerID,0,0,0,0,0,0,0,0,0)";
		$result = $this->db->execute($sql);
		return true;
	}
	
	
	//Function to retrieve Products parameters
	public function getProducts()
	{
		$where = "nBrokerID = $this->m_BrokerID";
		$cols = "bMargin,	bDelivery,	bPTST,	bMarginTradeFunding,	bShortSelling,
		bMarginwithSL,	bOnlineIPO,	bOnlineMF,	bOnlineBonds";
		$result = $this->db->select('tbl_products',$where,$cols);
		return $result;
	}
	
	//Function to update Products parameters
	public function setProducts($params)
	{
		$update_fields = array(
		"bMargin" => "$params[0]",
		"bDelivery" => "$params[1]",
		"bPTST" => "$params[2]",
		"bMarginTradeFunding" => "$params[3]",
		"bShortSelling" => "$params[4]",
		"bMarginwithSL" => "$params[5]",
		"bOnlineIPO" => "$params[6]",
		"bOnlineMF" => "$params[7]",
		"bOnlineBonds" => "$params[8]"
		);
		$where = "nBrokerID = '$this->m_BrokerID'";
		$result = $this->db->update($update_fields,'tbl_products ',$where);
		return $result;
	}
	
	
	//Function to create default Account Opening Mode parameters
	public function create_defAcctOpeningModes()
	{
		$sql = "insert into tbl_acctopenmode(nBrokerID,	bDoorStepService,	bWalkIn) values($this->m_BrokerID,0,0)";
		$result = $this->db->execute($sql);
		return true;
	}
	
	//Function to retrieve Account Opening Mode parameters
	public function getAcctOpeningModes()
	{
		$where = "nBrokerID = $this->m_BrokerID";
		$cols = "bDoorStepService,	bWalkIn";
		$result = $this->db->select('tbl_acctopenmode',$where,$cols);
		return $result;
	}
	
	//Function to update Products parameters
	public function setAcctOpeningModes($params)
	{
		$update_fields = array(
		"bDoorStepService" => "$params[0]",
		"bWalkIn" => "$params[1]"
		);
		$where = "nBrokerID = '$this->m_BrokerID'";
		$result = $this->db->update($update_fields,'tbl_acctopenmode ',$where);
		return $result;
	}
	
	//Function to create default RMS parameters
	public function create_defRMSParams()
	{
		$sql = "insert into tbl_riskmanagement(nBrokerID,	bMarginLimit,	bMTMLimit,	bTurnoverLimit,
		bGrossExposureLimit,	bNetExposureLimit,	bNetBuyLimit,	bNetSellLimit,	bMTMAutoSqOff,	bTimerAutoSqOff) values($this->m_BrokerID,0,0,0,0,0,0,0,0,0)";
		$result = $this->db->execute($sql);
		return true;
	}
	
	//Function to retrieve RMS parameters
	public function getRMSParameters()
	{
		$where = "nBrokerID = $this->m_BrokerID";
		$cols = "	bMTMLimit,	bTurnoverLimit,
		bGrossExposureLimit,	bNetExposureLimit,	bNetBuyLimit,	bNetSellLimit,	bMTMAutoSqOff,	bTimerAutoSqOff";
		$result = $this->db->select('tbl_riskmanagement',$where,$cols);
		return $result;
	}
	
	//Function to update Products parameters
	public function setRMSParameters($params)
	{
		$update_fields = array(
		//"bMarginLimit" => "$params[0]",
		"bMTMLimit" => "$params[0]",
		"bTurnoverLimit" => "$params[1]",
		"bGrossExposureLimit" => "$params[2]",
		"bNetExposureLimit" => "$params[3]",
		"bNetBuyLimit" => "$params[4]",
		"bNetSellLimit" => "$params[5]",
		"bMTMAutoSqOff" => "$params[6]",
		"bTimerAutoSqOff" => "$params[7]"
			);
		$where = "nBrokerID = '$this->m_BrokerID'";
		$result = $this->db->update($update_fields,'tbl_riskmanagement',$where);
		return $result;
	}
	
	//Function to create default Margin RMS parameters
	public function create_defRMS_MarginParams()
	{
		$sql = "insert into tbl_riskmgmt_margin(nBrokerID,	bMargin,	bDelivery,	bPTST,
		bMarginTradeFunding,	bShortSelling,	bMarginwithSL) values($this->m_BrokerID,0,0,0,0,0,0)";
		$result = $this->db->execute($sql);
		return true;
	}
	
	//Function to retrieve Margin RMS parameters
	public function getRMS_MarginParameters()
	{
		$where = "nBrokerID = $this->m_BrokerID";
		$cols = "bMargin,	bDelivery,	bPTST,	bMarginTradeFunding,	bShortSelling,	bMarginwithSL";
		$result = $this->db->select('tbl_riskmgmt_margin',$where,$cols);
		return $result;
	}
	
	//Function to update Margin RMS parameters
	public function setRMS_MarginParameters($params)
	{
		$update_fields = array(
		"bMargin" => "$params[0]",
		"bDelivery" => "$params[1]",
		"bPTST" => "$params[2]",
		"bMarginTradeFunding" => "$params[3]",
		"bShortSelling" => "$params[4]",
		"bMarginwithSL" => "$params[5]"
		);
		$where = "nBrokerID = '$this->m_BrokerID'";
		$result = $this->db->update($update_fields,'tbl_riskmgmt_margin',$where);
		return $result;
	}
	
	//Function to create default Security parameters
	public function create_defSecurityParams()
	{
		$sql = "insert into tbl_securityparams(nBrokerID,	bTwoFactorAuth,	bSSLEncr) values($this->m_BrokerID,0,0)";
		$result = $this->db->execute($sql);
		return true;
	}
	
	//Function to retrieve Security parameters
	public function getSecurityParameters()
	{
		$where = "nBrokerID = $this->m_BrokerID";
		$cols = "bTwoFactorAuth,	bSSLEncr";
		$result = $this->db->select('tbl_securityparams',$where,$cols);
		return $result;
	}
	
	//Function to update Security parameters
	public function setSecurityParameters($params)
	{
		$update_fields = array(
		"bTwoFactorAuth" => "$params[0]",
		"bSSLEncr" => "$params[1]"
		);
		$where = "nBrokerID = '$this->m_BrokerID'";
		$result = $this->db->update($update_fields,'tbl_securityparams',$where);
		return $result;
	}
	
	//Function to create default Branch parameters
	public function create_defBranchParams()
	{
		$sql = "insert into tbl_branches(nBrokerID,	nOwnBranches,	nFranchiseeBranches,sBranchList,sFranchiseeList) values($this->m_BrokerID,0,0,'NA','NA')";
		$result = $this->db->execute($sql);
		return true;
	}
	
	//Function to retrieve Branch parameters
	public function getBranchParameters()
	{
		$where = "nBrokerID = $this->m_BrokerID";
		$cols = "nOwnBranches,	sBranchList,nFranchiseeBranches,sFranchiseeList";
		$result = $this->db->select('tbl_branches',$where,$cols);
		return $result;
	}
	
	//Function to update Branch parameters
	public function setBranchParameters($params)
	{
		$update_fields = array(
		"nOwnBranches" => "$params[0]",
		"nFranchiseeBranches" => "$params[1]",
		"sBranchList" => "'$params[2]'",
		"sFranchiseeList" => "'$params[3]'"
		);
		$where = "nBrokerID = '$this->m_BrokerID'";
		$result = $this->db->update($update_fields,'tbl_branches',$where);
		return $result;
	}
	
	//Function to create default Online Acct Services
	public function create_defOnlineAcctServices()
	{
		$sql = "insert into tbl_onlineacctservices(nBrokerID,	bEXEBasedTrading,	bBrowserBasedTrading,bMobileBasedTrading,bCallNTrade) values($this->m_BrokerID,0,0,0,0)";
		$result = $this->db->execute($sql);
		return true;
	}
	
	//Function to retrieve Branch parameters
	public function getOnlineAcctServices()
	{
		$where = "nBrokerID = $this->m_BrokerID";
		$cols = "bEXEBasedTrading,	bBrowserBasedTrading,bMobileBasedTrading,bCallNTrade";
		$result = $this->db->select('tbl_onlineacctservices',$where,$cols);
		return $result;
	}
	
	//Function to update Branch parameters
	public function setOnlineAcctServices($params)
	{
		$update_fields = array(
		"bEXEBasedTrading" => "$params[0]",
		"bBrowserBasedTrading" => "$params[1]",
		"bMobileBasedTrading" => "$params[2]",
		"bCallNTrade" => "$params[3]"
		);
		$where = "nBrokerID = '$this->m_BrokerID'";
		$result = $this->db->update($update_fields,'tbl_onlineacctservices',$where);
		return $result;
	}
	
	//Function to create default Services
	public function create_defServiceParams()
	{
		$sql = "insert into tbl_brokerservices(nBrokerID,	bOfflineAcct,	bProgramTrading,bIPO,bMutualFund,bBonds,
		bInsurance,bFixedDeposits,bRealEstate,bAdvisoryServices,bForex) values($this->m_BrokerID,0,0,0,0,0,0,0,0,0,0)";
		$result = $this->db->execute($sql);
		return true;
	}
	
	//Function to retrieve Service parameters
	public function getServiceParams()
	{
		$where = "nBrokerID = $this->m_BrokerID";
		$cols = "bOfflineAcct,	bProgramTrading,bIPO,bMutualFund,bBonds,
		bInsurance,bFixedDeposits,bRealEstate,bAdvisoryServices,bForex";
		$result = $this->db->select('tbl_brokerservices',$where,$cols);
		return $result;
	}
	
	//Function to update Service parameters
	public function setServiceParams($params)
	{
		$update_fields = array(
		"bOfflineAcct" => "$params[0]",
		"bProgramTrading" => "$params[1]",
		"bIPO" => "$params[2]",
		"bMutualFund" => "$params[3]",
		"bBonds" => "$params[4]",
		"bInsurance" => "$params[5]",
		"bFixedDeposits" => "$params[6]",
		"bRealEstate" => "$params[7]",
		"bAdvisoryServices" => "$params[8]",
		"bForex" => "$params[9]"
		);
		$where = "nBrokerID = '$this->m_BrokerID'";
		$result = $this->db->update($update_fields,'tbl_brokerservices',$where);
		return $result;
	}
	
	//Function to create default Trading Services
	public function create_defTradingServices()
	{
		$sql = "insert into tbl_tradingservices(nBrokerID,	bAMO,	bPMO,bGreekNeutralizer,bOptionsAnalysis,bSmartOrderRouting) values($this->m_BrokerID,0,0,0,0,0)";
		$result = $this->db->execute($sql);
		return true;
	}
	
	//Function to retrieve Trading Service parameters
	public function getTradingServices()
	{
		$where = "nBrokerID = $this->m_BrokerID";
		$cols = "bAMO,	bPMO,bGreekNeutralizer,bOptionsAnalysis,bSmartOrderRouting";
		$result = $this->db->select('tbl_tradingservices',$where,$cols);
		return $result;
	}
	
	//Function to update Trading Service parameters
	public function setTradingServices($params)
	{
		$update_fields = array(
		"bAMO" => "$params[0]",
		"bPMO" => "$params[1]",
		"bGreekNeutralizer" => "$params[2]",
		"bOptionsAnalysis" => "$params[3]",
		"bSmartOrderRouting" => "$params[4]"
		);
		$where = "nBrokerID = '$this->m_BrokerID'";
		$result = $this->db->update($update_fields,'tbl_tradingservices',$where);
		return $result;
	}
	
	//Function to create default Charting Services
	public function create_defChartingServices()
	{
		$sql = "insert into tbl_chartingservices(nBrokerID,	bBasic,	bAdvanced) values($this->m_BrokerID,0,0)";
		$result = $this->db->execute($sql);
		return true;
	}
	
	//Function to retrieve Charting Service parameters
	public function getChartingServices()
	{
		$where = "nBrokerID = $this->m_BrokerID";
		$cols = "bBasic,	bAdvanced";
		$result = $this->db->select('tbl_chartingservices',$where,$cols);
		return $result;
	}
	
	//Function to update Charting Service parameters
	public function setChartingServices($params)
	{
		$update_fields = array(
		"bBasic" => "$params[0]",
		"bAdvanced" => "$params[1]"
		);
		$where = "nBrokerID = '$this->m_BrokerID'";
		$result = $this->db->update($update_fields,'tbl_chartingservices',$where);
		return $result;
	}
	
	//Function to create default PMS Services
	public function create_defPMSServices()
	{
		$sql = "insert into tbl_pmsservices(nBrokerID,	bDiscretionary,	bNonDiscretionary) values($this->m_BrokerID,0,0)";
		$result = $this->db->execute($sql);
		return true;
	}
	
	//Function to retrieve PMS Service parameters
	public function getPMSServices()
	{
		$where = "nBrokerID = $this->m_BrokerID";
		$cols = "bDiscretionary,	bNonDiscretionary";
		$result = $this->db->select('tbl_pmsservices',$where,$cols);
		return $result;
	}
	
	//Function to update PMS Service parameters
	public function setPMSServices($params)
	{
		$update_fields = array(
		"bDiscretionary" => "$params[0]",
		"bNonDiscretionary" => "$params[1]"
		);
		$where = "nBrokerID = '$this->m_BrokerID'";
		$result = $this->db->update($update_fields,'tbl_pmsservices',$where);
		return $result;
	}
	
	//Function to create default VAS parameters
	public function create_defVASParams()
	{
		$sql = "insert into tbl_vas(nBrokerID,	bPortfolioTracker) values($this->m_BrokerID,0)";
		$result = $this->db->execute($sql);
		return true;
	}
	
	//Function to retrieve VAS parameters
	public function getVASParams()
	{
		$where = "nBrokerID = $this->m_BrokerID";
		$cols = "bPortfolioTracker";
		$result = $this->db->select('tbl_vas',$where,$cols);
		return $result;
	}
	
	//Function to update VAS parameters
	public function setVASParams($params)
	{
		$update_fields = array(
		"bPortfolioTracker" => "$params[0]"
		);
		$where = "nBrokerID = '$this->m_BrokerID'";
		$result = $this->db->update($update_fields,'tbl_vas',$where);
		return $result;
	}
	
	//Function to create default SMS Alert parameters
	public function create_defSMSAlerts()
	{
		$sql = "insert into tbl_smsalerts(nBrokerID,bOrderConfirmation,bOrderModification,bOrderCancellation,bTradeConfiramtion,
		bMTMBreach,bLedgerUpdate,bFundTransfer,bIPOBidEntry,bIPOBidConfirmation,bMFOrderEntry,bMFOrderBooking) values($this->m_BrokerID,0,0,0,0,0,0,0,0,0,0,0)";
		$result = $this->db->execute($sql);
		return true;
	}
	
	//Function to retrieve SMS Alert  parameters
	public function getSMSAlerts()
	{
		$where = "nBrokerID = $this->m_BrokerID";
		$cols = "bOrderConfirmation,bOrderModification,bOrderCancellation,bTradeConfiramtion,
		bMTMBreach,bLedgerUpdate,bFundTransfer,bIPOBidEntry,bIPOBidConfirmation,bMFOrderEntry,bMFOrderBooking";
		$result = $this->db->select('tbl_smsalerts',$where,$cols);
		return $result;
	}
	
	//Function to update SMS Alert  parameters
	public function setSMSAlerts($params)
	{
		$update_fields = array(
		"bOrderConfirmation" => "$params[0]",
		"bOrderModification" => "$params[1]",
		"bOrderCancellation" => "$params[2]",
		"bTradeConfiramtion" => "$params[3]",
		"bMTMBreach" => "$params[4]",
		"bLedgerUpdate" => "$params[5]",
		"bFundTransfer" => "$params[6]",
		"bIPOBidEntry" => "$params[7]",
		"bIPOBidConfirmation" => "$params[8]",
		"bMFOrderEntry" => "$params[9]",
		"bMFOrderBooking" => "$params[10]"
		);
		$where = "nBrokerID = '$this->m_BrokerID'";
		$result = $this->db->update($update_fields,'tbl_smsalerts',$where);
		return $result;
	}
	
	//Function to create default SMS Query parameters
	public function create_defSMSQuery()
	{
		$sql = "insert into tbl_smsquery(nBrokerID,bLedgerBalance,bOrders,bTrades,bNetPosition) values($this->m_BrokerID,0,0,0,0)";
		$result = $this->db->execute($sql);
		return true;
	}
	
	//Function to retrieve SMS Query parameters
	public function getSMSQuery()
	{
		$where = "nBrokerID = $this->m_BrokerID";
		$cols ="bLedgerBalance,bOrders,bTrades,bNetPosition";
		$result = $this->db->select('tbl_smsquery',$where,$cols);
		return $result;
	}
	
	//Function to update SMS Query parameters
	public function setSMSQuery($params)
	{
		$update_fields = array(
		"bLedgerBalance" => "$params[0]",
		"bOrders" => "$params[1]",
		"bTrades" => "$params[2]",
		"bNetPosition" => "$params[3]"
		);
		$where = "nBrokerID = '$this->m_BrokerID'";
		$result = $this->db->update($update_fields,'tbl_smsquery',$where);
		return $result;
	}
	
	//Function to create default Research parameters
	public function create_defResearchParams()
	{
		$sql = "insert into tbl_research(nBrokerID,bFundamental,bTechnical) values($this->m_BrokerID,0,0)";
		$result = $this->db->execute($sql);
		return true;
	}
	
	//Function to retrieve Research parameters
	public function getResearchParams()
	{
		$where = "nBrokerID = $this->m_BrokerID";
		$cols = "bFundamental,bTechnical";
		$result = $this->db->select('tbl_research',$where,$cols);
		return $result;
	}
	
	//Function to update Research parameters
	public function setResearchParams($params)
	{
		$update_fields = array(
		"bFundamental" => "$params[0]",
		"bTechnical" => "$params[1]"
		);
		$where = "nBrokerID = '$this->m_BrokerID'";
		$result = $this->db->update($update_fields,'tbl_research',$where);
		return $result;
	}
	
	//Function to create default Customer Service parameters
	public function create_defCustomerServices()
	{
		$sql = "insert into tbl_customerservice(nBrokerID,bDedCallCentre,bTollFreeNo,nAvgRespTime,nClientSatisfaction) values($this->m_BrokerID,0,0,0,0)";
		$result = $this->db->execute($sql);
		return true;
	}
	
	//Function to retrieve Customer Service parameters
	public function getCustomerServices()
	{
		$where = "nBrokerID = $this->m_BrokerID";
		$cols = "bDedCallCentre,bTollFreeNo,nAvgRespTime,nClientSatisfaction";
		$result = $this->db->select('tbl_customerservice',$where,$cols);
		return $result;
	}
	
	//Function to update Customer Service parameters
	public function setCustomerServices($params)
	{
		$update_fields = array(
		"bDedCallCentre" => "$params[0]",
		"bTollFreeNo" => "$params[1]"
		//"nAvgRespTime" => "$params[2]",  For later addition
		//"nClientSatisfaction" => "$params[3]"
		);
		$where = "nBrokerID = '$this->m_BrokerID'";
		$result = $this->db->update($update_fields,'tbl_customerservice',$where);
		return $result;
	}
	
	//Function to create default Awards parameters
	public function create_defAwards()
	{
		$sql = "insert into tbl_brokerawards(nBrokerID,bCNBCTV18,bEconomicTimes,bFinanceAsia,bAsiaMoney,
		bCNBCFinancialAdvisor,bThomsonExtelSurveys,bAvayaCustomerResponsiveness,bEuromoney,bPrimeranking,
		bZeeBusiness,bOutlookMoney,bCNBCAwaazConsumer,bTheWallStreetJournal,bGlobalFinance,bIndianBanksAssociation) values($this->m_BrokerID,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)";
		$result = $this->db->execute($sql);
		return true;
	}
	
	//Function to retrieve Awards parameters
	public function getAwards()
	{
		$where = "nBrokerID = $this->m_BrokerID";
		$cols = "bCNBCTV18,bEconomicTimes,bFinanceAsia,bAsiaMoney,
		bCNBCFinancialAdvisor,bThomsonExtelSurveys,bAvayaCustomerResponsiveness,bEuromoney,bPrimeranking,
		bZeeBusiness,bOutlookMoney,bCNBCAwaazConsumer,bTheWallStreetJournal,bGlobalFinance,bIndianBanksAssociation";
		$result = $this->db->select('tbl_brokerawards',$where,$cols);
		return $result;
	}
	
	//Function to update Awards parameters
	public function setAwards($params)
	{
		$update_fields = array(
		"bCNBCTV18" => "$params[0]",
		"bEconomicTimes" => "$params[1]",
		"bFinanceAsia" => "$params[2]",  
		"bAsiaMoney" => "$params[3]",
		"bCNBCFinancialAdvisor" => "$params[4]",
		"bThomsonExtelSurveys" => "$params[5]",
		"bAvayaCustomerResponsiveness" => "$params[6]",
		"bEuromoney" => "$params[7]",
		"bPrimeranking" => "$params[8]",
		"bZeeBusiness" => "$params[9]",
		"bOutlookMoney" => "$params[10]",
		"bCNBCAwaazConsumer" => "$params[11]",
		"bTheWallStreetJournal" => "$params[12]",
		"bGlobalFinance" => "$params[13]",
		"bIndianBanksAssociation" => "$params[14]"
		);
		$where = "nBrokerID = '$this->m_BrokerID'";
		$result = $this->db->update($update_fields,'tbl_brokerawards',$where);
		return $result;
	}
	
	//Function to create default Charges
	public function create_defCharges()
	{
		$sql = "insert into tbl_charges(nBrokerID,	acct_opening, other_service, exe_trading, browser_trading, mobile_trading,
				call_n_trade,account_closure,program_trading,future_trading,options,min_brokerage,amc_annual,amc_monthly) values($this->m_BrokerID,'NA','NA','NA','NA','NA','NA','NA','NA','NA','NA','NA','NA','NA')";
		$result = $this->db->execute($sql);
		return true;
	}
	
	
	//Function to retrieve Charges
	public function getCharges()
	{
		$where = "nBrokerID = $this->m_BrokerID";
		$cols = "acct_opening, other_service, exe_trading, browser_trading, mobile_trading,
				call_n_trade,account_closure,program_trading,future_trading,options,min_brokerage,amc_annual,amc_monthly";
		$result = $this->db->select('tbl_charges',$where,$cols);
		return $result;
	}
	//Function to update Charges
	public function setCharges($params)
	{
		$update_fields = array(
		"acct_opening" => "'$params[0]'",
		"other_service" => "'$params[1]'",
		"exe_trading" =>"'$params[2]'",
		"browser_trading" => "'$params[3]'",
		"mobile_trading" => "'$params[4]'",
		"call_n_trade" =>	"'$params[5]'",
		"account_closure" =>	"'$params[6]'",
		"program_trading" =>	"'$params[7]'",
		"future_trading" =>	"'$params[8]'",
		"options" => "'$params[9]'",
		"min_brokerage" =>	"'$params[10]'",
		"amc_annual" => "'$params[11]'",
		"amc_monthly" => "'$params[12]'");
		$where = "nBrokerID = '$this->m_BrokerID'";
		$result = $this->db->update($update_fields,'tbl_charges ',$where);
		return $result;
		
	}
	
	//Function to create default Brokerage Charges
	public function create_defBrokerageCharges()
	{
		$sql = "insert into tbl_brokeragecharges(nBrokerID,	Margin,Delivery,PTST,MTF,ShortSelling, MarginwithSL) values($this->m_BrokerID,'NA','NA','NA','NA','NA','NA')";
		$result = $this->db->execute($sql);
		return true;
	}
	
	
	//Function to retrieve BrokerageCharges
	public function getBrokerageCharges()
	{
		$where = "nBrokerID = $this->m_BrokerID";
		$cols = "Margin,Delivery,PTST,MTF,ShortSelling, MarginwithSL";
		$result = $this->db->select('tbl_brokeragecharges',$where,$cols);
		return $result;
	}
	//Function to update Brokerage Charges
	public function setBrokerageCharges($params)
	{
		$update_fields = array(
		"Margin" => "'$params[0]'",
		"Delivery" => "'$params[1]'",
		"PTST" =>"'$params[2]'",
		"MTF" => "'$params[3]'",
		"ShortSelling" => "'$params[4]'",
		"MarginwithSL" =>	"'$params[5]'");
		$where = "nBrokerID = '$this->m_BrokerID'";
		$result = $this->db->update($update_fields,'tbl_brokeragecharges ',$where);
		return $result;
		
	}
	
	//Function to create default DP Charges
	public function create_defDPCharges()
	{
		$sql = "insert into tbl_dpcharges(nBrokerID,demat_in,demat_out,inter_settlement,re_mat,off_market_transaction,dp_instruction_booklet,others) values($this->m_BrokerID,'NA','NA','NA','NA','NA','NA','NA')";
		$result = $this->db->execute($sql);
		return true;
	}
	
	
	//Function to retrieve DP Charges
	public function getDPCharges()
	{
		$where = "nBrokerID = $this->m_BrokerID";
		$cols = "demat_in,demat_out,inter_settlement,re_mat,off_market_transaction,dp_instruction_booklet,others";
		$result = $this->db->select('tbl_dpcharges',$where,$cols);
		return $result;
	}
	//Function to update DP Charges
	public function setDPCharges($params)
	{
		$update_fields = array(
		"demat_in" => "'$params[0]'",
		"demat_out" => "'$params[1]'",
		"inter_settlement" =>"'$params[2]'",
		"re_mat" => "'$params[3]'",
		"off_market_transaction" => "'$params[4]'",
		"dp_instruction_booklet" =>	"'$params[5]'",
		"others" => "'$params[6]'");
		$where = "nBrokerID = '$this->m_BrokerID'";
		$result = $this->db->update($update_fields,'tbl_dpcharges ',$where);
		return $result;
		
	}
	
	//Function to create default Payment Gateways
	public function create_defPaymentGateways()
	{
		$sql = "insert into tbl_payment_gateways(nBrokerID,	banks,aggregators) values($this->m_BrokerID,'NA','NA')";
		$result = $this->db->execute($sql);
		return true;
	}
	
	
	//Function to retrieve Payment Gateways
	public function getPaymentGateways()
	{
		$where = "nBrokerID = $this->m_BrokerID";
		$cols = "banks,aggregators";
		$result = $this->db->select('tbl_payment_gateways',$where,$cols);
		return $result;
	}
	//Function to update Payment Gateways
	public function setPaymentGateways($params)
	{
		$update_fields = array(
		"banks" => "'$params[0]'",
		"aggregators" => "'$params[1]'");
		$where = "nBrokerID = '$this->m_BrokerID'";
		$result = $this->db->update($update_fields,'tbl_payment_gateways ',$where);
		return $result;
		
	}
	
	//Function to create default DP Gateways
	public function create_defDPGateways()
	{
		$sql = "insert into tbl_dp_gateways(nBrokerID,	self_poa,dp_participants) values($this->m_BrokerID,'NA','NA')";
		$result = $this->db->execute($sql);
		return true;
	}
	
	
	//Function to retrieve DP Gateways
	public function getDPGateways()
	{
		$where = "nBrokerID = $this->m_BrokerID";
		$cols = "self_poa,dp_participants";
		$result = $this->db->select('tbl_dp_gateways',$where,$cols);
		return $result;
	}
	//Function to update DP Gateways
	public function setDPGateways($params)
	{
		$update_fields = array(
		"self_poa" => "'$params[0]'",
		"dp_participants" => "'$params[1]'");
		$where = "nBrokerID = '$this->m_BrokerID'";
		$result = $this->db->update($update_fields,'tbl_dp_gateways ',$where);
		return $result;
		
	}
	
	// Function to create default Admin Reviews
	public function create_defAdminReviews() {
		$data = array(
			"nBrokerID" => "$this->m_BrokerID",
			"sDescription" => "'No review available for this broker'");
		$result = $this->db->insert($data,"tbl_adminreviews");
		return $result;
	}
	
	// Function to create default Trading Platforms
	public function create_defRevTradingPlatforms() {
		$data = array(
			"nBrokerID" => "$this->m_BrokerID",
			"sName" => "'Not available.'",
			"sDescription" => "'Necessary information not available at preset.'");
		$result = $this->db->insert($data,"tbl_tradingplatforms");
		return $result;
	}
	
	// Function to create default Broker Fees
	public function create_defRevBrokerFees() {
		$data = array(
			"nBrokerID" => "$this->m_BrokerID",
			"sDescription" => "'Necessary information not available in the system.'");
		$result = $this->db->insert($data,"tbl_brokerfees");
		return $result;
	}
	
	// Function to create default Account openings
	public function create_defRevAcctOpening() {
		$data = array(
			"nBrokerID" => "$this->m_BrokerID",
			"sDescription" => "'Necessary information not available in the system.'");
		$result = $this->db->insert($data,"tbl_broker_acctopening");
		return $result;
	}
	
	// Function to create default Broker advantages
	public function create_defBrokerPros() {
		$data = array(
			"nBrokerID" => "$this->m_BrokerID",
			"sAdvantage" => "'Necessary information not available in the system.'");
		$result = $this->db->insert($data,"tbl_broker_pros");
		return $result;
	}
	
	// Function to create default Broker dis-advantages
	public function create_defBrokerCons() {
		$data = array(
			"nBrokerID" => "$this->m_BrokerID",
			"sDisadvantage" => "'Necessary information not available in the system.'");
		$result = $this->db->insert($data,"tbl_broker_cons");
		return $result;
	}

	//Function to retrieve Admin Reviews
	public function getAdminReviews()
	{
		$where = "nBrokerID = $this->m_BrokerID";
		$cols = "sDescription";
		$result = $this->db->select('tbl_adminreviews',$where,$cols);
		return $result;
	}
	
	//Function to update Admin Reviews
	public function setAdminReviews($params)
	{
		$update_fields = array(
		"sDescription" => "'$params[0]'");
		$where = "nBrokerID = $this->m_BrokerID";
		$result = $this->db->update($update_fields,'tbl_adminreviews ',$where);
		return $result;
		
	}
	
	//Function to retrieve Trading Platforms
	public function getRevTradingPlatforms()
	{
		$where = "nBrokerID = $this->m_BrokerID";
		$cols = "id,sName,sDescription";
		$result = $this->db->select('tbl_tradingplatforms',$where,$cols);
		return $result;
	}
	
	//Function to update trading platforms
	public function setRevTradingPlatforms($params)
	{
		$update_fields = array(
		"sName" => "'$params[0]'",
		"sDescription" => "'$params[1]'");
		$where = "nBrokerID = '$this->m_BrokerID'";
		$result = $this->db->update($update_fields,'tbl_tradingplatforms ',$where);
		return $result;
		
	}
	
	//Function to retrieve Broker Fees
	public function getRevBrokerFees()
	{
		$where = "nBrokerID = $this->m_BrokerID";
		$cols = "sDescription";
		$result = $this->db->select('tbl_brokerfees',$where,$cols);
		return $result;
	}
	
	//Function to update broker fees
	public function setRevBrokerFees($params)
	{
		$update_fields = array(
		"sDescription" => "'$params[0]'");
		$where = "nBrokerID = '$this->m_BrokerID'";
		$result = $this->db->update($update_fields,'tbl_brokerfees ',$where);
		return $result;
		
	}
	
	//Function to retrieve Broker Acct openings
	public function getRevAcctOpening()
	{
		$where = "nBrokerID = $this->m_BrokerID";
		$cols = "sDescription";
		$result = $this->db->select('tbl_broker_acctopening',$where,$cols);
		return $result;
	}
	//Function to update reviews - acct openings
	public function setRevAcctOpening($params)
	{
		$update_fields = array(
		"sDescription" => "'$params[0]'");
		$where = "nBrokerID = '$this->m_BrokerID'";
		$result = $this->db->update($update_fields,'tbl_broker_acctopening ',$where);
		return $result;
		
	}
	//Function to retrieve Broker pros
	public function getRevBrokerPros()
	{
		$where = "nBrokerID = $this->m_BrokerID";
		$cols = "id,sAdvantage";
		$result = $this->db->select('tbl_broker_pros',$where,$cols);
		return $result;
	}
	//Function to update broker pros
	public function setRevBrokerPros($params)
	{
		$update_fields = array(
		"sAdvantage" => "'$params[0]'");
		$where = "nBrokerID = '$this->m_BrokerID'";
		$result = $this->db->update($update_fields,'tbl_broker_pros ',$where);
		return $result;
		
	}
	//Function to retrieve Broker cons
	public function getRevBrokerCons()
	{
		$where = "nBrokerID = $this->m_BrokerID";
		$cols = "id,sDisadvantage";
		$result = $this->db->select('tbl_broker_cons',$where,$cols);
		return $result;
	}
	//Function to update broker cons
	public function setRevBrokerCons($params)
	{
		$update_fields = array(
		"sDisadvantage" => "'$params[0]'");
		$where = "nBrokerID = '$this->m_BrokerID'";
		$result = $this->db->update($update_fields,'tbl_broker_cons ',$where);
		return $result;
		
	}
	
	// Function to render trading platforms table
	public function rendertable_TradingPlatform() {
		$html = "<table class='table table-condensed table-striped'>";
		$html .= "<tr><th>Name</th><th>Description</th><th>Edit</th><th>Delete</th></tr>";
		$tps = $this->getRevTradingPlatforms();
		if($this->db->getNumRows() == 1) 
		{
			$html .= "<tr>";
			$html .= "<td>".$tps['sName']."</td>";
			$html .= "<td>".extract_str($tps['sDescription'],100)."</td>";
			$html .= "<td><a href='#' class='btn'>Edit</a></td>";
			$html .= "<td><input type='button' class='btn' value='Delete' onclick='deleteTP(".$tps['id'].")'></td>";
			$html .= "</tr>";
		}
		else
		{
			foreach($tps as $tp) {
				$html .= "<tr>";
				$html .= "<td>".$tp['sName']."</td>";
				$html .= "<td>".extract_str($tp['sDescription'],100)."</td>";
				$html .= "<td><a href='#' class='btn'>Edit</a></td>";
				$html .= "<td><input type='button' class='btn' value='Delete' onclick='deleteTP(".$tp['id'].")'></td>";
				$html .= "</tr>";
			}
		}
		$html .= "</table>";
		return $html;
	}
	
	public function renderTable_Pros() {
		$html = "<table class='table table-striped'>";
		$html .= "<tr><th>Advantage</th><th>Edit</th><th>Delete</th></tr>";
		$pros = $this->getRevBrokerPros();
		if($this->db->getNumRows() == 1) {
			$html .= "<tr>";
			$html .= "<td>".$pros['sAdvantage']."</td>";
			$html .= "<td><a class='btn' href='#' >Edit</a></td>";
			$html .= "<td><input type='button' class='btn' value='Delete' onclick='deletePros(".$pros['id'].")'></td>";
			$html .= "</tr>";
		}
		else {
			foreach($pros as $adv)
			{
				$html .= "<tr>";
				$html .= "<td>".$adv['sAdvantage']."</td>";
				$html .= "<td><a class='btn' href='#' >Edit</a></td>";
				$html .= "<td><input type='button' class='btn' value='Delete' onclick='deletePros(".$adv['id'].")'></td>";
				$html .= "</tr>";
			}
			
		}
		$html .= "</table>";
		echo $html;
	}
	
	public function renderTable_Cons() {
		$html = "<table class='table table-striped'>";
		$html .= "<tr><th>Advantage</th><th>Edit</th><th>Delete</th></tr>";
		$pros = $this->getRevBrokerCons();
		if($this->db->getNumRows() == 1) {
			$html .= "<tr>";
			$html .= "<td>".$pros['sDisadvantage']."</td>";
			$html .= "<td><a class='btn' href='#' >Edit</a></td>";
			$html .= "<td><input type='button' class='btn' value='Delete' onclick='deleteCons(".$pros['id'].")'></td>";
			$html .= "</tr>";
		}
		else {
			foreach($pros as $adv)
			{
				$html .= "<tr>";
				$html .= "<td>".$adv['sDisadvantage']."</td>";
				$html .= "<td><a class='btn' href='#' >Edit</a></td>";
				$html .= "<td><input type='button' class='btn' value='Delete' onclick='deleteCons(".$adv['id'].")'></td>";
				$html .= "</tr>";
			}
		}
		$html .= "</table>";
		echo $html;
	}
}
?>
