<?php
include_once 'dbconn.php';
if(isset($_POST['btn-save']))
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $contact = $_POST['contact'];
  $date = $_POST['date'];
  $amount = $_POST['amount'];
  $event = $_POST['event'];
  $addedBy = $_POST['addedBy'];
  $receipt = $_FILES['receipt'];  

  $targetDir = "donate/";
  $fileName5 = $_FILES['receipt']['name'];
  $targetFilePath = $targetDir . $fileName5;
  $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);   
                            
  $fileTmpName5 = $_FILES['receipt']['tmp_name'];
  $allowTypes = array('jpg','png','jpeg','gif','pdf');
  if(in_array($fileType, $allowTypes)){
    if(move_uploaded_file($_FILES["receipt"]["tmp_name"], $targetFilePath)){
    echo $targetFilePath;
    $sql_query = "INSERT INTO donation(name,email,address,contact,donatedDate,amount,event,addedBy,receipt) VALUES('$name','$email','$address','$contact','$date','$amount','$event','$addedBy','$targetFilePath')";
    mysqli_query($conn,$sql_query);
  
    echo "<script type='text/javascript'>
      alert('Donation Added Successfully!');
      window.location = '../admin.php';
    </script>";
  }
  else{
    echo "<script type='text/javascript'>
      alert('Request Failed!');
      window.location = '../admin.php';
    </script>";
      }
  }
  else{
    echo "<script type='text/javascript'>
      alert('Added Successfully!');
      window.location = '../admin.php';
    </script>";
      }
  }
?>

<?php
  mysqli_close($conn);
      ?>
