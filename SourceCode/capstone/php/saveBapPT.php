<?php
include_once 'dbconn.php';

if (isset($_POST['btn-save'])) {
    $bapDate = $_POST['bapDate'];
    $bapTime = $_POST['bapTime'];

    // Validate bapTime
    $startTime = strtotime('07:00 AM');
    $endTime = strtotime('04:00 PM');

    $bapTimeTimestamp = strtotime($bapTime);

    if ($bapTimeTimestamp < $startTime || $bapTimeTimestamp > $endTime) {
        echo "<script type='text/javascript'>
                alert('Invalid Reservation Time! The reservation must be between 7:00 AM and 4:00 PM.');
                window.location = '../patron.php';
              </script>";
        exit;
    }

    $checkQuery = "SELECT * FROM baptismal_tbl WHERE bapDate = '$bapDate' AND bapTime = '$bapTime'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "<script type='text/javascript'>
            alert('Your Reservation Time has already been taken!');
            window.location = '../patron.php';
        </script>";
        exit;
    }
    
    $addedBy = $_POST['addedBy'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $transactType = $_POST['transactType'];

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

    if (in_array($fileType1, $allowTypes) && in_array($fileType2, $allowTypes) && in_array($fileType3, $allowTypes) && in_array($fileType4, $allowTypes)) {
        if (move_uploaded_file($birthCert["tmp_name"], $targetFilePath1) &&
            move_uploaded_file($marriageCont["tmp_name"], $targetFilePath2) &&
            move_uploaded_file($sponsor1["tmp_name"], $targetFilePath3) &&
            move_uploaded_file($sponsor2["tmp_name"], $targetFilePath4)
        ) {

            $sql_query = "INSERT INTO baptismal_tbl(addedBy, name, contact, address, bapDate, bapTime, birthCert, marriageCont, sponsor1, sponsor2)
                          VALUES('$addedBy', '$name', '$contact', '$address', '$bapDate', '$bapTime', '$targetFilePath1', '$targetFilePath2', '$targetFilePath3', '$targetFilePath4')";

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
