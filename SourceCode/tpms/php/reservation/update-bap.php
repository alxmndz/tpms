<?php
  session_start();
  include_once '../dbconn.php';

  if (count($_POST) > 0) {
    $birthCert = $_POST['birthCert'];
    $marriageCont = $_POST['marriageCont'];
    $sponsor1 = $_POST['sponsor1'];
    $sponsor2 = $_POST['sponsor2'];
    $status = $_POST['status'];
    $id = $_POST['id'];

      // Update the account type in the database
      mysqli_query($conn, "UPDATE baptismal_tbl SET birthCert='$birthCert',marriageCont='$marriageCont',sponsor1='$sponsor1',sponsor2='$sponsor2',status='$status' WHERE id='$id'");

      echo '<script>
      swal({
          title: "Success!",
          text: "Reservation Updated Successfully!",
          type: "success",
          timer: 3000,
          showConfirmButton: false
      });
  </script>';

  // Set session variables for additional messages (if needed)
  $_SESSION['message'] = "Reservation Updated Successfully!";
  $_SESSION['alert'] = "success";

  // Redirect to the appropriate page
  header('Location: ../../admin/walk-in/baptismal.php');
  exit();
  }

  $result = mysqli_query($conn, "SELECT * FROM baptismal_tbl WHERE id='" . $_GET['id'] . "'");
  $row = mysqli_fetch_array($result);
?>