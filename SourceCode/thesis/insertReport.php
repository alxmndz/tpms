<?php
include_once 'dbconn.php';
if(isset($_POST['btn-save']))
{
	$reportTitle = $_POST['reportTitle'];
	$reportDate = $_POST['reportDate'];
	$reportTime = $_POST['reportTime'];
	$description = $_POST['description'];

	$sql_query = "INSERT INTO reports(reportTitle,reportDate,reportTime,description) VALUES('$reportTitle','$reportDate','$reportTime','$description')";
		mysqli_query($conn,$sql_query);
	

?>
		<script type="text/javascript">
			alert("Report Added Successfully!");
			window.location = "dashboard.php";
		</script>
<?php
				
	}
	mysqli_close($conn);
			?>