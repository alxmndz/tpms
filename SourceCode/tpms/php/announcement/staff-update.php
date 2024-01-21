<?php
session_start();
include_once '../dbconn.php';

if (count($_POST) > 0) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $id = $_POST['id'];
    $announceTime = $_POST['announceTime'];
    $announceDate = $_POST['announceDate'];
    date_default_timezone_set('Asia/Manila');
    $postDate = date('Y-m-d H:i:s');

    // Check if a file is uploaded
    $targetDir = "../../assets/announcement/";
    $fileName = $_FILES['announcePic']['name'];
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');

    if (!in_array($fileType, $allowTypes)) {
        $_SESSION['message'] = "Invalid File Type! Only JPG, PNG, JPEG, GIF, or PDF allowed.";
        $_SESSION['alert'] = "error";
        header('Location: ../../staff/announcement.php');
        exit;
    }

    if (!move_uploaded_file($_FILES["announcePic"]["tmp_name"], $targetFilePath)) {
        $_SESSION['message'] = "File Upload Failed!";
        $_SESSION['alert'] = "error";
        header('Location: ../../staff/announcement.php');
        exit;
    }

    // Use prepared statements to prevent SQL injection
    $sql_query = "UPDATE announcement SET title=?, description=?, announceTime=?, announceDate=?, announcePic=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql_query);
    mysqli_stmt_bind_param($stmt, 'sssssi', $title, $description, $announceTime, $announceDate, $fileName, $id);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['message'] = "Updated the announcement successfully!";
        $_SESSION['alert'] = "success";
        header('Location: ../../staff/announcement.php');
        exit;
    } else {
        $_SESSION['message'] = "Update Failed: " . mysqli_error($conn);
        $_SESSION['alert'] = "error";
        header('Location: ../../staff/announcement.php');
        exit;
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    $_SESSION['message'] = "Invalid Data!";
    $_SESSION['alert'] = "error";
    header('Location: ../staff/announcement.php');
    exit;
}
?>
