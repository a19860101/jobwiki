<?php 
    require_once "config/database.php";
    include "include/header.php";
    include "include/nav.php";

?>
<?php

    // $sql_2 = "SELECT DISTINCT c_list2 FROM `categories`";
    // $result_2 = mysqli_query($conn,$sql_2);
?>
<div class="container-fluid">
    <div class="row">
        <?php include "include/sidebar.php";?>

    </div>

</div>
<?php include "include/footer.php"; ?>