<?php
if(isset($_POST['javascriptValue'])) {
  $phpValue = $_POST['javascriptValue'];

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

  $sql = "SELECT id,name,description,tradition,country FROM ceremonies WHERE id = $phpValue;";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      echo
        '<h2>' . $row["name"] . '</h2>';
      echo '<p>' . $row["description"] . '</p>';
      if ($row["tradition"] != '') {
        echo '<h2>Tradition</h2><p>' . $row["tradition"] . '</p>';
      }
      if ($row["country"] != '') {
        echo '<h2>Country</h2><p>' . $row["country"] . '</p>';
      }
      echo '<p></p><img src="media/' . $row["id"] . '.jpg" width="600px" alt="(Ceremony Picture Unavailable)"></p>';
    }
  } else {
    echo "0 results";
  }
} else {
  echo "No value received";
}

$conn->close();
?>
