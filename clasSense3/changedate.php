<?php
	
session_start();
if ($_POST && isset($_SESSION['user'])) {
	
	
	$date = $_POST["date"];
	
	$_SESSION['date'] = $date;
	
	}	
	
?>