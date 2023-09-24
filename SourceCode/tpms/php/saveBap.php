<?php
include_once 'dbconn.php';

if (isset($_POST['btn-save'])) {
    $payMethod = $_POST['payMethod'];
    if ($payMethod === 'face-to-face') {
        $amount = null; // Set amount to null for face-to-face payments
        $targetFilePath = null; // Set receipt to null for face-to-face payments
        $addedBy = $_POST['addedBy'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $bapDate = $_POST['bapDate'];
        $bapTime = $_POST['bapTime'];
        $payMethod = $_POST['payMethod'];
        $checkbox1 = $_POST['requirements'];

        $chk = "";
        foreach ($checkbox1 as $chk1) {
            $chk .= $chk1 . ",";
        }

    } elseif ($payMethod === 'gcash') {
        $addedBy = $_POST['addedBy'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $bapDate = $_POST['bapDate'];
        $bapTime = $_POST['bapTime'];
        $amount = $_POST['amount'];
        $payMethod = $_POST['payMethod'];
        $checkbox1 = $_POST['requirements'];

        $chk = "";
        foreach ($checkbox1 as $chk1) {
            $chk .= $chk1 . ",";
        }

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

    $sql_query = "INSERT INTO baptismal_tbl(addedBy, name, contact, address, bapDate, bapTime, payMethod, amount, receipt, requirements)
                  VALUES('$addedBy', '$name', '$contact', '$address', '$bapDate', '$bapTime', '$payMethod', '$amount', '$targetFilePath', '$chk')";

    if (mysqli_query($conn, $sql_query)) {
        echo "<script type='text/javascript'>
            alert('Baptismal Reserved Successfully!');
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
