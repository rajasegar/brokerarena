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
		$where = "nBrokerID = $user->m_BrokerID";
		$update_fields = array("sPassword" => "'$pwd'");
		$result = $db->update($update_fields,"tbl_brokermaster",$where);
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
	<div class="container">
	    <div class="row">
	        <div class="span9">
	            <div class="well">
	                <h1>Change Your Password</h1>
					<form method='post' action='' onsubmit="return validateForm()">
					<table>
					<tr><td colspan="2"><?php echo $error;?></td></tr>
					<tr><td>Password:</td><td><input type='password' maxlength='16' name='txtPwd'	id="txtPwd"/></td></tr>
					<tr><td>Confirm Password:</td><td><input type='password' maxlength='16' name='txtConfirmPwd' id="txtConfirmPwd"/></td></tr>
					<tr><td colspan="2"><br/></td></tr>
					<tr><td><input type='submit' value='Change' class="btn btn-primary" name="btnChange"/>
					<input type='reset' value='Reset' class="btn" /></td></tr>
					</table>
					</form>
	            </div>
	        </div>
	        <div id="sidebar" class="span3">
	            <?php include 'sidebar.php';?>
	        </div>
	    </div>
	</div>
<?php include 'footer.php';?>
<script src="assets/js/changepwd_broker.js"></script>
