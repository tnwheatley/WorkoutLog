<?php
    if (!$loggedin) {
        header("location:index.php");
        exit();
    }

// Include config file
require_once "config.php";
require_once "header.php";

// Define variables and initialize with empty values
$date = $exercise = $distance = $time = $comments  = "";
$date_err = $exercise_err = $distance_err = $time_err = $comments_err= "";



// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate date
    $input_date = trim($_POST["date"]);
    if(empty($input_date)){
        $date_err = "Please enter a date.";
    } else{
        $date = $input_date;
    }

    // Validate exercise
    $input_exercise = trim($_POST["exercise"]);
    if(empty($input_exercise)){
        $exercise_err = "Please enter an exercise.";
    } else{
        $exercise = $input_exercise;
    }

    // Validate distance
    $input_distance = trim($_POST["distance"]);
    if(empty($input_distance)){
        $distance_err = "Please enter the distance of the exercise.";
    //} elseif(!ctype_digit($input_distance)){
        $distance_err = "Please enter a distance.";
    } else{
        $distance = $input_distance;
    }

   // Validate time
    $input_time = trim($_POST["time"]);
    if(empty($input_time)){
        $time_err = "Please enter the length of time for the exercise.";
    //} elseif(!ctype_digit($input_name)){
        $time_err = "Please enter a time.";
    } else{
        $time = $input_time;
    }

    // Validate comments
    $input_comments = trim($_POST["comments"]);
    if(empty($input_comments)){
        $comments_err = "Please enter the comments about the exercise.";
    //} elseif(!ctype_digit($input_name)){
        $comments_err = "Please enter comments.";
    } else{
        $comments = $input_comments;
    }

    // Check input errors before inserting in database
    if(empty($date_err) && empty($exercise_err) && empty($distance_err) && empty($time_err) && empty($comments_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO cardioLog (user, date, exercise, distance, time, comments) VALUES ('$user', ?, ?, ?, ?, ?)";

        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssss", $param_date, $param_exercise, $param_distance, $param_time, $param_comments);

            // Set parameters
    	    $param_user = $user;
            $param_date = $date;
            $param_exercise = $exercise;
            $param_distance = $distance;
            $param_time = $time;
	    $param_comments = $comments;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: myLog.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<body>
     <header class="pageHeader gradient">
                <div class = "container-fluid">
                  <div class="row">
                    <div class = "col-sm-3 ">
                   
      </header>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2><br><br>Create New Workout Record</h2>
                    </div>
                    <p>Please fill out this form and submit to add new workout to your log.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" autocomplete='on'>
                        <div class="form-group <?php echo (!empty($date_err)) ? 'has-error' : ''; ?>">
                            <label>Date</label>
                            <input type="date" name="date" class="form-control" value="<?php echo $date; ?>">
                            <span class="help-block"><?php echo $date_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($exercise_err)) ? 'has-error' : ''; ?>">
                            <label>Exercise</label>
                            <input type="text" name="exercise" class="form-control" value="<?php echo $exercise; ?>">
                            <span class="help-block"><?php echo $exercise_err;?></span>
                        </div>
			<div class="form-group <?php echo (!empty($distance_err)) ? 'has-error' : ''; ?>">
                            <label>Distance</label>
                            <input type="text" name="distance" class="form-control" value="<?php echo $distance; ?>">
                            <span class="help-block"><?php echo $distance_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($time_err)) ? 'has-error' : ''; ?>">
                            <label>Time (Minutes)</label>
                            <input type="number" name="time" class="form-control" value="<?php echo $time; ?>">
                            <span class="help-block"><?php echo $time_err;?></span>
                        </div>
			<div class="form-group <?php echo (!empty($comments_err)) ? 'has-error' : ''; ?>">
                            <label>Comments</label>
                            <textarea name="comments" cols="10" rows="3" wrap="soft" placeholder = 'Please enter information about how you felt during your workout, the weather, your hydration, etc.' class="form-control" value="<?php echo $comments; ?>" ></textarea>
			    <span class="help-block"><?php echo $comments_err;?></span>
			    </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="myLog.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>






<?php
$sql = "SELECT DISTINCT category FROM exercises";

if($result = $mysqli->query($sql)){
    echo "<SELECT category=exercise class='form-control' style='width:200px;'>";
    while($row = $result->fetch_assoc()){
        echo $row[0];
        echo "<option value=$row[category]>$row[category]</option>";
    }
    echo "</select>";
}
else {
    echo $connection->error;
}
?>