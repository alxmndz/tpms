<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/icons/team_icon/admin.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>Admin - Tuy Parish Management System</title>
</head>
<body>
<?php
include_once '../php/dbconn.php';
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['uname']) && isset($_SESSION['name'])){
  $id = $_SESSION['id'];
  $email = $_SESSION['email'];
  $sql=mysqli_query($conn,"SELECT profile FROM users WHERE id = '$id'");
  $img = mysqli_fetch_assoc($sql);
  $userIMG = $img['profile'];
?>
<div id="sidebar">
    <h5 class="logo"><img src="../assets/icons/logo.png">Tuy Parish Management</h5>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link nav-link-custom active" href="dashboard.php"><i class="fas fa-home"></i> Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="calendar.php"><i class="fas fa-calendar-days"></i> Calendar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="accounts.php"><i class="fas fa-users"></i> Accounts</a>
        </li>
		<li class="nav-item">
            <a class="nav-link" href="reserve.php"><i class="fa-solid fa-user-pen"></i> Reservation</a>
        </li>
		<li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#cert">
                <i class="fas fa-caret-down"></i> Generate Certificate
            </a>
            <div class="collapse" id="cert">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="certificate/bapGenCert.php"> Baptismal Certificate</a></li>
					<li class="nav-item"><a class="nav-link" href="certificate/comGenCert.php"> Communion Certificate</a></li>
                    <li class="nav-item"><a class="nav-link" href="certificate/conGenCert.php"> Confirmation Certificate</a></li>
                    <li class="nav-item"><a class="nav-link" href="certificate/deathGenCert.php"> Death Certificate</a></li>
					<li class="nav-item"><a class="nav-link" href="certificate/marriageGenCert.php"> Marriage Certificate</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#walkIn-reserve">
                <i class="fas fa-caret-down"></i> Walk-In Reservations
            </a>
            <div class="collapse" id="walkIn-reserve">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="walk-in/baptismal.php"> Baptismal</a></li>
                    <li class="nav-item"><a class="nav-link" href="walk-in/blessing.php"> Blessing</a></li>
					<li class="nav-item"><a class="nav-link" href="walk-in/communion.php"> Communion</a></li>
                    <li class="nav-item"><a class="nav-link" href="walk-in/confirmation.php"> Confirmation</a></li>
					<li class="nav-item"><a class="nav-link" href="walk-in/funeralmass.php"> Funeral Mass</a></li>
                    <li class="nav-item"><a class="nav-link" href="walk-in/wedding.php"> Wedding</a></li>
                    <!-- Add more items as needed -->
                </ul>
            </div>
        </li>
		<li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#online-reserve">
                <i class="fas fa-caret-down"></i> Online Reservations
            </a>
            <div class="collapse" id="online-reserve">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="online/baptismal.php"> Baptismal</a></li>
                    <li class="nav-item"><a class="nav-link" href="online/blessing.php"> Blessing</a></li>
					<li class="nav-item"><a class="nav-link" href="online/communion.php"> Communion</a></li>
                    <li class="nav-item"><a class="nav-link" href="online/confirmation.php"> Confirmation</a></li>
					<li class="nav-item"><a class="nav-link" href="online/funeralmass.php"> Funeral Mass</a></li>
                    <li class="nav-item"><a class="nav-link" href="online/wedding.php"> Wedding</a></li>
                    <!-- Add more items as needed -->
                </ul>
            </div>
        </li>
		<li class="nav-item">
            <a class="nav-link" href="request.php"><i class="fas fa-folder-open"></i> Request Certificates</a>
        </li>
		<li class="nav-item">
            <a class="nav-link" href="pricing.php"><i class="fas fa-peso-sign"></i> Pricing</a>
        </li>
		<li class="nav-item">
            <a class="nav-link" href="donation.php"><i class="fas fa-heart-pulse"></i> Donation</a>
        </li>
		<li class="nav-item">
            <a class="nav-link" href="announcement.php"><i class="fas fa-bell"></i> Announcement</a>
        </li>
		<li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#reports-menu">
                <i class="fas fa-caret-down"></i> Reports
            </a>
            <div class="collapse" id="reports-menu">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="charts.php"><i class="fas fa-pie-chart"></i> Charts Summary</a></li>
                    <li class="nav-item"><a class="nav-link" href="summary.php"><i class="fas fa-table"></i> Report Summary</a></li>
					<li class="nav-item"><a class="nav-link" href="donation-sum.php"><i class="fas fa-heart-pulse"></i> Donation Summary</a></li>
                    <!-- Add more items as needed -->
                </ul>
            </div>
        </li>
    </ul>
</div>

<div id="content">
    <header>
        <img src="../assets/icons/system/menus.png" class="menu-bar">
        <div class="ms-auto">
			<div class="dropdown">
				<img src="../assets/profile/<?php echo $_SESSION['profile']; ?>" class="profile">
				<div class="dropdown-content">
					<a href="#">Profile <i class="fas fa-user" style="float: right;"></i></a>
					<a href="../php/logout.php">Logout <i class="fas fa-power-off" style="float: right;"></i></a>
				</div>
			</div>
		</div>
    </header>
    <h3 class="fw-bold">Welcome <?php echo $_SESSION['uname']; ?></h3>
    <div class="row">
        <div class="col-md-6">
            <p><span class="text-muted">Admin ></span> Home</p>
        </div>
        <div class="col-md-6 text-end"> <!-- Use 'text-end' class to align text to the right -->
		<?php
		date_default_timezone_set('Asia/Manila');
		$manilaTime = date('F j, Y ');
		?>
            <p><?php echo $manilaTime; ?></p>
        </div>
    </div>
    
    <div class="row counter-cards">
        <div class="col-md-4">
            <div class="card text-center"> <!-- Added 'text-center' class -->
                <div class="card-body d-flex flex-column align-items-center justify-content-center"> <!-- Added alignment classes -->
                    <img src="../assets/icons/system/certificate.png" class="dashboard-icon">
                    <div class="centered-text">
                        <h5>
						<?php
                                include "../php/dbconn.php";

                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // Get the current month and year
                                $currentMonth = date("m");
                                $currentYear = date("Y");

                                // Define the status condition
                                $statusCondition = "Ready to Pick Up";

                                // Construct the SQL query with the WHERE clause including the status condition
                                $sql = "SELECT COUNT(*) FROM request WHERE MONTH(transactDate) = $currentMonth AND YEAR(transactDate) = $currentYear AND status = '$statusCondition'";

                                $result = $conn->query($sql);

                                if ($result === false) {
                                    // Handle the query error
                                    echo "Error: " . $conn->error;
                                } else {
                                    // Fetch the result
                                    $row = $result->fetch_assoc();

                                    // Display the count
                                    echo $row['COUNT(*)'];
                                }

                                // Close the database connection
                                $conn->close();
                                ?>
						</h5>
                        <p>Requested Certificates</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center"> <!-- Added 'text-center' class -->
                <div class="card-body d-flex flex-column align-items-center justify-content-center"> <!-- Added alignment classes -->
                    <img src="../assets/icons/system/approve.png" class="dashboard-icon">
                    <div class="centered-text">
                        <h5>
						<?php
                    include "../php/dbconn.php";

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Get the current month and year
                    $currentMonth = date("m");
                    $currentYear = date("Y");

                    // Define the status condition
                    $statusCondition = "Approved";

                    // Construct the SQL queries with the WHERE clauses including the status condition
                    $sql = "SELECT COUNT(*) AS total FROM certbap WHERE MONTH(generatedDate) = $currentMonth AND YEAR(generatedDate) = $currentYear AND status = '$statusCondition'";
                    $sql1 = "SELECT COUNT(*) AS total FROM certcomm WHERE MONTH(generatedDate) = $currentMonth AND YEAR(generatedDate) = $currentYear AND status = '$statusCondition'";
                    $sql2 = "SELECT COUNT(*) AS total FROM certcon WHERE MONTH(generatedDate) = $currentMonth AND YEAR(generatedDate) = $currentYear AND status = '$statusCondition'";
                    $sql3 = "SELECT COUNT(*) AS total FROM certfun WHERE MONTH(generatedDate) = $currentMonth AND YEAR(generatedDate) = $currentYear AND status = '$statusCondition'";
                    $sql4 = "SELECT COUNT(*) AS total FROM certmarriage WHERE MONTH(generatedDate) = $currentMonth AND YEAR(generatedDate) = $currentYear AND status = '$statusCondition'";

                    // Execute the queries
                    $result = $conn->query($sql);
                    $result1 = $conn->query($sql1);
                    $result2 = $conn->query($sql2);
                    $result3 = $conn->query($sql3);
                    $result4 = $conn->query($sql4);

                    // Check for errors and display the results
                    if ($result && $result1 && $result2 && $result3 && $result4) {
                        $row = $result->fetch_assoc();
                        $sum = $row['total'];

                        $row1 = $result1->fetch_assoc();
                        $sum1 = $row1['total'];

                        $row2 = $result2->fetch_assoc();
                        $sum2 = $row2['total'];

                        $row3 = $result3->fetch_assoc();
                        $sum3 = $row3['total'];

                        $row4 = $result4->fetch_assoc();
                        $sum4 = $row4['total'];

                        // Calculate the total sum
                        $totalSum = $sum + $sum1 + $sum2 + $sum3 + $sum4;

                        // Display the total sum
                        echo $totalSum;
                    } else {
                        echo "Error: " . $conn->error;
                    }

                    // Close the database connection
                    $conn->close();
                    ?>
						</h5>
                        <p>Released Certificates</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center"> <!-- Added 'text-center' class -->
                <div class="card-body d-flex flex-column align-items-center justify-content-center"> <!-- Added alignment classes -->
                    <img src="../assets/icons/system/peso.png" class="dashboard-icon">
                    <div class="centered-text">
                        <h5>
						<?php
                            include"../php/dbconn.php";

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // Get the current month and year
                            $currentMonth = date("m");
                            $currentYear = date("Y");

                            // Construct the SQL query with the WHERE clause
                            $sql = "SELECT SUM(amount) AS total FROM donation WHERE MONTH(donatedDate) = $currentMonth AND YEAR(donatedDate) = $currentYear";

                            $result = $conn->query($sql);

                            if ($result) {
                                $row = $result->fetch_assoc();
                                $sum = $row['total'];

                                // Format the sum with a comma for thousands separator and a peso sign.
                                $formatted_sum = '₱' . number_format($sum, 2, '.', ',');

                                echo $formatted_sum;
                            } else {
                                echo "Error: " . $conn->error;
                            }

                            // Close the database connection
                            $conn->close();
                          ?>
						</h5>
                        <p>Total Donations</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3" id="reservation">
      <div class="row">
		<div class="card me-3 ms-5 col-md-6">
			<div class="card-header">
			<?php
			date_default_timezone_set('Asia/Manila');
			$manilaDate = date('F');
			?>
				<p class="fw-bold text-center">Total Reservation for the Month of <?php echo $manilaDate; ?></p>
			</div>
			<div class="card-body">
				<div class="reserved-stats">
					<div class="row">
						<div class="col-md-4 mb-2">
							<div class="event-card text-center">
								<div class="card-body d-flex flex-column align-items-center justify-content-center">
									<img src="../assets/icons/events/baptism.png" class="dashboard-icon mx-auto">
									<div class="centered-text">
										<h5>
										<?php
										include "../php/dbconn.php";

										// For Baptismal
										$sql = "SELECT COUNT(*) AS count FROM baptismal_tbl WHERE status = 'Reserved' AND MONTH(bapDate) = $currentMonth AND YEAR(bapDate) = $currentYear";
										$result = $conn->query($sql);

										if ($result) {
											$row = $result->fetch_assoc();
											echo $row['count'];
										} else {
											echo "Error: " . $conn->error;
										}
										?>
										</h5>
										<p>Baptismal</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 mb-2">
							<div class="event-card text-center">
								<div class="card-body d-flex flex-column align-items-center justify-content-center">
									<img src="../assets/icons/events/blessing.png" class="dashboard-icon mx-auto">
									<div class="centered-text">
										<h5>
										<?php
                                include "../php/dbconn.php";

                                // For Blessing
                                $sql = "SELECT COUNT(*) AS count FROM blessing_tbl WHERE status = 'Reserved' AND MONTH(blessDate) = $currentMonth AND YEAR(blessDate) = $currentYear";
                                $result = $conn->query($sql);

                                if ($result) {
                                    $row = $result->fetch_assoc();
                                    echo $row['count'];
                                } else {
                                    echo "Error: " . $conn->error;
                                }

                                // Close the database connection
                                $conn->close();
                                ?>
										</h5>
										<p>Blessing</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 mb-2">
							<div class="event-card text-center">
								<div class="card-body d-flex flex-column align-items-center justify-content-center">
									<img src="../assets/icons/events/communion.png" class="dashboard-icon mx-auto">
									<div class="centered-text">
										<h5>
										<?php
                                include "../php/dbconn.php";

                                // For Communion
                                $sql = "SELECT COUNT(*) AS count FROM communion_tbl WHERE status = 'Reserved' AND MONTH(comDate) = $currentMonth AND YEAR(comDate) = $currentYear";
                                $result = $conn->query($sql);

                                if ($result) {
                                    $row = $result->fetch_assoc();
                                    echo $row['count'];
                                } else {
                                    echo "Error: " . $conn->error;
                                }
                                ?>
										</h5>
										<p>Communion</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 mb-2">
							<div class="event-card text-center">
								<div class="card-body d-flex flex-column align-items-center justify-content-center">
									<img src="../assets/icons/events/confirmation.png" class="dashboard-icon mx-auto">
									<div class="centered-text">
										<h5>
										<?php
                                include "../php/dbconn.php";

                                // For Confirmation
                                $sql = "SELECT COUNT(*) AS count FROM confirmation_tbl WHERE status = 'Reserved' AND MONTH(conDate) = $currentMonth AND YEAR(conDate) = $currentYear";
                                $result = $conn->query($sql);

                                if ($result) {
                                    $row = $result->fetch_assoc();
                                    echo $row['count'];
                                } else {
                                    echo "Error: " . $conn->error;
                                }
                                ?>
										</h5>
										<p>Confirmation</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 mb-2">
							<div class="event-card text-center">
								<div class="card-body d-flex flex-column align-items-center justify-content-center">
									<img src="../assets/icons/events/funeral.png" class="dashboard-icon mx-auto">
									<div class="centered-text">
										<h5>
										<?php
                                include "../php/dbconn.php";

                                // For Funeral
                                $sql = "SELECT COUNT(*) AS count FROM funeralmass_tbl WHERE status = 'Reserved' AND MONTH(buryDate) = $currentMonth AND YEAR(buryDate) = $currentYear";
                                $result = $conn->query($sql);

                                if ($result) {
                                    $row = $result->fetch_assoc();
                                    echo $row['count'];
                                } else {
                                    echo "Error: " . $conn->error;
                                }
                                ?>
										</h5>
										<p>Funeral Mass</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 mb-2">
							<div class="event-card text-center">
								<div class="card-body d-flex flex-column align-items-center justify-content-center">
									<img src="../assets/icons/events/wedding.png" class="dashboard-icon mx-auto">
									<div class="centered-text">
										<h5>
										<?php
                                include "../php/dbconn.php";

                                // For Wedding
                                $sql = "SELECT COUNT(*) AS count FROM wedding_tbl WHERE status = 'Reserved' AND MONTH(wdate) = $currentMonth AND YEAR(wdate) = $currentYear";
                                $result = $conn->query($sql);

                                if ($result) {
                                    $row = $result->fetch_assoc();
                                    echo $row['count'];
                                } else {
                                    echo "Error: " . $conn->error;
                                }
                                ?>
										</h5>
										<p>Wedding</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>		
		
				<div class="card col-md-5">
					<div class="card-header">
							<div class="row">
									<p class="fw-bold col-md-8">Church Events</p>
									<div class="col-md-4 text-end">
											<button class="btn btn-sm btn-success">
													View All
											</button>
									</div>
							</div>
					</div>
					<div class="card-body">
							<table class="table">
							<?php
                                date_default_timezone_set('Asia/Manila');

                                // Get the current month and year in Manila timezone
                                $currentMonth = date('m');
                                $currentYear = date('Y');
                                
								include_once '../php/dbconn.php';
								$result = mysqli_query($conn, "SELECT * FROM eventlist WHERE MONTH(eventDate) = $currentMonth AND YEAR(eventDate) = $currentYear ORDER BY id DESC LIMIT 3;");  
								if (mysqli_num_rows($result) > 0) {
							?>
									<thead>
										<tr>
											<th>Event Title</th>
											<th>Date</th>
											<th>Time</th>
										</tr>
									</thead>
									<tbody>
									<?php
									$i = 0;
									while ($row = mysqli_fetch_array($result)) {
									?>
											<!-- Add your data rows here -->
											<tr>
												<td><?php echo $row['title']; ?></td>
												<td><?php echo date("M d, Y", strtotime($row["eventDate"])); ?></td>
												<td><?php echo date("h:i A", strtotime($row["eventTime"])); ?></td>
											</tr>
											<?php
												$i++;
											}
											?>
											<?php
											} else {
												echo "No events have been identified for this month.";
											}
											?>
									</tbody>
							</table>
					</div>
			</div>
						
		</div>
    </div>

	<footer class="py-4 mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Tuy Parish 2023</div>
                <div> 
            </div>
        </div>
    </footer>

</div>
<?php 
  } else {
    header("Location: ../login.php");
    exit();
  }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
