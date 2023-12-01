<?php
include_once 'dbconn.php';

if (isset($_POST['btn-save'])) {
    $bapDate = $_POST['bapDate'];
    $bapTime = $_POST['bapTime'];

    $bapDateTimestamp = strtotime($bapDate);
    $currentDateTimestamp = time();

    // Check if the bapDate has already passed
    if ($bapDateTimestamp < $currentDateTimestamp) {
        echo "<script type='text/javascript'>
                alert('Invalid Reservation Date! The selected date has already passed.');
                window.location = '../patron.php';
              </script>";
        exit;
    }

    $checkQuery = "SELECT * FROM baptismal_tbl WHERE bapDate = '$bapDate' AND bapTime = '$bapTime'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if ($checkResult) {
        $reservationCount = mysqli_num_rows($checkResult);

        if ($reservationCount >= 10) {
            echo "<script type='text/javascript'>
                alert('Sorry, all reservations for this date and time are booked. Please choose a different date.');
                window.location = '../patron.php';
            </script>";
            exit;
        }
    } else {
        echo "<script type='text/javascript'>
            alert('Error checking reservations: " . mysqli_error($conn) . "');
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
    $marriageCont = $_FILES['marriageCont'];
    $sponsor1 = $_FILES['sponsor1'];
    $sponsor2 = $_FILES['sponsor2'];

    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');

    // Function to validate and move uploaded files
    function validateAndMoveFile($file, $targetDir) {
        global $allowTypes;

        $fileName = $file['name'];
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                return $targetFilePath;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    // Validate and move files
    $targetFilePath1 = validateAndMoveFile($birthCert, "../upload/birthCert/");
    $targetFilePath2 = validateAndMoveFile($marriageCont, "../upload/marriageCont/");
    $targetFilePath3 = validateAndMoveFile($sponsor1, "../upload/sponsors/");
    $targetFilePath4 = validateAndMoveFile($sponsor2, "../upload/sponsors/");

    // Check if file uploads failed
    if (!$targetFilePath1 || !$targetFilePath2 || !$targetFilePath3 || !$targetFilePath4) {
        echo "<script type='text/javascript'>
            alert('File Upload Failed!');
            window.location = '../patron.php';
        </script>";
        exit;
    }

    // Insert data into database
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
}

mysqli_close($conn);
?>
