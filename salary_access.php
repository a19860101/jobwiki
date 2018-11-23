<?php 
    require_once "config/database.php";
    require_once "config/function.php";
    access_denied();
	$money=$_POST["money"];
	$year=$_POST["year"];
	$companyId = $_POST["companyId"];
	$mid = $_SESSION["ID"];	
	$cid = $_POST["cid"];
	$sql = "INSERT INTO `salary`(money,year,company_id,c_id,m_id)VALUES('$money','$year','$companyId','$cid','$mid')";
	mysqli_query($conn,$sql);
	
?>

