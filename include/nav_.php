<nav class="navbar navbar-expand-md navbar-light">
    <div class="container">
        <!-- <a href="index.php" class="navbar-brand">JOBWIKI</a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navi"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navi">
            <ul class="navbar-nav ml-auto">
                <?php if(isset($_SESSION['NAME'])){ ?>
                    <li class="nav-item"><a href="#" class="nav-link">會員專區</a></li>
                    <li class="nav-item"><a href="logout.php?logout=true" class="nav-link">登出</a></li>
                <?php }else{ ?>
                    <li class="nav-item"><a href="login.php" class="nav-link">登入</a></li>
                    <li class="nav-item"><a href="signup.php" class="nav-link">加入會員</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>