<?php
include_once 'dbconn.php';
if(isset($_POST['btn-save']))
{
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$address = $_POST['address'];
	$mobilePhone = $_POST['mobilePhone'];
	$email = $_POST['email'];
	$formType = $_POST['formType'];
	$status = $_POST['status'];
	$amount = $_POST['amount'];
	$pack = $_POST['pack'];
	$refNum = $_POST['refNum'];
	$receiptIMG = $_POST['receiptIMG'];
	$optionPay = $_POST['optionPay'];

	$sql_query = "INSERT INTO forms(fname,lname,address,mobilePhone,email,formType,status,amount,pack,refNum,receiptIMG,optionPay) VALUES('$fname','$lname','$address','$mobilePhone','$email','$formType','$status','$amount','$pack','$refNum','$receiptIMG','$optionPay')";
		mysqli_query($conn,$sql_query);
	

?>
		<script type="text/javascript">
			alert("Announcement Added Successfully!");
			window.location = "../dashboard.php";
		</script>
<?php
				
	}
	mysqli_close($conn);
			?>