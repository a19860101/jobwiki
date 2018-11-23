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
    <h2>會員列表</h2>
    <hr>
    <?php
        $sql = "SELECT * FROM `members`";
        $result = mysqli_query($conn,$sql);
	
		$r_0 = mysqli_query($conn,"SELECT * FROM `members` WHERE m_level = 0");
		$r_1 = mysqli_query($conn,"SELECT * FROM `members` WHERE m_level = 1");
		$r_2 = mysqli_query($conn,"SELECT * FROM `members` WHERE m_level = 2");
	
		$total_0 = mysqli_num_rows($r_0);
		$total_1 = mysqli_num_rows($r_1);
		$total_2 = mysqli_num_rows($r_2);
    ?>
<!--    <h3>所有版本</h3>-->
<!--    <ul class="nav flex-column">-->
      	<div>
      		目前共有 <?php echo $total_2; ?> 位監察員 /
      		 <?php echo $total_1; ?> 位小編 /
      		 <?php echo $total_0; ?> 位一般會員
      	</div>
       <table id="myTable" class="display">
       	<thead>
       		<tr>
       			<th>會員編號</th>
       			<th>會員帳號</th>
       			<th>等級</th>
       			<th>申請時間</th>
       			<th>動作</th>
       		</tr>
       	</thead>
       	<tbody>
        <?php while($row=mysqli_fetch_assoc($result)){?>
           <tr>
				<td><?php echo $row["m_id"];?></td>
				<td><?php echo $row["m_name"];?></td>
				<td>
					<?php 
						switch($row["m_level"]){
							case 0:
								echo "一般會員";
								break;
							case 1:
								echo "小編";
								break;
							case 2:
								echo "監察員";
								break;
						}		
					?>
					
				</td>
				<td><?php echo $row["create_date"];?></td>
				<td>
					<?php
						$id = $row["m_id"];
						switch($row["m_level"]){
							case 0:
								echo "<a href='levelSw.php?id=".$id."&level=1' class='mr-1 btn btn-info btn-sm'>小編</a>";
								echo "<a href='levelSw.php?id=".$id."&level=2' class='mr-1 btn btn-warning btn-sm'>監察員</a>";
								break;
							case 1:
								echo "<a href='levelSw.php?id=".$id."&level=0' class='mr-1 btn btn-primary btn-sm'>一般會員</a>";
								echo "<a href='levelSw.php?id=".$id."&level=2' class='mr-1 btn btn-warning btn-sm'>監察員</a>";
								break;
							case 2:
								echo "<a href='levelSw.php?id=".$id."&level=0' class='mr-1 btn btn-primary btn-sm'>一般會員</a>";
								echo "<a href='levelSw.php?id=".$id."&level=1' class='mr-1 btn btn-info btn-sm'>小編</a>";
								break;
						}
					?>
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
		"order":[[2,"desc"]]
	});
})
</script>
