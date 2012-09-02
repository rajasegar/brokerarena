<?php
include 'header.php';
if(isset($_POST['btnSubmit']))
{
	$acct_username = sanitizeString($_POST['txtAccountUserName']);
	$acct_pwd = md5(sanitizeString("Gmail123*"));
	$acct_mail = sanitizeString($_POST['txtEmail']);
	$broker_name = sanitizeString($_POST['txtBrokerName']);
	$address = sanitizeString($_POST['txtAddress']);
	$city = sanitizeString($_POST['txtCity']);
	$state = sanitizeString($_POST['txtState']);
	$zip_code = sanitizeString($_POST['txtZip']);
	$contact_no = mysql_real_escape_string($_POST['txtContactNo']);
	$tollfree = sanitizeString($_POST['txtTollFreeNo']);
	$website = sanitizeString($_POST['txtWebsite']);
	//$month_estt = sanitizeString($_POST['month']);
	//$year_estt = sanitizeString($_POST['txtYear']);
	$desc = sanitizeString($_POST['txtDesc']);
	$dblogo = "images/broker_logos/";
	$logo = $_SERVER["DOCUMENT_ROOT"]."/images/broker_logos/";
	$secret_question = sanitizeString("What is your main frequent flier number?");
	$secret_answer = md5(sanitizeString("123456"));
	if (is_uploaded_file($_FILES['filelogo']['tmp_name'])) {
		$logo .= $acct_username;
		$logo .= ".jpg";
		$dblogo .= $acct_username;
		$dblogo .= ".jpg";
		move_uploaded_file($_FILES['filelogo']['tmp_name'], $logo);
	}
	else
	{
		$logo .= "default.png";
	}
	
	$insert_fields = array(
				"sBrokerName" => "'$broker_name'",
				"sDescription" => "'$desc'",
				"sUserName" => "'$acct_username'",
				"sPassword" => "'$acct_pwd'",
				"sMail_ID" => "'$acct_mail'",
				"sLogoImage" => "'$dblogo'",
				"dtCreated" => "curdate()",
				"dtModified" => "curdate()",
				"sAddress" => "'$address'",
				"sCity" => "'$city'",
				"sState" => "'$state'",
				"sZipCode" => "'$zip_code'",
				"nContactNo" => "'$contact_no'",
				"sTollFreeNo" => "'$tollfree'",
				"sWebsite" => "'$website'",
				"dtMonthEstt" => "''",
				"dtYearEstt" => "''",
				"sSecretQuestion" => "'$secret_question'",
				"sSecretAnswer" => "'$secret_answer'",
				"bActive" => "1");
	$broker_id = $db->insert($insert_fields,'tbl_brokermaster');
	$key = $acct_username.$acct_mail.date('mY');  
	$key = md5($key);
	$insert_fields = array(
					"userid" => "'$acct_username'",
					"conf_code" => "'$key'",
					"email" => "'$acct_mail'");
	$confirm_id = $db->insert($insert_fields,'confirm');
	if($confirm_id)
	{
	}
	else
	{
		$error = "Broker creation failed due to: ".$db->last_error;
	}
	
}
?>
	<div class="container-fluid">
	    <div class="row-fluid">
			<div class="span3">
	            <?php include 'admin_menu.php';?>
	        </div>
	        <div class="span9">
	            <div class="box2_fullwidth">
					<?php
					if($confirm_id)
					{
						echo "<div class='alert alert-success'>Broker created successfully.</div>";
					}
					else
					{
						if(isset($error))
						{
							echo "<div class='alert alert-error'>$error</div>";
						}
					?>
	                <h1>Add Brokerage Firm</h1>
					<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
	                <fieldset>
					<legend>Account Details</legend>
					<div class="control-group">
						<label class="control-label" for="txtAccountUserName">User Name:</label>
						<div class="controls">
							<input type="text" name="txtAccountUserName" id="txtAccountUserName">
							<span class="help-inline">User Name should not be empty.</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtEmail">Email:</label>
						<div class="controls">
							<input type="text" name="txtEmail" id="txtEmail">
							<span class="help-inline">Email should not be empty.</span>
						</div>
					</div>
					</fieldset>
					<fieldset>
					<legend>Company Details</legend>
					<div class="control-group">
						<label class="control-label" for="txtBrokerName">Broker Name:</label>
						<div class="controls">
							<input type="text" name="txtBrokerName" id="txtBrokerName">
							<span class="help-inline">Broker name should not be empty.</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtAddress">Address:</label>
						<div class="controls">
							<input type="text" name="txtAddress" id="txtAddress">
							<span class="help-inline">Address should not be empty.</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtCity">City:</label>
						<div class="controls">
							<input type="text" name="txtCity" id="txtCity">
							<span class="help-inline">City should not be empty.</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtState">State:</label>
						<div class="controls">
							<input type="text" name="txtState" id="txtState">
							<span class="help-inline">State should not be empty.</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtZip">Zip/Postal code:</label>
						<div class="controls">
							<input type="text" name="txtZip" id="txtZip" maxlength="6" size="6" class="numeric_field">
							<span class="help-inline">Zip code should not be empty.</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtContactNo">Contact No:</label>
						<div class="controls">
							<input type="text" name="txtContactNo" id="txtContactNo">
							<span class="help-inline">Contact No. should not be empty.</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtTollFreeNo">Toll Free No:</label>
						<div class="controls">
							<input type="text" name="txtTollFreeNo" id="txtTollFreeNo">
							<span class="help-inline">Toll Free No. should not be empty.</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtWebsite">Company URL:</label>
						<div class="controls">
							<input type="text" name="txtWebsite" id="txtWebsite" placeholder="http://">
							<span class="help-inline">Company URL should not be empty.</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtDesc">Company Description:</label>
						<div class="controls">
							<textarea rows="5" cols="50" name="txtDesc" id="txtDesc"></textarea>
							<span class="help-inline">Company Description not be empty.</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="filelogo">Company Logo:</label>
						<div class="controls">
							<input type="file" name="filelogo" id="filelogo">
							<p class="help-block">
								* Your company logo must be:<br/>
								- saved in .gif or .jpg format<br/>
								- equal to or smaller then 10KB in size<br/>
								- Absolutely no animations <br/>
							</p>
							<span class="help-inline">Please choose an image for the logo.</span>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<input type="submit" value="Add Brokerage" name="btnSubmit" class="btn btn-primary"/>
							<input type="reset" value="Reset" name="btnReset" class="btn"/>
						</div>
					</div>
					
					</fieldset>
					</form>
					<?php
					}
					?>
	            </div>
	        </div>
	    </div>
	</div>
<?php include 'footer.php';?>
<script type="text/javascript" src="js/add_broker.js"></script>
