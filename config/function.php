<?php
    function access_denied(){
        // $level = $_SESSION["LEVEL"];
        // switch($level){
        //     case 0:
        //         header("Location:../backend/index.php");
        //         break;
        //     case 1:
        //         header("Location:../index.php");
        //         break;
        //     // default:
        //         // header("Location");
        // }
        if(!isset($_SESSION["NAME"])){
            header("Location:../index.php");
        }
        // echo "test";
    }
