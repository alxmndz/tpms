<?php
include_once 'dbconn.php';
if(isset($_POST['btn-save']))
{
  $title = $_POST['title'];
  $eventdate = $_POST['eventdate'];
  $start = $_POST['start'];
  $endtime = $_POST['endtime'];
  $description = $_POST['description'];
  $location = $_POST['location'];
  $announcePic = $_FILES['announcePic'];  

  $targetDir = "../announcement/";
  $fileName5 = $_FILES['announcePic']['name'];
  $targetFilePath = $targetDir . $fileName5;
  $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);   
                            
  $fileTmpName5 = $_FILES['announcePic']['tmp_name'];
  $allowTypes = array('jpg','png','jpeg','gif','pdf');
  if(in_array($fileType, $allowTypes)){
    if(move_uploaded_file($_FILES["announcePic"]["tmp_name"], $targetFilePath)){
    echo $targetFilePath;
    $sql_query = "INSERT INTO announcement(title,eventdate,start,endtime,description,location,announcePic) VALUES('$title','$eventdate','$start','$endtime','$description','$location','$targetFilePath')";

    mysqli_query($conn,$sql_query);
  
    echo "<script type='text/javascript'>
      alert('Announcement Added!');
      window.location = '../admin.php';
    </script>";
  }
  else{
    echo "<script type='text/javascript'>
      alert('Announcement Failed!');
      window.location = '../admin.php';
    </script>";
      }
  }
  else{
    echo "<script type='text/javascript'>
      alert('Announcement Added!');
      window.location = '../admin.php';
    </script>";
      }
  }
?>

<?php
  mysqli_close($conn);
      ?>
