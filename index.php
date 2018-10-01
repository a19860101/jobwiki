<?php 
    require_once "config/database.php";
    include "include/header.php";
    include "include/nav_.php";

?>
<div class="container">
    <div class="row pb-5">
        <div class="col-md-12">
            <h1 class="text-center">JOBWIKI</h1>
            <h2 class="text-center">工作職務百科</h2>
        </div>
    </div>
    <div class="row py-3 align-items-center">
        <div class="col-md-4">
            <div class="nav">
            <?php 
                $sql_left = "SELECT DISTINCT c_list1 FROM `categories` ORDER BY c_list1 ASC LIMIT 5";
                $r_left = mysqli_query($conn,$sql_left);
                while($row_l = mysqli_fetch_assoc($r_left)){
            ?>
                <a href="#" class="nav-link ml-auto"><?php echo $row_l["c_list1"];?></a>
            <?php } ?>
            </div>
        </div>
        <div class="col-md-4">
            <img src="images/logo.png" alt="JobWiki Logo" class="img-fluid">
        </div>
        <div class="col-md-4">
            <div class="nav">
            <?php 
                $sql_left = "SELECT DISTINCT c_list1 FROM `categories` ORDER BY c_list1 DESC LIMIT 5 ";
                $r_left = mysqli_query($conn,$sql_left);
                while($row_l = mysqli_fetch_assoc($r_left)){
            ?>
                <a href="#" class="nav-link"><?php echo $row_l["c_list1"];?></a>
            <?php } ?>
            </div>
        </div>

    </div>
</div>
<?php include "include/footer.php"; ?>