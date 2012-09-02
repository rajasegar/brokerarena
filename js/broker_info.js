$(document).ready(function() {
	$('#myTabs').tabs();
	
	var toggleMinus = 'images/minus.gif';
	var togglePlus = 'images/plus.gif';
	var $subHead = $('tbody th:first-child');
	var $current_col = "";
	$subHead.prepend('<img src="' + toggleMinus + '"alt="collapse this section" class="collapse_button" />');
	
	$('img', $subHead).addClass('clickable')
				.click(function() {
			var toggleSrc = $(this).attr('src');
			if ( toggleSrc == toggleMinus ) {
			$(this).attr('src', togglePlus)
			.parents('tr').siblings().fadeOut('fast');
			} else{
			$(this).attr('src', toggleMinus)
			.parents('tr').siblings().fadeIn('fast');
			};
			});
	
	$('#btnExpandAll').click(function() {
		$('img', $subHead).parents('tr').siblings().fadeIn('fast');
		$('img', $subHead).attr('src', toggleMinus);
	});
	
	$('#btnCollapseAll').click(function() {
		$('img', $subHead).parents('tr').siblings().fadeOut('fast');
		$('img', $subHead).attr('src', togglePlus);
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
						$("div#info_rating").empty()
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
	// Overall
	
	//alert($('input[name=radOverall]:checked').val());
	if($('input[name="radOverall"]:checked').length == 0)
	{
		//alert($('input[name="radOverall"]:checked').length);
		$("div#info_rating").empty()
					.append('Overall rating is compulsory.')
					.addClass('msg_validation');
				   
		return false;
	}
	
	if($('input[name="radFees"]:checked').length == 0)
	{
		$("div#info_rating").empty()
					.append('Fees rating is compulsory.')
					.addClass('msg_validation');
				   
		return false;
	}
	
	if($('input[name="radBrokerage"]:checked').length == 0)
	{
		$("div#info_rating").empty()
					.append('Brokerage rating is compulsory.')
					.addClass('msg_validation');
				   
		return false;
	}
	
	if($('input[name="radTradingPlatform"]:checked').length == 0)
	{
		$("div#info_rating").empty()
					.append('Trading Platform rating is compulsory.')
					.addClass('msg_validation');
				   
		return false;
	}
	
	if($('input[name="radCustomerService"]:checked').length == 0)
	{
		$("div#info_rating").empty()
					.append('Customer Service rating is compulsory.')
					.addClass('msg_validation');
				   
		return false;
	}
	
	
	return true;
}