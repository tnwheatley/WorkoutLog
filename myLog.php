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
            width: 1200px;
            margin: 0 auto;
            border: none;
        }
    </style>

</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12"><br><br>
                </div>
		</div>
	  </div>

<?php

    echo "<h2>Cardio</h2>";

		if (isset($_GET['erase']))
    		{
      		$erase = sanitizeString($_GET['erase']);
     		 queryMysql("DELETE FROM workoutLog WHERE id=$erase AND user='$user'");
    		}

                    // Attempt select query execution
                    $sql = "SELECT * FROM workoutLog where user='$user' AND exerciseType='Cardio'";
                    if($result = $mysqli->query($sql)){
                        if($result->num_rows > 0){
                            echo "<table class='table table-bordered table-striped table-hover'>";
                                echo "<thead>";
                                    echo "<tr>";
                                       // echo "<th>user</th>";
					                    echo "<th>Date</th>";
                                        echo "<th>Exercise</th>";
                                        echo "<th>Distance</th>";
                                        echo "<th>Time (Minutes)</th>";
                                        echo "<th>Comments</th>";
					                    echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                    while($row = $result->fetch_array()){
                                    echo "<tr>";
					//echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . date('m/d/Y', strtotime($row['date'])) . "</td>";
 					                    echo "<td>" . $row['exercise'] . "</td>";
                                        echo "<td>" . $row['distance'] . "</td>";
                                        echo "<td>" . $row['time'] . "</td>";
                                        echo "<td>" . $row['comments'] . "</td>";
                                        echo "<td>";
                                           // echo "<a href='readExercises.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                           // echo "<a href='updateExercises.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                           // echo "<a href='deleteExercises.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";

				          echo "<a href='myLog.php?view=$view" . "&erase=" . $row['id'] . "' title='Delete Record' data-toggle='tooltip'><i class='bi bi-trash-fill'></i></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            $result->free();
                        } 
                        else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                    }

                    echo "<br><h2>Strength</h2>";
                     // Attempt select query execution
                     $sql = "SELECT * FROM workoutLog where user='$user' AND exerciseType='Strength'";
                     if($result = $mysqli->query($sql)){
                         if($result->num_rows > 0){
                             echo "<table class='table table-bordered table-striped table-hover'>";
                                 echo "<thead>";
                                     echo "<tr>";
                                        // echo "<th>user</th>";
                                         echo "<th>Date</th>";
                                         echo "<th>Exercise</th>";
                                         echo "<th>Sets</th>";
                                         echo "<th>Repetitions</th>";
                                         echo "<th>Weight</th>";
                                         echo "<th>Comments</th>";
                                         echo "<th>Action</th>";
                                     echo "</tr>";
                                 echo "</thead>";
                                 echo "<tbody>";
                     while($row = $result->fetch_array()){
                                     echo "<tr>";
                     //echo "<td>" . $row['name'] . "</td>";
                                         echo "<td>" . date('m/d/Y', strtotime($row['date'])) . "</td>";
                                          echo "<td>" . $row['exercise'] . "</td>";
                                         echo "<td>" . $row['sets'] . "</td>";
                                         echo "<td>" . $row['repetitions'] . "</td>";
                                         echo "<td>" . $row['weight'] . "</td>";
                                         echo "<td>" . $row['comments'] . "</td>";
                                         echo "<td>";
                                            // echo "<a href='readExercises.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            // echo "<a href='updateExercises.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            // echo "<a href='deleteExercises.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
 
                           echo "<a href='myLog.php?view=$view" . "&erase=" . $row['id'] . "' title='Delete Record' data-toggle='tooltip'><i class='bi bi-trash-fill'></i></a>";
                                         echo "</td>";
                                     echo "</tr>";
                                 }
                                 echo "</tbody>";
                             echo "</table>";
                             // Free result set
                             $result->free();
                         } 
                         else{
                             echo "<p class='lead'><em>No records were found.</em></p>";
                         }
                     } else{
                         echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                     }

                     echo "<br><h2>Flexibility</h2>";
                     // Attempt select query execution
                     $sql = "SELECT * FROM workoutLog where user='$user' AND exerciseType='Flexibility'";
                     if($result = $mysqli->query($sql)){
                         if($result->num_rows > 0){
                             echo "<table class='table table-bordered table-striped table-hover'>";
                                 echo "<thead>";
                                     echo "<tr>";
                                        // echo "<th>user</th>";
                                         echo "<th>Date</th>";
                                         echo "<th>Exercise</th>";
                                         echo "<th>Sets</th>";
                                         echo "<th>Time (Minutes)</th>";
                                         echo "<th>Comments</th>";
                                         echo "<th>Action</th>";
                                     echo "</tr>";
                                 echo "</thead>";
                                 echo "<tbody>";
                     while($row = $result->fetch_array()){
                                     echo "<tr>";
                     //echo "<td>" . $row['name'] . "</td>";
                                         echo "<td>" . date('m/d/Y', strtotime($row['date'])) . "</td>";
                                          echo "<td>" . $row['exercise'] . "</td>";
                                         echo "<td>" . $row['sets'] . "</td>";
                                         echo "<td>" . $row['time'] . "</td>";
                                         echo "<td>" . $row['comments'] . "</td>";
                                         echo "<td>";
                                            // echo "<a href='readExercises.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            // echo "<a href='updateExercises.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            // echo "<a href='deleteExercises.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
 
                           echo "<a href='myLog.php?view=$view" . "&erase=" . $row['id'] . "' title='Delete Record' data-toggle='tooltip'><i class='bi bi-trash-fill'></i></a>";
                                         echo "</td>";
                                     echo "</tr>";
                                 }
                                 echo "</tbody>";
                             echo "</table>";
                             // Free result set
                             $result->free();
                         } 
                         else{
                             echo "<p class='lead'><em>No records were found.</em></p>";
                         }
                     } else{
                         echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                     }
 


                    // Close connection
                    $mysqli->close();

                    ?>
		    	<div class="wrapperCenter">
		    		<br><a href="strengthLog.php" class="btn btn-info">Add Workout</a>
		    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
