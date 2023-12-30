<?php
    session_start();
    include_once "dbconn.php";
    $request = $_REQUEST;
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    if(!empty($uname) && !empty($name) && !empty($email) && !empty($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                header("Location: ../signupform.php?error=$email - This email already exist!");
                exit();
            }else{
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);
    
                    $extensions = ["jpeg", "png", "jpg"];
                    if(in_array($img_ext, $extensions) === true){
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true){
                            $time = time();
                            $new_img_name = $time.$img_name;
                            if(move_uploaded_file($tmp_name,"../assets/profile/".$new_img_name)){
                                $ran_id = rand(time(), 100000000);
                                $encrypt_pass = md5($password);
                                $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, uname, name, email, address, password, contact, profile)
                                VALUES ({$ran_id}, '{$uname}','{$name}', '{$email}', '{$address}', '{$encrypt_pass}', '{$contact}', '{$new_img_name}')");
                                if($insert_query){
                                    $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                    if(mysqli_num_rows($select_sql2) > 0){
                                        $result = mysqli_fetch_assoc($select_sql2);
                                        $_SESSION['unique_id'] = $result['unique_id'];
                                        header("Location: ../signup.php?success=Successful created an account!");
                                        exit();
                                    }else{
                                        header("Location: ../signup.php?error=This email address not Exist!&$email");
                                        exit();
                                    }
                                }else{
                                    header("Location: ../signup.php?error=Something went wrong. Please try again!");
                                    exit();
                                }
                            }
                        }else{
                            header("Location: ../signup.php?error=Please upload an image file - jpeg, png, jpg");
                            exit();
                        }
                    }else{
                        header("Location: ../signup.php?error=Please upload an image file - jpeg, png, jpg");
                        exit();
                    }
                }
            }
        }else{
            header("Location: ../signup.php?error=$email is not a valid email!");
            exit();
        }
    }else{
        header("Location: ../signup.php?error=All input fields are required!!");
        exit();
    }
?>