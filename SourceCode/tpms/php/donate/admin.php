<?php
session_start();
include_once '../dbconn.php';
date_default_timezone_set('Asia/Manila'); // Set the time zone to Philippines
  $donatedDate = date('Y-m-d H:i:s');

if (isset($_POST['btn-save'])) {
    $payMethod = $_POST['payMethod'];
    if ($payMethod === 'face-to-face') {
        $targetFilePath = null; // Set receipt to null for face-to-face payments
        $amount = $_POST['amount'];
        $addedBy = $_POST['addedBy'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $payMethod = $_POST['payMethod'];
        $transactType = $_POST['transactType'];
        

    } elseif ($payMethod === 'gcash') {
        $addedBy = $_POST['addedBy'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $payMethod = $_POST['payMethod'];
        $transactType = $_POST['transactType'];
        $amount = $_POST['amount'];

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
        header('Location: ../../admin/donation.php');
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
        header('Location: ../../admin/donation.php');
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
        header('Location: ../../admin/donation.php');
        exit();
    }

    $sql_query = "INSERT INTO donation(name,contact,amount,addedBy,receipt,donatedDate) VALUES('$name','$contact','$amount','$addedBy','$targetFilePath','$donatedDate')";

    if (mysqli_query($conn, $sql_query)) {
        echo '<script>
            swal({
                title: "Success!",
                text: "Donated Successfully!",
                type: "success",
                timer: 3000,
                showConfirmButton: false
            });
        </script>';

        // Set session variables for additional messages (if needed)
        $_SESSION['message'] = "Donated Successfully!";
        $_SESSION['alert'] = "success";

        // Redirect to the appropriate page
        header('Location: ../../admin/donation.php');
        exit();
    } else {
        echo "<script type='text/javascript'>
            alert('Insertion Failed: " . mysqli_error($conn) . "');
            window.location = '../../admin/donation.php';
        </script>";

        '<script>
                    swal({
                        title: "Error!",
                        text: "Insertion Failed: "' . mysqli_error($conn) .'",
                        type: "error",
                        timer: 3000,
                        showConfirmButton: false
                    });
                </script>';

        // Set session variables for additional messages (if needed)
        $_SESSION['message'] = "'Insertion Failed: " . mysqli_error($conn) . "'";
        $_SESSION['alert'] = "error";

        // Redirect to the appropriate page
        header('Location: ../../admin/donation.php');
        exit();
    }
    mysqli_close($conn);
}
?>
