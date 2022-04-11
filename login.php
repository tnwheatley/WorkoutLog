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
 require_once 'header.php';

 $error = $user = $pass = "";

 if (isset($_POST['user']))
 {
   $user = sanitizeString($_POST['user']);
   $pass = sanitizeString($_POST['pass']);

   if ($user == "" || $pass == "")
       $error = "Not all fields were entered<br>";
   else
   {
     $result = queryMySQL("SELECT * FROM members WHERE user='$user'");

     if ($result->num_rows == 0)
     {
       $error = "<span class='error'>Invalid username or password.  Please try again.</span><br><br>";
     }
     else
     {
       $row = $result->fetch_array(MYSQLI_NUM);

       $result->close();

       $salt = $row[7];

       $salted = $salt.$pass;
       
   if(password_verify($salted,$row[5])){
       session_start();
         $_SESSION['user'] = $user;
       $_SESSION['pass'] = $pass;
        header("location:index.php");
        exit();
       //die("<br><br>Welcome $user, you are now logged in. Please <a href='myLog.php?view=$user'>" .
       //    "click here</a> to proceed to your workout log.<br><br>");
   }
   else{
     $error = "<span class='error'>Invalid username or password.  Please try again.
       </span><br><br>";
   }
     }
   }
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

<body>
  
  <!-- End Navbar -->
  <!-- End Navbar -->
  <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1611674929309-30a2c9be2f2b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTYzfHxydW5uaW5nfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60');" loading="lazy">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container my-auto">
      <div class="row">
        <div class="col-lg-4 col-md-8 col-12 mx-auto">
          <div class="card z-index-0 fadeIn3 fadeInBottom">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
              </div>
            </div>
            <div class="card-body">
                <form method='post' action='login.php'><?php echo $error; ?>
                    <span class='fieldname'>Username </span>
                    <input type='text' maxlength='16' name='user' value="<?php echo $user ?>"><br><br>
                    <span class='fieldname'>Password </span><input type='password'
                    maxlength='16' name='pass' value="<?php echo $pass ?>"><br>
                    <span class='fieldname'>&nbsp;</span>
                    <input type='submit' class="btn bg-gradient-primary w-100 my-4 mb-2 btn-primary:hover" value='Login'>
                    <p class="text-sm mt-3 mb-0">Don't have an account? <a href="signup.php" class="text-dark font-weight-bolder">Register</a></p>
                </form>
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