<?php
  include_once 'dbconn.php';

  if (count($_POST) > 0) {
    $type = $_POST['type'];
    $id = $_POST['id'];

      // Update the account type in the database
      mysqli_query($conn, "UPDATE users SET type='$type' WHERE id='$id'");

       echo "<script type='text/javascript'>
        alert('Updated Successfully!');
        window.location = '../../admin.php';
      </script>";
  }

  $result = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $_GET['id'] . "'");
  $row = mysqli_fetch_array($result);
?>