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
    <title>Game 3</title>
    <link rel="stylesheet" href="css/game-style.css">
</head>
<body>
    <h1>Guess the number!</h1>
    <button class="action-button" id="startBtn">Start game!</button>
   
        <div class="highest_score">
        <?php
        if(array_key_exists('highest_score',$_COOKIE)){
            echo "Highest Score: " . $_COOKIE['highest_score'] . " guesses";
        }
        else {
            echo "Highest Score: None";
        }
    ?>

    
    <p id="cookies_id"></p>
    <script>document.getElementById("cookies_id").innerHTML = document.cookie;</script>
        </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="scripts/game3.js" href="js/jquery-1.11.3.min.js"></script>
</body>
</html>