<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/icons/team_icon/admin.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/dashboard.css">
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
                <a class="nav-link" href="request.php"><i class="fas fa-folder-open"></i> Request Certificates</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-custom active" href="pricing.php"><i class="fas fa-peso-sign"></i> Pricing</a>
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
            <p><span class="text-muted">Admin ></span> Pricing</p>
        </div>
        <div class="col-md-6 text-end"> <!-- Use 'text-end' class to align text to the right -->
        <?php
		date_default_timezone_set('Asia/Manila');
		$manilaTime = date('F j, Y ');
		?>
            <p><?php echo $manilaTime; ?></p>
        </div>
    </div>
    <?php
    include_once '../php/dbconn.php';
    $result = mysqli_query($conn, "SELECT * FROM eventsprice");
    if (mysqli_num_rows($result) > 0) {
      $i = 0;
      while ($row = mysqli_fetch_array($result)) {
    ?>
    <div class="container-fluid" id="pricing">
        <div class="row justify-content-center">
            <!-- First Card -->
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body d-flex flex-column align-items-center">
                        <h2 class="card-title pricing-text">₱<?php echo number_format($row["baptismal"], 2); ?></h2>
                        <p class="card-text event-type">Baptismal</p>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateBap<?php echo $row['id']; ?>">Update</button>
                    </div>
                </div>
            </div>
    
            <!-- Second Card -->
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body d-flex flex-column align-items-center">
                        <h2 class="card-title pricing-text">₱<?php echo number_format($row["blessing"], 2); ?></h2>
                        <p class="card-text event-type">Blessing</p>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateBless<?php echo $row['id']; ?>">Update</button>
                    </div>
                </div>
            </div>
    
            <!-- Third Card -->
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body d-flex flex-column align-items-center">
                        <h2 class="card-title pricing-text">₱<?php echo number_format($row["cert"], 2); ?></h2>
                        <p class="card-text event-type">Certificates</p>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateCert<?php echo $row['id']; ?>">Update</button>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="row justify-content-center">
            <!-- Fourth Card -->
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body d-flex flex-column align-items-center">
                        <h2 class="card-title pricing-text">₱<?php echo number_format($row["communion"], 2); ?></h2>
                        <p class="card-text event-type">Communion</p>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateCom<?php echo $row['id']; ?>">Update</button>
                    </div>
                </div>
            </div>
    
            <!-- Fifth Card -->
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body d-flex flex-column align-items-center">
                        <h2 class="card-title pricing-text">₱<?php echo number_format($row["confirmation"], 2); ?></h2>
                        <p class="card-text event-type">Confirmation</p>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateCon<?php echo $row['id']; ?>">Update</button>
                    </div>
                </div>
            </div>
    
            <!-- Sixth Card -->
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body d-flex flex-column align-items-center">
                        <h2 class="card-title pricing-text">₱<?php echo number_format($row["funeralmass"], 2); ?></h2>
                        <p class="card-text event-type">Funeral Mass</p>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateFun<?php echo $row['id']; ?>">Update</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Seventh Card -->
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body d-flex flex-column align-items-center">
                        <h2 class="card-title pricing-text">₱<?php echo number_format($row["wedding"], 2); ?></h2>
                        <p class="card-text event-type">Wedding</p>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateWedd<?php echo $row['id']; ?>">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateBap<?php echo $row['id']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title fw-bold">Baptismal Price</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <form id="updateForm" action="../php/pricing/baptismal.php" autocomplete="off" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">
                        <input type="number" class="form-control" id="baptismal" name="baptismal" value="<?php echo $row['baptismal']; ?>" required>
                    </div>
                </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Update</button>
            </div>
            </form>

            </div>
        </div>
    </div>
    <div class="modal fade" id="updateBless<?php echo $row['id']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title fw-bold">Blessing Price</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <form id="updateForm" action="../php/pricing/blessing.php" autocomplete="off" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">
                        <input type="number" class="form-control" id="blessing" name="blessing" value="<?php echo $row['blessing']; ?>" required>
                    </div>
                </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Update</button>
            </div>
            </form>

            </div>
        </div>
    </div>
    <div class="modal fade" id="updateCert<?php echo $row['id']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title fw-bold">Certificate Price</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <form id="updateForm" action="../php/pricing/certificate.php" autocomplete="off" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">
                        <input type="number" class="form-control" id="cert" name="cert" value="<?php echo $row['cert']; ?>" required>
                    </div>
                </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Update</button>
            </div>
            </form>

            </div>
        </div>
    </div>
    <div class="modal fade" id="updateCom<?php echo $row['id']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title fw-bold">Communion Price</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <form id="updateForm" action="../php/pricing/communion.php" autocomplete="off" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">
                        <input type="number" class="form-control" id="communion" name="communion" value="<?php echo $row['communion']; ?>" required>
                    </div>
                </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Update</button>
            </div>
            </form>

            </div>
        </div>
    </div>
    <div class="modal fade" id="updateCon<?php echo $row['id']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title fw-bold">Confirmation Price</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <form id="updateForm" action="../php/pricing/confirmation.php" autocomplete="off" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">
                        <input type="number" class="form-control" id="confirmation" name="confirmation" value="<?php echo $row['confirmation']; ?>" required>
                    </div>
                </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Update</button>
            </div>
            </form>

            </div>
        </div>
    </div>
    <div class="modal fade" id="updateFun<?php echo $row['id']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title fw-bold">Funeral Mass Price</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <form id="updateForm" action="../php/pricing/funeralmass.php" autocomplete="off" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">
                        <input type="number" class="form-control" id="funeralmass" name="funeralmass" value="<?php echo $row['funeralmass']; ?>" required>
                    </div>
                </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Update</button>
            </div>
            </form>

            </div>
        </div>
    </div>
    <div class="modal fade" id="updateWedd<?php echo $row['id']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title fw-bold">Wedding Price</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <form id="updateForm" action="../php/pricing/wedding.php" autocomplete="off" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">
                        <input type="number" class="form-control" id="wedding" name="wedding" value="<?php echo $row['wedding']; ?>" required>
                    </div>
                </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Update</button>
            </div>
            </form>

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
