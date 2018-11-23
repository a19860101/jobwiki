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
        $sql_1 = "SELECT * FROM `categories` WHERE c_level = 3";
        $result_1 = mysqli_query($conn,$sql_1);
    ?>
    <h3>所有職務</h3>
<!--    <ul class="nav flex-column">-->
       <table id="myTable" class="display">
       	<thead>
       		<tr>
       			<th>職務名稱</th>
       			<th>職務代碼</th>
       			<th>版本</th>
       		</tr>
       	</thead>
       	<tbody>
        <?php while($row_1=mysqli_fetch_assoc($result_1)){?>
           <tr>
           		<td>
           		<a href="job_detail.php?id=<?php echo $row_1["c_id"];?>"><?php echo $row_1["c_name"];?></a>
           		</td>
           		<td><?php echo $row_1["c_no"];?></td>
           		<td>
           			<a href="jobs_vc_list.php?cid=<?php echo $row_1["c_id"];?>">版本列表</a>
           		</td>
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
		"order":[[1,"asc"]]
	});
})
</script>
