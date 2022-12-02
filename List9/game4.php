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
    <title>Game 4</title>
    <link rel="stylesheet" href="css/game-style.css">
</head>
<body>
    <h1>insert numbers to get their sum!</h1>
    <button class="action-button" id="startBtn">add number!</button>
    <button class="action-button" id="restartBtn">restart!</button>
    <script src="scripts/game4.js"></script>
</body>
</html>