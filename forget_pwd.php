<?php include 'header.php';?>
	<div class="container">
	    <div class="row">
	        <div class="span9">
	            <div class="well">
	                <h1>Forgot Your Password?</h1>
					<p>No worries, you can change it instantly now! But before that we need some info about you...</p>
					<div id="info"></div>
					<div id="divLoginInfo">
						<form id="frmLoginInfo">
						<fieldset>
						<legend>Provide Login details</legend>
						<table>
						<tr><td>User ID:</td><td><input type='text'  name='id'	id="txtUserId"/></td></tr>
						<tr><td>Login-Type:</td>
						<td>
						<input type="radio" name="type" value="0"/>Broker
						<input type="radio" name="type" value="1" checked="checked"/>User
						</tr>
						<tr><td><input type='button' value='Get Password Hint' class="btn btn-primary" name="btnGetPwdHint" id="btnGetPwdHint"/></td>
						<td><input type='reset' value='Reset' class="btn" /></td></tr>
						</table>
						</fieldset>
						</form>
					</div>
					<div id="divPwdHint">
					<form class="block" id="frmPwdHint">
					<fieldset>
					<legend>Password Hint</legend>
					<ol>
					<li>
					Secret Question:
					<label id="lblSecretQuestion" ></label>
					</li>
					<li>
					<p><span class="hint">Answer: Provide the answer to your secret question given at the time of registration.</span></p>
					<input type="password" id="hint" name="hint"/>
					</li>
					</ol>
					<input type="button" value="Verify"  name="btnVerifyHint" id="btnVerifyHint" class="btn btn-primary"/>
   				    <input type="button" value="Cancel"  class="btn" />
					</fieldset>
					</form>
					</div>
					
					<div id="divChangePwd">
					<fieldset>
					<legend>Change Password</legend>
					<fieldset class="noborder">
					<label for="txtNewPassword">New Password:</label>
					<input type="password" id="txtNewPassword" onkeyup="checkPassword(this);" />
					<span class="hint">
					The password can be any combination of characters, and must be at least 8 characters in length.  10 characters recommended!
					</span>
					</fieldset>
					<fieldset class="noborder">
					<label for="txtConfirmPassword">Confirm Password:</label>
					<input type="password" id="txtConfirmPassword" onkeyup="checkPassword(this);" />
					<span class="hint">
					The password can be any combination of characters, and must be at least 8 characters in length.  10 characters recommended!
					</span>
					</fieldset>

					</fieldset>
					<fieldset class="submit">
					<input type="button" name="btnSubmit" value="Change Password" class="btn btn-primary" onclick="return submitform()" />
					<input type="reset" value="Reset" class="btn" />
					</fieldset>
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
	$('#divPwdHint').hide();
	$('#divChangePwd').hide();
	$('#btnGetPwdHint').click(function() {
		if(validateForm())
		{
			var request_url = "get_pwdhint.php?" + $('#frmLoginInfo').serialize();
			$.ajax( 
			{ 
				url: "get_pwdhint.php", 
				data: $('#frmLoginInfo').serialize(),
				dataType: 'json',
				success: 
					function(data) 
					{
						if(data.status == "success")
						{
							$('#divPwdHint').show();
							$('#divLoginInfo').hide();
							$('#lblSecretQuestion').html(data.hint);
						}
						else
						{
							$("div#info").empty()
								.append(data.message)
								.addClass("msg_warning");
						}
						
						
					}, 
				error: 
					function() 
					{ 
						$("div#info").append("An error occured during processing")
							.addClass("msg_error"); 
					} 
			}); 
			
			
		}
	});
	
	$('#btnVerifyHint').click(function() {
		if(validateHint())
		{
			var request_url = "get_pwdhint.php?" + $('#frmLoginInfo').serialize() + $('#frmPwdHint').serialize();
			//alert(request_url);
			$.ajax( 
			{ 
				url: "verify_pwdhint.php", 
				data: $('#frmLoginInfo').serialize() + "&" + $('#frmPwdHint').serialize(),
				dataType: 'json',
				success: 
					function(data) 
					{
						if(data.status == "success")
						{
							$('#divPwdHint').hide();
							$("div#info").empty()
								.append("Thank you, Login details verified successfully, please click below to change your password<br/>")
								.append("<a href='" + data.url + "'>Click here to change password</a>")
								.removeClass("msg_warning")
								.addClass("msg_success");
							
						}
						else
						{
							$("div#info").empty()
								.append(data.message)
								.removeClass("msg_success")
								.addClass("msg_warning");
						}
						
						
					}, 
				error: 
					function() 
					{ 
						$("div#info").append("An error occured during processing")
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
	
	
	// Password
	if($('#txtUserId').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('UserID should not be empty.')
				   .insertAfter('#txtUserId');
		$('#txtUserId').addClass('reqField')
					.focus();
		return false;
	}
	return true;
}

function validateHint()
{
	$('input').removeClass('reqField');
	$('div.msg_validation').remove();
	
	
	// Password hint
	if($('#txtAnswer').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Password Hint should not be empty.')
				   .insertAfter('#txtAnswer');
		$('#txtAnswer').addClass('reqField')
					.focus();
		return false;
	}
	return true;

}
</script>
