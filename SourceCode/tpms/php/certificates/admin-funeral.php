<?php
// Connect to the database
session_start();
include_once '../dbconn.php';

// Get the data from the modal
$name = $_POST['deceasedName'];
$fName = $_POST['fName'];
$mName = $_POST['mName'];
$widow = $_POST['widow'];
$address = $_POST['address'];
$deathDate = $_POST['deathDate'];
$age = $_POST['age'];
$buryDate = $_POST['buryDate'];
$cause = $_POST['cause'];
$sacrament = $_POST['sacrament'];
$lastsacrament = $_POST['lastsacrament'];
$priest = $_POST['priest'];


// Prepare the SQL statement
$sql = "INSERT INTO certfun (deceasedName, fatherName, motherName, widow, residentAdd, deathDate, age, internment, causeOfDeath,  sbd, sbd2, priest) VALUES ('$name', '$fName', '$mName', '$widow', '$address', '$deathDate', '$age', '$buryDate', '$cause', '$sacrament', '$lastsacrament', '$priest')";

// Execute the SQL statement
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
  $_SESSION['message'] = "Certificate has been generated successfully";
  $_SESSION['alert'] = "success";
  header('Location: ../../admin/certificate/deathGenCert.php');
} else {
    echo mysqli_error($conn);
}

?>
