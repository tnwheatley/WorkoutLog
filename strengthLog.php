
<?php
      // Include config file
      require_once "config.php";
      require_once "header.php";
//require_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
  <title>
    Motivate: Fitness Tracker
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-kit-pro.css" rel="stylesheet" />

    <style>
      
        .row2 {
            display: inline-blockS;
            padding: 5px;
            font-size:16px;
        }

    </style>

 </head>
 <body>

 <script type="text/javascript">
function reload(){
    var v1 = document.getElementById("enterType").value;
    self.location='strengthLog.php?enterType=' + v1;
}
function reload1(){
    var v1 = document.getElementById("enterType").value;
    var v2 = document.getElementById("category").value;
    self.location='strengthLog.php?enterType=' + v1 + '&cat=' + v2;
}

function reload2(){
    var v1 = document.getElementById("enterType").value;
    var v2 = document.getElementById("category").value;
    var v3 = document.getElementById("subcategory").value;
    //document.write(v1);
    self.location='strengthLog.php?enterType=' + v1 + '&cat=' + v2 + '&subcat=' + v3;
} 
function reload3(){
    var v1 = document.getElementById("enterType").value;
    var v2 = document.getElementById("exerciseType").value;
    self.location='strengthLog.php?enterType=' + v1 + '&exerciseType=' + v2;
}

window.onload = function hideWorkoutCategories(){
        
    if(enterType == "Enter Exercise"){
        document.getElementById("category").style.display="block";
        document.getElementById("subcategory").style.display="none";
        document.getElementById("name").style.display="none";
            if(cat_js == "Cardio"){
            document.getElementById("date").style.display="block";
            document.getElementById("dateL").style.display="block";
            document.getElementById("exercise").style.display="block";
            document.getElementById("exerciseL").style.display="block";
            document.getElementById("distance").style.display="block";
            document.getElementById("distanceL").style.display="block";
            document.getElementById("sets").style.display="none";
            document.getElementById("setsL").style.display="none";
            document.getElementById("repetitions").style.display="none";
            document.getElementById("repetitionsL").style.display="none";
            document.getElementById("weight").style.display="none";
            document.getElementById("weightL").style.display="none";
            document.getElementById("time").style.display="block";
            document.getElementById("timeL").style.display="block";
            document.getElementById("comments").style.display="block";
            document.getElementById("commentsL").style.display="block";
        }
        else if(cat_js == "Strength"){
            document.getElementById("date").style.display="block";
            document.getElementById("dateL").style.display="block";
            document.getElementById("exercise").style.display="block";
            document.getElementById("exerciseL").style.display="block";
            document.getElementById("distance").style.display="none";
            document.getElementById("distanceL").style.display="none";
            document.getElementById("sets").style.display="block";
            document.getElementById("setsL").style.display="block";
            document.getElementById("repetitions").style.display="block";
            document.getElementById("repetitionsL").style.display="block";
            document.getElementById("weight").style.display="block";
            document.getElementById("weightL").style.display="block";
            document.getElementById("time").style.display="none";
            document.getElementById("timeL").style.display="none";
            document.getElementById("comments").style.display="block";
            document.getElementById("commentsL").style.display="block";
            }
        else if(cat_js == "Flexibility"){
            document.getElementById("date").style.display="block";
            document.getElementById("dateL").style.display="block";
            document.getElementById("exercise").style.display="block";
            document.getElementById("exerciseL").style.display="block";
            document.getElementById("distance").style.display="none";
            document.getElementById("distanceL").style.display="none";
            document.getElementById("sets").style.display="block";
            document.getElementById("setsL").style.display="block";
            document.getElementById("repetitions").style.display="none";
            document.getElementById("repetitionsL").style.display="none";
            document.getElementById("weight").style.display="none";
            document.getElementById("weightL").style.display="none";
            document.getElementById("time").style.display="block";
            document.getElementById("timeL").style.display="block";
            document.getElementById("comments").style.display="block";
            document.getElementById("commentsL").style.display="block";
        }
        else{ 
            document.getElementById("date").style.display="none";
            document.getElementById("dateL").style.display="none";
            document.getElementById("exercise").style.display="none";
            document.getElementById("exerciseL").style.display="none";
            document.getElementById("distance").style.display="none";
            document.getElementById("distanceL").style.display="none";
            document.getElementById("sets").style.display="none";
            document.getElementById("setsL").style.display="none";
            document.getElementById("repetitions").style.display="none";
            document.getElementById("repetitionsL").style.display="none";
            document.getElementById("weight").style.display="none";
            document.getElementById("weightL").style.display="none";
            document.getElementById("time").style.display="none";
            document.getElementById("timeL").style.display="none";
            document.getElementById("comments").style.display="none";
            document.getElementById("commentsL").style.display="none";
        }
    }
    else if(enterType == "Select Exercise"){
        document.getElementById("category").style.display="block";
        document.getElementById("subcategory").style.display="none";
        document.getElementById("name").style.display="none";
        if(cat_js == "Cardio"){
            document.getElementById("subcategory").style.display="block";
            document.getElementById("name").style.display="block";
            document.getElementById("date").style.display="block";
            document.getElementById("dateL").style.display="block";
            document.getElementById("exercise").style.display="none";
            document.getElementById("exerciseL").style.display="none";
            document.getElementById("distance").style.display="block";
            document.getElementById("distanceL").style.display="block";
            document.getElementById("sets").style.display="none";
            document.getElementById("setsL").style.display="none";
            document.getElementById("repetitions").style.display="none";
            document.getElementById("repetitionsL").style.display="none";
            document.getElementById("weight").style.display="none";
            document.getElementById("weightL").style.display="none";
            document.getElementById("time").style.display="block";
            document.getElementById("timeL").style.display="block";
            document.getElementById("comments").style.display="block";
            document.getElementById("commentsL").style.display="block";
        }
        else if(cat_js == "Strength"){
            document.getElementById("subcategory").style.display="block";
            document.getElementById("name").style.display="block";
            document.getElementById("date").style.display="block";
            document.getElementById("dateL").style.display="block";
            document.getElementById("exercise").style.display="none";
            document.getElementById("exerciseL").style.display="none";
            document.getElementById("distance").style.display="none";
            document.getElementById("distanceL").style.display="none";
            document.getElementById("sets").style.display="block";
            document.getElementById("setsL").style.display="block";
            document.getElementById("repetitions").style.display="block";
            document.getElementById("repetitionsL").style.display="block";
            document.getElementById("weight").style.display="block";
            document.getElementById("weightL").style.display="block";
            document.getElementById("time").style.display="none";
            document.getElementById("timeL").style.display="none";
            document.getElementById("comments").style.display="block";
            document.getElementById("commentsL").style.display="block";
            }
        else if(cat_js == "Flexibility"){
            document.getElementById("subcategory").style.display="block";
            document.getElementById("name").style.display="block";
            document.getElementById("date").style.display="block";
            document.getElementById("dateL").style.display="block";
            document.getElementById("exercise").style.display="none";
            document.getElementById("exerciseL").style.display="none";
            document.getElementById("distance").style.display="none";
            document.getElementById("distanceL").style.display="none";
            document.getElementById("sets").style.display="block";
            document.getElementById("setsL").style.display="block";
            document.getElementById("repetitions").style.display="none";
            document.getElementById("repetitionsL").style.display="none";
            document.getElementById("weight").style.display="none";
            document.getElementById("weightL").style.display="none";
            document.getElementById("time").style.display="block";
            document.getElementById("timeL").style.display="block";
            document.getElementById("comments").style.display="block";
            document.getElementById("commentsL").style.display="block";
        }
        else{ 
            document.getElementById("date").style.display="none";
            document.getElementById("dateL").style.display="none";
            document.getElementById("exercise").style.display="none";
            document.getElementById("exerciseL").style.display="none";
            document.getElementById("distance").style.display="none";
            document.getElementById("distanceL").style.display="none";
            document.getElementById("sets").style.display="none";
            document.getElementById("setsL").style.display="none";
            document.getElementById("repetitions").style.display="none";
            document.getElementById("repetitionsL").style.display="none";
            document.getElementById("weight").style.display="none";
            document.getElementById("weightL").style.display="none";
            document.getElementById("time").style.display="none";
            document.getElementById("timeL").style.display="none";
            document.getElementById("comments").style.display="none";
            document.getElementById("commentsL").style.display="none";
        }
    }
    else{
        document.getElementById("date").style.display="none";
        document.getElementById("dateL").style.display="none";
        document.getElementById("exercise").style.display="none";
        document.getElementById("exerciseL").style.display="none";
        document.getElementById("distance").style.display="none";
        document.getElementById("distanceL").style.display="none";
        document.getElementById("sets").style.display="none";
        document.getElementById("setsL").style.display="none";
        document.getElementById("repetitions").style.display="none";
        document.getElementById("repetitionsL").style.display="none";
        document.getElementById("weight").style.display="none";
        document.getElementById("weightL").style.display="none";
        document.getElementById("time").style.display="none";
        document.getElementById("timeL").style.display="none";
        document.getElementById("comments").style.display="none";
        document.getElementById("commentsL").style.display="none";
        document.getElementById("subcategory").style.display="none";
        document.getElementById("name").style.display="none";
    }

}



</script>




<?php
$enterType=$_GET['enterType'];
$cat=$_GET['cat'];
$subcat=$_GET['subcat'];


?>


<script> cat_js = "<?php echo $cat; ?>";</script>
<script> enterType = "<?php echo $enterType; ?>";</script>



<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" autocomplete='on'>

<div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1597076545399-91a3ff0e71b3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTIwfHx3b3Jrb3V0fGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60');" loading="lazy">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container my-auto"><br><br>
      <div class="row">
        <div class="col-lg-4 col-md-8 col-12 mx-auto">
          <div class="card z-index-0">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Create New Workout Record</h4>
              </div>
            </div>


<?php
echo "<div class = 'row2'>";
echo "<br> How to Add Exercise: <br>";

echo "<SELECT id=enterType onChange='reload()' name=enterType class='form-control' style='width:210px;'>";
if($enterType == null){
    echo "<option value='None'>-- Select --</option>";
}
if($enterType == "Enter Exercise"){
    echo "<option value='Enter Exercise' selected>Enter Exercise</option>";
    echo "<option value='Select Exercise'>Select Exercise from List</option>"; 
}
else if($enterType == "Select Exercise"){
    echo "<option value='Select Exercise' selected>Select Exercise from List</option>";
    echo "<option value='Enter Exercise'>Enter Exercise</option>";
}
else{
    echo "<option value='Enter Exercise'>Enter Exercise</option>";
    echo "<option value='Select Exercise'>Select Exercise from List</option>"; 
}
echo "</select>";


if($enterType !=null){
    echo "<div class = 'row2'>";
    echo "<br>CATEGORY <br>";


    $sql = "SELECT DISTINCT category FROM exercises";

    if($result = $mysqli->query($sql)){
        echo "<SELECT id=category name=category onChange='reload1()' class='form-control' style='width:200px;'>";
        if($cat == null)
        {
        echo "<option value='None'>-- Select --</option>";
        }

        while($row = $result->fetch_assoc()){
            echo $row[0];
            if($row[category]==$cat){
                echo "<option value=$row[category] selected>$row[category]</option>";
            }
            else{
                echo "<option value=$row[category]>$row[category]</option>";
            }
        }
        echo "</select>";
    }
    else {
        echo "ERROR: Could not execute $sql. " . $mysqli->error;
    }
}

    echo "</div><div class = 'row2'>";
    if($cat != null && $enterType=='Select Exercise'){
        echo "<br>SUBCATEGORY<br>";
    }


    $sql2 = "SELECT DISTINCT subcategory FROM exercises where category='$cat'";

    if($result2 = $mysqli->query($sql2)){
        echo "<SELECT id=subcategory onChange='reload2()' name=subcategory class='form-control' style='width:150px;'>";
        if($subcat == null)
        {
            echo "<option value='None'>-- Select --</option>";
        }
        while($row = $result2->fetch_assoc()){
            echo $row[0];
            if($row[subcategory]==$subcat){
            echo "<option value=$row[subcategory] selected>$row[subcategory]</option>";
            }
            else{
                echo "<option value=$row[subcategory]>$row[subcategory]</option>";
            }
        }
        echo "</select>";
    }
    else {
        echo "ERROR: Could not execute $sql2. " . $mysqli->error;
    }



    echo "</div><div class = 'row2'>";
        if($cat != null && $enterType=='Select Exercise'){
            echo "<br>EXERCISE NAME<br>";
        }
    //$cat=$_GET['cat'];
    $sql3 = "SELECT DISTINCT name FROM exercises where category='$cat' AND subcategory='$subcat'";

    if($result3 = $mysqli->query($sql3)){
        echo "<SELECT id=name name=name class='form-control' style='width:150px;'>";
        echo "<option value='None'>-- Select --</option>";
        while($row = $result3->fetch_assoc()){
            echo $row[0];
                echo "<option value=$row[name]>$row[name]</option>";
        }
        echo "</select>";
    }
    else {
        echo "ERROR: Could not execute $sql3. " . $mysqli->error;
    }
?>

</div>


            <div class="card-body">
                        <div class="form-group <?php echo (!empty($date_err)) ? 'has-error' : ''; ?>">
                            <label id=dateL>Date</label>
                            <div class="input-group input-group-dynamic mb-4">
                            <input type="date" id="date" name="date" class="form-control" value="<?php echo $date; ?>">
                            <span class="help-block"><?php echo $date_err;?></span>
                        </div></div><br>
                        <div class="form-group <?php echo (!empty($exercise_err)) ? 'has-error' : ''; ?>">
                            <label id="exerciseL">Exercise</label>
                            <div class="input-group input-group-dynamic mb-4">
                            <input type="text" id = "exercise" name="exercise" placeholder="Exercise" class="form-control" value="<?php echo $exercise; ?>">
                            <span class="help-block"><?php echo $exercise_err;?></span>
                        </div></div>
			            <div class="form-group <?php echo (!empty($distance_err)) ? 'has-error' : ''; ?>">
                            <label id="distanceL">Distance</label>
                            <div class="input-group input-group-dynamic mb-4">
                            <input type="text" id="distance" name="distance" placeholder="Distance" class="form-control" value="<?php echo $distance; ?>">
                            <span class="help-block"><?php echo $distance_err;?></span>
                        </div></div>
                        <div class="form-group <?php echo (!empty($time_err)) ? 'has-error' : ''; ?>">
                            <label id="timeL">Time (Minutes)</label>
                            <div class="input-group input-group-dynamic mb-4">
                            <input type="number" id="time" name="time" placeholder="Time (Minutes)" class="form-control" value="<?php echo $time; ?>">
                            <span class="help-block"><?php echo $time_err;?></span>
                        </div></div>
                        <div class="form-group <?php echo (!empty($sets_err)) ? 'has-error' : ''; ?>">
                            <label id="setsL"># of Sets</label>
                            <div class="input-group input-group-dynamic mb-4">
                            <input type="text" id="sets" name="sets" placeholder="# of Sets" class="form-control" value="<?php echo $sets; ?>">
                            <span class="help-block"><?php echo $sets_err;?></span>
                        </div><div>
                        <div class="form-group <?php echo (!empty($sets_err)) ? 'has-error' : ''; ?>">
                            <label id="repetitionsL">Repetitions per Set</label>
                            <div class="input-group input-group-dynamic mb-4">
                            <input type="text" id="repetitions" name="repetitions" placeholder="Repetitions per Set" class="form-control" value="<?php echo $repetitions; ?>">
                            <span class="help-block"><?php echo $repetitions_err;?></span>
                        </div><div>
                        <div class="form-group <?php echo (!empty($sets_err)) ? 'has-error' : ''; ?>">
                           <label id="weightL">Weight (lbs)</label>
                           <div class="input-group input-group-dynamic mb-4">    
                            <input type="text" id="weight" name="weight" placeholder="Weight (lbs)" class="form-control" value="<?php echo $weight; ?>">
                            <span class="help-block"><?php echo $weight_err;?></span>
                        </div><div>
			            <div class="form-group <?php echo (!empty($comments_err)) ? 'has-error' : ''; ?>">
                            <label class="form-label" id="commentsL">Comments</label>
                            <div class="input-group input-group-outline mb-4">
                            <textarea id="comments" name="comments" cols="10" rows="3" wrap="soft" placeholder = 'Please enter information about how you felt during your workout, the weather, your hydration, etc.' class="form-control" value="<?php echo $comments; ?>" ></textarea>
			                <span class="help-block"><?php echo $comments_err;?></span>
			            </div></div>
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        <a href="myLog.php" class="btn btn-default">Cancel</a>
                    
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</body>
</html>

<?php
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
    if($_POST['enterType']=="Select Exercise"){
        $exercise=$_POST['name'];
    }
    else{
        $input_exercise = trim($_POST["exercise"]);
        if(empty($input_exercise)){
            //$exercise_err = "Please enter an exercise.";
            $exercise_err = "";
        } else{
            $exercise = $input_exercise;
        }
    }

    

    // Validate distance
    $input_distance = trim($_POST["distance"]);
    if(empty($input_distance)){
        //$distance_err = "Please enter the distance of the exercise.";
        $distance_err = "";
    //} elseif(!ctype_digit($input_distance)){
        $distance_err = "Please enter a distance.";
    } else{
        $distance = $input_distance;
    }

    // Validate sets
    $input_sets = trim($_POST["sets"]);
    if(empty($input_sets)){
        //$time_err = "Please enter the length of time for the exercise.";
        $sets_err = "";
    } else{
        $sets = $input_sets;
    }

    // Validate repetitions
    $input_repetitions = trim($_POST["repetitions"]);
    if(empty($input_repetitions)){
        //$repetitions_err = "Please enter the length of time for the exercise.";
        $repetitions_err = "";
    } else{
        $repetitions = $input_repetitions;
    }

    // Validate weight
    $input_weight = trim($_POST["weight"]);
    if(empty($input_weight)){
        //$time_err = "Please enter the length of time for the exercise.";
        $weight_err = "";
    } else{
        $weight = $input_weight;
    }

   // Validate time
    $input_time = trim($_POST["time"]);
    if(empty($input_time)){
        //$time_err = "Please enter the length of time for the exercise.";
        $time_err = "";
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
    //if(empty($date_err) && empty($exercise_err) && empty($distance_err) && empty($time_err) && empty($comments_err)){
        // Prepare an insert statement

  
            $sql = "INSERT INTO workoutLog (user, exerciseType, date, exercise, distance, sets, repetitions, weight, time, comments) VALUES ('$user', ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            if($stmt = $mysqli->prepare($sql)){
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("sssssssss", $param_category, $param_date, $param_exercise, $param_distance, $param_sets, $param_repetitions, $param_weight, $param_time, $param_comments);

                // Set parameters
                $param_user = $user;
                $param_category = $_POST['category'];
                $param_date = $date;
                $param_exercise = $exercise;
                $param_distance = $distance;
                $param_time = $time;
                $param_sets = $sets;
                $param_repetitions = $repetitions;
                $param_weight = $weight;
                $param_comments = $comments;

                // Attempt to execute the prepared statement
                if($stmt->execute()){
                    // Workout created successfully. Redirect to landing page
                    header("location: myLog.php");
                    exit();
                } else{
                    echo "Something went wrong. Please try again later.";
                }
            }

       
        // Close statement
        $stmt->close();
   
    // Close connection
    $mysqli->close();
}




?> 

