<?php
include_once 'dbconn.php';

if (isset($_POST['btn-save'])) {
    $comDate = $_POST['comDate'];
    $comTime = $_POST['comTime'];

    // Validate comTime
    $startTime = strtotime('07:00 AM');
    $endTime = strtotime('04:00 PM');

    $comTimeTimestamp = strtotime($comTime);

    if ($comTimeTimestamp < $startTime || $comTimeTimestamp > $endTime) {
        echo "<script type='text/javascript'>
                alert('Invalid Reservation Time! The reservation must be between 7:00 AM and 4:00 PM.');
                window.location = '../patron.php';
              </script>";
        exit;
    }

    $checkQuery = "SELECT * FROM communion_tbl WHERE comDate = '$comDate' AND comTime = '$comTime'";
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
    $comDate = $_POST['comDate'];
    $comTime = $_POST['comTime'];
    $desc = $_POST['desc'];

    $bapCert = $_FILES['bapCert'];
    $targetDir1 = "../upload/bapCert/";  // Updated target directory
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

            $sql_query = "INSERT INTO communion_tbl(addedBy, name, contact, address, comDate, comTime, bapCert, description)
                          VALUES('$addedBy', '$name', '$contact', '$address', '$comDate', '$comTime', '$targetFilePath1', '$desc')";

            if (mysqli_query($conn, $sql_query)) {
                echo "<script type='text/javascript'>
                    alert('Communion Reserved Successfully!');
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
