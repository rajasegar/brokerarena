<?php
require_once 'includes/global.inc.php';
$emailSent = "";
$emailFrom = "admin@brokerarena.com";
$emailTo = "admin@brokerarena.com";
if(isset($_POST['submit']))
{
	$name = sanitizeString($_POST['contactName']);
	$email = sanitizeString($_POST['email']);
	$category = $_POST['category'];
	$comments = sanitizeString($_POST['comments']);
	
	// Add to the feedback database
	$insert_fields = array(
		"name" => "'$name'",
		"email" => "'$email'",
		"category" => "$category",
		"remarks" => "'$comments'");
		
	$db->insert($insert_fields,"tbl_feedbacks");
	
	// Send mail
    $subject = '[Broker Arena] From '.$name;
    $body = "Name: $name \n\nEmail: $email \n\nCategory: $category \n\nComments: $comments";
    $headers = 'From: '.$name.' <'.$emailFrom.'>' . "\r\n" . 'Reply-To: ' . $email;
    mail($emailTo, $subject, $body, $headers);
    $emailSent = true;
	
	// send auto-reply
	$subject = '[Broker Arena] Thanks for contacting... ';
    $body = "Dear: $name \n\n Regards from BrokerArena Team \n\n Thanks for contacting BrokerArena, we will get back to you as soon as possible and promise to take immediate measures on the issues/suggestions/feeback mentioned by you.";
    $headers = 'From: Administrator <'.$emailFrom.'>' . "\r\n" . 'Reply-To: ' . $emailTo;
    mail($email, $subject, $body, $headers);
    
    
	
}
?>
<?php include 'header.php';?>
	<div class="container">
	    <div class="row">
	        <div class="span8">
	            <div class="well">
	                <h1>Contact Us!</h1>
					<h4>We do appreciate your feedback</h4>
					<p>We will be glad to receive an email from you if</p>
					<ul>
					<li><strong>You have found a mistake in the broker specifications.</strong></li>
					<li><strong>You have info about a broker, which we don't have in our database.</strong></li>
					<li><strong>You have found a broken link.</strong></li>
					<li><strong>You have a suggestion on improving BrokerArena.com or you want to request a feature.</strong></li>
					</ul>
					<p>Before sending us an email, please read the following.</p>
					<ul>
					<li><strong>We do not sell brokerage services.</strong></li>
					<li><strong>We don't answer "Which broker should you recommend to?" questions.</strong></li>
					</ul>
					<?php if(isset($emailSent) && $emailSent == true) { ?>
                        <div class="alert alert-success">Thanks, your email was sent successfully.</div>
                    <?php } else { ?>
                    <?php if(isset($hasError) || isset($captchaError)) { ?>
                        <div class="alert alert-error">Sorry, an error occured.</div>
                    <?php } ?>
					<p>Make sure you enter the * required information where indicated. </p>
					<form action="" id="contactForm" method="post" onsubmit="return validateContactForm()" class="block">
						<fieldset>
						<ol class="unstyled">
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
								<option value="0">Issue</option>
								<option value="1">Requirement</option>
								<option value="2">Suggestion</option>
								<option value="3">Feedback</option>
								<option value="4">Others</option>
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
								<input type="submit" class="btn btn-primary" value="Send email" name="submit" id="btnContactSubmit" />
							</li>
						</ol>
						</fieldset>
					</form>
					<?php }?>
	            </div>
	        </div>
	        <div id="sidebar" class="span4">
	            <?php include 'sidebar.php';?>
	        </div>
	    </div>
	</div>
<?php include 'footer.php';?>
<script type="text/javascript">
$(document).ready(function() {

});
function validateContactForm()
{
	$('input').removeClass('reqField');
	$('div.msg_validation').remove();
	
	// Name
	if($('#contactName').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Name should not be empty.')
				   .insertAfter('#contactName');
		$('#contactName').addClass('reqField')
					.focus();
		return false;
	}
	
	// Email empty validation
	if($('#email').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('E-mail Id should not be empty.')
				   .insertAfter('#email');
		$('#email').addClass('reqField')
						  .focus();
		return false;
	}
	// Email format validation
	if ($('#email').val() != '' && !/.+@.+\.[a-zA-Z]{2,4}$/.test($('#email').val()))
	{
		$('<div/>').addClass('msg_validation')
				   .html('Please use proper e-mail format (e.g.joe@example.com')
				   .insertAfter('#email');
		$('#email').addClass('reqField')
						  .focus();
		return false;
	}
	
	// Comments
	if($('#commentsText').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Comments should not be empty.')
				   .insertAfter('#commentsText');
		$('#commentsText').addClass('reqField')
					.focus();
		return false;
	}
	
	// spam question
	if($('#spam_question').val() != '17')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Wrong answer! Please provide the correct answer to send email.')
				   .insertAfter('#spam_question');
		$('#spam_question').addClass('reqField')
					.focus();
		return false;
	}
	
	return true;
}
</script>
