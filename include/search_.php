<div class="z-container">
<form action="search.php" method="get">
        <div class="form-row  py-3">
            <div class="col-md-5">
                <input type="text" class="form-control" name="search" value="<?php echo $_GET["search"];?>" placeholder="請輸入職缺關鍵字">
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
                    <option value="<?php echo $row_c["c_list1"];?>" <?php if($row_c["c_list1"]==$_GET["cat"]){echo  "selected";}?>><?php echo $row_c["c_list1"];?></option>
                    <?php } ?>
                </select>
            </div>
            <input type="hidden" name="s" value="true">
            <div class="col-md-1 mt-md-0 mt-3">
                <input type="submit" value="搜尋" class="btn btn-outline-info">
            </div>
            
        </div>
    </form>
</div>