var currColumn;
var expanded = true;
$(document).ready(function() {
	
	var toggleMinus = 'icon icon-minus-sign';
	var togglePlus = 'icon icon-plus-sign';
	var Minus = "<i class='icon icon-minus-sign'></i> ";
	var $subHead = $('tbody th:first-child');
	$subHead.prepend(Minus);
	
	
	$('i.icon', $subHead).click(function() {
			var toggleSrc = $(this).attr('class');
			if ( toggleSrc == toggleMinus ) {
				$(this).removeClass('icon-minus-sign')
					.addClass('icon-plus-sign')
					.parents('tr').siblings().fadeOut('fast');
			} 
			else {
				$(this).removeClass('icon-plus-sign')
					.addClass('icon-minus-sign')
					.parents('tr').siblings().fadeIn('fast');
			}
	});
	
	
	
	
	
	$('#btnExpandCollapse').click(function() {
		if(expanded == true) {
			$('i', $subHead).parents('tr').siblings().fadeOut('fast');
			$('i', $subHead).removeClass('icon-minus-sign')
				.addClass('icon-plus-sign');
			expanded = false;
			$(this).html('<i class="icon icon-plus-sign"></i> Expand All');
		}
		else {
			$('i', $subHead).parents('tr').siblings().fadeIn('fast');
			$('i', $subHead).removeClass('icon-plus-sign')
				.addClass('icon-minus-sign');
			expanded = true;
			$(this).html('<i class="icon icon-minus-sign"></i> Collapse All');
		}
	});
	
	
	

		$(document).bind("contextmenu",function(e){
			//alert("Right-click disabled.");
			return false;
		});
	
});
function populate_columns(t)
{
	//alert(t.status);
	if(t.status == "success")
	{
		$("table.comparison_header tr:first td:eq("+currColumn+")").html("<input type='button' class='remove_column button tiny red' onclick='removeColumn("+currColumn+")' value='Remove'/>");
		$("table.comparison_header tr:eq(1) th:eq("+currColumn+")").html("<img src='" + t.logo + "'/>" + t.name);
		var $rowOffset = 1;
		var params = "";
		// Exchange Segment Parameters
		for(key in t.m_ExchSgmtParams)
		{
			//params += key + " = " + (t.m_ExchSgmtParams[key]);
			//params += ",";
			$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html(yes_or_no(t.m_ExchSgmtParams[key]));
			$rowOffset++;
		}
		// Products
		$rowOffset++;
		for(key in t.m_Products)
		{
			$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html(yes_or_no(t.m_Products[key]));
			$rowOffset++;
		}
		// Branches
		$rowOffset++;
		for(key in t.m_BranchParams)
		{
			$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html(t.m_BranchParams[key]);
			$rowOffset++;
		}
		// Payment Gateways
		$rowOffset++;
		for(i=0;i<2;i++)
		{
			$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html('NA');
			$rowOffset++;
		}
		// DP Gateways
		$rowOffset++;
		for(i=0;i<2;i++)
		{
			$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html('NA');
			$rowOffset++;
		}
		// Account Opening Modes
		$rowOffset++;
		for(key in t.m_AcctOpeningModes)
		{
			$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html(yes_or_no(t.m_AcctOpeningModes[key]));
			$rowOffset++;
		}
		// Risk Management - Margin
		$rowOffset++;
		$rowOffset++;
		for(key in t.m_RMS_MarginParams)
		{
			$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html(yes_or_no(t.m_RMS_MarginParams[key]));
			$rowOffset++;
		}
		// Risk Management
		for(key in t.m_RMSParams)
		{
			$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html(yes_or_no(t.m_RMSParams[key]));
			$rowOffset++;
		}
		// Services
		$rowOffset++;
		$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html(yes_or_no(t.m_ServiceParams['bOfflineAcct']));
		$rowOffset++;
		
		// Online Account Services
		$rowOffset++;
		for(key in t.m_OnlineAcctServices)
		{
			$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html(yes_or_no(t.m_OnlineAcctServices[key]));
			$rowOffset++;
		}
		// Trading Services
		$rowOffset++;
		for(key in t.m_TradingServices)
		{
			$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html(yes_or_no(t.m_TradingServices[key]));
			$rowOffset++;
		}
		$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html(yes_or_no(t.m_TradingServices['bGreekNeutralizer']));
		$rowOffset++;
		$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html(yes_or_no(t.m_TradingServices['bOptionsAnalysis']));
		$rowOffset++;
		$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html(yes_or_no(t.m_TradingServices['bSmartOrderRouting']));
		$rowOffset++;
		$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html(yes_or_no(t.m_ServiceParams['bProgramTrading']));
		$rowOffset++;
		// PMS Services
		$rowOffset++;
		for(key in t.m_PMSServices)
		{
			$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html(yes_or_no(t.m_PMSServices[key]));
			$rowOffset++;
		}
		$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html(yes_or_no(t.m_ServiceParams['bIPO']));
		$rowOffset++;
		$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html(yes_or_no(t.m_ServiceParams['bMutualFund']));
		$rowOffset++;
		$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html(yes_or_no(t.m_ServiceParams['bBonds']));
		$rowOffset++;
		$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html(yes_or_no(t.m_ServiceParams['bInsurance']));
		$rowOffset++;
		$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html(yes_or_no(t.m_ServiceParams['bFixedDeposits']));
		$rowOffset++;
		$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html(yes_or_no(t.m_ServiceParams['bRealEstate']));
		$rowOffset++;
		$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html(yes_or_no(t.m_ServiceParams['bAdvisoryServices']));
		$rowOffset++;
		$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html(yes_or_no(t.m_ServiceParams['bForex']));
		$rowOffset++;
		
		// SMS Alerts
		$rowOffset++;
		$rowOffset++;
		for(key in t.m_SMSAlerts)
		{
			$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html(yes_or_no(t.m_SMSAlerts[key]));
			$rowOffset++;
		}
		
		// Research
		$rowOffset++;
		for(key in t.m_ResearchParams)
		{
			$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html(yes_or_no(t.m_ResearchParams[key]));
			$rowOffset++;
		}
		
		// SMS Query
		$rowOffset++;
		for(key in t.m_SMSQuery)
		{
			$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html(yes_or_no(t.m_SMSQuery[key]));
			$rowOffset++;
		}
		$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html(yes_or_no(t.m_VASParams['bPortfolioTracker']));
		$rowOffset++;
		
		// Security Params
		$rowOffset++;
		for(key in t.m_SecurityParams)
		{
			$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html(yes_or_no(t.m_SecurityParams[key]));
			$rowOffset++;
		}
		
		//Charges - later to be modified properly
		$rowOffset++;
		$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html('NA');
		$rowOffset++;
		$rowOffset++;
		//AMC
		for(i=0;i<2;i++)
		{
			$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html('NA');
			$rowOffset++;
		}
		$rowOffset++;
		// Brokerage charges
		for(i=0;i<6;i++)
		{
			$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html('NA');
			$rowOffset++;
		}
		//Other service charges
		$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html('NA');
		$rowOffset++;
		// DP charges
		$rowOffset++;
		for(i=0;i<7;i++)
		{
			$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html('NA');
			$rowOffset++;
		}
		// Remaining charges
		for(i=0;i<6;i++)
		{
			$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html('NA');
			$rowOffset++;
		}
		
		// Customer centre
		$rowOffset++;
		for(key in t.m_CustomerServices)
		{
			$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html(yes_or_no(t.m_CustomerServices[key]));
			$rowOffset++;
		}
		
		// Awards
		$rowOffset++;
		for(key in t.m_Awards)
		{
			$("table.comparison tr:eq("+ $rowOffset + ") td:eq("+currColumn+")").html(yes_or_no(t.m_Awards[key]));
			$rowOffset++;
		}
	}
	else
	{
		alert(t.message);
	}
	
}

function removeColumn(colIndex)
{
	currColumn = colIndex;
	$('table.comparison_header').find("tr").each(function(){
	  $(this).find("th:eq("+colIndex+")").empty();
	  //$(this).find("td:eq("+colIndex+")").empty();
	});
	$('table.comparison').find("tr").each(function(){
	  //$(this).find("th:eq("+colIndex+")").empty();
	  $(this).find("td:eq("+colIndex+")").empty();
	});
	$("table.comparison_header tr:first td:eq("+colIndex+")").html("<input type='button' class='add_column button tiny green' onclick='addColumn(" +colIndex + ")' value='Add Broker'/>");
}
function addColumn(colIndex)
{
	currColumn = colIndex;
	$( "#dialog-form" ).dialog( "open" );
}
function yes_or_no(value)
{
	var yes = "<span class='yes'></span>";
	var no = "<span class='no'></span>";
	return (value == 1)? yes :no;
	
}
