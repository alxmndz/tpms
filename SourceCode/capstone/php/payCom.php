<?php
include_once 'dbconn.php';

if (isset($_POST['btn-save'])) {
    // Assuming you have variables like $id defined somewhere in your code
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    $payMethod = mysqli_real_escape_string($conn, $_POST['payMethod']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $payDate = mysqli_real_escape_string($conn, $_POST['payDate']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $refNum = mysqli_real_escape_string($conn, $_POST['refNum']);

    // File upload
    $targetDir = "../receipt/";
    $fileName = $_FILES['receipt']['name'];
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');

    if (!in_array($fileType, $allowTypes)) {
        echo "<script type='text/javascript'>
            alert('Invalid File Type! Only JPG, PNG, JPEG, GIF, or PDF allowed.');
            window.location = '../patron.php';
        </script>";
        exit;
    }

    if (!move_uploaded_file($_FILES["receipt"]["tmp_name"], $targetFilePath)) {
        echo "<script type='text/javascript'>
            alert('File Upload Failed!');
            window.location = '../patron.php';
        </script>";
        exit;
    }

    // Database query to update data
    $sql_query = "UPDATE communion_tbl SET payMethod='$payMethod', amount='$amount', payDate='$payDate', status='$status', receipt='$targetFilePath', refNum='$refNum' WHERE id='$id'";

    if (mysqli_query($conn, $sql_query)) {
        echo "<script type='text/javascript'>
            alert('Reservation Paid Successfully!');
            window.location = '../patron.php';
        </script>";
    } else {
        echo "<script type='text/javascript'>
            alert('Update Failed: " . mysqli_error($conn) . "');
            window.location = '../patron.php';
        </script>";
    }
    mysqli_close($conn);
} else {
    echo "<script type='text/javascript'>
        alert('Invalid Payment Method!');
        window.location = '../patron.php';
    </script>";
    exit;
}
?>
