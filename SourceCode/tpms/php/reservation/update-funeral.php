<?php
  session_start();
  include_once '../dbconn.php';

  if (count($_POST) > 0) {
    $status = $_POST['status'];
    $id = $_POST['id'];

      // Update the account type in the database
      mysqli_query($conn, "UPDATE funeralmass_tbl SET status='$status' WHERE id='$id'");

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
  header('Location: ../../admin/walk-in/funeralmass.php');
  exit();
  }

  $result = mysqli_query($conn, "SELECT * FROM funeralmass_tbl WHERE id='" . $_GET['id'] . "'");
  $row = mysqli_fetch_array($result);
?>