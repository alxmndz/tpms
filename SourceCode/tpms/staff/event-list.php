<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/icons/team_icon/staff.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/datatable.css">
    <link rel="stylesheet" href="../css/datatables.min.css">
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <title>Staff - Tuy Parish Management System</title>
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
            <li class="nav-item nav-link-custom active">
                <a class="nav-link" href="event-list.php"><i class="fas fa-calendar-plus"></i> Event List</a>
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
                <a class="nav-link" href="donation.php"><i class="fas fa-heart-pulse"></i> Donation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="announcement.php"><i class="fas fa-bell"></i> Announcement</a>
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
            <p><span class="text-muted">Staff ></span> Event Lists</p>
        </div>
        <div class="col-md-6 text-end"> <!-- Use 'text-end' class to align text to the right -->
            <div class="ms-auto">
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#events"><i class="fas fa-pen"></i></button>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="accounts">
        <table id="example" class="display responsive nowrap table" style="width:100%">
          <?php
            include_once '../php/dbconn.php';
            $result = mysqli_query($conn, "SELECT * FROM eventlist ORDER BY id DESC;");  
            if (mysqli_num_rows($result) > 0) {
          ?>
            <thead class="thead-dark">
                <tr class="align-middle">
                    <th>Title</th>
                    <th>Event Date</th>
                    <th>Event Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
              $i = 0;
              while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td class="align-middle"><?php echo $row["title"]; ?></td>
                    <td class="align-middle"><?php echo date("M d, Y", strtotime($row["eventDate"])); ?></td>
                    <td class="align-middle"><?php echo date("h:i A", strtotime($row["eventTime"])); ?></td>
                    <td class="align-middle"><button class="update-btn" data-bs-toggle="modal" data-bs-target="#update<?php echo $row['id']; ?>"><i class="fas fa-pen"></i></button></td>
                </tr>

                <div class="modal fade" id="update<?php echo $row['id']; ?>">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h4>Event List Form</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form action="../php/events/update-event.php" method="POST" enctype="multipart/form-data" autocomplete="off">

                            <div class="row my-3">
                                <div class="col-md-12">
                                    <div class="form-outline">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <label class="form-label fw-bold" for="typeText">
                                        Event Title
                                        </label>
                                    <input class="form-control" type="text" id="evntTitle" name="evntTitle" value="<?php echo $row['title']; ?>" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row my-3">
                                <div class="col-md-6">
                                <div class="form-outline">
                                    <label class="form-label fw-bold" for="typeText">
                                        Event Date
                                    </label>
                                    <input class="form-control" type="date" name="eventDate" id="eventDate" value="<?php echo $row['eventDate']; ?>" required>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label fw-bold" for="typeText">
                                        Event Time
                                        </label>
                                        <input  class="form-control" type="time" name="eventTime" id="eventTime" value="<?php echo $row['eventTime']; ?>" required>
                                    </div>
                                    </div>
                                </div>

                                <div class="row my-3">
                                <div class="col-md-12">
                                    <div class="form-outline">
                                    <label class="form-label fw-bold" for="typeText">
                                        Description
                                        </label>
                                        <textarea class="form-control" id="description" name="description" required><?php echo $row['description']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Update</button>
                            </form>

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
                <div class="text-muted text-center">Copyright &copy; Tuy Parish 2023</div>
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

<?php include "modal/events.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/datatables.min.js"></script>
    <script src="../js/pdfmake.min.js"></script>
    <script src="../js/vfs_fonts.js"></script>

    <script>
        $(document).ready(function(){
        
            var table = $('#example').DataTable({
            });
            
            table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');

        });
        </script>
        <script>
            // Get the textarea element
            var textarea = document.getElementById('description');

            // Set its height to scrollHeight to fit the content
            textarea.style.height = (textarea.scrollHeight) + 'px';

            // Adjust the height when the content changes
            textarea.addEventListener('input', function () {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
            });
        </script>
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
