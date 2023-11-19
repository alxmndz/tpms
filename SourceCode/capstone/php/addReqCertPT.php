<?php
include_once 'dbconn.php';

if (isset($_POST['btn-save'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $event = mysqli_real_escape_string($conn, $_POST['event']);
    $addedBy = mysqli_real_escape_string($conn, $_POST['addedBy']);

    $sql_query = "INSERT INTO request(name, contact, address, event, addedBy) VALUES ('$name', '$contact', '$address', '$event', '$addedBy')";
    $result = mysqli_query($conn, $sql_query);

    if ($result) {
        echo "<script type='text/javascript'>
              alert('Request Added Successfully!');
              window.location = '../patron.php';
              </script>";
    } else {
        echo "<script type='text/javascript'>
              alert('Error adding request: " . mysqli_error($conn) . "');
              window.location = '../patron.php';
              </script>";
    }
}

// Close the database connection
mysqli_close($conn);
?>
