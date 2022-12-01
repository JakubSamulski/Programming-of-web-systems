<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <title>Document</title>
</head>
<body>
    <h1>Choose your favourite game <?php echo $_SESSION['username'] ?>!</h1>
    <div>
        <h2><a class="game_buttons" href="game1.html">Game 1</a></h2>
        <h2><a class="game_buttons" href="game2.html">Game 2</a></h2>
        <h2><a class="game_buttons" href="game3.html">Game 3</a></h2>
        <h2><a class="game_buttons" href="game4.html">Game 4</a></h2>
    </div>
    <div>
        <a href="scripts/logout.php">Logout</a>
    </div>
</body>
</html>