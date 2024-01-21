<?php
session_start();
include_once '../dbconn.php';

if (count($_POST) > 0) {
    // Sanitize user input
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    $targetDir = "../../assets/profile/";
    $fileName = $_FILES['profile']['name'];
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');

    if (!in_array($fileType, $allowTypes)) {
        $_SESSION['message'] = "Invalid File Type! Only JPG, PNG, JPEG, GIF, or PDF allowed.";
        $_SESSION['alert'] = "error";
        header('Location: ../../staff/profile.php');
        exit();
    }

    if (move_uploaded_file($_FILES["profile"]["tmp_name"], $targetFilePath)) {
        $sql_query = "UPDATE users SET uname='$uname',name='$name',address='$address',contact='$contact',email='$email', profile='$fileName' WHERE id='$id'";

        if (mysqli_query($conn, $sql_query)) {
            $_SESSION['message'] = "Profile Updated Successfully!";
            $_SESSION['alert'] = "success";
            header('Location: ../../staff/profile.php');
            exit();
        } else {
            $_SESSION['message'] = "Update Failed: " . mysqli_error($conn);
            $_SESSION['alert'] = "error";
            header('Location: ../../staff/profile.php');
            exit();
        }
    } else {
        $_SESSION['message'] = "File Upload Failed!";
        $_SESSION['alert'] = "error";
        header('Location: ../../staff/profile.php');
        exit();
    }

    mysqli_close($conn);
} else {
    $_SESSION['message'] = "Invalid Data!";
    $_SESSION['alert'] = "error";
    header('Location: ../../staff/profile.php');
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $_GET['id'] . "'");
$row = mysqli_fetch_array($result);
?>
