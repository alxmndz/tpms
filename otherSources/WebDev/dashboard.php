<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="dashstyle.css">

	<!-- bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

<!-- icon -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.2.1/line-awesome/css/line-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

	<script type="text/javascript" src="dash.js"></script>

	<title>Admin Page</title>

	<style type="text/css">
		.card-body{
			display: absolute;
		}
		td{
			text-align: center;
		}
		.btn{
			border-radius: 30px;
		}
		a{
			text-decoration: none;
		}
		.card{
		  border-radius: 5px;
		  max-width: 1000px;
		  background-color: red;
		}
		.cards {
		  display: inline-flex;
		  grid-template-columns: repeat(4, 1fr);
		  grid-gap: 2rem;
		  margin-top: 1rem;
		  max-width: 1000px;
		}
		.card-single{ 
		 display: flex; 
		 justify-content: space-between; 
		 background: red;
		 padding: 2rem; 
		 border-radius: 30px; 
		 box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
		 margin: 50px;
		}

		.cards .card-single:hover{
			background: #C4A484;
		}

		.card-single div:last-child span{
		  color: #f1f1f1;
		  font-size: 3rem;
		}
		.card-single div:first-child span {
		  color: #C2B280;
		  
		}
		.card-single:last-child{
		  background: #967969;		 
		}
		.card-single:first-child div:first-child span{
		  color: #f1f1f1; 
		}
		.card-single:last-child h1,
		.card-single:last-child div:last-child span{
		  color: #f1f1f1;
		}
		.cards span{
			color: #f1f1f1;
		}
	</style>

</head>
<body>
	<div class="tab_container">
		<div class="wrapper">
			<div class="sidebar">
				<!-- Admin personalized -->
				<div class="profile">
					<center>
						<img src="cypher.png" alt="">
					</center>
					<h3>Welcome</h3>
					<p><?php echo $_SESSION['user_name']; ?></p>
				</div>
				<?php }else{
				header("Location: loginform.php");
				exit();
			}
			?>	
					<!-- menu tabs -->
					<div class="sidebar-menu">
						<ul>
						<li>
							<button class="tablinks" onclick="openContent(event,'id')">
								<span class="icon"><i class="fa-solid fa-chart-simple"></i></span>
								<span>Status</span>
							</button>		
						</li>	
						<li>
							<button class="tablinks" onclick="openContent(event,'user')">
								<span class="icon"><i class="las la-user"></i></span>
								<span>User</span>
							</button>		
						</li>

						<li>
							<button class="tablinks" onclick="openContent(event,'reserve')">
								<span class="icon"><i class="las la-calendar-plus"></i></span>
								<span>Reservation</span>
							</button>		
						</li>

						<li>
							<button class="tablinks" onclick="openContent(event,'payment')">
								<span class="icon"><i class="las la-money-bill"></i></span>
								<span>Payment</span>
							</button>	
						</li>

						<li>
							<button class="tablinks" onclick="openContent(event,'receipts')">
								<span class="icon"><i class="fa-solid fa-image"></i></span>
								<span>Receipt</span>
							</button>	
						</li>

						<li>
								<a href="logout.php"><button class="tablinks" class="btn">
									<span class="icon"><i class="las la-times-circle"></i></span>
									<span>Exit</span>
								</button></a>
						</li>

					</ul>
					</div>

			</div>
			<!-- Top menu bar -->
			<div class="section">
				<div class="top_bar">
					<div class="hamburger">
						<a href="#"><i class="las la-bars"></i></a>
					</div>
				</div>
			</div>
		</div>


		<section>

			<div id="id" class="tabcontent container">
				<main>
					<div class="cards">
							<div class="card-single">
									<div>
										<span>
											<h5>Users</h5>
												<h5>
													<?php
															$conn = new mysqli("localhost","root","","ikreate");
																if ($conn->connect_error) {
																	die("Connection failed : " . $conn->connect_error);
																}
																	$sql = "SELECT COUNT(*) FROM users";
																	$result = $conn->query($sql);
																	while($row = mysqli_fetch_array($result)){
																	echo $row['COUNT(*)'];
																}
														?>
												</h5>
											</span>
										</div>
									<div>
								<span><i class="fa-solid fa-user"></i></span>
							</div>
						</div>
					</div>
					<div class="cards">
							<div class="card-single">
									<div>
										<span>
											<h5>Reservation</h5>
												<h5>
													<?php
															$conn = new mysqli("localhost","root","","ikreate");
																if ($conn->connect_error) {
																	die("Connection failed : " . $conn->connect_error);
																}
																	$sql = "SELECT COUNT(*) FROM user_register";
																	$result = $conn->query($sql);
																	while($row = mysqli_fetch_array($result)){
																	echo $row['COUNT(*)'];
																}
														?>
												</h5>
										</span>
										</div>
									<div>
								<span><i class="fa-solid fa-calendar"></i></span>
							</div>
						</div>
					</div>
					<div class="cards">
							<div class="card-single">
									<div>
										<span>
											<h5>Approved</h5>
												<h5>
													<?php
															$conn = new mysqli("localhost","root","","ikreate");
																if ($conn->connect_error) {
																	die("Connection failed : " . $conn->connect_error);
																}
																	$sql = "SELECT COUNT(*) FROM user_register WHERE status = 'Approved'";
																	$result = $conn->query($sql);
																	while($row = mysqli_fetch_array($result)){
																	echo $row['COUNT(*)'];
																}
														?>
												</h5></span>
										</div>
									<div>
								<span><i class="fa-solid fa-cart-shopping"></i></span>
							</div>
						</div>
					</div>
					<div class="cards">
							<div class="card-single">
									<div>
										<span>
											<h5>Paid</h5>
												<h5>
													<?php
															$conn = new mysqli("localhost","root","","ikreate");
																if ($conn->connect_error) {
																	die("Connection failed : " . $conn->connect_error);
																}
																	$sql = "SELECT COUNT(*) FROM user_register";
																	$result = $conn->query($sql);
																	while($row = mysqli_fetch_array($result)){
																	echo $row['COUNT(*)'];
																}
														?>
												</h5></span>
										</div>
									<div>
								<span><i class="fa-solid fa-credit-card"></i></span>
							</div>
						</div>
					</div>
					<div class="container">
						<?php
					include_once 'dbconn.php';
					$result = mysqli_query($conn,"SELECT * FROM user_register");
						if (mysqli_num_rows($result) > 0) {
					?>
					<table class="table">
						<tr class="table-dark">
							<td colspan="6" style="text-align: center;"><i class="fa-solid fa-clipboard-user"></i> Reservation History</td>
						</tr>
						<tr class="table-active">
							<td scope="col">Reserved Date</td>
							<td scope="col">Reserved Time</td>
							<td scope="col">Customer Name</td>
							<td scope="col">Contact Number</td>
							<td scope="col">Transaction</td>
							<td scope="col">Status</td>
						</tr>
						<?php
						$i=0;
						while($row = mysqli_fetch_array($result)) {
						?>
						<tr class="table table-light">
							<td><?php echo $row["res_date"]; ?></td>
							<td><?php echo $row["res_time"]; ?></td>
							<td><?php echo $row["custom_name"]; ?></td>
							<td><?php echo $row["contact"]; ?></td>
							<td><?php echo $row["transaction"]; ?></td>
							<td><?php echo $row["status"]; ?></td>
						</tr>
							<?php
								$i++;
								}
							?>
						</table>
				 <?php
				}
				else
				{
				    echo "No result found";
				}
				?>
					</div>
				</main>
			</div>
				<div class="container">
					<?php
						include_once 'dbconn.php';
						$result = mysqli_query($conn,"SELECT * FROM users");
						?>
						<div id="user" class="tabcontent">
							<?php
									if (mysqli_num_rows($result) > 0) {

							echo "<table class=table table-bordered>
											  <thead class= table-dark>
											  	<tr>
														<td scope= col >ID No.</td>
														<td scope= col >Username</td>
														<td scope= col >Role</td>
														<td colspan= 2 >Actions</td>
												</tr>
											</thead>";
									}
										$i=0;
										while($row = mysqli_fetch_array($result)) {
								?>
									<tbody>
									<tr>
										<td><?php echo $row['id']; ?></td>
										<td><?php echo $row['user_name']; ?></td>
										<td><?php echo $row['role']; ?></td>
										<td><a href="update_use.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-primary">Edit</button></a></td>
										<td><a href="delete_use.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-danger">Delete</button></a></td>
									</tr>
									<?php
										$i++;
										}
									?>
								</tbody>
							</table>
				</div>
			</div>

			<?php
			include_once 'dbconn.php';
			$result = mysqli_query($conn,"SELECT * FROM user_register");
			?>

			<div id="reserve" class="tabcontent">
			<?php
				if (mysqli_num_rows($result) > 0) {
			?>
			<table class="table table-bordered">
				<tr class="table-dark">
					<td colspan="6" style="text-align: center;"><i class="fa-solid fa-clipboard-user"></i> Reservation History</td>
				</tr>
				<tr class="table-dark">
					<td scope="col">Reserved Date</td>
					<td scope="col">Reserved Time</td>
					<td scope="col">Customer Name</td>
					<td scope="col">Status</td>
					<td scope="col" colspan="2">Actions</td>
				</tr>
				<?php
				$i=0;
				while($row = mysqli_fetch_array($result)) {
				?>
				<tr>
					<td><?php echo $row["res_date"]; ?></td>
					<td><?php echo $row["res_time"]; ?></td>
					<td><?php echo $row["custom_name"]; ?></td>
					<td><?php echo $row["status"]; ?></td>
					<td><a class="btn btn-primary" href="updateRes.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
					<td><a class="btn btn-danger" href="deleteRes.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
				</tr>
					<?php
						$i++;
						}
					?>
				</table>
		 <?php
		}
		else
		{
		    echo "No result found";
		}
		?>
			</div>

			<?php
			include_once 'dbconn.php';
			$result = mysqli_query($conn,"SELECT * FROM user_register");
			?>
			<div id="payment" class="tabcontent">
				<?php
					if (mysqli_num_rows($result) > 0) {
				?>
				<table class="table table-bordered">
					<tr class="table-dark">
						<td colspan="6" style="text-align: center;"><i class="fa-solid fa-clipboard-user"></i> Payment</td>
					</tr>
					<tr class="table-dark">
						<td scope="col">Name</td>
						<td scope="col">G-Cash Number</td>
						<td scope="col">Amount Price</td>
						<td scope="col">Package Offer</td>
						<td scope="col" colspan="2">Actions</td>
					</tr>
					<?php
					$i=0;
					while($row = mysqli_fetch_array($result)) {
					?>
					<tr>
						<td><?php echo $row["cname"]; ?></td>
						<td><?php echo $row["cnum"]; ?></td>
						<td><?php echo $row["amount"]; ?></td>
						<td><?php echo $row["offer"]; ?></td>
						<td><a class="btn btn-primary" href="updatePay.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
						<td><a class="btn btn-danger" href="deletePay.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
					</tr>
						<?php
							$i++;
							}
						?>
					</table>
			 <?php
			}
			else
			{
			    echo "No result found";
			}
			?>
			</div>

			<div id="receipts" class="tabcontent container">

				<table class="table table-light">
							<tr class="table table-dark">
							    <th>Receipt ID</th> 
							    <th>Receipt Name</th> 
							    <th>Receipt</th> 
							    <th>Date Uploaded</th> 
							    <th>Action</th>
							</tr>
							<tr>
								<?php
									$sql = " SELECT * FROM images";
									$result = mysqli_query($conn, $sql);

									    while($rows=mysqli_fetch_array($result))
									    {
										echo "<tr>";
											echo "<td>".$rows['id']."</td>";
											echo "<td>".$rows['file_name']."</td>";
										  echo "<td><img src='./images/".$rows['file_name']."'></td><br>";
										  echo "<td>".$rows['upload_on']."</td>";
											echo "<td><a class='btn btn-danger' href='deleteUpload.php?id=$rows[id]'>Delete</a></td>";
										echo "</tr>";
							    		}
								?>
							</tr>		
						</table>
			</div>

			
<!-- Scripting the animation for home page & switchable tab -->
	<script type="text/javascript">
		var hamburger = document.querySelector(".hamburger");
		hamburger.addEventListener("click", function(){
			document.querySelector("body").classList.toggle("active");
		})

	function openContent(evt, contentName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(contentName).style.display = "block";
  evt.currentTarget.className += " active";
	}

	for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = tabcontent[0];
  }

	</script>

</body>
</html>