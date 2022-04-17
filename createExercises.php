<?php
    if (!$loggedin) {
        header("location:index.php");
        exit();
    }

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$category = $subcategory = $name = $info = "";
$category_err = $subcategory_err = $name_err = $info_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate category
    $input_category = trim($_POST["category"]);
    if(empty($input_category)){
        $category_err = "Please enter a category.";
    } elseif(!filter_var($input_category, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid category.";
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
        $name_err = "Please enter the name of the exercise.";
    //} elseif(!ctype_digit($input_name)){
        $name_err = "Please enter a name.";
    } else{
        $name = $input_name;
    }

    // Validate information
    $input_info = trim($_POST["info"]);
    if(empty($input_info)){
        $info_err = "Please enter the information about the exercise.";
    //} elseif(!ctype_digit($input_name)){
        $info_err = "Please enter information.";
    } else{
        $info = $input_info;
    }
    // Check input errors before inserting in database
    if(empty($category_err) && empty($subcategory_err) && empty($name_err) && empty($info_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO exercises (category, subcategory, name, information) VALUES (?, ?, ?, ?)";

        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssss", $param_category, $param_subcategory, $param_name, $param_info);

            // Set parameters
            $param_category = $category;
            $param_subcategory = $subcategory;
            $param_name = $name;
            $param_info = $info;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
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
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Exercise Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body style="background-color:rgb(117,255,255);">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Exercise Record</h2>
                    </div>
                    <p>Please fill out this form and submit to add new exercise to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($category_err)) ? 'has-error' : ''; ?>">
                            <label>Category</label>
                            <input type="text" name="category" class="form-control" value="<?php echo $category; ?>">
                            <span class="help-block"><?php echo $category_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($subcategory_err)) ? 'has-error' : ''; ?>">
                            <label>Subcategory</label>
                            <input type="text" name="subcategory" class="form-control" value="<?php echo $subcategory; ?>">
                            <span class="help-block"><?php echo $subcategory_err;?></span>
                        </div>
			<div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Exercise Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($info_err)) ? 'has-error' : ''; ?>">
                            <label>Information</label>
                            <input type="text" name="info" class="form-control" value="<?php echo $info; ?>">
                            <span class="help-block"><?php echo $info_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="workouts.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
