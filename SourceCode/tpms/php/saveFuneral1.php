<?php
include_once 'dbconn.php';
if(isset($_POST['btn-save']))
{
  $addedBy = $_POST['addedBy'];
  $name = $_POST['name'];
  $fName = $_POST['fName'];
  $mName = $_POST['mName'];
  $widow = $_POST['widow'];
  $address = $_POST['address'];
  $contact = $_POST['contact'];
  $deathDate = $_POST['deathDate'];
  $age = $_POST['age'];
  $buryDate = $_POST['buryDate'];
  $cause = $_POST['cause'];
  $sacrament = $_POST['sacrament'];
  $lastsacrament = $_POST['lastsacrament'];
  $payMethod = $_POST['payMethod'];
  $transactType = $_POST['transactType'];
  $refNum = $_POST['refNum'];
  $amount = $_POST['amount'];

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
    $sql_query = "INSERT INTO funeralmass_tbl(name,fName,mName,widow,address,deathDate,age,buryDate,cause,sacrament,lastsacrament,amount,addedBy,receipt,payMethod,transactType,refNum,contact) VALUES('$name','$fName','$mName','$widow','$address','$deathDate','$age','$buryDate','$cause','$sacrament','$lastsacrament','$amount','$addedBy','$targetFilePath','$payMethod','$transactType','$refNum','$contact')";
    mysqli_query($conn,$sql_query);
  
    echo "<script type='text/javascript'>
      alert('Funeral Reserved Successfully!');
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
      alert('Funeral Reserved Successfully!');
      window.location = '../patron.php';
    </script>";
      }
  }
      
?>

<?php
  mysqli_close($conn);
      ?>
