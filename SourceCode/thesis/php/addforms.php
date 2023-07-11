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
  $refNum = $_POST['refNum'];
  $receiptIMG = $_FILES['receiptIMG'];  

  $targetDir = "../php/receipts/";
  $fileName5 = $_FILES['receiptIMG']['name'];
  $targetFilePath = $targetDir . $fileName5;
  $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);   
                            
  $fileTmpName5 = $_FILES['receiptIMG']['tmp_name'];
  $allowTypes = array('jpg','png','jpeg','gif','pdf');
  if(in_array($fileType, $allowTypes)){
    if(move_uploaded_file($_FILES["receiptIMG"]["tmp_name"], $targetFilePath)){
    echo $targetFilePath;
    $sql_query = "INSERT INTO forms(fname,lname,address,mobilePhone,email,formType,status,amount,refNum,receiptIMG) VALUES('$fname','$lname','$address','$mobilePhone','$email','$formType','$status','$amount','$refNum','$targetFilePath')";
    mysqli_query($conn,$sql_query);
  
    echo "<script type='text/javascript'>
      alert('Request Added Successfully!');
      window.location = '../../dashboard.php';
    </script>";
  }
  else{
    echo "<script type='text/javascript'>
      alert('Request Failed!');
      window.location = '../../dashboard.php';
    </script>";
      }
  }
  else{
    echo "<script type='text/javascript'>
      alert('Added Successfully!');
      window.location = '../../dashboard.php';
    </script>";
      }
  }

  // $sql_query = "INSERT INTO forms(fname,lname,address,mobilePhone,email,formType,status,amount,pack,refNum,receiptIMG,optionPay) VALUES('$fname','$lname','$address','$mobilePhone','$email','$formType','$status','$amount','$pack','$refNum','$receiptIMG','$optionPay')";
  //  mysqli_query($conn,$sql_query);

?>

<?php
  mysqli_close($conn);
      ?>
