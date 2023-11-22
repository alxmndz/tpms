<?php
  include_once '../dbconn.php';

  if (count($_POST) > 0) {
    $birthCert = $_POST['birthCert'];
    $bapCert = $_POST['bapCert'];
    $conCert = $_POST['conCert'];
    $cenomar = $_POST['cenomar'];
    $marriageLicense = $_POST['marriageLicense'];
    $RPic = $_POST['RPic'];
    $MBPic = $_POST['MBPic'];
    $id = $_POST['id'];

      // Update the account type in the database
      mysqli_query($conn, "UPDATE wedding_tbl SET birthCert='$birthCert', bapCert='$bapCert', conCert='$conCert', cenomar='$cenomar', marriageLicense='$marriageLicense', RPic='$RPic', MBPic='$MBPic' WHERE id='$id'");

       echo "<script type='text/javascript'>
        alert('Updated Successfully!');
        window.location = '../../staff.php';
      </script>";
  }

  $result = mysqli_query($conn, "SELECT * FROM wedding_tbl WHERE id='" . $_GET['id'] . "'");
  $row = mysqli_fetch_array($result);
?>