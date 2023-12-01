<?php
include_once 'dbconn.php';

if (isset($_POST['btn-save'])) {
    $payMethod = $_POST['payMethod'];
    $wdate = $_POST['wdate'];
    $resTime = $_POST['resTime'];

    // Assuming you have a query to fetch the value from the table
    $selectQuery = "SELECT wedding FROM eventsprice";
    $result = mysqli_query($conn, $selectQuery);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the value
        $row = mysqli_fetch_assoc($result);
        $wedding = $row['wedding'];
    } else {
        // Default value if no data is found
        $wedding = 1000; // You can set any default value here
    }

    $amount = $wedding;

    $weddingDateTimestamp = strtotime($wdate);
    $currentDateTimestamp = time();

    // Check if the blessDate has already passed
    if ($weddingDateTimestamp < $currentDateTimestamp) {
        echo "<script type='text/javascript'>
                alert('Invalid Reservation Date! The selected date has already passed.');
                window.location = '../admin.php';
              </script>";
        exit;
    }

    $checkQuery = "SELECT COUNT(*) as reservationCount FROM wedding_tbl WHERE wdate = '$wdate' AND resTime = '$resTime'";
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
        $refNum = null;
        $amount = $amount; // Set amount to null for face-to-face payments
        $targetFilePath = null; // Set receipt to null for face-to-face payments
        
        $addedBy = $_POST['addedBy'];
        $groom = $_POST['groom'];
        $bride = $_POST['bride'];
        $gContact = $_POST['gContact'];
        $bContact = $_POST['bContact'];
        $gAddress = $_POST['gAddress'];
        $bAddress = $_POST['bAddress'];
        $package = $_POST['package'];
        $intention = $_POST['intention'];
        $wdate = $_POST['wdate'];
        $resTime = $_POST['resTime'];
        $payMethod = $_POST['payMethod'];
        $birthCert = $_POST['birthCert'];
        $bapCert = $_POST['bapCert'];
        $conCert = $_POST['conCert'];
        $cenomar = $_POST['cenomar'];
        $marriageLicense = $_POST['marriageLicense'];
        $RPic = $_POST['RPic'];
        $MBPic = $_POST['MBPic'];
        $transactType = $_POST['transactType'];
        $status = $_POST['status'];

    } elseif ($payMethod === 'gcash') {
        $addedBy = $_POST['addedBy'];
        $groom = $_POST['groom'];
        $bride = $_POST['bride'];
        $gContact = $_POST['gContact'];
        $bContact = $_POST['bContact'];
        $gAddress = $_POST['gAddress'];
        $bAddress = $_POST['bAddress'];
        $package = $_POST['package'];
        $intention = $_POST['intention'];
        $wdate = $_POST['wdate'];
        $resTime = $_POST['resTime'];
        $payMethod = $_POST['payMethod'];
        $birthCert = $_POST['birthCert'];
        $bapCert = $_POST['bapCert'];
        $conCert = $_POST['conCert'];
        $cenomar = $_POST['cenomar'];
        $marriageLicense = $_POST['marriageLicense'];
        $RPic = $_POST['RPic'];
        $MBPic = $_POST['MBPic'];
        $transactType = $_POST['transactType'];
        $status = $_POST['status'];
        $amount = $amount;
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

    $sql_query = "INSERT INTO wedding_tbl(addedBy, groom, bride, gContact, bContact, gAddress, bAddress, package, intention, wdate, resTime, birthCert, bapCert, conCert, cenomar, marriageLicense, RPic, MBPic, payMethod, amount, receipt, transactType, status, refNum)
                  VALUES('$addedBy', '$groom', '$bride', '$gContact', '$bContact', '$gAddress', '$bAddress', '$package', '$intention', '$wdate', '$resTime', '$birthCert', '$bapCert', '$conCert', '$cenomar', '$marriageLicense', '$RPic', '$MBPic', '$payMethod', '$amount', '$targetFilePath', '$transactType', '$status', '$refNum')";

    if (mysqli_query($conn, $sql_query)) {
        echo "<script type='text/javascript'>
            alert('Wedding Reserved Successfully!');
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
