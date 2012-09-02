<?php 
//ajax_setpagesize.php

require_once 'includes/global.inc.php';
if(isset($_GET['size']))
{
	//Getting filter parameters from url
	$pagesize = $_GET['size'];
	$_SESSION['pagesize'] = $pagesize;
}

?>
