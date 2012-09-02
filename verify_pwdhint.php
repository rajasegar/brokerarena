<?php 
//get_pwdhint.php
require_once 'includes/global.inc.php';
if(isset($_GET['id']) && isset($_GET['type']))
{
	$user_id = $_GET['id'];
	$type = $_GET['type'];
	$hint = md5($_GET['hint']);
	$tablename = $where = "";
	$where = "sUserName = '$user_id' and sSecretAnswer='$hint'";
	if($type == 0)
	{
		$tablename = "tbl_brokermaster";
		
	}
	else
	{
		$tablename = "tbl_usermaster";
	}
	
	/*$data = array();
		$data["status"] = "success";
		$data["url"] = "change_pwd.php?id=$user_id&type=$type&hint=$hint";
			
		echo json_encode($data);*/
	$result = $db->select($tablename,$where);
	$data = array();
	if($result)
	{
		$encoded_id = base64_encode($user_id);
		$data["status"] = "success";
		$data["url"] = "changepwd.php?id=$encoded_id&type=$type";
			
		echo json_encode($data);
	}
	else
	{
		$data = array("status" => "failure",
					"message" => "Invalid credentials provided. Please contact the system admin for assistance.!!");
		echo json_encode($data);
	}
}


?>