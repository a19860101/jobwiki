<?php
    require_once "config/database.php";
    $name = $_POST["name"];
    $pw = md5($_POST["pw"]);
    $fullname = $_POST["fullname"];
    $gender = $_POST["gender"];
    $phone = $_POST["phone"];
    $mail = $_POST["mail"];
    
    $sql_check = "SELECT * FROM `members` WHERE m_name='$name'";
    $r_check = mysqli_query($conn,$sql_check);
    $row_check = mysqli_fetch_assoc($r_check);
    if(isset($row_check)){
        header("Location:signup.php?errcode=0");
    }else{

    

    $sql = "INSERT INTO `members` (m_name,m_pw,m_fullname,m_gender,m_phone,m_mail,create_date)
            VALUES('$name','$pw','$fullname','$gender','$phone','$mail',NOW())"; 
    mysqli_query($conn,$sql);
    header("Location:index.php?reg=success");
    }