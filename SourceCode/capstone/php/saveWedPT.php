<?php
include_once 'dbconn.php';

if (isset($_POST['btn-save'])) {
    $wdate = $_POST['wdate'];
    $resTime = $_POST['resTime'];

    // Validate reservation time
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

    $checkQuery = "SELECT * FROM wedding_tbl WHERE wdate = '$wdate' AND resTime = '$resTime'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "<script type='text/javascript'>
            alert('Your Reservation Time has already been taken!');
            window.location = '../patron.php';
        </script>";
        exit;
    }

    // Continue with your other form data and file uploads...

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
    $transactType = $_POST['transactType'];

    // Example for handling file uploads
    $gBirthCert = $_FILES['gBirthCert'];
    $targetDir1 = "../upload/birthCert/";
    $fileName1 = $gBirthCert['name'];
    $targetFilePath1 = $targetDir1 . $fileName1;
    $fileType1 = pathinfo($targetFilePath1, PATHINFO_EXTENSION);

    $gBirthCert = $_FILES['gBirthCert'];
    $targetDir1 = "../upload/birthCert/";
    $fileName1 = $_FILES['gBirthCert']['name'];
    $targetFilePath1 = $targetDir1 . $fileName1;
    $fileType1 = pathinfo($targetFilePath1, PATHINFO_EXTENSION);

    $bBirthCert = $_FILES['bBirthCert'];
    $targetDir2 = "../upload/birthCert/";
    $fileName2 = $_FILES['bBirthCert']['name'];
    $targetFilePath2 = $targetDir2 . $fileName2;
    $fileType2 = pathinfo($targetFilePath2, PATHINFO_EXTENSION);

    $gBapCert = $_FILES['gBapCert'];
    $targetDir3 = "../upload/bapCert/";
    $fileName3 = $_FILES['gBapCert']['name'];
    $targetFilePath3 = $targetDir3 . $fileName3;
    $fileType3 = pathinfo($targetFilePath3, PATHINFO_EXTENSION);

    $bBapCert = $_FILES['bBapCert'];
    $targetDir4 = "../upload/bapCert/";
    $fileName4 = $_FILES['bBapCert']['name'];
    $targetFilePath4 = $targetDir4 . $fileName4;
    $fileType4 = pathinfo($targetFilePath4, PATHINFO_EXTENSION);

    $gConCert = $_FILES['gConCert'];
    $targetDir5 = "../upload/conCert/";
    $fileName5 = $_FILES['gConCert']['name'];
    $targetFilePath5 = $targetDir5 . $fileName5;
    $fileType5 = pathinfo($targetFilePath5, PATHINFO_EXTENSION);

    $bConCert = $_FILES['bConCert'];
    $targetDir6= "../upload/conCert/";
    $fileName6 = $_FILES['bConCert']['name'];
    $targetFilePath6 = $targetDir6 . $fileName6;
    $fileType6 = pathinfo($targetFilePath6, PATHINFO_EXTENSION);

    $cenomar = $_FILES['cenomar'];
    $targetDir7 = "../upload/cenomar/";
    $fileName7 = $_FILES['cenomar']['name'];
    $targetFilePath7 = $targetDir7 . $fileName7;
    $fileType7 = pathinfo($targetFilePath7, PATHINFO_EXTENSION);

    $marriageLicense = $_FILES['marriageLicense'];
    $targetDir8 = "../upload/marriageLicense/";
    $fileName8 = $_FILES['marriageLicense']['name'];
    $targetFilePath8 = $targetDir8 . $fileName8;
    $fileType8 = pathinfo($targetFilePath8, PATHINFO_EXTENSION);

    $RPic1 = $_FILES['RPic1'];
    $targetDir9 = "../upload/pics/";
    $fileName9 = $_FILES['RPic1']['name'];
    $targetFilePath9 = $targetDir9 . $fileName9;
    $fileType9 = pathinfo($targetFilePath9, PATHINFO_EXTENSION);

    $RPic2 = $_FILES['RPic2'];
    $targetDir10 = "../upload/pics/";
    $fileName10 = $_FILES['RPic2']['name'];
    $targetFilePath10 = $targetDir10. $fileName10;
    $fileType10 = pathinfo($targetFilePath10, PATHINFO_EXTENSION);

    $MBPic1 = $_FILES['MBPic1'];
    $targetDir11 = "../upload/pics/";
    $fileName11 = $_FILES['MBPic1']['name'];
    $targetFilePath11 = $targetDir11 . $fileName11;
    $fileType11 = pathinfo($targetFilePath11, PATHINFO_EXTENSION);

    $MBPic2 = $_FILES['MBPic2'];
    $targetDir12 = "../upload/pics/";
    $fileName12= $_FILES['MBPic2']['name'];
    $targetFilePath12 = $targetDir12. $fileName12;
    $fileType12 = pathinfo($targetFilePath12, PATHINFO_EXTENSION);

    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');

    if (in_array($fileType1, $allowTypes)) {
        if (move_uploaded_file($gBirthCert['tmp_name'], $targetFilePath1) &&
            move_uploaded_file($_FILES["bBirthCert"]["tmp_name"], $targetFilePath2) &&
            move_uploaded_file($_FILES["gBapCert"]["tmp_name"], $targetFilePath3) &&
            move_uploaded_file($_FILES["bBapCert"]["tmp_name"], $targetFilePath4) &&
            move_uploaded_file($_FILES["gConCert"]["tmp_name"], $targetFilePath5) &&
            move_uploaded_file($_FILES["bConCert"]["tmp_name"], $targetFilePath6) &&
            move_uploaded_file($_FILES["cenomar"]["tmp_name"], $targetFilePath7) &&
            move_uploaded_file($_FILES["marriageLicense"]["tmp_name"], $targetFilePath8) &&
            move_uploaded_file($_FILES["RPic1"]["tmp_name"], $targetFilePath9) &&
            move_uploaded_file($_FILES["RPic2"]["tmp_name"], $targetFilePath10) &&
            move_uploaded_file($_FILES["MBPic1"]["tmp_name"], $targetFilePath11) &&
            move_uploaded_file($_FILES["MBPic2"]["tmp_name"], $targetFilePath12)
    ) {
            // Continue with your SQL query for database insertion...
            $sql_query = "INSERT INTO wedding_tbl(addedBy, groom, bride, gContact, bContact, gAddress, bAddress, package, intention, wdate, resTime, gBirthCert, bBirthCert, gBapCert, bBapCert, gConCert, bConCert, cenomar, marriageLicense, RPic1, RPic2, MBPic1, MBPic2, transactType)
                          VALUES('$addedBy', '$groom', '$bride', '$gContact', '$bContact', '$gAddress', '$bAddress', '$package', '$intention', '$wdate', '$resTime', '$targetFilePath1', '$targetFilePath2','$targetFilePath3','$targetFilePath4', '$targetFilePath5','$targetFilePath6','$targetFilePath7','$targetFilePath8','$targetFilePath9','$targetFilePath10','$targetFilePath11','$targetFilePath12', '$transactType')";
            
            if (mysqli_query($conn, $sql_query)) {
                echo "<script type='text/javascript'>
                        alert('Wedding Reserved Successfully!');
                        window.location = '../patron.php';
                      </script>";
            } else {
                echo "<script type='text/javascript'>
                        alert('Insertion Failed: " . mysqli_error($conn) . "');
                        window.location = '../patron.php';
                      </script>";
            }
        } else {
            echo "<script type='text/javascript'>
                    alert('File Upload Failed!');
                    window.location = '../patron.php';
                  </script>";
        }
    } else {
        echo "<script type='text/javascript'>
                alert('Invalid File Type! Only JPG, PNG, JPEG, GIF, or PDF allowed.');
                window.location = '../patron.php';
              </script>";
    }
}

mysqli_close($conn);
?>
