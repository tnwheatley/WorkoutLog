<?php
  require_once 'header.php';
echo <<<_header
<body>
     <header class="pageHeader gradient">
		<div class = "container-fluid">
                  <div class="row">
                    <div class = "col-sm-3 ">
			<h4></h4>
      </header>


<head>
    <meta charset="UTF-8">
    <style type="text/css">
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>


<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2></h2>
                    </div>
_header;

  echo "<div class='main'><br><h3>Please enter your details to log in</h3><br>";
  $error = $user = $pass = "";

  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);

    if ($user == "" || $pass == "")
        $error = "Not all fields were entered<br>";
    else
    {
      $result = queryMySQL("SELECT * FROM members WHERE user='$user'");

      if ($result->num_rows == 0)
      {
        $error = "<span class='error'>Username/Password
                  invalid</span><br><br>";
      }
      else
      {
	    $row = $result->fetch_array(MYSQLI_NUM);

        $result->close();

        $salt = $row[3];

        $salted = $salt.$pass;
        
	if(password_verify($salted,$row[1])){
        session_start();
	      $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;

        die("<br><br>Welcome $user, you are now logged in. Please <a href='myLog.php?view=$user'>" .
            "click here</a> to proceed to your workout log.<br><br>");
	}
	else{
	  $error = "<span class='error'>Not Logged in
		</span><br><br>";
	}
      }
    }
 }

  echo <<<_END
    <form method='post' action='login.php'>$error
    <span class='fieldname'>Username </span><input type='text'
      maxlength='16' name='user' value='$user'><br><br>
    <span class='fieldname'>Password </span><input type='password'
      maxlength='16' name='pass' value='$pass'><br>
_END;
?>
<html>
<br>
    <span class='fieldname'>&nbsp;</span>
    <input type='submit' value='Login'>
    </form><br></div>
  </body>
</html>
