<!--

CRUD Functionality adapted from
https://www.tutorialrepublic.com/php-tutorial/php-mysql-crud-application.php

Sortable tables with pagination from
https://datatables.net/
(Requires jQuery)

Icons for view/change/delete are the FontAwesome stylesheet

April 2024

-->

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="styles.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <title>VowScape</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.min.css">
  <script type="text/javascript" src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <style>
      .wrapper {
          width: 600px;
          margin: 0 auto;
      }

      table tr td:last-child {
          width: 120px;
      }
  </style>
</head>


<body>

<div class="header">
  <h1 id="ceremony_name"><a href="index.php"><img src="images/vowscape-logo.svg" alt="VowScape" height="100 px" ></a></h1>
</div>

<div class="wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="mt-5 mb-3 clearfix">
          <h2 class="pull-left">Ceremony Details</h2>
          <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add a ceremony</a>
        </div>
        <?php
        // Include config file
        require_once "db_configuration.php";

        // Attempt select query execution
        $sql = "SELECT * FROM ceremonies";
        if ($result = mysqli_query($link, $sql)) {
          if (mysqli_num_rows($result) > 0) {
            echo '<table id="datatable" class="display">';
            echo "<thead>";
            echo "<tr>";
            echo "<th>ID#</th>";
            echo "<th>Ceremony name</th>";
            echo "<th>Tradition</th>";
            echo "<th>Country</th>";
            echo "<th>Action</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_array($result)) {
              echo "<tr>";
              echo "<td>" . $row['id'] . "</td>";
              echo "<td>" . $row['name'] . "</td>";
              echo "<td>" . $row['tradition'] . "</td>";
              echo "<td>" . $row['country'] . "</td>";
              echo "<td>";
              echo '<a href="read.php?id=' . $row['id'] . '" class="mr-3" title="View Ceremony" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
              echo '<a href="update.php?id=' . $row['id'] . '" class="mr-3" title="Update Ceremony" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
              echo '<a href="delete.php?id=' . $row['id'] . '" title="Delete Ceremony" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
              echo "</td>";
              echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            // Free result set
            mysqli_free_result($result);
          } else {
            echo '<div class="alert alert-danger"><em>No ceremonies found.</em></div>';
          }
        } else {
          echo "Oops! Something went wrong. Please try again later.";
        }

        // Close connection
        mysqli_close($link);
        ?>
      </div>
    </div>
  </div>
</div>


<!-- DataTables JS (applied retroactively) -->
<script type="text/javascript" src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>

</body>
</html>
