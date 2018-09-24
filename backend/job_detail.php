<?php 
    require_once "../config/database.php";
    include "include/header.php";
    include "include/nav.php";
    include "include/sidebar.php";
?>
<div class="container">
    <div class="row">
        <?php 
                    if(isset($_POST["add"])){
                        $cid = $_GET["id"];
                        $jdefine = $_POST["define"];
                        $jcontent = $_POST["content"];
                        $mid = $_SESSION["ID"];
                        $sql_new = "INSERT INTO `jobs`(j_define,j_content,c_id,m_id)VALUES('$jdefine','$jcontent',{$cid},{$mid})";
                        mysqli_query($conn,$sql_new);
                        header("Location:jobs.php");
                    }
                    
                    if(isset($_POST["edit"])){
                        $define = $_POST["define"];
                        $content = $_POST["content"];
                        $id = $_POST["id"];
                        $sql_edit = "UPDATE `jobs` SET j_define='$define',j_content='$content' WHERE c_id =".$id;
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
                <label>職務內容</label>
                <textarea class="form-control" rows="10" name="content"></textarea>
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
                    <label>職務內容</label>
            <textarea class="form-control" rows="10" name="content"><?php echo $row["j_content"];?></textarea>
            </div>
            <input type="hidden" name="id"value="<?php echo $row["c_id"];?>">
            <input type="submit" value="編輯" class="btn btn-info" name="edit">
            </form>
        <?php
            
        }

        

 
    ?>
</div>
<?php include "include/footer.php"; ?>
