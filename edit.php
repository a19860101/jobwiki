<?php 
    require_once "config/database.php";
    include "include/header.php";
    include "include/nav.php";
?>
<?php
    $sql_1 = "SELECT DISTINCT c_list1 FROM `categories`";
    $result_1 = mysqli_query($conn,$sql_1);
    // $sql_2 = "SELECT DISTINCT c_list2 FROM `categories`";
    // $result_2 = mysqli_query($conn,$sql_2);
?>

<?php include "include/sidebar.php";?>
<?php include "include/search_.php";?>
<div class="z-container pt-5">
<hr>
    <div class="wrapper">

    <?php
                $jid = $_GET["jid"];
                $sql_detail = "SELECT * FROM `jobs` WHERE j_id =".$jid;
                $result_detail = mysqli_query($conn,$sql_detail);
                $row_detail = mysqli_fetch_assoc($result_detail);
            ?>

            <h2 class="text-info"><?php echo $_GET["cname"]?></h2>
            <form action="" method="post">
            <div class="form-group">
                <label>職務定義:</label>
                <input type="text" class="form-control" value="<?php echo $row["j_define"];?>" name="define">
            </div>
            
            <div class="form-group">
                <label>工作內容</label>
                <textarea class="form-control" rows="10" name="content" id="editor"><?php echo $row["j_content"];?></textarea>
            </div>
            <div class="form-group">
                <label>相似職務</label>
                <textarea class="form-control" rows="10" name="editor2" id="editor2"><?php echo $row["j_content"];?></textarea>
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
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor' );
    CKEDITOR.replace( 'editor2' );
    CKEDITOR.replace( 'salary' );
    CKEDITOR.replace( 'worktime' );
    CKEDITOR.replace( 'ability' );
    CKEDITOR.replace( 'edu' );
    CKEDITOR.replace( 'path' );
</script>
<?php include "include/footer.php"; ?>

<script>
$(function(){
    $(".list1").on("click",function(){
        $(this).find(".list2").slideToggle();
    })
})
</script>