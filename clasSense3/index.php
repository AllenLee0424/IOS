<?php  
	
	session_start();
require_once ('connect.php');


if(!isset($_SESSION['user']) ){
	include('LoginPage.php');
	
	}
	else if(isset($_SESSION['user'])&& !isset($_SESSION['topic']) ){
		include('TopicSelect.php');
		}
	else{
		include('mainpage.php');
	}
	
	
	
	
	
?>