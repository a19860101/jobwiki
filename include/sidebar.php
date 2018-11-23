<?php
    $sql_1 = "SELECT DISTINCT c_list1 FROM `categories`";
    $result_1 = mysqli_query($conn,$sql_1);
?>
   	<div class="hamburger"><span></span></div>

<nav id="z-nav">
 	<a href="javascript:;" class="x"><i class="fas fa-times"></i></a>
  	<div id="z-menu">
    <div class="logo">
        <a href="index.php"><img src="images/logo-text.png" alt="Job-Wiki"></a>
    </div>
    <ul>
    <?php while($row_1=mysqli_fetch_assoc($result_1)){?>
       	<?php
			$cl1 = $row_1["c_list1"];
			$s1 = "SELECT * FROM `categories` WHERE c_list1 = '$cl1'";
			$r1 = mysqli_query($conn,$s1);
			$ro1 = mysqli_fetch_assoc($r1);
		?>
        <li>
        <a href="list2.php?list1=<?php echo $ro1["c_list1"];?>&d0=<?php echo $ro1["c_no"]+100;?>" class="text-dark font-weight-bold ">
        	<?php echo $row_1["c_list1"]?>
        </a>
        <a href="javascript:;" class="text-dark list1">
       		<i class="fas fa-plus"></i>
        </a>
<!--        <i class="fas fa-caret-down"></i>-->
        <div class="list2">
            <?php 
                $sql_2 = "SELECT DISTINCT c_list1,c_list2 FROM `categories`";
                $result_2 = mysqli_query($conn,$sql_2);
                while($row_2=mysqli_fetch_assoc($result_2)){
				
				if($row_2["c_list1"]==$row_1["c_list1"]){
					$co = $row_2["c_list2"];
					$s = "SELECT * FROM `categories` WHERE c_list2='$co'";
					$r = mysqli_query($conn,$s);
					$rw = mysqli_fetch_assoc($r);
					
					
            ?>
            	
            <a href="list2.php?list2=<?php echo $row_2["c_list2"];?>&d0=<?php echo $rw["c_no"];?>" class="text-dark d-block">
                <?php echo $row_2["c_list2"]?>
            </a>

            <?php }} ?>
            </div>
        </li>
    <?php }?>
    </ul>
    </div>
	</nav>
