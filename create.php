<?php
// Include config file
require_once "db_configuration.php";

// Define variables and initialize with empty values
$name = $description = $tradition = $country = $description = "";
$name_err = $description_err = $tradition_err = $country_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate name
  $input_name = trim($_POST["name"]);
  if (empty($input_name)) {
    $name_err = "Please enter a ceremony name.";
  } else {
    $name = $input_name;
  }

  // Validate description
  $input_description = trim($_POST["description"]);
  if (empty($input_description)) {
    $description_err = "Please enter a description.";
  } else {
    $description = $input_description;
  }

  // Validate tradition
  $input_tradition = trim($_POST["tradition"]);
  if (empty($input_tradition)) {
    $tradition_err = "Please enter the ceremony's tradition or its associated religion.";
  } else {
    $tradition = $input_tradition;
  }

  // Validate country
  $input_country = trim($_POST["country"]);
  if (empty($input_country)) {
    $country_err = "Please enter the country or countries in which the ceremony takes place.";
  } else {
    $country = $input_country;
  }

  // Check input errors before inserting in database
  if (empty($name_err) && empty($description_err) && empty($tradition_err) && empty($country_err)) {
    // Prepare an insert statement
    $sql = "INSERT INTO ceremonies (name, description, tradition, country) VALUES (?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "ssss", $param_name, $param_description, $param_tradition, $param_country);

      // Set parameters
      $param_name = $name;
      $param_description = $description;
      $param_tradition = $tradition;
      $param_country = $country;

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        // Records created successfully. Redirect to landing page
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
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Ceremony</title>
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
        <h2 class="mt-5">Create Ceremony</h2>
        <p>Please fill all form fields and submit to add the ceremony the database.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>"
                   value="<?php echo $name; ?>">
            <span class="invalid-feedback"><?php echo $name_err; ?></span>
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea name="description"
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

          <input type="submit" class="btn btn-primary" value="Submit">
          <a href="crud.php" class="btn btn-secondary ml-2">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>