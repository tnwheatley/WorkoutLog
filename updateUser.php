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

<?php

if($loggedin && $userRole=='admin'){

// Define variables and initialize with empty values
$firstName = $lastName = $email = $gender = $role = "";
$firstName_err = $lastName_err = $email_err = $gender_err = $role_err = "";

// Processing form data when form is submitted
if(isset($_POST["modifiedUser"]) && !empty($_POST["modifiedUser"])){
    // Get hidden input value
    $modifiedUser = $_POST["modifiedUser"];


    // Validate first name
    $input_firstName = trim($_POST["firstName"]);
    if(empty($input_firstName)){
        $firstName_err = "Please enter a first name.";
    } elseif(!filter_var($input_firstName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $firstName_err = "Please enter a valid first name.";
    } else{
        $firstName = $input_firstName;
    }

    // Validate last name
    $input_lastName = trim($_POST["lastName"]);
    if(empty($input_lastName)){
        $lastName_err = "Please enter a last Name.";
    } else{
        $lastName = $input_lastName;
    }

  // Validate name
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter an email address.";
    } else{
        $email = $input_email;
    }
    // Validate information
    $input_gender = trim($_POST["gender"]);
    if(empty($input_gender)){
        $gender_err = "Please enter your gender.";
    } else{
        $gender = $input_gender;
    }

    // Validate information
    $input_role = trim($_POST["role"]);
    if(empty($input_role)){
        $role_err = "Please enter your role.";
    } else{
        $role = $input_role;
    }

    // Check input errors before inserting in database
    if(empty($firstName_err) && empty($lastName_err) && empty($email_err) && empty($gender_err)&& empty($role_err)){
        // Prepare an update statement
        $sql = "UPDATE members SET firstName=?, lastName=?, email=?, gender=?, role=? WHERE user='$modifiedUser'";

        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssss", $param_firstName, $param_lastName, $param_email, $param_gender, $param_role);

            // Set parameters
            $param_firstName = $firstName;
            $param_lastName = $lastName;
            $param_email = $email;
	        $param_gender = $_POST['gender'];
	        $param_role = $_POST['role'];

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records updated successfully. Redirect to landing page
                header("location: updateRoles.php");
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
} else{
    // Check existence of user parameter before processing further
    if(isset($_GET["modifiedUser"]) && !empty(trim($_GET["modifiedUser"]))){
        // Get URL parameter
        $modifiedUser =  trim($_GET["modifiedUser"]);

        // Prepare a select statement
        $sql = "SELECT * FROM members WHERE user = '$modifiedUser'";
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            //$stmt->bind_param("i", $param_modifiedUser);


            // Attempt to execute the prepared statement
            if($stmt->execute()){
                $result = $stmt->get_result();

                if($result->num_rows == 1){
                    // Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop 
                    $row = $result->fetch_array(MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $firstName = $row["firstName"];
                    $lastName = $row["lastName"];
		            $email = $row["email"];
		            $gender = $row["gender"];
                    $role = $row["role"];
                } else{
                    // URL doesn't contain valid modifiedUser. Redirect to error page
                    header("location: error.php");
                    exit();
                }

            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        $stmt->close();

        // Close connection
        $mysqli->close();
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}

?>



    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the members.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group <?php echo (!empty($firstName_err)) ? 'has-error' : ''; ?>">
                            <label for='firstName'>First Name</label>
                            <input type="text" id="firstName" name="firstName" class="form-control" value="<?php echo $firstName; ?>">
			                <span style="color:red" class="help-block"><?php echo $firstName_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($lastName_err)) ? 'has-error' : ''; ?>">
                            <br><label for='lastName'>Last Name</label>
                            <input type="text" id="lastName" name="lastName" class="form-control" value="<?php echo $lastName; ?>">
			                <span style="color:red" class="help-block"><?php echo $lastName_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <br><label for='email'>Email</label>
                            <input type="text" id="email" name="email" class="form-control" value="<?php echo $email; ?>">
			                <span style="color:red" class="help-block"><?php echo $email_err;?></span>
                        </div>
                            <br><label for='gender'>Gender</label>                           
                            <SELECT id=gender name=gender class='form-control' style='width:200px;' value="<?php echo $gender; ?>">
                            <option value='None'>-- Select --</option>
                            <option value='Male'>Male</option>
                            <option value='Female'>Female</option>
                            <option value='Non Binary'>Non Binary</option>
                            <option value='Prefer not to say'>Prefer not to say</option>
                            </SELECT>
                            <br><label for='role'>Role</label>                           
                            <SELECT id=role name=role class='form-control' style='width:200px;' value="<?php echo $gender; ?>">
                            <option value='user'>User</option>
                            <option value='admin'>Admin</option>
                            </SELECT>
                        <input type="hidden" name="modifiedUser" value="<?php echo $modifiedUser; ?>"/>
                        <br><br><input type="submit" class="btn btn-primary" value="Submit">
                        <a href="workouts.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


<?php
}
else{
    header("location:error-403.php");
    exit();
}
?>