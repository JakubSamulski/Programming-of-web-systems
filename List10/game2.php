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
    <title>Game 2</title>
    <link rel="stylesheet" href="css/game-style.css">
</head>
<body>
    <h1>Guess the number! you have 3 chances</h1>
    <button class="action-button" id="startBtn">Start game!</button>
    <script src="scripts/game2.js"></script>
</body>
</html>