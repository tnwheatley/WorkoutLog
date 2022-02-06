<?php
  require_once 'header.php';

  if (isset($_SESSION['user']))
  {
    destroySession();
    echo "<div class='main'><br><br>You have been logged out. ";
  }
  else echo "<div class='main'><br><br>" .
            "You cannot log out because you are not logged in";
?>

    <br><br></div>
  </body>
</html>
