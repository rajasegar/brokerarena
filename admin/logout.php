<?php
// logout.php
ob_start();
require_once 'includes/global.inc.php';
echo "<h3>Log out</h3>";
if (isset($_SESSION['admin']))
{
destroySession();
echo "You have been logged out. Please <a href='index.php'>click here</a> to refresh the screen.";
//header("Location:index.php");
}
else echo "You are not logged in";
ob_end_flush();
?>