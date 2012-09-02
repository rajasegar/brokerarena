<?php
require_once 'includes/global.inc.php';
$info = "";
if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$user = $userTools->getUser($id);
}
if(isset($_POST['btnSubmit']))
{
	$firstname = sanitizeString($_POST['txtFirstName']);
	$lastname = sanitizeString($_POST['txtLastName']);
	$mail = sanitizeString($_POST['txtEmail']);
		
	$update_fields = array(
				"sFirstName" => "'$firstname'",
				"sLastName" => "'$lastname'",
				"sMailID" => "'$mail'",
				"dtModified" => "curdate()");
	$where = "sUserName = '$user->m_UserID'";
	$result = $db->update($update_fields,'tbl_usermaster',$where);
	if($result)
	{
		$info = "<div class='msg_info'><p>";
		$info .= "Your profile information have been updated successfully.</p></div>";
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
	                <h1>Update User Infomation</h1>
					<?php if($info != "") {	echo $info;} ?>
					<form action="" method="post" enctype="multipart/form-data">
					</fieldset>
					<fieldset>
					<legend>User Details</legend>
					<table>
					<tr>
					<td class="form_label">First Name:</td>
					<td><input type="text" name="txtFirstName" id="txtFirstName" value="<?php echo $user->m_FirstName;?>"/></td>
					</tr>
					<tr>
					<td class="form_label">Last Name:</td>
					<td><input type="text" name="txtLastName" id="txtLastName" value="<?php echo $user->m_LastName;?>"/></td>
					</tr>
					<tr>
					<td class="form_label">E-mail:</td>
					<td><input type="text" name="txtEmail" id="txtEmail" value="<?php echo $user->m_MailID;?>"/></td>
					</tr>
					<tr>
					<td class="form_label">Profile Picture:</td>
					<td><input type="file" name="filelogo" id="filelogo" size="14" maxlength="32"/></td>
					</tr>
					<tr><td colspan="2" class="hints">
					* Your profile picture must be:<br/>
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
