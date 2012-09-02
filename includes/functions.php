<?php

function sanitizeString($var)
{
$var = strip_tags($var);
$var = htmlentities($var);
$var = stripslashes($var);
return mysql_real_escape_string($var);
}

function destroySession()
{
$_SESSION=array();
if (session_id() != "" || isset($_COOKIE[session_name()]))
{
	setcookie(session_name(), '', time()-2592000, '/');
}
session_destroy();
}

function extract_str($str,$len)
{
	$extract = "";
	$str_len = strlen($str);
	//echo $str_len;
	$extract = substr($str,0,$len);
	//echo $extract;
	if($str_len > $len)
	{
		$extract .= "...";
	}
	return $extract;
}

function draw_rating($rated)
{
	$un_rated = 5 - $rated;
	$ratings = "";
	for($i=0;$i<$rated;$i++)
	{
		$ratings .= "<i class='icon icon-star'></i>";
	}
	for($i=0;$i<$un_rated;$i++)
	{
		$ratings .= "<i class='icon icon-star-empty'></i>";
	}
	return $ratings;
	
}

function filterOnOff($filter) {
	if(isset($_SESSION['filters'][$filter])) {
		echo "checked = \"checked\"";
	}
}

function pageLinks($totalpages, $currentpage, $pagesize,$parameter,$url="") {
	// Start at page one
	$page = 1;
	// Start at record zero
	$recordstart = 0;
	// Initialize $pageLinks
	$pageLinks = "";
	while ($page <= $totalpages) {
	// Link the page if it isn't the current one
	if ($page != $currentpage) {
		if($url == "") {
			$pageLinks .= "<li><a href=\"".$_SERVER['PHP_SELF']."?$parameter=$recordstart\">$page</a></li>";
		}
		else {
			$pageLinks .= "<li><a href=\"".$url."?$parameter=$recordstart\">$page</a></li>";
		}
	// If the current page, just list the number
	} else {
	$pageLinks .= "<li class='active'><a href='#'>$page</a></li>";
	}
	// Move to the next record delimiter
	$recordstart += $pagesize;
	$page++;
	}
	return $pageLinks;
}

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



function yes_or_no($val)
{
	//echo $val;
	$yes = "<i class='icon icon-ok'></i>";
	$no = "<i class='icon icon-remove'></i>";
	return ($val == 1)? $yes :$no;
}

function renderSingleParam($params,$values,$string_val=false) {
	$i = 0;
	$html = "";
	foreach($values as $key => $value)
	{
		$html .= "<tr>";
		$html .= "<td>".$params[$i++]."</td>";
		if($string_val == true) {
			$html .= "<td>".$values[$key]."</td>"; 
		}
		else {
			$html .= "<td>".yes_or_no($values[$key])."</td>"; 
		}
		$html .= "</tr>";
	}
	echo $html;
}

// Function to convert seconds to proper time length value like "HH:MM:SS"
function convertSecsToTime($secs) {
	$mins = floor($secs/60);
	$hours = floor($mins/60);
	$minutes = floor($mins % 60);
	$seconds = floor($secs % 60);
	$value = sprintf("%02d:%02d:%02d",$hours,$minutes,$seconds);
	return $value;
}
?>
