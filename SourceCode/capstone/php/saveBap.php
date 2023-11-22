<?php
include_once 'dbconn.php';

if (isset($_POST['btn-save'])) {
    $payMethod = $_POST['payMethod'];
    $bapDate = $_POST['bapDate'];
    $bapTime = $_POST['bapTime'];

    // Assuming you have a query to fetch the value from the table
    $selectQuery = "SELECT baptismal FROM eventsprice";
    $result = mysqli_query($conn, $selectQuery);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the value
        $row = mysqli_fetch_assoc($result);
        $baptismal = $row['baptismal'];
    } else {
        // Default value if no data is found
        $baptismal = 1000; // You can set any default value here
    }

    $amount = $baptismal;

    // Validate bapTime
    $startTime = strtotime('07:00 AM');
    $endTime = strtotime('04:00 PM');

    $bapTimeTimestamp = strtotime($bapTime);

    if ($bapTimeTimestamp < $startTime || $bapTimeTimestamp > $endTime) {
        echo "<script type='text/javascript'>
                alert('Invalid Reservation Time! The reservation must be between 7:00 AM and 4:00 PM.');
                window.location = '../admin.php';
              </script>";
        exit;
    }

    $checkQuery = "SELECT * FROM baptismal_tbl WHERE bapDate = '$bapDate' AND bapTime = '$bapTime'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "<script type='text/javascript'>
            alert('Your Reservation Time has already been taken!');
            window.location = '../admin.php';
        </script>";
        exit;
    }


    if ($payMethod === 'face-to-face') {

        $refNum = null;
        $amount = $amount;// Set amount to null for face-to-face payments
        $targetFilePath = null; // Set receipt to null for face-to-face payments
        
        $addedBy = $_POST['addedBy'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $bapDate = $_POST['bapDate'];
        $bapTime = $_POST['bapTime'];
        $payMethod = $_POST['payMethod'];
        $birthCert = $_POST['birthCert'];
        $marriageCont = $_POST['marriageCont'];
        $sponsor1 = $_POST['sponsor1'];
        $sponsor2 = $_POST['sponsor2'];
        $transactType = $_POST['transactType'];
        $status = $_POST['status'];

    } elseif ($payMethod === 'gcash') {
        $addedBy = $_POST['addedBy'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $bapDate = $_POST['bapDate'];
        $bapTime = $_POST['bapTime'];
        $amount = $amount;
        $birthCert = $_POST['birthCert'];
        $marriageCont = $_POST['marriageCont'];
        $sponsor1 = $_POST['sponsor1'];
        $sponsor2 = $_POST['sponsor2'];
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

    $sql_query = "INSERT INTO baptismal_tbl(addedBy, name, contact, address, bapDate, bapTime, payMethod, amount, receipt, birthCert, marriageCont, sponsor1 ,sponsor2, transactType, status, refNum)
                  VALUES('$addedBy', '$name', '$contact', '$address', '$bapDate', '$bapTime', '$payMethod', '$amount', '$targetFilePath', '$birthCert', '$marriageCont', '$sponsor1', '$sponsor2', '$transactType', '$status', '$refNum')";

    if (mysqli_query($conn, $sql_query)) {
        echo "<script type='text/javascript'>
            alert('Baptismal Reserved Successfully!');
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
