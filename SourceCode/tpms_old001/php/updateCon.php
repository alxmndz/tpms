<?php
  include_once 'dbconn.php';

  if (count($_POST) > 0) {
    $bapCert = $_POST['bapCert'];
    $status = $_POST['status'];
    $id = $_POST['id'];

      // Update the account type in the database
      mysqli_query($conn, "UPDATE confirmation_tbl SET bapCert='$bapCert',status='$status' WHERE id='$id'");

       echo "<script type='text/javascript'>
        alert('Updated Successfully!');
        window.location = '../admin.php';
      </script>";
  }

  $result = mysqli_query($conn, "SELECT * FROM confirmation_tbl WHERE id='" . $_GET['id'] . "'");
  $row = mysqli_fetch_array($result);
?>