<?php
	include_once 'dbconn.php';
	if(count($_POST)>0) {
	mysqli_query($conn,"UPDATE user_register set  res_date='" . $_POST['res_date'] . "', res_time='" . $_POST['res_time'] .  "', custom_name ='" . $_POST['custom_name'] .  "', status ='" . $_POST['status'] . "' WHERE id='" . $_POST['id'] . "'");
		$message = "Resevation Updated Successfully";
		}
	$result = mysqli_query($conn,"SELECT * FROM user_register WHERE id='" . $_GET['id'] . "'");
	$row= mysqli_fetch_array($result);
?>

<html>
<head>
<title>Update Reservation Data</title>

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
			background: url('camera01.jpg');
			background-size: cover;
			background-repeat: no-repeat;
		}
	</style>
	</head>
	<body>
		<div class="container py-5 ">
			 <div class="row justify-content-center align-items-center h-95">
			    <div class="card container h-95" style="background: #f1f1f1;">
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
										<label><i class="fa-solid fa-user-pen"></i> Reserved Date:</label> 
										<input type="date" name="res_date" id="res_date" class="form-control" value="<?php echo $row['res_date']; ?>">
									</div>

									<div class="mb-3">
										<label><i class="fa-solid fa-lock"></i> Reserved Time:</label> 
										<input type="text" name="res_time" id="res_time" class="form-control" value="<?php echo $row['res_time']; ?>">
									</div>

									<div class="mb-3">
										<label><i class="fa-solid fa-user-gear"></i> Customer Name:</label> 
										<input type="text" name="custom_name" id="custom_name" class="form-control" value="<?php echo $row['custom_name']; ?>">
									</div>

									<div class="mb-3">
										<label><i class="fa-solid fa-user-gear"></i> Status:</label> 									
											<select type="text" id="status" name="status" class="form-control" value="<?php echo $row['custom_name']; ?>">
											<option></option>
											<option>Approved</option>
											<option>Pending</option>
										</select>
									</div>

										<a href="dashboard.php" class="button btn btn-danger">Return</a>

										<button type="submit" name="submit" value="Submit" class="btn btn-primary">Edit</button>
										
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
	</body>
</html>