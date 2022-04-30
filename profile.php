<?php
      // Include config file
      require_once "config.php";
      require_once 'header.php';
?>

<!DOCTYPE html>
<html lang ="en">
  <head>
   <meta charset = "UTF-8" />
    <meta name = "viewport" content"width=device-width, initial-scale=1.0"/>
    <title> Motivate: Fitness Tracker</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"> 
   <link rel="stylesheet" href="styles.css" />
  </head>

  <header class="gradient">
                <div class = "container-fluid">
                  <div class="row">
                    <div class = "col-sm-3 ">
                        <h4>  </h4>
                    </div></div>
      </header><br>

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


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<?php


  $result = queryMysql("SELECT * FROM members WHERE user='$user'");
  $row = $result->fetch_array(MYSQLI_NUM);

  echo "<div class='main'><h3>Profile for $user ($row[2])</h3>";


  $sqlImg = queryMysql("SELECT * FROM profileimg WHERE user='$user'");

  echo "<div class = 'user-container'>";

 	$row = $sqlImg->fetch_array(MYSQLI_NUM);

        $sqlImg->close();


	if($row[1] == 0){
                echo '<img src="uploads/profile' . $user . '.' . $row[2] . '?' . mt_rand() . '" width="200" height="200" >';
	}
	else{
		echo "<img src= 'uploads/UserProfileDefaultImage.png' width='200' height='200'>";
	}
	//echo "<p>".$user."</p>";

  echo "</div>";

  

?>


	<form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit" name="submit">UPLOAD</button>
        </form>
  </body>
</html>
