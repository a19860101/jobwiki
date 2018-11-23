<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a href="index.php" class="navbar-brand">會員中心</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navi"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navi">
<!--
           	<ul class="navbar-nav mr-auto">
           		<li class="nav-item">
           			<a href="../index.php" class='nav-link'>前台</a>
           		</li>
           	</ul>
-->
            <ul class="navbar-nav ml-auto">
                <?php if(isset($_SESSION['NAME'])){ ?>
                    <li class="nav-item"><a href="../logout.php?logout=true" class="nav-link">登出</a></li>
                    <li class="nav-item">
						<a href="../index.php" class='nav-link'>回前台</a>
					</li>
                <?php }else{ ?>
                    <li class="nav-item"><a href="login.php" class="nav-link">登入</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">加入會員</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
