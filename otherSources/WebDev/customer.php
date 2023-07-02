<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Oswald:wght@500;600&family=Roboto+Condensed&display=swap" rel="stylesheet">

	<style type="text/css">
		.ctn{
			border-radius: 30px;
			background: #D2B48C;
			border: none;
		}
		.nav-item:hover{
			background: #C4A484;
			color: whitesmoke;
		}

		.nav-item .ctn:hover{
			background: #C4A484;
			color: whitesmoke;
		}

		*{
			font-family: 'Poppins', sans-serif;
		}

		nav{
			background: #D2B48C;
		}
		.welcome .bgimg{
			background-image: url('camera06.jpg');
			height: 100%;
			background-position: center;
			background-size: cover;
			position: relative;
		}
		.welcome .middle{
			margin-top: 20px;
			color:#f1f1f1;
			text-align: center;
		}
		.welcome .middle .user_name{
			color: #87CEEB;
		}
		hr{
			margin: auto;
			width: 40%;
		}

		.btn-primary{
			border-radius: 30px;
			border: none;
			margin-top: 10px;
			margin-bottom: 50px;
		}
		.welcome .navbar-brand{
			color: #f1f1f1;
  		top: 0;
  		left: 16px;
  		margin-left: 15px;
  		font-size: 20px;
		}

		.tbl{
			background: #f1f1f1;
		}
		body{
			background: #EADDCA;
		}
		.profile {
			margin-top: 5px;
			margin-bottom: 5px;
			display: relative;
		}
		.row{
			background: #f1f1f1;
		}
		h3{
			color: #f1f1f1;
		}
		span{
			font-family: 'Oswald', sans-serif;
			margin-bottom: 5px;
		}
		.edit{
			background: #6F4E37;
			color: #f1f1f1;
		}
		.edit:hover{
			background: #5C4033;
		}
		.chng{
			background: #C4A484;
		}
		.chng:hover{
			background: #967969;
		}
		.card-img{
			border-radius: 30px;
			margin-top: 10px;
		}
		.card-body{
			margin-top: 20px;
		}
		.card{
			
		}
		a{
			color: #f1f1f1;
			text-decoration: none;
		}
		a:hover{
			color: #f1f1f1;
		}
 		.nav-link{
 			font-family: 'Roboto', sans-serif;
		}
	</style>
	<title>Customer Page</title>
	

</head>
<body>
	<nav class="navbar navbar-expand-lg">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#"><h3>Main Menu</h3></a>
	    <button 
	    class="navbar-toggler" 
	    type="button" 
	    data-bs-toggle="collapse" 
	    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" 
	    aria-label="Toggle navigation"
	    onclick="myFunction()"
	    >
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="#section_welcome">Home</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="#profile">Profile</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="#history">Reservation History</a>
	        </li>
	        <li class="nav-item">
	          <button class="ctn"><a href="logout.php" class="nav-link" onclick="myFunction1()">Log out</a></button>
	        </li>
	      </ul> 
	    </div>
	  </div>
	</nav>

	<!-- content -->
	<div class="container">
			<div id="section_welcome" class="welcome">
				<div class="bgimg">
					<div>
						<a class="navbar-brand"><i class="fa-solid fa-camera"></i> iKreate</a>
					</div>
					<div class="middle">
							<h1>Welcome, <span class="user_name"><?php echo $_SESSION['user_name']; ?></span></h1>
							<hr>
							<a href="reservation.php" class="btn btn-primary">Reservation</a>
						</div>
				</div>
			</div>



	<div id="profile" class="profile">
		<div>
			<table class="table table-dark table-bordered">
				<thead>
					<tr class="table-active">
						<th colspan="3" style="text-align: center;"><i class="fa-solid fa-user-pen"></i> Profile</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>ID No.</td>
						<td>Role</td>
						<td>Username</td>
					</tr>
				</tbody>
				<tbody>
					<tr class="table table-light">
						<td><?php echo $_SESSION['id']; ?></td>
						<td><?php echo $_SESSION['role']; ?></td>
						<td><?php echo $_SESSION['user_name']; ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	<?php
}else{
	header("Location: loginform.php");
	exit();
}
?>	          
	</div>


<?php
include_once 'dbconn.php';
$result = mysqli_query($conn,"SELECT * FROM user_register");
?>
<div id="history" class="history">
				<?php
						if (mysqli_num_rows($result) > 0) {
						?>
						<table class="table table-bordered">
							<tr class="table-dark">
								<td colspan="5" style="text-align: center;"><i class="fa-solid fa-clipboard-user"></i> History</td>
							</tr>
							<tr class="table-dark">
								<td scope="col">Reserved Date</td>
								<td scope="col">Reserved Time</td>
								<td scope="col">Customer Name</td>
								<td scope="col">Status</td>
								<td scope="col">Package No.</td>
							</tr>
								<?php
									$i=0;
									while($row = mysqli_fetch_array($result)) {
									?>
									 <tr class="table table-primary">
											<td><?php echo $row["res_date"]; ?></td>
											<td><?php echo $row["res_time"]; ?></td>
											<td><?php echo $row["custom_name"]; ?></td>
											<td><?php echo $row["status"]; ?></td>
											<td><?php echo $row["offer"]; ?></td>
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

	<script type="text/javascript">
		function myFunction(){
			var x = document.getElementById("navbarSupportedContent");
			if(x.style.display === "none") {
				x.style.display = "block";
			} else {
				x.style.display = "none";
			}
		}

	function myFunction1() {
  	var txt;
  if (confirm("Are you sure you want to leave?")) {
    txt =  location.replace("home.php")
  } else {
    txt = "";
  }
  document.getElementById("demo").innerHTML = txt;
}
	</script>
</body>
</html>