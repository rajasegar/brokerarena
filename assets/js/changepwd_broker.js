function validateForm()
{
	$('input').removeClass('reqField');
	$('div.msg_validation').remove();
	
	// Password
	if($('#txtPwd').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Password should not be empty.')
				   .insertAfter('#txtPwd');
		$('#txtPwd').addClass('reqField')
					.focus();
		return false;
	}
	
	// Password
	if($('#txtPwd').val().length < 6)
	{
		$('<div/>').addClass('msg_validation')
				   .html('Password should be minimum 6 characters in size.')
				   .insertAfter('#txtPwd');
		$('#txtPwd').addClass('reqField')
					.focus();
		return false;
	}
	
	// Confirm Password
	if($('#txtConfirmPwd').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Confirm Password should not be empty.')
				   .insertAfter('#txtConfirmPwd');
		$('#txtConfirmPwd').addClass('reqField')
					.focus();
		return false;
	}
	
	// Password match
	if($('#txtPwd').val() != $('#txtConfirmPwd').val())
	{
		$('<div/>').addClass('msg_validation')
				   .html('Password do not match. Please re-enter.')
				   .insertAfter('#txtConfirmPwd');
		$('#txtConfirmPwd').addClass('reqField')
					.focus();
		return false;
	}
	return true;
}
