<?php
	session_start();
include("connect.php");
$id = $_POST['id'];
$action = $_POST['action'];
if(isset($_SESSION['user'])){
$studentID = $_SESSION['user'];
}


$query = "SELECT * FROM `Likes` WHERE `postID` = $id AND `studentID` LIKE '$studentID'";

 $retval = mysql_query( $query, $link );
$query2 = "SELECT * FROM `Dislikes` WHERE `postID` = $id AND `studentID` LIKE '$studentID'";
$retval2 = mysql_query( $query2, $link );
//ok, now update the votes
if(! $retval )
   {
     die('Could not get data: ' . mysql_error());
   }
   else {
    
if(mysql_num_rows($retval)==0 && mysql_num_rows($retval2)==0){   

if($action=='vote_up') //voting up
{
	//$votes_up = $cur_votes[0]+1;
	//$q = "INSERT INTO `admin_classense`.`Likes` (`postID`, `studentID`) VALUES ('1', 'bru001');";
	$q = "INSERT INTO `admin_classense`.`Likes` (`postID`, `studentID`) VALUES ('$id', '$studentID');";
	//$q = "UPDATE comment SET numLike = $votes_up WHERE commentID = $id";
}
elseif($action=='vote_down') //voting down
{
	//$votes_down = $cur_votes[1]+1;
	$q = "INSERT INTO `admin_classense`.`Dislikes` (`postID`, `studentID`) VALUES ('$id', '$studentID');";
	//$q = "UPDATE comment SET numDislike = $votes_down WHERE commentID = $id";
}

$r = mysql_query($q);
if($r) //voting done
	{
	if($action=='vote_up') {
	/*echo "<span class='vote_buttons' >
<img class='likebtn' src='img/like.png' alt='like' width='15'>
  	<span class='votes_count' >$votes_up</span><img src='img/dislike.png' alt='dislike' width='15'>
  		<span class='votes_count' >$cur_votes[1]</span></span>"; */
	//
echo 1;
	}else if($action=='vote_down'){
		//echo "DisLiked";
		echo 1;
	}
	
	//$effectiveVote = getEffectiveVotes($id);
	//echo $effectiveVote." votes";
	//DELETE FROM `Likes` WHERE `studentID`='' and `postID` = '';
	}
elseif(!$r) //voting failed
	{
	echo "Failed!";
	}
	}else {
		if($action=='vote_up') {
	if(mysql_num_rows($retval)!=0){
	$q = 	"DELETE FROM `Likes` WHERE `studentID` = '$studentID' and `postID` = '$id'";
		$r = mysql_query( $q, $link );
		if($r)
echo 2;
}
	}else if($action=='vote_down'){
		//echo "DisLiked";
	
		if(mysql_num_rows($retval2)!=0){
		
		$q = 	"DELETE FROM `Dislikes` WHERE `studentID` = '$studentID' and `postID` = '$id'";
		$r = mysql_query( $q, $link );
		if($r)
		echo 3;
		
		}
	}
	}
	}
	?>