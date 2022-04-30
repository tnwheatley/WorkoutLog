<?php
      // Include config file
      require_once "config.php";
      require_once 'header.php';


      if (!$loggedin) {
        header("location:index.php");
        exit();
        }
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
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left"><br><b>Exercise Details</b><br></h2>
                    </div>
		</div>
	  </div>
    </div>

<?php
                    // Attempt select query execution
                    $sql = "SELECT * FROM exercises";
                    if($result = $mysqli->query($sql)){
                        if($result->num_rows > 0){
                            echo "<br><table class='table table-bordered table-striped table-hover'>";
                                echo "<thead>";
                                    echo "<tr>";
                                         echo "<th>#</th>";
					                    echo "<th>Category</th>";
                                        echo "<th>Subcategory</th>";
                                        echo "<th>Exercise Name</th>";
                                        echo "<th>Information</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch_array()){
                                    echo "<tr>";
					                    echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['category'] . "</td>";
                                        echo "<td>" . $row['subcategory'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['information'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='readExercises.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><i class='bi bi-eye-fill'></i></a>";
                                            echo "<a href='updateExercises.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><i class='bi bi-pencil-fill'></i></a>";
                                            echo "<a href='deleteExercises.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><i class='bi bi-trash-fill'></i></a>";
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
                        echo "ERROR: Could not execute $sql. " . $mysqli->error;
                    }


                    // Close connection
                    $mysqli->close();
?>

	<a href="createExercises.php" class="btn btn-primary pull-right">Add New Exercise</a><br><br><br><br>
	<form action="filterExercises.php" method="get">
                <title>Static Dropdown List</title>
                <select name = "value">
                  <option value="cardio">Cardio</option>
                  <option value="strength">Strength</option>
                  <option value="flexibility">Flexibility</option>
		<input type='submit' class="btn btn-outline-secondary" value =" filter "/>
                </select>
    </div>
</body>
</html>

