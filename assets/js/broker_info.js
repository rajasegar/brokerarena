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
	
	
	$('#btnSubmitReview').click(function() {
		if(validate_review())
		{
			$.ajax( 
			{ 
				type: "POST", 
				url: "ajax_post_review.php", 
				data: {"id":$('#hn_id').val(),"review":$("#txtReview").val(),"topic":$("#txtSubject").val()}, 
				success: 
					function(t) 
					{ 
						$("div#info").empty()
								.append(t);
					}, 
				error: 
					function() 
					{ 
						$("div#info").append("An error occured during processing")
							.addClass("msg_error"); 
					} 
			});
		}
		 
	});
	
	// Ratings
	$('#btnSubmitRating').click(function() {
		if(validate_rating())
		{
			$.ajax( 
			{ 
				type: "POST", 
				url: "ajax_post_rating.php", 
				data: {"id":$('#hn_id').val(),
						"all":$('input[name="radOverall"]:checked').val(),
						"fees":$('input[name="radFees"]:checked').val(),
						"brkg":$('input[name="radBrokerage"]:checked').val(),
						"tp":$('input[name="radTradingPlatform"]:checked').val(),
						"cc":$('input[name="radCustomerService"]:checked').val()
					}, 
				success: 
					function(t) 
					{ 
						$("<div/>").html(t)
							.addClass("alert alert-success")
							.insertBefore("#divNewRating");
					}, 
				error: 
					function() 
					{ 
						$("div#info").append("An error occured during processing")
							.addClass("msg_error"); 
					} 
			});
		}
		 
	});
	
	
});

function validate_review()
{
	// Subject
	if($('#txtSubject').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Topic should not be empty.')
				   .insertAfter('#txtSubject');
		$('#txtSubject').addClass('reqField')
						  .focus();
		return false;
	}
	
	// Comments
	if($('#txtReview').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Comments should not be blank.')
				   .insertAfter('#txtReview');
		$('#txtReview').addClass('reqField')
						  .focus();
		return false;
	}
	
	
	
	return true;
}

function validate_rating()
{
	var $neighbour = $('#divNewRating');
	// Overall
	if($('input[name="radOverall"]:checked').length == 0)
	{
		display_alert_error('Overall rating is compulsory.',$neighbour);
		return false;
	}
	
	if($('input[name="radFees"]:checked').length == 0)
	{
		display_alert_error('Fees rating is compulsory.',$neighbour);
		return false;
	}
	
	if($('input[name="radBrokerage"]:checked').length == 0)
	{
		display_alert_error('Brokerage rating is compulsory.',$neighbour);
		return false;
	}
	
	if($('input[name="radTradingPlatform"]:checked').length == 0)
	{
		display_alert_error('Trading Platform rating is compulsory.',$neighbour);
		return false;
	}
	
	if($('input[name="radCustomerService"]:checked').length == 0)
	{
		display_alert_error('Customer Service rating is compulsory.',$neighbour);
		return false;
	}
	
	
	return true;
}
