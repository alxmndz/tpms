<?php
include_once 'dbconn.php';

$sql = "DELETE FROM accounts WHERE user_id ='" . $_GET["user_id"] . "'";
if (mysqli_query($conn, $sql)) {
    
?>
		<script type="text/javascript">
			alert("Deleted Successfully!");
			window.location = "../staff.php";
		</script>
<?php
				
	}
	mysqli_close($conn);
			?>