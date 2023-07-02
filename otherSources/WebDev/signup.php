<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Signup Page</title>

	<link rel="stylesheet" type="text/css" href="loginstyle.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Oswald:wght@500;600&family=Roboto+Condensed&display=swap" rel="stylesheet">

	<style type="text/css">
		.card{
			box-shadow: 5px 10px #888888;
		}
		h4{
			font-family: 'Oswald', sans-serif;
		}
	</style>

</head>

	<body style="background: url('camera01.jpg'); background-size: cover; background-repeat: no-repeat;">
		<div>
			<form action="signup-check.php" method="post">
						<h4 style="text-align: center;"><i class="fa-solid fa-user-plus"></i> Sign Up</h4>
						<hr>
						<?php if (isset($_GET['error'])) { ?>
							<p class="error"><?php echo $_GET['error']?></p>
						<?php } ?>

						<?php if (isset($_GET['success'])) { ?>
							<p class="success"><?php echo $_GET['success']?></p>
						<?php } ?>

						<small><i class="fa-solid fa-file-signature"></i> Name</small>
						<?php if (isset($_GET['name'])) { ?>
							<input type="text" 
										name="name" 
							  		placeholder="Enter your Name"
							  		class="form-control" 
										value="<?php echo $_GET['name']; ?>">
						<?php }else{ ?>
							<input type="text" 				   
									name="name" 				   
									placeholder="Enter your Name"
									class="form-control">
						<?php }?>


						<small><i class="fa-solid fa-envelope"></i> Email</small>
						<?php if (isset($_GET['email'])) { ?>
							<input type="text" 
									name="email" 
									placeholder="Enter your Email"
									class="form-control" 
									value="<?php echo $_GET['email']; ?>">
						<?php }else{ ?>
							<input type="text" 				   
									name="email" 				   
									placeholder="Enter your Email"
									class="form-control">
						<?php }?>

						<small>Contact Number</small>
						<?php if (isset($_GET['contactNo'])) { ?>
							<input type="text" 
									name="contactNo" 
									placeholder="Enter your Contact Number"
									class="form-control" 
									value="<?php echo $_GET['contactNo']; ?>">
						<?php }else{ ?>
							<input type="text" 				   
									name="contactNo" 				   
									placeholder="Enter your Contact Number"
									class="form-control">
						<?php }?>

						<small><i class="fa-solid fa-user"></i> Username</small>
						<?php if (isset($_GET['uname'])) { ?>
							<input type="text" 
										 name="uname" 
										 placeholder="Enter your Username"
										 class="form-control"
										 value="<?php echo $_GET['uname']; ?>">
						<?php }else{ ?>
							<input type="text" 				   
									name="uname" 				   
									placeholder="Enter your Username"
									class="form-control">
						<?php }?>

						<small><i class="fa-solid fa-lock"></i> Password</small>
						<input type="password" 
								name="password" 
								placeholder="Enter your Password"
								class="form-control">

						<small><i class="fa-solid fa-key"></i> Confirm Password</small>
						<input type="password" 
							   name="re_password"
							   placeholder="Confirm Password"
							   class="form-control">

						<button type="submit" class="btn btn-primary" style="border-radius: 30px;">Sign Up</button>
						<a href="loginform.php" class="ca">Already have an account?</a>
						<a href="home.php" class="ca">Return</a>
			</form>
		</div>
	</body>
</html>