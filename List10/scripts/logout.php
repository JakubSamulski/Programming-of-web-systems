<?php
   session_start();
   session_unset();
   $_SESSION['loggedOut'] = true;
   echo 'You have cleaned session';
   header('Location: ../login.php');
?>