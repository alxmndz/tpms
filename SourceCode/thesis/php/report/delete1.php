<?php
include_once 'dbconn.php';

$sql = "DELETE FROM reports WHERE reportID ='" . $_GET["reportID"] . "'";
if (mysqli_query($conn, $sql)) {
    
?>
		<script type="text/javascript">
			alert("Deleted Successfully!");
			window.location = "../../staff.php";
		</script>
<?php
				
	}
	mysqli_close($conn);
			?>