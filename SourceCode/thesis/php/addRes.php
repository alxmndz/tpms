
<?php
include_once '../php/dbconn.php';
if(isset($_POST['btn-save']))
{
	$name = $_POST['name'];
	$eventName = $_POST['eventName'];
	$eventDate = $_POST['eventDate'];
	$eventTime = $_POST['eventTime'];
	$contactNum = $_POST['contactNum'];
	$address = $_POST['address'];
	$sponsored = $_POST['sponsored'];
	$package = $_POST['package'];
	$amount = $_POST['amount'];
	$email = $_POST['email'];	
	$package = $_POST['package'];
	$cr = $_FILES['credentialfile'];	

	$targetDir = "credential/";
  $fileName5 = $_FILES['credentialfile']['name'];
  $targetFilePath = $targetDir . $fileName5;
  $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);   
                            
  $fileTmpName5 = $_FILES['credentialfile']['tmp_name'];
  $allowTypes = array('jpg','png','jpeg','gif','pdf');
  if(in_array($fileType, $allowTypes)){
  	if(move_uploaded_file($_FILES["credentialfile"]["tmp_name"], $targetFilePath)){
  	echo $targetFilePath;
    $sql_query = "INSERT INTO eventres(name,eventName,eventDate,eventTime,contactNum,address,sponsored,package,amount,email,package,credentialfile) VALUES('$name','$eventName','$eventDate','$eventTime','$contactNum','$address','$sponsored','$package','$amount','$email','$package','$targetFilePath'')";
		mysqli_query($conn,$sql_query);
	
		echo "<script type='text/javascript'>
			alert('Added Successfully!');
			window.location = '../staff.php';
		</script>";
		echo mysqli_error($conn);	
  }
  else{
    echo "<script type='text/javascript'>
			alert('Request Failed!');
			window.location = '../staff.php';
		</script>";
		echo mysqli_error($conn);
      }
  }
  else{
    echo "<script type='text/javascript'>
			alert('Added Successfully!');
			window.location = '../staff.php';
		</script>";
		echo mysqli_error($conn);
      }
  }

	// $sql_query = "INSERT INTO forms(fname,lname,address,mobilePhone,email,formType,status,amount,pack,refNum,receiptIMG,optionPay) VALUES('$fname','$lname','$address','$mobilePhone','$email','$formType','$status','$amount','$pack','$refNum','$receiptIMG','$optionPay')";
	// 	mysqli_query($conn,$sql_query);

?>

<?php
	mysqli_close($conn);
			?>

