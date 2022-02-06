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

</head>






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

  echo "<h3>Other Members</h3><ul>";

  for ($j = 0 ; $j < $num ; ++$j)
  {
    $row = $result->fetch_array(MYSQLI_ASSOC);



    if ($row['user'] == $user) continue;


    $currentMember = $row['user'];

    $sqlImg = queryMysql("SELECT * FROM profileimg WHERE user='$currentMember'");


    echo "<div class = 'user-container'>";

        $rowImg = $sqlImg->fetch_array(MYSQLI_NUM);

        $sqlImg->close();

        if($rowImg[1] == 0){
                echo '<img src="uploads/profile' . $rowImg[0] . '.' . $rowImg[2] . '?' . mt_rand() . '" width="100" height="100">';
        }
        else{
                echo "<img src= 'uploads/UserProfileDefaultImage.png' width='100' height='100'>";
        }
        //echo "<p>".$user."</p>";

    echo "</div>";





    echo "<li><a data-transition='slide' href='members.php?view=" .
      $row['user'] . "'>" . $row['user'] . "</a>";
    $friend = "friend";

    $result1 = queryMysql("SELECT * FROM friends WHERE
      user='" . $row['user'] . "' AND friend='$user'");
    $t1      = $result1->num_rows;
    $result1 = queryMysql("SELECT * FROM friends WHERE
      user='$user' AND friend='" . $row['user'] . "'");
    $t2      = $result1->num_rows;

    if (($t1 + $t2) > 1) echo " &harr; is a mutual friend";
    elseif ($t1)         echo " &larr; friend request sent";
    elseif ($t2)       { echo " &rarr; has sent you a friend request";
                         $friend = "confirm"; }

    if (!$t1) echo " [<a data-transition='slide'
      href='members.php?add=" . $row['user'] . "'>$friend</a>]";
    else      echo " [<a data-transition='slide'
      href='members.php?remove=" . $row['user'] . "'>remove friend</a>]";
  }
?>
    </ul></div>
  </body>
</html>
