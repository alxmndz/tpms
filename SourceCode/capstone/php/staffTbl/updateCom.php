<?php
  include_once '../dbconn.php';

  if (count($_POST) > 0) {
    $bapCert = $_POST['bapCert'];
    $id = $_POST['id'];

      // Update the account type in the database
      mysqli_query($conn, "UPDATE communion_tbl SET bapCert='$bapCert' WHERE id='$id'");

       echo "<script type='text/javascript'>
        alert('Updated Successfully!');
        window.location = '../../staff.php';
      </script>";
  }

  $result = mysqli_query($conn, "SELECT * FROM communion_tbl WHERE id='" . $_GET['id'] . "'");
  $row = mysqli_fetch_array($result);
?>