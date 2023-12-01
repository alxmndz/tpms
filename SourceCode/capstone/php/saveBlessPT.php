<?php
include_once 'dbconn.php';

if (isset($_POST['btn-save'])) {
    $blessDate = $_POST['blessDate'];
    $blessTime = $_POST['blessTime'];

    $blessDateTimestamp = strtotime($blessDate);
    $currentDateTimestamp = time();

    // Check if the blessDate has already passed
    if ($blessDateTimestamp < $currentDateTimestamp) {
        echo "<script type='text/javascript'>
                alert('Invalid Reservation Date! The selected date has already passed.');
                window.location = '../patron.php';
              </script>";
        exit;
    }

    $checkQuery = "SELECT COUNT(*) as reservationCount FROM blessing_tbl WHERE blessDate = '$blessDate' AND blessTime = '$blessTime'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if ($checkResult) {
        $row = mysqli_fetch_assoc($checkResult);
        $reservationCount = $row['reservationCount'];

        if ($reservationCount >= 10) {
            echo "<script type='text/javascript'>
                alert('Sorry, all reservations for this date and time are booked. Please choose a different date or time.');
                window.location = '../patron.php';
            </script>";
            exit;
        }
    } else {
        echo "<script type='text/javascript'>
            alert('Error checking reservations: " . mysqli_error($conn) . "');
            window.location = '../patron.php';
        </script>";
        exit;
    }

    $addedBy = $_POST['addedBy'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $intention = $_POST['intention'];
    $transactType = $_POST['transactType'];

    $sql_query = "INSERT INTO blessing_tbl(name, contact, address, blessDate, blessTime, intention, addedBy, transactType)
                  VALUES('$name', '$contact', '$address', '$blessDate', '$blessTime', '$intention', '$addedBy', '$transactType')";
    
    if (mysqli_query($conn, $sql_query)) {
        echo "<script type='text/javascript'>
            alert('Reserved Successfully!');
            window.location = '../patron.php';
        </script>";
    } else {
        echo "<script type='text/javascript'>
            alert('Reservation Failed: " . mysqli_error($conn) . "');
            window.location = '../patron.php';
        </script>";
    }
}

mysqli_close($conn);
?>
