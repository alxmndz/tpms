<?php
session_start();
include_once '../dbconn.php';

// Get the form data
$groom = $_POST['groom'];
$bride = $_POST['bride'];
$gAge = $_POST['gAge'];
$bAge = $_POST['bAge'];
$maritalStatus = $_POST['maritalStatus'];
$maritalStatus2 = $_POST['maritalStatus2'];
$gNat  = $_POST['gNat'];
$bNat = $_POST['bNat'];
$gResidence = $_POST['gResidence'];
$bResidence = $_POST['bResidence'];
$gFather = $_POST['gFather'];
$gMother = $_POST['gMother'];
$bFather = $_POST['bFather'];
$bMother = $_POST['bMother'];
$marriedDate = $_POST['marriedDate'];
$priest = $_POST['priest'];
$sponsor1 = $_POST['sponsor1'];
$sponsor2 = $_POST['sponsor2'];

// Validate the form data
// TODO: Validate the form data here

// Insert the data into the database
$sql = "INSERT INTO certmarriage (groom, bride, gAge, bAge, maritalStatus, maritalStatus2, gNat, bNat, gResidence, bResidence, gFather, gMother, bFather, bMother, marriedDate, priest, sponsor1, sponsor2) VALUES ('$groom', '$bride', '$gAge', '$bAge', '$maritalStatus', '$maritalStatus2', '$gNat', '$bNat', '$gResidence', '$bResidence', '$gFather', '$gMother', '$bFather', '$bMother', '$marriedDate', '$priest', '$sponsor1', '$sponsor2')";
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
  header('Location: ../../admin/certificate/marriageGenCert.php');
} else {
    echo mysqli_error($conn);
}

?>
