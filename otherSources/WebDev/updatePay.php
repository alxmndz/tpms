<?php
	include_once 'dbconn.php';
	if(count($_POST)>0) {
	mysqli_query($conn,"UPDATE user_register set  cname='" . $_POST['cname'] . "', cnum='" . $_POST['cnum'] . "', amount ='" . $_POST['amount'] . "', amount ='" . $_POST['amount'] ."', offer ='" . $_POST['offer'] . "' WHERE id='" . $_POST['id'] . "'");
		$message = "Record Modified Successfully";
		}
	$result = mysqli_query($conn,"SELECT * FROM user_register WHERE id='" . $_GET['id'] . "'");
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
										<input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">
										<input type="hidden" name="id"  lass="form-control" value="<?php echo $row['id']; ?>">
									</div>

								<div class="mb-3">
									<label><i class="fa-solid fa-user-pen"></i> G-Cash Customer Name:</label> 
									<input type="text" name="cname" id="cname" class="form-control" value="<?php echo $row['cname']; ?>">
								</div>

								<div class="mb-3">
									<label><i class="fa-solid fa-lock"></i> G-Cash Number:</label> 
									<input type="text" name="cnum" id="cnum" class="form-control" value="<?php echo $row['cnum']; ?>">
								</div>

								<div class="mb-3">
									<label><i class="fa-solid fa-user-gear"></i> Amount Price:</label> 
									<input type="text" name="amount" id="amount" class="form-control" value="<?php echo $row['amount']; ?>">
								</div>

								<div class="mb-3">
									<label><i class="fa-solid fa-user-gear"></i> Package Offer:</label> 
									<input type="text" name="offer" id="offer" class="form-control" value="<?php echo $row['offer']; ?>">
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