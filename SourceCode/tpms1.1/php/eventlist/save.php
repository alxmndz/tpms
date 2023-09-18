<?php
include_once 'dbconn.php';
if(isset($_POST['btn-save']))
{
	$title = $_POST['title'];
	$eventday = $_POST['eventday'];
	$start = date('h:i:sa', strtotime($_POST['start'])); // Convert to AM/PM format
	$endtime = date('h:i:sa', strtotime($_POST['endtime'])); // Convert to AM/PM format
	$location = $_POST['location'];
	$description = $_POST['description'];
	$daynumber = $_POST['daynumber'];
	$month = $_POST['month'];

	$result = "INSERT INTO eventlist(title,eventday,start,endtime,description,location,daynumber,month) VALUES('$title','$eventday','$start','$endtime','$description','$location','$daynumber','$month')";
	mysqli_query($conn,$result);
?>
		<script type="text/javascript">
			alert("Added Successfully!");
			window.location = "../../staff.php";
		</script>

<?php
}
mysqli_close($conn);
?>
