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
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left"><br>Users<br></h2>
                    </div>
		</div>
	  </div>
    </div>

<?php
                    // Attempt select query execution
                    $sql = "SELECT * FROM members WHERE user != '$user'";
                    if($result = $mysqli->query($sql)){
                        if($result->num_rows > 0){
                            echo "<br><table class='table table-bordered table-striped table-hover'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>First Name</th>";
					                    echo "<th>Last Name</th>";
                                        echo "<th>Email Address</th>";
                                        echo "<th>Gender</th>";
                                        echo "<th>Username</th>";
                                        echo "<th>Role</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch_array()){
                                    echo "<tr>";
					                    echo "<td>" . $row['firstName'] . "</td>";
                                        echo "<td>" . $row['lastName'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['gender'] . "</td>";
                                        echo "<td>" . $row['user'] . "</td>";
                                        echo "<td>" . $row['role'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='updateUser.php?modifiedUser=". $row['user'] ."' title='Update Record' data-toggle='tooltip'><i class='bi bi-pencil-fill'></i></a>";
                                            echo "<a href='deleteUser.php?modifieduser=". $row['user'] ."' title='Delete Record' data-toggle='tooltip'><i class='bi bi-trash-fill'></i></a>";
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

    </div>
</body>
</html>

