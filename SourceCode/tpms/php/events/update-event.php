<?php
include "../dbconn.php";

session_start();
if (isset($_POST['btn-save'])) {
    // Get form data
    $id = $_POST['id']; // Assuming you have an input field for the event ID

    $evntTitle = $_POST['evntTitle'];
    $eventDate = $_POST['eventDate'];
    $eventTime = $_POST['eventTime'];
    $description = $_POST['description'];

    // Update the data in the database
    $sql = "UPDATE eventlist SET
            title = '$evntTitle',
            eventDate = '$eventDate',
            eventTime = '$eventTime',
            description = '$description'
            WHERE id = $id";

    $execute = mysqli_query($conn,$sql);

    if ($execute) {
      $_SESSION['message'] = "Event has been updated successfully";
      $_SESSION['alert'] = "success";
      header('Location: ../../staff/event-list.php');
    } else {
        echo mysqli_error($conn);
    }
}

// Close the database connection
$conn->close();
?>
