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

<?php include "include/sidebar.php";?>
<?php include "include/search_.php";?>
<div class="z-container pt-5">
<hr>
    <div class="wrapper">
    <?php
                $cid = $_GET["cid"];
                $sql_detail = "SELECT * FROM `jobs` WHERE c_id =".$cid;
                $result_detail = mysqli_query($conn,$sql_detail);
                $row_detail = mysqli_fetch_assoc($result_detail);
            ?>
            <?php if(isset($_SESSION["NAME"])){ ?>
            <div class="text-right">
                <a href="edit.php?cid=<?php echo $row_detail["c_id"];?>" class="btn btn-info">編輯</a>
            </div>
            <?php } ?>
            <h2 class="text-info"><?php echo $_GET["cname"]?></h2>
            <h4 class="mt-5">職務定義</h4>
            <p>
                <?php echo $row_detail["j_define"];?>
            </p>
            <h4  class="mt-5">工作內容</h4>
            <p>
                <?php echo $row_detail["j_content"];?>
            </p>
            <h4  class="mt-5">相似職務</h4>
            <p>
                <?php echo $row_detail["j_similar"];?>
            </p>
            <h4  class="mt-5">須具備專業能力</h4>
            <p>
                <?php echo $row_detail["j_ability"];?>
            </p>
            <h4  class="mt-5">薪資區間</h4>
            <p>
                <?php echo $row_detail["j_salary"];?>
            </p>
            <h4  class="mt-5">工作時間</h4>
            <p>
                <?php echo $row_detail["j_worktime"];?>
            </p>
            <h4  class="mt-5">職涯發展</h4>
            <p>
                <?php echo $row_detail["j_path"];?>
            </p>
            <h4  class="mt-5">學歷分布</h4>
            <p>
                <?php echo $row_detail["j_edu"];?>
            </p>
    </div>
</div>

<?php include "include/footer.php"; ?>
<script>
$(function(){
    $(".list1").on("click",function(){
        $(this).find(".list2").slideToggle();
    })
})
</script>