<?php
session_start();
include_once '../dbconn.php';

date_default_timezone_set('Asia/Manila'); // Set the time zone to Philippines
$transactDate = date('Y-m-d H:i:s');

if (isset($_POST['btn-save'])) {
    $payMethod = $_POST['payMethod'];
    $blessDate = $_POST['blessDate'];
    $blessTime = $_POST['blessTime'];

    // Assuming you have a query to fetch the value from the table
    $selectQuery = "SELECT blessing FROM eventsprice";
    $result = mysqli_query($conn, $selectQuery);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the value
        $row = mysqli_fetch_assoc($result);
        $blessing = $row['blessing'];
    } else {
        // Default value if no data is found
        $blessing = 1000; // You can set any default value here
    }

    $amount = $blessing;

    $blessDateTimestamp = strtotime($blessDate);
    $currentDateTimestamp = time();

    // Check if the blessDate has already passed
    if ($blessDateTimestamp < $currentDateTimestamp) {
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

    $checkQuery = "SELECT COUNT(*) as reservationCount FROM blessing_tbl WHERE blessDate = '$blessDate' AND blessTime = '$blessTime'";
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
        $name = $_POST['name'];
        $payDate = $_POST['payDate'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $blessDate = $_POST['blessDate'];
        $blessTime = $_POST['blessTime'];
        $intention = $_POST['intention'];
        $addedBy = $_POST['addedBy'];
        $status = $_POST['status'];
        $transactType = $_POST['transactType'];
        
        $refNum = null;
        $amount = $amount;
        $targetFilePath = null;

    } elseif ($payMethod === 'gcash') {
        $name = $_POST['name'];
        $payDate = $_POST['payDate'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $blessDate = $_POST['blessDate'];
        $blessTime = $_POST['blessTime'];
        $intention = $_POST['intention'];
        $amount = $amount;
        $addedBy = $_POST['addedBy'];
        $status = $_POST['status'];
        $transactType = $_POST['transactType'];
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

    $sql_query = "INSERT INTO blessing_tbl(name,contact,address,blessDate,blessTime,intention,amount,addedBy,receipt,transactType, status, refNum, payMethod, payDate, transactDate) VALUES('$name','$contact','$address','$blessDate','$blessTime','$intention','$amount','$addedBy','$targetFilePath','$transactType','$status','$refNum','$payMethod', '$payDate','$transactDate')";

    if (mysqli_query($conn, $sql_query)) {
        echo '<script>
            swal({
                title: "Success!",
                text: "Blessing Reserved Successfully!",
                type: "success",
                timer: 3000,
                showConfirmButton: false
            });
        </script>';

        // Set session variables for additional messages (if needed)
        $_SESSION['message'] = "Blessing Reserved Successfully!";
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
