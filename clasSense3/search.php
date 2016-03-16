<?php
session_start();
if ($_POST && isset($_SESSION['user'])) {
  
   require_once ('connect.php');
   
	// $db = new db();
	 
	 $word = $_POST['search'];
	 $today  = $_POST['searchtoday'];
	 //echo "<li>".$word."</li>";
    //$word = htmlentities($word);
    // $topicID = 1;
   $topicID = $_SESSION['topic'];
    $date = $_SESSION['date'];
    
    if($today == 'today'){
    $sql = "SELECT * FROM Posts where message like '%". $word . "%' and topicID= ".$topicID." AND `date` LIKE '%".$date."%';";
  }else{
	    $sql = "SELECT * FROM Posts where message like '%". $word . "%' and topicID= ".$topicID." ;";
  }
   $retval = mysql_query( $sql, $link );
   if(! $retval )
   {
    die('Could not enter data: ' . mysql_error());
   }
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
  {
   $query = $row['message'];
  $postID = $row['postID'];
  $studentID = $row['studentID'];
  //then get the name from student table using student id as foreign key 
   
  $gap = getTimeDiff($row['date']);
  $likeq = "SELECT * FROM `Likes` WHERE `postID` = $postID";
	
	$r = mysql_query($likeq);
	if(mysql_num_rows($r)>0)//id found in the table
		{
		
		
		$numLike = mysql_num_rows($r);
		
			
		}
		else{
			$numLike = 0;
			}
			
	
	$dislikeq = "SELECT * FROM `Dislikes` WHERE `postID` = $postID";
	$r2 = mysql_query($dislikeq);
	if(mysql_num_rows($r2)>0)//id found in the table
		{
		
		
		
		$numDislike = mysql_num_rows($r2);;
			
		}
		else{
			$numDislike = 0;
			}	

   // echo "<li>".$studentID.": ".$query." at ".$gap."</li>";
  
?>

<?php
	
  echo "<li><table>
  <tr>
  <td class='left'>
  <ul class='childposting' >
  <li class='postingquery'>{$query}</p></li>
  <li class='postinginfo'> posted ".$gap." by ".$studentID."</li>
  
  ";
  
  
  ?>
  <li class="commentlist"   >
   <img class='commentbtn' id='searchcomment<?php echo $postID?>' src='img/comment.png' alt='like' width='15'> 
 
<div  style="display: none" class="divcomment" id='searchdiv<?php echo $postID;?>'>
	<form action=""><input data-mini="true" type="text" > 
		<input  id='searchsubmit<?php echo $postID;?>' data-mini="true" data-inline="true" data-theme="b" class="commentsubmit" type="button"  value="submit">
		</form>
	<ul>
		
		<?php
			
			 $sql2 = " SELECT * FROM `SubComments` WHERE `postID` = $postID";
   $retval2 = mysql_query( $sql2, $link );
   
   if(! $retval2 )
   {
    die('Could not enter data: ' . mysql_error());
   }
   
  while($row2 = mysql_fetch_array($retval2, MYSQL_ASSOC))
  {
	  
  $reply = $row2['reply'];
  $replierID = $row2['studentID'];
  $replyDate = $row2['date'];
  echo "<li>".$replierID.": ".$reply." at ".$replyDate."</li>";
  }

			?>
		
		
	</ul>
</div>
  
  <?php
	  
  echo "</li>
  </ul></td>";
    
  ?>
  <td class='right'>
  <span class='votes_count' id='searchvotes_count<?php echo $postID; ?>'></span>
  
    <span class='vote_buttons' id='searchvote_buttons<?php echo $postID; ?>'>
    
  	<a href='' class='vote_up' id='search<?php echo $postID; ?>'> 
  	<img class='likebtn' src='img/like.png' alt='like' width='15'>
  	<span class='votes_count' id='searchvotes_count2<?php echo $postID; ?>'><?php echo $numLike; ?></span>
  	</a>
  	 
  	<a href='javascript:;' class='vote_down' id='search<?php echo $postID; ?>'>
  	<img src='img/dislike.png' alt='dislike' width='15'>
  		<span class='votes_count' id='searchvotes_count3<?php echo $postID; ?>'><?php echo $numDislike; ?></span>
  	</a>
  	
  </span>
  </td>
  </tr>
  <?php
  
  echo "
   </table>
  </li>
 
  ";

      
  }    
  
  
  }
else {
        echo '<li>No results found</li>';
    }
    function getTimeDiff($time2) {
		 $datetime = new DateTime($time2);
		
	$year = date('Y');
	$month = date('m');
	$day = date('d');
	$hour = date('H');
	$min = date('i');
	
	////$year2 = date('Y', $time2);
	//$month2 = date('m', $time2);
	//$day2 = date('d', $time2);
	//$min2 = date('i', $time2);
	$year2 = $datetime->format('Y');
	$month2 = $datetime->format('m');
	$day2 = $datetime->format('d');
	$hour2 = $datetime->format('H');
	$min2 = $datetime->format('i');
	$diff;
	
	
	
	if($year ==$year2){
		
		if($month==$month2){
			if($day = $day2){
				
				if($hour2==$hour){
					
					
				  if($min == $min2)
				   {
					
					$diff = "1 min ago";
					return $diff;
				   }else{
					if($min2-$min>1){
						$diff = "".$min2-$min." mins ago";
					return $diff; 
					}else{
						$diff = '1 min ago';
					return $diff; 
					}
				}
				}
				else if($hour2- $hour>1){
					
					$diff = "".$hour2-$hour." hours ago";
					return $diff; 
					
				}else{
					$diff = "1 hour ago";
					return $diff;
				}
				
			}else if ($day2-$day>1){
				
				$diff = "".$day2-$day." days ago";
					return $diff; 
				
				
			}else{
				$diff = '1 day ago';
					return $diff; 
			}
			
			
			
			
			
		}else if ($month2-$month>1){
				
				$diff = "".$month2-$month." months ago";
					return $diff; 
				
				
			}else{
				$diff = '1 month ago';
					return $diff; 
			}
		
	}else if ($year2-$year>1){
				
				$diff = "".$year2-$year." years ago";
					return $diff; 
				
				
			}else{
				$diff = '1 year ago';
					return $diff; 
			}
	
	
	}

    
    ?>