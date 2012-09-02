<?php 
//ajax_setorderby.php

require_once 'includes/global.inc.php';
if(isset($_GET['orderby']))
{
	//Getting filter parameters from url
	$order = $_GET['orderby'];
	$_SESSION['orderby'] = $order;
}

?>
