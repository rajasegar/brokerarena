
<?php include 'header.php';?>
	<div id="content_wrap">
	    <div id="content" class="container_12 clearfix">
	        <div class="grid_9">
	            <div class="box">
	                <h1>Broker Registration - Email Verification</h1>
					<?php

if(isset($_POST['btnSubmit']))
{
	$acct_username = sanitizeString($_POST['txtAccountUserName']);
	$acct_pwd = md5(sanitizeString($_POST['txtAccountPassword']));
	$acct_mail = sanitizeString($_POST['txtEmail']);
	$broker_name = sanitizeString($_POST['txtBrokerName']);
	$address = sanitizeString($_POST['txtAddress']);
	$city = sanitizeString($_POST['txtCity']);
	$state = sanitizeString($_POST['txtState']);
	$zip_code = sanitizeString($_POST['txtZip']);
	$contact_no = sanitizeString($_POST['txtContactNo']);
	$website = sanitizeString($_POST['txtWebsite']);
	$month_estt = sanitizeString($_POST['month']);
	$year_estt = sanitizeString($_POST['txtYear']);
	$desc = sanitizeString($_POST['txtDesc']);
	$logo = "images/broker_logos/";
	$sq_type = $_POST['radSecret'];
	if($sq_type == 1)
	{
		$secret_question = sanitizeString($_POST['secret_question']);
	}
	else
	{
		$secret_question = sanitizeString($_POST['txtSecretQuestion']);
	}
	$secret_answer = md5(sanitizeString($_POST['txtAnswer']));
	if (is_uploaded_file($_FILES['filelogo']['tmp_name'])) {
		$logo .= $acct_username;
		$logo .= ".jpg";
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
				"sLogoImage" => "'$logo'",
				"dtCreated" => "curdate()",
				"dtModified" => "curdate()",
				"sAddress" => "'$address'",
				"sCity" => "'$city'",
				"sState" => "'$state'",
				"sZipCode" => "'$zip_code'",
				"nContactNo" => "$contact_no",
				"sWebsite" => "'$website'",
				"dtMonthEstt" => "'$month_estt'",
				"dtYearEstt" => "$year_estt",
				"sSecretQuestion" => "'$secret_question'",
				"sSecretAnswer" => "'$secret_answer'");
	$broker_id = $db->insert($insert_fields,'tbl_brokermaster');
	$key = $acct_username.$acct_mail.date('mY');  
	$key = md5($key);
	$insert_fields = array(
					"userid" => "'$acct_username'",
					"conf_code" => "'$key'",
					"email" => "'$acct_mail'");
	$confirm_id = $db->insert($insert_fields,'confirm');
	
	// if suceesfully inserted data into database, send confirmation link to email
	if($confirm_id){

	// ---------------- SEND MAIL FORM ----------------

	// send e-mail to ...
	$to=$acct_mail;

	// Your subject
	$subject="BrokerArena - Registration Confirmation link here";

	// From
	// To send HTML mail, the Content-type header must be set
	$header  = 'MIME-Version: 1.0' . "\r\n";
	$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$header="from: BrokerArena.com <admin@brokerarena.com> \r\n";
	$header .= 'X-Mailer: PHP/'.phpversion()."\r\n";
	
	// Your message
	$message="Your Confirmation link \r\n";
	$message.="Click on this link to activate your account \r\n";
	$message.="<a href='http://brokerarena.com/broker_signup_confirmation.php?email=$acct_mail&code=$key'>http://brokerarena.com/broker_signup_confirmation.php?email=$acct_mail&code=$key</a>";

	// send email
	$sentmail = mail($to,$subject,$message,$header);

	}

	// if not found
	else {
	echo "Not found your email in our database";
	}

	// if your email succesfully sent
	if($sentmail){
	echo "Your Confirmation link Has Been Sent To Your Email Address.";
	}
	else {
	echo "Cannot send Confirmation link to your e-mail address";
	//For testing purposes only
	//echo "<br/>http://localhost/myarena/broker_signup_confirmation.php?email=$acct_mail&code=$key<br/>";
	}
}
?>
	            </div>
	        </div>
	        <div id="sidebar" class="grid_3">
	            <?php include 'sidebar.php';?>
	        </div>
	    </div>
	</div>
<?php include 'footer.php';?>
