<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   $_SESSION['loggedOut'] = true;
   echo 'You have cleaned session';
   header('Location: ../login.php');
?>