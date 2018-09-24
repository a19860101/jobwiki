<?php 
    require_once "config/database.php";
    include "include/header.php";
    include "include/nav.php";
?>
<div class="container">
    <div class="col-md-6 mx-auto pt-5">
        
        <form action="auth.php" method="post"> 
            <div class="form-group">
                <label>帳號</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>密碼</label>
                <input type="password" class="form-control" name="pw">
            </div>
            <input type="submit" class="btn btn-primary btn-sm" value="登入">
        </form>
    </div>
    <div class="errcode">
        <?php
            if(isset($_GET["errcode"])){
                switch($_GET["errcode"]){
                    case 0:
                        echo "請輸入帳號密碼";
                        break;
                    case 1:
                        echo "帳號或密碼錯誤";
                        break;
                    case 2:
                        echo "請登入會員";
                        break;
                    case 3:
                        echo "拒絕存取";
                        break;
                }
            }
            // if(isset($_GET["errcode"])&&$_GET["errcode"]==0){
            //     echo "請輸入帳號密碼";
            // }
            // if(isset($_GET["errcode"])&&$_GET["errcode"]==1){
            //     echo "帳號或密碼錯誤";
            // }
        ?>
    </div>
</div>

<?php include "include/footer.php";?>