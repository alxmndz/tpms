<?php
include_once 'dbconn.php';
if(isset($_POST['btn-save']))
{
  $name = $_POST['name'];
  $contact = $_POST['contact'];
  $address = $_POST['address'];
  $blessDate = $_POST['blessDate'];
  $blessTime = $_POST['blessTime'];
  $intention = $_POST['intention'];
  $amount = $_POST['amount'];
  $addedBy = $_POST['addedBy'];
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
    $sql_query = "INSERT INTO blessing_tbl(name,contact,address,blessDate,blessTime,intention,amount,addedBy,receipt) VALUES('$name','$contact','$address','$blessDate','$blessTime','$intention','$amount','$addedBy','$targetFilePath')";
    mysqli_query($conn,$sql_query);
  
    echo "<script type='text/javascript'>
      alert('Added Successfully!');
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