<?php
if ($_POST) {
	session_start();
	require_once ('connect.php');
   $password2 = $_POST['password'];
   $username = $_POST['username'];
   
   $FName = $_POST['FName'];
   $LName = $_POST['LName'];
   $boolean = 1;
   $sql = "SELECT * FROM Students where studentID ='".$username."'; ";
 //  $sql = "SELECT * FROM user where username ='".$username."'; ";
   $retval = mysql_query( $sql, $link );
   if( !$retval )
   {
    die('Could not enter data: ' . mysql_error());
   }
   else{
	   //store new user in to data base 
	   while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
  {
  $username2 = $row['studentID'];
  
	   if($username2 == $username )
	   {
		   $boolean =0;
        }
 }
  
	   //if success, return 1,and sign in with user, go to page one
	   // echo '1';
	   
   }
   if($boolean==1){
	    $sql2 = "INSERT INTO `admin_classense`.`Students` (`studentID`, `studentFname`, `studentLname`, `password`) VALUES ('".$username."', '".$FName."','".$LName."','".$password2."');";
	  // $sql2 = "INSERT INTO `clasSense`.`user` (`id`, `username`, `password`, `login_time`, `login_ip`, `login_counts`) VALUES (NULL, '".$username."', '".$password2."',NULL, NULL, '0');";
      $retval2 = mysql_query( $sql2, $link );
      $_SESSION['user'] = $username;
      
   if(! $retval2 )
   {
	     die('Could not enter data: ' . mysql_error());
   }

	   
	   
	  echo 1;

   }else{
	   echo 0;
   }
     //$query = convertHashtags($query);
   //check whether user name is exsting, if yes return false , else cotinue
   
   //put the user name password, name into database, store in it and sign in then return to page one.
	
	
	
	
	}

?>