<?php
include_once 'dbconn.php';

if (isset($_POST['btn-save'])) {
    $payMethod = $_POST['payMethod'];
    $comDate = $_POST['comDate'];
    $comTime = $_POST['comTime'];

    // Assuming you have a query to fetch the value from the table
    $selectQuery = "SELECT communion FROM eventsprice";
    $result = mysqli_query($conn, $selectQuery);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the value
        $row = mysqli_fetch_assoc($result);
        $communion = $row['communion'];
    } else {
        // Default value if no data is found
        $communion = 1000; // You can set any default value here
    }

    $amount = $communion;

    // Validate bapTime
    $startTime = strtotime('07:00 AM');
    $endTime = strtotime('04:00 PM');

    $comTimeTimestamp = strtotime($comTime);

    if ($comTimeTimestamp < $startTime || $comTimeTimestamp > $endTime) {
        echo "<script type='text/javascript'>
                alert('Invalid Reservation Time! The reservation must be between 7:00 AM and 4:00 PM.');
                window.location = '../admin.php';
              </script>";
        exit;
    }

    $checkQuery = "SELECT * FROM communion_tbl WHERE comDate = '$comDate' AND comTime = '$comTime'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "<script type='text/javascript'>
            alert('Your Reservation Time has already been taken!');
            window.location = '../admin.php';
        </script>";
        exit;
    }
    if ($payMethod === 'face-to-face') {
        $addedBy = $_POST['addedBy'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $comDate = $_POST['comDate'];
        $comTime = $_POST['comTime'];
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
        $comDate = $_POST['comDate'];
        $comTime = $_POST['comTime'];
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

    $sql_query = "INSERT INTO communion_tbl(addedBy, name, contact, address, comDate, comTime, bapCert, description, amount, receipt, transactType, status, refNum, payMethod)VALUES('$addedBy', '$name', '$contact', '$address', '$comDate', '$comTime', '$bapCert', '$desc', '$amount', '$targetFilePath', '$transactType', '$status', '$refNum', '$payMethod')";

    if (mysqli_query($conn, $sql_query)) {
        echo "<script type='text/javascript'>
            alert('Communion Reserved Successfully!');
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
