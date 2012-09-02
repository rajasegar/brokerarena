<?php include 'header.php';?>
<?php
$user_id = $type = $error = "";
if(isset($_GET['id']) && isset($_GET['type']) )
{
	$user_id = base64_decode($_GET['id']);
	$type = $_GET['type'];
}
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
		$tablename = $where = "";
		$where = "sUserName = '$user_id'";
		if($type == 0)
		{
			$tablename = "tbl_brokermaster";
			
		}
		else
		{
			$tablename = "tbl_usermaster";
		}
		
		$update_fields = array("sPassword" => "'$pwd'");
		$result = $db->update($update_fields,$tablename,$where);
		if($result)
		{
			//$error = "<div class='msg_success'>Password successfully updated.</div>";
		}
		else
		{
			$error = "<div class='msg_error'>Database update failed! Please try again.</div>";
		}
		
	}
}
?>
	<div class="container">
	    <div class="row">
	        <div class="span9">
	            <div class="well">
	                <h1>Change Your Password</h1>
					<?php if(isset($result) && $result == true) { ?>
						<div class='msg_success'>Password successfully updated. You can login with your new password.</div>
					<?php } else { ?>
					<form method='post' action='' onsubmit="return validateForm()">
					<table>
					<tr><td colspan="2"><?php echo $error;?></td></tr>
					<tr><td>User ID:</td><td><?php echo $user_id; ?></td></tr>
					<tr><td>Password:</td><td><input type='password' maxlength='16' name='txtPwd'	id="txtPwd"/></td></tr>
					<tr><td>Confirm Password:</td><td><input type='password' maxlength='16' name='txtConfirmPwd' id="txtConfirmPwd"/></td></tr>
					<tr><td colspan="2"><br/></td></tr>
					<tr><td><input type='submit' value='Change' class="button medium green" name="btnChange"/></td>
					<td><input type='reset' value='Reset' class="button medium red" /></td></tr>
					</table>
					</form>
					<?php } ?>
	            </div>
	        </div>
	        <div id="sidebar" class="span3">
	            <?php include 'sidebar.php';?>
	        </div>
	    </div>
	</div>
<?php include 'footer.php';?>
<script src="assets/js/changepwd.js"></script>
