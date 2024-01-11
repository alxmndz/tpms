<?php
session_start();
include_once '../dbconn.php';
date_default_timezone_set('Asia/Manila'); // Set the time zone to Philippines
$transactDate = date('Y-m-d H:i:s');

if (isset($_POST['btn-save'])) {
    $payMethod = $_POST['payMethod'];
    $wdate = $_POST['wdate'];
    $resTime = $_POST['resTime'];

    // Assuming you have a query to fetch the value from the table
    $selectQuery = "SELECT wedding FROM eventsprice";
    $result = mysqli_query($conn, $selectQuery);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the value
        $row = mysqli_fetch_assoc($result);
        $wedding = $row['wedding'];
    } else {
        // Default value if no data is found
        $wedding = 1000; // You can set any default value here
    }

    $amount = $wedding;

    $weddingDateTimestamp = strtotime($wdate);
    $currentDateTimestamp = time();

    // Check if the blessDate has already passed
    if ($weddingDateTimestamp < $currentDateTimestamp) {
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

    $checkQuery = "SELECT COUNT(*) as reservationCount FROM wedding_tbl WHERE wdate = '$wdate' AND resTime = '$resTime'";
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
        $refNum = null;
        $amount = $amount; // Set amount to null for face-to-face payments
        $targetFilePath = null; // Set receipt to null for face-to-face payments
        
        $addedBy = $_POST['addedBy'];
        $payDate = $_POST['payDate'];
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
        $status = $_POST['status'];

    } elseif ($payMethod === 'gcash') {
        $addedBy = $_POST['addedBy'];
        $payDate = $_POST['payDate'];
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
        $status = $_POST['status'];
        $amount = $amount;
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

    $sql_query = "INSERT INTO wedding_tbl(addedBy, groom, bride, gContact, bContact, gAddress, bAddress, package, intention, wdate, resTime, birthCert, bapCert, conCert, cenomar, marriageLicense, RPic, MBPic, payMethod, amount, receipt, transactType, status, refNum,payDate, transactDate)
                  VALUES('$addedBy', '$groom', '$bride', '$gContact', '$bContact', '$gAddress', '$bAddress', '$package', '$intention', '$wdate', '$resTime', '$birthCert', '$bapCert', '$conCert', '$cenomar', '$marriageLicense', '$RPic', '$MBPic', '$payMethod', '$amount', '$targetFilePath', '$transactType', '$status', '$refNum','$payDate', '$transactDate')";

    if (mysqli_query($conn, $sql_query)) {
        echo '<script>
            swal({
                title: "Success!",
                text: "Wedding Reserved Successfully!",
                type: "success",
                timer: 3000,
                showConfirmButton: false
            });
        </script>';

            // Set session variables for additional messages (if needed)
            $_SESSION['message'] = "Wedding Reserved Successfully!";
            $_SESSION['alert'] = "success";

            // Redirect to the appropriate page
            header('Location: ../../admin/reserve.php');
            exit();;
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
