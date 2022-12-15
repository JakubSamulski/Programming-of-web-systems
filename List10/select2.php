<?php
$zmienna ='nazwisko';
$$zmienna =  $_GET['name'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "game_app_database";

$lastName = $_GET['name'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql2 = "SELECT Id, Username, Password, FirstName, LastName FROM users WHERE LastName IN ('$lastName')";
$result = $conn->query($sql2);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_row()) {
    echo quotemeta("id.: ") . $row[0]. " - Login: " . $row[1]. " - Name: " . $row[2]. " - LastName: " . $row[3]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>  