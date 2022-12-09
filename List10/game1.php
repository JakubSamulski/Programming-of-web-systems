<?php
session_start();
?>

<?php
if (!isset($_SESSION['username']) || $_SESSION['username'] == "") {
    header("Location: error_403.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/game-style.css">
    <title>Game 1</title>
</head>
<body>
    <h1>Guess the month!</h1>
    <button id="start" class="action-button">Start game</button>
    <br>
    <br>
    <button class="btn action-button" id="1">January</button>
    <button class="btn action-button" id="2">February</button>
    <button class="btn action-button" id="3">March</button>
    <button class="btn action-button" id="4">April</button>
    <button class="btn action-button" id="5">May</button>
    <button class="btn action-button" id="6">June</button>
    <button class="btn action-button" id="7">July</button>
    <button class="btn action-button" id="8">August</button>
    <button class="btn action-button" id="9">September</button>
    <button class="btn action-button" id="10">October</button>
    <button class="btn action-button" id="11">November</button>
    <button class="btn action-button" id="12">December</button>
    <script src="scripts/game1.js"></script>
</body>
</html>