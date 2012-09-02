<?php
$emailSent = "";
$emailTo = "support@nemesisindia.com";
function sanitizeString($var)
{
$var = strip_tags($var);
$var = htmlentities($var);
$var = stripslashes($var);
//return mysql_real_escape_string($var);
return $var;
}

if(isset($_POST['submit']))
{
	$name = sanitizeString($_POST['contactName']);
	$email = sanitizeString($_POST['email']);
	$category = $_POST['category'];
	$comments = sanitizeString($_POST['comments']);
    $subject = '[Nemesis] From '.$name;
    $body = "Name: $name \n\nEmail: $email \n\nCategory: $category \n\nComments: $comments";
    $headers = 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;
    mail($emailTo, $subject, $body, $headers);
    $emailSent = true;
	
	// send auto-reply
	$subject = '[Nemesis] Thanks for contacting... ';
    $body = "Dear: $name \n\n Regards from Nemesis Consulting Services Team \n\n Thanks for contacting Nemesis, we will get back to you as soon as possible and promise to take immediate measures on the issues/suggestions/feeback mentioned by you.";
    $headers = 'From: Support-Team <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $emailTo;
    mail($email, $subject, $body, $headers);
	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
	<title>NEMESIS Consulting Services Pvt. Ltd. - India</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="css/images/favicon.ico?cb=1" />
	<link rel="stylesheet" href="css/buttons.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!--[if IE 6]>
		<link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" />
	<![endif]-->
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.jcarousel.js"></script>
	<script type="text/javascript" src="js/jquery-func.js"></script>
	<script type="text/javascript" src="js/contact.js"></script>
</head>
<body>
<!-- Header -->
<div id="header">
	<!-- Shell -->
	<div class="shell">
		<h1 id="logo"><a href="http://nemesisindia.com">NEMESIS</a></h1>
		<!-- Navigation -->
		<div id="navigation">
			<ul>
			    <li><a href="index.html"><span>HOME</span></a></li>
			    <li><a href="about.html"><span>ABOUT</span></a></li>
			    <li><a href="services.html"><span>SERVICES</span></a></li>
			    <li><a href="products.html"><span>PRODUCTS</span></a></li>
			    <li><a class="active" href="#"><span>CONTACT</span></a></li>
			</ul>
		</div>
		<!-- end Navigation -->
		
	</div>
	<!-- end Shell -->
</div>
<!-- end Header -->

<!-- Main -->
<div id="main">
	<!-- Shell -->
	<div class="shell">
		<h1>Contact Us!</h1>
					<p class="content">Whether you are an executive with a business challenge or a student in search of an internship, we appreciate your interest in our organization. Use the form below to contact us for more information. For requests that require a personal response, we will make every effort to respond within 72 hours.</p>
					<?php if(isset($emailSent) && $emailSent == true) { ?>
                        <div class="msg_success">Thanks, your email was sent successfully.</div>
                    <?php } else { ?>
                    <?php if(isset($hasError) || isset($captchaError)) { ?>
                        <div class="msg_error">Sorry, an error occured.</div>
                    <?php } ?>
					<p>Make sure you enter the * required information where indicated. </p>
					<div id="google_map">
						<iframe width="405" height="330" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Korattur,+Chennai&amp;aq=&amp;sll=11.931181,79.785461&amp;sspn=0.476313,0.837021&amp;ie=UTF8&amp;hq=&amp;hnear=Korattur,+Thiruvallur,+Tamil+Nadu,+India&amp;t=m&amp;z=14&amp;ll=13.130339,80.192401&amp;output=embed"></iframe>
						<br /><small><a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Korattur,+Chennai&amp;aq=&amp;sll=11.931181,79.785461&amp;sspn=0.476313,0.837021&amp;ie=UTF8&amp;hq=&amp;hnear=Korattur,+Thiruvallur,+Tamil+Nadu,+India&amp;t=m&amp;z=14&amp;ll=13.130339,80.192401" >View Larger Map</a></small>
					</div>
					<form action="" id="contactForm" method="post" onsubmit="return validateContactForm()" class="block">
						<fieldset>
						<ol>
							<li>
								<label for="contactName">Name*</label>
								<input type="text" name="contactName" id="contactName" value=""/>
							</li>
							<li>
								<label for="email">Email*</label>
								<input type="text" name="email" id="email" value=""/>
							</li>
							<li>
								<label for="category">Category</label>
								<select name="category" id="category">
								<option value="Requirement">Requirement</option>
								<option value="Suggestion">Suggestion</option>
								<option value="Feedback">Feedback</option>
								<option value="Issue">Issue</option>
								<option value="Others">Others</option>
								</select>
							</li>
							<li>
								<label for="commentsText">Message*</label>
								<textarea name="comments" id="commentsText" cols="60" rows="10"></textarea>
							</li>
							<li>
								<label for="spam_question">What is 9 + 8 ? (anti-spam question)</label>
								<input type="text" name="spam_question" id="spam_question" />
							</li>
							<li>
								<input type="submit" class="button black bigrounded" value="SEND MAIL" name="submit" id="btnContactSubmit" />
							</li>
						</ol>
						</fieldset>
					</form>
					
					<?php }?>
		
	</div>
	<!-- end Shell -->
</div>
<!-- end Main -->

<!-- Main-cols -->
<div id="main-cols">
	<!-- Shell -->
	<div class="shell">
		<div class="col">
			<h4>GET IN TOUCH</h4>
			<ul>
				<li>Do you have a tough business challenge, but don't know where to start? If so, you've come to the right place.</li>
			    <li>To learn more about our service offerings and industry experience, or to have a Nemesis representative contact you directly, contact us using our <span class="yellow"><a href="contact.php">email form</a>.</span></li>
			    <li><p><a href="mailto:support@nemesisindia.com">support@nemesisindia.com</a></p></li>
			</ul>
		</div>
		<div class="col">
			<h4>FOLLOW US</h4>
			<ul class="social">
			    <li><a class="facebook" href="http://www.facebook.com/pages/Nemesis-Consulting-Services/307994082556392">facebook</a></li>
			    <li><a class="twitter" href="https://twitter.com/#!/NemesisIndia">twitter</a></li>
			    <li><a class="google" href="https://plus.google.com/113348760932441494603">google</a></li>
			</ul>
		</div>
		<div class="col last">
			<p>&nbsp;</p>
			<img src="css/images/logo_bw.png" alt="Nemesis" />
			<p class="content">Nemesis Consulting Services Pvt. Ltd. is all about a tight group of highly self-motivated, business centric, technology driven individuals who collectively offer a diverse range of business as well as technology solutions.</p>
		</div>
		<div class="cl">&nbsp;</div>
	</div>
	<!-- end Shell -->
</div>
<!-- end Main-cols -->

<!-- Footer -->
<div id="footer">
	<!-- Shell -->
	<div class="shell">
		<p class="left">
			<a href="terms_of_use.html">Terms of Use</a> <span>-</span>
			<a href="privacy_policy.html">Privacy Policy</a> <span>-</span>
			<a href="about.html">About Us</a>
		</p>
		<p class="text-right"> &copy; 2011 Nemesis Consulting Services Pvt. Ltd. All Rights Reserved.</p>
	</div>
	<!-- end Shell -->
</div>
<!-- end Footer -->
</body>
</html>
