<?php
$hostname = "localhost";
$db_username = "root";
$db_password = "root";
$port = 3306;
$link = mysql_connect("$hostname:$port", $db_username, $db_password) or die("Cannot connect to the database");
mysql_select_db("clasSense") or die("Cannot select the database");


?>