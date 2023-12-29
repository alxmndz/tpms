<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../assets/icons/team_icon/admin.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/dashboard.css">
    <title>Admin - Tuy Parish Management System</title>
</head>
<body>

<div id="sidebar">
    <h5 class="logo"><img src="../../assets/icons/logo.png">Tuy Parish Management</h5>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="../dashboard.php"><i class="fas fa-home"></i> Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../calendar.php"><i class="fas fa-calendar-days"></i> Calendar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../accounts.php"><i class="fas fa-users"></i> Accounts</a>
        </li>
		<li class="nav-item">
            <a class="nav-link" href="../reserve.php"><i class="fa-solid fa-user-pen"></i> Reservation</a>
        </li>
		<li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#cert">
                <i class="fas fa-caret-down"></i> Generate Certificate
            </a>
            <div class="collapse" id="cert">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="../certificate/bapGenCert.php"> Baptismal Certificate</a></li>
					<li class="nav-item"><a class="nav-link" href="../certificate/comGenCert.php"> Communion Certificate</a></li>
                    <li class="nav-item"><a class="nav-link" href="../certificate/conGenCert.php"> Confirmation Certificate</a></li>
                    <li class="nav-item"><a class="nav-link" href="../certificate/deathGenCert.php"> Death Certificate</a></li>
					<li class="nav-item"><a class="nav-link" href="../certificate/marriageGenCert.php"> Marriage Certificate</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#walkIn-reserve">
                <i class="fas fa-caret-down"></i> Walk-In Reservations
            </a>
            <div class="collapse" id="walkIn-reserve">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="../walk-in/baptismal.php"> Baptismal</a></li>
                    <li class="nav-item"><a class="nav-link" href="../walk-in/blessing.php"> Blessing</a></li>
					<li class="nav-item"><a class="nav-link" href="../walk-in/communion.php"> Communion</a></li>
                    <li class="nav-item"><a class="nav-link" href="../walk-in/confirmation.php"> Confirmation</a></li>
					<li class="nav-item"><a class="nav-link" href="../walk-in/funeralmass.php"> Funeral Mass</a></li>
                    <li class="nav-item"><a class="nav-link" href="../walk-in/wedding.php"> Wedding</a></li>
                    <!-- Add more items as needed -->
                </ul>
            </div>
        </li>
		<li class="nav-item">
            <a class="nav-link nav-link-custom active" href="#" data-bs-toggle="collapse" data-bs-target="#online-reserve">
                <i class="fas fa-caret-down"></i> Online Reservations
            </a>
            <div class="collapse" id="online-reserve">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="baptismal.php"> Baptismal</a></li>
                    <li class="nav-item"><a class="nav-link" href="blessing.php"> Blessing</a></li>
					<li class="nav-item"><a class="nav-link" href="communion.php"> Communion</a></li>
                    <li class="nav-item"><a class="nav-link" href="confirmation.php"> Confirmation</a></li>
					<li class="nav-item"><a class="nav-link nav-link-custom active" href="funeralmass.php"> Funeral Mass</a></li>
                    <li class="nav-item"><a class="nav-link" href="wedding.php"> Wedding</a></li>
                    <!-- Add more items as needed -->
                </ul>
            </div>
        </li>
		<li class="nav-item">
            <a class="nav-link" href="../request.php"><i class="fas fa-folder-open"></i> Request Certificates</a>
        </li>
		<li class="nav-item">
            <a class="nav-link" href="../pricing.php"><i class="fas fa-peso-sign"></i> Pricing</a>
        </li>
		<li class="nav-item">
            <a class="nav-link" href="../donation.php"><i class="fas fa-heart-pulse"></i> Donation</a>
        </li>
		<li class="nav-item">
            <a class="nav-link" href="../announcement.php"><i class="fas fa-bell"></i> Announcement</a>
        </li>
		<li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#reports-menu">
                <i class="fas fa-caret-down"></i> Reports
            </a>
            <div class="collapse" id="reports-menu">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="../charts.php"><i class="fas fa-pie-chart"></i> Charts Summary</a></li>
                    <li class="nav-item"><a class="nav-link" href="../summary.php"><i class="fas fa-table"></i> Report Summary</a></li>
					<li class="nav-item"><a class="nav-link" href="../donation-sum.php"><i class="fas fa-heart-pulse"></i> Donation Summary</a></li>
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
				<img src="../../assets/icons/team_icon/admin.png" class="profile">
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
            <p><span class="text-muted">Admin > Online ></span> Funeral Mass</p>
        </div>
        <div class="col-md-6 text-end"> <!-- Use 'text-end' class to align text to the right -->
            <p>December 21, 2023</p>
        </div>
    </div>
    
    <div class="container-fluid" id="accounts">
        <table id="example" class="display responsive nowrap table" style="width:100%">
            <thead class="thead-dark">
                <tr class="align-middle">
                    <th>Name</th>
                    <th>Contact Number</th>
                    <th>Transaction Date</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="align-middle">Name 1</td>
                    <td class="align-middle">Number</td>
                    <td class="align-middle">Date</td>
                    <td class="align-middle">1000</td>
                    <td class="align-middle"><button class="update-btn"><i class="fas fa-pen"></i></button></td>
                </tr>
                <tr>
                    <td class="align-middle">Name 2</td>
                    <td class="align-middle">Number</td>
                    <td class="align-middle">Date</td>
                    <td class="align-middle">1000</td>
                    <td class="align-middle"><button class="update-btn"><i class="fas fa-pen"></i></button></td>
                </tr>
                <tr>
                    <td class="align-middle">Name 3</td>
                    <td class="align-middle">Number</td>
                    <td class="align-middle">Date</td>
                    <td class="align-middle">1000</td>
                    <td class="align-middle"><button class="update-btn"><i class="fas fa-pen"></i></button></td>
                </tr>
                <!-- Add more rows as needed -->
                <tr>
                    <td class="align-middle">Name 4</td>
                    <td class="align-middle">Number</td>
                    <td class="align-middle">Date</td>
                    <td class="align-middle">1000</td>
                    <td class="align-middle"><button class="update-btn"><i class="fas fa-pen"></i></button></td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
</body>
</html>
