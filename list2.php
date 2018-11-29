<?php 
    require_once "config/database.php";
    include "include/header.php";
    include "include/nav.php";
    include "include/sidebar.php";
    include "include/search_.php";
?>

<div class="z-container pt-5 main" id="list2_panel">

<hr>
		<?php 
				$s_crumbs = "SELECT * FROM `categories` WHERE c_no =".$_GET["d0"];
				$r_crumbs = mysqli_query($conn,$s_crumbs);
				$ro_crumbs = mysqli_fetch_assoc($r_crumbs);
				#echo "{$ro_crumbs["c_list1"]}/{$ro_crumbs["c_list2"]}1111";
			?>
	<?php #if($_SESSION["LEVEL"]==2){?>
	<nav aria-label="breadcrumb" class="my-3">
				<a href="index.php">Home</a>
				<i class="fas fa-angle-right"></i>
				<?php if(isset($_GET["list1"])){ ?>
					<?php echo $ro_crumbs["c_list1"];?>
					
				<?php } ?>
				<?php if(isset($_GET["list2"])){ ?>
					<a href="list2.php?list1=<?php echo $ro_crumbs["c_list1"];?>&d0=<?php echo $ro_crumbs["c_no"]+100;?>"><?php echo $ro_crumbs["c_list1"];?></a>
					<i class="fas fa-angle-right"></i>
					<?php echo $ro_crumbs["c_list2"];?>
				<?php } ?>
				
			</nav>
<?php #}?>
    <div class="wrapper text-md-left text-center">
        <?php 
            $li1 = $_GET["list1"];
            if(isset($li1)){
                $sql_index2 = "SELECT * FROM `categories` WHERE c_list1 = '$li1'";
                $result_list2 = mysqli_query($conn,$sql_index2);

            }else{
            $l2= $_GET["list2"];
            // echo $l2;

            $sql_list2 = "SELECT * FROM `categories` WHERE c_list2 = '$l2'";
            $result_list2 = mysqli_query($conn,$sql_list2);
            }
            // echo $result_list2;
			$row_list2=mysqli_fetch_assoc($result_list2);
			
			if(isset($_GET["list1"])){
				echo "<h4 class='text-info mb-5'>{$_GET["list1"]}</h4>";
			}
			if(isset($_GET["list2"])){
				echo "<h4 class='text-info mb-5'>{$_GET["list2"]}</h4>";
			}
//			$s = "SELECT * FROM `jobs` WHERE c_id = {$row_list2["c_id"]}";
//			$r = mysqli_query($conn,$s);
//			$ro = mysqli_fetch_assoc($r);
			$l1 = $_GET["list1"];
			$s = "SELECT DISTINCT c_list2 FROM `categories` WHERE c_list1 = '$l1'";
			$r = mysqli_query($conn,$s);
//			$ro = mysqli_fetch_assoc($r);
			#echo "<p>{$ro["j_content"]}</p>";
			while($ro = mysqli_fetch_assoc($r)){
				$rows[] = $ro;	
			}

//			foreach($rows as $rs){
				
//			echo $rs["c_list2"];
//			}

            while($row_list2=mysqli_fetch_assoc($result_list2)){
				$rows2[] = $row_list2;
				if($row_list2["c_name"]!="" ){
					
							
            ?>
                    
        <?php }  }?>
        
        <?php if(isset($_GET["list2"])){ ?>
        <?php foreach($rows2 as $rs2){?>
        <a class=" cat-text btn btn-outline-dark" href="detail.php?cid=<?php echo $rs2["c_id"];?>&cname=<?php echo $rs2["c_name"];?>&d0=<?php echo $rs2["c_no"]?>"><?php echo $rs2["c_name"];?></a>
        
        <?php } }?>
        <?php if(isset($_GET["list1"])){ ?>
        <?php
			foreach($rows as $rs){
				echo "<h5 class='my-4'>".$rs["c_list2"]."</h5>";
				foreach($rows2 as $rs2){
					if($rs["c_list2"]==$rs2["c_list2"] && $rs2["c_name"]!==""){
//						echo $rs2["c_name"];
		?>
			<a class=" cat-text btn btn-outline-dark" href="detail.php?cid=<?php echo $rs2["c_id"];?>&cname=<?php echo $rs2["c_name"];?>&d0=<?php echo $rs2["c_no"]?>"><?php echo $rs2["c_name"];?></a>
		<?php
						
					}
				}
			}
		?>
       <?php } ?>
        
    </div>
    <hr>
    <h4 class="text-info mt-5 font-weight-bold mb-5 rel_careers">相關職缺</h4>
    <div class="careers row mt-5 position-relative">
    	<a href="https://www.1111.com.tw/job-bank/job-index.asp?si=1&d0=<?php echo $_GET["d0"];?>" class="btn btn-info my-4 position-absolute" target="_blank" style="right:15px;bottom: -60px">觀看更多職缺</a>
    	<div class="spinner"></div>
    </div>

<!--
    <div class="text-right">
			<a href="https://www.1111.com.tw/job-bank/job-index.asp?si=1&d0=<?php #echo $_GET["d0"];?>" class="btn btn-info my-4" target="_blank">觀看更多職缺</a>
	</div>
-->
</div>


<?php include "include/footer.php"; ?>
<script>
$(function(){
	let h = $("#list2_panel").height();
	if(h>200){
		$("body").css("height","auto");
		$("#z-menu").css("height","100%");
	}
//	let q = location.search.slice(-6);
	let q = location.search;

        $.ajax({
//            url:`https://www.1111.com.tw/LoginService/empHandler.ashx?apFun=empSearch&d0=${q}&size=6`,
			url:"api/career2.php"+q,
            dataType:"json",
            beforeSend:function(){
                $(".spinner").show();
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
                     let content = "<div class='col-xl-3 mb-4'><div class='career border p-3'><h5><a href='"+d.link+"' target='_blank'>"+d.position0.substr(0,20)+"</a></h5><p class='text-muted mb-1'><a href='"+d.organ_link+"' class='text-info' target='_blank'>"+d.organs_organ.substr(0,15)+"</a></p><div><small>"+d.salary+"/"+exp+"/"+grade+"</small></div><a href='"+d.link+"' target='_blank' class='btn btn-outline-dark go'>馬上投履歷</a></div></div>";
                    $(".careers").append(content);
                }) 
            },
            error:function(){
                console.log("error")
            }
        })
	
})
</script>
