<?php
include_once 'dbconn.php';
if(isset($_POST['btn-save']))
{
  $addedBy = $_POST['addedBy'];
  $name = $_POST['name'];
  $contact = $_POST['contact'];
  $address = $_POST['address'];
  $blessDate = $_POST['blessDate'];
  $blessTime = $_POST['blessTime'];
  $intention = $_POST['intention'];
  $amount = $_POST['amount'];
  $transactType = $_POST['transactType'];
  $payMethod = $_POST['payMethod'];
  $refNum = $_POST['refNum'];
  
  $receipt = $_FILES['receipt'];
  $targetDir = "../receipt/";
  $fileName5 = $_FILES['receipt']['name'];
  $targetFilePath = $targetDir . $fileName5;
  $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);   
                            
  $fileTmpName5 = $_FILES['receipt']['tmp_name'];
  $allowTypes = array('jpg','png','jpeg','gif','pdf');
  if(in_array($fileType, $allowTypes)){
    if(move_uploaded_file($_FILES["receipt"]["tmp_name"], $targetFilePath)){
    echo $targetFilePath;
    $sql_query = "INSERT INTO blessing_tbl(name,contact,address,blessDate,blessTime,intention,amount,addedBy,receipt,transactType,payMethod,refNum) VALUES('$name','$contact','$address','$blessDate','$blessTime','$intention','$amount','$addedBy','$targetFilePath','$transactType','$payMethod','$refNum')";
    mysqli_query($conn,$sql_query);
  
    echo "<script type='text/javascript'>
      alert('Reserved Successfully!');
      window.location = '../patron.php';
    </script>";
  }
  else{
    echo "<script type='text/javascript'>
      alert('Request Failed!');
      window.location = '../patron.php';
    </script>";
      }
  }
  else{
    echo "<script type='text/javascript'>
      alert('Added Successfully!');
      window.location = '../patron.php';
    </script>";
      }
  }
      
?>

<?php
  mysqli_close($conn);
      ?>
