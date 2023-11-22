<?php
include_once 'dbconn.php';

if (isset($_POST['btn-save'])) {
    // Assuming you have a query to fetch the value from the table
    $selectQuery = "SELECT baptismal FROM eventsprice";
    $result = mysqli_query($conn, $selectQuery);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the value
        $row = mysqli_fetch_assoc($result);
        $baptismal = $row['baptismal'];
    } else {
        // Default value if no data is found
        $baptismal = 1000; // You can set any default value here
    }

    $amount = $baptismal;

    $payMethod = $_POST['payMethod'];
    if ($payMethod === 'face-to-face') {
        $refNum = null;
        $amount = $amount; // Set amount to null for face-to-face payments
        $targetFilePath = null; // Set receipt to null for face-to-face payments
        
        $addedBy = $_POST['addedBy'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $event = $_POST['event'];
        $status = $_POST['status'];
        $payMethod = $_POST['payMethod'];
        $transactType = $_POST['transactType'];

    } elseif ($payMethod === 'gcash') {
        $addedBy = $_POST['addedBy'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $event = $_POST['event'];
        $status = $_POST['status'];
        $payMethod = $_POST['payMethod'];
        $transactType = $_POST['transactType'];
        $amount = $amount;
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

    $sql_query = "INSERT INTO request(addedBy,name,contact,address,event,amount,refNum,receipt,status,transactType) VALUES('$addedBy','$name','$contact','$address','$event','$amount','$refNum','$targetFilePath','$status','$transactType')";

    if (mysqli_query($conn, $sql_query)) {
        echo "<script type='text/javascript'>
            alert('Requested Successfully!');
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
