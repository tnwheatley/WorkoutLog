<?php
      // Include config file
      require_once "config.php";
      require_once 'header.php';
?>

<!DOCTYPE html>
<html lang ="en">


<?php
 // require_once 'header.php';

  if (!$loggedin) die("</div></body></html>");

  if (isset($_GET['view']))
  {
    $view = sanitizeString($_GET['view']);

    if ($view == $user) $name = "Your";
    else                $name = "$view's";

    echo "<h3>$name Profile</h3>";
    showProfile($view);
    echo "<a class='button' data-transition='slide'
          href='messages.php?view=$view'>View $name messages</a>";
    die("</div></body></html>");
  }

  if (isset($_GET['add']))
  {
    $add = sanitizeString($_GET['add']);

    $result = queryMysql("SELECT * FROM friends
      WHERE user='$add' AND friend='$user'");
    if (!$result->num_rows)
      queryMysql("INSERT INTO friends VALUES ('$add', '$user')");
  }
  elseif (isset($_GET['remove']))
  {
    $remove = sanitizeString($_GET['remove']);
    queryMysql("DELETE FROM friends WHERE user='$remove' AND friend='$user'");
  }

  $result = queryMysql("SELECT user FROM members ORDER BY user");
  $num    = $result->num_rows;

  //echo "<h3>Other Members</h3><ul>";

  echo"<section class='py-5 bg-gray-100'>";
  echo"<div class='container'>";
  echo"<div class='row'>";
  echo"<div class='col-md-7 mx-auto text-center mb-5'>";
  echo"<h1>Other Members</h1>";
  echo "</div>";
  echo "</div>";

 echo'<div class="row">';

  for ($j = 0 ; $j < $num ; ++$j)
  {
    $row = $result->fetch_array(MYSQLI_ASSOC);



    if ($row['user'] == $user) continue;


    $currentMember = $row['user'];

    $sqlImg = queryMysql("SELECT * FROM profileimg WHERE user='$currentMember'");


    //echo "<div class = 'user-container'>";

    echo'<div class="col-lg-4 col-md-6">';
    echo'<div class="card card-profile mt-md-0 mt-5">';
    echo'<div class="card-header mt-n4 mx-3 p-0 bg-transparent position-relative z-index-2">';
    echo'<a class="d-block blur-shadow-image">';

        $rowImg = $sqlImg->fetch_array(MYSQLI_NUM);

        $sqlImg->close();

        if($rowImg[1] == 0){
                echo '<img src="uploads/profile' . $rowImg[0] . '.' . $rowImg[2] . '?' . mt_rand() . '" width="375" height="350" alt="img-blur-shadow" class="border-radius-lg"></a>';
        }
        else{
                echo "<img src= 'uploads/UserProfileDefaultImage.png' width='375' height='350' class='border-radius-lg'></a>";
        }
        //echo "<p>".$user."</p>";

    echo "</div>";
    echo'<div class="card-body text-center">';



    echo "<h4 class='mb-0'><a data-transition='slide' href='members.php?view=" .
      $row['user'] . "'>" . $row['user'] . "</a></h4><br>";
    $friend = "friend";

    $result1 = queryMysql("SELECT * FROM friends WHERE
      user='" . $row['user'] . "' AND friend='$user'");
    $t1      = $result1->num_rows;
    $result1 = queryMysql("SELECT * FROM friends WHERE
      user='$user' AND friend='" . $row['user'] . "'");
    $t2      = $result1->num_rows;

    if (($t1 + $t2) > 1) echo " is a mutual friend<br>";
    elseif ($t1)         echo " friend request sent<br>";
    elseif ($t2)       { echo " has sent you a friend request<br>";
                         $friend = "confirm"; }

    if (!$t1) echo " [<a data-transition='slide'
      href='members.php?add=" . $row['user'] . "'>$friend</a>]";
    else      echo " [<a data-transition='slide'
      href='members.php?remove=" . $row['user'] . "'>remove friend</a>]";

      echo "</div>";
      echo "</div>";
      echo "</div>";
  
  }
?>
    </ul></div>
  </body>
</html>
