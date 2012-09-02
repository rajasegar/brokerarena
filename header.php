<?php require_once 'includes/global.inc.php';?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>BrokerArena.com - The easy way to find out the best investment brokers from the rest..</title>
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<meta name="keywords" content="broker, brokers, indian broker, indian brokers, broker india, brokers india, compare broker, compare brokers, brokerarena, broker arena, compare indian brokers,best broker, best brokers, best brokers india, compare stockbroker, compare stockbrokers, broker comparison, brokers comparison" />
		<meta name="copyright" content="Copyright 2011, by BrokerArena. All Rights Reserved by Nemesis Consulting Services Pvt Ltd." />
		<meta name="description" content="BrokerArena is a seriously fast and No-Nonsense portal to compare the services of various Investment Brokers with the things that YOU consider the most important to your investment goals." />
		<meta name="author" content="Rajasegar Chandran">
		<link href="assets/css/jquery-ui.css" rel="stylesheet">
		<link href="assets/css/bootstrap.css" rel="stylesheet">
		<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
		<link href="assets/css/zocial.css" rel="stylesheet">
		<link href="assets/css/style.css" rel="stylesheet">
		<style>
			body {
				padding-top:60px; /* 60px to make the container go all the way to the bottom of the topbar */
			}
		</style>
		<!-- HTML5 shim, for IE6-8 support for HTML5 elements -->
		<!--[if lte IE9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="shortcut icon" href="assets/ico/favicon.ico">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-26951375-1']);
		  _gaq.push(['_trackPageview']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
		<script type='text/javascript' src='https://www.google.com/jsapi'></script>
	</head>
	<body>
<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.php">BrokerArena</a>
				<div class="nav-collapse">
					<form id="search" action="search_brokers.php" class="navbar-search pull-left">
					<input type="text" name="broker_name" class="search-query span2" placeholder="Find Your Broker..." />
				</form>
					<?php include 'navigation.php';?>
				
				</div>
				
			</div>
		</div>
	</div>
