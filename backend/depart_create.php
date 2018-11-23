<?php 
    require_once "../config/database.php";
    require_once "../config/function.php";
    access_denied();
    include "include/header.php";
    include "include/nav.php";
    include "include/sidebar.php";

?>
<?php
	$sql = "SELECT * FROM `departments`";
	$result = mysqli_query($conn,$sql);
	
?>
<!--內容-->
<div class="container">
    <div class="row">
		<div class="col-md-12">
			<h2>相關科系</h2>
		</div>
		<div class="col-md-12">
			<form action="">
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
					<input type="submit" class="btn btn-info"value="新增">
				</div>
				
				
			</form>
		</div>
	</div>
</div>

<!---->

<?php include "include/footer.php"; ?>
