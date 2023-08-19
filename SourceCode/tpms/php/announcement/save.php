<?php
include_once 'dbconn.php';
if(isset($_POST['btn-save']))
{
	$title = $_POST['title'];
	$eventdate = $_POST['eventdate'];
	$start = $_POST['start'];
	$endtime = $_POST['endtime'];
	$description = $_POST['description'];
	$location = $_POST['location'];

	$result = "INSERT INTO announcement(title,eventdate,start,endtime,description,location) VALUES('$title','$eventdate','$start','$endtime','$description','$location')";
	mysqli_query($conn,$result);
?>
		<script type="text/javascript">
			alert("Added Successfully!");
			window.location = "../../admin.php";
		</script>

<?php
}
mysqli_close($conn);
?>
