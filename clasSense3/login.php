<?php

session_start();
require_once ('connect.php');
//if(!isset($_SESSION['user'])&& !isset($_SESSION['topic']) ){
$action = $_GET['action'];
if ($action == 'login') { 
	
	 //sign in
	$user = stripslashes(trim($_POST['user']));
	$pass = stripslashes(trim($_POST['pass']));
	
	if (empty ($user)) {
		echo 'Username could not be empty';
		exit;
	}
	if (empty ($pass)) {
		echo 'Password could not be empty';
		exit;
	}
	$md5pass = md5($pass);
	$query = mysql_query("select * from Students where studentID='$user'");

	$us = is_array($row = mysql_fetch_array($query));

	$ps = $us ? $pass == $row['password'] : FALSE;
	if ($ps) {
	
		$_SESSION['user'] = $row['studentID'];
		//$_SESSION['topic'] = $topic;
			//$_SESSION['date'] = $date;
		
			$arr['success'] = 1;
		
	
	} else {
		$arr['success'] = 0;
	    $arr['msg'] = 'Sign in fail';
	}
	echo json_encode($arr);
}
elseif ($action == 'logout') {  //sign out
	unset($_SESSION);
	session_destroy();
	echo '1';
}else if($action == 'topic'){
	$topic = $_POST['topic'];
    $date = $_POST['date'];
	$_SESSION['topic'] = $topic;
			$_SESSION['date'] = $date;
			//$arr['success'] = 1;
}








//grab the ip
function get_client_ip() {
	if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
		$ip = getenv("HTTP_CLIENT_IP");
	else
		if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
			$ip = getenv("HTTP_X_FORWARDED_FOR");
		else
			if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
				$ip = getenv("REMOTE_ADDR");
			else
				if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
					$ip = $_SERVER['REMOTE_ADDR'];
				else
					$ip = "unknown";
	return ($ip);
}
?>
