<?php
session_start();
include_once '../dbconn.php';
date_default_timezone_set('Asia/Manila'); // Set the time zone to Philippines
$transactDate = date('Y-m-d H:i:s');

if (isset($_POST['btn-save'])) {
    $payMethod = $_POST['payMethod'];
    $conDate = $_POST['conDate'];
    $conTime = $_POST['conTime'];

    // Assuming you have a query to fetch the value from the table
    $selectQuery = "SELECT confirmation FROM eventsprice";
    $result = mysqli_query($conn, $selectQuery);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the value
        $row = mysqli_fetch_assoc($result);
        $confirmation = $row['confirmation'];
    } else {
        // Default value if no data is found
        $confirmation = 1000; // You can set any default value here
    }

    $amount = $confirmation;

    $conDateTimestamp = strtotime($conDate);
    $currentDateTimestamp = time();

    // Check if the blessDate has already passed
    if ($conDateTimestamp < $currentDateTimestamp) {
        echo '<script>
                swal({
                    title: "Error!",
                    text: "Invalid Reservation Date! The selected date has already passed.",
                    type: "error",
                    timer: 3000,
                    showConfirmButton: false
                });
            </script>';

        // Set session variables for additional messages (if needed)
        $_SESSION['message'] = "Invalid Reservation Date! The selected date has already passed.";
        $_SESSION['alert'] = "error";

        // Redirect to the appropriate page
        header('Location: ../../admin/reserve.php');
        exit();
    }

    $checkQuery = "SELECT COUNT(*) as reservationCount FROM confirmation_tbl WHERE conDate = '$conDate' AND conTime = '$conTime'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if ($checkResult) {
        $row = mysqli_fetch_assoc($checkResult);
        $reservationCount = $row['reservationCount'];

        if ($reservationCount >= 10) {
            echo '<script>
                    swal({
                        title: "Error!",
                        text: "Sorry, all reservations for this date and time are fully booked. Please choose a different date.",
                        type: "error",
                        timer: 3000,
                        showConfirmButton: false
                    });
                </script>';

            // Set session variables for additional messages (if needed)
            $_SESSION['message'] = "Sorry, all reservations for this date and time are fully booked. Please choose a different date.";
            $_SESSION['alert'] = "error";

            // Redirect to the appropriate page
            header('Location: ../../admin/reserve.php');
            exit();
        }
    } else {
        echo '<script>
                swal({
                    title: "Error!",
                    text: "Error checking reservations: ' . mysqli_error($conn) . '",
                    type: "error",
                    timer: 3000,
                    showConfirmButton: false
                });
            </script>';

        // Set session variables for additional messages (if needed)
        $_SESSION['message'] = "'Error checking reservations: " . mysqli_error($conn) . "'";
        $_SESSION['alert'] = "error";

        // Redirect to the appropriate page
        header('Location: ../../admin/reserve.php');
        exit();
    }
    if ($payMethod === 'face-to-face') {
        $addedBy = $_POST['addedBy'];
        $payDate = $_POST['payDate'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $conDate = $_POST['conDate'];
        $conTime = $_POST['conTime'];
        $bapCert = $_POST['bapCert'];
        $desc = $_POST['desc'];
        $transactType = $_POST['transactType'];
        $status = $_POST['status'];

        $refNum = null;
        $amount = $amount;
        $targetFilePath = null;

    } elseif ($payMethod === 'gcash') {
        $addedBy = $_POST['addedBy'];
        $payDate = $_POST['payDate'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $conDate = $_POST['conDate'];
        $conTime = $_POST['conTime'];
        $bapCert = $_POST['bapCert'];
        $desc = $_POST['desc'];
        $amount = $amount;
        $transactType = $_POST['transactType'];
        $status = $_POST['status'];
        $refNum = $_POST['refNum'];

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
            header('Location: ../../admin/reserve.php');
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
            header('Location: ../../admin/reserve.php');
            exit();
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
        header('Location: ../../admin/reserve.php');
        exit();
    }

    $sql_query = "INSERT INTO confirmation_tbl(addedBy, name, contact, address, conDate, conTime, bapCert, description, amount, receipt, transactType, status, refNum, payMethod,payDate, transactDate) VALUES('$addedBy', '$name', '$contact', '$address', '$conDate', '$conTime', '$bapCert', '$desc', '$amount', '$targetFilePath', '$transactType', '$status', '$refNum', '$payMethod','$payDate','$transactDate')";

    if (mysqli_query($conn, $sql_query)) {
        echo '<script>
            swal({
                title: "Success!",
                text: "Confirmation Reserved Successfully!",
                type: "success",
                timer: 3000,
                showConfirmButton: false
            });
        </script>';

            // Set session variables for additional messages (if needed)
            $_SESSION['message'] = "Confirmation Reserved Successfully!";
            $_SESSION['alert'] = "success";

            // Redirect to the appropriate page
            header('Location: ../../admin/reserve.php');
            exit();
    } else {
        echo '<script>
        swal({
            title: "Error!",
            text: "Insertion Failed:'  . mysqli_error($conn) . '",
            type: "error",
            timer: 3000,
            showConfirmButton: false
        });
    </script>';

// Set session variables for additional messages (if needed)
$_SESSION['message'] = "'Insertion Failed: " . mysqli_error($conn) . "'";
$_SESSION['alert'] = "error";

// Redirect to the appropriate page
header('Location: ../../admin/reserve.php');
exit();
    }
    mysqli_close($conn);
}
?>
