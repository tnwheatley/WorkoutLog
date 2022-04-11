<?php
   
   $logout=TRUE;   //Changes header to match as if you are logged out

   require_once 'header.php';
   require_once 'homeBanner.php';

if (isset($_SESSION['user']))
{
  destroySession();  
  echo " <h1 style='text-align:center;'><br>You have been logged out.<br></h1>";}
else{  echo " <h1 style='text-align:center;'><br>Welcome to $appname!<br></h1>";}

?>
    
