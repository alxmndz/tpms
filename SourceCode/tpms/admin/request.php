<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/icons/team_icon/admin.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/status.css">
    <link rel="stylesheet" href="../css/datatable.css">
    <link rel="stylesheet" href="../css/datatables.min.css">
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
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
                <a class="nav-link nav-link-custom active" href="request.php"><i class="fas fa-folder-open"></i> Request Certificates</a>
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
					<a href="#">Profile <i class="fas fa-user" style="float: right;"></i></a>
					<a href="../php/logout.php">Logout <i class="fas fa-power-off" style="float: right;"></i></a>
				</div>
			</div>
		</div>
    </header>
    <h3 class="fw-bold">Welcome <?php echo $_SESSION['uname']; ?></h3>
    <div class="row">
        <div class="col-md-6">
            <p><span class="text-muted">Admin ></span> Request Certificate</p>
        </div>
        <div class="col-md-6 text-end"> <!-- Use 'text-end' class to align text to the right -->
            <div class="ms-auto">
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#request"> Request</button>
            <div class="status-dropdown btn-group">
                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="statusDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Filter by Status
                </button>
                <ul class="dropdown-menu" aria-labelledby="statusDropdown">
                <li><a class="dropdown-item filter-btn" data-status="all" href="#">All</a></li>
                <li><a class="dropdown-item filter-btn" data-status="Ready to pick up" href="#">Ready to pick up</a></li>
                <li><a class="dropdown-item filter-btn" data-status="Released" href="#">Released</a></li>
                <li><a class="dropdown-item filter-btn" data-status="In Process" href="#">In Process</a></li>
                </ul>
          </div>
        </div>
        </div>
    </div>

    <div class="container-fluid" id="accounts">
        <table id="example" class="display responsive nowrap table" style="width:100%">
        <?php
            include_once '../php/dbconn.php';
            $result = mysqli_query($conn, "SELECT * FROM request ORDER BY id DESC");
            if (mysqli_num_rows($result) > 0) {
          ?>
            <thead class="thead-dark">
                <tr class="align-middle">
                    <th>Name</th>
                    <th>Certificate Type</th>
                    <th>Transaction Date</th>
                    <th>Pickup Date</th>
                    <th>Released Date</th>
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
                    <td class="align-middle"><?php echo $row["name"]; ?></td>
                    <td class="align-middle"><?php echo $row["event"]; ?></td>
                    <td class="align-middle"><?php echo date("M d, Y", strtotime($row["transactDate"])); ?></td>
                    <td class="align-middle <?php echo ($row["whenToPickUp"] === null || $row["whenToPickUp"] === '0000-00-00'); ?>">
                        <?php
                            if ($row["whenToPickUp"] === null || $row["whenToPickUp"] === '0000-00-00') {
                                echo "No Pick Up Date Yet";
                            } else {
                                echo date("M d, Y", strtotime($row["whenToPickUp"]));
                            }
                        ?>
                    </td>
                    <td class="align-middle <?php echo ($row["pickUpDt"] === null || $row["pickUpDt"] === '0000-00-00'); ?>">
                        <?php
                            if ($row["pickUpDt"] === null || $row["pickUpDt"] === '0000-00-00') {
                                echo "No Release Date Yet";
                            } else {
                                echo date("M d, Y", strtotime($row["pickUpDt"]));
                            }
                        ?>
                    </td>
                    <td>
                        <span class="text-center status-badge <?php echo getStatusColorClass($row['status']); ?>">
                        <?php echo $row["status"]; ?>
                        </span>
                    </td>
                    <td class="align-middle"><button class="update-btn" data-bs-toggle="modal" data-bs-target="#update<?php echo $row['id']; ?>"><i class="fas fa-pen"></i></button></td>
                </tr>

                <div class="modal fade" id="update<?php echo $row['id']; ?>">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      
                      <div class="modal-header">
                        <h4 class="modal-title"><i class="fa-solid fa-chart-simple"></i> Update Request</h4>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>

                      <div class="modal-body">
                        <form class="" action="../php/request/admin-update.php" method="post" enctype="multipart/form-data" autocomplete="off">
                          <div class="row">
                            <!-- Left Side (Image) -->
                            <div class="col-md-6">
                                <!-- Add your image here -->
                                <img src="../assets/receipt/<?php echo $row['receipt']; ?>" alt="Your Image" class="img-fluid">
                            </div>
                            
                            <!-- Right Side (Input Fields) -->
                        <div class="col-md-6">
                            <div class="form-group">
                              <input type="date" name="pickUpDt" class="form-control" value="<?php echo date('Y-m-d'); ?>" style="display: none;">
                              <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">
                            </div>
                                  <div class="row my-3">
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <label class="form-label" for="typeText">
                                              <i class="fa-solid fa-user"></i> 
                                              Name
                                            </label>
                                          <input class="form-control" type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required disabled>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-outline">
                                          <label class="form-label" for="typeText">
                                            <i class="fa-solid fa-phone"></i> 
                                              Contact Number
                                          </label>
                              <input class="form-control" type="tel" id="contact" name="contact" value="<?php echo $row['contact']; ?>" required disabled>
                                      </div>
                                  </div>
                              </div>
                              <div class="row my-3">
                                <div class="col-md-12">
                                      <div class="form-outline">
                                          <label class="form-label" for="typeText"><i class="fa-solid fa-home"></i> Address</label>
                                          <select class="form-select" id="address" name="address" required disabled>
                                                <option value="Acle, Tuy, Batangas" <?php echo ($row['address'] === 'Acle, Tuy, Batangas') ? 'selected' : ''; ?>>Acle</option>
                                                <option value="Bayudbud, Tuy, Batangas" <?php echo ($row['address'] === 'Bayudbud, Tuy, Batangas') ? 'selected' : ''; ?>>Bayudbud</option>
                                                <option value="Bolboc, Tuy, Batangas" <?php echo ($row['address'] === 'Bolboc, Tuy, Batangas') ? 'selected' : ''; ?>>Bolboc</option>
                                                <option value="Dalima, Tuy, Batangas" <?php echo ($row['address'] === 'Dalima, Tuy, Batangas') ? 'selected' : ''; ?>>Dalima</option>
                                                <option value="Dao, Tuy, Batangas" <?php echo ($row['address'] === 'Dao, Tuy, Batangas') ? 'selected' : ''; ?>>Dao</option>
                                                <option value="Guinhawa, Tuy, Batangas" <?php echo ($row['address'] === 'Guinhawa, Tuy, Batangas') ? 'selected' : ''; ?>>Guinhawa</option>
                                                <option value="Lumbangan, Tuy, Batangas" <?php echo ($row['address'] === 'Lumbangan, Tuy, Batangas') ? 'selected' : ''; ?>>Lumbangan</option>
                                                <option value="Luntal, Tuy, Batangas" <?php echo ($row['address'] === 'Luntal, Tuy, Batangas') ? 'selected' : ''; ?>>Luntal</option>
                                                <option value="Magahis, Tuy, Batangas" <?php echo ($row['address'] === 'Magahis, Tuy, Batangas') ? 'selected' : ''; ?>>Magahis</option>
                                                <option value="Malibu, Tuy, Batangas" <?php echo ($row['address'] === 'Malibu, Tuy, Batangas') ? 'selected' : ''; ?>>Malibu</option>
                                                <option value="Mataywanac, Tuy, Batangas" <?php echo ($row['address'] === 'Mataywanac, Tuy, Batangas') ? 'selected' : ''; ?>>Mataywanac</option>
                                                <option value="Palincaro, Tuy, Batangas" <?php echo ($row['address'] === 'Palincaro, Tuy, Batangas') ? 'selected' : ''; ?>>Palincaro</option>
                                                <option value="Luna, Tuy, Batangas" <?php echo ($row['address'] === 'Luna, Tuy, Batangas') ? 'selected' : ''; ?>>Luna</option>
                                                <option value="Burgos, Tuy, Batangas" <?php echo ($row['address'] === 'Burgos, Tuy, Batangas') ? 'selected' : ''; ?>>Burgos</option>
                                                <option value="Rizal, Tuy, Batangas" <?php echo ($row['address'] === 'Rizal, Tuy, Batangas') ? 'selected' : ''; ?>>Rizal</option>
                                                <option value="Rillo, Tuy, Batangas" <?php echo ($row['address'] === 'Rillo, Tuy, Batangas') ? 'selected' : ''; ?>>Rillo</option>
                                                <option value="Putol, Tuy, Batangas" <?php echo ($row['address'] === 'Putol, Tuy, Batangas') ? 'selected' : ''; ?>>Putol</option>
                                                <option value="Sabang, Tuy, Batangas" <?php echo ($row['address'] === 'Sabang, Tuy, Batangas') ? 'selected' : ''; ?>>Sabang</option>
                                                <option value="San Jose, Tuy, Batangas" <?php echo ($row['address'] === 'San Jose, Tuy, Batangas') ? 'selected' : ''; ?>>San Jose</option>
                                                <option value="San Jose (Putic), Tuy, Batangas" <?php echo ($row['address'] === 'San Jose (Putic), Tuy, Batangas') ? 'selected' : ''; ?>>San Jose (Putic)</option>
                                                <option value="Talon, Tuy, Batangas" <?php echo ($row['address'] === 'Talon, Tuy, Batangas') ? 'selected' : ''; ?>>Talon</option>
                                                <option value="Toong, Tuy, Batangas" <?php echo ($row['address'] === 'Toong, Tuy, Batangas') ? 'selected' : ''; ?>>Toong</option>
                                                <option value="Tuyon-tuyon, Tuy, Batangas" <?php echo ($row['address'] === 'Tuyon-tuyon, Tuy, Batangas') ? 'selected' : ''; ?>>Tuyon-tuyon</option>
                                            </select>
                                        </div>
                                  </div>
                              </div>
                              <div class="row my-3">
                                  <div class="col-md-12">
                                      <div class="form-outline">
                                          <label class="form-label" for="typeText"><i class="fa-solid fa-calendar"></i> Event</label>
                                          <select class="form-select" id="event" name="event" required disabled>
                                            <option value="Baptismal Certificate" <?php echo ($row['event'] === 'Baptismal Certificate') ? 'selected' : ''; ?>>Baptismal Certificate</option>
                                            <option value="Communion Certificate" <?php echo ($row['event'] === 'Communion Certificate') ? 'selected' : ''; ?>>Communion Certificate</option>
                                            <option value="Confirmation Certificate" <?php echo ($row['event'] === 'Confirmation Certificate') ? 'selected' : ''; ?>>Confirmation Certificate</option>
                                            <option value="Death Certificate" <?php echo ($row['event'] === 'Death Certificate') ? 'selected' : ''; ?>>Death Certificate</option>
                                            <option value="Marriage Certificate" <?php echo ($row['event'] === 'Marriage Certificate') ? 'selected' : ''; ?>>Marriage Certificate</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                              <div class="row my-3">
                                  <div class="col-md-6">
                                      <div class="form-outline">
                                          <label class="form-label" for="typeText"><i class="fa-solid fa-money-bill-1-wave"></i> Amount Price</label>
                                          <input class="form-control" value="<?php echo $row['amount']; ?>" required disabled>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-outline">
                                          <label class="form-label" for="typeText"><i class="fa-solid fa-barcode"></i> Reference No.</label>
                                          <input class="form-control" type="number" id="refNum" name="refNum" value="<?php echo $row['refNum']; ?>" required disabled>
                                      </div>
                                  </div>
                              </div>

                              <div class="row my-3">
                                  <div class="col-md-6">
                                      <div class="form-outline">
                                          <label class="form-label" for="typeText">Pick Up Date</label>
                                          <input class="form-control" type="date" id="whenToPickUp" name="whenToPickUp" value="<?php echo $row['whenToPickUp']; ?>" disabled>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-outline">
                                          <label class="form-label" for="typeText">Released Date</label>
                                          <input class="form-control" type="date" id="pickUpDt" name="pickUpDt" value="<?php echo $row['pickUpDt']; ?>" disabled>
                                      </div>
                                  </div>
                              </div>
                              

                              <div class="row my-3">
                                <div class="col-md-12">
                                      <div class="form-outline">
                                        <label class="form-label" for="typeText"><i class="fa-solid fa-chart-simple"></i> Status</label>
                                          <select class="form-select" id="status" name="status" required>
                                              <option value="Ready to pick up" <?php echo ($row['status'] === 'Ready to pick up') ? 'selected' : ''; ?>>Ready to pick up</option>

                                              <option value="Released" <?php echo ($row['status'] === 'Released') ? 'selected' : ''; ?>>Released</option>

                                              <option value="In Process" <?php echo ($row['status'] === 'In Process') ? 'selected' : ''; ?> disabled>In Process</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>

                            <div class="form-group mb-2">             
                              <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Save Changes</button>  
                            </div>                      
                        </form>
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
<?php include "modal/req.php"; ?>
<?php 
  } else {
    header("Location: ../login.php");
    exit();
  }
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/datatables.min.js"></script>
    <script src="../js/pdfmake.min.js"></script>
    <script src="../js/vfs_fonts.js"></script>

<script>
  $(document).ready(function () {
    // DataTable initialization
    var table = $('#example').DataTable({
    });

    // Move buttons container
    table.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');

    // Status filter button click event
    $('.filter-btn').on('click', function () {
      var status = $(this).data('status');

      // Show all rows if 'All' is selected, otherwise filter by status
      table.column(5).search(status === 'all' ? '' : status).draw();

      // Show/hide columns based on the selected filter
      if (status === 'Ready to pick up') {
        table.column(3).visible(true);
        table.column(4).visible(false);
      } else if (status === 'Picked Up') {
        table.column(3).visible(false);
        table.column(4).visible(true);
      } else {
        table.column(3).visible(false);
        table.column(4).visible(false);
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
