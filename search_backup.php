<?php 
    require_once "config/database.php";
    include "include/header.php";
    include "include/nav.php";
    include "include/sidebar.php";
    include "include/search_.php";
?>
    <div class="z-container pt-5" id="search_panel">
    <hr>
<?php
    $search = $_GET["search"];
    $cat = $_GET["cat"];
    if($cat=="all"){
//        $sql = "SELECT * FROM `categories` WHERE c_level=3 AND c_name LIKE '%$search%' OR c_keywords LIKE '%$search%' ";
		$sql = "SELECT * FROM `categories` LEFT JOIN `jobs` ON categories.c_id = jobs.c_id AND jobs.create_datetime = (SELECT MAX(create_datetime) FROM `jobs` WHERE c_id=categories.c_id)
WHERE c_level = 3 AND c_name LIKE '%$search%' OR c_keywords LIKE '%$search%' OR j_define LIKE '%$search%' OR j_content LIKE '%$search%' OR j_similar LIKE '%$search%' OR j_ability LIKE '%$search%'";
        $result = mysqli_query($conn,$sql);
        $nums = mysqli_num_rows($result);

        $sql_search = "INSERT INTO `search`(search_name,search_cat)VALUES('$search','$cat')";
        mysqli_query($conn,$sql_search);
		
    ?>
    <div class="mb-3"> 共搜尋到<?php echo $nums; ?>筆資料 </div>
    <?php
	if($nums>0){
	?>
	<?php
        while($row = mysqli_fetch_assoc($result)){
		$cname = $row["c_name"];
		$key = $row["c_keywords"];

		if($cname == $search){
    ?>
        <h4>
            <a href="detail.php?cid=<?php echo $row["c_id"];?>&cname=<?php echo $row["c_name"];?>&d0=<?php echo $row["c_no"]?>" class="text-info"><?php echo $row["c_name"];?></a>
        </h4>
    <?php
		}
        }
	}else{
		echo "no";
	}
    }else{
//        $sql = "SELECT * FROM `categories` WHERE c_name LIKE '%$search%'  OR c_keywords LIKE '%$search%' AND c_list1 = '$cat'";
		$sql = "SELECT * FROM `categories` LEFT JOIN `jobs` ON categories.c_id = jobs.c_id AND jobs.create_datetime = (SELECT MAX(create_datetime) FROM `jobs` WHERE c_id=categories.c_id)
WHERE c_level = 3  AND c_list1 = '$cat'  AND ( c_name LIKE '%$search%' OR c_keywords LIKE '%$search%' OR j_define LIKE '%$search%' OR j_content LIKE '%$search%' OR j_similar LIKE '%$search%' OR j_ability LIKE '%$search%' )";
        $result = mysqli_query($conn,$sql);
        $nums = mysqli_num_rows($result);
        $sql_search = "INSERT INTO `search`(search_name,search_cat)VALUES('$search','$cat')";
        mysqli_query($conn,$sql_search);

    ?>
        <div class="mb-3">共搜尋到<?php echo $nums; ?>筆資料 </div>
    <?php
        while($row = mysqli_fetch_assoc($result)){
    ?>
        <h4 >
            <a href="detail.php?cid=<?php echo $row["c_id"];?>&cname=<?php echo $row["c_name"];?>&d0=<?php echo $row["c_no"]?>" class="text-info"><?php echo $row["c_name"];?></a>
        </h4>
    
    <?php        
    
        }
    }
?>
    </div>
<?php include "include/footer.php"; ?>
<script>
$(function(){
    $(".list1").on("click",function(){
        $(this).find(".list2").slideToggle();
    })
	let h = $("#search_panel").height();
	if(h>600){
		$("body").css("height","auto");
		$("#z-menu").css("height","100%");
	}
})
</script>