<?php
	session_start();
	if ($_POST) {

   include("connect.php");

   
	// $db = new db();
	 $topicID = $_SESSION['topic'];

	 $reply = $_POST['comment'];
	 $postID = $_POST['id'];
	 $studentID = $_SESSION['user'];
	 $date = date('Y-m-d H:i:s');
	// echo "<li>".$reply."</li>";
    //$word = htmlentities($word);
  // echo $id;
    $sql = "INSERT INTO `admin_classense`.`SubComments` (`reply`, `postID`, `studentID`, `date`) VALUES ('".$reply."', '".$postID."', '".$studentID."', '".$date."')";
    //$sql = "INSERT INTO `clasSense`.`subcomment` (`comment`, `commentID`, `subcommentID`) VALUES ('".$comment."', '".$id."', NULL);";
      $retval = mysql_query( $sql, $link );
      
   if(! $retval )
   {
	   echo $sql;
    die('Could not enter data: ' . mysql_error());
   }
   else{
	   
	  // echo "<li>".$reply."</li>";
	    echo "<li>".$studentID.": ".$reply. " at ".$date."</li>";
   }  
  
   
}
else {
        echo '<li>No results found</li>';
    }

	
	
	
	
	
	
	
	
	
	
	?>
	