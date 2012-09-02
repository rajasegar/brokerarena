<?php
// create_admin.php
require_once ('includes/global.inc.php');
$pwd = md5('Gmail123*');
$insert_fields = array(
	"userid" => "'admin'",
	"password" => "'$pwd'",
	"mail" => "'rajasegar.c@gmail.com'",
	"created_on" => "now()",
	"active" => "1",
	"remarks" => "'Default admin with all privileges'"
	);
$result = $db->insert($insert_fields,'admin_master');
if($result >= 0)
{
	echo "Admin user created successfully.";
}
else
{
	echo "$result : Admin user creation failed.";
}
?>