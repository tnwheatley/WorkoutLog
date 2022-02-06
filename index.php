<?php
  require_once 'header.php';


echo <<<_header
<body>
     <header class="pageHeader gradient">
                <div class = "container">
                  <div class="row">
                    <div class = "col-md-6">
_header;
	if (!$loggedin){  echo " <h1><br>Welcome to $appname!<br><br></h1><h3>Please log in or sign up to create an account to use this website<h3>";}
	else{ echo "<h2><br><br><br><br><br>$user, you are logged in.<h2>";}
echo <<<_header2
                    </div>
                    <div class = "col-md-6">
			<img class = "homeImageMain"src ="Morning-Run-Female.jpg" alt="Female Runner">
			<img class = "homeImageHover"src ="WeightLiftingUnsplash.jpg" alt="Male Weightlifter">
                   </div>
                </div>
        </header>


    </span><br><br>
  </body>
</html>
_header2;
?>
