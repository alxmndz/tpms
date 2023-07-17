<?php
include_once 'dbconn.php';
if(isset($_POST['btn-save']))
{
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $contact = $_POST['contact'];
  $refNum = $_POST['refNum'];
  $donateAmount = $_POST['donateAmount'];
  $donateDate = $_POST['donateDate'];
  $donateEvent = $_POST['donateEvent'];
  $donateReceipt = $_FILES['donateReceipt'];  

  $targetDir = "../rcpts/";
  $fileName5 = $_FILES['donateReceipt']['name'];
  $targetFilePath = $targetDir . $fileName5;
  $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);   
                            
  $fileTmpName5 = $_FILES['donateReceipt']['tmp_name'];
  $allowTypes = array('jpg','png','jpeg','gif','pdf');
  if(in_array($fileType, $allowTypes)){
    if(move_uploaded_file($_FILES["donateReceipt"]["tmp_name"], $targetFilePath)){
    echo $targetFilePath;
    $sql_query = "INSERT INTO donation(fname,lname,contact,refNum,donateAmount,donateDate,donateEvent,donateReceipt) VALUES('$fname','$lname','$contact','$refNum','$donateAmount','$donateDate','$donateEvent','$targetFilePath')";
    mysqli_query($conn,$sql_query);
  
    echo "<script type='text/javascript'>
      alert('Added Successfully!');
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
