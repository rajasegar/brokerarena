<?php 
//index.php
//include required class for build nnusoap web service server
   require_once('lib/nusoap.php');
	require_once('includes/global.inc.php');
 if(isset($_POST['btnAdd']))
 {
	$userid = ($_POST['userid']);
	$type = ($_POST['type']);
	$pwd = md5($_POST['password']);
	$insert_fields = array(
		"user_id" => "'$userid'",
		"password" => "'$pwd'",
		"acct_type" => "$type",
		"login_allowed" => "1",
		"license_type" => "1",
		"lic_actv_date" => "curdate()",
		"max_days" => "10",
		"max_msgs" => "100",
		"msgs_sent" => "0"
	);
	$inserid = $db->insert($insert_fields,"license_master");
 }
  
?>
<h1>xMessenger</h1>
<?php
$result = $db->select("license_master");
echo "<table border='1'><tr><th>User</th><th>Account Type</th></tr>";
foreach($result as $row)
{
	echo "<tr>";
echo '<td>' . $row['user_id'] . '</td>';
echo '<td>' . $row['acct_type'] . '</td>';
echo "</tr>";
}

echo "</table>";
?>
<form action="" method="post">
<fieldset>
<legend>Add user</legend>
<table>
<tr><td>User</td><td><input type="text" name="userid"/></td></tr>
<tr><td>Password</td><td><input type="password" name="password"/></td></tr>
<tr><td>Type</td><td><input type="text" name="type"/></td></tr>
<tr><td>Remarks</td><td><input type="text" name="remarks"/></td></tr>
<tr><td><input type="submit" value="Add User" name="btnAdd"/></td></tr>
</table>
</fieldset>
</form>