<?php
    require_once "config/database.php";
    if($_POST["name"]=="" || $_POST["pw"]=="" ){
        // echo "請輸入帳號密碼";
        header("Location:login.php?errcode=0");
    }else{
        // if(isset($_POST["user"]) && isset($_POST["pw"])){

            $name = $_POST["name"];
            $pw = $_POST["pw"];

            $sql = "SELECT * FROM `members` WHERE m_name= '$name'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            if($pw == $row["m_pw"]){
                //密碼正確
                // echo  "success";
                $_SESSION["NAME"] = $row["m_name"];
                $_SESSION["ID"] = $row["m_id"];
                $_SESSION["MAIL"] = $row["m_mail"];
                $_SESSION["LEVEL"] = $row["m_level"];
                // header("Location:index.php");
                // $_SESSION["LEVEL"] = $row["level"];
                if($_SESSION["LEVEL"]==1){
                    header("Location:backend/index.php");
                }else{
                    header("Location:index.php");
                }
                // switch($_SESSION["LEVEL"]){
                //     case 0:
                //         $_SESSION["LEVEL"] = "管理員";
                //         break;
                //     case 1:
                //         $_SESSION["LEVEL"] = "一般會員";
                //         break;
                // }
                #echo $_SESSION["USER"]."你好，您的權限為".$_SESSION["LEVEL"];
            }else{
                //帳號或密碼錯誤
                // echo "error";
                header("Location:login.php?errcode=1");
            }
        // }
    }
?>