<?php
	require_once("../config/database.php");
	$similar = $_POST["similar"];
	$sql = "SELECT * FROM `categories` WHERE c_name LIKE '$similar'";
	$result = mysqli_query($conn,$sql);

	while($row = mysqli_fetch_assoc($result)){
?>
	<ul>
		<li onclick="fill('<?php echo $row["c_name"];?>')">
			<a href="">
				<?php echo $row["c_name"];?>
			</a>
		</li>
	</ul>
<?php
	}
?>