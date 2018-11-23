<?php
	require_once("../config/database.php");
	$sql = "SELECT * FROM `categories`";
	$result = mysqli_query($conn,$sql);

	while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	
	}
echo json_encode($rows,JSON_UNESCAPED_UNICODE);
?>