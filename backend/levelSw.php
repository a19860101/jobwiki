<?php
    require_once "../config/database.php";
    require_once "../config/function.php";
    access_denied();
	$id = $_GET["id"];
	$level = $_GET["level"];
//	echo $level;
	$sql = "UPDATE `members` SET m_level=".$level." WHERE m_id=".$id;
	mysqli_query($conn,$sql);	
	header("Location:member_list.php");
	