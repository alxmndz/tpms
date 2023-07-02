<?php
include_once 'dbconn.php';
$result = mysqli_query($conn,"SELECT * FROM user_register");
?>
<!DOCTYPE html>
<html>
 <head>
   <title> Retrieve data</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<style type="text/css">
		a{
			color: #f1f1f1;
			text-decoration: none;
		}
		a:hover{
			color: #f1f1f1;
		}
		.card{
			border-radius: 20px;
			box-shadow: 5px 10px 8px #888888;
		}

	</style>

 </head>
<body>
<div class="container col-lg-8 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Reserved History</h4>
			<p class="card-description">sheesh</p>
			<div class="table-responsive">
				<?php
						if (mysqli_num_rows($result) > 0) {
						?>
						<table class="table table-bordered">
							  <tr class="table-dark">
								  <td scope="col">Reserved Date</td>
									<td scope="col">Reserved Time</td>
									<td scope="col">Customer Name</td>
							  </tr>
									<?php
									$i=0;
									while($row = mysqli_fetch_array($result)) {
									?>
							  	<tr class="table table-light">
									  <td><?php echo $row["res_date"]; ?></td>
										<td><?php echo $row["res_time"]; ?></td>
										<td><?php echo $row["custom_name"]; ?></td>
						      </tr>
									<?php
									$i++;
									}
									?>
						</table>

						<button class="btn btn-primary"><a href="customer.php">Return</a></button>
			</div>
		</div>
	</div>
</div>
 <?php
}
else
{
    echo "No result found";
}
?>
 </body>
</html>