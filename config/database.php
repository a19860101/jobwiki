<?php
// $host = "localhost";
// $user = "admin";
// $pw = "admin";
// $db = "lcclcclc_jobwiki";
$host = "localhost";
$user = "jobwiki_org";
$pw = "Pmu852Ts67";
$db = "jobwiki_org";

$conn = new mysqli($host,$user,$pw,$db);

    if($conn->connect_error){
        die("database error".connect_error);
    }
$conn->query("SET NAMES utf8");
session_start();