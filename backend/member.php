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
	$sql = "SELECT * FROM `members` WHERE m_name='$member'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
?>
<div class="container">
	<div class="row">
		<div class="col-md-12 mt-3">
			<div class="nav">
				<a href="member_edit.php" class="nav-link btn-info">修改資料</a>
			</div>
		</div>
		<div class="col-md-12 mt-3">
			<table class="table table-bordered">
				<tr>
					<td>帳號</td>
					<td><?php echo $row["m_name"]; ?></td>
				</tr>
				<tr>
					<td>MAIL</td>
					<td><?php echo $row["m_mail"]; ?></td>
				</tr>
				<tr>
					<td>姓名</td>
					<td><?php echo $row["m_fullname"]; ?></td>
				</tr>
				<tr>
					<td>手機</td>
					<td><?php echo $row["m_phone"]; ?></td>
				</tr>
				<tr>
					<td>性別</td>
					<td><?php echo $row["m_gender"]; ?></td>
				</tr>
			</table>
		</div>
	</div>
</div>
<?php include "include/footer.php"; ?>
