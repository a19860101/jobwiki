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
    <h2>最新修改記錄</h2>
    <hr>
    <?php
		$cid = $_GET["cid"];
        $sql = "SELECT * FROM `c_m_ref` LEFT JOIN `categories` ON c_m_ref.c_id = categories.c_id WHERE check_id is null";
        $result = mysqli_query($conn,$sql);
    ?>
    <h3>記錄列表d</h3>
<!--    <ul class="nav flex-column">-->
       <table id="myTable" class="display">
       	<thead>
       		<tr>
       			<th>修改者</th>
       			<th>職務ID</th>
       			<th>修改時間</th>
       			

       		</tr>
       	</thead>
       	<tbody>
        <?php while($row=mysqli_fetch_assoc($result)){?>
           <tr>
				<td><?php echo $row["m_id"];?></td>
				<td>
					<a href="jobs_vc_list.php?cid=<?php echo $row["c_id"];?>">
						<?php echo $row["c_name"];?>
					</a>
					
				</td>
				<td><?php echo $row["update_datetime"];?></td>
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
		"order":[[2,"desc"]]
	});
})
</script>
