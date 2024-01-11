<?php
session_start();
include_once '../dbconn.php';

date_default_timezone_set('Asia/Manila'); // Set the time zone to Philippines
$transactDate = date('Y-m-d H:i:s');

if (isset($_POST['btn-save'])) {
    $payMethod = $_POST['payMethod'];
    $id = $_POST['id']; // Define $id here or fetch it from somewhere

    if ($payMethod === 'face-to-face') {
        // Set amount to null for face-to-face payments
        // Assuming you have a query to fetch the value from the table
        $selectQuery = "SELECT cert FROM eventsprice";
        $result = mysqli_query($conn, $selectQuery);
    
        if ($result && mysqli_num_rows($result) > 0) {
            // Fetch the value
            $row = mysqli_fetch_assoc($result);
            $cert = $row['cert']; // Corrected column name
        }
        
        $amount = $cert;
        $targetFilePath = null; // Set receipt to null for face-to-face payments

        $addedBy = $_POST['addedBy'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $event = $_POST['event'];
        $status = $_POST['status'];
        $transactType = $_POST['transactType'];
        $refNum = $_POST['refNum']; // Add this line to get refNum from the form

        if ($status === 'Ready to pick up') {
            // Insert a new record with whenToPickUp set to the current date in Manila timezone
            $manilaTimezone = new DateTimeZone('Asia/Manila');
            $whenToPickUp = new DateTime('now', $manilaTimezone);
            mysqli_query($conn, "INSERT INTO request(addedBy, name, contact, address, event, amount, refNum, receipt, status, transactType, transactDate, whenToPickUp) VALUES ('$addedBy', '$name', '$contact', '$address', '$event', '$amount', '$refNum', '$targetFilePath', '$status', '$transactType', '$transactDate', '{$whenToPickUp->format('Y-m-d H:i:s')}')");
        }

        if ($status === 'Released') {
            // Set whenToPickUp and pickUpDt to the current timestamp in Manila timezone
            $manilaTimezone = new DateTimeZone('Asia/Manila');
            $currentTimestamp = new DateTime('now', $manilaTimezone);
            $formattedTimestamp = $currentTimestamp->format('Y-m-d H:i:s');
        
            mysqli_query($conn, "INSERT INTO request(addedBy, name, contact, address, event, amount, refNum, receipt, status, transactType, transactDate, whenToPickUp, pickUpDt) VALUES ('$addedBy', '$name', '$contact', '$address', '$event', '$amount', '$refNum', '$targetFilePath', '$status', '$transactType', '$transactDate', '$formattedTimestamp', '$formattedTimestamp')");
        }

        if ($status === 'In Process') {
            mysqli_query($conn, "INSERT INTO request(addedBy, name, contact, address, event, amount, refNum, receipt, status, transactType, transactDate) VALUES ('$addedBy', '$name', '$contact', '$address', '$event', '$amount', '$refNum', '$targetFilePath', '$status', '$transactType', '$transactDate')");
        }
    } elseif ($payMethod === 'gcash') {
        // Insert a new record for gcash payments
        $addedBy = $_POST['addedBy'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $event = $_POST['event'];
        $status = $_POST['status'];
        $transactType = $_POST['transactType'];
        // Assuming you have a query to fetch the value from the table
        $selectQuery = "SELECT cert FROM eventsprice";
        $result = mysqli_query($conn, $selectQuery);

        if ($result && mysqli_num_rows($result) > 0) {
            // Fetch the value
            $row = mysqli_fetch_assoc($result);
            $cert = $row['cert']; // Corrected column name
        }
    
        $amount = $cert;
        $refNum = $_POST['refNum']; // Add this line to get refNum from the form
        
        $receipt = $_FILES['receipt'];
        $targetDir = "../../assets/receipt/";
        $fileName = $_FILES['receipt']['name'];
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');

        if (!in_array($fileType, $allowTypes)) {
            echo '<script>
                    swal({
                        title: "Error!",
                        text: "Invalid File Type! Only JPG, PNG, JPEG, GIF, or PDF allowed.",
                        type: "error",
                        timer: 3000,
                        showConfirmButton: false
                    });
                </script>';

        // Set session variables for additional messages (if needed)
        $_SESSION['message'] = "Invalid File Type! Only JPG, PNG, JPEG, GIF, or PDF allowed.";
        $_SESSION['alert'] = "error";

        // Redirect to the appropriate page
        header('Location: ../../admin/request.php');
        exit();
        }
        if (!move_uploaded_file($_FILES["receipt"]["tmp_name"], $targetFilePath)) {
            echo '<script>
                    swal({
                        title: "Error!",
                        text: "File Upload Failed!",
                        type: "error",
                        timer: 3000,
                        showConfirmButton: false
                    });
                </script>';

        // Set session variables for additional messages (if needed)
        $_SESSION['message'] = "File Upload Failed!";
        $_SESSION['alert'] = "error";

        // Redirect to the appropriate page
        header('Location: ../../admin/request.php');
        exit();
        }

        if ($status === 'Ready to pick up') {
            // Insert a new record with whenToPickUp set to the current date in Manila timezone
            $manilaTimezone = new DateTimeZone('Asia/Manila');
            $whenToPickUp = new DateTime('now', $manilaTimezone);
            mysqli_query($conn, "INSERT INTO request(addedBy, name, contact, address, event, amount, refNum, receipt, status, transactType, transactDate, whenToPickUp) VALUES ('$addedBy', '$name', '$contact', '$address', '$event', '$amount', '$refNum', '$targetFilePath', '$status', '$transactType', '$transactDate', '{$whenToPickUp->format('Y-m-d H:i:s')}')");
        }

        if ($status === 'Released') {
            // Set whenToPickUp and pickUpDt to the current timestamp in Manila timezone
            $manilaTimezone = new DateTimeZone('Asia/Manila');
            $currentTimestamp = new DateTime('now', $manilaTimezone);
            $formattedTimestamp = $currentTimestamp->format('Y-m-d H:i:s');
        
            mysqli_query($conn, "INSERT INTO request(addedBy, name, contact, address, event, amount, refNum, receipt, status, transactType, transactDate, whenToPickUp, pickUpDt) VALUES ('$addedBy', '$name', '$contact', '$address', '$event', '$amount', '$refNum', '$targetFilePath', '$status', '$transactType', '$transactDate', '$formattedTimestamp', '$formattedTimestamp')");
        }

        if ($status === 'In Process') {
            mysqli_query($conn, "INSERT INTO request(addedBy, name, contact, address, event, amount, refNum, receipt, status, transactType, transactDate) VALUES ('$addedBy', '$name', '$contact', '$address', '$event', '$amount', '$refNum', '$targetFilePath', '$status', '$transactType', '$transactDate')");
        }
    } else {
        echo '<script>
                swal({
                    title: "Error!",
                    text: "Invalid Payment Method!",
                    type: "error",
                    timer: 3000,
                    showConfirmButton: false
                });
            </script>';

        // Set session variables for additional messages (if needed)
        $_SESSION['message'] = "Invalid Payment Method!";
        $_SESSION['alert'] = "error";

        // Redirect to the appropriate page
        header('Location: ../../admin/request.php');
        exit();
    } 
    echo '<script>
            swal({
                title: "Success!",
                text: "Requested Successfully!",
                type: "success",
                timer: 3000,
                showConfirmButton: false
            });
        </script>';

        // Set session variables for additional messages (if needed)
        $_SESSION['message'] = "Requested Successfully!";
        $_SESSION['alert'] = "success";

        // Redirect to the appropriate page
        header('Location: ../../admin/request.php');
        exit();
    mysqli_close($conn);
}
?>
