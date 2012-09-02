<?php 
//global.inc.php
require_once 'dbconn_info.php';
require_once 'classes/DB.class.php';
require_once 'functions.php';

// connect to the database
$db = new DB();
$db->connect($db_host,$db_user,$db_pass,$db_name);



// start the sesion
//session_start();



function convert2Mysql_time($time)
{
	$mysql_time = "";
	$temp = trim($time);
	$timepart = split(' ',$temp);
	if($timepart[1] == "PM")
	{
		$timeunits = split(":",$timepart[0]);
		$hour = $timeunits[0] + 12;
		$hour .= ":".$timeunits[1].":00";
		$mysql_time = $hour;
	}
	else
	{
		$timepart[0] .= ":00";
		$mysql_time= $timepart[0];
	}
	return $mysql_time;
}
function convert2form_time($mysql_time)
{
	$form_time = "";
	$temp = trim($mysql_time);
	$timepart = split(':',$temp);
	if($timepart[0] > 12)
	{
		$hour = $timepart[0] -12;
		$form_time = $hour.":".$timepart[1]." PM";
	}
	else
	{
		$form_time = $timepart[0].":".$timepart[1]." AM";
	}
	return $form_time;
}
function convert2Mysql_date($date)
{
	$mysql_date = "";
	$temp = trim($date);
	$datepart = split('/',$temp);
	$mysql_date = $datepart[2]."-".$datepart[0]."-".$datepart[1];
	return $mysql_date;
	
}
function convert2form_date($mysql_date)
{
	$form_date="";
	$temp = trim($mysql_date);
	$datepart = split('-',$temp);
	$form_date =  $datepart[1]."/".$datepart[2]."/".$datepart[0];
	return $form_date;
}

?>