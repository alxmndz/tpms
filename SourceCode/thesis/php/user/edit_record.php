<?php
include_once 'dbconn.php';


    // Perform input validation
    if (!empty($_POST['type']) && !empty($_POST['user_id'])) {
        $type = $_POST['type'];
        $user_id = $_POST['user_id'];

        // Update the data in the database
        $sql = "UPDATE accounts SET type='$type' WHERE user_id='$user_id'";
        if (mysqli_query($conn, $sql)) {
            // Update successful
            echo 'success';
        } else {
            // Update failed
            echo 'error';
        }
    } else {
        // Validation failed
        echo 'error';
    }
?>
