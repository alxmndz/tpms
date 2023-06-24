<?php
include_once 'dbconn.php';
if(isset($_POST['btn-save']))
{
	$announceTitle = $_POST['announceTitle'];
	$announceDate = $_POST['reportDate'];
	$reportTime = $_POST['reportTime'];
	$announceIMG = $_POST['announceIMG'];

	$sql_query = "INSERT INTO announcements(announceTitle,announceDate,announceTime,announceIMG) VALUES('$announceTitle','$announceDate','$announceTime','$announceIMG')";
		mysqli_query($conn,$sql_query);
	

?>
		<script type="text/javascript">
			alert("Announcement Added Successfully!");
			window.location = "dashboard.php";
		</script>
<?php
				
	}
	mysqli_close($conn);
			?>