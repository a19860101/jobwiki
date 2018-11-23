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
    <h2>薪資統計</h2>
    <hr>
    <?php
		if(isset($_POST["ps"])){
			$pid = $_POST["pid"];
			$per = $_POST["per"];
			if($per==0){
				mysqli_query($conn,"UPDATE `salary` SET permission=1 WHERE id=".$pid);
			}else{
				mysqli_query($conn,"UPDATE `salary` SET permission=0 WHERE id=".$pid);
			}
		}
	
        $sql = "SELECT * FROM `salary`";
        $result = mysqli_query($conn,$sql);
    ?>
    <h3>所有薪資紀錄</h3>
<!--    <ul class="nav flex-column">-->
       <table id="myTable" class="display">
       	<thead>
       		<tr>
       			<th>編號</th>
       			<th>職務代碼</th>
       			<th>使用者</th>
       			<th>年資</th>
       			<th>新資</th>
       			<th>統一編號</th>
       			<th>驗證</th>
       			<th>動作</th>
       		</tr>
       	</thead>
       	<tbody>
        <?php while($row=mysqli_fetch_assoc($result)){?>
           <tr>
				<td><?php echo $row["id"]?></td>
				<td><?php echo $row["c_id"]?></td>
				<td><?php echo $row["m_id"]?></td>
				<td><?php echo $row["year"]?></td>
				<td><?php echo $row["money"]?></td>
				<td><?php echo $row["company_id"]?></td>
				<td>
					<?php 
						switch($row["permission"]){
							case 0:
								echo "<span class='text-danger'>未審核</span>";
								break;
							case 1:
								echo "<span class='text-primary'>已審核</span>";
								break;
						}
					?>
          		</td>
          		<td>
          			<form action="" method="post">
          				<input type="hidden" name="pid" value="<?php echo $row["id"];?>">
          				<?php if($row["permission"]==0){ ?>
          				<input type="hidden" name="per" value="<?php echo $row["permission"];?>">
          				<input type="submit" value="通過" name="ps" class="btn btn-sm btn-success" onclick="return confirm('確認通過？')">
          				
						<?php }else{ ?>
       					<input type="hidden" name="per" value="<?php echo $row["permission"];?>">
        				<input type="submit" value="取消" name="ps" class="btn btn-sm btn-danger">
         				<?php } ?>
          			</form>
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
		"order":[[0,"asc"]]
	});
})
</script>
