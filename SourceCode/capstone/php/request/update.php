<?php
  include_once 'dbconn.php';

  if (count($_POST) > 0) {
    $status = $_POST['status'];
    $pickUpDt = $_POST['pickUpDt'];
    $id = $_POST['id'];

      // Update the account type in the database
      mysqli_query($conn, "UPDATE request SET status='$status',pickUpDt='$pickUpDt' WHERE id='$id'");

       echo "<script type='text/javascript'>
        alert('Request Updated!');
        window.location = '../../admin.php';
      </script>";
  }

  $result = mysqli_query($conn, "SELECT * FROM request WHERE id='" . $_GET['id'] . "'");
  $row = mysqli_fetch_array($result);
?>