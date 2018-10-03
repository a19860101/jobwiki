<?php 
    require_once "config/database.php";
    include "include/header.php";
    include "include/nav.php";
?>
<style>
    .z-container {
        width: calc(100% - 250px);
        float: left;
        padding-left: 50px;
    }
    h4 {
        font-weight: 800;
    }
</style>
<?php include "include/sidebar.php";?>
<div class="z-container">
    <div class="col-md-9 pt-5">
        <!-- <ul class="list-group"> -->
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
            while($row_list2=mysqli_fetch_assoc($result_list2)){
            ?>
                <h4 class="mb-4">
                    <a class="text-info" href="detail.php?cid=<?php echo $row_list2["c_id"];?>&cname=<?php echo $row_list2["c_name"];?>"><?php echo $row_list2["c_name"];?></a>
                </h4>
        <?php } ?>
            <!-- </ul> -->
        
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
