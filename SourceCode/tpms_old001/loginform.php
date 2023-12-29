<?php include "lnsheader.php"; ?>
<body>
	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<a href="home.php"><i class="fa-solid fa-circle-arrow-left"></i></a>
						<h4 class="text-center">Login Form</h4>
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
								<label for="uname" class="form-label"><i class="fa-solid fa-user"></i> Username</label>
								<input class="form-control" type="text" id="uname" name="uname" placeholder="Enter your username" required>
							</div>
							<div class="mb-3">
								<label for="password" class="form-label"><i class="fa-solid fa-unlock"></i> Password</label>
								<input class="form-control" type="password" id="password" name="password" placeholder="Enter your password" required>
							</div>
							
							<button type="submit" class="btn btn-success" style="float: right; margin-right: 10px;"><i class="fa-solid fa-key"></i> Login</button>

						</form>
					</div>
					<div class="card-footer text-center">
						<span>Don't have account yet? <a href="signupform.php">Signup</a></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>