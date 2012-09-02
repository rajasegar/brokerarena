$(document).ready(function() {

});
function validateContactForm()
{
	$('input').removeClass('reqField');
	$('div.msg_validation').remove();
	
	// Name
	if($('#contactName').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Name should not be empty.')
				   .insertAfter('#contactName');
		$('#contactName').addClass('reqField')
					.focus();
		return false;
	}
	
	// Email empty validation
	if($('#email').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('E-mail Id should not be empty.')
				   .insertAfter('#email');
		$('#email').addClass('reqField')
						  .focus();
		return false;
	}
	// Email format validation
	if ($('#email').val() != '' && !/.+@.+\.[a-zA-Z]{2,4}$/.test($('#email').val()))
	{
		$('<div/>').addClass('msg_validation')
				   .html('Please use proper e-mail format (e.g.joe@example.com')
				   .insertAfter('#email');
		$('#email').addClass('reqField')
						  .focus();
		return false;
	}
	
	// Comments
	if($('#commentsText').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Comments should not be empty.')
				   .insertAfter('#commentsText');
		$('#commentsText').addClass('reqField')
					.focus();
		return false;
	}
	
	// spam question
	if($('#spam_question').val() != '17')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Wrong answer! Please provide the correct answer to send email.')
				   .insertAfter('#spam_question');
		$('#spam_question').addClass('reqField')
					.focus();
		return false;
	}
	
	return true;
}
