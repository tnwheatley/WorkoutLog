
<?php
      // Include config file
      require_once "config.php";
      require_once "header.php";
//require_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<html>
 <head>
    <style>
      
        .row2 {
            display: inline-block;
            padding: 5px;
            font-size:16px;
        }

    </style>
  <title>PHP Test</title>
  
 </head>

 <body>
 <header class="pageHeader gradient">
                <div class = "container-fluid">
                  <div class="row">
                  <div class = "col-sm-3 ">
 </header>

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
        
    if(cat_js == "Cardio"){
    //if(document.getElementById("category").value == "Cardio"){
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
        document.getElementById("subcategory").style.display="block";
        document.getElementById("name").style.display="block";
    }
    else if(cat_js == "Strength"){
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
        document.getElementById("subcategory").style.display="block";
        document.getElementById("name").style.display="block";
        }
    else if(cat_js == "Flexibility"){
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
        document.getElementById("subcategory").style.display="block";
        document.getElementById("name").style.display="block";
    }
    else if(exerciseType == "Cardio"){
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
        document.getElementById("subcategory").style.display="none";
        document.getElementById("name").style.display="none";
    }
    else if(exerciseType == "Strength"){
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
        document.getElementById("subcategory").style.display="none";
        document.getElementById("name").style.display="none";
        }
    else if(exerciseType == "Flexibility"){
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
        document.getElementById("subcategory").style.display="none";
        document.getElementById("name").style.display="none";
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

<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2><br><br>Create New Workout Record</h2>
                    </div>
                    <p>Please fill out this form and submit to add new workout to your log.</p>

<?php
$enterType=$_GET['enterType'];
$exerciseType=$_GET['exerciseType'];
$cat=$_GET['cat'];
$subcat=$_GET['subcat'];

echo "<div class = 'row2'>";
echo "<br> How to Add Exercise: <br>";
?>

<script> cat_js = "<?php echo $cat; ?>";</script>
<script> exerciseType = "<?php echo $exerciseType; ?>";</script>

<?php

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

if($enterType == "Enter Exercise"){
    echo "<div>";
    echo "<br>Exercise Type<br>";
    echo "<SELECT id=exerciseType onChange='reload3()' name=exerciseType class='form-control' style='width:500px;'>";
    if($exerciseType == null){
        echo "<option value='None'>-- Select --</option>";
    }
    if($exerciseType == "Cardio"){
        echo "<option value='Strength'>Strength</option>";
        echo "<option value='Cardio' selected>Cardio</option>";
        echo "<option value='Flexibility'>Flexibility</option>";
    }
    else if($exerciseType == "Flexibility"){
        echo "<option value='Strength' >Strength</option>";
        echo "<option value='Cardio'>Cardio</option>";
        echo "<option value='Flexibility' selected>Flexibility</option>";
    }
    else if($exerciseType == "Strength"){
        echo "<option value='Strength' selected>Strength</option>";
        echo "<option value='Cardio'>Cardio</option>";
        echo "<option value='Flexibility'>Flexibility</option>";
    }
    else{
        echo "<option value='Strength'>Strength</option>";
        echo "<option value='Cardio'>Cardio</option>";
        echo "<option value='Flexibility'>Flexibility</option>";
    }
    echo "</select>";
}

if($enterType == "Select Exercise"){
    echo "<div class = 'row2'>";
    echo "<br>CATEGORY <br>";
    //$exerciseType = null;


    $sql = "SELECT DISTINCT category FROM exercises";

    if($result = $mysqli->query($sql)){
        echo "<SELECT id=category onChange='reload1()' name=category class='form-control' style='width:200px;'>";
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
            if($cat == "Enter Cardio Exercise"){
                echo "<option value='Enter Cardio Exercise' selected>Enter Cardio Exercise</option>";
            }
            else{
                echo "<option value='Enter Cardio Exercise'>Enter Cardio Exercise</option>";
            }
        echo "</select>";
    }
    else {
        echo "ERROR: Could not execute $sql. " . $mysqli->error;
    }
}

if($cat != "Enter Cardio Exercise"){
    echo "</div><div class = 'row2'>";
    if($cat != null){
        echo "<br>SUBCATEGORY<br>";
    }
    //$cat=$_GET['cat'];


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
}


if($cat != "Enter Cardio Exercise"){

    echo "</div><div class = 'row2'>";
        if($cat != null){
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
}


?></div>


                
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" autocomplete='on'>
                        <div class="form-group <?php echo (!empty($date_err)) ? 'has-error' : ''; ?>">
                            <label id=dateL>Date</label>
                            <input type="date" id="date" name="date" class="form-control" value="<?php echo $date; ?>">
                            <span class="help-block"><?php echo $date_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($exercise_err)) ? 'has-error' : ''; ?>">
                            <label id="exerciseL">Exercise</label>
                            <input type="text" id = "exercise" name="exercise" class="form-control" value="<?php echo $exercise; ?>">
                            <span class="help-block"><?php echo $exercise_err;?></span>
                        </div>
			            <div class="form-group <?php echo (!empty($distance_err)) ? 'has-error' : ''; ?>">
                            <label id="distanceL">Distance</label>
                            <input type="text" id="distance" name="distance" class="form-control" value="<?php echo $distance; ?>">
                            <span class="help-block"><?php echo $distance_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($time_err)) ? 'has-error' : ''; ?>">
                            <label id="timeL">Time (Minutes)</label>
                            <input type="number" id="time" name="time" class="form-control" value="<?php echo $time; ?>">
                            <span class="help-block"><?php echo $time_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($sets_err)) ? 'has-error' : ''; ?>">
                            <label id="setsL"># of Sets</label>
                            <input type="text" id="sets" name="sets" class="form-control" value="<?php echo $sets; ?>">
                            <span class="help-block"><?php echo $sets_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($sets_err)) ? 'has-error' : ''; ?>">
                            <label id="repetitionsL">Repetitions per Set</label>
                            <input type="text" id="repetitions" name="repetitions" class="form-control" value="<?php echo $repetitions; ?>">
                            <span class="help-block"><?php echo $repetitions_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($sets_err)) ? 'has-error' : ''; ?>">
                            <label id="weightL">Weight (lbs)</label>
                            <input type="text" id="weight" name="weight" class="form-control" value="<?php echo $weight; ?>">
                            <span class="help-block"><?php echo $weight_err;?></span>
                        </div>
			            <div class="form-group <?php echo (!empty($comments_err)) ? 'has-error' : ''; ?>">
                            <label id="commentsL">Comments</label>
                            <textarea id="comments" name="comments" cols="10" rows="3" wrap="soft" placeholder = 'Please enter information about how you felt during your workout, the weather, your hydration, etc.' class="form-control" value="<?php echo $comments; ?>" ></textarea>
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

