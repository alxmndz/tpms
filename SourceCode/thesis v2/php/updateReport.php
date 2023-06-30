<?php
	include_once 'dbconn.php';
	if(count($_POST)>0) {
	mysqli_query($conn,"UPDATE reports set  reportTitle='" . $_POST['reportTitle'] . "', reportDate='" . $_POST['reportDate'] . "', reportTime ='" . $_POST['reportTime'] . "' , description ='" . $_POST['description'] . "'WHERE reportID='" . $_POST['reportID'] . "'");
		$message = "Record Modified Successfully";
		}
	$result = mysqli_query($conn,"SELECT * FROM reports WHERE reportID ='" . $_GET['reportID'] . "'");
	$row= mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<style type="text/css">
		button{
			margin-bottom: 10px;
		}
		a{
			margin-bottom: 10px;
		}
		body{
			background: url('camera02.jpg');
		}
		.alert {
		  padding: 20px;
		  background-color: #0096FF;
		  color: white;
		  opacity: 1;
		  transition: opacity 0.6s;
		  margin-bottom: 15px;
		  margin-top: 10px;
		}
	</style>
</head>
	<body>

		<section>
			   <div class="container py-5 ">
			     <div class="row justify-content-center align-items-center h-100">
			       <div class="card container h-100" style="background: #f1f1f1;">
		        	<div class="container">
								<form method="post" action="" >
								<div>
									<p class="alert">
										<?php if(isset($message)) { echo $message; } ?>
									</p>	
								</div>

								<div class="mb-3">
										<input type="hidden" name="reportID" class="form-control" value="<?php echo $row['reportID']; ?>">
										<input type="hidden" name="reportID"  lass="form-control" value="<?php echo $row['reportID']; ?>">
									</div>

								<div class="mb-3">
									<label><i class="fa-solid fa-user-pen"></i> Report Title:</label> 
									<input type="text" name="reportTitle" id="reportTitle" class="form-control" value="<?php echo $row['reportTitle']; ?>">
								</div>

								<div class="mb-3">
									<label><i class="fa-solid fa-lock"></i> Report Date:</label> 
									<input type="date" name="reportDate" id="reportDate" class="form-control" value="<?php echo $row['reportDate']; ?>">
								</div>

								<div class="mb-3">
									<label><i class="fa-solid fa-user-gear"></i> Time:</label> 
									<input type="time" name="reportTime" id="reportTime" class="form-control" value="<?php echo $row['reportTime']; ?>">
								</div>

								<div class="mb-3">
									<label><i class="fa-solid fa-user-gear"></i> Description:</label> 
									<textarea type="text" name="description" id="description" class="form-control" value="<?php echo $row['description']; ?>"></textarea>
								</div>

									<button type="submit" name="submit" value="Submit" class="btn btn-primary">Edit</button>

									<a href="dashboard.php" class="button btn btn-danger">Return</a>

								</form>
							</div>
			      </div>
			   </div>
			</div>
		</section>

	</body>
</html>