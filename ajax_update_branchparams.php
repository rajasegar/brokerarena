<?php 
//ajax_update_branchparams.php
require_once 'includes/global.inc.php';
if(isset($_SESSION['user']))
{
	$user = unserialize($_SESSION["user"]);
	$own = $_POST['txtOwnBranches'];
	$franch = $_POST['txtFranchiseeBranches'];
	$params = array();
	array_push($params,$own);
	array_push($params,$franch);
	
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