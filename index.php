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
                <a href="list2.php?list1=<?php echo $row_l["c_list1"];?>" class="nav-link ml-auto"><?php echo $row_l["c_list1"];?></a>
            <?php } ?>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <img src="images/logo.png" alt="JobWiki Logo" class="img-fluid">
        </div>
        <div class="col-md-4">
            <div class="nav">
            <?php 
                $sql_right = "SELECT DISTINCT c_list1 FROM `categories` ORDER BY c_list1 DESC LIMIT 5 ";
                $r_right = mysqli_query($conn,$sql_right);
                while($row_r = mysqli_fetch_assoc($r_right)){
                
            ?>
                <a href="list2.php?list1=<?php echo $row_r["c_list1"];?>" class="nav-link"><?php echo $row_r["c_list1"];?></a>
            <?php } ?>
            </div>
        </div>
    </div>

</div>
<div class="container">
    <form action="">
        <div class="form-row justify-content-center py-3">
            <div class="col-md-5">
                <input type="text" class="form-control" name="search">
                <p class="small">熱門搜索</p>
            </div>
            <div class="col-md-2">
                <select name="cat" id="" class="form-control">
                    <option value="">所有類別</option>
                    <?php 
                        $sql_c = "SELECT DISTINCT c_list1 FROM `categories`";
                        $r_c = mysqli_query($conn,$sql_c);
                        while($row_c = mysqli_fetch_assoc($r_c)){
                    ?>
                    <option value="<?php echo $row_c["c_list1"];?>"><?php echo $row_c["c_list1"];?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-1">
                <input type="submit" value="搜尋" class="btn btn-outline-info">
            </div>
            
        </div>
    </form>
</div>
<?php include "include/footer.php"; ?>