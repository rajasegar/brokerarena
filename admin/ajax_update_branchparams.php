<?php 
//ajax_update_branchparams.php
require_once 'includes/global.inc.php';
if(isset($_SESSION['broker_id']))
{
	$id = $_SESSION['broker_id'];
	$user = $userTools->getBroker($id);
	$own = $_POST['txtOwnBranches'];
	$franch = $_POST['txtFranchiseeBranches'];
	$blist = $_POST['txtBranchesList'];
	$fblist = $_POST['txtFranchiseeList'];
	$params = array();
	array_push($params,$own);
	array_push($params,$franch);
	array_push($params,$blist);
	array_push($params,$fblist);
	
	//print_r($params);
	$result = $user->setBranchParameters($params);
	
	if($result)
	{
		echo  "Branch parameters successfully updated";
		
	}
	else
	{
		echo "Database update failed";
		
	}
}

?>
