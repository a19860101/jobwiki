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
        $sql = "SELECT * FROM `c_m_ref` WHERE c_id=".$cid;
        $result = mysqli_query($conn,$sql);
	
		$sql_name = "SELECT c_name FROM `categories` WHERE c_id=".$cid;
		$result_name = mysqli_query($conn,$sql_name);
		$row_name = mysqli_fetch_assoc($result_name);
    ?>
    <h3><?php echo $row_name["c_name"]; ?>所有版本</h3>
<!--    <ul class="nav flex-column">-->
       <table id="myTable" class="display">
       	<thead>
       		<tr>
       			<th>修改者</th>
       			<th>修改時間</th>
       			<th></th>
<!--       			<th></th>-->
       		</tr>
       	</thead>
       	<tbody>
        <?php while($row=mysqli_fetch_assoc($result)){?>
           <tr>
				<td><?php echo $row["m_id"];?></td>
				<td><?php echo $row["update_datetime"];?></td>
          		<td>
          			<a href="vc_detail.php?cid=<?php echo $row["c_id"];?>&id=<?php echo $row["id"];?>&dt=<?php echo $row["update_datetime"];?>">詳細內容</a>
          		</td>
          		<!--
          		<td>
          			<a href="job_reset.php?cid=<?php echo $row["c_id"];?>&jid=<?php #echo $row["j_id"];?>" class="btn btn-info">回覆此版本</a>
          		</td>
          		-->
           </tr>
            
        <?php }?>
        </tbody>
        </table>
<!--    </ul>-->

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
