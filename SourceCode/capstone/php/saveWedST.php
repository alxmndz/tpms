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

    // Validate bapTime
    $startTime = strtotime('07:00 AM');
    $endTime = strtotime('04:00 PM');

    $funTimeTimestamp = strtotime($resTime);

    if ($funTimeTimestamp < $startTime || $funTimeTimestamp > $endTime) {
        echo "<script type='text/javascript'>
                alert('Invalid Reservation Time! The reservation must be between 7:00 AM and 4:00 PM.');
                window.location = '../staff.php';
              </script>";
        exit;
    }

    $checkQuery = "SELECT * FROM wedding_tbl WHERE wdate = '$wdate' AND resTime = '$resTime'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "<script type='text/javascript'>
            alert('Your Reservation Time has already been taken!');
            window.location = '../staff.php';
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
                window.location = '../staff.php';
            </script>";
            exit;
        }
        if (!move_uploaded_file($_FILES["receipt"]["tmp_name"], $targetFilePath)) {
            echo "<script type='text/javascript'>
                alert('File Upload Failed!');
                window.location = '../staff.php';
            </script>";
            exit;
        }
    } else {
        echo "<script type='text/javascript'>
            alert('Invalid Payment Method!');
            window.location = '../staff.php';
        </script>";
        exit;
    }

    $sql_query = "INSERT INTO wedding_tbl(addedBy, groom, bride, gContact, bContact, gAddress, bAddress, package, intention, wdate, resTime, birthCert, bapCert, conCert, cenomar, marriageLicense, RPic, MBPic, payMethod, amount, receipt, transactType, refNum)
                  VALUES('$addedBy', '$groom', '$bride', '$gContact', '$bContact', '$gAddress', '$bAddress', '$package', '$intention', '$wdate', '$resTime', '$birthCert', '$bapCert', '$conCert', '$cenomar', '$marriageLicense', '$RPic', '$MBPic', '$payMethod', '$amount', '$targetFilePath', '$transactType', '$refNum')";

    if (mysqli_query($conn, $sql_query)) {
        echo "<script type='text/javascript'>
            alert('Wedding Reserved Successfully!');
            window.location = '../staff.php';
        </script>";
    } else {
        echo "<script type='text/javascript'>
            alert('Insertion Failed: " . mysqli_error($conn) . "');
            window.location = '../staff.php';
        </script>";
    }
    mysqli_close($conn);
}
?>
