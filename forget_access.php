<?php
	require_once("config/database.php");
	$name = $_POST["name"];
	$mail = $_POST["mail"];
	$pw = md5($_POST["pw"]);
	$pw2 = md5($_POST["pw2"]);

	$sql = "SELECT * FROM `members` WHERE m_name = '$name'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);

	
	if(isset($row["m_name"])){
		if($row["m_mail"]==$mail){
			$sql_reset = "UPDATE `members` SET m_pw='$pw' WHERE m_name = '$name'";
			mysqli_query($conn,$sql_reset);
//			echo "重設成功";
			header("location:login.php?reset=0");
			
		}else{
//			echo "E-MAIL不符合";
			header("location:forget.php?reset=1");
		}
		
	}else{
//		echo "帳號不符合";
		header("location:forget.php?reset=2");
	}