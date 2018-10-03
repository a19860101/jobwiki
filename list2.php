<?php 
    require_once "config/database.php";
    include "include/header.php";
    include "include/nav.php";
    include "include/sidebar.php";
    include "include/search_.php";
?>

<div class="z-container pt-5">
<hr>
    <div class="wrapper">
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
