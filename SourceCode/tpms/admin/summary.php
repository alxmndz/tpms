<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/icons/team_icon/admin.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/summary.css">
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
                        <li class="nav-item"><a class="nav-link" href="charts.php"><i class="fas fa-pie-chart"></i> Charts Summary</a></li>
                        <li class="nav-item nav-link-custom active"><a class="nav-link" href="summary.php"><i class="fas fa-table"></i> Report Summary</a></li>
                        <li class="nav-item"><a class="nav-link" href="donation-sum.php"><i class="fas fa-heart-pulse"></i> Donation Summary</a></li>
                        <!-- Add more items as needed -->
                    </ul>
                </div>
            </li>
        </ul>
    </div>

<div id="content">
    <header class="no-print">
        <img src="../assets/icons/system/menus.png" class="menu-bar">
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
    <h3 class="fw-bold no-print">Welcome <?php echo $_SESSION['uname']; ?></h3>
    <div class="row no-print">
        <div class="col-md-6">
            <p><span class="text-muted">Admin > Reports ></span> Report Summary</p>
        </div>
        <div class="col-md-6 text-end"> <!-- Use 'text-end' class to align text to the right -->
        <?php
        date_default_timezone_set('Asia/Manila');
        $manilaTime = date('F j, Y ');
        ?>
            <p><?php echo $manilaTime; ?></p>
        </div>
        <?php 
          $defaultMonth = date("m");
          $defaultYear = date("Y");
        ?>
    </div>
    <?php include "../chart-data/otherData/janReservedList.php"; ?>
    <?php include "../chart-data/otherData/febReservedList.php"; ?>
    <?php include "../chart-data/otherData/marReservedList.php"; ?>
    <?php include "../chart-data/otherData/aprReservedList.php"; ?>
    <?php include "../chart-data/otherData/mayReservedList.php"; ?>
    <?php include "../chart-data/otherData/junReservedList.php"; ?>
    <?php include "../chart-data/otherData/julReservedList.php"; ?>
    <?php include "../chart-data/otherData/augReservedList.php"; ?>
    <?php include "../chart-data/otherData/sepReservedList.php"; ?>
    <?php include "../chart-data/otherData/octReservedList.php"; ?>
    <?php include "../chart-data/otherData/novReservedList.php"; ?>
    <?php include "../chart-data/otherData/decReservedList.php"; ?>
    <?php include "../chart-data/otherData/totalReservedList.php"; ?>
    
    <div class="container-fluid" id="accounts">
            <div class="ms-auto mb-2 no-print">
             <form method="get">
                <div class="row">
                  <div class="col-md-6">
                    <input name="selectedYear" id="barFilterDate" class="form-control mt-1" type="number" placeholder="Select Year" value="<?php echo $defaultYear; ?>">
                  </div>
                  <div class="col-md-6">
                    <button type="submit" class="btn btn-sm btn-primary mt-2">Apply</button>
                    <button class="btn btn-success btn-sm mt-2" onclick="printSummary()">Print</button>
                  </div>
                </div>
              </form>
           </div>
           <header class="for-printing">
                <h5 class="logo"><img src="../assets/icons/logo.png">Tuy Parish Management</h5>
            </header>
                  <table class="table">
                      <thead>
                          <tr>
                              <th>Month</th>
                              <th>Baptismal</th>
                              <th>Blessing</th>
                              <th>Communion</th>
                              <th>Confirmation</th>
                              <th>Funeral</th>
                              <th>Wedding</th>
                              <!-- Add more columns as needed -->
                          </tr>
                      </thead>
                      <tbody>
                      <?php
                            // Replace the sample data below with your actual data retrieval logic
                            $sampleData = [
                                ['January', $baptismCountJanuary, $blessingCountJanuary, $communionCountJanuary, $confirmationCountJanuary, $funeralMassCountJanuary, $weddingCountJanuary],
                                ['February', $baptismCountFeb, $blessingCountFeb, $communionCountFeb, $confirmationCountFeb, $funeralMassCountFeb, $weddingCountFeb],
                                ['March', $baptismCountMar, $blessingCountMar, $communionCountMar, $confirmationCountMar, $funeralMassCountMar, $weddingCountMar],
                                ['April', $baptismCountApr, $blessingCountApr, $communionCountApr, $confirmationCountApr, $funeralMassCountApr, $weddingCountApr],
                                ['May', $baptismCountMay, $blessingCountMay, $communionCountMay, $confirmationCountMay, $funeralMassCountMay, $weddingCountMay],
                                ['June', $baptismCountJun, $blessingCountJun, $communionCountJun, $confirmationCountJun, $funeralMassCountJun, $weddingCountJun],
                                ['July', $baptismCountJul, $blessingCountJul, $communionCountJul, $confirmationCountJul, $funeralMassCountJul, $weddingCountJul],
                                ['August', $baptismCountAug, $blessingCountAug, $communionCountAug, $confirmationCountAug, $funeralMassCountAug, $weddingCountAug],
                                ['September', $baptismCountSep, $blessingCountSep, $communionCountSep, $confirmationCountSep, $funeralMassCountSep, $weddingCountSep],
                                ['October', $baptismCountOct, $blessingCountOct, $communionCountOct, $confirmationCountOct, $funeralMassCountOct, $weddingCountOct],
                                ['November', $baptismCountNov, $blessingCountNov, $communionCountNov, $confirmationCountNov, $funeralMassCountNov, $weddingCountNov],
                                ['December', $baptismCountDec, $blessingCountDec, $communionCountDec, $confirmationCountDec, $funeralMassCountDec, $weddingCountDec],
                                ['<strong style="font-weight: bold;">Total</strong>', '<strong>' . $baptismCountSum . '</strong>', '<strong>' . $blessingCountSum . '</strong>', '<strong>' . $communionCountSum . '</strong>', '<strong>' . $confirmationCountSum . '</strong>', '<strong>' . $funeralMassCountSum . '</strong>', '<strong>' . $weddingCountSum . '</strong>'],
                                // Add more rows as needed
                            ];

                            foreach ($sampleData as $row) {
                                echo '<tr>';
                                foreach ($row as $cell) {
                                    echo '<td>' . $cell . '</td>';
                                }
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                  </table>
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

</div>
<?php 
  } else {
    header("Location: ../login.php");
    exit();
  }
?>
    <script>
        function printSummary() {
            window.print();
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
