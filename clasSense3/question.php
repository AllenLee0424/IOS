

<?php
session_start();
if ($_POST && isset($_SESSION['user'])) {
	
include("connect.php");


$query = $_POST["query"];

  $studentID = $_SESSION['user'];
$topicID = $_SESSION['topic'];
$sentiment = $_POST["sentiment"];
$privatepublic = $_POST['privatepublic'];
//$date = date('Y-m-d H:i:s');

$date = $_SESSION['date'];
   
   $sql = "INSERT INTO `admin_classense`.`Posts` (`postID`, `topicID`, `studentID`, `message`, `emotion`, `commentType`, `isProcessed`, `date`) VALUES (NULL, '$topicID', '$studentID', '$query', '$sentiment', '$privatepublic', 'no', '$date');";
   
   
  
   
         
    $retval = mysql_query( $sql, $link );
    if(! $retval )
    {
     die('Could not enter data: ' . mysql_error());
    }else{
      
      $regex = "/#+([a-zA-Z0-9_]+)/";
     	preg_match_all($regex, $query, $matches);
     	$hashtag = $matches[1];
     	$hash = $hashtag[0];
$hash = strtolower($hash);
  $sql2 = "SELECT * FROM `hashtag` WHERE `hashtag` LIKE '$hash' AND `topicID` = $topicID;";
  
     $r = mysql_query($sql2);
	if(mysql_num_rows($r)>0)//id found in the table
		{
			$row = mysql_fetch_assoc($r);
   $fre = $row['frequency'];
      $fre = $fre+1;
      $r = mysql_query("UPDATE `hashtag` SET `frequency`=$fre WHERE `hashtag` LIKE '$hash';");
      
     }
     else{
	       $r = mysql_query("INSERT INTO `admin_classense`.`hashtag` (`hashtagid`, `hashtag`, `frequency`, `topicID`) VALUES (NULL, '$hash', '1', '$topicID');");
	     
     }
      
          
 }

function convertHashtags($str){
	$regex = "/#+([a-zA-Z0-9_]+)/";
	$str = preg_replace($regex, '<a href="hashtag.php?tag=$1">$0</a>', $str);
	return($str);
}


//mysqli_close($link);
}else{
	
}
?>