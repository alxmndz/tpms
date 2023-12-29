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
				<img src="../assets/icons/team_icon/admin.png" class="profile">
				<div class="dropdown-content">
					<a href="#">Profile <i class="fas fa-user" style="float: right;"></i></a>
					<a href="#">Logout <i class="fas fa-power-off" style="float: right;"></i></a>
				</div>
			</div>
		</div>
    </header>
    <h3 class="fw-bold">Welcome User</h3>
    <div class="row">
        <div class="col-md-6">
            <p><span class="text-muted">Admin ></span> Home</p>
        </div>
        <div class="col-md-6 text-end"> <!-- Use 'text-end' class to align text to the right -->
            <p>December 21, 2023</p>
        </div>
    </div>
    
    <div class="row counter-cards">
        <div class="col-md-4">
            <div class="card text-center"> <!-- Added 'text-center' class -->
                <div class="card-body d-flex flex-column align-items-center justify-content-center"> <!-- Added alignment classes -->
                    <img src="../assets/icons/system/certificate.png" class="dashboard-icon">
                    <div class="centered-text">
                        <h5>1000</h5>
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
                        <h5>1000</h5>
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
                        <h5>1000</h5>
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
				<p class="fw-bold text-center">Total Reservation for the Month of December</p>
			</div>
			<div class="card-body">
				<div class="reserved-stats">
					<div class="row">
						<div class="col-md-4 mb-2">
							<div class="event-card text-center">
								<div class="card-body d-flex flex-column align-items-center justify-content-center">
									<img src="../assets/icons/events/baptism.png" class="dashboard-icon mx-auto">
									<div class="centered-text">
										<h5>1000</h5>
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
										<h5>1000</h5>
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
										<h5>1000</h5>
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
										<h5>1000</h5>
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
										<h5>1000</h5>
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
										<h5>1000</h5>
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
									<thead>
										<tr>
											<th>Event Title</th>
											<th>Event Date</th>
											<th>Event Time</th>
										</tr>
									</thead>
									<tbody>
											<!-- Add your data rows here -->
											<tr>
												<td>Data 1</td>
												<td>Data 2</td>
												<td>Data 3</td>
											</tr>
											<tr>
												<td>Data 5</td>
												<td>Data 6</td>
												<td>Data 7</td>
											</tr>
											<tr>
												<td>Data 1</td>
												<td>Data 2</td>
												<td>Data 3</td>
											</tr>
											<tr>
												<td>Data 5</td>
												<td>Data 6</td>
												<td>Data 7</td>
											</tr>
									</tbody>
							</table>
					</div>
			</div>
						
		</div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
