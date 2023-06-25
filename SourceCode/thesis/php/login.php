<?php
session_start();
include "config.php";

if(isset($_POST['email']) && isset($_POST['password'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);

    if(empty($email)) {
        header("Location: login-rev.php?error=Required to fillup this email tab.");
        exit();
    }else if(empty($pass)){
        header("Location: login-rev.php?error=Required to fillup this password tab.");
        exit();
    }else{
        //encrypting the code for more security
        $pass = md5($pass);
        
        $sql = "SELECT * FROM accounts WHERE email = '$email' AND 
          password = '$pass'";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $pass){
                $_SESSION['email'] = $row['email'];
                $_SESSION['type'] = $row['type'];
                $_SESSION['user_id'] = $row['user_id'];

                if ($_SESSION['type']==="customer") {
                    header("Location: ../patron.php");
                    exit();
                }elseif ($_SESSION['type']==="admin") {
                    header("Location: ../dashboard.php");
                    exit();
                }elseif ($_SESSION['type']==="staff") {
                    header("Location: ../staff.php");
                    exit();
                }else{
                header("Location: login-rev.php?error=Incorrect user or password input.");
                exit();
                }
            }else{
                header("Location: login-rev.php?error=Incorrect user or password input.");
                exit();
                }
        }else{
            header("Location: login-rev.php?error=Incorrect user or password input.");
            exit();
        }
    }

}else{
    header("Location: login-rev.php");
    exit();
}