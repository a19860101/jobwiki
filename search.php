<?php 
    require_once "config/database.php";
    include "include/header.php";
    include "include/nav.php";
    include "include/sidebar.php";
    include "include/search_.php";
?>
    <div class="z-container pt-5">
    <hr>
<?php
    $search = $_GET["search"];
    $cat = $_GET["cat"];
    if($cat=="all"){
        $sql = "SELECT * FROM `categories` WHERE c_name LIKE '%$search%'";
        $result = mysqli_query($conn,$sql);
        $nums = mysqli_num_rows($result);

        $sql_search = "INSERT INTO `search`(search_name,search_cat)VALUES('$search','$cat')";
        mysqli_query($conn,$sql_search);
    ?>
    <div class="mb-3"> 共搜尋到<?php echo $nums; ?>筆資料 </div>
    <?php
        while($row = mysqli_fetch_assoc($result)){
    ?>
        <h4 >
            <a href="detail.php?cid=<?php echo $row["c_id"];?>&cname=<?php echo $row["c_name"];?>" class="text-info"><?php echo $row["c_name"];?></a>
        </h4>
    <?php
        }
    }else{
        $sql = "SELECT * FROM `categories` WHERE c_name LIKE '%$search%' AND c_list1 = '$cat'";
        $result = mysqli_query($conn,$sql);
        $nums = mysqli_num_rows($result);
        $sql_search = "INSERT INTO `search`(search_name,search_cat)VALUES('$search','$cat')";
        mysqli_query($conn,$sql_search);

    ?>
        <div class="mb-3"> 共搜尋到<?php echo $nums; ?>筆資料 </div>
    <?php
        while($row = mysqli_fetch_assoc($result)){
    ?>
        <h4 >
            <a href="#" class="text-info"><?php echo $row["c_name"];?></a>
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
})
</script>