<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../assets/icons/team_icon/staff.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/dashboard.css">
    <link rel="stylesheet" href="../../css/status.css">
    <link rel="stylesheet" href="../../css/datatable.css">
    <link rel="stylesheet" href="../../css/datatables.min.css">
    <title>Staff - Tuy Parish Management System</title>
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
            <a class="nav-link" href="../event-list.php"><i class="fas fa-calendar-plus"></i> Event List</a>
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
            <a class="nav-link  nav-link-custom active" href="#" data-bs-toggle="collapse" data-bs-target="#online-reserve">
                <i class="fas fa-caret-down"></i> Online Reservations
            </a>
            <div class="collapse" id="online-reserve">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="baptismal.php"> Baptismal</a></li>
                    <li class="nav-item"><a class="nav-link" href="blessing.php"> Blessing</a></li>
					<li class="nav-item"><a class="nav-link" href="communion.php"> Communion</a></li>
                    <li class="nav-item nav-link-custom active"><a class="nav-link" href="confirmation.php"> Confirmation</a></li>
					<li class="nav-item"><a class="nav-link" href="funeralmass.php"> Funeral Mass</a></li>
                    <li class="nav-item"><a class="nav-link" href="wedding.php"> Wedding</a></li>
                    <!-- Add more items as needed -->
                </ul>
            </div>
        </li>
		<li class="nav-item">
            <a class="nav-link" href="../request.php"><i class="fas fa-folder-open"></i> Request Certificates</a>
        </li>
		<li class="nav-item">
            <a class="nav-link" href="../donation.php"><i class="fas fa-heart-pulse"></i> Donation</a>
        </li>
		<li class="nav-item">
            <a class="nav-link" href="../announcement.php"><i class="fas fa-bell"></i> Announcement</a>
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
            <p><span class="text-muted">Staff > Online ></span> Confirmation</p>
        </div>
        <div class="col-md-6 text-end"> <!-- Use 'text-end' class to align text to the right -->
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
    
    <div class="container-fluid" id="accounts">
        <table id="example" class="display responsive nowrap table" style="width:100%">
        <?php
            include_once '../../php/dbconn.php';
            $result = mysqli_query($conn, "SELECT * FROM confirmation_tbl WHERE transactType != 'Walk-In' ORDER BY id DESC;");
            if (mysqli_num_rows($result) > 0) {
          ?>
            <thead class="thead-dark">
                <tr class="align-middle">
                    <th>Name</th>
                    <th>Contact Number</th>
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
                    <td class="align-middle"><?php echo $row["name"]; ?></td>
                    <td class="align-middle"><?php echo $row["contact"]; ?></td>
                    <td class="align-middle"><?php echo date("M d, Y", strtotime($row["transactDate"])); ?></td>
                    <td class="align-middle"><?php echo date("M d, Y", strtotime($row["conDate"])); ?></td>
                    <td class="align-middle"><?php echo date("h:i A", strtotime($row["conTime"])); ?></td>
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
                <h4 class="modal-title">Update Reservation</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Left Side (Image) -->
                        <div class="col-md-6">
                        <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="receipt/<?php echo $row['receipt']; ?>" alt="Image 1" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="upload/bapCert/<?php echo $row['bapCert']; ?>" alt="Image 2" class="d-block w-100">
                                </div>
                            </div>

                            <!-- Add carousel controls -->
                            <a class="carousel-control-prev" href="#imageCarousel" role="button" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="false"></span>
                                <span class="visually-hidden">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#imageCarousel" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="false"></span>
                                <span class="visually-hidden">Next</span>
                            </a>
                        </div>
                    </div>

                        <!-- Right Side (Form) -->
                        <div class="col-md-6">
                    <form action="php/updateCon.php" method="post" enctype="multipart/form-data" autocomplete="off">
                      <div class="form-group">
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
                                      <input class="form-control" type="text" id="address" name="address" value="<?php echo $row['address']; ?>" required disabled>
                                  </div>
                              </div>
                          </div>
                          <div class="row my-3">
                            <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-calendar"></i>Confirmation Date</label>
                                      <input class="form-control" type="date" id="conDate" name="conDate" value="<?php echo $row['conDate']; ?>" required disabled>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                   <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-clock"></i>Confirmation Time</label>
                                      <select class="form-select" id="conTime" name="conTime" required disabled>
                                            <option selected disabled>Select a time</option>
                                            <option value="08:00 AM" <?php echo ($row['conTime'] === '08:00 AM') ? 'selected' : ''; ?>>8:00 AM</option>
                                            <option value="08:30 AM" <?php echo ($row['conTime'] === '08:30 AM') ? 'selected' : ''; ?>>8:30 AM</option>
                                            <option value="09:00 AM" <?php echo ($row['conTime'] === '09:00 AM') ? 'selected' : ''; ?>>9:00 AM</option>
                                            <option value="09:30 AM" <?php echo ($row['conTime'] === '09:30 AM') ? 'selected' : ''; ?>>9:30 AM</option>
                                            <option value="10:00 AM" <?php echo ($row['conTime'] === '10:00 AM') ? 'selected' : ''; ?>>10:00 AM</option>
                                            <option value="10:30 AM" <?php echo ($row['conTime'] === '10:30 AM') ? 'selected' : ''; ?>>10:30 AM</option>
                                            <option value="11:00 AM" <?php echo ($row['conTime'] === '11:00 AM') ? 'selected' : ''; ?>>11:00 AM</option>
                                        </select>
                                  </div>
                            </div>
                          </div>
                          <div class="row my-3">
                              <div class="col-md-12">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"> Description</label>
                                      <input class="form-control" type="number" id="description" name="description" value="<?php echo $row['description']; ?>" required disabled>
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
                          <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Save Changes</button>  
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
</body>
</html>
