<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/icons/svf.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style-patron.css">
    <link rel="stylesheet" href="../css/dist/calendar.css">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="../js/dist/jquery.simple-calendar.js"></script>
    <title>Tuy Parish Management System</title>
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

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>

            <div class="sidebar-header">
                <h5>Tuy Parish Management System</h5>
            </div>

            <ul class="list-unstyled components">
                <li class="mb-3 mt-3 side-text" style="margin-left:10px"><span>MAIN</span></li>
                <li class="active">
                    <a href="home.php">Calendar</a>
                </li>
                <li>
                    <a href="reservation.php">Reservation</a>
                </li>
                <li>
                    <a href="#">Request Certificate</a>
                </li>
                <li class="mb-3 mt-3 side-text" style="margin-left:10px"><span>STATUS</span></li>
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Reservation Status</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li>
                <li class="mb-3 mt-3 side-text" style="margin-left:10px"><span>OTHERS</span></li>
                <li>
                    <a href="#">Donation</a>
                </li>
                <li>
                    <a href="#">Announcement</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-end">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn button-menu">
                    <i class="fas fa-align-left"></i>
                </button>
                <button class="d-inline-block d-lg-none ml-auto" type="button">
                    <ul class="nav navbar-nav" style="padding-right: 20px; margin-left: auto !important;">
                        <li class="nav-item">
                            <a class="nav-link nav-link-logo" href="index.html">
                                <img src="../assets/profile/<?php echo $_SESSION['profile']; ?>" alt="Logo">
                            </a>
                        </li>
                    </ul>
                </button>
                <div class="collapse navbar-collapse text-end" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto" style="padding-right: 20px; margin-left: auto !important;">
                        <li class="nav-item">
                            <a class="nav-link nav-link-logo" href="index.html">
                                <img src="../assets/profile/<?php echo $_SESSION['profile']; ?>" alt="Logo">
                                <?php echo $_SESSION['uname']; ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="container" class="calendar-container" style=".event-hour{display:none;}"></div>
        

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
                $formattedEventTime = date("h:i A", strtotime($eventTime));
                $title = $row['title'];

                $currentDate = date('Y-m-d');
                $eventDate = date('Y-m-d', strtotime($eventDate));

                if ($eventDate < $currentDate) {
                    continue; // Skip this event if the date has passed
                }

                $summary = ($title) ? "$title - ($formattedEventTime)" : " ($formattedEventTime)";

                $events[] = [
                    'startDate' => date('Y-m-d', strtotime("$eventDate")),
                    'endDate' => date('Y-m-d H:i:s', strtotime("$eventDate +1 hour")),
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
    </div>

    <div class="overlay"></div>

       <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
    

<?php 
  } else {
    header("Location: ../login.php");
    exit();
  }
?>
</body>
</html>
