<?php 
//ajax_userid_available.php
require_once 'includes/global.inc.php';
if(isset($_POST['id']))
{
	$user_id = sanitizeString($_POST['id']);
	$type = sanitizeString($_POST['type']);
	$where ="sUserName = '$user_id'";
	if($type == 1)
	{
		$tablename = "tbl_usermaster";
	}
	else
	{
		$tablename = "tbl_brokermaster";
	}
	
	$result = $db->select($tablename,$where);
	
	if($result)
	{
		echo "<font color=red>&nbsp;&larr;Sorry, already taken</font>";
	}
	else
	{
		echo "<font color=green>&nbsp;&larr;Username available</font>";
	}
}
?>