<?php
include_once 'dbconn.php';
if(isset($_POST['btn-save']))
{
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$donateAmount = $_POST['donateAmount'];
	$donateDate = $_POST['donateDate'];
	$donateReceipt = $_POST['donateReceipt'];
	$donateEvent = $_POST['donateEvent'];

	$sql_query = "INSERT INTO donation(fname,lname,donateAmount,donateDate,donateReceipt,donateEvent) VALUES('$fname','$lname','$donateAmount','$donateDate','$donateReceipt','$donateEvent')";
		mysqli_query($conn,$sql_query);
	

?>
		<script type="text/javascript">
			alert("Donation Added Successfully!");
			window.location = "dashboard.php";
		</script>
<?php
				
	}
	mysqli_close($conn);
			?>