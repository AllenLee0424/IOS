<?php
	
session_start();
if ($_POST && isset($_SESSION['user'])) {
	
	
	$topic = $_POST["topic"];
	
	$_SESSION['topic'] = $topic;
	
	}	
	
?>