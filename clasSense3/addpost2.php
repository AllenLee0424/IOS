<?php
session_start();
include("connect.php");



$topicID = $_SESSION['topic'];
$date = $_SESSION['date'];

if ($date != null) {
    $sql = "SELECT * FROM Posts where topicID = '$topicID' AND `date` LIKE '%$date%' ORDER BY postID DESC;";

    $retval = mysql_query($sql, $link);
    if (!$retval) {
        die('Could not enter data: ' . mysql_error());
    }
    echo "<ul   class='postinglist' data-filter='true' data-input='#myFilter'>";
    if (!isset($_POST['popular'])) {


        while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {


            $query = $row['message'];
            $postID = $row['postID'];
            $studentID = $row['studentID'];
            //then get the name from student table using student id as foreign key 

            $gap = getTimeDiff($row['date']);

            $likeq = "SELECT * FROM `Likes` WHERE `postID` = $postID";

            $r = mysql_query($likeq);
            if (mysql_num_rows($r) > 0) {//id found in the table


                $numLike = mysql_num_rows($r);
            } else {
                $numLike = 0;
            }


            $dislikeq = "SELECT * FROM `Dislikes` WHERE `postID` = $postID";
            $r2 = mysql_query($dislikeq);
            if (mysql_num_rows($r2) > 0) {//id found in the table



                $numDislike = mysql_num_rows($r2);
                ;
            } else {
                $numDislike = 0;
            }
            $query = convertHashtags($query);
            echo "<li><table>
  <tr>
  <td class='left'>
  <ul class='childposting' >
  <li class='postingquery '>$query</li>
  <li class='postinginfo'> posted " . $gap . " by " . $studentID . "</li>
  
  ";
            
            ?>
            <li class="commentlist"   >
                <img class='commentbtn' id = 'comment<?php echo $postID ?>' src='img/comment.png' alt='like' width='15'> 

                <div  style="display: none" class="divcomment" id='div<?php echo $postID; ?>'>
                    <form action=""><input data-mini="true" type="text" > 
                        <input  id='submit<?php echo $postID; ?>' data-mini="true" data-inline="true" data-theme="b" class="commentsubmit" type="button"  value="submit">
                    </form>
                    <ul>

            <?php
            $sql2 = " SELECT * FROM `SubComments` WHERE `postID` = $postID";
            $retval2 = mysql_query($sql2, $link);

            if (!$retval2) {
                die('Could not enter data: ' . mysql_error());
            }

            while ($row2 = mysql_fetch_array($retval2, MYSQL_ASSOC)) {

                $reply = $row2['reply'];
                $replierID = $row2['studentID'];
                $replyDate = $row2['date'];
                echo "<li>" . $replierID . ": " . $reply . " at " . $replyDate . "</li>";
            }
            ?>


                    </ul>
                </div>

                        <?php
                        echo "</li>
  </ul></td>";
                        ?>
            <td class='right'>
                <span class='votes_count' id='votes_count<?php echo $postID; ?>'></span>

                <span class='vote_buttons' id='vote_buttons<?php echo $postID; ?>'>

                    <a href='' class='vote_up' id='<?php echo $postID; ?>'> 
                        <img class='likebtn' src='img/like.png' alt='like' width='15'>
                        <span class='votes_count' id='votes_count2<?php echo $postID; ?>'><?php echo $numLike; ?></span>
                    </a>

                    <a href='javascript:;' class='vote_down' id='<?php echo $postID; ?>'>
                        <img src='img/dislike.png' alt='dislike' width='15'>
                        <span class='votes_count' id='votes_count3<?php echo $postID; ?>'><?php echo $numDislike; ?></span>
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



        echo "</ul>";
    }
    //that means it gonna get the popular post
    else {
        $popularArray = [];
        while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {

            $query = $row['message'];
            $postID = $row['postID'];
            $studentID = $row['studentID'];
            //then get the name from student table using student id as foreign key 

            $gap = getTimeDiff($row['date']);

            $likeq = "SELECT * FROM `Likes` WHERE `postID` = $postID";

            $r = mysql_query($likeq);
            if (mysql_num_rows($r) > 0) {//id found in the table


                $numLike = mysql_num_rows($r);
            } else {
                $numLike = 0;
            }

            $thisdate = $row['date'];
            $dislikeq = "SELECT * FROM `Dislikes` WHERE `postID` = $postID";
            $r2 = mysql_query($dislikeq);
            if (mysql_num_rows($r2) > 0) {//id found in the table



                $numDislike = mysql_num_rows($r2);
                ;
            } else {
                $numDislike = 0;
            }
            $query = convertHashtags($query);
            $regex = "/#+([a-zA-Z0-9_]+)/";
            preg_match_all($regex, $query, $matches);
            $hashtag = $matches[1];
            $obj = (object) array('message' => $query, 'postID' => $postID, 'numlike' => $numLike, 'numDislike' => $numDislike, 'studentID' => $studentID, 'date' => $thisdate);
            $popularArray[] = $obj;
        }

        function cmp($a, $b) {

            $epoch = new DateTime("2015-07-01 00:00:00.000000");

            $diffa = date_diff(new DateTime($a->date), $epoch, true);
            $diffb = date_diff(new DateTime($b->date), $epoch, true);
            $gapa = (($diffa->y * 365.25 + $diffa->m * 30 + $diffa->d) * 24 + $diffa->h) * 60 + $diffa->i + $diffa->s / 60;
            $gapb = (($diffb->y * 365.25 + $diffb->m * 30 + $diffb->d) * 24 + $diffb->h) * 60 + $diffb->i + $diffb->s / 60;
            //	return $gapb - $gapa;
            return ($b->numlike + $gapb) - ($a->numlike + $gapa);
            //return $b->numlike -  $a->numlike;
            //return number like *
        }

        usort($popularArray, "cmp");

        foreach ($popularArray as &$value) {
            $query = $value->message;
            $postID = $value->postID;
            $numLike = $value->numlike;
            $numDislike = $value->numDislike;
            $studentID = $value->studentID;
            echo "<li><table>
  <tr>
  <td class='left'>
  <ul class='childposting' >
  <li class='postingquery'>$query</li>
  <li class='postinginfo'> posted " . $gap . " by " . $studentID . "</li>
  
  ";
            ?>
            <li class="commentlist"   >
                <img class='commentbtn' id = 'comment<?php echo $postID ?>' src='img/comment.png' alt='like' width='15'> 

                <div  style="display: none" class="divcomment" id='div<?php echo $postID; ?>'>
                    <form action=""><input data-mini="true" type="text" > 
                        <input  id='submit<?php echo $postID; ?>' data-mini="true" data-inline="true" data-theme="b" class="commentsubmit" type="button"  value="submit">
                    </form>
                    <ul>

            <?php
            $sql2 = " SELECT * FROM `SubComments` WHERE `postID` = $postID  ";
            $retval2 = mysql_query($sql2, $link);

            if (!$retval2) {
                die('Could not enter data: ' . mysql_error());
            }

            while ($row2 = mysql_fetch_array($retval2, MYSQL_ASSOC)) {

                $reply = $row2['reply'];
                $replierID = $row2['studentID'];
                $replyDate = $row2['date'];
                echo "<li>" . $replierID . ": " . $reply . " at " . $replyDate . "</li>";
            }
            ?>


                    </ul>
                </div>

            <?php
            echo "</li>
  </ul></td>";
            ?>
            <td class='right'>
                <span class='votes_count' id='votes_count<?php echo $postID; ?>'></span>

                <span class='vote_buttons' id='vote_buttons<?php echo $postID; ?>'>

                    <a href='javascript:;' class='vote_up' id='<?php echo $postID; ?>'> 
                        <img class='likebtn' src='img/like.png' alt='like' width='15'>
                        <span class='votes_count' id='votes_count2<?php echo $postID; ?>'><?php echo $numLike; ?></span>
                    </a>

                    <a href='javascript:;' class='vote_down' id='<?php echo $postID; ?>'>
                        <img src='img/dislike.png' alt='dislike' width='15'>
                        <span class='votes_count' id='votes_count<?php echo $postID; ?>'><?php echo $numDislike; ?></span>
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


                    //}
                    echo "</ul>";
                }
            }

            function convertHashtags($str) {
                $regex = "/#+([a-zA-Z0-9_]+)/";

                $str = preg_replace($regex, '<a href="hashtag.php?tag=$1">$0</a>', $str);
                return($str);
            }

            function getTimeDiff($time2) {
                $datetime = new DateTime($time2);

                $year = date('Y');
                $month = date('m');
                $day = date('d');
                $hour = date('H');
                $min = date('i');


                $year2 = $datetime->format('Y');
                $month2 = $datetime->format('m');
                $day2 = $datetime->format('d');
                $hour2 = $datetime->format('H');
                $min2 = $datetime->format('i');
                $diff;



                if ($year == $year2) {

                    if ($month == $month2) {
                        if ($day = $day2) {

                            if ($hour2 == $hour) {


                                if ($min == $min2) {

                                    $diff = "1 min ago";
                                    return $diff;
                                } else {
                                    if ($min - $min2 > 1) {
                                        $diff = "" . $min - $min2 . " mins ago";
                                        return $diff;
                                    } else {
                                        $diff = '1 min ago';
                                        return $diff;
                                    }
                                }
                            } else if ($hour - $hour2 > 1) {

                                $diff = "" . $hour - $hour2 . " hours ago";
                                return $diff;
                            } else {
                                $diff = "1 hour ago";
                                return $diff;
                            }
                        } else if ($day - $day2 > 1) {

                            $diff = "" . $day2 - $day . " days ago";
                            return $diff;
                        } else {
                            $diff = '1 day ago';
                            return $diff;
                        }
                    } else if ($month - $month2 > 1) {
                        $ddd = new DateTime("now");
                        // $diff = $datetime;
                        $diff = "" . $month - $month2 . " months ago";
                        //$diff = date("i",$ddd->getTimestamp());
                        // $epoch = new DateTime("2015-07-01 00:00:00.000000");
                        // $diff = date_diff( $ddd, $epoch, true);
                        //return (($diff->y * 365.25 + $diff->m * 30 + $diff->d) * 24 + $diff->h) * 60 + $diff->i + $diff->s/60;

                        return $diff;
                    } else {
                        //	$diff =$month;
                        $diff = '1 month ago';
                        return $diff;
                    }
                } else if ($year - $year2 > 1) {

                    $diff = "" . $year2 - $year . " years ago";
                    return $diff;
                } else {
                    $diff = '1 year ago';
                    return $diff;
                }
            }
            ?>
