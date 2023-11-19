<?php
include_once 'dbconn.php';

if (isset($_POST['btn-save'])) {
    $buryDate = $_POST['buryDate'];
    $resTime = $_POST['resTime'];

    // Validate resTime
    $startTime = strtotime('07:00 AM');
    $endTime = strtotime('04:00 PM');

    $resTimeTimestamp = strtotime($resTime);

    if ($resTimeTimestamp < $startTime || $resTimeTimestamp > $endTime) {
        echo "<script type='text/javascript'>
                alert('Invalid Reservation Time! The reservation must be between 7:00 AM and 4:00 PM.');
                window.location = '../patron.php';
              </script>";
        exit;
    }

    $checkQuery = "SELECT * FROM funeralmass_tbl WHERE buryDate = '$buryDate' AND resTime = '$resTime'";
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
    $fName = $_POST['fName'];
    $mName = $_POST['mName'];
    $widow = $_POST['widow'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $deathDate = $_POST['deathDate'];
    $age = $_POST['age'];
    $buryDate = $_POST['buryDate'];
    $cause = $_POST['cause'];
    $sacrament = $_POST['sacrament'];
    $lastsacrament = $_POST['lastsacrament'];
    $transactType = $_POST['transactType'];
    $reqBy = $_POST['reqBy'];
    $resTime = $_POST['resTime'];

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
