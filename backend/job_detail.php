<?php 
    require_once "../config/database.php";
    require_once "../config/function.php";
    access_denied();
    include "include/header.php";
    include "include/nav.php";
    include "include/sidebar.php";

?>
<script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<div class="container">
    <div class="row">
        <?php 
                    if(isset($_POST["add"])){
                        $cid = $_GET["id"];
                        $jdefine = $_POST["define"];
                        $jcontent = $_POST["content"];
                        $jsimilar = $_POST["similar"];
                        $jability = $_POST["ability"];
                        $jsalary = $_POST["salary"];
                        $jworktime = $_POST["worktime"];
                        $jpath = $_POST["path"];
                        $jedu = $_POST["edu"];
                        $mid = $_SESSION["ID"];
                        $sql_new = "INSERT INTO `jobs`(j_define,j_content,j_similar,j_ability,j_salary,j_worktime,j_path,j_edu,c_id,m_id)
                        VALUES('$jdefine','$jcontent','$jsimilar','$jability','$jsalary','$jworktime','$jpath','$jedu',{$cid},{$mid})";
                        mysqli_query($conn,$sql_new);
                        header("Location:jobs.php");
                    }
                    
                    if(isset($_POST["edit"])){
                        $define = $_POST["define"];
                        $content = $_POST["content"];
                        $similars = $_POST["similar"];
						$similar = implode(",",$similars);
                        $ability = $_POST["ability"];
                        $salary = $_POST["salary"];
                        $worktime = $_POST["worktime"];
                        $path = $_POST["path"];
                        $edu = $_POST["edu"];
                        $id = $_POST["id"];
                        $sql_edit = "UPDATE `jobs` SET 
                        j_define='$define',
                        j_content='$content',
                        j_similar='$similar',
                        j_ability = '$ability',
                        j_salary = '$salary',
                        j_worktime = '$worktime',
                        j_path = '$path',
                        j_edu = '$edu'
                        WHERE c_id =".$id;
                        mysqli_query($conn,$sql_edit);
                        header("Location:jobs.php");
            
                    }
            $id = $_GET["id"];
            $sql = "SELECT * FROM `jobs` WHERE c_id = ".$id;
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);

            $sql_c = "SELECT * FROM `categories` WHERE c_id = ".$id;
            $result_c = mysqli_query($conn,$sql_c);
            $row_c = mysqli_fetch_assoc($result_c);
        ?>
        <div class="col-md-12">
            <h2><?php echo $row_c["c_name"];?></h2>
            
        </div>
    </div>
    <?php 
                

        if(isset($row["j_define"])=="" && isset($row["j_content"])==""){
        ?>
            <form action="" method="post">
            <div class="form-group">
                <label>職務定義:</label>
                <input type="text" class="form-control" name="define">
            </div>
            
            <div class="form-group">
                <label>工作內容</label>
                <textarea class="form-control" rows="10" name="content" id="editor"></textarea>
            </div>
            <div class="form-group">
                <label>相似職務</label>
<!--                <textarea class="form-control" rows="10" name="similar" id="similar"></textarea>-->
				<input type="text" name="similar" id="similar">
				<div id="display"></div>
            </div>
            <div class="form-group">
                <label>須具備專業能力</label>
                <textarea class="form-control" rows="10" name="ability" id="ability"></textarea>
            </div>
            <div class="form-group">
                <label>薪資區間</label>
                <textarea class="form-control" rows="10" name="salary" id="salary"></textarea>
            </div>
            <div class="form-group">
                <label>工作時間</label>
                <textarea class="form-control" rows="10" name="worktime" id="worktime"></textarea>
            </div>
            <div class="form-group">
                <label>職涯發展</label>
                <textarea class="form-control" rows="10" name="path" id="path"></textarea>
            </div>
            <div class="form-group">
                <label>學歷分布</label>
                <textarea class="form-control" rows="10" name="edu" id="edu"></textarea>
            </div>
                <input type="submit" value="編輯" class="btn btn-info" name="add">
            </form>

        <?php

        }else{
        ?>
            <form action="" method="post">
            <div class="form-group">
                <label>職務定義:</label>
                <input type="text" class="form-control" value="<?php echo $row["j_define"];?>" name="define">
            </div>
            
            <div class="form-group">
                <label>工作內容</label>
                <textarea class="form-control" rows="10" name="content" id="editor"><?php echo $row["j_content"];?></textarea>
            </div>
            <div class="form-group ui-widget">
                <legend>相似職務</legend>
                
				<?php
						$sql_s = "SELECT * FROM `categories`";
						$result_s = mysqli_query($conn,$sql_s);
							
						$ss = explode(",",$row["j_similar"]);
//						foreach($ss as $s){
//							if($s == $row_s["c_name"]){echo "checked"}
//						}
						while($row_s = mysqli_fetch_assoc($result_s)){
						
				?>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="checkbox" id=""value="<?php echo $row_s["c_name"];?>" name="similar[]" <?php foreach($ss as $s){
							if($s == $row_s["c_name"]){echo "checked";}
						}?>>
					  <label class="form-check-label"><?php echo $row_s["c_name"];?></label>
					</div>
				<?php
						}
				?>
				
		
            </div>
            <div class="form-group">
                <label>須具備專業能力</label>
                <textarea class="form-control" rows="10" name="ability" id="ability"><?php echo $row["j_ability"];?></textarea>
            </div>
            <div class="form-group">
                <label>薪資區間</label>
                <textarea class="form-control" rows="10" name="salary" id="salary"><?php echo $row["j_salary"];?></textarea>
            </div>
            <div class="form-group">
                <label>工作時間</label>
                <textarea class="form-control" rows="10" name="worktime" id="worktime"><?php echo $row["j_worktime"];?></textarea>
            </div>
            <div class="form-group">
                <label>職涯發展</label>
                <textarea class="form-control" rows="10" name="path" id="path"><?php echo $row["j_path"];?></textarea>
            </div>
            <div class="form-group">
                <label>學歷分布</label>
                <textarea class="form-control" rows="10" name="edu" id="edu"><?php echo $row["j_edu"];?></textarea>
            </div>
            <input type="hidden" name="id"value="<?php echo $row["c_id"];?>">
            <input type="submit" value="編輯" class="btn btn-info" name="edit">
            </form>
        <?php
            
        }

        

 
    ?>
</div>
<script>
    CKEDITOR.replace( 'editor' );
//    CKEDITOR.replace( 'similar' );
    CKEDITOR.replace( 'salary' );
    CKEDITOR.replace( 'worktime' );
    CKEDITOR.replace( 'ability' );
    CKEDITOR.replace( 'edu' );
    CKEDITOR.replace( 'path' );
</script>
<?php include "include/footer.php"; ?>

