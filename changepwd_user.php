<?php include 'header.php';?>
<?php
$error =  "";
if (isset($_POST['btnChange']))
{
	$pwd = md5(sanitizeString($_POST['txtPwd']));
	$confirm = md5(sanitizeString($_POST['txtConfirmPwd']));
	if ($pwd == "" || $confirm == "")
	{
		$error = "Not all fields were entered<br />";
	}
	else
	{
		$where = "sUserName = '$user->m_UserID'";
		$update_fields = array("sPassword" => "'$pwd'");
		$result = $db->update($update_fields,"tbl_usermaster",$where);
		if($result)
		{
			$error = "<div class='msg_success'>Password successfully updated.></div>";
		}
		else
		{
			$error = "<div class='msg_error'>Database update failed! Please try again.></div>";
		}
		
	}
}
?>
	<div id="content_wrap">
	    <div id="content" class="container_12 clearfix">
	        <div class="grid_9">
	            <div class="box">
	                <h1>Change Your Password</h1>
					<form method='post' action='' onsubmit="return validateForm()">
					<table>
					<tr><td colspan="2"><?php echo $error;?></td></tr>
					<tr><td>Password:</td><td><input type='password' maxlength='16' name='txtPwd'	id="txtPwd"/></td></tr>
					<tr><td>Confirm Password:</td><td><input type='password' maxlength='16' name='txtConfirmPwd' id="txtConfirmPwd"/></td></tr>
					<tr><td colspan="2"><br/></td></tr>
					<tr><td><input type='submit' value='Change' class="button medium green" name="btnChange"/></td>
					<td><input type='reset' value='Reset' class="button medium red" /></td></tr>
					</table>
					</form>
	            </div>
	        </div>
	        <div id="sidebar" class="grid_3">
	            <?php include 'sidebar.php';?>
	        </div>
	    </div>
	</div>
<?php include 'footer.php';?>
<script type="text/javascript">
function validateForm()
{
	$('input').removeClass('reqField');
	$('div.msg_validation').remove();
	
	// Password
	if($('#txtPwd').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Password should not be empty.')
				   .insertAfter('#txtPwd');
		$('#txtPwd').addClass('reqField')
					.focus();
		return false;
	}
	
	// Password
	if($('#txtPwd').val().length < 6)
	{
		$('<div/>').addClass('msg_validation')
				   .html('Password should be minimum 6 characters in size.')
				   .insertAfter('#txtPwd');
		$('#txtPwd').addClass('reqField')
					.focus();
		return false;
	}
	
	// Confirm Password
	if($('#txtConfirmPwd').val() == '')
	{
		$('<div/>').addClass('msg_validation')
				   .html('Confirm Password should not be empty.')
				   .insertAfter('#txtConfirmPwd');
		$('#txtConfirmPwd').addClass('reqField')
					.focus();
		return false;
	}
	
	// Password match
	if($('#txtPwd').val() != $('#txtConfirmPwd').val())
	{
		$('<div/>').addClass('msg_validation')
				   .html('Password do not match. Please re-enter.')
				   .insertAfter('#txtConfirmPwd');
		$('#txtConfirmPwd').addClass('reqField')
					.focus();
		return false;
	}
	return true;
}
</script>