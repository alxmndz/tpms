<?php
include_once 'dbconn.php';

if (isset($_POST['btn-save'])) {
    $payMethod = $_POST['payMethod'];
    if ($payMethod === 'face-to-face') {
        $refNum = null;
        $amount = null; // Set amount to null for face-to-face payments
        $targetFilePath = null; // Set receipt to null for face-to-face payments
        
        $addedBy = $_POST['addedBy'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $event = $_POST['event'];
        $payMethod = $_POST['payMethod'];
        $transactType = $_POST['transactType'];

    } elseif ($payMethod === 'gcash') {
        $addedBy = $_POST['addedBy'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $event = $_POST['event'];
        $payMethod = $_POST['payMethod'];
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

    $sql_query = "INSERT INTO request(addedBy,name,contact,address,event,amount,refNum,receipt,transactType) VALUES('$addedBy','$name','$contact','$address','$event','$amount','$refNum','$targetFilePath','$transactType')";

    if (mysqli_query($conn, $sql_query)) {
        echo "<script type='text/javascript'>
            alert('Requested Successfully!');
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
