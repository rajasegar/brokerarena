<?php
require_once 'includes/global.inc.php';
$info = "";
if(isset($_SESSION['user']))
{
	$user = unserialize($_SESSION["user"]);
}
if(isset($_POST['btnSubmit']))
{
	$broker_name = sanitizeString($_POST['txtBrokerName']);
	$address = sanitizeString($_POST['txtAddress']);
	$city = sanitizeString($_POST['txtCity']);
	$state = sanitizeString($_POST['txtState']);
	$zip_code = sanitizeString($_POST['txtZip']);
	$contact_no = sanitizeString($_POST['txtContactNo']);
	$website = sanitizeString($_POST['txtWebsite']);
	$mail = sanitizeString($_POST['txtEmail']);
	$month_estt = sanitizeString($_POST['month']);
	$year_estt = sanitizeString($_POST['txtYear']);
	$desc = sanitizeString($_POST['txtDesc']);
	/*$logo = "images/broker_logos/";
	if (is_uploaded_file($_FILES['filelogo']['tmp_name'])) {
		$logo .= $acct_username;
		$logo .= ".jpg";
		move_uploaded_file($_FILES['filelogo']['tmp_name'], $logo);
	}
	else
	{
		$logo .= "default.png";
	}*/
	$update_fields = array(
				"sBrokerName" => "'$broker_name'",
				"sDescription" => "'$desc'",
				"dtModified" => "curdate()",
				"sAddress" => "'$address'",
				"sCity" => "'$city'",
				"sState" => "'$state'",
				"sZipCode" => "'$zip_code'",
				"nContactNo" => "$contact_no",
				"sWebsite" => "'$website'",
				"sMail_ID" => "'$mail'",
				"dtMonthEstt" => "'$month_estt'",
				"dtYearEstt" => "$year_estt");
	$where = "sUserName = '$user->m_UserID'";
	$result = $db->update($update_fields,'tbl_brokermaster',$where);
	if($result)
	{
		$info = "<div class='msg_info'><p>";
		$info .= "Your profile information have been updated successfully.</p></div>";
	}
}
?>
<?php include 'header.php';?>
	<div class="container">
	    <div class="row">
	        <div class="span9">
				<div class="row">
					<div class="span2">
						<?php include 'broker_menu.php';?>
					</div>
					<div class="span7">
						<div class="well">
	                <h1>Update Your Brokerage Infomation</h1>
					<?php if($info != "") {	echo $info;} ?>
					<form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
					</fieldset>
					<fieldset>
					<legend>Company Details</legend>
					<img id="imgLogo" src="<?php echo $user->m_Logo; ?>" alt="Logo"/>
					<table>
					<tr>
					<td class="form_label">Broker Name:</td>
					<td><input type="text" name="txtBrokerName" id="txtBrokerName" class="medium_size" value="<?php echo $user->m_BrokerName; ?>"/></td>
					</tr>
					<tr>
					<td class="form_label">Address:</td>
					<td><input type="text" name="txtAddress" id="txtAddress" class="large_size" value="<?php echo $user->m_Address; ?>"/></td>
					</tr>
					<tr><td class="form_label">City:</td>
					<td><input type="text" name="txtCity" id="txtCity" value="<?php echo $user->m_City; ?>"/>
					</tr>
					<tr>
					<td class="form_label">State/Province:</td>
					<td><input type="text" name="txtState" id="txtState" value="<?php echo $user->m_State; ?>"/>
					</tr>
					<tr><td class="form_label">Zip/Postal Code:</td>
					<td><input type="text" maxlength="6" size="6" class="numeric_field" name="txtZip" id="txtZip" value="<?php echo $user->m_ZipCode; ?>"/>
					</tr>
					<tr><td class="form_label">Contact Number:</td>
					<td><input type="text"  name="txtContactNo" id="txtContactNo" class="numeric_field" value="<?php echo $user->m_ContactNo; ?>"/>
					</tr>
					<tr><td class="form_label">Company URL:</td>
					<td><input type="text"  name="txtWebsite" id="txtWebsite" value="<?php echo $user->m_Url; ?>"/>
					</tr>
					<tr><td class="form_label">E-mail:</td>
					<td><input type="text"  name="txtEmail" id="txtEmail" value="<?php echo $user->m_MailID; ?>"/>
					</tr>
					<tr><td class="form_label">Year Established:</td>
					<td><select size="1" name="month">
					<?php
					$months = array('January','February','March','April','May','June','July','August','September','October','November','December');
					foreach($months as $month)
					{
						if($user->m_EsttMonth == $month)
						{
							echo "<option value=\"$month\" selected=\"selected\">$month</option>";
						}
						else
						{
							echo "<option value=\"$month\">$month</option>";
						}
					}
					?>
					</select> Year <input type="text" name="txtYear" id="txtYear" class="numeric_field" maxlength="4" size="4" value="<?php echo $user->m_EsttYear; ?>"/></td>
					</tr>
					<tr>
					<td class="form_label">Company Description:</td>
					<td><textarea rows="5" cols="50" name="txtDesc" id="txtDesc"><?php echo $user->m_Description; ?></textarea></td>
					</tr>
					<tr>
					<td class="form_label">Company Logo: *</td>
					<td><input type="file" name="filelogo" id="filelogo" size="14" maxlength="32"/></td>
					</tr>
					<tr><td colspan="2" class="hints">
					* Your company logo must be:<br/>
					- saved in .gif or .jpg format<br/>
					- exactly 100 (width) x 100 (height) pixels in size<br/>
					- equal to or smaller then 10KB in size<br/>
					- Absolutely no animations <br/>
					</td>
					</tr>
					</table>
					</fieldset>
					<table>
					<tr>
					<td><input type="submit" value="Update" name="btnSubmit" class="btn btn-primary"/></td>
					<td><input type="reset" value="Reset" name="btnReset" class="btn"/></td>
					</tr>
					</table>
					</form>
	            </div>
					</div>
				
				</div>
	            
	        </div>
	        <div id="sidebar" class="span3">
	            <?php include 'sidebar.php';?>
	        </div>
	    </div>
	</div>
<?php include 'footer.php';?>
<script type="text/javascript">
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
	/*if($('#filelogo').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Please choose an image for the logo.')
				   .insertAfter('#filelogo');
		$('#filelogo').addClass('reqField')
						  .focus();
		return false;
	}*/
	
	
	
	return true;
}
</script>
