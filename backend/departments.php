<?php 
    require_once "../config/database.php";
    require_once "../config/function.php";
    access_denied();
    include "include/header.php";
    include "include/nav.php";
    include "include/sidebar.php";

?>
<?php
	if(isset($_POST["depart"])){
		$d_no = $_POST["d_no"];
		$d_name = $_POST["d_name"];
		$c_no = $_POST["c_no"];
		$sql_insert = "INSERT INTO `departments`(d_no,d_name,c_no)VALUES('$d_no','$d_name','$c_no')";
		mysqli_query($conn,$sql_insert);
	}
	$sql = "SELECT * FROM `departments` ORDER BY `d_id` DESC";
	$result = mysqli_query($conn,$sql);
	
?>
<!--內容-->
<div class="container">
    <div class="row">
		<div class="col-md-12">
			<h2>相關學類</h2>
		</div>
		<div class="col-md-8">
			
			<table class="table table-bordered">
				<tr>
					<th>學類代碼</th>
					<th>學類名稱</th>
					<th>相關職務代碼</th>
				</tr>
				<?php while($row = mysqli_fetch_assoc($result)){ ?>
				<tr>
					<td><?php echo $row["d_no"];?></td>
					<td><?php echo $row["d_name"];?></td>
					<td><?php echo $row["c_no"];?></td>
				</tr>
				<?php } ?>
			</table>
		</div>
		<div class="col-md-4">
			<legend1>新增相關學類</legend1>
			<form action="" method="post">
				<div class="form-group">
					<label>學類代碼</label>
					<input type="text" class="form-control" name="d_no">
				</div>
				<div class="form-group">
					<label>學類名稱</label>
					<input type="text" class="form-control" name="d_name">
				</div>
				<div class="form-group">
					<label>相關職務代碼</label>
					<input type="text" class="form-control" name="c_no">
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-info"value="新增" name="depart">
				</div>
				
				
			</form>
		</div>
	</div>
</div>

<!---->

<?php include "include/footer.php"; ?>
