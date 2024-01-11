<?php
session_start(); // Make sure to start the session

include_once '../dbconn.php';

if (count($_POST) > 0) {
    $wedding = $_POST['wedding'];
    $id = $_POST['id'];

    // Update the account type in the database
    $query = "UPDATE eventsprice SET wedding='$wedding' WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Show a Sweet Alert
        echo '<script>
            swal({
                title: "Success!",
                text: "Updated!",
                type: "success",
                timer: 3000,
                showConfirmButton: false
            });
        </script>';

        // Set session variables for additional messages (if needed)
        $_SESSION['message'] = "Price has been updated!";
        $_SESSION['alert'] = "success";

        // Redirect to the appropriate page
        header('Location: ../../admin/pricing.php');
        exit(); // Make sure to exit after a header redirect
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Redirect to the appropriate page if there are no POST data
    header('Location: ../../admin/pricing.php');
    exit();
}
?>
