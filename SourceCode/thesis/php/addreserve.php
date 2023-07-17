
<?php
include_once 'dbconn.php';
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
	$status = $_POST['status'];
	$credentialfile = $_FILES['credentialfile'];

	$targetDir = "../credentials/";
  $fileName5 = $_FILES['credentialfile']['name'];
  $targetFilePath = $targetDir . $fileName5;
  $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);   
                    
  $fileTmpName5 = $_FILES['credentialfile']['tmp_name'];
  $allowTypes = array('jpg','png','jpeg','gif','pdf');
  if(in_array($fileType, $allowTypes)){
	  	if(move_uploaded_file($_FILES["credentialfile"]["tmp_name"], $targetFilePath)){
	  	// echo $targetFilePath;
	    $sql_query = "INSERT INTO eventres(name,eventName,eventDate,eventTime,contactNum,address,sponsored,amount,email,package,status,credentialfile) VALUES('$name','$eventName','$eventDate','$eventTime','$contactNum','$address','$sponsored','$amount','$email','$package','$status','$targetFilePath')";
			$result = mysqli_query($conn,$sql_query);
		
			if($result){
				echo "<script type='text/javascript'>
				alert('Added Successfully!');
				window.location = '../dashboard.php';
				</script>";
			}else{
					echo "<script type='text/javascript'>
				alert('Request Failed!');
				window.location = '../dashboard.php';
				</script>";
			}
		}
  }
  else{
    echo "<script type='text/javascript'>
			alert('Added Successfully!');
			window.location = '../dashboard.php';
		</script>";
      }
  }
?>

<?php
	mysqli_close($conn);
			?>

