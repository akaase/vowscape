<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="styles.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<style>
    .clickable {
        cursor: pointer; /* or cursor: default; */
    }
</style>

<body>

<?php
// Login mysql credentials in separate db_configuration.php file
require_once('db_configuration.php');

// Establishing Connection with Server; global variables populated from db_configuration.php
$servername = DB_SERVER;
$db_username = DB_USERNAME;
$db_password = DB_PASSWORD;
$database = DB_NAME;

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully<br>";
$conn->set_charset("utf8");

// This function retrieves the length of the ceremonies table
// and chooses a random number between 1 and that length.
// That random number then is the default ID of ceremony shown
// at page load or refresh.

function makeRandom() {
  global $conn; // Needed to access mysql outside of a function!

  $sql = "SELECT COUNT(*) AS total_rows FROM ceremonies;";
  $result = $conn->query($sql);

  if ($result) {
    // Fetch associative array
    $row = $result->fetch_assoc();

    // Total number of rows
    $total_rows = $row['total_rows'];

    // Conjure a random value from 1 to the total_rows
    $random_number = rand(1, $total_rows);
  } else {
    echo "Error: " . $mysqli->error;
  }
return $random_number;
}

$CeremonyId = makeRandom();

// Bind the CeremonyID to JS's ID for the first page load, and then invoke.

echo '<script>var id = ' . $CeremonyId . '</script>';
;
?>

<div class="header">
  <h1 id="ceremony_name">
    <a href="index.php"><img src="images/vowscape-logo.svg" height="100 px" alt="VowScape"></a>
    <br><em>Celebrating Marriage Ceremonies Around The World</em>
  </h1>
</div>

<div class="row">
  <div class="col-3 col-s-3 menu">
    <ul>
        <table id="datatable" class="display">
          <thead>
            <tr>
              <th></th>
            </tr>
          </thead>
          <tbody>
                <?php
                $sql = "SELECT id,name FROM ceremonies;";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo '<tr><td class="clickable" onclick="displayCeremony(' . $row["id"] . ')">' . $row["name"] . '</td></tr>';
                  }
                } else {
                  echo "0 results";
                } ?>
          </tbody>
        </table>
    </ul>
    <p></p>
    <a href="crud.php">Edit</a>
    </form>

  </div>

  <!-- This div below is populated with HTML dynamically by JS's displayCeremony function! -->
  <div id="ceremony-body" class="col-6 col-s-9">
  </div>

  <div class="col-3 col-s-12">
    <div class="aside">
      <h2>Ceremonies</h2>
      <p>A ceremony serves to mark significant events or transitions, fostering communal bonding, cultural continuity, and emotional closure. It provides a symbolic framework for expressing values, honoring achievements, and acknowledging rites of passage, thereby enriching individual and collective experiences within a society or group.</p>
      <h2>Countries</h2>
      <p>Different countries develop unique ceremonies reflecting their cultural heritage, beliefs, and traditions. Varied ceremonies celebrate diverse occasions such as births, weddings, and religious rites, incorporating distinct rituals, symbols, and customs. These ceremonies serve as expressions of identity, fostering cohesion and preserving cultural richness across nations.</p>
      <h2>Traditions</h2>
      <p>Religious traditions imbue ceremonies with sacred meaning, rituals, and symbolism, reflecting beliefs and values. They dictate ceremonial structure, attire, and practices, guiding participants' actions and expressions of faith. These traditions often emphasize spirituality, community, and transcendence, deepening the significance and impact of the ceremony within religious contexts.</p>
      <h2>Roles</h2>
      <p>Individual roles in a ceremony contribute to its organization, execution, and significance. Each role holds specific responsibilities, from officiating to participating, guiding the flow and meaning of the event. Through their actions, individuals fulfill cultural expectations, honor traditions, and ensure a ceremony's success and meaningfulness.</p>
    </div>
  </div>
</div>

<div class="footer">
  <p><a href="https://creativecommons.org/publicdomain/zero/1.0/"><img src="https://mirrors.creativecommons.org/presskit/buttons/88x31/png/cc-zero.png" width="81" height="31"></a></p>
</div>


<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>
<!-- DataTables JS -->
<script type="text/javascript" src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
<script>

    // Datatable parameters

    $(document).ready(function() {
        $('#datatable').DataTable({
            info: true,
        ordering: true,
        paging: true
        });
    });

    // This JS function uses AJAX to pass a ceremony ID to PHP
    // Requires jQuery!

    function displayCeremony(ID) {
        var javascriptValue = ID;
        $.ajax({
            url: 'ceremony_body.php',
            type: 'POST',
            data: {javascriptValue: javascriptValue},
            success: function (response) {
                // Handle the response from PHP if needed
                document.getElementById("ceremony-body").innerHTML = response;

            },
            error: function (xhr, status, error) {
                // Handle errors
                console.error(xhr.responseText);
            }
        });
    }

// This function is invoked only with the page load or refresh with the random id
displayCeremony(id);
</script>
</body>
</html>

<?php
$conn->close();
?>