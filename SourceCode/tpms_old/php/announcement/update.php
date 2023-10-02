<?php
  include_once 'dbconn.php';

  if (count($_POST) > 0) {
    $title = $_POST['title'];
    $eventdate = $_POST['eventdate'];
    $start = $_POST['start'];
    $endtime = $_POST['endtime'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $id = $_POST['id'];

      // Update the account type in the database
      mysqli_query($conn, "UPDATE announcement SET title='$title',eventdate='$eventdate',start='$start',endtime='$endtime',description='$description',location='$location' WHERE id='$id'");

       echo "<script type='text/javascript'>
        alert('Updated Successfully!');
        window.location = '../../admin.php';
      </script>";
  }

  $result = mysqli_query($conn, "SELECT * FROM announcement WHERE id='" . $_GET['id'] . "'");
  $row = mysqli_fetch_array($result);
?>