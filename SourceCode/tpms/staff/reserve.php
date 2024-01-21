<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/icons/team_icon/staff.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/reserve.css">
    <link rel="stylesheet" href="../css/cards.css">
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
            <li class="nav-item">
                <a class="nav-link" href="event-list.php"><i class="fas fa-calendar-plus"></i> Event List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  nav-link-custom active" href="reserve.php"><i class="fa-solid fa-user-pen"></i> Reservation</a>
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
            <p><span class="text-muted">Staff ></span> Reservation</p>
        </div>
        <div class="col-md-6 text-end"> <!-- Use 'text-end' class to align text to the right -->
        <?php
		date_default_timezone_set('Asia/Manila');
		$manilaTime = date('F j, Y ');
		?>
            <p><?php echo $manilaTime; ?></p>
        </div>
    </div>

    <div class="container-fluid" id="reservation">
        <h1 class="text-center text-uppercase" style="font-family: 'Poppins', sans-serif; font-weight: bolder;">Event Reservation</h1>
    <hr>
    <div class="row">
        <!-- Baptismal Card -->
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <img src="../assets/icons/events/baptism.png" class="card-img-top" alt="Image 1">
                <div class="card-body d-flex flex-column align-items-center">
                    <h3 class="card-title fw-bold reserve-title">Baptismal</h3>
                    <p class="card-text">Available Time: 8:00 am - 12:00 pm</p>
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#baptismal">Reserve</button>
                </div>
            </div>
        </div>
        
        <!-- Blessing Card -->
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <img src="../assets/icons/events/blessing.png" class="card-img-top" alt="Image 2">
                <div class="card-body d-flex flex-column align-items-center">
                    <h3 class="card-title fw-bold reserve-title">Blessing</h3>
                    <p class="card-text">Available Time: 8:00 am - 12:00 pm</p>
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#blessing">Reserve</button>
                </div>
            </div>
        </div>
        
        <!-- Communion Card -->
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <img src="../assets/icons/events/communion.png" class="card-img-top" alt="Image 3">
                <div class="card-body d-flex flex-column align-items-center">
                    <h3 class="card-title fw-bold reserve-title">Communion</h3>
                    <p class="card-text">Available Time: 8:30 am - 12:00 pm</p>
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#communion">Reserve</button>
                </div>
            </div>
        </div>
        
        <!-- Confirmation Card -->
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <img src="../assets/icons/events/confirmation.png" class="card-img-top" alt="Image 4">
                <div class="card-body d-flex flex-column align-items-center">
                    <h3 class="card-title fw-bold reserve-title">Confirmation</h3>
                    <p class="card-text">Available Time: 8:00 am - 12:00 pm</p>
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#confirmation">Reserve</button>
                </div>
            </div>
        </div>
        
        <!-- Funeral Card -->
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <img src="../assets/icons/events/funeral.png" class="card-img-top" alt="Image 5">
                <div class="card-body d-flex flex-column align-items-center">
                    <h3 class="card-title fw-bold reserve-title">Funeral Mass</h3>
                    <p class="card-text">Available Time: 8:00 am - 12:00 pm</p>
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#funeral">Reserve</button>
                </div>
            </div>
        </div>        

        <!-- Wedding Card -->
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <img src="../assets/icons/events/wedding.png" class="card-img-top" alt="Image 6">
                <div class="card-body d-flex flex-column align-items-center">
                    <h3 class="card-title fw-bold reserve-title">Wedding</h3>
                    <p class="card-text">Available Time: 7:00 am - 12:00 pm</p>
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#wedding">Reserve</button>
                </div>
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
<?php include "modal/baptismal.php"; ?>
<?php include "modal/blessing.php"; ?>
<?php include "modal/communion.php"; ?>
<?php include "modal/confirmation.php"; ?>
<?php include "modal/funeral.php"; ?>
<?php include "modal/wedding.php"; ?>
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
