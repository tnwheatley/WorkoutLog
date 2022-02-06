<?php
      // Include config file
      require_once "config.php";
      require_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
        <header class="pageHeader gradient">
                <div class = "container-fluid">
                  <div class="row">
                    <div class = "col-sm-3 ">
                        <h4>  </h4>
                    </div></div></div>
      </header>

<head>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <style type="text/css">
            .table-hover tbody tr:hover td {
                background-color: darkblue;
                color: white;
                }
        table tr td:last-child a{
            margin-right: 15px;
        }
        .wrapper{
            width: 1000px;
            margin: 0 auto;
        }
    </style>
<link rel="stylesheet" href="styles.css">
</head>



<?php

  if (!$loggedin) die();

  if (isset($_GET['view'])) $view = sanitizeString($_GET['view']);
  else                      $view = $user;

  if ($view == $user)
  {
    $name1 = $name2 = "Your";
    $name3 =          "You have";
  }
  else
  {
    $name1 = "<a href='members.php?view=$view'>$view</a>'s";
    $name2 = "$view's";
    $name3 = "$view is";
  }

  echo "<div class='main'>";

  // Uncomment this line if you wish the user's profile to show here
  // showProfile($view);

  $followers = array();
  $following = array();

  $result = queryMysql("SELECT * FROM friends WHERE user='$view'");
  $num    = $result->num_rows;

  for ($j = 0 ; $j < $num ; ++$j)
  {
    $row           = $result->fetch_array(MYSQLI_ASSOC);
    $followers[$j] = $row['friend'];
  }

  $result = queryMysql("SELECT * FROM friends WHERE friend='$view'");
  $num    = $result->num_rows;

  for ($j = 0 ; $j < $num ; ++$j)
  {
      $row           = $result->fetch_array(MYSQLI_ASSOC);
      $following[$j] = $row['user'];
  }

  $mutual    = array_intersect($followers, $following);
  $followers = array_diff($followers, $mutual);
  $following = array_diff($following, $mutual);
  $friends   = FALSE;

  

  if (sizeof($mutual))
  {
    echo "<div class = 'user-container'>";
    echo "<span class='subhead'>Mutual Friends</span><ul>";
    echo "</div>";
   //echo "<span class='subhead'>Mutual Friends</span><ul>";
    foreach($mutual as $friend)

    $sqlImg = queryMysql("SELECT * FROM profileimg WHERE user='$friend'");

    echo "<div class = 'user-container2'>";

        $rowImg = $sqlImg->fetch_array(MYSQLI_NUM);

        $sqlImg->close();

        if($rowImg[1] == 0){
                echo '<img src="uploads/profile' . $rowImg[0] . '.' . $rowImg[2] . '?' . mt_rand() . '" width="100" height="100">';
        }
        else{
                echo "<img src= 'uploads/UserProfileDefaultImage.png' width='100' height='100'>";
        }

    echo "</div>";

      echo "<li><a href='members.php?view=$friend'>$friend<br></a>";
    echo "</ul>";

    $friends = TRUE;
    echo "<div class = 'empty-container'>";
    echo "</div>";
  }




  if (sizeof($followers))
  {
    echo "<div class = 'user-container'>";
    echo "<br><span class='subhead'>Friend Requests</span><ul>";
    echo "</div>";
    foreach($followers as $friend)

    $sqlImg = queryMysql("SELECT * FROM profileimg WHERE user='$friend'");

    echo "<div class = 'user-container'>";

        $rowImg = $sqlImg->fetch_array(MYSQLI_NUM);

        $sqlImg->close();

        if($rowImg[1] == 0){
                echo '<img src="uploads/profile' . $rowImg[0] . '.' . $rowImg[2] . '?' . mt_rand() . '" width="100" height="100">';
        }
        else{
                echo "<img src= 'uploads/UserProfileDefaultImage.png' width='100' height='100'>";
        }

    echo "</div>";

      echo "<li><a href='members.php?view=$friend'>$friend</a>";
    echo "</ul>";
    $friends = TRUE;
    echo "<div class = 'empty-container'>";
    echo "</div>";
  }
  

  
  if (sizeof($following))
  {
    echo "<div class = 'user-container'>";
    echo "<br><span class='subhead'>Sent Requests </span><br><ul>";
    echo "</div>";

    foreach($following as $friend)
{


    $sqlImg = queryMysql("SELECT * FROM profileimg WHERE user='$friend'");

    echo "<div class = 'user-container2'>";

        $rowImg = $sqlImg->fetch_array(MYSQLI_NUM);

        $sqlImg->close();

        if($rowImg[1] == 0){
                echo '<img src="uploads/profile' . $rowImg[0] . '.' . $rowImg[2] . '?' . mt_rand() . '" width="100" height="100">';
        }
        else{
                echo "<img src= 'uploads/UserProfileDefaultImage.png' width='100' height='100'>";
        }

    echo "</div>";


    echo "<li><a href='members.php?view=$friend'>$friend</a>";
    echo "</ul>";
    $friends = TRUE;
    echo "<div class = 'empty-container'>";
    echo "</div>";
  }
}


  if (!$friends) echo "<br>You don't have any friends yet.<br><br>";

  echo "<br><br><a class='button' href='messages.php?view=$view'>" .
       "View $name2 messages</a>";
?>

    </div><br>
  </body>
</html>
