<?php 
//global.inc.php

require_once 'dbconn_info.php';
require_once 'ga_credentials.php';
require_once 'classes/DB.class.php';
require_once 'classes/Broker.class.php';
require_once 'classes/User.class.php';
require_once 'classes/UserTools.class.php';
require_once 'classes/gapi.class.php';
require_once 'functions.php';

// connect to the database
$db = new DB($db_host,$db_user,$db_pass,$db_name);
$db->connect();

// initialize UserTools object
$userTools = new UserTools($db);

// start the sesion
session_start();

?>
