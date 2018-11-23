<?php 
    require_once "../config/database.php";
    require_once "../config/function.php";
    access_denied();
    include "include/header.php";
    include "include/nav.php";
    include "include/sidebar.php";

?>
<?php
	$member = $_SESSION['NAME'];
	$mid = $_SESSION["ID"];
	$sql = "SELECT * FROM `c_m_ref` LEFT JOIN `categories` ON c_m_ref.c_id = categories.c_id WHERE m_id='$mid'";
	$result = mysqli_query($conn,$sql);
	
?>
<div class="container">
	<div class="row">
<!--
		<div class="col-md-12 mt-3">
			<div class="nav">
				<a href="#" class="nav-link btn-info">修改資料</a>
			</div>
		</div>
-->
		<div class="col-md-12 mt-3">
			<table class="table table-bordered">
				<tr>
					<th>修改職務</th>
					<th>修改時間</th>
				</tr>
				<?php 
					while($row = mysqli_fetch_assoc($result)){ 
				?>
				<tr>
					<td><?php echo $row["c_name"];?></td>
					<td><?php echo $row["update_datetime"];?></td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>
</div>
<?php include "include/footer.php"; ?>
