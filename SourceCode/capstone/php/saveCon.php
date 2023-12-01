<?php
include_once 'dbconn.php';

if (isset($_POST['btn-save'])) {
    $payMethod = $_POST['payMethod'];
    $conDate = $_POST['conDate'];
    $conTime = $_POST['conTime'];

    // Assuming you have a query to fetch the value from the table
    $selectQuery = "SELECT confirmation FROM eventsprice";
    $result = mysqli_query($conn, $selectQuery);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the value
        $row = mysqli_fetch_assoc($result);
        $confirmation = $row['confirmation'];
    } else {
        // Default value if no data is found
        $confirmation = 1000; // You can set any default value here
    }

    $amount = $confirmation;

    $conDateTimestamp = strtotime($conDate);
    $currentDateTimestamp = time();

    // Check if the blessDate has already passed
    if ($conDateTimestamp < $currentDateTimestamp) {
        echo "<script type='text/javascript'>
                alert('Invalid Reservation Date! The selected date has already passed.');
                window.location = '../admin.php';
              </script>";
        exit;
    }

    $checkQuery = "SELECT COUNT(*) as reservationCount FROM confirmation_tbl WHERE conDate = '$conDate' AND conTime = '$conTime'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if ($checkResult) {
        $row = mysqli_fetch_assoc($checkResult);
        $reservationCount = $row['reservationCount'];

        if ($reservationCount >= 10) {
            echo "<script type='text/javascript'>
                alert('Sorry, all reservations for this date and time are booked. Please choose a different date or time.');
                window.location = '../admin.php';
            </script>";
            exit;
        }
    } else {
        echo "<script type='text/javascript'>
            alert('Error checking reservations: " . mysqli_error($conn) . "');
            window.location = '../admin.php';
        </script>";
        exit;
    }
    if ($payMethod === 'face-to-face') {
        $addedBy = $_POST['addedBy'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $conDate = $_POST['conDate'];
        $conTime = $_POST['conTime'];
        $bapCert = $_POST['bapCert'];
        $desc = $_POST['desc'];
        $transactType = $_POST['transactType'];
        $status = $_POST['status'];

        $refNum = null;
        $amount = $amount;
        $targetFilePath = null;

    } elseif ($payMethod === 'gcash') {
        $addedBy = $_POST['addedBy'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $conDate = $_POST['conDate'];
        $conTime = $_POST['conTime'];
        $bapCert = $_POST['bapCert'];
        $desc = $_POST['desc'];
        $amount = $amount;
        $transactType = $_POST['transactType'];
        $status = $_POST['status'];
        $refNum = $_POST['refNum'];

        $receipt = $_FILES['receipt'];
        $targetDir = "../receipt/";
        $fileName = $_FILES['receipt']['name'];
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');

        if (!in_array($fileType, $allowTypes)) {
            echo "<script type='text/javascript'>
                alert('Invalid File Type! Only JPG, PNG, JPEG, GIF, or PDF allowed.');
                window.location = '../admin.php';
            </script>";
            exit;
        }
        if (!move_uploaded_file($_FILES["receipt"]["tmp_name"], $targetFilePath)) {
            echo "<script type='text/javascript'>
                alert('File Upload Failed!');
                window.location = '../admin.php';
            </script>";
            exit;
        }
    } else {
        echo "<script type='text/javascript'>
            alert('Invalid Payment Method!');
            window.location = '../admin.php';
        </script>";
        exit;
    }

    $sql_query = "INSERT INTO confirmation_tbl(addedBy, name, contact, address, conDate, conTime, bapCert, description, amount, receipt, transactType, status, refNum, payMethod) VALUES('$addedBy', '$name', '$contact', '$address', '$conDate', '$conTime', '$bapCert', '$desc', '$amount', '$targetFilePath', '$transactType', '$status', '$refNum', '$payMethod')";

    if (mysqli_query($conn, $sql_query)) {
        echo "<script type='text/javascript'>
            alert('Confirmation Reserved Successfully!');
            window.location = '../admin.php';
        </script>";
    } else {
        echo "<script type='text/javascript'>
            alert('Insertion Failed: " . mysqli_error($conn) . "');
            window.location = '../admin.php';
        </script>";
    }
    mysqli_close($conn);
}
?>
