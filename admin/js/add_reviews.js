
$(function(){
	tinyMCE.init({
		mode : "textareas",
		theme : "simple"
	});

	
	// Add Advantages
	$('#btnAddPros').click(function() {
		var query_string = $('#frmPros').serialize();

		$.ajax( 
		{ 
			type: "POST", 
			url: "ajax_add_brokerpros.php", 
			data: query_string, 
			success: 
				function(t) 
				{ 
					display_alert_success(t);
				}, 
			error: 
				function() 
				{ 
					$("div#info").append("An error occured during processing")
						.addClass("msg_error"); 
				} 
		}); 
	});
	
	// Add Dis-Advantages
	$('#btnAddCons').click(function() {
		var query_string = $('#frmCons').serialize();

		$.ajax( 
		{ 
			type: "POST", 
			url: "ajax_add_brokercons.php", 
			data: query_string, 
			success: 
				function(t) 
				{ 
					display_alert_success(t);
				}, 
			error: 
				function() 
				{ 
					$("div#info").append("An error occured during processing")
						.addClass("msg_error"); 
				} 
		}); 
	});
	
	
	// Add Trading Platforms
	$('#btnAddTP').click(function() {
		var query_string = $('#frmTradingPlatforms').serialize();
		
		$.ajax( 
		{ 
			type: "POST", 
			url: "ajax_add_tradingplatform.php", 
			data: query_string, 
			success: 
				function(t) 
				{ 
					display_alert_success(t);
				}, 
			error: 
				function() 
				{ 
					$("div#info").append("An error occured during processing")
						.addClass("msg_error"); 
				} 
		}); 
	});
	
	// Update Account Opening Modes
	$('#btnUpdateAcctOpenModes').click(function() {
		var query_string = '';
		$('input[type="checkbox"][name="chkAcctOpenModes"]').each(function() 
		{ 
			if(this.checked)
			{
				query_string += "&chkAcctOpenModes[]=" + this.value; 
			}
			else
			{
				query_string += "&chkAcctOpenModes[]=0"; 
			}
		});
		
		//alert("hello");
		$.ajax( 
		{ 
			type: "POST", 
			url: "ajax_update_acctopen_modes.php", 
			data: query_string, 
			success: 
				function(t) 
				{ 
					display_alert_success(t);
				}, 
			error: 
				function() 
				{ 
					$("div#info").append("An error occured during processing")
						.addClass("msg_error"); 
				} 
		}); 
	});
	
	
	// Update RMS Parameters
	$('#btnUpdateRMS').click(function() {
		var query_string = '';
		$('input[type="checkbox"][name="chkRMS"]').each(function() 
		{ 
			if(this.checked)
			{
				query_string += "&chkRMS[]=" + this.value; 
			}
			else
			{
				query_string += "&chkRMS[]=0"; 
			}
		});
		
		$('input[type="checkbox"][name="chkRMS_Margin"]').each(function() 
		{ 
			if(this.checked)
			{
				query_string += "&chkRMS_Margin[]=" + this.value; 
			}
			else
			{
				query_string += "&chkRMS_Margin[]=0"; 
			}
		});
		
		//alert("hello");
		$.ajax( 
		{ 
			type: "POST", 
			url: "ajax_update_rms_parameters.php", 
			data: query_string, 
			success: 
				function(t) 
				{ 
					display_alert_success(t);
				}, 
			error: 
				function() 
				{ 
					$("div#info").append("An error occured during processing")
						.addClass("msg_error"); 
				} 
		}); 
	});
	
	// Update Security Parameters
	$('#btnUpdateSecurity').click(function() {
		var query_string = '';
		$('input[type="checkbox"][name="chkSecurity"]').each(function() 
		{ 
			if(this.checked)
			{
				query_string += "&chkSecurity[]=" + this.value; 
			}
			else
			{
				query_string += "&chkSecurity[]=0"; 
			}
		});

		$.ajax( 
		{ 
			type: "POST", 
			url: "ajax_update_securityparams.php", 
			data: query_string, 
			success: 
				function(t) 
				{ 
					display_alert_success(t);
				}, 
			error: 
				function() 
				{ 
					$("div#info").append("An error occured during processing")
						.addClass("msg_error"); 
				} 
		}); 
	});
	
	
	// Update Branch Parameters
	$('#btnUpdateBranch').click(function() {
		var query_string = '';
		$.ajax( 
		{ 
			type: "POST", 
			url: "ajax_update_branchparams.php", 
			data: {'txtOwnBranches':$('#txtOwnBranches').val(),
				'txtFranchiseeBranches':$('#txtFranchiseeBranches').val(),
				'txtBranchesList':$('#txtBranchesList').val(),
				'txtFranchiseeList':$('#txtFranchiseeList').val()},
			success: 
				function(t) 
				{ 
					display_alert_success(t);
					
				}, 
			error: 
				function(xhr) 
				{ 
					$("div#info").append("Error: " + xhr.status + " " + xhr.statusText)
						.addClass("msg_error"); 
				} 
		}); 
	});
	
	// Update Service Parameters
	$('#btnUpdateServices').click(function() {
		var query_string = '';
		// Services
		$('input[type="checkbox"][name="chkServices"]').each(function() 
		{ 
			if(this.checked)
			{
				query_string += "&chkServices[]=" + this.value; 
			}
			else
			{
				query_string += "&chkServices[]=0"; 
			}
		});
		// Online Account Services
		$('input[type="checkbox"][name="chkOnlineAcctServ"]').each(function() 
		{ 
			if(this.checked)
			{
				query_string += "&chkOnlineAcctServ[]=" + this.value; 
			}
			else
			{
				query_string += "&chkOnlineAcctServ[]=0"; 
			}
		});
		// Trading Services
		$('input[type="checkbox"][name="chkTradingServ"]').each(function() 
		{ 
			if(this.checked)
			{
				query_string += "&chkTradingServ[]=" + this.value; 
			}
			else
			{
				query_string += "&chkTradingServ[]=0"; 
			}
		});
		// Charting Services
		$('input[type="checkbox"][name="chkChartingServ"]').each(function() 
		{ 
			if(this.checked)
			{
				query_string += "&chkChartingServ[]=" + this.value; 
			}
			else
			{
				query_string += "&chkChartingServ[]=0"; 
			}
		});
		// PMS Services
		$('input[type="checkbox"][name="chkPMSServ"]').each(function() 
		{ 
			if(this.checked)
			{
				query_string += "&chkPMSServ[]=" + this.value; 
			}
			else
			{
				query_string += "&chkPMSServ[]=0"; 
			}
		});

		$.ajax( 
		{ 
			type: "POST", 
			url: "ajax_update_serviceparams.php", 
			data: query_string, 
			success: 
				function(t) 
				{ 
					display_alert_success(t);
				}, 
			error: 
				function() 
				{ 
					$("div#info").append("An error occured during processing")
						.addClass("msg_error"); 
				} 
		}); 
	});
	
	// Update VAS Parameters
	$('#btnUpdateVAS').click(function() {
		var query_string = '';
		// SMS Alert
		$('input[type="checkbox"][name="chkSMSAlert"]').each(function() 
		{ 
			if(this.checked)
			{
				query_string += "&chkSMSAlert[]=" + this.value; 
			}
			else
			{
				query_string += "&chkSMSAlert[]=0"; 
			}
		});
		// Research
		$('input[type="checkbox"][name="chkResearch"]').each(function() 
		{ 
			if(this.checked)
			{
				query_string += "&chkResearch[]=" + this.value; 
			}
			else
			{
				query_string += "&chkResearch[]=0"; 
			}
		});
		// SMS Query
		$('input[type="checkbox"][name="chkSMSQuery"]').each(function() 
		{ 
			if(this.checked)
			{
				query_string += "&chkSMSQuery[]=" + this.value; 
			}
			else
			{
				query_string += "&chkSMSQuery[]=0"; 
			}
		});
		// VAS
		$('input[type="checkbox"][name="chkVAS"]').each(function() 
		{ 
			if(this.checked)
			{
				query_string += "&chkVAS[]=" + this.value; 
			}
			else
			{
				query_string += "&chkVAS[]=0"; 
			}
		});
		
		$.ajax( 
		{ 
			type: "POST", 
			url: "ajax_update_vasparams.php", 
			data: query_string, 
			success: 
				function(t) 
				{ 
					display_alert_success(t);
				}, 
			error: 
				function() 
				{ 
					$("div#info").append("An error occured during processing")
						.addClass("msg_error"); 
				} 
		}); 
	});
	
	// Update Customer Services
	$('#btnUpdateCustomerService').click(function() {
		var query_string = '';
		$('input[type="checkbox"][name="chkCustomerService"]').each(function() 
		{ 
			if(this.checked)
			{
				query_string += "&chkCustomerService[]=" + this.value; 
			}
			else
			{
				query_string += "&chkCustomerService[]=0"; 
			}
		});
		
		//alert("hello");
		$.ajax( 
		{ 
			type: "POST", 
			url: "ajax_update_customerservices.php", 
			data: query_string, 
			success: 
				function(t) 
				{ 
					display_alert_success(t);
				}, 
			error: 
				function() 
				{ 
					$("div#info").append("An error occured during processing")
						.addClass("msg_error"); 
				} 
		}); 
	});
	
	
	// Update Awards
	$('#btnUpdateAwards').click(function() {
		var query_string = '';
		$('input[type="checkbox"][name="chkAwards"]').each(function() 
		{ 
			if(this.checked)
			{
				query_string += "&chkAwards[]=" + this.value; 
			}
			else
			{
				query_string += "&chkAwards[]=0"; 
			}
		});
		
		//alert("hello");
		$.ajax( 
		{ 
			type: "POST", 
			url: "ajax_update_awardparams.php", 
			data: query_string, 
			success: 
				function(t) 
				{ 
					display_alert_success(t);
				}, 
			error: 
				function() 
				{ 
					display_alert_error("An error occured during processing");
				} 
		}); 
	});
	
	// Update Charges
	$('#btnUpdateCharges').click(function() {
		var query_string = $('#frmCharges').serialize();
		//console.log(query_string);
		$.ajax( 
		{ 
			type: "POST", 
			url: "ajax_update_charges.php", 
			data: query_string, 
			success: 
				function(t) 
				{ 
					display_alert_success(t);
				}, 
			error: 
				function() 
				{ 
					display_alert_error("An error occured during processing");
				} 
		}); 
	});
	
	// Update Brokerage Charges
	$('#btnUpdateBrokerageCharges').click(function() {
		var query_string = $('#frmBrokerageCharges').serialize();
		//console.log(query_string);
		$.ajax( 
		{ 
			type: "POST", 
			url: "ajax_update_brokeragecharges.php", 
			data: query_string, 
			success: 
				function(t) 
				{ 
					display_alert_success(t);
				}, 
			error: 
				function() 
				{ 
					display_alert_error("An error occured during processing");
				} 
		}); 
	});
	
	// Update DP Charges
	$('#btnUpdateDPCharges').click(function() {
		var query_string = $('#frmDPCharges').serialize();
		//console.log(query_string);
		$.ajax( 
		{ 
			type: "POST", 
			url: "ajax_update_dpcharges.php", 
			data: query_string, 
			success: 
				function(t) 
				{ 
					display_alert_success(t);
				}, 
			error: 
				function() 
				{ 
					display_alert_error("An error occured during processing");
				} 
		}); 
	});
	
	// Update Payment Gateways
	$('#btnUpdatePG').click(function() {
		var query_string = $('#frmPG').serialize();
		//console.log(query_string);
		$.ajax( 
		{ 
			type: "POST", 
			url: "ajax_update_paymentgateways.php", 
			data: query_string, 
			success: 
				function(t) 
				{ 
					display_alert_success(t);
				}, 
			error: 
				function() 
				{ 
					display_alert_error("An error occured during processing");
				} 
		}); 
	});
	
	// Update DP Gateways
	$('#btnUpdateDPGateways').click(function() {
		var query_string = $('#frmDPGateways').serialize();
		//console.log(query_string);
		$.ajax( 
		{ 
			type: "POST", 
			url: "ajax_update_dpgateways.php", 
			data: query_string, 
			success: 
				function(t) 
				{ 
					display_alert_success(t);
				}, 
			error: 
				function() 
				{ 
					display_alert_error("An error occured during processing");
				} 
		}); 
	});
	
	
});

function display_alert_success(text) {
	$('div.alert').remove();
	$('<div/>').html('<a class="close" data-dismiss="alert">×</a>')
		.append(text)
		.addClass("alert alert-success")
		.insertBefore('#myTab');
	}
	
function display_alert_error(text) {
	$('div.alert').remove();
	$('<div/>').html("<a class='close' data-dismiss='alert'>×</a>")
		.append(text)
		.addClass("alert alert-error")
		.insertBefore('#myTab');
}
