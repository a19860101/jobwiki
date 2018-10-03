<?php 
    require_once "config/database.php";
    include "include/header.php";
    #include "include/nav.php";
?>
<div class="container py-5">
    <div class="row py-5 align-items-center">
        <div class="col-md-6 pt-5">
            <div class="row">
                <div class="col-md-12 text-center">
                    <img src="images/logo-text.png" alt="logo" class="img-fluid">
                </div>
                <div class="col-md-12 text-center my-5">
                    <a href="signup.php" class="btn btn-outline-dark btn-sm">會員註冊</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 pt-5">
            <legend class="text-center">會員登入</legend>
            <form action="auth.php" method="post"> 
                <div class="form-group row py-3">
                    <label class="col-sm-2 col-form-label">帳號</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" name="name">
                    </div>
                </div>
                <div class="form-group row py-3">
                    <label class="col-sm-2 col-form-label">密碼</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" name="pw">
                    </div>
                </div>
                <input type="submit" class="btn btn-outline-dark btn-sm" value="登入">
            </form>
        </div>
        
    </div>
</div>
<div class="errcode">
<?php
    if(isset($_GET["errcode"])){
        switch($_GET["errcode"]){
            case 0:
                echo "<div class='alert alert-danger position-fixed rounded-0' role='alert'>請輸入帳號密碼</div>";
                // echo "請輸入帳號密碼";
                break;
            case 1:
                // echo "帳號或密碼錯誤";
                echo "<div class='alert alert-danger position-fixed rounded-0' role='alert'>帳號或密碼錯誤</div>";

                break;
            case 2:
                // echo "請登入會員";
                echo "<div class='alert alert-danger position-fixed rounded-0' role='alert'>請登入會員</div>";

                break;
            case 3:
                // echo "拒絕存取";
                echo "<div class='alert alert-danger position-fixed rounded-0' role='alert'>拒絕存取</div>";

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
<style>
    .alert {
        /* position: fixed; */
        top: 0px;
        /* left: 0; */
        width:100%;
    }
</style>
<?php include "include/footer.php";?>