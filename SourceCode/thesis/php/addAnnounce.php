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

	<!-- Include the SweetAlert library -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script type="text/javascript">
		// Display a success alert
		Swal.fire({
			title: 'Good job!',
			text: 'Added Successfully!',
			icon: 'success',
			showConfirmButton: false,/*
			timer: 3000 */// Display the alert for 3 seconds
		}).then(function() {
			// Redirect to the dashboard page
			window.location = "../dashboard.php";
		});
	</script>

<?php
}
mysqli_close($conn);
?>
