<?php
session_start();
include_once '../dbconn.php';

if (isset($_POST['btn-save'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $announcePic = $_FILES['announcePic'];
    $announceTime = $_POST['announceTime'];
    $announceDate = $_POST['announceDate'];
    date_default_timezone_set('Asia/Manila');
    $postDate = date('Y-m-d H:i:s');

    $targetDir = "../../assets/announcement/";
    $fileName5 = $_FILES['announcePic']['name'];
    $targetFilePath = $targetDir . $fileName5;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    $fileTmpName5 = $_FILES['announcePic']['tmp_name'];
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');

    if (in_array($fileType, $allowTypes)) {
        if (move_uploaded_file($_FILES["announcePic"]["tmp_name"], $targetFilePath)) {
            $sql_query = "INSERT INTO announcement (title, description, announcePic, postDate, announceTime, announceDate) VALUES ('$title', '$description', '$targetFilePath', '$postDate', '$announceTime', '$announceDate')";

            if (mysqli_query($conn, $sql_query)) {
                $_SESSION['message'] = "Announcement added successfully!";
                $_SESSION['alert'] = "success";
                header('Location: ../../admin/announcement.php');
                exit;
            } else {
                $_SESSION['message'] = "Announcement Failed!";
                $_SESSION['alert'] = "error";
                header('Location: ../../admin/announcement.php');
                exit;
            }
        } else {
            $_SESSION['message'] = "File upload failed!";
            $_SESSION['alert'] = "error";
            header('Location: ../../admin/announcement.php');
            exit;
        }
    } else {
        $_SESSION['message'] = "Invalid Data!";
        $_SESSION['alert'] = "error";
        header('Location: ../../admin/announcement.php');
        exit;
    }
}

mysqli_close($conn);
?>
