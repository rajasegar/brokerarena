<?php 
//get_pwdhint.php
require_once 'includes/global.inc.php';
if(isset($_GET['id']) && isset($_GET['type']))
{
	$user_id = $_GET['id'];
	$type = $_GET['type'];
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
	$result = $db->select($tablename,$where);
	$data = array();
	if($result)
	{
		$data["status"] = "success";
		$data["hint"] = $result['sSecretQuestion'];
		$data["answer"] = $result['sSecretAnswer'];
			
		echo json_encode($data);
	}
	else
	{
		$data = array("status" => "failure",
					"message" => "The given UserID is not registered / available in the database.Kindly register yourself first!!");
		echo json_encode($data);
	}
}


?>