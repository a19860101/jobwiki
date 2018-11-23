<?php
	$address = "http://".$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI'];

?>
<nav class="container">
 	
	 <ul class="nav justify-content-end">
            <?php if(isset($_SESSION['NAME'])){ ?>
                    <li class="nav-item"><a href="backend/" class="nav-link disabled"><?php echo $_SESSION["NAME"];?>你好</a></li>
                    <li class="nav-item"><a href="logout.php?logout=true" class="nav-link">登出</a></li>
                <?php }else{ ?>
                    <li class="nav-item"><a href="login.php?<?php echo $address;?>" class="nav-link">登入</a></li>
                    <li class="nav-item"><a href="signup.php" class="nav-link">加入會員</a></li>
                <?php } ?>
            </ul>
</nav>