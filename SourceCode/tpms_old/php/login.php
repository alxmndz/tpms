<?php
session_start();
include "dbconn.php";

$error = "";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        $error = "Required to fill up this email tab.";
    } else if (empty($pass)) {
        $error = "Required to fill up this password tab.";
    } else {
        // Encrypting the code for more security
        $pass = md5($pass);

        $sql = "SELECT * FROM users WHERE uname = '$uname' AND password = '$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['uname'] === $uname && $row['password'] === $pass) {
                $_SESSION['uname'] = $row['uname'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['contact'] = $row['contact'];
                $_SESSION['profile'] = $row['profile'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['address'] = $row['address'];
                $_SESSION['type'] = $row['type'];
                $_SESSION['id'] = $row['id'];

                if ($_SESSION['type'] === "patron") {
                    header("Location: ../patron.php");
                    exit();
                } elseif ($_SESSION['type'] === "admin") {
                    header("Location: ../admin.php");
                    exit();
                } elseif ($_SESSION['type'] === "staff") {
                    header("Location: ../staff.php");
                    exit();
                } else {
                    $error = "Incorrect user or password input.";
                     header("Location: ../loginform.php?error=Incorrect user or password input.");
                    // exit();
                    echo "Incorrect user or password input.";
                }
            } else {
                $error = "Incorrect user or password input.";
                 header("Location: ../loginform.php?error=Incorrect user or password input.");
                // exit();
                echo "Incorrect user or password input.";
            }
        } else {
            $error = "Incorrect user or password input.";
             header("Location: ../loginform.php?error=Incorrect user or password input.");
            // exit();
            echo "Incorrect user or password input.";
        }
    }
} else {
    header("Location: ../loginform.php?error=Incorrect user or password input.");
    exit();
    echo "Incorrect user or password input.";
}

?>
