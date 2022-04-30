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

<?php
  if (!$loggedin) {
    header("location:index.php");
    exit();
  }
// Define variables and initialize with empty values
$category = $subcategory = $name = $info = "";
$category_err = $subcategory_err = $name_err = $info_err = "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    // Validate category
    $input_category = trim($_POST["category"]);
    if(empty($input_category)){
        $category_err = "Please enter a category.";
    } elseif(!filter_var($input_category, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $category_err = "Please enter a valid category.";
    } else{
        $category = $input_category;
    }

    // Validate subcategory
    $input_subcategory = trim($_POST["subcategory"]);
    if(empty($input_subcategory)){
        $subcategory_err = "Please enter a subcategory.";
    } else{
        $subcategory = $input_subcategory;
    }

  // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    // Validate information
    $input_info = trim($_POST["information"]);
    if(empty($input_info)){
        $info_err = "Please enter information about the exercise.";
    } else{
        $info = $input_info;
    }

    // Check input errors before inserting in database
    if(empty($category_err) && empty($subcategory_err) && empty($name_err) && empty($info_err)){
        // Prepare an update statement
        $sql = "UPDATE exercises SET category=?, subcategory=?, name=?, information=? WHERE id=?";

        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssssi", $param_category, $param_subcategory, $param_name, $param_info, $param_id);

            // Set parameters
            $param_category = $category;
            $param_subcategory = $subcategory;
            $param_name = $name;
	        $param_info = $info;
	        $param_id = $id;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records updated successfully. Redirect to landing page
                header("location: workouts.php");
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
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM exercises WHERE id = ?";
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("i", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                $result = $stmt->get_result();

                if($result->num_rows == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = $result->fetch_array(MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $category = $row["category"];
                    $subcategory = $row["subcategory"];
		    $name = $row["name"];
		    $info = $row["information"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
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
                    <p>Please edit the input values and submit to update the exercises.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($category_err)) ? 'has-error' : ''; ?>">
                            <label>Category</label>
                            <input type="text" name="category" class="form-control" value="<?php echo $category; ?>">
                            <span class="help-block"><?php echo $category_err;?></span><br>
                        </div>
                        <div class="form-group <?php echo (!empty($subcategory_err)) ? 'has-error' : ''; ?>">
                            <label>Subcategory</label>
                            <input type="text" name="subcategory" class="form-control" value="<?php echo $subcategory; ?>">
                            <span class="help-block"><?php echo $subcategory_err;?></span><br>
                        </div>
			<div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Exercise Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span><br>
                        </div>
                        <div class="form-group <?php echo (!empty($info_err)) ? 'has-error' : ''; ?>">
                            <label>Information</label>
                            <input type="text" name="information" class="form-control" value="<?php echo $info; ?>">
                            <span class="help-block"><?php echo $info_err;?></span><br>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="workouts.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
