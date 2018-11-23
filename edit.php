<?php 
    require_once "config/database.php";
    include "include/header.php";
    include "include/nav.php";
?>
<?php
					if(isset($_POST["edit"])){
					
                    $define = $_POST["define"];
                    $content = $_POST["content"];
                    $similar = implode(",",$_POST["similar"]);
                    $ability = $_POST["ability"];
                    $salary = $_POST["salary"];
                    $worktime = $_POST["worktime"];
                    $path = $_POST["path"];
                    $edu = $_POST["edu"];
                    $id = $_POST["id"];
					
					$certi = $_POST["certi"];
						
					$gro = $_POST["gro"];
					$rel = $_POST["rel"];
						
					
//                    $sql_edit = "UPDATE `jobs` SET 
//                    j_define='$define',
//                    j_content='$content',
//                    j_similar='$similar',
//                    j_ability = '$ability',
//                    j_salary = '$salary',
//                    j_worktime = '$worktime',
//                    j_path = '$path',
//                    j_edu = '$edu',
//					update_datetime = NOW()
//                    WHERE c_id =".$id;
					
//					$cid=$row["j_id"];
					$mid=$_SESSION["ID"];
					$sql_edit = "INSERT INTO `jobs`(j_define,j_content,j_similar,j_ability,j_salary,j_worktime,j_path,j_edu,update_datetime,create_datetime,m_id,c_id,check_id,j_certi)VALUES('$define','$content','$similar','$ability','$salary','$worktime','$path','$edu',NOW(),NOW(),'$mid','$id',NULL,'$certi')";
//					$sql_edit = "INSERT INTO `jobs`(j_define,j_content,j_similar,j_ability,j_worktime,j_path,j_edu,update_datetime,create_datetime,m_id,c_id,check_id,j_certi)VALUES('$define','$content','$similar','$ability','$worktime','$path','$edu',NOW(),NOW(),'$mid','$id',NULL,'$certi')";
					$sql_path = "INSERT INTO `path`(p_rel,p_gro,c_id)VALUES('$rel','$gro','$id')";
					$sql_ref = "INSERT INTO `c_m_ref`(c_id,m_id,update_datetime)VALUES('$id','$mid',NOW())"; 
                    mysqli_query($conn,$sql_path);
					mysqli_query($conn,$sql_ref);
					 mysqli_query($conn,$sql_edit);
					header("Location:detail.php?cid={$_GET["cid"]}&cname={$_GET["cname"]}&d0={$_GET["d0"]}");
//					header("Location:index.php");
                }
    $sql_1 = "SELECT DISTINCT c_list1 FROM `categories`";
    $result_1 = mysqli_query($conn,$sql_1);
?>

<?php include "include/sidebar.php";?>
<?php include "include/search_.php";?>
<div class="z-container pt-5" id="edit_panel">
<hr>
    <div class="wrapper">
            <?php
                
                $cid = $_GET["cid"];
                $sql = "SELECT * FROM `jobs` WHERE `c_id` = {$cid} ORDER BY update_datetime DESC";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);

                $sql_cname = "SELECT c_name FROM `categories` WHERE c_id =".$cid;
                $result_cname = mysqli_query($conn,$sql_cname);
                $row_cname = mysqli_fetch_assoc($result_cname);
		
				$s_p = "SELECT * FROM `path` WHERE `c_id` = {$cid} ORDER BY p_id DESC";
				$r_p = mysqli_query($conn,$s_p);
				$row_p = mysqli_fetch_assoc($r_p);

            ?>
            <?php
                
            ?>
            <h2 class="text-info"><?php echo $row_cname["c_name"]?></h2>
            <form action="" method="post">
            <div class="form-group">
                <label>職務定義:</label>
                <input type="text" class="form-control" value="<?php echo $row["j_define"];?>" name="define">
            </div>
            
            <div class="form-group">
                <label>工作內容</label>
                <textarea class="form-control" rows="10" name="content" id="editor"><?php echo $row["j_content"];?></textarea>
            </div>
            <div class="form-group">
                <div class="form-group ui-widget">
                <legend>相似職務</legend>
                <?php if($_SESSION["LEVEL"]==1 || $_SESSION["LEVEL"]==2){?>
				<?php
						$sql_s = "SELECT * FROM `categories` WHERE c_level=3";
						$result_s = mysqli_query($conn,$sql_s);
							
						$ss = explode(",",$row["j_similar"]);
//						foreach($ss as $s){
//							if($s == $row_s["c_name"]){echo "checked"}
//						}
						while($row_s = mysqli_fetch_assoc($result_s)){
						
				?>
					<style>
						.checked{
							background: #fa0;
						}
					</style>
					
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="checkbox" id=""value="<?php echo $row_s["c_name"];?>" name="similar[]" <?php foreach($ss as $s){
							if($s == $row_s["c_name"]){echo "checked";}
						}?>>
					  <label class="form-check-label"><?php echo $row_s["c_name"];?></label>
					</div>

				<?php
						}
				?>
				<?php }else{ ?>
					<?php echo $row["j_similar"];?>	
				<?php }?>
				
		
            </div>
            </div>
            <div class="form-group">
                <label>須具備專業能力</label>
                <textarea class="form-control" rows="10" name="ability" id="ability"><?php echo $row["j_ability"];?></textarea>
            </div>
            <div class="form-group">
            	<label>相關證照</label>
            	<p class="small mb-3">請用,分隔職業</p>
            	<input type="text" name="certi" value="<?php echo $row["j_certi"];?>" class="form-control">
            </div>
            <div class="form-group">
                <label>薪資區間</label>
                <div class="my-3">
					<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
						新增薪資
					</button>
               </div>
               	<textarea name="salary" style="display:none;"><?php echo $row["j_salary"];?></textarea>
                <div>
          
					<?php echo $row["j_salary"];?>
				</div>
            </div>
            
            <div class="form-group">
                <label>工作時間</label>
                <textarea class="form-control" rows="10" name="worktime" id="worktime"><?php echo $row["j_worktime"];?></textarea>
            </div>
            <div class="form-group">
                <legend>職涯發展</legend>
                <!--<textarea class="form-control" rows="10" name="path" id="path"><?php #echo $row["j_path"];?></textarea>-->
                <label>相關職業</label>
                <input type="text" name="rel" class="form-control" value="<?php echo $row_p["p_rel"];?>">
                 <p class="small mb-3">請用,分隔職業</p>

                <label>成長職業</label>
                <input type="text" name="gro"  class="form-control" value="<?php echo $row_p["p_gro"];?>">
                <p class="small">請用,分隔職業</p>
            </div>
            <div class="form-group">
                <label>學歷分布</label>
				<?php if($_SESSION["LEVEL"]==1 || $_SESSION["LEVEL"]==2){ ?>
                <textarea class="form-control" rows="10" name="edu" id="edu"><?php echo $row["j_edu"];?></textarea>
				<?php }else{ ?>
				<div><?php echo $row["j_edu"]; ?></div>
				<?php } ?>
            </div>
            <input type="hidden" name="id"value="<?php echo $row["c_id"];?>">
            <input type="submit" value="編輯" class="btn btn-info" name="edit">
            <input type="button" value="取消" class="btn btn-danger" onclick="history.back()">
            </form>
            <!-------------------------------------------------------------------------------->
            <!-------------------------------------------------------------------------------->
            <!-------------------------------------------------------------------------------->
            <!-------------------------------------------------------------------------------->
            <!-------------------------------------------------------------------------------->
            <!-------------------------------------------------------------------------------->
            <!-------------------------------------------------------------------------------->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">新增薪資</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
				<!-------------------------------------------------------------------------------->
				<!-------------------------------------------------------------------------------->

					<form action="javascript:;" class="p-5" method="post" id="salary">
            	<label>年資</label>
					<select name="year" class="form-control">
						<option value="1年以下平均">1年以下平均</option>
						<option value="1~3年平均">1~3年平均</option>
						<option value="3~5年平均">3~5年平均</option>
						<option value="5~7年平均">5~7年平均</option>
						<option value="7~9年平均">7~9年平均</option>
					</select>
					<br>
					<label>薪資</label>
					<input type="text" name="money" class="form-control" placeholder="請輸入薪資" required digits="true">
					<br>
					<label>統一編號驗證</label>
					<input type="text" name="companyId" placeholder="請輸入公司統一編號" class="form-control" required digits="true" rangelength="[8, 8]">
					<br>
					<input type="hidden" name="mid" value="<?php echo $mid;?>">
					<input type="hidden" name="cid" value="<?php echo $row["c_id"];?>">
					
              	
              	<!-------------------------------------------------------------------------------->
				<!-------------------------------------------------------------------------------->
				  </div>
				  <div class="modal-footer">
<!--					<button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>-->
			  		<input type="submit" value="新增薪資" class="btn btn-info" id="sa">
				  </div>
				  </form>
				</div>
			  </div>
			</div>
            <div>
            
              </div>
             <!-------------------------------------------------------------------------------->
             <!-------------------------------------------------------------------------------->
             <!-------------------------------------------------------------------------------->
             <!-------------------------------------------------------------------------------->
             <!-------------------------------------------------------------------------------->
             <!-------------------------------------------------------------------------------->
             <!-------------------------------------------------------------------------------->

            
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
<?php if($_SESSION["LEVEL"]==1 || $_SESSION["LEVEL"]==2){?>
<script>    
	//CKEDITOR.replace( 'salary' );
</script>
<?php } ?>
<script>
    CKEDITOR.replace( 'editor' );
//    CKEDITOR.replace( 'similar' );
    CKEDITOR.replace( 'worktime' );
    CKEDITOR.replace( 'ability' );
    CKEDITOR.replace( 'edu' );
//    CKEDITOR.replace( 'path' );
</script>
<?php include "include/footer.php"; ?>

<script>
$(function(){
//	$("#sa").click(function(){
//		let data = $("#salary").serialize();
//		$.ajax({
//			url:"salary_access.php",
//			data:data,
//			method:"post",
//			success:function(){
//				console.log("success");	
//				console.log(data);
//			},
//			error:function(){
//				console.log("error");
//			}
//		})
//	})
    $(".list1").on("click",function(){
        $(this).find(".list2").slideToggle();
    })
		let h = $("#edit_panel").height();
	if(h>600){
		$("body").css("height","auto");
				$("#z-menu").css("height","100%");

	}
			$(".hamburger").on("click",function(){
			$("#z-nav").toggleClass("h-nav-open");
			console.log("htmlburger");
		})
	$("#salary").validate({
	  submitHandler: function(form) {
		  let data = $("#salary").serialize();
		  $('#exampleModal').modal('hide')
		$.ajax({
			url:"salary_access.php",
			data:data,
			method:"post",
			success:function(){
				console.log("success");	
				console.log(data);
			},
			error:function(){
				console.log("error");
			}
		})
	  }
	});
	
})
</script>