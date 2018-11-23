<?php
    function access_denied(){
        // $level = $_SESSION["LEVEL"];
        // }
        if(!isset($_SESSION["NAME"])){
            header("Location:../index.php");
        }
    }
