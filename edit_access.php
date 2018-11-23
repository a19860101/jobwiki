<?php 
    require_once "config/database.php";
    include "include/header.php";
    include "include/nav.php";
?>
<?php
					if(isset($_POST["edit"])){
					
                    $define = $_POST["define"];
                    $content = $_POST["content"];
                    $similar = implode(",",$_POST["similar"]);
                    $ability = $_POST["ability"];
                    $salary = $_POST["salary"];
                    $worktime = $_POST["worktime"];
                    $path = $_POST["path"];
                    $edu = $_POST["edu"];
                    $id = $_POST["id"];
						
					$gro = $_POST["gro"];
					$rel = $_POST["rel"];
						
						echo $define;
					
//                    $sql_edit = "UPDATE `jobs` SET 
//                    j_define='$define',
//                    j_content='$content',
//                    j_similar='$similar',
//                    j_ability = '$ability',
//                    j_salary = '$salary',
//                    j_worktime = '$worktime',
//                    j_path = '$path',
//                    j_edu = '$edu',
//					update_datetime = NOW()
//                    WHERE c_id =".$id;
					
//					$cid=$row["j_id"];
					$mid=$_SESSION["ID"];
					$sql_edit = "INSERT INTO `jobs`(j_define,j_content,j_similar,j_ability,j_salary,j_worktime,j_path,j_edu,create_datetime,m_id,c_id)
					VALUES('$define','$content','$similar','$ability','$salary','$worktime','$path','$edu',NOW(),'$mid','$id')";
					$sql_path = "INSERT INTO `path`(p_rel,p_gro,c_id)VALUES('$rel','$gro','$id')";
					$sql_ref = "INSERT INTO `c_m_ref`(c_id,m_id,update_datetime)VALUES('$id','$mid',NOW())"; 
                    mysqli_query($conn,$sql_path);
                   
					mysqli_query($conn,$sql_ref);
					 mysqli_query($conn,$sql_edit);
					header("Location:detail.php?cid={$_GET["cid"]}&cname={$_GET["cname"]}&d0={$_GET["d0"]}");
//					header("Location:index.php");
                }
    $sql_1 = "SELECT DISTINCT c_list1 FROM `categories`";
    $result_1 = mysqli_query($conn,$sql_1);
?>
