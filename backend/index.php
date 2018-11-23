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
?>
<!--內容-->
<div class="container">
    <div class="row">
		<div class="col-md-6 my-5">
			<h2><?php echo $row["m_fullname"];?>您好</h2>
		</div>
	</div>
</div>

<!---->

<?php include "include/footer.php"; ?>
