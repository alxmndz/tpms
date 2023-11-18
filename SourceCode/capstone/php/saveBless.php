<?php
include_once 'dbconn.php';

if (isset($_POST['btn-save'])) {
    $payMethod = $_POST['payMethod'];
    $blessDate = $_POST['blessDate'];
    $blessTime = $_POST['blessTime'];

    // Validate bapTime
    $startTime = strtotime('07:00 AM');
    $endTime = strtotime('04:00 PM');

    $blessTimeTimestamp = strtotime($blessTime);

    if ($blessTimeTimestamp < $startTime || $blessTimeTimestamp > $endTime) {
        echo "<script type='text/javascript'>
                alert('Invalid Reservation Time! The reservation must be between 7:00 AM and 4:00 PM.');
                window.location = '../admin.php';
              </script>";
        exit;
    }

    $checkQuery = "SELECT * FROM blessing_tbl WHERE blessDate = '$blessDate' AND blessTime = '$blessTime'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "<script type='text/javascript'>
            alert('Your Reservation Time has already been taken!');
            window.location = '../admin.php';
        </script>";
        exit;
    }
    if ($payMethod === 'face-to-face') {
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $blessDate = $_POST['blessDate'];
        $blessTime = $_POST['blessTime'];
        $intention = $_POST['intention'];
        $addedBy = $_POST['addedBy'];
        $status = $_POST['status'];
        $transactType = $_POST['transactType'];
        
        $refNum = null;
        $amount = null;
        $targetFilePath = null;

    } elseif ($payMethod === 'gcash') {
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $blessDate = $_POST['blessDate'];
        $blessTime = $_POST['blessTime'];
        $intention = $_POST['intention'];
        $amount = $_POST['amount'];
        $addedBy = $_POST['addedBy'];
        $status = $_POST['status'];
        $transactType = $_POST['transactType'];
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

    $sql_query = "INSERT INTO blessing_tbl(name,contact,address,blessDate,blessTime,intention,amount,addedBy,receipt,transactType, status, refNum, payMethod) VALUES('$name','$contact','$address','$blessDate','$blessTime','$intention','$amount','$addedBy','$targetFilePath','$transactType','$status','$refNum','$payMethod')";

    if (mysqli_query($conn, $sql_query)) {
        echo "<script type='text/javascript'>
            alert('Blessing Reserved Successfully!');
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
