<?php
include_once 'dbconn.php';

if (isset($_POST['btn-save'])) {
    $addedBy = $_POST['addedBy'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $comDate = $_POST['comDate'];
    $comTime = $_POST['comTime'];
    $desc = $_POST['desc'];
    $transactType = $_POST['transactType'];
    $refNum = $_POST['refNum'];
    $amount = $_POST['amount'];
    $payMethod = $_POST['payMethod'];

    $receipt = $_FILES['receipt'];
    $targetDir = "../receipt/";
    $fileName = $_FILES['receipt']['name'];
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    $bapCert = $_FILES['bapCert'];
    $targetDir1 = "../bapCert/";
    $fileName1 = $_FILES['bapCert']['name'];
    $targetFilePath1 = $targetDir1 . $fileName1;
    $fileType1 = pathinfo($targetFilePath1, PATHINFO_EXTENSION);

    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');

    if (in_array($fileType, $allowTypes) && in_array($fileType1, $allowTypes)) {
        if (move_uploaded_file($_FILES["receipt"]["tmp_name"], $targetFilePath) &&
            move_uploaded_file($_FILES["bapCert"]["tmp_name"], $targetFilePath1)) {

            $sql_query = "INSERT INTO communion_tbl(addedBy, name, contact, address, comDate, comTime, bapCert, description, amount, receipt, transactType, refNum, payMethod)
                          VALUES('$addedBy', '$name', '$contact', '$address', '$comDate', '$comTime', '$targetFilePath1', '$desc', '$amount', '$targetFilePath', '$transactType', '$refNum', '$payMethod')";

            if (mysqli_query($conn, $sql_query)) {
                echo "<script type='text/javascript'>
                    alert('Communion Reserved Successfully!');
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
