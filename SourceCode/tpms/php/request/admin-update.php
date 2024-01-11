<?php
session_start();
include_once '../dbconn.php';

if (count($_POST) > 0) {
    $status = $_POST['status'];
    $pickUpDt = $_POST['pickUpDt'];
    $whenToPickUp = $_POST['whenToPickUp'];
    $id = $_POST['id'];

    // Check if the status is "Ready to Pick Up"
    if ($status === 'Ready to pick up') {
        // Set whenToPickUp to the current date
        date_default_timezone_set('Asia/Manila');
        $whenToPickUp = date('Y-m-d H:i:s');
        mysqli_query($conn, "UPDATE request SET status='$status', whenToPickUp='$whenToPickUp' WHERE id='$id'");
    } 

    if ($status === 'Released') {
        // Set pickUpDt to the current timestamp
        date_default_timezone_set('Asia/Manila');
        $manilaTimezone = new DateTimeZone('Asia/Manila');
        $currentTimestamp = new DateTime('now', $manilaTimezone);
        $formattedTimestamp = $currentTimestamp->format('Y-m-d H:i:s');
        mysqli_query($conn, "UPDATE request SET status='$status', whenToPickUp='$formattedTimestamp', pickUpDt='$formattedTimestamp' WHERE id='$id'");
    }

    echo '<script>
            swal({
                title: "Success!",
                text: "Request Updated!",
                type: "success",
                timer: 3000,
                showConfirmButton: false
            });
        </script>';

        // Set session variables for additional messages (if needed)
        $_SESSION['message'] = "Request Updated!";
        $_SESSION['alert'] = "success";

        // Redirect to the appropriate page
        header('Location: ../../admin/request.php');
        exit();
}

$result = mysqli_query($conn, "SELECT * FROM request WHERE id='" . $_GET['id'] . "'");
$row = mysqli_fetch_array($result);
?>
