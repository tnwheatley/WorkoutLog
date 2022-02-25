<?php
 require_once 'config.php';
 require_once 'header.php';

// Define the variables used for form validation.
$user = $pass =  "";
$role = "admin";
$user_err = $pass_err = "";
$status = 1;

//Validate form information

if($_SERVER["REQUEST_METHOD"] == "POST"){
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
    $sql = "INSERT INTO members (user, pass, role, salt) VALUES (?, ?, ?, ?)";

    if($stmt = $mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("ssss", $param_user, $param_pass, $param_role, $param_salt);

        // Set parameters
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
                        <div class="form-group <?php echo (!empty($user_err)) ? 'has-error' : ''; ?>">
                            <label for='username'>Username</label>
                            <input type="text" id="username" name="user" class="form-control" value="<?php echo $user; ?>">
			    <span class="help-block"><?php echo $user_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($pass_err)) ? 'has-error' : ''; ?>">
                            <label for="password">Password</label>
                          <input type="text" id = "password" name="pass" class="form-control" value="<?php echo $pass; ?>">
			  <span class="help-block"><?php echo $pass_err;?></span>
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


