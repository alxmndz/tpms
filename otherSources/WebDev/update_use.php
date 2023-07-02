<?php
	include_once 'dbconn.php';
	if(count($_POST)>0) {
	mysqli_query($conn,"UPDATE users set  user_name='" . $_POST['user_name'] . "', password='" . $_POST['password'] . "', role ='" . $_POST['role'] . "' WHERE id='" . $_POST['id'] . "'");
		$message = "Record Modified Successfully";
		}
	$result = mysqli_query($conn,"SELECT * FROM users WHERE id='" . $_GET['id'] . "'");
	$row= mysqli_fetch_array($result);
?>

<html>
<head>
<title>Update Users Data</title>

	<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Open+Sans&family=Oswald:wght@500;600&family=Raleway:wght@400;500&family=Roboto&display=swap" rel="stylesheet">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		button{
			margin-left: 5px;
			float: right;
		}
		a{
			margin-left: 5px;
			float: right;
		}

		.alert {
		  padding: 20px;
		  background-color: #0096FF;
		  color: white;
		  opacity: 1;
		  transition: opacity 0.6s;
		  margin-bottom: 15px;
		}
		body{
			background: url('camera04.jpg');
			background-size: cover;
			background-repeat: no-repeat;
		}
	</style>
	</head>
	<body>
		<div class="container py-5 ">
			 <div class="row justify-content-center align-items-center h-90">
			  <div class="card container h-90" style="background: #f1f1f1;">
			  	<div class="card">
						<div class="card-body text-center">
							<div class="container">
									<form method="post" action="" >
									<div>
										<p class="alert">
											<?php if(isset($message)) { echo $message; } ?>
										</p>	
									</div>

								<div class="mb-3">
										<input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">
										<input type="hidden" name="id"  lass="form-control" value="<?php echo $row['id']; ?>">
									</div>

								<div class="mb-3">
									<label><i class="fa-solid fa-user-pen"></i> User Name:</label> 
									<input type="text" name="user_name" class="form-control" value="<?php echo $row['user_name']; ?>">
								</div>

								<div class="mb-3">
									<label><i class="fa-solid fa-lock"></i> Password:</label> 
									<input type="text" name="password" class="form-control" value="<?php echo $row['password']; ?>">
								</div>

								<div class="mb-3">
									<label><i class="fa-solid fa-user-gear"></i> Role:</label> 
									<input type="text" name="role" class="form-control" value="<?php echo $row['role']; ?>">
								</div>

									<a href="dashboard.php" class="button btn btn-danger">Return</a>

									<button type="submit" name="submit" value="Submit" class="btn btn-primary">Sumbit</button>
									
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</body>
</html>