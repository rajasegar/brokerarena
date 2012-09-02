<?php
require_once 'includes/global.inc.php';
$info = "";
if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$user = $userTools->getBroker($id);
}
if(isset($_POST['btnSubmit']))
{
	$broker_name = sanitizeString($_POST['txtBrokerName']);
	$address = sanitizeString($_POST['txtAddress']);
	$city = sanitizeString($_POST['txtCity']);
	$state = sanitizeString($_POST['txtState']);
	$zip_code = sanitizeString($_POST['txtZip']);
	$contact_no = mysql_real_escape_string($_POST['txtContactNo']);
	$website = sanitizeString($_POST['txtWebsite']);
	$mail = sanitizeString($_POST['txtEmail']);
	$month_estt = sanitizeString($_POST['month']);
	$year_estt = sanitizeString($_POST['txtYear']);
	$desc = sanitizeString($_POST['txtDesc']);
	$tollfree = sanitizeString($_POST['txtTollFree']);
	$dblogo = "images/broker_logos/";
	$logo = $_SERVER["DOCUMENT_ROOT"]."/images/broker_logos/";
	if (is_uploaded_file($_FILES['filelogo']['tmp_name'])) {
		$logo .= trim($broker_name);
		$logo .= ".jpg";
		$dblogo .= trim($broker_name);
		$dblogo .= ".jpg";
		move_uploaded_file($_FILES['filelogo']['tmp_name'], $logo);
	}
	else
	{
		$logo .= "default.png";
	}
	$update_fields = array(
				"sBrokerName" => "'$broker_name'",
				"sDescription" => "'$desc'",
				"dtModified" => "curdate()",
				"sAddress" => "'$address'",
				"sCity" => "'$city'",
				"sState" => "'$state'",
				"sZipCode" => "'$zip_code'",
				"nContactNo" => "'$contact_no'",
				"sWebsite" => "'$website'",
				"sMail_ID" => "'$mail'",
				"sLogoImage" => "'$dblogo'",
				"dtMonthEstt" => "'$month_estt'",
				"dtYearEstt" => "$year_estt",
				"sTollFreeNo" => "'$tollfree'");
	$where = "sUserName = '$user->m_UserID'";
	$result = $db->update($update_fields,'tbl_brokermaster',$where);
	if($result)
	{
		$info = "<div class='alert alert-success'><a class='close' data-dismiss='alert'>×</a><p>";
		$info .= "The Broker information have been updated successfully.</p></div>";
	}
}
?>
<?php include 'header.php';?>
	<div class="container-fluid">
	    <div class="row-fluid">
			<div class="span3">
	            <?php include 'admin_menu.php';?>
	        </div>
	        <div class="span9">
	            <div class="well">
	                <h1>Update Brokerage Infomation</h1>
					<?php if($info != "") {	echo $info;} ?>
					<form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
					</fieldset>
					<fieldset>
					<img id="imgLogo" src="../<?php echo $user->m_Logo; ?>" alt="Logo"/>
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
					<td><input type="text"  name="txtContactNo" id="txtContactNo"  value="<?php echo $user->m_ContactNo; ?>"/>
					</tr>
					<tr><td class="form_label">Toll Free Number:</td>
					<td><input type="text"  name="txtTollFree" id="txtTollFree"  value="<?php echo $user->m_TollFreeNo; ?>"/>
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

	// Email
	if($('#txtEmail').val() == '')
	{
		display_alert_error('E-mail should not be empty.',$('#txtEmail'));
		return false;
	}
	
	// Email format validation
	/*if ($('#txtEmail').val() != '' && !/.+@.+\.[a-zA-Z]{2,4}$/.test($('#txtEmail').val()))
	{
		$('<div/>').addClass('msg_validation')
				   .html('Please use proper e-mail format (e.g.joe@example.com')
				   .insertAfter('#txtEmail');
		$('#txtEmail').addClass('reqField')
						  .focus();
		return false;
	}*/

	// Brokername
	if($('#txtBrokerName').val() == '')
	{
		display_alert_error('Broker name should not be empty.',$('#txtBrokerName'));
		return false;
	}
	
	// Address
	if($('#txtAddress').val() == '')
	{
		display_alert_error('Address should not be empty.',$('#txtAddress'));
		return false;
	}
	
	// City
	if($('#txtCity').val() == '')
	{
		display_alert_error('City should not be empty.',$('#txtCity'));
		return false;
	}
	
	// State
	if($('#txtState').val() == '')
	{
		display_alert_error('State should not be empty.',$('#txtState'));
		return false;
	}
	
	// Zipcode
	if($('#txtZip').val() == '')
	{
		display_alert_error('Zip-code should not be empty.',$('#txtZip'));
		return false;
	}
	
	// Zipcode
	if($('#txtZip').val().length != 6)
	{
		display_alert_error('Invalid Zip-code. Should be exactly 6  numbers in size.',$('#txtZip'));
		return false;
	}
	
	// ContactNO
	if($('#txtContactNo').val() == '')
	{
		display_alert_error('Contact Number should not be empty.',$('#txtContactNo'));
		return false;
	}
	
	// Website
	if($('#txtWebsite').val() == '' || $('#txtWebsite').val() == 'http://')
	{
		display_alert_error('Website Url should not be empty.',$('#txtWebsite'));
		return false;
	}
	
	// /(\w+):\/\/([\w.]+)\/(\S*)/
	var url_pattern = /^http?:\/\/([a-z0-9-]+\.)+[a-z0-9]{2,4}.*$/;
	// Website url  format validation
	if ( !$('#txtWebsite').val().match(url_pattern))
	{
		display_alert_error('Please use proper url format (e.g.http://www.yahoo.com',$('#txtWebsite'));
		return false;
	}
	
	// Year Estt
	/*if($('#txtYear').val() == '')
	{
		display_alert_error('Established Year should not be empty.',$('#txtYear'));
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
	}*/
	
	// Description
	if($('#txtDesc').val() == '')
	{
		display_alert_error('Description should not be empty.',$('#txtDesc'));
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
function display_alert_error(text,source) {
	$('div.alert-error').remove();
	$('<div/>').html("<a class='close' data-dismiss='alert'>×</a>")
		.append(text)
		.addClass("alert alert-error")
		.insertAfter(source);
	source.addClass('error')
		.focus();
}
</script>
