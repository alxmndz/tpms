<?php
session_start();
include_once '../dbconn.php';

// Get the data from the modal
$fullname = $_POST['fullname'];
$fatherName = $_POST['fatherName'];
$motherName = $_POST['motherName'];
$birthPlace = $_POST['birthPlace'];
$birthDate = $_POST['birthDate'];
$resDate = $_POST['resDate'];
$priest = $_POST['priest'];
$sponsor1 = $_POST['sponsor1'];
$sponsor2 = $_POST['sponsor2'];

// Insert the data into the database
$sql = "INSERT INTO certbap (name, fatherName, motherName, birthPlace, birthDate, resDate, priest, sponsor1, sponsor2) VALUES ('$fullname', '$fatherName', '$motherName', '$birthPlace', '$birthDate', '$resDate', '$priest', '$sponsor1', '$sponsor2')";
$execute = mysqli_query($conn, $sql);

if ($execute) {
    // Show a Sweet Alert
    /*echo '<script>
    swal({
      title: "Success!",
      text: "Certificate has been generated successfully.",
      type: "success",
      timer: 3000,
      showConfirmButton: false
    });
  </script>';*/
  $_SESSION['message'] = "Certificate has been generated successfully.";
  $_SESSION['alert'] = "success";
  header('Location: ../../staff/certificate/bapGenCert.php');
} else {
    echo mysqli_error($conn);
}

?>
