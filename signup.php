<?php
 require_once 'config.php';
 require_once 'header.php';

// Define the variables used for form validation.
$user = $pass = $firstName = $lastName = $email = $gender = $dateOfBirth = "";
$role = "admin";
$user_err = $pass_err = "";
$status = 1;


//Validate form information

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate first name
    $input_firstName = trim($_POST["firstName"]);
    if(empty($input_firstName)){
        $firstName_err = "Please enter your first name";
    } else{
        $firstName = $input_firstName;
    }

    // Validate last name
    $input_lastName = trim($_POST["lastName"]);
    if(empty($input_lastName)){
        $lastName_err = "Please enter your last name";
    } else{
        $lastName = $input_lastName;
    }

    // Validate email address
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter your email address";
    } else{
        $email = $input_email;
    }
    
    // Validate user
    $input_user = trim($_POST["user"]);
    if(empty($input_user)){
        $user_err = "Please enter a username";
    //} elseif(!ctype_digit($input_name)){
       // $user_err = "Please enter a username.";
    } else{
        $user = $input_user;
    }

    // Validate password
    $input_pass = trim($_POST["pass"]);
    if(empty($input_pass)){
        $pass_err = "Please enter a password.";
    //} elseif(!ctype_digit($input_name)){
        $pass_err = "Please enter a password.";
    } else{
        $pass = $input_pass;
    }

    // Check input errors before inserting in database
  if(empty($user_err) && empty($pass_err)){

    // Prepare an insert statement
    $sql = "INSERT INTO members (firstName, lastName, email, gender, user, pass, role, salt) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    if($stmt = $mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("ssssssss", $param_firstName, $param_lastName, $param_email, $param_gender, $param_user, $param_pass, $param_role, $param_salt);

        // Set parameters
        $param_firstName = $firstName;
        $param_lastName = $lastName;
        $param_email = $email;
        $param_gender = $_POST['gender'];
        $param_user = $user;
        $length = random_bytes('16');
        $param_salt = bin2hex($length);
        $salted = $param_salt.$pass;
        $param_pass = password_hash($salted, PASSWORD_DEFAULT);
        
	    $param_role = $role;

	  	 $sql2 = "INSERT INTO profileimg (user, status, extension) VALUES (?, ?, ?)";

    		if($stmt2 = $mysqli->prepare($sql2)){
        		// Bind variables to the prepared statement as parameters
        		$stmt2->bind_param("sss", $user, $param_status, $param_extension);

        		// Set parameters
        		$param_status = $status;
			    $param_extension = NULL;



         // Attempt to execute the prepared statement
         if($stmt->execute()){
		if($stmt2->execute()){
            	  // Records created successfully. Redirect to landing page
		  header("location: index.php");
           	  exit();
		} else{
			echo "Something went wrong with profileimg. Please try again later.";
        }}else{
           echo "Something went wrong. Please try again later.";
       }
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
     <header class="pageHeader gradient">
                <div class = "container-fluid">
                  <div class="row">
                    <div class = "col-sm-3 ">
                        <h4></h4>
		    </div></div></div>
		<script defer src ="script.js"></script>
      </header>

<head>
    <meta charset="UTF-8">
    <style type="text/css">
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>


<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2></h2>
                    </div>
                    <h4><br>Please fill out the form to sign up for a new account.</h4><br>
                    <div id="error"></div>
                   <form id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
                      <div class="form-group <?php echo (!empty($user_err)) ? 'has-error' : ''; ?>">
                            <br><label for='username'>Username</label>
                            <input type="text" id="username" name="user" class="form-control" value="<?php echo $user; ?>">
			                <span style="color:red" class="help-block"><?php echo $user_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($pass_err)) ? 'has-error' : ''; ?>">
                            <br><label for="password">Password</label>
                            <input type="text" id = "password" name="pass" class="form-control" value="<?php echo $pass; ?>">
			                <span style="color:red" class="help-block"><?php echo $pass_err;?></span>
                        </div><br>
                        <input type="submit" class="btn btn-primary" value="Create Account">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


