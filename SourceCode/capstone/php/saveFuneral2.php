<?php
include_once 'dbconn.php';

if (isset($_POST['btn-save'])) {
    $payMethod = $_POST['payMethod'];
    if ($payMethod === 'face-to-face') {
        $addedBy = $_POST['addedBy'];
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
        $resTime = $_POST['resTime'];
        $status = $_POST['status'];

        $refNum = null;
        $amount = null;
        $targetFilePath = null;
        
    } elseif ($payMethod === 'gcash') {
        $addedBy = $_POST['addedBy'];
        $name = $_POST['name'];
        $fName = $_POST['fName'];
        $mName = $_POST['mName'];
        $widow = $_POST['widow'];
        $address = $_POST['address'];
        $deathDate = $_POST['deathDate'];
        $age = $_POST['age'];
        $buryDate = $_POST['buryDate'];
        $cause = $_POST['cause'];
        $sacrament = $_POST['sacrament'];
        $lastsacrament = $_POST['lastsacrament'];
        $amount = $_POST['amount'];
        $transactType = $_POST['transactType'];
        $reqBy = $_POST['reqBy'];
        $resTime = $_POST['resTime'];
        $status = $_POST['status'];
        $refNum = $_POST['refNum'];
        $contact = $_POST['contact'];

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

    $sql_query = "INSERT INTO funeralmass_tbl(name,fName,mName,widow,address,deathDate,age,buryDate,cause,sacrament,lastsacrament,amount,addedBy,receipt,payMethod,transactType,status,refNum,contact,reqBy,resTime) VALUES('$name','$fName','$mName','$widow','$address','$deathDate','$age','$buryDate','$cause','$sacrament','$lastsacrament','$amount','$addedBy','$targetFilePath','$payMethod','$transactType','$status','$refNum','$contact','$reqBy','$resTime')";

    if (mysqli_query($conn, $sql_query)) {
        echo "<script type='text/javascript'>
            alert('Funeral Mass Reserved Successfully!');
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
