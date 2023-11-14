<?php
  include_once '../dbconn.php';

  if (count($_POST) > 0) {
    $status = $_POST['status'];
    $id = $_POST['id'];

      // Update the account type in the database
      mysqli_query($conn, "UPDATE certcomm SET status='$status' WHERE id='$id'");

       echo "<script type='text/javascript'>
        alert('Certificate Status Updated!');
        window.location = '../../admin.php';
      </script>";
  }

  $result = mysqli_query($conn, "SELECT * FROM certcomm WHERE id='" . $_GET['id'] . "'");
  $row = mysqli_fetch_array($result);
?>