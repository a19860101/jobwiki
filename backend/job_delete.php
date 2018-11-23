<?php
	require_once "../config/database.php";
    require_once "../config/function.php";
    access_denied();
	$sql = "DELETE FROM `jobs` WHERE j_id = ".$_GET["jid"];
	$sql2 = "DELETE FROM `c_m_ref` WHERE id=".$_GET["id"];
	mysqli_query($conn,$sql);
	mysqli_query($conn,$sql2);
	?>
	<script>history.go(-2);</script>
	
