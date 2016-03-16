<?php
session_start();
include("connect.php");

if(isset($_SESSION['user'])){
?>
<html>
    <head>
        <title>ClasSense</title>
          <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Include jQuery Mobile stylesheets -->
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
        <!-- Include the jQuery library -->

        <link rel="stylesheet" href="css/pagecss.css" />
        <link rel="stylesheet" href="css/jquery.mobile.datepicker.css" />
        <link rel="stylesheet" href="css/jquery.mobile.datepicker.theme.css" />
        <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>

        <!-- Include the jQuery Mobile library -->
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <script src="js/global.js"></script>
        <!-- global is used for log in js-->

        <script src="js/question.js" type="text/javascript"></script>
        <script src="js/vote.js" type="text/javascript"></script>
        <script src="js/search.js" type="text/javascript"></script>
        <script src="js/comment.js" type="text/javascript"></script>
        <script src="js/signup.js" type="text/javascript"></script>
        <script src="js/changedate.js" type="text/javascript"></script>
        <script src="js/jquery.mobile.datepicker.js"></script>
        <script src="external/jquery-ui/datepicker.js"></script>
        <script src="js/popular.js" type="text/javascript"></script>
           <script src="js/topicchange.js" type="text/javascript"></script>



    </head>
    
    <body>
	    <div data-role="header" style="background-color:#c73380;"> 
	<h1 style="color: white;">ClasSense</h1> 
</div> 
<div data-role="content">
 <div id="login_form" style="  position:fixed;
    top: 60%;
    left: 50%;
    width:30em;
    height:18em;
    margin-top: -9em;
    margin-left: -15em; 
    border: 1px ;">
                                            
                <label>Date:</label> <input id="date" type="text" class="date-input-inline" data-inline="false" data-role="date" >
                <div data-role="fieldcontain">
                    <label for="select-choice-1" class="select">Topic:</label>
                    <select name="select-choice-1" id="topicSelect">
                        <?php
                        //get the topic list from database 
                        $sql = "SELECT * FROM Topics;";
                        $retval = mysql_query($sql, $link);
                        if (!$retval) {
                            die('Could not enter data: ' . mysql_error());
                        }

                        while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {

                            $topicName = $row['topicName'];
                            $topicID = $row['topicID'];
                            echo "<option value='" . $topicID . "'>" . $topicName . "</option>";
                        }
                        ?>

                    </select>
                </div>
 <div class="sub">
                    <input type="submit" class="finishbtn" value="Finish" />
                   

                </div>
                
            </div>
</div>
    </body>
    
    
    
    <html>
	    
	    <?php
		    }
		    ?>