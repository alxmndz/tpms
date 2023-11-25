<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin - Tuy Parish Management System</title>
  <!-- Icon -->
  <link rel="icon" type="image/x-icon" href="assets/icons/svf.png">
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
        justify-content: center; /* Center text vertically */
        padding: 2px;
        border-radius: 10px;
        font-weight: bold;
        text-align: center; /* Center text horizontally */
    }

    .status-approved {
        background-color: #16A085;
        color: white;
    }

    .status-in-process {
        background-color: #F39C12;
        color: white;
    }

    .status-disapproved {
        background-color: #CB4335;
        color: white;
    }

    .status-pickedUp {
        background-color: #16A085;
        color: white;
    }

    .status-pickUp {
        background-color: #2E86C1;
        color: white;
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
                                        <li><a href="#" class="tablinks" onclick="openCity(event, 'reservation')"><i class="fas fa-pen"></i> <span class="item-text">Event Reservation</span></a></li>
                                        <li><a href="#" class="tablinks" onclick="openCity(event, 'reqCert')"><i class="fa-solid fa-file-pen"></i> <span class="item-text">Request Certificate</span></a></li>
                                        

                                        <li class="mb-3 mt-3"><span>STATUS</span></li>
                                        <li><a href="#" class="tablinks" onclick="openCity(event, 'request')"><i class="fas fa-folder-open"></i> <span class="item-text">Request Status</span></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                <i class="fas fa-calendar-days"></i> <span class="item-text">Reservation Status</span>
                                            </a>
                                            <ul class="dropdown-menu no-border">
                                                <li><a class="dropdown-item custom-dropdown-item tablinks" onclick="openCity(event, 'baptismal')">Baptismal</a></li>
                                                <li><a class="dropdown-item custom-dropdown-item tablinks" onclick="openCity(event, 'blessing')">Blessings</a></li>
                                                <li><a class="dropdown-item custom-dropdown-item tablinks" onclick="openCity(event, 'communion')">Communion</a></li>
                                                <li><a class="dropdown-item custom-dropdown-item tablinks" onclick="openCity(event, 'confirmation')">Confirmation</a></li>
                                                <li><a class="dropdown-item custom-dropdown-item tablinks" onclick="openCity(event, 'funeralmass')">Funeral</a></li>
                                                <li><a class="dropdown-item custom-dropdown-item tablinks" onclick="openCity(event, 'wedding')">Wedding</a></li>
                                            </ul>
                                        </li>

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
                                    <li><button class="dropdown-item" type="button" onclick="openCity(event, 'profile')"><i class="bi bi-lock-fill"></i> Profile</button></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <button class="dropdown-item" type="button" onclick="logout()">
                                            <i class="bi bi-box-arrow-right"></i>Sign out
                                        </button>
                                    </li>
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
                      <?php include"patron/main.php"; ?>
                    </div>

                    <div class="tabcontent" id="profile" style="display: none;">
                      <?php include"patron/profile.php"; ?>
                    </div>

                    <div class="tabcontent" id="reservation" style="display: none;">
                      <?php include"patron/reserve.php"; ?>
                    </div>

                    <div class="tabcontent" id="request" style="display: none;">
                      <?php include"patron/reqStat.php"; ?>
                    </div>

                    <div class="tabcontent" id="donate" style="display: none;">
                      <?php include"patron/donation.php"; ?>
                    </div>

                    <div class="tabcontent" id="announce" style="display: none;">
                      <?php include"patron/announcement.php"; ?>
                    </div>

                    <div class="tabcontent" id="reqCert" style="display: none;">
                      <?php include"patron/reqCert.php"; ?>
                    </div>


                    <!-- events -->
                    <div class="tabcontent" id="baptismal" style="display: none;">
                      <?php include"patron/resBap.php"; ?>
                    </div>
                    <div class="tabcontent" id="blessing" style="display: none;">
                      <?php include"patron/resBless.php"; ?>
                    </div>
                    <div class="tabcontent" id="communion" style="display: none;">
                      <?php include"patron/resCom.php"; ?>
                    </div>
                    <div class="tabcontent" id="confirmation" style="display: none;">
                      <?php include"patron/resCon.php"; ?>
                    </div>
                    <div class="tabcontent" id="funeralmass" style="display: none;">
                      <?php include"patron/resFuneral.php"; ?>
                    </div>
                    <div class="tabcontent" id="wedding" style="display: none;">
                      <?php include"patron/resWed.php"; ?>
                    </div>

                    <?php include"patron/donateModal.php"; ?>


                    <!-- events modal -->
                    <?php include"patron/baptismal.php"; ?>
                    <?php include"patron/blessing.php"; ?>
                    <?php include"patron/communion.php"; ?>
                    <?php include"patron/confirmation.php"; ?>
                    <?php include"patron/funeralmass.php"; ?>
                    <?php include"patron/wedding.php"; ?>
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

<script>
    function logout() {
        // Redirect to logout.php when the button is clicked
        window.location.href = 'php/logout.php';
    }
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
        case 'Picked Up':
            return 'status-pickedUp';
        default:
            return ''; // Default style for other statuses
    }
}
?>
</body>
</html>
