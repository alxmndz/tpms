<?php
include_once 'dbconn.php';


$sql = "DELETE FROM user_register WHERE id ='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
    
?>
		<script type="text/javascript">
			alert("Deleted Successfully!");
			window.location = "dashboard.php";
		</script>
<?php
				
	}
	mysqli_close($conn);
			?>