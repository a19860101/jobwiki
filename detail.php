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
<div class="container-fluid">
    <div class="row">
        <?php include "include/sidebar.php";?>
        <div class="col-md-9 pt-5">
            <?php
                $cid = $_GET["cid"];
                $sql_detail = "SELECT * FROM `jobs` WHERE c_id =".$cid;
                $result_detail = mysqli_query($conn,$sql_detail);
                $row_detail = mysqli_fetch_assoc($result_detail);
            ?>
            
        </div>
    </div>

</div>

<?php include "include/footer.php"; ?>