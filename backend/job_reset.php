<?php
	require_once "../config/database.php";
    require_once "../config/function.php";
    access_denied();
	$NAME = $_SESSION["NAME"];
	$sql_max = "SELECT MAX(`j_id`) FROM `jobs`";
	$max = mysqli_query($conn,$sql_max);
	$m = mysqli_fetch_array($max);
	$maxJid = $m[0];
	echo $maxJid;
	$sql = "UPDATE `jobs` SET check_id = '$NAME',update_datetime = NOW() WHERE `j_id` =".$_GET['jid'];
	$sql2 = "UPDATE `c_m_ref` SET update_datetime = NOW() ,check_id = '$NAME' WHERE id=".$_GET["id"];
	mysqli_query($conn,$sql);
	mysqli_query($conn,$sql2);
	
	echo "PL";
