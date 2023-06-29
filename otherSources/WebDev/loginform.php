<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Oswald:wght@500;600&family=Roboto+Condensed&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="loginstyle.css">

	<style type="text/css">
		.form-container{
			border-radius: 50px;
		}
		.card{
			box-shadow: 5px 10px;
		}
	</style>
</head>
<body style="background-image: url('sample10.jpg'); background-size: cover; background-repeat: no-repeat;">
	<div>
			<form action="login.php" method="post">
				<h4 style="font-family: 'Roboto', sans-serif; text-align: center;">Login</h4><hr>
				<?php if (isset($_GET['error'])) { ?>
					<p class="error"><?php echo $_GET['error']?></p>
				<?php } ?>
				<small><i class="fa-regular fa-user"></i> Username</small>
				<input type="text" name="uname" placeholder="Enter Username"><br>

				<small><i class="fa-solid fa-lock-open"></i> Password</small>
				<input type="password" name="password" placeholder="Enter Password"><br>

				<button type="submit" class="btn">Login</button>

				<a href="signup.php" class="ca">Create a new account?</a>

				<a href="home.php" class="ca">Return</a>
			</form>
			</div>
		</div>
	</div>

</body>
</html>