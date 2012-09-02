$(document).ready(function() {
	$('span.help-inline').hide();
	$('.numeric_field').keypress(function(event) {
		if (event.charCode && (event.charCode < 48 || event.charCode > 57))
		{
		event.preventDefault();
		}
	});
});


function validateForm()
{
	
	// Username
	if($('#txtAccountUserName').val() == '')
	{
		display_error($('#txtAccountUserName'));
		return false;
	}

	// Email
	if($('#txtEmail').val() == '')
	{
		display_error($('#txtEmail'));
		return false;
	}
	
	// Email format validation
	if ($('#txtEmail').val() != '' && !/.+@.+\.[a-zA-Z]{2,4}$/.test($('#txtEmail').val()))
	{
		display_error($('#txtEmail'),'Please use proper e-mail format (e.g.joe@example.com)');
		return false;
	}

	// Brokername
	if($('#txtBrokerName').val() == '')
	{
		display_error($('#txtBrokerName'));
		return false;
	}
	
	// Address
	if($('#txtAddress').val() == '')
	{
		display_error($('#txtAddress'));
		return false;
	}
	
	// City
	if($('#txtCity').val() == '')
	{
		display_error($('#txtCity'));
		return false;
	}
	
	// State
	if($('#txtState').val() == '')
	{
		display_error($('#txtState'));
		return false;
	}
	
	// Zipcode
	if($('#txtZip').val() == '')
	{
		display_error($('#txtZip'));
		return false;
	}
	
	// Zipcode
	if($('#txtZip').val().length != 6)
	{
		display_error($('#txtZip'),'Invalid Zip-code. Should be exactly 6 numbers in size.');
		return false;
	}
	
	// ContactNO
	if($('#txtContactNo').val() == '')
	{
		display_error($('#txtContactNo'));
		return false;
	}
	
	// ContactNO
	if($('#txtTollFreeNo').val() == '')
	{
		display_error($('#txtTollFreeNo'));
		return false;
	}
	
	// Website
	if($('#txtWebsite').val() == '' || $('#txtWebsite').val() == 'http://')
	{
		display_error($('#txtWebsite'));
		return false;
	}
	
	// /(\w+):\/\/([\w.]+)\/(\S*)/
	var url_pattern = /^http?:\/\/([a-z0-9-]+\.)+[a-z0-9]{2,4}.*$/;
	// Website url  format validation
	if ( !$('#txtWebsite').val().match(url_pattern))
	{
		display_error($('#txtWebsite'),'Please use proper url format (e.g.http://www.yahoo.com');
		return false;
	}
	
	
	// Description
	if($('#txtDesc').val() == '')
	{
		display_error($('#txtDesc'));
		return false;
	}
	
	// Logo
	if($('#filelogo').val() == '')
	{
		display_error($('#filelogo'));
		return false;
	}
	
	return true;
}
function display_error(control,err_msg) {
	// reset all error messages
	$('div.control-group').removeClass('error');
	$('span.help-inline').hide();
	
	control.parents('div.control-group').addClass('error');
	if(err_msg) {
		control.siblings('span.help-inline').html(err_msg);
	}
	control.siblings('span.help-inline').show();
	control.focus();
}
