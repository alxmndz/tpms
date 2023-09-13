<?php
include_once 'dbconn.php';

if (isset($_POST['btn-save'])) {
    $addedBy = $_POST['addedBy'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $bapDate = $_POST['bapDate'];
    $bapTime = $_POST['bapTime'];
    $amount = $_POST['amount'];

    $receipt = $_FILES['receipt'];
    $targetDir = "../receipt/";
    $fileName = $_FILES['receipt']['name'];
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    $birthCert = $_FILES['birthCert'];
    $targetDir1 = "../upload/birthCert/";
    $fileName1 = $_FILES['birthCert']['name'];
    $targetFilePath1 = $targetDir1 . $fileName1;
    $fileType1 = pathinfo($targetFilePath1, PATHINFO_EXTENSION);

    $marriageCont = $_FILES['marriageCont'];
    $targetDir2 = "../upload/marriageCont/";
    $fileName2 = $_FILES['marriageCont']['name'];
    $targetFilePath2 = $targetDir2 . $fileName2;
    $fileType2 = pathinfo($targetFilePath2, PATHINFO_EXTENSION);

    $marriageCont = $_FILES['marriageCont'];
    $targetDir2 = "../upload/marriageCont/";
    $fileName2 = $_FILES['marriageCont']['name'];
    $targetFilePath2 = $targetDir2 . $fileName2;
    $fileType2 = pathinfo($targetFilePath2, PATHINFO_EXTENSION);

    $sponsor1 = $_FILES['sponsor1'];
    $targetDir3 = "../upload/sponsors/";
    $fileName3 = $_FILES['sponsor1']['name'];
    $targetFilePath3 = $targetDir3 . $fileName3;
    $fileType3 = pathinfo($targetFilePath3, PATHINFO_EXTENSION);

    $sponsor2 = $_FILES['sponsor2'];
    $targetDir4 = "../upload/sponsors/";
    $fileName4 = $_FILES['sponsor2']['name'];
    $targetFilePath4 = $targetDir4 . $fileName4;
    $fileType4 = pathinfo($targetFilePath4, PATHINFO_EXTENSION);


    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');

    if (in_array($fileType, $allowTypes) && in_array($fileType1, $allowTypes)) {
        if (move_uploaded_file($_FILES["receipt"]["tmp_name"], $targetFilePath) &&
            move_uploaded_file($_FILES["birthCert"]["tmp_name"], $targetFilePath1) &&
            move_uploaded_file($_FILES["marriageCont"]["tmp_name"], $targetFilePath2) &&
            move_uploaded_file($_FILES["sponsor1"]["tmp_name"], $targetFilePath3) &&
            move_uploaded_file($_FILES["sponsor2"]["tmp_name"], $targetFilePath4)
        ) {

            $sql_query = "INSERT INTO baptismal_tbl(addedBy, name, contact, email, address, bapDate, bapTime, birthCert, marriageCont, sponsor1, sponsor2, amount, receipt)
                          VALUES('$addedBy', '$name', '$contact', '$email', '$address', '$bapDate', '$bapTime', '$targetFilePath1', '$targetFilePath2', '$targetFilePath3', '$targetFilePath4', '$amount', '$targetFilePath')";

            if (mysqli_query($conn, $sql_query)) {
                echo "<script type='text/javascript'>
                    alert('Baptismal Reserved Successfully!');
                    window.location = '../patron.php';
                </script>";
            } else {
                echo "<script type='text/javascript'>
                    alert('Insertion Failed: " . mysqli_error($conn) . "');
                    window.location = '../patron.php';
                </script>";
            }
        } else {
            echo "<script type='text/javascript'>
                alert('File Upload Failed!');
                window.location = '../patron.php';
            </script>";
        }
    } else {
        echo "<script type='text/javascript'>
            alert('Invalid File Type! Only JPG, PNG, JPEG, GIF, or PDF allowed.');
            window.location = '../patron.php';
        </script>";
    }
}

mysqli_close($conn);
?>
