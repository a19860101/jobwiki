<?php
    $sql_1 = "SELECT DISTINCT c_list1 FROM `categories`";
    $result_1 = mysqli_query($conn,$sql_1);
?>
<div class="col-md-3 pt-5">
    <ul class="nav flex-column">
        <?php while($row_1=mysqli_fetch_assoc($result_1)){?>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><?php echo $row_1["c_list1"]?></a>
            <div class="dropdown-menu">
                <?php 
                    $sql_2 = "SELECT DISTINCT c_list1,c_list2 FROM `categories`";
                    $result_2 = mysqli_query($conn,$sql_2);
                    while($row_2=mysqli_fetch_assoc($result_2)){
                    if($row_2["c_list1"]==$row_1["c_list1"]){
                ?>
                <a href="list2.php?list2=<?php echo $row_2["c_list2"];?>" class="dropdown-item"><?php echo $row_2["c_list2"]?></a>
                <?php }}?>
            </div>
        </li>
        <?php }?>
    </ul>
</div>