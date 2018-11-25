<?php 
    require_once "config/database.php";
    include "include/header.php";
    include "include/nav.php";
?>
<?php
    $sql_1 = "SELECT DISTINCT c_list1 FROM `categories`";
    $result_1 = mysqli_query($conn,$sql_1);
    // $sql_2 = "SELECT DISTINCT c_list2 FROM `categories`";
    // $result_2 = mysqli_query($conn,$sql_2);
?>
<style>

	p {
		margin: 0!important;
	}
	li {
	margin-left: -16px!important;
	}
</style>

<?php include "include/sidebar.php";?>
<?php include "include/search_.php";?>
<div class="z-container pt-5" id="detail_panel">
<hr>
    <div class="wrapper">
    <?php if(isset($_GET["s"])&&$_GET["s"]==true){ ?>
    <a href="javascript:;" class="btn btn-primary" onclick="history.back()">返回</a>
	<?php } ?>
    <?php
                $cid = $_GET["cid"];
//                $sql_detail = "SELECT * FROM `jobs` WHERE `c_id` = {$cid} ORDER BY j_id DESC";
                $sql_detail = "SELECT * FROM `jobs` LEFT JOIN `categories` on jobs.c_id = categories.c_id WHERE jobs.c_id = {$cid} ORDER BY update_datetime DESC";
                $result_detail = mysqli_query($conn,$sql_detail);
                $row_detail = mysqli_fetch_assoc($result_detail);
		
				$s_p = "SELECT * FROM `path` WHERE `c_id` = {$cid} ORDER BY p_id DESC";
				$r_p = mysqli_query($conn,$s_p);
				$row_p = mysqli_fetch_assoc($r_p);
            ?>
            <?php if(isset($_SESSION["NAME"])){ ?>
            <div class="text-right">
                <a href="edit.php?cid=<?php echo $row_detail["c_id"];?>&cname=<?php echo $_GET["cname"];?>&d0=<?php echo $_GET["d0"];?>" class="btn btn-info">編輯</a>
            </div>
            <?php }else{ ?>
			<div class="text-right">
                <a href="javascript::" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">編輯</a>
<!--                <a href="signup.php?<?php# echo $address;?>" class="btn btn-info">編輯</a>-->
            </div>
			<?php } ?>
			<?php 
				$s_crumbs = "SELECT * FROM `categories` WHERE c_id = {$cid}";
				$r_crumbs = mysqli_query($conn,$s_crumbs);
				$ro_crumbs = mysqli_fetch_assoc($r_crumbs);
				#echo "{$ro_crumbs["c_list1"]}/{$ro_crumbs["c_list2"]}1111";
			?>
			<?php #if($_SESSION["LEVEL"]==2){?>

			<nav aria-label="breadcrumb" class="my-3">
				<a href="index.php">Home</a>
				<i class="fas fa-angle-right"></i>
				<a href="list2.php?list1=<?php echo $ro_crumbs["c_list1"];?>&d0=<?php echo $ro_crumbs["c_no"]+100;?>"><?php echo $ro_crumbs["c_list1"];?></a>
				<i class="fas fa-angle-right"></i>
				<a href="list2.php?list2=<?php echo $ro_crumbs["c_list2"];?>&d0=<?php echo $ro_crumbs["c_no"];?>"><?php echo $ro_crumbs["c_list2"];?></a>
				<i class="fas fa-angle-right"></i>
				<?php echo $ro_crumbs["c_name"];?>
			</nav>
		<?php #} ?>
            <h2 class="text-info font-weight-bold"><?php echo $row_detail["c_name"];?></h2>
            <h4 class="mt-5">職務定義</h4>
            <p>
                <?php echo $row_detail["j_define"];?>
            </p>
            <h4  class="mt-5">工作內容</h4>
            <p class="pl-3">
                <?php echo $row_detail["j_content"];?>
            </p>
            <h4  class="mt-5">相似職務</h4>
            <p>
                <?php# echo $row_detail["j_similar"];?>
				<?php
					if($row_detail["j_similar"]==""){
						echo "目前尚無資訊";
					}else{
						$similars = explode(",",$row_detail["j_similar"]);
						foreach($similars as $s){
							$ss = "SELECT * FROM `categories` WHERE c_name='$s'";
							$rr = mysqli_query($conn,$ss);
							$rro = mysqli_fetch_assoc($rr);
							if(isset($rro["c_id"])){
							echo "<a href='detail.php?cid={$rro["c_id"]}&cname={$rro["c_name"]}&d0={$rro["c_no"]}'>{$s}</a> &nbsp;";
							}
						}
					}
				?>
            </p>
            <h4  class="mt-5">須具備專業能力</h4>
            <p>
               
                <?php 
					if($row_detail["j_ability"]==""){
						echo "目前尚無資訊";
					}else{
						echo $row_detail["j_ability"];
					}
				?>
            </p>
            <h4 class="mt-5">相關證照</h4>
            <p>
            	<?php
					$certis = explode(",",$row_detail["j_certi"]);
					foreach($certis as $certi){
						if(is_null($certi) || empty($certi)){
							echo "暫無資訊";
						}else{
							echo "<div class='pl-3'>".$certi."</div>";
						}
					}
				?>
            </p>
            <!--
            <h4  class="mt-5">薪資區間</h4>
            <p>
                <?php #echo $row_detail["j_salary"];?>
            </p>
            -->
            <!--
            <h4  class="mt-5">工作時間</h4>
            <p>
                <?php #echo $row_detail["j_worktime"];?>
            </p>
            -->
            <h4  class="mt-5">職涯發展</h4>
            <div>
               	
               	<?php
					$rel = explode(",",$row_p["p_rel"]);
					$gro = explode(",",$row_p["p_gro"]);
					echo "<div class='path'>";
						#echo "<div><h5>".$row_detail["c_name"]."未來發展</h5></div>";
						echo "<div>";
						foreach($gro as $g){
//							echo "<div class='border d-inline-block p-2 m-2'>{$r}</div>";
							if($g==""){
//								echo "<div>尚無資訊</div>";
							}else{
							$gp = "SELECT * FROM `categories` WHERE c_name = '$g'";
							$gpr = mysqli_query($conn,$gp);
							$gpro = mysqli_fetch_assoc($gpr);
//							echo "<a href='detail.php?detail.php?cid={$gpro["c_id"]}&cname={$gpro["c_name"]}&d0={$pro["c_no"]}' class='btn btn-outline-dark mr-3'>{$g}</a>";
							}
						}
						echo "</div>";
						echo "<div><h5>".$row_detail["c_name"]."求職者下份工作選擇</h5></div>";
						echo "<div>";
						foreach($rel as $r){
//							echo "<div class='border d-inline-block p-2 m-2'>{$r}</div>";
							$rr = trim($r);
							$p = "SELECT * FROM `categories` WHERE c_name = '$rr'";
							$pr = mysqli_query($conn,$p);
							$pro = mysqli_fetch_assoc($pr);
							echo "<a href='detail.php?cid={$pro["c_id"]}&cname={$pro["c_name"]}&d0={$pro["c_no"]}' class='btn btn-outline-dark mr-3 mb-3'>";
							echo trim($r);
							echo "</a>";
						}
						echo "</div>";
							
//						echo "<div class='d-inline-block position-relative align-top h-100'>";
//							echo "<div class='font-weight-bold mr-5 mb-5 p-3'>{$_GET["cname"]}</div>";
//							echo "<div class='gro'>";
//							foreach($gro as $g){
//								if($g==""){
//									echo "<div class='p-3 mr-5 border mt-5'>尚無成長職務</div>";
//								}else{
//									echo "<div class='p-3 mr-5 border mt-5'>{$g}</div>";
//								}
//							}
//							echo "</div>";
//						echo "</div>";
//						echo "<div class='d-inline-block rel align-top'>";
//							foreach($rel as $r){
//								echo "<div class='p-3 mb-4 border'>{$r}</div>";
//							}
//						echo "</div>";
//					echo "</div>";
				?>
            </div>
            <h4  class="mt-5">學歷分布</h4>
            <p>
                <?php echo $row_detail["j_edu"];?>
            </p>
    </div>
    <div class="works">
    	<h2 class="text-info mt-5 font-weight-bold">工作經驗談</h2>
    	<hr>
		<h3 style="font-size:24px" class="font-weight-bold mb-1">熱門文章</h3>
    	<div class="work"></div>
		<h3 style="font-size:24px" class="font-weight-bold mb-1">最新文章</h3>
    	<div class="work2"></div>
    </div>
    <hr>
			<h2 class="text-info mt-5 font-weight-bold mb-5">相關職缺</h2>
    <div class="careers row position-relative">
<!--    	<div class="text-right">-->
			<a href="https://www.1111.com.tw/job-bank/job-index.asp?si=1&d0=<?php echo $_GET["d0"];?>" class="btn btn-info my-4 position-absolute" target="_blank" style="right:15px;top: -90px">觀看更多職缺</a>
<!--	</div>-->
    	<div class="spinner"></div>
    </div>
        
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
<!--        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>-->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       	<div class="container-fluid">
       		<div class="row text-center">
       	
        <div class="col-md-12 mb-3">請先登入會員</div>
         <div class="col-md-12 mb-3"><a href="login.php?<?php echo $address;?>" class="btn btn-info">登入</a></div>
         <div class="col-md-12 mb-3">還不是會員嗎？</div>
         <div class="col-md-12 mb-3"><a href="signup.php?<?php echo $address;?>">立即註冊</a></div>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
<!--        <button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>
<?php include "include/footer.php"; ?>
<script>
$(function(){
	let h = $("#detail_panel").height();
	if(h>600){
		$("body").css("height","auto");
		$("#z-menu").css("height","100%");

	}
//	let q = location.search.slice(-6);
	let q = location.search;
        console.log(q);
//        console.log(q.indexOf("&"));
//        console.log(q.substr(0,-8));
		$.ajaxSetup({cache: false });
        $.ajax({
//			url:`https://www.1111.com.tw/LoginService/empHandler.ashx?apFun=empSearch&d0=${q}&size=3`,
            url:"api/career.php"+q,
            dataType:"json",
            beforeSend:function(){
                $(".spinner").show();
//                console.log("loading...");
            },
            success:function(e){
                $(".spinner").hide();
                e.forEach(function(d){
					let x = d.grade.indexOf("_");
					let exp;
					if(d.experience.substr(d.experience.indexOf("_")+1)==""){
						exp = "工作經驗不拘";
					}else{
						exp = d.experience.substr(d.experience.indexOf("_")+1);
					}
					let grade;
					if(d.grade.substr(d.grade.indexOf("_")+1)=="不拘"){
						grade = "學歷不拘";
					}else {
						grade = d.grade.substr(d.grade.indexOf("_")+1);
					}
                    let content = "<div class='col-xl-3 mb-4'><div class='career border p-3'><h5><a href='"+d.link+"' target='_blank'>"+d.position0.substr(0,20)+"</a></h5><p class='text-muted'><a href='"+d.organ_link+"' class='text-info' target='_blank'>"+d.organs_organ.substr(0,15)+"</a></p><div><small>"+d.salary+"/"+exp+"/"+grade+"</small></div><a href='"+d.link+"' target='_blank' class='btn btn-outline-dark go'>馬上投履歷</a></div></div>";
                    $(".careers").append(content);
                }) 
            },
            error:function(){
                console.log("error")
            }
        })
		let duty = location.search;
//		console.log(duty.substr(duty.indexOf("d0")+3));
		$.ajax({
			url:"https://www.1111.com.tw/1000w/fanshome/api_getTopics.asp",
			data:{
				tCount:3,
				duty:duty.substr(duty.indexOf("d0")+3),
				kind:"1,2,3",
				sort:"frequent"
			},
			dataType:"json",
			success:function(datas){
				datas.forEach(function(data){
					if(data==""){
						$(".work").append("目前尚無資訊");
					}else{
					let work_content = "<div class='mb-3 w-item'><h5 class='font-weight-bold'>"+data.title+"</h5><div>"+data.content.replace(/<[^>]*>/g, "").substring(0,100)+"......<a href='"+data.link+"' target='_blank' >(閱讀更多...)</a></div>";
						
						
						
						
				$(".work").append(work_content);
					}
				})
				
			},
			error:function(){
				console.log("error");
				$(".work").append("目前尚無資訊");
			}
		})
		$.ajax({
			url:"https://www.1111.com.tw/1000w/fanshome/api_getTopics.asp",
			data:{
				tCount:3,
				duty:duty.substr(duty.indexOf("d0")+3),
				kind:"1,2,3",
				sort:"newest"
			},
			dataType:"json",
			success:function(datas){
				datas.forEach(function(data){
					if(data==""){
						$(".work").append("目前尚無資訊");
					}else{
					let work_content = "<div class='mb-3 w-item'><h5 class='font-weight-bold'>"+data.title+"</h5><div>"+data.content.replace(/<[^>]*>/g, "").substring(0,100)+"......<a href='"+data.link+"' target='_blank' >(閱讀更多...)</a></div>";
						
						
						
						
				$(".work2").append(work_content);
					}
				})
				
			},
			error:function(){
				console.log("error");
				$(".work").append("目前尚無資訊");
			}
		})
		function get_content() {
     var html = document.getElementById("txt").innerHTML;
     document.getElementById("txt").innerHTML = html.replace(/<[^>]*>/g, "");
}
		
})
</script>