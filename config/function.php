<?php
    function access_denied(){
        $level = $_SESSION["LEVEL"];
        // switch($_SESSION["LEVEL"]){
        //     case 0:
        //         header("Location:../index.php");
        //         break;
        //     case 1:
        //         header("Location:../backend/index.php");
        //         break;
        //     // default:
        //         // header("Location");
        // }
        if(!isset($level)||$level==0){
            header("Location:../index.php");
        }

        // echo "test";
    }
