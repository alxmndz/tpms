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
            <div class="d-flex justify-content-end">
                <!-- Notification bell icon -->
                <div class="notification-icon mt-2">
                    <div class="dropdown notification-bell">
                        <a href="#" class="text-black text-decoration-none position-relative" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <!-- Notification Bell Icon from Font Awesome -->
                            <i class="fas fa-bell"></i>
                            <!-- Notification Badge -->
                            <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">
                                <?php
                                include_once '../php/dbconn.php';
                                $result = mysqli_query($conn, "SELECT SUM(total_count) AS total FROM (
                                SELECT COUNT(*) AS total_count FROM baptismal_tbl WHERE transactType != 'Walk-In' AND status = 'In Process'
                                UNION ALL
                                SELECT COUNT(*) AS total_count FROM blessing_tbl WHERE transactType != 'Walk-In' AND status = 'In Process'
                                UNION ALL
                                SELECT COUNT(*) AS total_count FROM communion_tbl WHERE transactType != 'Walk-In' AND status = 'In Process'
                                UNION ALL
                                SELECT COUNT(*) AS total_count FROM confirmation_tbl WHERE transactType != 'Walk-In' AND status = 'In Process'
                                UNION ALL
                                SELECT COUNT(*) AS total_count FROM funeralmass_tbl WHERE transactType != 'Walk-In' AND status = 'In Process'
                                UNION ALL
                                SELECT COUNT(*) AS total_count FROM wedding_tbl WHERE transactType != 'Walk-In' AND status = 'In Process'
                                UNION ALL
                                SELECT COUNT(*) AS total_count FROM request WHERE transactType != 'Walk-In' AND status = 'In Process'
                                ) AS combined_counts");
                                $row = mysqli_fetch_assoc($result);
                                echo $row['total'];
                                ?>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown">
                            <?php
                    $combinedResults = array();

                    $query = "SELECT id, name, 'Baptismal' AS type FROM baptismal_tbl WHERE transactType != 'Walk-In' AND status = 'In Process'
                            UNION
                            SELECT id, name, 'Blessing' AS type FROM blessing_tbl WHERE transactType != 'Walk-In' AND status = 'In Process'
                            UNION
                            SELECT id, name, 'Communion' AS type FROM communion_tbl WHERE transactType != 'Walk-In' AND status = 'In Process'
                            UNION
                            SELECT id, name, 'Confirmation' AS type FROM confirmation_tbl WHERE transactType != 'Walk-In' AND status = 'In Process'
                            UNION
                            SELECT id, reqBy AS name, 'Funeral Mass' AS type FROM funeralmass_tbl WHERE transactType != 'Walk-In' AND status = 'In Process'
                            UNION
                            SELECT id, CONCAT(groom, ' and ', bride) AS name, 'Wedding' AS type FROM wedding_tbl WHERE transactType != 'Walk-In' AND status = 'In Process'
                            UNION
                            SELECT id, name, 'Certificate' AS type FROM request WHERE transactType != 'Walk-In' AND status = 'In Process'
                            ORDER BY id DESC LIMIT 6";

                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $combinedResults[] = array(
                            'id' => $row['id'],
                            'name' => $row['name'],
                            'type' => $row['type'],
                            // Add other relevant fields
                        );
                    }

                    // Sort combined results by id in descending order
                    usort($combinedResults, function ($a, $b) {
                        return $b['id'] - $a['id'];
                    });

                    if (!empty($combinedResults)) {
                        foreach ($combinedResults as $notification) {
                            ?>
                            <!-- Add your combined notification items here -->
                            <a class="dropdown-item" href="#">
                                <?php
                                // Display a customized message for certificate requests
                                if ($notification['type'] === 'Certificate') {
                                    echo $notification['name'] . ' has requested a ' . $notification['type'];
                                    // Add more details if needed
                                } else {
                                    // Display 'reqBy' instead of 'name' if the type is 'Funeral Mass'
                                    echo $notification['name'] . ' has requested a reservation (' . $notification['type'] . ')';
                                }
                                ?>
                            </a>
                            <!-- You can add more items or customize as needed -->
                            <?php
                        }
                    } else {
                        echo "<p class='dropdown-item'>No notifications found</p>";
                    }
                    ?>

                        </div>
                    </div>
                </div>
            </div>
        <div class="ms-auto">
			<div class="dropdown">
				<img src="../assets/profile/<?php echo $_SESSION['profile']; ?>" class="profile">
				<div class="dropdown-content">
					<a href="profile.php">Profile <i class="fas fa-user" style="float: right;"></i></a>
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
                                $statusCondition = "Released";

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
											<button class="btn btn-sm btn-success" onclick="viewAll()">
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
<script>
    function viewAll() {
        // Redirect to the desired page
        window.location.href = 'calendar.php';
    }
</script>
<?php 
  } else {
    header("Location: ../login.php");
    exit();
  }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
