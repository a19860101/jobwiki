<?php
$host = "localhost";
$user = "admin";
$pw = "admin";
$db = "lcclcclc_jobwiki";

$conn = new mysqli($host,$user,$pw,$db);

    if($conn->connect_error){
        die("database error".connect_error);
    }
$conn->query("SET NAMES utf8");
session_start();