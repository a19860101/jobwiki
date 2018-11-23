<?php 
    require_once "../config/database.php";
    require_once "../config/function.php";
    access_denied();
    include "include/header.php";
    include "include/nav.php";
    include "include/sidebar.php";
?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<!--內容-->
<div class="container">
    <div class="row">
<div class="col-md-12 p-5">
    <h2>職務版本</h2>
    <hr>
    <?php
		$cid = $_GET["cid"];
		$id = $_GET["id"];
		$dt = $_GET["dt"];
        $sql = "SELECT * FROM `jobs` WHERE update_datetime='$dt'";
        $result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
    ?>
    <h3>職務名稱</h3>
    <h3>職務定義</h3>
    <p><?php echo $row["j_define"];?></p>
    <h3>工作內容</h3>
    <p><?php echo $row["j_content"]?></p>
    <h3>須具備專業能力</h3>
    <p><?php echo $row["j_ability"]?></p>
	<h3>薪資區間</h3>
	<p><?php echo $row["j_salary"]?></p>
	<h3>工作時間</h3>
	<p><?php echo $row["j_worktime"]?></p>
	
	<a href="job_reset.php?cid=<?php echo $row["c_id"];?>&jid=<?php echo $row["j_id"];?>&id=<?php echo $id; ?>" class="btn btn-info">回覆此版本</a>
	<a href="job_delete.php?jid=<?php echo $row["j_id"];?>&id=<?php echo $id; ?>" class="btn btn-danger">刪除此版本</a>
</div>
</div>
</div>

<!---->
<?php include "include/footer.php"; ?>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
$(function(){
	$('#myTable').DataTable({
		"pageLength": 50,
		"order":[[1,"desc"]]
	});
})
</script>
