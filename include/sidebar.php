<?php
    $sql_1 = "SELECT DISTINCT c_list1 FROM `categories`";
    $result_1 = mysqli_query($conn,$sql_1);
?>

<nav id="z-nav">
    <div class="logo">
        <a href="index.php"><img src="images/logo-text.png" alt="Job-Wiki"></a>
    </div>
    <ul>
    <?php while($row_1=mysqli_fetch_assoc($result_1)){?>
        <li class="list1"><a href="javascript:;" class="text-dark font-weight-bold"><?php echo $row_1["c_list1"]?></a>
        <div class="list2">
            <?php 
                $sql_2 = "SELECT DISTINCT c_list1,c_list2 FROM `categories`";
                $result_2 = mysqli_query($conn,$sql_2);
                while($row_2=mysqli_fetch_assoc($result_2)){
                if($row_2["c_list1"]==$row_1["c_list1"]){
            ?>
            
            <a href="list2.php?list2=<?php echo $row_2["c_list2"];?>" class="text-dark d-block">
                <?php echo $row_2["c_list2"]?>
            </a>

            <?php }}?>
            </div>
        </li>
    <?php }?>
    </ul>
</nav>
