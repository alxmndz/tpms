<?php
include_once 'dbconn.php';

if (isset($_POST['btn-save'])) {
    $payMethod = $_POST['payMethod'];
    $buryDate = $_POST['buryDate'];
    $resTime = $_POST['resTime'];

    // Assuming you have a query to fetch the value from the table
    $selectQuery = "SELECT funeralmass FROM eventsprice";
    $result = mysqli_query($conn, $selectQuery);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the value
        $row = mysqli_fetch_assoc($result);
        $funeralmass = $row['funeralmass'];
    } else {
        // Default value if no data is found
        $funeralmass = 1000; // You can set any default value here
    }

    $amount = $funeralmass;

    $funeralDateTimestamp = strtotime($buryDate);
    $currentDateTimestamp = time();

    // Check if the blessDate has already passed
    if ($funeralDateTimestamp < $currentDateTimestamp) {
        echo "<script type='text/javascript'>
                alert('Invalid Reservation Date! The selected date has already passed.');
                window.location = '../admin.php';
              </script>";
        exit;
    }

    $checkQuery = "SELECT COUNT(*) as reservationCount FROM funeralmass_tbl WHERE buryDate = '$buryDate' AND resTime = '$resTime'";
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
        $payDate = $_POST['payDate'];
        $name = $_POST['name'];
        $fName = $_POST['fName'];
        $mName = $_POST['mName'];
        $widow = $_POST['widow'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $deathDate = $_POST['deathDate'];
        $age = $_POST['age'];
        $buryDate = $_POST['buryDate'];
        $cause = $_POST['cause'];
        $sacrament = $_POST['sacrament'];
        $lastsacrament = $_POST['lastsacrament'];
        $transactType = $_POST['transactType'];
        $reqBy = $_POST['reqBy'];
        $resTime = $_POST['resTime'];
        $status = $_POST['status'];

        $refNum = null;
        $amount = $amount;
        $targetFilePath = null;
        
    } elseif ($payMethod === 'gcash') {
        $addedBy = $_POST['addedBy'];
        $payDate = $_POST['payDate'];
        $name = $_POST['name'];
        $fName = $_POST['fName'];
        $mName = $_POST['mName'];
        $widow = $_POST['widow'];
        $address = $_POST['address'];
        $deathDate = $_POST['deathDate'];
        $age = $_POST['age'];
        $buryDate = $_POST['buryDate'];
        $cause = $_POST['cause'];
        $sacrament = $_POST['sacrament'];
        $lastsacrament = $_POST['lastsacrament'];
        $amount = $amount;
        $transactType = $_POST['transactType'];
        $reqBy = $_POST['reqBy'];
        $resTime = $_POST['resTime'];
        $status = $_POST['status'];
        $refNum = $_POST['refNum'];
        $contact = $_POST['contact'];

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

    $sql_query = "INSERT INTO funeralmass_tbl(name,fName,mName,widow,address,deathDate,age,buryDate,cause,sacrament,lastsacrament,amount,addedBy,receipt,payMethod,transactType,status,refNum,contact,reqBy,resTime,payDate) VALUES('$name','$fName','$mName','$widow','$address','$deathDate','$age','$buryDate','$cause','$sacrament','$lastsacrament','$amount','$addedBy','$targetFilePath','$payMethod','$transactType','$status','$refNum','$contact','$reqBy','$resTime','$payDate')";

    if (mysqli_query($conn, $sql_query)) {
        echo "<script type='text/javascript'>
            alert('Funeral Mass Reserved Successfully!');
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
