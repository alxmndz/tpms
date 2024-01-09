<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/icons/team_icon/admin.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/dist/calendar.css">
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
                <a class="nav-link nav-link-custom active" href="calendar.php"><i class="fas fa-calendar-days"></i> Calendar</a>
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
<header class="menu">
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
            <p><span class="text-muted">Admin ></span> Calendar</p>
        </div>
        <div class="col-md-6 text-end"> <!-- Use 'text-end' class to align text to the right -->
		<?php
		date_default_timezone_set('Asia/Manila');
		$manilaTime = date('F j, Y ');
		?>
            <p><?php echo $manilaTime; ?></p>
        </div>
    </div>
    <div id="container" class="calendar-container" style=".event-hour{display:none;}"></div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="../js/dist/jquery.simple-calendar.js"></script>
<?php
include_once '../php/dbconn.php';

// Initialize separate arrays for each type of event
$events = [];

// Fetch events from 'eventlist' table
$resultEventList = mysqli_query($conn, "SELECT * FROM eventlist;");

if (mysqli_num_rows($resultEventList) > 0) {
    while ($row = mysqli_fetch_array($resultEventList)) {
        $eventDate = $row['eventDate'];
        $eventTime = $row['eventTime'];
        $title = $row['title'];

        $currentDate = date('Y-m-d');
        $eventDate = date('Y-m-d', strtotime($eventDate));

        if ($eventDate < $currentDate) {
            continue; // Skip this event if the date has passed
        }

        $events[] = [
            'startDate' => date('Y-m-d', strtotime("$eventDate $eventTime")),
            'endDate' => date('Y-m-d H:i:s', strtotime("$eventDate $eventTime +1 hour")),
            'summary' => $title,
        ];
    }
}

// Fetch events from 'baptismal_tbl' table with status 'Reserved'
$resultBaptismal = mysqli_query($conn, "SELECT * FROM baptismal_tbl WHERE status = 'Reserved';");

if (mysqli_num_rows($resultBaptismal) > 0) {
    while ($row = mysqli_fetch_assoc($resultBaptismal)) {
        $bapDate = $row['bapDate'];
        $bapTime = $row['bapTime'];
        $name = $row['name'];
        $amount = $row['amount'];
        $refNum = $row['refNum'];
        $receipt = $row['receipt'];

        // Check if amount, refNum, and receipt are empty
        if (empty($amount)) {
            continue; // Skip this event if any of the required fields are empty
        }

        $currentDate = date('Y-m-d');
        $eventDate = date('Y-m-d', strtotime($bapDate));

        if ($eventDate < $currentDate) {
            continue; // Skip this event if the date has passed
        }

        // Determine the source and set the summary accordingly
        $source = 'Baptismal';
        $summary = ($name) ? "$name - $source ($bapTime)" : "$source ($bapTime)";

        $events[] = [
            'startDate' => date('Y-m-d', strtotime("$bapDate")),
            'endDate' => date('Y-m-d', strtotime("$bapDate")),
            'summary' => $summary,
        ];
    }
}

$resultBlessing = mysqli_query($conn, "SELECT * FROM blessing_tbl WHERE status = 'Reserved';");

if (mysqli_num_rows($resultBlessing) > 0) {
    while ($row = mysqli_fetch_assoc($resultBlessing)) {
        $blessDate = $row['blessDate'];
        $blessTime = $row['blessTime'];
        $name = $row['name'];
        $amount = $row['amount'];
        $refNum = $row['refNum'];
        $receipt = $row['receipt'];

        // Check if amount, refNum, and receipt are empty
        if (empty($amount)) {
            continue; // Skip this event if any of the required fields are empty
        }

        $currentDate = date('Y-m-d');
        $eventDate = date('Y-m-d', strtotime($blessDate));

        if ($eventDate < $currentDate) {
            continue; // Skip this event if the date has passed
        }

        // Determine the source and set the summary accordingly
        $source = 'Blessing';
        $summary = ($name) ? "$name - $source ($blessTime)" : "$source ($blessTime)";

        $events[] = [
            'startDate' => date('Y-m-d', strtotime("$blessDate $blessTime")),
            'endDate' => date('Y-m-d H:i:s', strtotime("$blessDate $blessTime +1 hour")),
            'summary' => $summary,
        ];
    }
}


$resultCom = mysqli_query($conn, "SELECT * FROM communion_tbl WHERE status = 'Reserved';");

if (mysqli_num_rows($resultCom) > 0) {
    while ($row = mysqli_fetch_assoc($resultCom)) {
        $comDate = $row['comDate'];
        $comTime = $row['comTime'];
        $name = $row['name'];
        $amount = $row['amount'];
        $refNum = $row['refNum'];
        $receipt = $row['receipt'];

        // Check if amount, refNum, and receipt are empty
        if (empty($amount)) {
            continue; // Skip this event if any of the required fields are empty
        }

        $currentDate = date('Y-m-d');
        $eventDate = date('Y-m-d', strtotime($comDate));

        if ($eventDate < $currentDate) {
            continue; // Skip this event if the date has passed
        }

        // Determine the source and set the summary accordingly
        $source = 'Communion';
        $summary = ($name) ? "$name - $source ($comTime)" : "$source ($comTime)";

        $events[] = [
            'startDate' => date('Y-m-d', strtotime("$comDate $comTime")),
            'endDate' => date('Y-m-d H:i:s', strtotime("$comDate $comTime +1 hour")),
            'summary' => $summary,
        ];
    }
}

$resultCom = mysqli_query($conn, "SELECT * FROM confirmation_tbl WHERE status = 'Reserved';");

if (mysqli_num_rows($resultCom) > 0) {
    while ($row = mysqli_fetch_assoc($resultCom)) {
        $conDate = $row['conDate'];
        $conTime = $row['conTime'];
        $name = $row['name'];
        $amount = $row['amount'];
        $refNum = $row['refNum'];
        $receipt = $row['receipt'];

        // Check if amount, refNum, and receipt are empty
        if (empty($amount)) {
            continue; // Skip this event if any of the required fields are empty
        }

        $currentDate = date('Y-m-d');
        $eventDate = date('Y-m-d', strtotime($conDate));

        if ($eventDate < $currentDate) {
            continue; // Skip this event if the date has passed
        }
        // Determine the source and set the summary accordingly
        $source = 'Confirmation';
        $summary = ($name) ? "$name - $source ($conTime)" : "$source ($conTime)";

        $events[] = [
            'startDate' => date('Y-m-d', strtotime("$conDate $conTime")),
            'endDate' => date('Y-m-d H:i:s', strtotime("$conDate $conTime +1 hour")),
            'summary' => $summary,
        ];
    }
}

$resultFuneral = mysqli_query($conn, "SELECT * FROM funeralmass_tbl WHERE status = 'Reserved';");

if (mysqli_num_rows($resultFuneral) > 0) {
    while ($row = mysqli_fetch_assoc($resultFuneral)) {
        $buryDate = $row['buryDate'];
        $resTime = $row['resTime'];
        $name = $row['name'];
        $amount = $row['amount'];
        $refNum = $row['refNum'];
        $receipt = $row['receipt'];

        // Check if amount, refNum, and receipt are empty
        if (empty($amount)) {
            continue; // Skip this event if any of the required fields are empty
        }

        // Check if the event month and year have already passed
        if (date('Y-m', strtotime($buryDate)) < date('Y-m')) {
            continue; // Skip this event if the month and year have passed
        }

        $currentDate = date('Y-m-d');
        $eventDate = date('Y-m-d', strtotime($buryDate));

        if ($eventDate < $currentDate) {
            continue; // Skip this event if the date has passed
        }

        // Determine the source and set the summary accordingly
        $source = 'Funeral Mass';
        $summary = ($name) ? "$name - $source ($resTime)" : "$source ($resTime)";

        $events[] = [
            'startDate' => date('Y-m-d', strtotime("$buryDate $resTime")),
            'endDate' => date('Y-m-d H:i:s', strtotime("$buryDate $resTime +1 hour")),
            'summary' => $summary,
        ];
    }
}


$resultWedding = mysqli_query($conn, "SELECT * FROM wedding_tbl WHERE status = 'Reserved';");

if (mysqli_num_rows($resultWedding) > 0) {
    while ($row = mysqli_fetch_assoc($resultWedding)) {
        $wdate = $row['wdate'];
        $resTime = $row['resTime'];
        $groom = $row['groom']; // Change 'name' to 'groom'
        $bride = $row['bride']; // Add a new variable for 'bride'
        $amount = $row['amount'];
        $refNum = $row['refNum'];
        $receipt = $row['receipt'];

        // Check if amount, refNum, and receipt are empty
        if (empty($amount)) {
            continue; // Skip this event if any of the required fields are empty
        }

        // Check if the event month and year have already passed
        $currentDate = date('Y-m-d');
        $eventDate = date('Y-m-d', strtotime($wdate));

        if ($eventDate < $currentDate) {
            continue; // Skip this event if the date has passed
        }

        // Determine the source and set the summary accordingly
        $source = 'Wedding'; // Change source to 'Wedding'
        $summary = ($groom && $bride) ? (($groom && $bride) ? "$groom & $bride - $source ($resTime)" : "$source ($resTime)") : $source;

        $events[] = [
            'startDate' => date('Y-m-d', strtotime("$wdate $resTime")),
            'endDate' => date('Y-m-d H:i:s', strtotime("$wdate $resTime +1 hour")),
            'summary' => $summary,
        ];
    }
}

if (!empty($events)) {
    echo "<script>
        \$(document).ready(function () {
            let container = \$('#container').simpleCalendar({
                fixedStartDay: 0,
                disableEmptyDetails: true,
                events: " . json_encode($events) . ",
                displayEventTime: true, // Show event time
                timeFormat: '12h', // Use 12-hour format with AM/PM
            });
            \$calendar = container.data('plugin_simpleCalendar');
        });
        </script>";
} else {
    echo "No events found";
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
<?php 
  } else {
    header("Location: ../login.php");
    exit();
  }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
