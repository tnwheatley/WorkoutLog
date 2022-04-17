<?php
      // Include config file
      require_once "config.php";
      require_once 'header.php';
?>

<!DOCTYPE html>
<html lang ="en">
 

<?php

  if (!$loggedin) {
    header("location:index.php");
    exit();
  }

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
    //echo "<div class = 'user-container'>";
    //echo "<span class='subhead'>Mutual Friends</span><ul>";
    
    echo"<section class='py-5 bg-gray-100'>";
    echo"<div class='container'>";
    echo"<div class='row'>";
    echo"<div class='col-md-7 mx-auto text-center mb-5'>";
    echo"<h2 class='text-info'>Mutual Friends</h2>";
    echo "</div>";
    echo "</div>";

   echo'<div class="row">';


    foreach($mutual as $friend)
    {
    echo'<div class="col-lg-4 col-md-6">';
    echo'<div class="card card-profile mt-md-0 mt-5 bg-info">';
    echo'<div class="card-header mt-n4 mx-3 p-0 bg-transparent position-relative z-index-2">';
    echo'<a class="d-block blur-shadow-image">';

    $sqlImg = queryMysql("SELECT * FROM profileimg WHERE user='$friend'");

    //echo "<div class = 'user-container2'>";

        $rowImg = $sqlImg->fetch_array(MYSQLI_NUM);

        $sqlImg->close();

        if($rowImg[1] == 0){
                echo '<img src="uploads/profile' . $rowImg[0] . '.' . $rowImg[2] . '?' . mt_rand() . '" width="375" height="350" alt="img-blur-shadow" class="border-radius-lg"></a>';
        }
        else{
                echo "<img src= 'uploads/UserProfileDefaultImage.png' width='375' height='350' class='border-radius-lg'></a>";
        }

    echo "</div>";
    echo'<div class="card-body text-center">';


    echo "<h4 class='mb-0'><a class='text-white' href='members.php?view=$friend'>$friend</a></h4>";
    echo "</div>";
    echo "</div>";
    echo "</div>";


    $friends = TRUE;
    }
    echo "</div>";
    echo "</div>";

  }





  if (sizeof($followers))
  {
    echo"<section class='py-5'>";
    echo"<div class='container'>";
    echo"<div class='row'>";
    echo"<div class='col-md-7 mx-auto text-center mb-5'>";
    echo"<h2 class='text-secondary'>Friend Requests</h2>";
    echo "</div>";
    echo "</div>";

    echo'<div class="row">';

    foreach($followers as $friend){

    echo'<div class="col-lg-4 col-md-6">';
    echo'<div class="card card-profile mt-md-0 mt-5 bg-secondary">';
    echo'<div class="card-header mt-n4 mx-3 p-0 bg-transparent position-relative z-index-2">';
    echo'<a class="d-block blur-shadow-image">';

    $sqlImg = queryMysql("SELECT * FROM profileimg WHERE user='$friend'");

    //echo "<div class = 'user-container2'>";

        $rowImg = $sqlImg->fetch_array(MYSQLI_NUM);

        $sqlImg->close();

        if($rowImg[1] == 0){
                echo '<img src="uploads/profile' . $rowImg[0] . '.' . $rowImg[2] . '?' . mt_rand() . '" width="375" height="350" alt="img-blur-shadow" class="border-radius-lg"></a>';
        }
        else{
                echo "<img src= 'uploads/UserProfileDefaultImage.png' width='375' height='350' class='border-radius-lg'></a>";
        }

    echo "</div>";
    echo'<div class="card-body text-center">';


    echo "<h4 class='mb-0'><a class='text-white' href='members.php?view=$friend'>$friend</a></h4>";
    echo "</div>";
    echo "</div>";
    echo "</div>";


    $friends = TRUE;
    }
    echo "</div>";
    echo "</div>";   
  }


  
  if (sizeof($following))
  {
    //echo "<div class = 'user-container'>";
    //echo "<br><span class='subhead'>Sent Requests </span><br><ul>";
    //echo "</div>";

    echo"<section class='py-5 bg-gray-100'>";
    echo"<div class='container'>";
    echo"<div class='row'>";
    echo"<div class='col-md-7 mx-auto text-center mb-5'>";
    echo"<h2 class='text-success'>Sent Requests</h2>";
    //echo"<p>This is the paragraph where you can write more details about your team. Keep you user engaged by providing meaningful information.</p>";
    echo "</div>";
    echo "</div>";


    echo'<div class="row">';


    foreach($following as $friend)
{

    echo'<div class="col-lg-4 col-md-6">';
    echo'<div class="card card-profile mt-md-0 mt-5 bg-success">';
    echo'<div class="card-header mt-n4 mx-3 p-0 bg-transparent position-relative z-index-2">';
    echo'<a class="d-block blur-shadow-image">';

    $sqlImg = queryMysql("SELECT * FROM profileimg WHERE user='$friend'");

    //echo "<div class = 'user-container2'>";

        $rowImg = $sqlImg->fetch_array(MYSQLI_NUM);

        $sqlImg->close();

        if($rowImg[1] == 0){
                echo '<img src="uploads/profile' . $rowImg[0] . '.' . $rowImg[2] . '?' . mt_rand() . '" width="375" height="350" alt="img-blur-shadow" class="border-radius-lg"></a>';
        }
        else{
                echo "<img src= 'uploads/UserProfileDefaultImage.png' width='375' height='350' class='border-radius-lg'></a>";
        }

    echo "</div>";
    echo'<div class="card-body text-center">';


    echo "<h4 class='mb-0'><a class='text-white' href='members.php?view=$friend'>$friend</a></h4>";
    echo "</div>";
    echo "</div>";
    echo "</div>";


    $friends = TRUE;
  }
  echo "</div>";
  echo "</div>";
    

}



  if (!$friends) echo "<br>You don't have any friends yet.<br><br>";

  echo "<br><br><a class='button' href='messages.php?view=$view'>" .
       "View $name2 messages</a>";
?>

    </div><br>
  </body>
</html>
