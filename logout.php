<?php
    session_start();
    if(isset($_GET["logout"])&&$_GET["logout"]==true){
        session_unset();
    }
    header("Location:index.php");
?>