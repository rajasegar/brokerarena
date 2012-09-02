
$(function(){
	tinyMCE.init({
		mode : "textareas",
		theme : "simple"
	});

	
	// Update Description
	$('#btnUpdateDesc').click(function() {
		var query_string = $('#frmDescription').serialize();
		console.log(tinyMCE.get('txtDescription').getContent());
		$.ajax( 
		{ 
			type: "POST", 
			url: "ajax_update_reviewdesc.php", 
			data: {txtDescription:tinyMCE.get('txtDescription').getContent()}, 
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
	
	// Update Brokerage
	$('#btnUpdateBrokerage').click(function() {
		
		$.ajax( 
		{ 
			type: "POST", 
			url: "ajax_update_revbrokerage.php", 
			data: {txtBrokerage:tinyMCE.get('txtBrokerage').getContent()}, 
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
	
	// Update Acct Opening
	$('#btnUpdateAcctOpening').click(function() {
		
		$.ajax( 
		{ 
			type: "POST", 
			url: "ajax_update_revacctopening.php", 
			data: {txtAcctOpening:tinyMCE.get('txtAcctOpening').getContent()}, 
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
					$('#txtAdvantage').val('');
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
					$('#txtDisadvantage').val('');
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
			data: {txtTPDesc:tinyMCE.get('txtTPDesc').getContent(),txtTPName:$('#txtTPName').val()}, 
			success: 
				function(t) 
				{ 
					display_alert_success(t);
					tinyMCE.get('txtTPDesc').setContent('');
					$('#txtTPName').val('');
				}, 
			error: 
				function() 
				{ 
					$("div#info").append("An error occured during processing")
						.addClass("msg_error"); 
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
function deleteTP(tp_id) {
	console.log(tp_id);
	$.ajax( 
		{ 
			type: "POST", 
			url: "ajax_delete_tradingplatform.php", 
			data: {id:tp_id}, 
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
}
// Function to delete advantages
function deletePros(adv_id) {
	console.log(adv_id);
	$.ajax( 
		{ 
			type: "POST", 
			url: "ajax_delete_brokerpros.php", 
			data: {id:adv_id}, 
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
}

// Function to delete dis-advantages
function deleteCons(adv_id) {
	console.log(adv_id);
	$.ajax( 
		{ 
			type: "POST", 
			url: "ajax_delete_brokercons.php", 
			data: {id:adv_id}, 
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
}
