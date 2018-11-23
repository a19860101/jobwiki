<?php 
    require_once "config/database.php";
    include "include/header.php";
    include "include/nav.php";

?>
<div class="container d-block d-md-none" id="logo">
	<div class="row align-items-center">
		<div class="col">
			<img src="images/logo.png" alt="JobWiki Logo" class="img-fluid" width="90%">
		</div>
		<div class="col">
			<h1 class="font-weight-bold"style="font-size:1.6rem">工作職務百科</h1>
			<p>各類職務的百科全書</p>
		</div>
	</div>
</div>
<div class="container d-block d-md-none px-5 px-md-0" id="search_bar_t">
    <form action="search.php" method="get">
        <div class="form-row justify-content-center py-3">
            <div class="col-md-5">
                <input type="text" class="form-control" name="search">
                <?php
                    $sql_hot = "SELECT search_name,count(*) AS count FROM `search` GROUP BY search_name ORDER BY count DESC LIMIT 5";
                    $result_hot = mysqli_query($conn,$sql_hot);
                ?>
                <p class="small my-2">熱門搜索:
                <?php
                    while($row_hot=mysqli_fetch_assoc($result_hot)){
                       echo "<a href='search.php?search={$row_hot["search_name"]}&cat=all'>{$row_hot["search_name"]}</a>"." ";
                    }
                ?>
                </p>
            </div>
            <div class="col-md-2">
                <select name="cat" id="" class="form-control">
                    <option value="all">所有類別</option>
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
                <input type="submit" value="搜尋" class="btn btn-outline-info btn-block mt-4 mt-md-0 ">
            </div>
            
        </div>
    </form>
</div>
<div class="container position-relative">
    <div class="row pb-2 pb-md-5">
        <div class="col-md-12">
            <h2 class="text-center d-none d-md-block">工作職務百科</h2>
        </div>
    </div>
    <div class="row py-3 align-items-center no-gutters">
        <div class="col-md-4 text-md-right text-center ileft col-6 order-2 order-md-1">
            <!-- <div> -->
            <?php 
                $sql_left = "SELECT DISTINCT c_list1 FROM `categories` ORDER BY c_list1 DESC LIMIT 10";
                $r_left = mysqli_query($conn,$sql_left);
                while($row_l = mysqli_fetch_assoc($r_left)){
				$cl1_l = $row_l["c_list1"];
                $s_l = "SELECT * FROM `categories` WHERE c_list1 = '$cl1_l'";
				$r_l = mysqli_query($conn,$s_l);
				$ro_l = mysqli_fetch_assoc($r_l)
            ?>
                <div><a href="list2.php?list1=<?php echo $row_l["c_list1"];?>&d0=<?php echo $ro_l["c_no"]+100;?>" class="nav-link ml-auto" style="padding:.5rem 0"><?php echo $row_l["c_list1"];?></a></div>
            <?php } ?>
            <!-- </div> -->
        </div>
        <div class="col-md-4 text-center col-7 mx-auto order-md-2 d-none d-md-block">
            <img src="images/logo.png" alt="JobWiki Logo" class="img-fluid">
        </div>
        <div class="col-md-4 text-md-left text-center iright col-6 order-3 order-md-3">
            <!-- <div> -->
            <?php 
                $sql_right = "SELECT DISTINCT c_list1 FROM `categories` ORDER BY c_list1 ASC LIMIT 10 ";
                $r_right = mysqli_query($conn,$sql_right);
                while($row_r = mysqli_fetch_assoc($r_right)){
				$cl1_r = $row_r["c_list1"];
                $s_r = "SELECT * FROM `categories` WHERE c_list1 = '$cl1_r'";
				$r_r = mysqli_query($conn,$s_r);
				$ro_r = mysqli_fetch_assoc($r_r)
            ?>
                <div><a href="list2.php?list1=<?php echo $row_r["c_list1"];?>&d0=<?php echo $ro_r["c_no"]+100;?>" class="nav-link" style="padding:.5rem 0"><?php echo $row_r["c_list1"];?></a></div>
            <?php } ?>
            <!-- </div> -->
        </div>
    </div>

</div>
<div class="container d-none d-md-block" id="search_bar_b">
    <form action="search.php" method="get">
        <div class="form-row justify-content-center py-3">
            <div class="col-md-5">
                <input type="text" class="form-control" name="search">
                <?php
                    $sql_hot = "SELECT search_name,count(*) AS count FROM `search` GROUP BY search_name ORDER BY count DESC LIMIT 5";
                    $result_hot = mysqli_query($conn,$sql_hot);
                ?>
                <p class="small my-2">熱門搜索:
                <?php
                    while($row_hot=mysqli_fetch_assoc($result_hot)){
                       echo "<a href='search.php?search={$row_hot["search_name"]}&cat=all'>{$row_hot["search_name"]}</a>"." ";
                    }
                ?>
                </p>
            </div>
            <div class="col-md-2">
                <select name="cat" id="" class="form-control">
                    <option value="all">所有類別</option>
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
                <input type="submit" value="搜尋" class="btn btn-outline-info btn-block mt-4 mt-md-0 ">
            </div>
            
        </div>
    </form>
</div>
<div class="errcode">
<?php
    if(isset($_GET["reg"])){
        switch($_GET["reg"]){
            case "success":
                echo "<div class='alert alert-primary position-fixed rounded-0' role='alert'>註冊成功，請重新登入</div>";
                // echo "請輸入帳號密碼";
                break;
        }
    }
?>
</div>
<?php include "include/footer.php"; ?>
<script>
	$(function(){
				$(".alert").delay("1000").fadeOut("5000");

	})
</script>