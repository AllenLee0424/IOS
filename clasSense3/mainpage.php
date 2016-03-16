<?php
session_start();
include("connect.php");
if(isset($_SESSION['user'])&& isset($_SESSION['topic']) ){
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
         <script src="js/searchcomment.js" type="text/javascript"></script>
        <script src="js/signup.js" type="text/javascript"></script>
        <script src="js/changedate.js" type="text/javascript"></script>
        <script src="js/jquery.mobile.datepicker.js"></script>
        <script src="external/jquery-ui/datepicker.js"></script>
        <script src="js/popular.js" type="text/javascript"></script>
           <script src="js/topicchange.js" type="text/javascript"></script>

		
<link href="css/jquery.cssemoticons.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="js/jquery.cssemoticons.min.js" type="text/javascript"></script>
		
		
		
<script type="text/javascript">
		$(document).ready(function a(){
			$('.postingquery').emoticonize({
				//delay: 800,
				//animate: false,
				//exclude: 'pre, code, .no-emoticons'
			});
			$('.emo').emoticonize({
				//delay: 800,
			animate: false,
				//exclude: 'pre, code, .no-emoticons'
			});
			
					})
	</script>

    </head>
    
    
    <body>







   
        <!-- Start of first page -->
        <div id="pageone" data-role="page"  class="header-gradient" >
	        
	         <div data-role="none" style="text-align:center"> 
  <button class="ui-btn ui-btn-inline" onclick="playPause()">Play/Pause</button> 
  <button  class="ui-btn ui-btn-inline" onclick="makeBig()">Zoom in</button>
  <button  class="ui-btn ui-btn-inline" onclick="makeSmall()">Small</button>
  <button class="ui-btn ui-btn-inline" onclick="makeNormal()">Normal</button>
  <br><br>
  <video id="video1" width="420">
    <source src="http://video.flinders.edu.au/videodl2015/176135_adsl.mp4" type="video/mp4">
    <source src="mov_bbb.ogg" type="video/ogg">
    Your browser does not support HTML5 video.
  </video>
</div> 

<script> 
	
	

	
var myVideo = document.getElementById("video1"); 

function playPause() { 
    if (myVideo.paused) 
        myVideo.play(); 
    else 
        myVideo.pause(); 
} 

function makeBig() { 
    myVideo.width = myVideo.width *1.2; 
} 

function makeSmall() { 
    myVideo.width = myVideo.width/1.2; 
} 

function makeNormal() { 
    myVideo.width = 420; 
} 
</script> 


            <!-- start page one header -->
           
           <?php 
	           include('nav.php');
           ?>

    <div role="main" class="ui-content">
 
        <?php
        if (isset($_SESSION['user'])) {
            ?>
            <form class="ui-filterable">
                <input id="myFilter" data-type="search">
            </form>
            <a id="allpost" data-role="button" data-inline="true">Dislpay all posts</a>
            <a  id="popularpost" data-role="button" data-inline="true">Display popular posts</a>
               
          
            <?php
           // $date = date('Y-m-d H:i:s');
          //  echo "The current server timezone is: " . $date;
          //  echo " topicID is: " . $_SESSION['topic'] . " date is " . $_SESSION['date'];
            ?>
            <div id="postdiv">


                <?php
                include('addpost2.php');
                ?>


            </div>


<?php }  ?>
           


    </div>



    <!-- /content -->


</div><!-- /page -->
<?php 
	 if (isset($_SESSION['user'])) {
	include('pagetwo.php');
	}
	
?>
<!-- end second page -->


<!-- start page three -->
<?php if (isset($_SESSION['user'])) {
	 include('pagethree.php');
	 }
	
?>
<!-- end third page -->

<!-- start sign up page-->
<?php 
	
	include('pagefour.php');
	
	
?>

<!-- end sign up page-->




</body>

</html>

<?php }
	else if(!isset($_SESSION['user']) ){
	include('LoginPage.php');
	}
	else if(isset($_SESSION['user'])&& !isset($_SESSION['topic']) ){
		include('TopicSelect.php');
		}
	
?>