$(document).ready(function() {
	$('div#customSecretQuestion').hide();
	
	$(':radio[name=radSecret]').change(function() {
		$val = $('input[name="radSecret"]:checked').val()
		//alert($val);
		if($val == 2)
		{
			$('div#customSecretQuestion').show();
			$('div#defSecretQuestion').hide();
		}
		else
		{
			$('div#customSecretQuestion').hide();
			$('div#defSecretQuestion').show();
		}
	});
	
	$('.numeric_field').keypress(function(event) {
		if (event.charCode && (event.charCode < 48 || event.charCode > 57))
		{
		event.preventDefault();
		}
	});
	
	$('#txtAccountUserName').blur(function() {
		if($('#txtAccountUserName').val() != '')
		{
			$.ajax(
			{
				type:'POST',
				url:'ajax_userid_available.php',
				data:{'id':$('#txtAccountUserName').val(),'type':2},	// type = 1 for user, type = 2 for broker
				success:
					function(data) 
					{
						$('span#info').html(data)
							.insertAfter('#txtAccountUserName');
					},
				error:
					function() 
					{ 
						$("div#ajax_err").append("An error occured during processing")
							.addClass("msg_error"); 
					}
			});
		}

	});
	
	
});


function validateForm()
{
	$('input').removeClass('reqField');
	$('div.msg_validation').remove();
	
	// Username
	if($('#txtAccountUserName').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('UserName should not be empty.')
				   .insertAfter('#txtAccountUserName');
		$('#txtAccountUserName').addClass('reqField')
					.focus();
		return false;
	}
	
	// Password
	if($('#txtAccountPassword').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Password should not be empty.')
				   .insertAfter('#txtAccountPassword');
		$('#txtAccountPassword').addClass('reqField')
					.focus();
		return false;
	}
	
	// Password size
	if($('#txtAccountPassword').val().length < 6)
	{
		$('<div/>').addClass('msg_validation')
				   .html('Password should be minimum 6 characters in size.')
				   .insertAfter('#txtAccountPassword');
		$('#txtAccountPassword').addClass('reqField')
					.focus();
		return false;
	}
	
	// Confirm Password
	if($('#txtConfirmPassword').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Password should not be empty.')
				   .insertAfter('#txtConfirmPassword');
		$('#txtConfirmPassword').addClass('reqField')
					.focus();
		return false;
	}
	
	// Password match 
	if($('#txtConfirmPassword').val() != $('#txtAccountPassword').val())
	{
		$('<div/>').addClass('msg_validation')
				   .html('Passwords do not match. Please enter again.')
				   .insertAfter('#txtConfirmPassword');
		$('#txtConfirmPassword').addClass('reqField')
					.focus();
		return false;
	}
	
	// Email
	if($('#txtEmail').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('E-mail should not be empty.')
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
	$val = $('input[name="radSecret"]:checked').val()
	//alert($val);
	if($val == 2)
	{
		// Password question validation
		if($('#txtSecretQuestion').val() == '')
		{
			$('<div/>').addClass('msg_validation')
					   .html('Please enter a secret password hint question.')
					   .insertAfter('#txtSecretQuestion');
			$('#txtSecretQuestion').addClass('reqField')
							  .focus();
			return false;
		}
	}
	else
	{
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
	
	// Brokername
	if($('#txtBrokerName').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Broker Name should not be empty.')
				   .insertAfter('#txtBrokerName');
		$('#txtBrokerName').addClass('reqField')
						  .focus();
		return false;
	}
	
	// Address
	if($('#txtAddress').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Address should not be empty.')
				   .insertAfter('#txtAddress');
		$('#txtAddress').addClass('reqField')
						  .focus();
		return false;
	}
	
	// City
	if($('#txtCity').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('City should not be empty.')
				   .insertAfter('#txtCity');
		$('#txtCity').addClass('reqField')
						  .focus();
		return false;
	}
	
	// State
	if($('#txtState').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('State should not be empty.')
				   .insertAfter('#txtState');
		$('#txtState').addClass('reqField')
						  .focus();
		return false;
	}
	
	// Zipcode
	if($('#txtZip').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Zip-code should not be empty.')
				   .insertAfter('#txtZip');
		$('#txtZip').addClass('reqField')
						  .focus();
		return false;
	}
	
	// Zipcode
	if($('#txtZip').val().length != 6)
	{
		$('<div/>').addClass('msg_validation')
				   .html('Invalid Zip-code. Should be exactly 6 numbers in size.')
				   .insertAfter('#txtZip');
		$('#txtZip').addClass('reqField')
						  .focus();
		return false;
	}
	
	// ContactNO
	if($('#txtContactNo').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Contact Number should not be empty.')
				   .insertAfter('#txtContactNo');
		$('#txtContactNo').addClass('reqField')
						  .focus();
		return false;
	}
	
	// Website
	if($('#txtWebsite').val() == '' || $('#txtWebsite').val() == 'http://')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Website Url should not be empty.')
				   .insertAfter('#txtWebsite');
		$('#txtWebsite').addClass('reqField')
						  .focus();
		return false;
	}
	
	// /(\w+):\/\/([\w.]+)\/(\S*)/
	var url_pattern = /^http?:\/\/([a-z0-9-]+\.)+[a-z0-9]{2,4}.*$/;
	// Website url  format validation
	if ( !$('#txtWebsite').val().match(url_pattern))
	{
		$('<div/>').addClass('msg_validation')
				   .html('Please use proper url format (e.g.http://www.yahoo.com')
				   .insertAfter('#txtWebsite');
		$('#txtWebsite').addClass('reqField')
						  .focus();
		return false;
	}
	
	// Year Estt
	if($('#txtYear').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Established Year should not be empty.')
				   .insertAfter('#txtYear');
		$('#txtYear').addClass('reqField')
						  .focus();
		return false;
	}
	
	// Year Estt
	if($('#txtYear').val().length < 4)
	{
		$('<div/>').addClass('msg_validation')
				   .html('Invalid Year. Should be 4 numbers in size.')
				   .insertAfter('#txtYear');
		$('#txtYear').addClass('reqField')
						  .focus();
		return false;
	}
	
	// Description
	if($('#txtDesc').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Description should not be empty.')
				   .insertAfter('#txtDesc');
		$('#txtDesc').addClass('reqField')
						  .focus();
		return false;
	}
	
	// Logo
	if($('#filelogo').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Please choose an image for the logo.')
				   .insertAfter('#filelogo');
		$('#filelogo').addClass('reqField')
						  .focus();
		return false;
	}
	
	
	
	return true;
}