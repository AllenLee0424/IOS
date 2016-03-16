<?php 

//connect to database
$user = 'root';
$password = 'root';
$db = 'clasSense';
$host = 'localhost';
$port = 3306;



$link = mysql_connect(
   "$host:$port", 
   $user, 
   $password
);

$db_selected = mysql_select_db(
   $db, 
   $link
   );
// increment by 1
$sql ="UPDATE comment SET numLike = numLike+1 WHERE  
postID = '$postID' AND topicID = '$topicID'";

$postID = $_POST[''];
$topicID = $_POST[''];
//process query
$retval = mysql_query( $sql, $link );
if(! $retval )
{
 // die('Could not enter data: ' . mysql_error());
}
//echo "Entered data successfully\n";   
 mysqli_close($link);

 ?>