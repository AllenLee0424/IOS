<?php
	session_start();
include("connect.php");

function getAllVotes($id)
	{
	/**
	Returns an array whose first element is votes_up and the second one is votes_down
	**/
	$votes = array();
	
	/*
	$likeq = "SELECT * FROM `Likes` WHERE `postID` = $id";
	
	$r = mysql_query($likeq);
	if(mysql_num_rows($r)>0)//id found in the table
		{
		
		
		$votes[0] = mysql_num_rows($r);
		
			
		}
		else{
			$votes[0] = 0;
			}
			
	
	$dislikeq = "SELECT * FROM `Dislikes` WHERE `postID` = $id";
	$r2 = mysql_query($dislikeq);
	if(mysql_num_rows($r2)>0)//id found in the table
		{
		
		
		
		$votes[1] = mysql_num_rows($r2);;
			
		}
		else{
			$votes[1] = 0;
			}		
			
			
	return $votes;
	}
	*/
	$q = "SELECT * FROM comment WHERE commentID = $id";
	$r = mysql_query($q);
	if(mysql_num_rows($r)==1)//id found in the table
		{
		$row = mysql_fetch_assoc($r);
		
		$votes[0] = $row['numLike'];
		$votes[1] = $row['numDislike'];
			
		}
	return $votes;
	}

function getEffectiveVotes($id)
	{
	/**
	Returns an integer
	**/
	$votes = getAllVotes($id);
	$effectiveVote = $votes[0] - $votes[1];
	return $effectiveVote;
	}

$id = $_POST['id'];
$action = $_POST['action'];
$studentID = $_SESSION['user'];
//get the current votes
$cur_votes = getAllVotes($id);

//ok, now update the votes

if($action=='vote_up') //voting up
{
	$votes_up = $cur_votes[0]+1;
	//$q = "INSERT INTO `admin_classense`.`Likes` (`postID`, `studentID`) VALUES ('$id', '$studentID');"
	$q = "UPDATE comment SET numLike = $votes_up WHERE commentID = $id";
}
elseif($action=='vote_down') //voting down
{
	$votes_down = $cur_votes[1]+1;
	//$q = "INSERT INTO `admin_classense`.`Dislikes` (`postID`, `studentID`) VALUES ('$id', '$studentID');"
	$q = "UPDATE comment SET numDislike = $votes_down WHERE commentID = $id";
}

$r = mysql_query($q);
if($r) //voting done
	{
	if($action=='vote_up') {
	/*echo "<span class='vote_buttons' >
<img class='likebtn' src='img/like.png' alt='like' width='15'>
  	<span class='votes_count' >$votes_up</span><img src='img/dislike.png' alt='dislike' width='15'>
  		<span class='votes_count' >$cur_votes[1]</span></span>"; */
	echo "Liked";
	}else if($action=='vote_down'){
		echo "DisLiked";
	}
	
	//$effectiveVote = getEffectiveVotes($id);
	//echo $effectiveVote." votes";
	}
elseif(!$r) //voting failed
	{
	echo "Failed!";
	}
?>