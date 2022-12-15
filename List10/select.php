<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<h1> Tabela users:</h1><br>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "game_app_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Id, Username, Password, FirstName, LastName FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["Id"]. " - Login: " . $row["Username"]. " - Name: " . $row["FirstName"]. " - LastName: " . $row["LastName"]. "<br>";
  }
} else {
  echo "0 results";
}


$conn->close();
?>  
<br>
<h1> Filtrowanie po Nazwisku</h1><br>
<form action="select2.php" method="get">
Nazwisko: <input name = "name" type = "text" />
</form>
</body>
</html>