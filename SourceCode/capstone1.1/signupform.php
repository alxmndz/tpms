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

        .full-height {
            min-height: 100vh;
        }

        .left-column {
            background-image: url('assets/background1.png');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
        }

        .right-column {
            background-image: url('assets/svf-background.jpg'); /* Update this path */
            background-size: cover;
            background-position: center;
            min-height: 100vh;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row full-height">
            <div class="col-md-6 col-lg-7 right-column d-none d-md-block">
                <!-- Right column content, such as your image -->
            </div>
            <div class="col-12 col-md-6 col-lg-5 left-column">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="card">
                        <div class="card-header">
                            <a href="home.php"><i class="fas fa-arrow-circle-left" style="color: #E74C3C;"></i></a>
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
				          	<label><i class="fa-solid fa-user"></i> Name</label>
				            <input type="text" id="name" name="name" class="form-control form-control-md" placeholder="Enter your fullname" required>
				        	</div>
				        </div>
				        <div class="col-md-6 mb-4">
				          <div class="form-outline">
				          	<label><i class="fa-solid fa-user-pen"></i> Username</label>
				            <input type="text" id="uname" name="uname" class="form-control form-control-md" placeholder="Enter your username" required>
				          </div>
								</div>
				      </div>

				      <div class="row" style="margin-bottom: 25px;">
                <div class="col-12">
                  <div class="form-outline">
                  	<label><i class="fa-solid fa-envelope"></i> Email</label>
				            <input type="text" id="email" name="email" class="form-control form-control-md" placeholder="Enter your email" required>
				          </div>
                </div>
              </div>

              <div class="row" style="margin-bottom: 25px;">
                <div class="col-12">
                  <div class="form-outline">
                  	<label><i class="fa-solid fa-home"></i> Address</label>
				            <input type="text" id="address" name="address" class="form-control form-control-md" placeholder="Enter your address" required>
				          </div>
                </div>
              </div>

              <div class="row">
								<div class="col-md-6 mb-4">
				          <div class="form-outline">
				          	<label><i class="fa-solid fa-lock"></i> Password</label>
				            <input type="password" name="password" id="password" class="form-control form-control-md" placeholder="Enter your password" required>
				        	</div>
				        </div>
				        <div class="col-md-6 mb-4">
				          <div class="form-outline">
				          	<label><i class="fa-solid fa-phone"></i> Contact</label>
				            <input type="tel" name="contact" id="contact" class="form-control form-control-md" placeholder="Enter your contact number" required>
				        	</div>
				        </div>
				      </div>

				      <div class="row">
				        <div class="col-md-12 mb-4">
				          <div class="form-outline">
				          	<label><i class="fa-regular fa-id-badge"></i> Profile Picture</label>
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
        </div>
    </div>
</body>

</html>
