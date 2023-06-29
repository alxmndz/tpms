<?php
include_once 'dbconn.php';
if(isset($_POST['btn-save']))
{
	$res_date = $_POST['res_date'];
	$res_time = $_POST['res_time'];
	$cname = $_POST['cname'];
	$cnum = $_POST['cnum'];
	$amount = $_POST['amount'];
	$custom_name = $_POST['custom_name'];
	$contact = $_POST['contact'];
	$offer = $_POST['offer'];
	$transaction = $_POST['transaction'];
	$sql_query = "INSERT INTO user_register(res_date,res_time,cname,cnum,amount,custom_name,contact,offer,transaction) VALUES('$res_date','$res_time','$cname','$cnum','$amount','$custom_name', '$contact', '$offer', '$transaction')";
		mysqli_query($conn,$sql_query);
	

?>
		<script type="text/javascript">
			alert("Reserved Successfully!, Please wait for the verification on the Reservation History :)");
			window.location = "reservation.php";
		</script>
<?php
				
	}
	mysqli_close($conn);
			?>