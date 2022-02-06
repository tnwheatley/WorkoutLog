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

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12"><br><br>

                    <?php

		if (isset($_GET['erase']))
    		{
      		$erase = sanitizeString($_GET['erase']);
     		 queryMysql("DELETE FROM cardioLog WHERE id=$erase AND user='$user'");
    		}

                    // Attempt select query execution
                    $sql = "SELECT * FROM cardioLog where user='$user'";
                    if($result = $mysqli->query($sql)){
                        if($result->num_rows > 0){
                            echo "<table class='table table-bordered table-striped'>";
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
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                    }


                    // Close connection
                    $mysqli->close();

                    ?>
		    	<div class="wrapperCenter">
		    		<br><a href="createCardioLog.php" class="btn btn-info">Add Workout</a>
		    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
