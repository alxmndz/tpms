<!DOCTYPE html>
<html>

<head>
    <title>Saint Vincent Ferrer | Login Form</title>
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

        .full-height {
            min-height: 100vh;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            background-image: url('assets/bg_update.jpg'); /* Update this path */
            background-size: cover;
            background-position: center;
        }

        .left-column {
            min-height: 100vh;
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
                            <a href="home.php"><i class="fas fa-arrow-circle-left" style="color: #48C9B0;"></i></a>
                            <h4 class="text-center"><b>Login Form</b></h4>
                        </div>
                        <div class="card-body">
                            <form action="php/login.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                                <?php if (isset($_GET['error'])) { ?>
                                    <p class="error"><?php echo $_GET['error']; ?></p>
                                <?php } ?>

                                <?php if (isset($_GET['success'])) { ?>
                                    <p class="success"><?php echo $_GET['success']; ?></p>
                                <?php } ?>
                                <div class="mb-3">
                                    <label for="uname" class="form-label"><i class="fas fa-user"></i> Username</label>
                                    <input class="form-control" type="text" id="uname" name="uname" placeholder="Enter your username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label"><i class="fas fa-unlock"></i> Password</label>
                                    <div class="input-group">
                                        <input class="form-control" type="password" id="password" name="password" placeholder="Enter your password" required>
                                        <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility()">
                                            <i id="eyeIcon" class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success w-100"><i class="fas fa-key"></i> Login</button>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <span>Don't have an account yet? <a href="signupform.php">Signup</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
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
