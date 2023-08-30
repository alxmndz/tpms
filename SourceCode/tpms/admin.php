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
<?php include "header.php"; ?>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="admin.php"><img class="logo" src="assets/icons/svf.png"> St. Vincent Ferrer</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-end" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" onclick="openCity(event, '')" href="#!">Profile</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="php/logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Main</div>
                            <a class="nav-link tablinks" onclick="openCity(event, 'dashboard')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-chart-line"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link tablinks" onclick="openCity(event, 'reserve')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-plus"></i></div>
                                Reservation
                            </a>
                            <a class="nav-link tablinks" onclick="openCity(event, 'accounts')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                                Accounts
                            </a>

                            <div class="sb-sidenav-menu-heading">Credentials/Services</div>
                            <a class="nav-link tablinks" onclick="openCity(event, 'request')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-scroll"></i></div>
                                Request Certificate
                            </a>

                            <div class="sb-sidenav-menu-heading">Others</div>
                            <a class="nav-link tablinks" onclick="openCity(event, 'donation')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-hand-holding-dollar"></i></div>
                                Donation
                            </a>
                            <a class="nav-link tablinks" onclick="openCity(event, 'announcement')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-bell"></i></div>
                                Announcements
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Welcome:</div>
                        <?php echo $_SESSION['uname']; ?>
                    </div>
                </nav>
            </div>

            <div id="layoutSidenav_content">

                <main class="tabcontent" id="dashboard">
                    <?php include "admin/dashboard.php"; ?>
                </main>

                <main class="tabcontent" id="accounts" style="display: none;">
                    <?php include "admin/accounts.php"; ?>
                </main>

                <main class="tabcontent" id="reserve" style="display: none;">
                    <?php include "admin/reserve.php"; ?>
                </main>

                <main class="tabcontent" id="reqcert" style="display: none;">
                    <?php include "admin/reqCert.php"; ?>
                </main>

                <!-- Events -->

                <main class="tabcontent" id="wedding" style="display: none;">
                    <?php include "admin/wedding.php"; ?>
                </main>

                <main class="tabcontent" id="baptismal" style="display: none;">
                    <?php include "admin/baptismal.php"; ?>
                </main>

                <main class="tabcontent" id="blessing" style="display: none;">
                    <?php include "admin/blessing.php"; ?>
                </main>

                <main class="tabcontent" id="communion" style="display: none;">
                    <?php include "admin/communion.php"; ?>
                </main>

                <main class="tabcontent" id="confirmation" style="display: none;">
                    <?php include "admin/confirmation.php"; ?>
                </main>

                <main class="tabcontent" id="funeralmass" style="display: none;">
                    <?php include "admin/funeralmass.php"; ?>
                </main>

                <!-- Other functions -->
                <main class="tabcontent" id="donation" style="display: none;">
                    <?php include "admin/donation.php"; ?>
                </main>

                <main class="tabcontent" id="request" style="display: none;">
                    <?php include "admin/request.php"; ?>
                </main>

                <main class="tabcontent" id="announcement" style="display: none;">
                    <?php include "admin/announcement.php"; ?>
                </main>

                <?php include "admin/addmodal.php" ?>
                    <?php 
                      } else {
                        header("Location: loginform.php");
                        exit();
                      }
                    ?>
                
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Tuy Parish 2023</div>
                            <div> 
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>
