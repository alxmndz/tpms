<?php include "lnsheader.php"; ?>
<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<a href="home.php"><i class="fa-solid fa-circle-arrow-left"></i></a>
						<h4 class="text-center">Signup Form</h4>
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
				            <input type="text" name="password" id="password" class="form-control form-control-md" placeholder="Enter your password" required>
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

							<button type="submit" class="btn btn-info" style="float: right;">Register</button>
						</form>
					</div>
					<div class="card-footer text-center">
						<span>Already have an account? <a href="loginform.php">Login</a></span>
					</div>
				</div>
			</div>
		</div>
	</div>