<?php
include "../dbconn.php";

session_start();
if (isset($_POST['btn-save'])) {
    $evntTitle = $_POST['evntTitle'];
    $eventDate = $_POST['eventDate'];
    $eventTime = $_POST['eventTime'];
    $description = $_POST['description'];

    // Use prepared statement to prevent SQL injection
    $sql_query = "INSERT INTO eventlist (title, eventDate, eventTime, description) VALUES ('$evntTitle', '$eventDate', '$eventTime', '$description')";

    $execute = mysqli_query($conn,$sql_query);

    if ($execute) {
      $_SESSION['message'] = "Event has been inserted successfully";
      $_SESSION['alert'] = "success";
      header('Location: ../../staff/event-list.php');
    } else {
        echo mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
