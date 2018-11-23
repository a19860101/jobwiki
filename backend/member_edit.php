<?php 
    require_once "../config/database.php";
    require_once "../config/function.php";
    access_denied();
    include "include/header.php";
    include "include/nav.php";
    include "include/sidebar.php";

?>
<?php
	$member = $_SESSION['NAME'];
	$sql = "SELECT * FROM `members` WHERE m_name='$member'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);

	if(isset($_POST["edit"])){
		$fullname = $_POST["fullname"];
		$gender = $_POST["gender"];
		$mail = $_POST["mail"];
		$phone = $_POST["phone"];
		$id = $_POST["id"];
		$sql_edit = "UPDATE `members` SET 
		m_fullname ='$fullname',
		m_gender ='$gender',
		m_phone ='$phone',
		m_mail = '$mail'
		WHERE m_id=".$id;
		mysqli_query($conn,$sql_edit);
		header("Location:member.php");
	}
?>
<div class="container">
	<div class="row">
<!--
		<div class="col-md-12 mt-3">
			<div class="nav">
				<a href="#" class="nav-link btn-info">修改資料</a>
			</div>
		</div>
-->
		<div class="col-md-12 mt-3">
			<legend class="text-center">修改資料</legend>
            <form action="" method="post" id="signup"> 
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">帳號</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" name="name" readonly value="<?php echo $row["m_name"];?>">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">姓名</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" name="fullname" required value="<?php echo $row["m_fullname"];?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">性別</label>
                    <div class="col-sm-8">
                        <input type="radio" name="gender" value="男" <?php if($row["m_gender"]=="男"){echo "checked";}?>>&nbsp;男
                        &nbsp;<input type="radio" name="gender" value="女" <?php if($row["m_gender"]=="女"){echo "checked";}?>>&nbsp;女
                        &nbsp;<input type="radio" name="gender" value="不透露" <?php if($row["m_gender"]=="不透露"){echo "checked";}?>>&nbsp;不透露
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">電話</label>
                    <div class="col-sm-8">
                        <input type="input" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" name="phone" required value="<?php echo $row["m_phone"];?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">電子郵件</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" name="mail" required value="<?php echo $row["m_mail"];?>">
                    </div>
                </div>
                <input type="hidden" value="<?php echo $row["m_id"];?>" name="id">
                <input type="submit" class="btn btn-outline-dark btn-sm mt-3" value="確認修改" name="edit">
                <input type="button" class="btn btn-outline-danger btn-sm mt-3" onclick="history.back()" value="取消">
            </form>
        </div>
		</div>
	</div>
</div>
<?php include "include/footer.php"; ?>
