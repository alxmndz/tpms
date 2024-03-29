<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../assets/icons/team_icon/admin.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/dashboard.css">
    <link rel="stylesheet" href="../../css/status.css">
    <link rel="stylesheet" href="../../css/datatable.css">
    <link rel="stylesheet" href="../../css/datatables.min.css">
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <title>Admin - Tuy Parish Management System</title>
</head>
<body>
<?php
include_once '../../php/dbconn.php';
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['uname']) && isset($_SESSION['name'])){
  $id = $_SESSION['id'];
  $email = $_SESSION['email'];
  $sql=mysqli_query($conn,"SELECT profile FROM users WHERE id = '$id'");
  $img = mysqli_fetch_assoc($sql);
  $userIMG = $img['profile'];
?>
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
            <a class="nav-link nav-link-custom active" href="#" data-bs-toggle="collapse" data-bs-target="#walkIn-reserve">
                <i class="fas fa-caret-down"></i> Walk-In Reservations
            </a>
            <div class="collapse" id="walkIn-reserve">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="baptismal.php"> Baptismal</a></li>
                    <li class="nav-item"><a class="nav-link" href="blessing.php"> Blessing</a></li>
					<li class="nav-item"><a class="nav-link" href="communion.php"> Communion</a></li>
                    <li class="nav-item"><a class="nav-link" href="confirmation.php"> Confirmation</a></li>
					<li class="nav-item"><a class="nav-link" href="funeralmass.php"> Funeral Mass</a></li>
                    <li class="nav-item nav-link-custom active"><a class="nav-link" href="wedding.php"> Wedding</a></li>
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
                    <li class="nav-item"><a class="nav-link" href="../online/baptismal.php"> Baptismal</a></li>
                    <li class="nav-item"><a class="nav-link" href="../online/blessing.php"> Blessing</a></li>
					<li class="nav-item"><a class="nav-link" href="../online/communion.php"> Communion</a></li>
                    <li class="nav-item"><a class="nav-link" href="../online/confirmation.php"> Confirmation</a></li>
					<li class="nav-item"><a class="nav-link" href="../online/funeralmass.php"> Funeral Mass</a></li>
                    <li class="nav-item"><a class="nav-link" href="../online/wedding.php"> Wedding</a></li>
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
                                include_once '../../php/dbconn.php';
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
				<img src="../../assets/profile/<?php echo $_SESSION['profile']; ?>" class="profile">
				<div class="dropdown-content">
					<a href="../profile.php">Profile <i class="fas fa-user" style="float: right;"></i></a>
					<a href="../../php/logout.php">Logout <i class="fas fa-power-off" style="float: right;"></i></a>
				</div>
			</div>
		</div>
    </header>
    <h3 class="fw-bold">Welcome <?php echo $_SESSION['uname']; ?></h3>
    <div class="row">
        <div class="col-md-6">
            <p><span class="text-muted">Admin > Walk-In ></span> Wedding </p>
        </div>
        <div class="col-md-6 text-end"> <!-- Use 'text-end' class to align text to the right -->
            <div class="ms-auto">
            <div class="status-dropdown btn-group">
                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="statusDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Filter by Status
                </button>
                <ul class="dropdown-menu" aria-labelledby="statusDropdown">
                  <li><a class="dropdown-item filter-btn" data-status="all" href="#">All</a></li>
                  <li><a class="dropdown-item filter-btn" data-status="Approved" href="#">Approved</a></li>
                  <li><a class="dropdown-item filter-btn" data-status="Disapprove, mismatch files" href="#">Disapprove</a></li>
                  <li><a class="dropdown-item filter-btn" data-status="In Process" href="#">In Process</a></li>
                  <li><a class="dropdown-item filter-btn" data-status="Reserved" href="#">Reserved</a></li>
                </ul>
          </div>
        </div>
    </div>

    <div class="container-fluid" id="accounts">
        <table id="example" class="display responsive nowrap table" style="width:100%">
        <?php
            include_once '../../php/dbconn.php';
            $result = mysqli_query($conn, "SELECT * FROM wedding_tbl WHERE transactType = 'Walk-In' ORDER BY id DESC;");
            // Create an array to store the requirements from the database
            $databaseRequirements = array();
            $dataFromDatabase = [
                'Birth Certificate',   // Assume this data is retrieved from the database
                'Parents Marriage Contract',
                'Confirmation Certificate',
                'Certificate of No Marriage',
                '2x2 Pictures for Marriage Bann',
                'Marriage License',
                '3R Size Pictures'
                // Add other data items as needed
            ];
            if (mysqli_num_rows($result) > 0) {
          ?>
            <thead class="thead-dark">
                <tr class="align-middle">
                    <th>Groom</th>
                    <th>Bride</th>
                    <th>Transaction Date</th>
                    <th>Reserved Date</th>
                    <th>Reserved Time</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
              $i = 0;
              while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td class="align-middle"><?php echo $row["groom"]; ?></td>
                    <td class="align-middle"><?php echo $row["bride"]; ?></td>
                    <td class="align-middle"><?php echo date("M d, Y", strtotime($row["transactDate"])); ?></td>
                    <td class="align-middle"><?php echo date("M d, Y", strtotime($row["wdate"])); ?></td>
                    <td class="align-middle"><?php echo date("h:i A", strtotime($row["resTime"])); ?></td>
                    <td class="align-middle">
                        <span class="status-badge <?php echo getStatusColorClass($row['status']); ?>">
                        <?php echo $row["status"]; ?>
                        </span>
                    </td>
                    <td class="align-middle"><button class="update-btn" data-bs-toggle="modal" data-bs-target="#update<?php echo $row['id']; ?>"><i class="fas fa-pen"></i></button></td>
                </tr>

<div class="modal modal-lg fade" id="update<?php echo $row['id']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title fw-bold text-uppercase">Update Reservation</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Left Side (Image) -->
                        <div class="col-md-6">
                            <img src="receipt/<?php echo $row['receipt']; ?>" alt="Receipt" class="img-fluid">
                        </div>

                        <!-- Right Side (Form) -->
                        <div class="col-md-6">
                    <form action="../../php/reservation/update-wedd.php" method="post" enctype="multipart/form-data" autocomplete="off">
                      <div class="form-group">
                          <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">
                        </div>
                             <div class="row my-3">
                        <div class="col-md-6">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-user"></i> 
                                Groom's Name
                              </label>
                            <input class="form-control" type="text" id="groom" name="groom" value="<?php echo $row['groom']; ?>" required disabled/>
                          </div>
                        </div>

                        <div class="col-md-6">
                           <div class="form-outline">
                               <label class="form-label" for="typeText">
                                <i class="fa-solid fa-user"></i> 
                                Bride's Name
                               </label>
                            <input class="form-control" type="text" id="bride" name="bride" value="<?php echo $row['bride']; ?>" required disabled/>
                          </div>
                        </div>
                      </div>

                      <div class="row my-3">
                        <div class="col-md-6">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-phone"></i> 
                                Groom's Contact
                              </label>
                            <input class="form-control" type="tel" id="gContact" name="gContact" value="<?php echo $row['gContact']; ?>" required disabled/>
                          </div>
                        </div>

                        <div class="col-md-6">
                           <div class="form-outline">
                               <label class="form-label" for="typeText">
                                <i class="fa-solid fa-phone"></i> 
                                Bride's Contact
                               </label>
                            <input class="form-control" type="tel" id="bContact" name="bContact" value="<?php echo $row['bContact']; ?>" required disabled/>
                          </div>
                        </div>
                      </div>

                      <div class="row my-3">
                        <div class="col-md-6">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-home"></i> 
                                Groom's Address
                              </label>
                            <input class="form-control" type="text" id="gAddress" name="gAddress" value="<?php echo $row['gAddress']; ?>" required disabled/>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-home"></i> 
                                Bride's Address
                              </label>
                            <input class="form-control" type="text" id="bAddress" name="bAddress" value="<?php echo $row['bAddress']; ?>" required disabled/>
                          </div>
                        </div>
                      </div>

                      <div class="row my-3">
                        <div class="col-md-12">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-box-open"></i>
                                Package
                              </label>
                            <select class="form-select" id="package" name="package" required disabled>
                              <option value="Package 1" <?php echo ($row['package'] === 'Package 1') ? 'selected' : ''; ?>>Package 1</option>
                              <option value="Package 2" <?php echo ($row['package'] === 'Package 2') ? 'selected' : ''; ?>>Package 2</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="row my-3">
                        <div class="col-md-12">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                Does both of you are baptize?
                              </label>
                            <select class="form-select" id="intention" name="intention" required disabled>
                              <option disabled selected>Select an option</option>
                              <option value="Yes" <?php echo ($row['intention'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                              <option value="No" <?php echo ($row['intention'] === 'No') ? 'selected' : ''; ?>>No</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="row my-3">
                        <div class="col-md-6">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-calendar"></i>
                                Reserved Date
                              </label>
                            <input type="date" class="form-control" id="wdate" name="wdate" value="<?php echo $row['wdate']; ?>" required disabled/>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-clock"></i>
                                Reserved Time
                              </label>
                            <select class="form-select" id="resTime" name="resTime" required disabled>
                                            <option selected disabled>Select a time</option>
                                            <option value="08:00 AM" <?php echo ($row['resTime'] === '08:00 AM') ? 'selected' : ''; ?>>8:00 AM</option>
                                            <option value="08:30 AM" <?php echo ($row['resTime'] === '08:30 AM') ? 'selected' : ''; ?>>8:30 AM</option>
                                            <option value="09:00 AM" <?php echo ($row['resTime'] === '09:00 AM') ? 'selected' : ''; ?>>9:00 AM</option>
                                            <option value="09:30 AM" <?php echo ($row['resTime'] === '09:30 AM') ? 'selected' : ''; ?>>9:30 AM</option>
                                            <option value="10:00 AM" <?php echo ($row['resTime'] === '10:00 AM') ? 'selected' : ''; ?>>10:00 AM</option>
                                            <option value="10:30 AM" <?php echo ($row['resTime'] === '10:30 AM') ? 'selected' : ''; ?>>10:30 AM</option>
                                            <option value="11:00 AM" <?php echo ($row['resTime'] === '11:00 AM') ? 'selected' : ''; ?>>11:00 AM</option>
                                            <option value="11:30 AM" <?php echo ($row['resTime'] === '11:30 AM') ? 'selected' : ''; ?>>11:30 AM</option>
                                            <option value="11:00 AM" <?php echo ($row['resTime'] === '12:00 AM') ? 'selected' : ''; ?>>11:00 AM</option>
                                            <option value="11:30 AM" <?php echo ($row['resTime'] === '12:30 AM') ? 'selected' : ''; ?>>11:30 AM</option>
                                            <option value="11:00 AM" <?php echo ($row['resTime'] === '1:00 AM') ? 'selected' : ''; ?>>11:00 AM</option>
                                            <option value="11:30 AM" <?php echo ($row['resTime'] === '1:30 AM') ? 'selected' : ''; ?>>11:30 AM</option>
                                            <option value="11:00 AM" <?php echo ($row['resTime'] === '2:00 AM') ? 'selected' : ''; ?>>11:00 AM</option>
                                            <option value="11:30 AM" <?php echo ($row['resTime'] === '2:30 AM') ? 'selected' : ''; ?>>11:30 AM</option>
                                            <option value="11:00 AM" <?php echo ($row['resTime'] === '3:00 AM') ? 'selected' : ''; ?>>11:00 AM</option>
                                        </select>
                          </div>
                        </div>
                      </div>

                            <div class="text-center">
                                <span class="modal-header mb-2 text-center"><strong>Baptismal Requirements</strong></span>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="birthCertificate" name="birthCert" value="Birth Certificate" <?php echo ($row['birthCert'] === 'Birth Certificate') ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="birthCertificate">Birth Certificate</label>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="bapCert" name="bapCert" value="Baptismal Certificate" <?php echo ($row['bapCert'] === 'Baptismal Certificate') ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="bapCert">Baptismal Certificate</label>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="conCert" name="conCert" value="Confirmation Certificate" <?php echo ($row['conCert'] === 'Confirmation Certificate') ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="conCert">Confirmation Certificate</label>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="cenomar" name="cenomar" value="Certificate of No Marriage" <?php echo ($row['cenomar'] === 'Certificate of No Marriage') ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="cenomar">Certificate of No Marriage</label>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="marriageLicense" name="marriageLicense" value="Marriage License" <?php echo ($row['marriageLicense'] === 'Marriage License') ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="marriageLicense">Marriage License</label>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="RPic" name="RPic" value="3R Size Pictures" <?php echo ($row['RPic'] === '3R Size Pictures') ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="RPic">3R Size Pictures</label>
                                </div>
                                </div>
                                <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="MBPic" name="MBPic" value="2x2 Pictures for Marriage Bann" <?php echo ($row['MBPic'] === '2x2 Pictures for Marriage Bann') ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="MBPic">2x2 Pictures for Marriage Bann</label>
                                </div>
                                </div>
                            </div>

                    <div class="row my-3">
                        <div class="col-md-6">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-money-bill-1-wave"></i>
                                Amount
                              </label>
                            <input type="number" class="form-control" value="<?php echo $row['amount']; ?>" required disabled />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-barcode"></i>
                                Reference No.
                              </label>
                            <input type="number" class="form-control" id="refNum" name="refNum" value="<?php echo $row['refNum']; ?>" required disabled />
                          </div>
                        </div>
                      </div>

                      <div class="row my-3">
                        <div class="col-md-12">
                          <div class="form-outline">
                            <label class="form-label" for="typeText"><i class="fa-solid fa-chart-simple"></i> Status</label>
                            <select class="form-select" id="status" name="status" required>
                              <option value="Approved" <?php echo ($row['status'] === 'Approved') ? 'selected' : ''; ?>>Approved</option>

                              <option value="In Process" <?php echo ($row['status'] === 'In Process') ? 'selected' : ''; ?>>In Process</option>
                              
                              <option value="Reserved" <?php echo ($row['status'] === 'Reserved') ? 'selected' : ''; ?>>Reserved</option>

                              <option value="Disapprove, mismatch files" <?php echo ($row['status'] === 'Disapprove, mismatch files') ? 'selected' : ''; ?>>Disapprove, mismatch files</option>
                            </select>
                          </div>
                        </div>
                      </div>

                        <div class="form-group mb-2">             
                          <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Update</button>  
                        </div>                      
                    </form>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
                <?php
                    $i++;
                }
                ?>
                <?php
                } else {
                    echo "No result found";
                }
                ?>
            </tbody>
        </table>
    </div>
           
</div>

</div>
<?php 
  } else {
    header("Location: ../../login.php");
    exit();
  }
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../js/jquery-3.6.0.min.js"></script>
    <script src="../../js/datatables.min.js"></script>
    <script src="../../js/pdfmake.min.js"></script>
    <script src="../../js/vfs_fonts.js"></script>

    <script>
      $(document).ready(function(){
    
          var table = $('#example').DataTable({
          });
          
          table.buttons().container()
          .appendTo('#example_wrapper .col-md-6:eq(0)');

          $('.filter-btn').on('click', function () {
            var status = $(this).data('status');

            // Use a switch statement to handle each status separately
            switch (status) {
              case 'all':
                // Show all rows if 'All' is selected
                table.column(5).search('').draw();
                break;
              default:
                // Show rows based on the selected status
                table.column(5).search(status).draw();
                break;
            }
          });

      });
    </script>
<?php
function getStatusColorClass($status) {
    switch ($status) {
        case 'Approved':
            return 'status-approved';
        case 'In Process':
            return 'status-in-process';
        case 'Disapprove, mismatch files':
            return 'status-disapproved';
        case 'Ready to pick up':
            return 'status-pickUp';
        case 'Released':
            return 'status-released';
        case 'Reserved':
            return 'status-reserved';
        default:
            return ''; // Default style for other statuses
    }
}
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php 
    if(isset($_SESSION['alert'])){
        $value = $_SESSION['alert'];
        if($value == "success"){
            $message = $_SESSION['message'];
            echo "
            <script type='text/javascript'>
                swal({
                    title: 'Success!',
                    text: '$message',
                    icon: 'success'
                });
            </script>";
        } elseif($value == "error"){
            $message = $_SESSION['message'];
            echo "
            <script type='text/javascript'>
                swal({
                    title: 'Error!',
                    text: '$message',
                    icon: 'error'
                });
            </script>";
        }
        // Clear the session alert and message after displaying
        unset($_SESSION['alert']);
        unset($_SESSION['message']);
    }
    ?>
    <script type="text/javascript">
    function limitDigits(input) {
    if (input.value.length > 11) {
        input.value = input.value.substring(0, 11);
    }
    }
    </script>
</body>
</html>
