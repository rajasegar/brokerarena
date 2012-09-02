<ul class="nav">
	<li><a href="http://brokerarena.com">BrokerArena</a></li>
</ul>
<?php
if (isset($_SESSION['admin'])) {
	?>
<p class="navbar-text pull-right">Logged in as <a href="admin.php">admin</a> | <a href="logout.php">Logout</a></p>
<?php 
}
?>
