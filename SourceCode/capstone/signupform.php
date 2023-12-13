<!DOCTYPE html>
<html>

<head>
    <title>Saint Vincent Ferrer | Signup Form</title>
    <link rel="icon" type="image/x-icon" href="assets/icons/login.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/lns.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins&display=swap');

        * {
            font-family: "Poppins", sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            background-image: url('assets/update1.jpg'); /* Set a common background for both columns */
            background-size: cover;
            background-position: center;
        }

        .full-height {
            min-height: 100vh;
        }

        .left-column {
            background-color: rgba(0, 0, 0, 0.5); /* Set left column background color with alpha for darkness */
            min-height: 100vh;
            color: white; /* Set text color to white */
        }

        .right-column {
            display: none; /* Hide right column on smaller screens */
        }

        .card {
            background-color: rgba(0, 0, 0, 0.5); /* Set card background color with alpha for darkness */
            color: white; /* Set text color to white */
            border: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row full-height">
            <div class="col-md-6 col-lg-5 left-column">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="card">
                        <div class="card-header">
                            <a href="home.php"><i class="fas fa-arrow-circle-left" style="color: #117A65;"></i></a>
                            <h4 class="text-center"><b>Signup Form</b></h4>
                        </div>
                        <div class="card-body">
                            <form action="php/signup.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                                <?php if (isset($_GET['error'])) { ?>
                                    <p class="error"><?php echo $_GET['error']; ?></p>
                                <?php } ?>

                                <?php if (isset($_GET['success'])) { ?>
                                    <p class="success"><?php echo $_GET['success']; ?></p>
                                <?php } ?>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label><i class="fas fa-user"></i> Name</label>
                                            <input type="text" id="name" name="name" class="form-control form-control-md" placeholder="Enter your fullname" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label><i class="fas fa-user"></i> Username</label>
                                            <input type="text" id="uname" name="uname" class="form-control form-control-md" placeholder="Enter your username" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-bottom: 25px;">
                                    <div class="col-12">
                                        <div class="form-outline">
                                            <label><i class="fas fa-envelope"></i> Email</label>
                                            <input type="text" id="email" name="email" class="form-control form-control-md" placeholder="Enter your email" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-bottom: 25px;">
                                    <div class="col-12">
                                        <div class="form-outline">
                                            <label><i class="fas fa-home"></i> Address</label>
                                            <input type="text" id="address" name="address" class="form-control form-control-md" placeholder="Enter your address" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label><i class="fas fa-lock"></i> Password</label>
                                            <div class="input-group">
                                                <input type="password" name="password" id="password" class="form-control form-control-md" placeholder="Enter your password" required>
                                                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">
                                                    <i id="eyeIcon" class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label><i class="fas fa-phone"></i> Contact Number</label>
                                            <input type="number" name="contact" id="contact" class="form-control form-control-md" placeholder="Enter your contact number" maxlength="11" onkeyup="limitDigits(this)" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <div class="form-outline">
                                            <label><i class="fas fa-id-badge"></i> Profile Picture</label>
                                            <input type="file" name="image" id="image" class="form-control form-control-md" required>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success w-100">Register</button>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <span>Already have an account? <a href="loginform.php">Login</a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-7 right-column d-none d-md-block">
                <!-- Right column content, such as your image -->
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function limitDigits(input) {
            if (input.value.length > 11) {
                input.value = input.value.substring(0, 11);
            }
        }

        function togglePassword() {
            var passwordField = document.getElementById("password");
            var eyeIcon = document.getElementById("eyeIcon");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }
    </script>
</body>

</html>
