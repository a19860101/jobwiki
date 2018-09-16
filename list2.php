<?php 
    require_once "config/database.php";
    include "include/header.php";
    include "include/nav.php";
?>
<div class="container-fluid">
    <div class="row">
        <?php include "include/sidebar.php";?>
        <div class="col-md-9 pt-5">
            <ul class="list-group">
            <?php 
                $l2= $_GET["list2"];
                // echo $l2;

                $sql_list2 = "SELECT * FROM `categories` WHERE c_list2 = '$l2'";
                $result_list2 = mysqli_query($conn,$sql_list2);
                // echo $result_list2;
                while($row_list2=mysqli_fetch_assoc($result_list2)){
                ?>
                    <li class="list-group-item">
                        <a href="detail.php?cid=<?php echo $row_list2["c_id"];?>"><?php echo $row_list2["c_name"];?></a>
                    </li>
            <?php } ?>
             </ul>
            
        </div>
    </div>

</div>

<?php include "include/footer.php"; ?>