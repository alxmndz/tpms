<?php
include_once 'dbconn.php';

if (count($_POST) > 0) {
    $status = $_POST['status'];
    $pickUpDt = $_POST['pickUpDt'];
    $whenToPickUp = $_POST['whenToPickUp'];
    $id = $_POST['id'];

    // Check if the status is "Ready to Pick Up"
    if ($status === 'Ready to pick up') {
        // Set whenToPickUp to the current date
        date_default_timezone_set('Asia/Manila'); // Set the time zone to Philippines
        $whenToPickUp = date('Y-m-d H:i:s');
        mysqli_query($conn, "UPDATE request SET status='$status', whenToPickUp=NOW() WHERE id='$id'");
    } 

    if ($status === 'Released') {
        // Set pickUpDt to the current timestamp
        date_default_timezone_set('Asia/Manila');
        $pickUpDt = date('Y-m-d H:i:s');
        mysqli_query($conn, "UPDATE request SET status='$status', pickUpDt=NOW() WHERE id='$id'");
    }

    echo "<script type='text/javascript'>
        alert('Request Updated!');
        window.location = '../../admin.php';
    </script>";
}

$result = mysqli_query($conn, "SELECT * FROM request WHERE id='" . $_GET['id'] . "'");
$row = mysqli_fetch_array($result);
?>