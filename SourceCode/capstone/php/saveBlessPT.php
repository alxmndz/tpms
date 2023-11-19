<?php
include_once 'dbconn.php';

if (isset($_POST['btn-save'])) {
    $blessDate = $_POST['blessDate'];
    $blessTime = $_POST['blessTime'];

    // Validate blessTime
    $startTime = strtotime('07:00 AM');
    $endTime = strtotime('04:00 PM');

    $blessTimeTimestamp = strtotime($blessTime);

    if ($blessTimeTimestamp < $startTime || $blessTimeTimestamp > $endTime) {
        echo "<script type='text/javascript'>
                alert('Invalid Reservation Time! The reservation must be between 7:00 AM and 4:00 PM.');
                window.location = '../patron.php';
              </script>";
        exit;
    }

    $checkQuery = "SELECT * FROM blessing_tbl WHERE blessDate = '$blessDate' AND blessTime = '$blessTime'";
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
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $intention = $_POST['intention'];
    $transactType = $_POST['transactType'];

    $sql_query = "INSERT INTO blessing_tbl(name, contact, address, blessDate, blessTime, intention, addedBy, transactType)
                  VALUES('$name', '$contact', '$address', '$blessDate', '$blessTime', '$intention', '$addedBy', '$transactType')";
    mysqli_query($conn, $sql_query);

    echo "<script type='text/javascript'>
          alert('Reserved Successfully!');
          window.location = '../patron.php';
        </script>";
}

mysqli_close($conn);
?>
