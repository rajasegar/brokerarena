<?php include 'header.php';?>
	<div id="content_wrap">
	    <div id="content" class="container_12 clearfix">
	        <div class="grid_9">
	            <div class="box">
	                <h1>User Registration - Email Verification</h1>
					<?php

if(isset($_POST['btnSubmit']))
{
	$acct_username = sanitizeString($_POST['txtAccountUserName']);
	$firstname = sanitizeString($_POST['txtFirstName']);
	$lastname = sanitizeString($_POST['txtLastName']);
	$acct_pwd = md5(sanitizeString($_POST['txtAccountPassword']));
	$acct_mail = sanitizeString($_POST['txtEmail']);
	$sq_type = $_POST['radSecret'];
	if($sq_type == 1)
	{
	$secret_question = sanitizeString($_POST['secret_question']);
	}
	else
	{
	$secret_question = sanitizeString($_POST['txtSecretQuestion']);
	}
	$answer = md5(sanitizeString($_POST['txtAnswer']));
	$insert_fields = array(
				"sUserName" => "'$acct_username'",
				"sFirstName" => "'$firstname'",
				"sLastName" => "'$lastname'",
				"sPassword" => "'$acct_pwd'",
				"sMailID" => "'$acct_mail'",
				"dtCreated" => "curdate()",
				"dtModified" => "curdate()",
				"sSecretQuestion" => "'$secret_question'",
				"sSecretAnswer" => "'$answer'");
	$result = $db->insert($insert_fields,'tbl_usermaster');
	
	$key = $acct_username.$acct_mail.date('mY');  
	$key = md5($key);
	$confirm_fields = array(
					"userid" => "'$acct_username'",
					"conf_code" => "'$key'",
					"email" => "'$acct_mail'");
	$result = $db->insert($confirm_fields,'confirm');
	
	// if suceesfully inserted data into database, send confirmation link to email
	if($result){

	// ---------------- SEND MAIL FORM ----------------

	// send e-mail to ...
	$to=$acct_mail;

	// Your subject
	$subject="BrokerArena - Registration Confirmation link here";

	// From
	// To send HTML mail, the Content-type header must be set
	$header  = 'MIME-Version: 1.0' . "\r\n";
	$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$header .= "from: BrokerArena <admin@hangaroundtheweb.com> \r\n";
	$header .= 'X-Mailer: PHP/'.phpversion()."\r\n";


	// Your message
	$message="Your Confirmation link \r\n";
	$message.="Click on this link to activate your account \r\n";
	$message.="<a href='http://brokerarena.com/user_signup_confirmation.php?email=$acct_mail&code=$key'>http://brokerarena.com/user_signup_confirmation.php?email=$acct_mail&code=$key</a>";

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
	//echo "<br/>http://localhost/myarena/user_signup_confirmation.php?email=$acct_mail&code=$key";
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
