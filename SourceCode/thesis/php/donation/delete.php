<?php
include_once 'dbconn.php';

$sql = "DELETE FROM donation WHERE donateID ='" . $_GET["donateID"] . "'";
if (mysqli_query($conn, $sql)) {
    
?>
		<script type="text/javascript">
			alert("Deleted Successfully!");
			window.location = "../../dashboard.php";
		</script>
<?php
				
	}
	mysqli_close($conn);
			?>