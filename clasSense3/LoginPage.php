<?php
session_start();
include("connect.php");
if(!isset($_SESSION['user'])&& !isset($_SESSION['topic']) ){
	unset($_SESSION);
	session_destroy();
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
<div data-role="content"  >
	<br>
	<br>
 <div id="login_form"  >
                <div   data-role="fieldcontain">
                    <label>Username:</label> <input type="text" class="input" name="user" id="user" /></div>  
                <div data-role="fieldcontain">
                    <label>Password:</label> <input type="password" class="input" name="pass" id="pass" /></div>
               
               
                <div class="sub">
                    <input type="submit" class="loginbtn" value="Log In" />
                    <a  href="#signPopup" data-rel="popup" > <input type="button"  value="Sign Up" /></a>
 <div data-role="popup" id="signPopup" data-position-to="window" data-transition="flip" class="ui-content" style="min-width:250px;">
	 <h2 align="center">Quick Sign Up</h2>
        <form action="" method="post">




            <div id="" data-role="fieldcontain">
                <label id="" for="Username"> Username: </label>
                <input type="text" name="Username" id="username" placeholder="Username:"  />
            </div> 
            <div id="" data-role="fieldcontain">
                <label id="" for="password"> Password: </label>
                <input type="password" name="password" id="password" placeholder="Password:"  />
            </div> 
            <div id="" data-role="fieldcontain">
                <label id="" for="Firstname"> First Name: </label>
                <input type="text" name="Firstname" id="firstname" placeholder="First Name:"  />
            </div> 
            <div id="" data-role="fieldcontain">
                <label id="" for="Lastname"> Last Name: </label>
                <input type="text" name="Lastname" id="lastname" placeholder="Last Name:"  />
            </div> 

            <input type="button"  id ="signBtn" value="Sign Up!">
            </div>  

        </form>

 </div>
                </div>
            </div>
</div>
    </body>
    
    
    
    <html>
	    
	    <?php 
		    }else{
			    include('mainpage.php');
		    }
	    ?>