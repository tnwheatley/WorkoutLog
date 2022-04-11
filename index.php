<?php
  require_once 'header.php';
  require_once 'homeBanner.php';



	if (!$loggedin){  echo " <h1 style='text-align:center;'><br>Welcome to $appname!<br></h1>";}
	else{ echo "<h2 style='text-align:center;'><br>$user, you are logged in.<h2>";}

?>
