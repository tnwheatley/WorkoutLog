
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
      Motivate: Fitness Tracker
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/material-kit-pro.css" rel="stylesheet" />
  </head>
  <body>
  <!-- Navbar Dark -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-3">
    <div class="container-fluid">
      <b><a style="font-size:24px; color:blue;" class="navbar-brand navbar-brand:hover" href="" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
        Motivate: Fitness Tracker
      </a></b>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">

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

	if(!$loggedin || $logout){
?>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Log in</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signup.php">Sign up</a>
        </li>
<?php
        }
  else if($loggedin && $userRole=='user'){
?>
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
<?php
  }
	else{
?>
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
 <?php
	}



echo "</ul>";
echo "</div>";
echo "</div>";
echo "</nav>";


?>
  </body>
  </html>




