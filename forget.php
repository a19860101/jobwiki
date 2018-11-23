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
                    <a href="login.php" class="btn btn-outline-dark btn-sm">會員登入</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 pt-5">
            <legend class="text-center">忘記密碼</legend>
            <form action="forget_access.php" method="post" id="signup"> 
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">帳號</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" name="name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">電子郵件</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" name="mail" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">重新輸入密碼</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" name="pw" required id="password">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">再次輸入密碼</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" name="pw2" required equalTo="#password">
                    </div>
                </div>
                <input type="submit" class="btn btn-outline-dark btn-sm mt-3" value="重設密碼">
            </form>
        </div>
        
    </div>
</div>
<div class="errcode">
<?php
    if(isset($_GET["reset"])){
        switch($_GET["reset"]){
            case 1:
                echo "<div class='alert alert-danger position-fixed rounded-0' role='alert'>email不符合</div>";
                break;
			case 2:
                echo "<div class='alert alert-danger position-fixed rounded-0' role='alert'>帳號不符合</div>";
                break;
        }
    }
?>
</div>
<style>


</style>
<?php include "include/footer.php";?>
<script>
	$(function(){
		$("#signup").validate();
	})
</script>