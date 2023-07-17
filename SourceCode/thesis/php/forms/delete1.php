<?php
include_once 'dbconn.php';

$sql = "DELETE FROM forms WHERE formsID ='" . $_GET["formsID"] . "'";
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