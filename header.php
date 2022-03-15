<?php

session_start();
require_once 'functions.php';

$userstr = ' (Guest)';
$userRole = "guest";

  if (isset($_SESSION['user']))
  {
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr  = " ($user)";
  }
  else $loggedin = FALSE;

  if($loggedin){

    $result = queryMySQL("SELECT * FROM members WHERE user='$user'");

    if ($result->num_rows > 0)
    {
      $row = $result->fetch_array(MYSQLI_NUM);

        $result->close();

        $userRole = $row[6];
    }
  }

/*
    $sql = "SELECT * FROM members where user='$user'";
    if($result = $mysqli->query($sql)){
        if($result->num_rows > 0){
          //$row = $result->fetch_array(MYSQLI_NUM);
          //$userRole = $row[6];
        }
        else{
          //$userRole = "error";
        }
      }
  }

echo "<br><br><br><br> $userRole";
*/


echo <<<_Begin1
  <html lang ="en">
  <head>
   <meta charset = "UTF-8" />
    <meta name = "viewport" content"width=device-width, initial-scale=1.0"/>
    <title> Motivate: Fitness Tracker</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"> 
   <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
 <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Motivate: Fitness Tracker</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
_Begin1;

	if(!$loggedin){
	echo <<<_loggedOut
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Log in</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signup.php">Sign up</a>
        </li>
        _loggedOut;
        }
  else if($loggedin && $userRole=='user'){
    echo <<<_loggedIn
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="messages.php">Messages</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="members.php">All Members</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="friends.php">Friends</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">Edit Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="myLog.php">My Log</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Log out</a>
        </li>
        _loggedIn;
  }
	else{
	  echo <<<_loggedIn
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="messages.php">Messages</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="members.php">All Members</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="friends.php">Friends</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">Edit Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="myLog.php">My Log</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="workouts.php">Workouts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="updateRoles.php">Member Roles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Log out</a>
        </li>
        _loggedIn;
	}



echo "</ul>";
echo "</div>";
echo "</div>";
echo "</nav>";


echo <<<_close
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
  </html>
_close;
?>


