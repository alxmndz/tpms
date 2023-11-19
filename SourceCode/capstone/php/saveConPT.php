<?php
include_once 'dbconn.php';

if (isset($_POST['btn-save'])) {
    $conDate = $_POST['conDate'];
    $conTime = $_POST['conTime'];

    // Validate conTime
    $startTime = strtotime('07:00 AM');
    $endTime = strtotime('04:00 PM');

    $conTimeTimestamp = strtotime($conTime);

    if ($conTimeTimestamp < $startTime || $conTimeTimestamp > $endTime) {
        echo "<script type='text/javascript'>
                alert('Invalid Reservation Time! The reservation must be between 7:00 AM and 4:00 PM.');
                window.location = '../patron.php';
              </script>";
        exit;
    }

    $checkQuery = "SELECT * FROM confirmation_tbl WHERE conDate = '$conDate' AND conTime = '$conTime'";
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
    $conDate = $_POST['conDate'];
    $conTime = $_POST['conTime'];
    $desc = $_POST['desc'];
    $transactType = $_POST['transactType'];

    $bapCert = $_FILES['bapCert'];
    $targetDir1 = "../bapCert/";
    $fileName1 = $_FILES['bapCert']['name'];
    $targetFilePath1 = $targetDir1 . $fileName1;
    $fileType1 = pathinfo($targetFilePath1, PATHINFO_EXTENSION);

    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');

    if (in_array($fileType1, $allowTypes)) {
        // Create target directory if it doesn't exist
        if (!is_dir($targetDir1)) {
            mkdir($targetDir1, 0755, true);
        }

        if (move_uploaded_file($bapCert["tmp_name"], $targetFilePath1)) {

            $sql_query = "INSERT INTO confirmation_tbl(addedBy, name, contact, address, conDate, conTime, bapCert, description, transactType)
                          VALUES('$addedBy', '$name', '$contact', '$address', '$conDate', '$conTime', '$targetFilePath1', '$desc', '$transactType')";

            if (mysqli_query($conn, $sql_query)) {
                echo "<script type='text/javascript'>
                    alert('Confirmation Reserved Successfully!');
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
