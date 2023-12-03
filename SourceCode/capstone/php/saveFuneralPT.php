<?php
include_once 'dbconn.php';

if (isset($_POST['btn-save'])) {
    $buryDate = $_POST['buryDate'];
    $resTime = $_POST['resTime'];
    
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

    $buryDateTimestamp = strtotime($buryDate);
    $currentDateTimestamp = time();

    // Check if the conDate has already passed
    if ($buryDateTimestamp < $currentDateTimestamp) {
        echo "<script type='text/javascript'>
                alert('Invalid Reservation Date! The selected date has already passed.');
                window.location = '../patron.php';
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

    // Rest of your code for getting user input

    $sql_query = "INSERT INTO funeralmass_tbl(name, fName, mName, widow, address, deathDate, age, buryDate, cause, sacrament, lastsacrament, addedBy, transactType, contact, reqBy, resTime)
                  VALUES('$name', '$fName', '$mName', '$widow', '$address', '$deathDate', '$age', '$buryDate', '$cause', '$sacrament', '$lastsacrament', '$addedBy', '$transactType', '$contact', '$reqBy', '$resTime')";
    
    mysqli_query($conn, $sql_query);

    echo "<script type='text/javascript'>
          alert('Funeral Reserved Successfully!');
          window.location = '../patron.php';
        </script>";
}

mysqli_close($conn);
?>
