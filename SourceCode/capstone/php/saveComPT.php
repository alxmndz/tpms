<?php
include_once 'dbconn.php';

if (isset($_POST['btn-save'])) {
    $comDate = $_POST['comDate'];
    $comTime = $_POST['comTime'];

    $comDateTimestamp = strtotime($comDate);
    $currentDateTimestamp = time();

    // Check if the comDate has already passed
    if ($comDateTimestamp < $currentDateTimestamp) {
        echo "<script type='text/javascript'>
                alert('Invalid Reservation Date! The selected date has already passed.');
                window.location = '../patron.php';
              </script>";
        exit;
    }

    // Check if the uploaded file is valid and move it to the target directory
    $bapCert = $_FILES['bapCert'];
    $targetDir1 = "../upload/bapCert/";

    $uploadResult = handleFileUpload($bapCert, $targetDir1);

    if ($uploadResult['success']) {
        $targetFilePath1 = $uploadResult['targetFilePath'];

        $checkQuery = "SELECT COUNT(*) as reservationCount FROM communion_tbl WHERE comDate = '$comDate' AND comTime = '$comTime'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if ($checkResult) {
            $row = mysqli_fetch_assoc($checkResult);
            $reservationCount = $row['reservationCount'];

            if ($reservationCount >= 10) {
                unlink($targetFilePath1); // Delete the uploaded file since the reservation limit is reached
                handleError("Sorry, all reservations for this date and time are booked. Please choose a different date or time.");
            }
        } else {
            unlink($targetFilePath1); // Delete the uploaded file on query error
            handleError("Error checking reservations: " . mysqli_error($conn));
        }

        $addedBy = $_POST['addedBy'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $desc = $_POST['desc'];

        $sql_query = "INSERT INTO communion_tbl(addedBy, name, contact, address, comDate, comTime, bapCert, description)
                      VALUES('$addedBy', '$name', '$contact', '$address', '$comDate', '$comTime', '$targetFilePath1', '$desc')";

        if (mysqli_query($conn, $sql_query)) {
            echo "<script type='text/javascript'>
                alert('Communion Reserved Successfully!');
                window.location = '../patron.php';
            </script>";
        } else {
            unlink($targetFilePath1); // Delete the uploaded file on insertion error
            handleError("Insertion Failed: " . mysqli_error($conn));
        }
    } else {
        handleError($uploadResult['message']);
    }
}

mysqli_close($conn);

function handleFileUpload($file, $targetDir) {
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');

    $fileName = $file['name'];
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (in_array($fileType, $allowTypes)) {
        // Create target directory if it doesn't exist
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            return array('success' => true, 'targetFilePath' => $targetFilePath);
        } else {
            return array('success' => false, 'message' => "File Upload Failed!");
        }
    } else {
        return array('success' => false, 'message' => "Invalid File Type! Only JPG, PNG, JPEG, GIF, or PDF allowed.");
    }
}

function handleError($errorMessage) {
    echo "<script type='text/javascript'>
            alert('$errorMessage');
            window.location = '../patron.php';
          </script>";
    exit;
}
?>
