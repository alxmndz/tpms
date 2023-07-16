<?php
include_once 'dbconn.php';
if(isset($_POST['btn-save']))
{
	$announceTitle = $_POST['announceTitle'];
	$announceDate = $_POST['announceDate'];
	$announceTime = $_POST['announceTime'];
	$announceDesc = $_POST['announceDesc'];

	$sql_query = "INSERT INTO announcements(announceTitle,announceDate,announceTime,announceDesc) VALUES('$announceTitle','$announceDate','$announceTime','$announceDesc')";
	mysqli_query($conn,$sql_query);
?>
		<script type="text/javascript">
			alert("Added Successfully!");
			window.location = "../../staff.php";
		</script>

<?php
}
mysqli_close($conn);
?>
