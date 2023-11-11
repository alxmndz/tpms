<!DOCTYPE html>
<html lang="en">
<head>
  <title>Staff - Tuy Parish Management System</title>
  <!-- Icon -->
  <link rel="icon" type="image/x-icon" href="assets/icons/staff.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <!-- Include SweetAlert CSS -->
    <script src="sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <style>
        .status-badge {
            display: flex;
            align-items: center;
            padding: 5px; /* Adjust padding for spacing */
            border-radius: 15px;
            font-weight: bold; /* Make the text bold */
        }

        .status-approved {
            color: green; /* Text color for Approved status */
        }

        .status-in-process {
            color: orange; /* Text color for In Process status */
        }

        .status-disapproved {
            color: red; /* Text color for Disapproved status */
        }

        .status-pickedUp {
            color: #16A085; /* Text color for Disapproved status */
        }

        .status-pickUp {
            color: #2E86C1; /* Text color for Disapproved status */
        }
    </style>

</head>
<body>

<?php
include_once 'php/dbconn.php';
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['uname']) && isset($_SESSION['name'])){
  $id = $_SESSION['id'];
  $email = $_SESSION['email'];
  $sql=mysqli_query($conn,"SELECT profile FROM users WHERE id = '$id'");
  $img = mysqli_fetch_assoc($sql);
  $userIMG = $img['profile'];
?>
  <div class="container mt-5">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3">
                <div class="sidebar-nav">
                    <nav class="navbar navbar-dark fixed-top">
                        <div class="container">
                            <!-- Mobile Menu Toggle Button -->
                            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <!-- Menus List -->
                            <!-- Sidebar -->
                            <div class="offcanvas offcanvas-start shadow" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                              <div class="offcanvas-body">
                                    <ul class="navbar-nav">
                                        <li class="mb-1 mt-2"><h5>Tuy Parish Management System</h5></li>

                                        <li class="mb-3 mt-2"><span>MAIN</span></li>
                                        <li><a href="#" class="tablinks" onclick="openCity(event, 'home')"><i class="fas fa-house"></i> <span class="item-text">Home</span></a></li>
                                        <li><a href="#" class="tablinks" onclick="openCity(event, 'eventlist')"><i class="fas fa-calendar-days"></i> <span class="item-text">Event List</span></a></li>
                                        <li><a href="#" class="tablinks" onclick="openCity(event, 'reservation')"><i class="fas fa-pen"></i> <span class="item-text">Reservation</span></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                <i class="fas fa-print"></i> <span class="item-text">Generate Certificate</span>
                                            </a>
                                            <ul class="dropdown-menu no-border">
                                                <li><a class="dropdown-item custom-dropdown-item tablinks" onclick="openCity(event, 'certBap')">Baptismal Certificate</a></li>
                                                <li><a class="dropdown-item custom-dropdown-item tablinks" onclick="openCity(event, 'certComm')">Communion Certificate</a></li>
                                                <li><a class="dropdown-item custom-dropdown-item tablinks" onclick="openCity(event, 'certCon')">Confirmation Certificate</a></li>
                                                <li><a class="dropdown-item custom-dropdown-item tablinks" onclick="openCity(event, 'certFun')">Death Certificate</a></li>
                                                <li><a class="dropdown-item custom-dropdown-item tablinks" onclick="openCity(event, 'certWedd')">Marriage Certificate</a></li>
                                            </ul>
                                        </li>

                                        <li class="mb-3 mt-3"><span>STATUS</span></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                <i class="fas fa-person-walking"></i> <span class="item-text">Walk-In Reserve</span>
                                            </a>
                                            <ul class="dropdown-menu no-border">
                                                <li><a class="dropdown-item custom-dropdown-item tablinks" onclick="openCity(event, 'walkBap')">Baptismal</a></li>
                                                <li><a class="dropdown-item custom-dropdown-item tablinks" onclick="openCity(event, 'walkBless')">Blessings</a></li>
                                                <li><a class="dropdown-item custom-dropdown-item tablinks" onclick="openCity(event, 'walkComm')">Communion</a></li>
                                                <li><a class="dropdown-item custom-dropdown-item tablinks" onclick="openCity(event, 'walkCon')">Confirmation</a></li>
                                                <li><a class="dropdown-item custom-dropdown-item tablinks" onclick="openCity(event, 'walkFun')">Funeral</a></li>
                                                <li><a class="dropdown-item custom-dropdown-item tablinks" onclick="openCity(event, 'walkWedd')">Wedding</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                <i class="fas fa-globe"></i> <span class="item-text">Online Reserve</span>
                                            </a>
                                            <ul class="dropdown-menu no-border">
                                                <li><a class="dropdown-item custom-dropdown-item tablinks" onclick="openCity(event, 'onBap')">Baptismal</a></li>
                                                <li><a class="dropdown-item custom-dropdown-item tablinks" onclick="openCity(event, 'onBless')">Blessings</a></li>
                                                <li><a class="dropdown-item custom-dropdown-item tablinks" onclick="openCity(event, 'onComm')">Communion</a></li>
                                                <li><a class="dropdown-item custom-dropdown-item tablinks" onclick="openCity(event, 'onCon')">Confirmation</a></li>
                                                <li><a class="dropdown-item custom-dropdown-item tablinks" onclick="openCity(event, 'onFun')">Funeral</a></li>
                                                <li><a class="dropdown-item custom-dropdown-item tablinks" onclick="openCity(event, 'onWedd')">Wedding</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#" class="tablinks" onclick="openCity(event, 'reqs')"><i class="fas fa-folder-open"></i> <span class="item-text">Request Certificate</span></a></li>

                                        <li class="mb-3 mt-3"><span>OTHERS</span></li>
                                        <li><a onclick="openCity(event, 'donate')" class="tablinks"><i class="fas fa-people-carry-box"></i> <span class="item-text">Donation</span></a></li>
                                        <li><a onclick="openCity(event, 'announce')" class="tablinks"><i class="fas fa-bell"></i> <span class="item-text">Announcement</span></a></li>
                                    </ul>
                                </div>
                              </div>

                            <div class="btn-group">
                                <a href="#" class="dropdown-toggle text-white text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="usericon"><img src="assets/img/profile/<?php echo $_SESSION['profile']; ?>"></span>
                                    <span class="textnone"><?php echo $_SESSION['uname']; ?></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" style="background: #fff; color: #148F77;">
                                    <li><button class="dropdown-item" type="button"><i class="bi bi-lock-fill"></i> Profile</button></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><button class="dropdown-item" type="button"><i class="bi bi-box-arrow-right"></i><a href="php/logout.php"><h5>Sign out</h5></a></button></li>
                                </ul>
                            </div>

                        </div>
                    </nav>
                </div>
            </div>

            <!-- Main Content -->
            <div class="container-fluid">
                <div class="content">
                    <!-- Your main content goes here -->

                    <div class="tabcontent" id="home">
                      <?php include"staff/home.php"; ?>
                    </div>
                    <div class="tabcontent" id="reservation" style="display: none;">
                      <?php include"staff/reservation.php"; ?>
                    </div>
                    <div class="tabcontent" id="accounts" style="display: none;">
                      <?php include"staff/accounts.php"; ?>
                    </div>
                    <div class="tabcontent" id="requests" style="display: none;">
                      <?php include"staff/requests.php"; ?>
                    </div>

                    <!-- walk-In Reservation -->
                    <div class="tabcontent" id="walkBap" style="display: none;">
                      <?php include"staff/walkBap.php"; ?>
                    </div>

                    <div class="tabcontent" id="walkBless" style="display: none;">
                      <?php include"staff/walkBless.php"; ?>
                    </div>

                    <div class="tabcontent" id="walkComm" style="display: none;">
                      <?php include"staff/walkComm.php"; ?>
                    </div>

                    <div class="tabcontent" id="walkCon" style="display: none;">
                      <?php include"staff/walkCon.php"; ?>
                    </div>

                    <div class="tabcontent" id="walkFun" style="display: none;">
                      <?php include"staff/walkFun.php"; ?>
                    </div>

                    <div class="tabcontent" id="walkWedd" style="display: none;">
                      <?php include"staff/walkWedd.php"; ?>
                    </div>

                    <!-- Online -->
                    <div class="tabcontent" id="onBap" style="display: none;">
                      <?php include"staff/onBap.php"; ?>
                    </div>

                    <div class="tabcontent" id="onBless" style="display: none;">
                      <?php include"staff/onBless.php"; ?>
                    </div>

                    <div class="tabcontent" id="onComm" style="display: none;">
                      <?php include"staff/onComm.php"; ?>
                    </div>

                    <div class="tabcontent" id="onCon" style="display: none;">
                      <?php include"staff/onCon.php"; ?>
                    </div>

                    <div class="tabcontent" id="onFun" style="display: none;">
                      <?php include"staff/onFun.php"; ?>
                    </div>

                    <div class="tabcontent" id="onWedd" style="display: none;">
                      <?php include"staff/onWedd.php"; ?>
                    </div>

                    <!-- Other Content -->

                    <div class="tabcontent" id="reqs" style="display: none;">
                      <?php include"staff/reqs.php"; ?>
                    </div>

                    <div class="tabcontent" id="donate" style="display: none;">
                      <?php include"staff/donate.php"; ?>
                    </div>

                    <div class="tabcontent" id="announce" style="display: none;">
                      <?php include"staff/announce.php"; ?>
                    </div>

                    <div class="tabcontent" id="report" style="display: none;">
                      <?php include"staff/report.php"; ?>
                    </div>


                    <!-- certificate -->

                    <div class="tabcontent" id="certBap" style="display: none;">
                      <?php include"staff/certBap.php"; ?>
                    </div>

                    <div class="tabcontent" id="certComm" style="display: none;">
                      <?php include"staff/certComm.php"; ?>
                    </div>

                    <div class="tabcontent" id="certCon" style="display: none;">
                      <?php include"staff/certCon.php"; ?>
                    </div>

                    <div class="tabcontent" id="certFun" style="display: none;">
                      <?php include"staff/certFun.php"; ?>
                    </div>

                    <div class="tabcontent" id="certWedd" style="display: none;">
                      <?php include"staff/certWed.php"; ?>
                    </div>

                    <div class="tabcontent" id="reqcert" style="display: none;">
                      <?php include"staff/reqCert.php"; ?>
                    </div>

                    <div class="tabcontent" id="eventlist" style="display: none;">
                      <?php include"staff/eventlist.php"; ?>
                    </div>

                    <?php include "staff/bapModal.php" ?>
                    <?php include "staff/blessedModal.php" ?>
                    <?php include "staff/commModal.php" ?>
                    <?php include "staff/conModal.php" ?>
                    <?php include "staff/funeralModal.php" ?>
                    <?php include "staff/weddModal.php" ?>
                    <?php include "staff/donateModal.php" ?>
                    <?php include "staff/announceModal.php" ?>


                    <?php include "staff/genCert.php" ?>
                </div>
            </div>

        </div>
    </div>
<?php 
} else {
     header("Location: loginform.php");
     exit();
  }
?>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

<?php
function getStatusColorClass($status) {
    switch ($status) {
        case 'Approved':
            return 'status-approved';
        case 'In Process':
            return 'status-in-process';
        case 'Disapproved, Because mismatch files':
            return 'status-disapproved';
        case 'Ready to pick up':
            return 'status-pickUp';
        case 'Picked Up':
            return 'status-pickedUp';
        default:
            return ''; // Default style for other statuses
    }
}
?>
</body>
</html>
