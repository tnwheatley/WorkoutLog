<!--
=========================================================
* Material Kit 2 PRO - v3.0.1
=========================================================

* Product Page:  https://www.creative-tim.com/product/material-kit-pro 
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
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
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
    Material Kit 2 PRO by Creative Tim
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
</head>

<body class="sign-in-basic">
  
  <!-- End Navbar -->
  <!-- End Navbar -->
  <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1557330359-ffb0deed6163?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mzl8fGV4ZXJjaXNlfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60');" loading="lazy">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container my-auto">
      <div class="row">
        <div class="col-lg-4 col-md-8 col-12 mx-auto">
          <div class="card z-index-0">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Register for an account.</h4>
              </div>
            </div>
            <div class="card-body">
              <div id="error"></div>
                   <form id="form" role="form" class="text-start" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                   <div class="form-group <?php echo (!empty($firstName_err)) ? 'has-error' : ''; ?>">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label" for='firstName'>First Name</label>
                            <input type="text" id="firstName" name="firstName" class="form-control" value="<?php echo $firstName; ?>">
                            <span style="color:red" class="help-block"><?php echo $firstName_err;?></span>
                        </div>
                    </div>
                    <div class="form-group <?php echo (!empty($lastName_err)) ? 'has-error' : ''; ?>">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label" for='lastName'>Last Name</label>
                            <input type="text" id="lastName" name="lastName" class="form-control" value="<?php echo $lastName; ?>">
                            <span style="color:red" class="help-block"><?php echo $lastName_err;?></span>
                        </div>
                    </div>
                    <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label" for='email'>Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="<?php echo $email; ?>">
                            <span style="color:red" class="help-block"><?php echo $email_err;?></span>
                        </div>    
                    </div>
                    <div class="input-group input-group-outline my-3">                          
                        <SELECT id=gender name=gender class='form-control' style='width:200px;' value="<?php echo $gender; ?>">
                        <option value='None'>--Select Gender--</option>
                        <option value='Male'>Male</option>
                        <option value='Female'>Female</option>
                        <option value='Non Binary'>Non Binary</option>
                        <option value='Prefer not to say'>Prefer not to say</option>
                        </SELECT>
                    </div>
                    <div class="form-group <?php echo (!empty($user_err)) ? 'has-error' : ''; ?>">
                        <div class="input-group input-group-outline my-3">                          
                            <label class="form-label" for='username'>Username</label>
                            <input type="text" id="username" name="user" class="form-control" value="<?php echo $user; ?>">
                            <span style="color:red" class="help-block"><?php echo $user_err;?></span>
                        </div>
                    </div>
                    <div class="form-group <?php echo (!empty($pass_err)) ? 'has-error' : ''; ?>">
                        <div class="input-group input-group-outline my-3">                          
                            <label class="form-label" for="password">Password</label>
                            <input type="text" id = "password" name="pass" class="form-control" value="<?php echo $pass; ?>">
                            <span style="color:red" class="help-block"><?php echo $pass_err;?></span>
                        </div>
                    </div><br>
                    <input type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2 btn-primary:hover" value="Create Account">
                    <p class="text-sm mt-3 mb-0">Already have an account? <a href="login.php" class="text-dark font-weight-bolder">Sign in</a></p>
                  </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <!--  Plugin for TypedJS, full documentation here: https://github.com/mattboldt/typed.js/ -->
  <script src="assets/js/plugins/typedjs.js"></script>
  <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
  <script src="assets/js/plugins/parallax.min.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Plugin for the blob animation -->
  <script src="assets/js/plugins/anime.min.js" type="text/javascript"></script>
  <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <script src="assets/js/material-kit-pro.min.js?v=3.0.1" type="text/javascript"></script>
</body>

</html>