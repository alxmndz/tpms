<?php
include_once 'dbconn.php';

if (isset($_POST['btn-save'])) {
    $payMethod = $_POST['payMethod'];
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

        $refNum = null;
        $amount = null;
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
        $amount = $_POST['amount'];
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

    $sql_query = "INSERT INTO communion_tbl(addedBy, name, contact, address, comDate, comTime, bapCert, description, amount, receipt, transactType,  refNum, payMethod)VALUES('$addedBy', '$name', '$contact', '$address', '$comDate', '$comTime', '$bapCert', '$desc', '$amount', '$targetFilePath', '$transactType', '$refNum', '$payMethod')";

    if (mysqli_query($conn, $sql_query)) {
        echo "<script type='text/javascript'>
            alert('Communion Reserved Successfully!');
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
