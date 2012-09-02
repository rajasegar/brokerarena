function validateForm()
{
	$('input').removeClass('reqField');
	$('div.msg_validation').remove();
	
	//alert($('#txtAccountPassword').val().length);
	// Username
	if($('#txtAccountUserName').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Username should not be empty.')
				   .insertAfter('#txtAccountUserName');
		$('#txtAccountUserName').addClass('reqField')
					.focus();
		return false;
	}
	
	// Password validation
	if($('#txtAccountPassword').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Password should not be empty.')
				   .insertAfter('#txtAccountPassword');
		$('#txtAccountPassword').addClass('reqField')
						  .focus();
		return false;
	}
	
	// Password size validation
	if( $('#txtAccountPassword').val().length < 6)
	{
		$('<div/>').addClass('msg_validation')
				   .html('Password should be minimum 6 characters in size.')
				   .insertAfter('#txtAccountPassword');
		$('#txtAccountPassword').addClass('reqField')
						  .focus();
		return false;
	}
	// Confirm Password validation
	if($('#txtConfirmPassword').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Confirm Password should not be empty.')
				   .insertAfter('#txtConfirmPassword');
		$('#txtConfirmPassword').addClass('reqField')
						  .focus();
		return false;
	}
    // Password match validation
	if($('#txtConfirmPassword').val() != $('#txtAccountPassword').val())
	{
		$('<div/>').addClass('msg_validation')
				   .html('Passwords do not match. Please re-enter.')
				   .insertAfter('#txtConfirmPassword');
		$('#txtConfirmPassword').addClass('reqField')
						  .focus();
		return false;
	}

    // Firstname validation
	if($('#txtFirstName').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('First name should not be empty.')
				   .insertAfter('#txtFirstName');
		$('#txtFirstName').addClass('reqField')
						  .focus();
		return false;
	}
    
	// Lastname validation
	if($('#txtLastName').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Last name should not be empty.')
				   .insertAfter('#txtLastName');
		$('#txtLastName').addClass('reqField')
						  .focus();
		return false;
	}
    
	
	// Email empty validation
	if($('#txtEmail').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('E-mail Id should not be empty.')
				   .insertAfter('#txtEmail');
		$('#txtEmail').addClass('reqField')
						  .focus();
		return false;
	}
	// Email format validation
	if ($('#txtEmail').val() != '' && !/.+@.+\.[a-zA-Z]{2,4}$/.test($('#txtEmail').val()))
	{
		$('<div/>').addClass('msg_validation')
				   .html('Please use proper e-mail format (e.g.joe@example.com')
				   .insertAfter('#txtEmail');
		$('#txtEmail').addClass('reqField')
						  .focus();
		return false;
	}
	
	// Password question validation
	if($('#secquest').val() == '--Select--')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Please select a secret password hint question.')
				   .insertAfter('#secquest');
		$('#secquest').addClass('reqField')
						  .focus();
		return false;
	}
	 // Password answer validation
	if($('#txtAnswer').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Password hint should not be empty.')
				   .insertAfter('#txtAnswer');
		$('#txtAnswer').addClass('reqField')
						  .focus();
		return false;
	}
return true;
}
