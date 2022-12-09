<?php
$val = $_POST['highest_score'];

if(isset($_COOKIE['highest_score'])){
    if(intval($_COOKIE['highest_score'])<intval($val)){
        $val = $_COOKIE['highest_score'];
    }
}

setcookie("highest_score","$val",time()+60*1);
  ?>
