$(document).ready(function() {
	$('.numeric_field').keypress(function(event) {
		if (event.charCode && (event.charCode < 48 || event.charCode > 57))
		{
		event.preventDefault();
		}
	});
});


function validateForm()
{
	$('input').removeClass('reqField');
	$('div.msg_validation').remove();
	
	// Site Name
	if($('#txtSiteName').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Site Name should not be empty.')
				   .insertAfter('#txtSiteName');
		$('#txtSiteName').addClass('reqField')
					.focus();
		return false;
	}
	
	// txtSiteUrl
	if($('#txtSiteUrl').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Site Url should not be empty.')
				   .insertAfter('#txtSiteUrl');
		$('#txtSiteUrl').addClass('reqField')
					.focus();
		return false;
	}
	
		
	// Feed url
	if($('#txtFeedUrl').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Feed url should not be empty.')
				   .insertAfter('#txtFeedUrl');
		$('#txtFeedUrl').addClass('reqField')
					.focus();
		return false;
	}
	
		
	// /(\w+):\/\/([\w.]+)\/(\S*)/
	var url_pattern = /^http?:\/\/([a-z0-9-]+\.)+[a-z0-9]{2,4}.*$/;
	// Website url  format validation
	if ( !$('#txtSiteUrl').val().match(url_pattern))
	{
		$('<div/>').addClass('msg_validation')
				   .html('Please use proper url format (e.g.http://www.yahoo.com')
				   .insertAfter('#txtSiteUrl');
		$('#txtSiteUrl').addClass('reqField')
						  .focus();
		return false;
	}
	
	// /(\w+):\/\/([\w.]+)\/(\S*)/
	var url_pattern = /^http?:\/\/([a-z0-9-]+\.)+[a-z0-9]{2,4}.*$/;
	// Website url  format validation
	if ( !$('#txtFeedUrl').val().match(url_pattern))
	{
		$('<div/>').addClass('msg_validation')
				   .html('Please use proper url format (e.g.http://www.yahoo.com')
				   .insertAfter('#txtFeedUrl');
		$('#txtFeedUrl').addClass('reqField')
						  .focus();
		return false;
	}
	
	return true;
}