<?php
include_once 'dbconn.php';

if (isset($_POST['btn-save'])) {
    $payMethod = $_POST['payMethod'];
    if ($payMethod === 'face-to-face') {
        $refNum = null;
        $amount = null; // Set amount to null for face-to-face payments
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
        $amount = $_POST['amount'];
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
