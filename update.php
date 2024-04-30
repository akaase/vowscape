<!--

CRUD Functionality adapted from
https://www.tutorialrepublic.com/php-tutorial/php-mysql-crud-application.php

April 2024

-->

<?php
// Include config file
require_once "db_configuration.php";

// Define variables and initialize with empty values
$name = $description = $traditon = $country = "";
$name_err = $description_err = $tradition_err = $country_err = "";

// Processing form data when form is submitted
if (isset($_POST["id"]) && !empty($_POST["id"])) {
  // Get hidden input value
  $id = $_POST["id"];

  // Validate name
  $input_name = trim($_POST["name"]);
  if (empty($input_name)) {
    $name_err = "Please enter the name of the ceremony.";
  } else {
    $name = $input_name;
  }

  // Validate description
  $input_description = trim($_POST["description"]);
  if (empty($input_description)) {
    $description_err = "Please enter an description.";
  } else {
    $description = $input_description;
  }

// Commented out tradition and country validation because it's not
// always applicable to the ceremony so the user may leave those fields
// empty

/*  // Validate tradition
  $input_tradition = trim($_POST["tradition"]);
  if (empty($input_tradition)) {
    $tradition_err = "Please enter an tradition.";
  } else {
    $tradition = $input_tradition;
  }

  // Validate country
  $input_country = trim($_POST["country"]);
  if (empty($input_country)) {
    $country_err = "Please enter a country.";
  } else {
    $country = $input_country;
  }*/

  $input_tradition = trim($_POST["tradition"]);
  $tradition = $input_tradition;
  $input_country = trim($_POST["country"]);
  $country = $input_country;




  // Check input errors before inserting in database
  if (empty($name_err) && empty($description_err) && empty($tradition_err) && empty($country_err)) {

    // Prepare an update statement
    $sql = "UPDATE ceremonies SET name=?, description=?, tradition=?, country=? WHERE id=?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      echo $sql;
      mysqli_stmt_bind_param($stmt, "ssssi", $param_name, $param_description, $param_tradition, $param_country, $param_id);

      // Set parameters
      $param_name = $name;
      $param_description = $description;
      $param_tradition = $tradition;
      $param_country = $country;
      $param_id = $id;

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        // Records updated successfully. Redirect to landing page
        header("location: crud.php");
        exit();
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }
    }

    // Close statement
    mysqli_stmt_close($stmt);
  }

  // Close connection
  mysqli_close($link);
} else {
  // Check existence of id parameter before processing further
  if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Get URL parameter
    $id = trim($_GET["id"]);

    // Prepare a select statement
    $sql = "SELECT * FROM ceremonies WHERE id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "i", $param_id);

      // Set parameters
      $param_id = $id;

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) == 1) {
          /* Fetch result row as an associative array. Since the result set
          contains only one row, we don't need to use while loop */
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

          // Retrieve individual field value
          $name = $row["name"];
          $description = $row["description"];
          $tradition = $row["tradition"];
          $country = $row["country"];
        } else {
          // URL doesn't contain valid id. Redirect to error page
          header("location: error.php");
          exit();
        }

      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }
    }

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($link);
  } else {
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update Record</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
      .wrapper {
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
        <h2 class="mt-5">Update Ceremony</h2>
        <p>Please edit the input values and submit to update the ceremony.</p>
        <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>"
                   value="<?php echo $name; ?>">
            <span class="invalid-feedback"><?php echo $name_err; ?></span>
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="5"
                      class="form-control <?php echo (!empty($description_err)) ? 'is-invalid' : ''; ?>"><?php echo $description; ?></textarea>
            <span class="invalid-feedback"><?php echo $description_err; ?></span>
          </div>
          <div class="form-group">
            <label>Tradition</label>
            <textarea name="tradition"
                      class="form-control <?php echo (!empty($tradition_err)) ? 'is-invalid' : ''; ?>"><?php echo $tradition; ?></textarea>
            <span class="invalid-feedback"><?php echo $tradition_err; ?></span>
          </div>
          <div class="form-group">
            <label>Country</label>
            <textarea name="country"
                      class="form-control <?php echo (!empty($country_err)) ? 'is-invalid' : ''; ?>"><?php echo $country; ?></textarea>
            <span class="invalid-feedback"><?php echo $country_err; ?></span>
          </div>
          <input type="hidden" name="id" value="<?php echo $id; ?>"/>
          <input type="submit" class="btn btn-primary" value="Submit">
          <a href="crud.php" class="btn btn-secondary ml-2">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>