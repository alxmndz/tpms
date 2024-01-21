<?php
session_start();
include_once '../dbconn.php';

date_default_timezone_set('Asia/Manila'); // Set the time zone to Philippines
$transactDate = date('Y-m-d H:i:s');

if (isset($_POST['btn-save'])) {
    $payMethod = $_POST['payMethod'];
    $buryDate = $_POST['buryDate'];
    $resTime = $_POST['resTime'];

    // Assuming you have a query to fetch the value from the table
    $selectQuery = "SELECT funeralmass FROM eventsprice";
    $result = mysqli_query($conn, $selectQuery);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the value
        $row = mysqli_fetch_assoc($result);
        $funeralmass = $row['funeralmass'];
    } else {
        // Default value if no data is found
        $funeralmass = 1000; // You can set any default value here
    }

    $amount = $funeralmass;

    $funeralDateTimestamp = strtotime($buryDate);
    $currentDateTimestamp = time();

    // Check if the blessDate has already passed
    if ($funeralDateTimestamp < $currentDateTimestamp) {
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
        header('Location: ../../staff/reserve.php');
        exit();
    }

    $checkQuery = "SELECT COUNT(*) as reservationCount FROM funeralmass_tbl WHERE buryDate = '$buryDate' AND resTime = '$resTime'";
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
            header('Location: ../../staff/reserve.php');
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
        header('Location: ../../staff/reserve.php');
        exit();
    }
    if ($payMethod === 'face-to-face') {
        $addedBy = $_POST['addedBy'];
        $payDate = $_POST['payDate'];
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

        $refNum = null;
        $amount = $amount;
        $targetFilePath = null;
        
    } elseif ($payMethod === 'gcash') {
        $addedBy = $_POST['addedBy'];
        $payDate = $_POST['payDate'];
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
        $amount = $amount;
        $transactType = $_POST['transactType'];
        $reqBy = $_POST['reqBy'];
        $resTime = $_POST['resTime'];
        $refNum = $_POST['refNum'];
        $contact = $_POST['contact'];

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
            header('Location: ../../staff/reserve.php');
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
            header('Location: ../../staff/reserve.php');
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
        header('Location: ../../staff/reserve.php');
        exit();
    }

    $sql_query = "INSERT INTO funeralmass_tbl(name,fName,mName,widow,address,deathDate,age,buryDate,cause,sacrament,lastsacrament,amount,addedBy,receipt,payMethod,transactType,refNum,contact,reqBy,resTime,payDate,transactDate) VALUES('$name','$fName','$mName','$widow','$address','$deathDate','$age','$buryDate','$cause','$sacrament','$lastsacrament','$amount','$addedBy','$targetFilePath','$payMethod','$transactType','$refNum','$contact','$reqBy','$resTime','$payDate','$transactDate')";

    if (mysqli_query($conn, $sql_query)) {
        echo '<script>
            swal({
                title: "Success!",
                text: "Funeral Mass Reserved Successfully!",
                type: "success",
                timer: 3000,
                showConfirmButton: false
            });
        </script>';

            // Set session variables for additional messages (if needed)
            $_SESSION['message'] = "Funeral Mass Reserved Successfully!";
            $_SESSION['alert'] = "success";

            // Redirect to the appropriate page
            header('Location: ../../staff/reserve.php');
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
        header('Location: ../../staff/reserve.php');
        exit();
    }
    mysqli_close($conn);
}
?>
