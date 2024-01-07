<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/icons/team_icon/admin.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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
                <a class="nav-link" href="dashboard.php"><i class="fas fa-home"></i> Home</a>
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
                <a class="nav-link nav-link-custom active" href="#" data-bs-toggle="collapse" data-bs-target="#reports-menu">
                    <i class="fas fa-caret-down"></i> Reports
                </a>
                <div class="collapse" id="reports-menu">
                    <ul class="nav flex-column">
                        <li class="nav-item nav-link-custom active"><a class="nav-link" href="charts.php"><i class="fas fa-pie-chart"></i> Charts Summary</a></li>
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
            <p><span class="text-muted">Admin > Reports ></span> Chart Reports</p>
        </div>
        <div class="col-md-6 text-end"> <!-- Use 'text-end' class to align text to the right -->
        <?php
		date_default_timezone_set('Asia/Manila');
		$manilaTime = date('F j, Y ');
		?>
            <p><?php echo $manilaTime; ?></p>
        </div>
    </div>
    <div>
        <button class="btn btn-primary" data-toggle="collapse" data-target="#barFilter">Filter &#9776;</button>
        <div id="barFilter" class="collapse">
            <input id="barFilterDate" class="form-control" type="text" placeholder="Select Date">
        </div>
    </div>

    <?php include "../chart-data/walkInReserve.php"; ?>
    <?php include "../chart-data/onlineReserve.php"; ?>
    <?php include "../chart-data/donationChart.php"; ?>
    <?php include "../chart-data/requestCert.php"; ?>
    <?php include "../chart-data/reservationList.php"; ?>
        <div class="row">
            <div class="col-md-6">
                <canvas id="walkInReserveChart" width="300" height="300"></canvas>
            </div>
            <div class="col-md-6">
                <canvas id="onlineReserveChart" width="300" height="300"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mt-3">
                <h2 class="text-center" style="text-transform: uppercase;">Total Reservation per Month</h2>
                <canvas id="reservedChart" width="300" height="300"></canvas>
            </div>
            <div class="col-md-6 mt-3">
                <h2 class="text-center" style="text-transform: uppercase;">Requests Certificate per Month</h2>
                <canvas id="barGraphCert" width="300" height="300"></canvas>
            </div>
        </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Initialize Flatpickr for date selection
    flatpickr("#barFilterDate", {
        mode: "single",
        dateFormat: "Y-m-d",
        onChange: function(selectedDates, dateStr) {
            // Update the bar graph when a date is selected
            updateBarGraph(dateStr);
        }
    });

    flatpickr("#onlineReserveFilterDate", {
        mode: "single",
        dateFormat: "Y-m-d",
        onChange: function(selectedDates, dateStr) {
            // Update the online reserve graph when a date is selected
            updateOnlineReserveGraph(dateStr);
        }
    });

    const labels = ['Baptismal', 'Blessing', 'Communion', 'Confirmation', 'Funeral', 'Wedding'];

    // Walk-In Reservation Chart Configuration
    const walkInDatasets = [{
        label: 'Walk-In Reservation',
        data: <?php echo json_encode($counts); ?>,
        backgroundColor: ['#30D1A7', '#30D1A7', '#30D1A7', '#30D1A7', '#30D1A7', '#30D1A7'],
        borderColor: ['#138D75', '#138D75', '#138D75', '#138D75', '#138D75', '#138D75'],
    }];

    const walkInConfig = {
        type: 'bar',
        data: {
            labels: labels,
            datasets: walkInDatasets
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: 'Walk-In Reservation Data Counts'
            },
            legend: {
                display: false,
            }
        }
    };

    // Online Reservation Chart Configuration
    const onlineReserveDatasets = [{
        label: 'Online Reservation',
        data: <?php echo json_encode($onlineCounts); ?>,
        backgroundColor: ['#36A2EB', '#36A2EB', '#36A2EB', '#36A2EB', '#36A2EB', '#36A2EB'],
        borderColor: ['#36A2EB', '#36A2EB', '#36A2EB', '#36A2EB', '#36A2EB', '#36A2EB'],
    }];

    const onlineReserveConfig = {
        type: 'bar',
        data: {
            labels: labels,
            datasets: onlineReserveDatasets
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: 'Online Reservation Data Counts'
            },
            legend: {
                display: false,
            }
        }
    };

    // Create Walk-In Reservation Chart
    const walkInChart = new Chart(
        document.getElementById('walkInReserveChart'),
        walkInConfig
    );

    // Create Online Reservation Chart
    const onlineReserveChart = new Chart(
        document.getElementById('onlineReserveChart'),
        onlineReserveConfig
    );

    // Function to update Walk-In Reservation Graph
    function updateBarGraph(dateStr) {
        // Your Walk-In Reservation graph update logic here
    }
    $(function () {
    const data = {
      labels: <?php echo json_encode(array_values($monthNames)); ?>,
      datasets: [
        {
          label: 'Baptism',
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 2,
          data: <?php echo json_encode($tableCounts['Baptism']); ?>,
        },
        {
          label: 'Blessing',
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          borderColor: 'rgba(255, 99, 132, 1)',
          borderWidth: 2,
          data: <?php echo json_encode($tableCounts['Blessing']); ?>,
        },
        {
          label: 'Communion',
          backgroundColor: 'rgba(54, 162, 235, 0.2)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 2,
          data: <?php echo json_encode($tableCounts['Communion']); ?>,
        },
        {
          label: 'Confirmation',
          backgroundColor: 'rgba(255, 206, 86, 0.2)',
          borderColor: 'rgba(255, 206, 86, 1)',
          borderWidth: 2,
          data: <?php echo json_encode($tableCounts['Confirmation']); ?>,
        },
        {
          label: 'Funeral Mass',
          backgroundColor: 'rgba(153, 102, 255, 0.2)',
          borderColor: 'rgba(153, 102, 255, 1)',
          borderWidth: 2,
          data: <?php echo json_encode($tableCounts['FuneralMass']); ?>,
        },
        {
          label: 'Wedding',
          backgroundColor: 'rgba(255, 159, 64, 0.2)',
          borderColor: 'rgba(255, 159, 64, 1)',
          borderWidth: 2,
          data: <?php echo json_encode($tableCounts['Wedding']); ?>,
        },
      ]
    };

    const config = {
      type: 'line',
      data: data,
      options: {
        responsive: true,
        scales: {
          x: {
            beginAtZero: true
          },
          y: {
            beginAtZero: true
          }
        }
      }
    };

    const lineChart = new Chart(
      document.getElementById('reservedChart'),
      config
    );
  });
</script>
<script type="text/javascript">
  $(function () {
      // Bar Chart Data
      var barChartData = {
        datasets: [
          {
            label: 'Certificates',
            data: <?php echo json_encode($requestCounts); ?>,
            backgroundColor: ['#16A085', '#3498DB', '#8E44AD', '#C0392B', '#DC7633'],
          },
        ],
        labels: ['Baptismal Certificate', 'Communion Certificate', 'Confirmation Certificate', 'Death Certificate', 'Marriage Certificate'],
      };

      var barChartOptions = {
        responsive: true,
        maintainAspectRatio: true,
        scales: {
          x: {
            stacked: true,
          },
          y: {
            stacked: true,
          }
        },
        legend: {
          display: false,
        },
      };

      var ctx_2 = document.getElementById('barGraphCert').getContext('2d');
      new Chart(ctx_2, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions,
      });
    });
</script>



    <footer class="py-4 mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Tuy Parish 2023</div>
                <div> 
            </div>
        </div>
    </footer>   
</div>

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
