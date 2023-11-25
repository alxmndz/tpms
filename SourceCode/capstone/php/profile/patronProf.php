<?php
include_once '../dbconn.php';

if (count($_POST) > 0) {
    $uname = $_POST['uname'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $id = $_POST['id'];

    $targetDir = "../../assets/img/profile/";
    $fileName = $_FILES['profile']['name'];
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');

    if (!in_array($fileType, $allowTypes)) {
        echo "<script type='text/javascript'>
            alert('Invalid File Type! Only JPG, PNG, JPEG, GIF, or PDF allowed.');
            window.location = '../../patron.php';
        </script>";
        exit;
    }

    if (!move_uploaded_file($_FILES["profile"]["tmp_name"], $targetFilePath)) {
        echo "<script type='text/javascript'>
            alert('File Upload Failed!');
            window.location = '../../patron.php';
        </script>";
        exit;
    }

    // Update the account type in the database
    $sql_query = "UPDATE users SET uname='$uname',name='$name',address='$address',contact='$contact',email='$email', profile='$fileName' WHERE id='$id'";

    if (mysqli_query($conn, $sql_query)) {
        echo "<script type='text/javascript'>
            alert('Profile Updated Successfully!');
            window.location = '../../patron.php';
        </script>";
    } else {
        echo "<script type='text/javascript'>
            alert('Update Failed: " . mysqli_error($conn) . "');
            window.location = '../../patron.php';
        </script>";
    }

    mysqli_close($conn);
} else {
    echo "<script type='text/javascript'>
        alert('Invalid Data!');
        window.location = '../../patron.php';
    </script>";
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $_GET['id'] . "'");
$row = mysqli_fetch_array($result);
?>
