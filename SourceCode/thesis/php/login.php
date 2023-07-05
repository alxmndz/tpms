<?php
session_start();
include "config.php";

$error = "";

if (isset($_POST['email']) && isset($_POST['password'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);

    if (empty($email)) {
        $error = "Required to fill up this email tab.";
    } else if (empty($pass)) {
        $error = "Required to fill up this password tab.";
    } else {
        // Encrypting the code for more security
        $pass = md5($pass);

        $sql = "SELECT * FROM accounts WHERE email = '$email' AND password = '$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $pass) {
                $_SESSION['fname'] = $row['fname'];
                $_SESSION['lname'] = $row['lname'];
                $_SESSION['img'] = $row['img'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['type'] = $row['type'];
                $_SESSION['user_id'] = $row['user_id'];

                if ($_SESSION['type'] === "patron") {
                    header("Location: ../patron.php");
                    exit();
                } elseif ($_SESSION['type'] === "admin") {
                    header("Location: ../dashboard.php");
                    exit();
                } elseif ($_SESSION['type'] === "staff") {
                    header("Location: ../staff.php");
                    exit();
                } else {
                    $error = "Incorrect user or password input.";
                     header("Location: ../login-rev.php?error=Incorrect user or password input.");
                    // exit();
                    echo "Incorrect user or password input.";
                }
            } else {
                $error = "Incorrect user or password input.";
                 header("Location: ../login-rev.php?error=Incorrect user or password input.");
                // exit();
                echo "Incorrect user or password input.";
            }
        } else {
            $error = "Incorrect user or password input.";
             header("Location: ../login-rev.php?error=Incorrect user or password input.");
            // exit();
            echo "Incorrect user or password input.";
        }
    }
} else {
    $error = "Error: Something went wrong";
     header("Location: ../login-rev.php?error=Incorrect user or password input.");
    // exit();
    echo "Incorrect user or password input.";
}

?>
