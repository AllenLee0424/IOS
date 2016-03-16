<?php
	
	/*
$host="localhost";
$db_user="root";
$db_pass="root";
*/

$host="103.43.75.242";
$db_user="admin_classense";
$db_pass="SuVDP4Mv3B";


$db_name="admin_classense";
//$db_name="clasSense";
$timezone="Australia/Adelaide";

$link=mysql_connect($host,$db_user,$db_pass);
mysql_select_db($db_name,$link);
//mysql_query("SET names UTF8");


date_default_timezone_set($timezone); 
?>