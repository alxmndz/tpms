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
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="admin.php"><img class="logo" src="assets/icons/svf.png"> Tuy Parish Management System</a>        
        
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

                            <div class="sb-sidenav-menu-heading">Status</div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa-regular fa-handshake"></i></div>
                                Walk-In Reservation
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link tablinks" onclick="openCity(event, 'statbap')" href="#">Baptismal</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'statbless')" href="#">Blessings</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'statcom')" href="#">Communion</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'statcon')" href="#">Confirmation</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'statfuneral')" href="#">Funeral</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'statwed')" href="#">Wedding</a>
                                </nav>
                            </div>

                            <!-- Online Reservation -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-globe"></i></div>
                                Online Reservation
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link tablinks" onclick="openCity(event, 'statbap1')" href="#">Baptismal</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'statbless1')" href="#">Blessings</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'statcom1')" href="#">Communion</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'statcon1')" href="#">Confirmation</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'statfuneral1')" href="#">Funeral</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'statwed1')" href="#">Wedding</a>
                                </nav>
                            </div>

                            <a class="nav-link tablinks" onclick="openCity(event, 'request')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-scroll"></i></div>
                                Request Certificate
                            </a>

                            <div class="sb-sidenav-menu-heading">Others</div>
                            <a class="nav-link tablinks" onclick="openCity(event, 'cert')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-print"></i></div>
                                Generate Certificate
                            </a>
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

                <!-- Online Reservation -->

                <main class="tabcontent" id="statbap1" style="display: none;">
                    <?php include "admin/reqStat11.php"; ?>
                </main>

                <main class="tabcontent" id="statbless1" style="display: none;">
                    <?php include "admin/reqStat011.php"; ?>
                </main>

                <main class="tabcontent" id="statcom1" style="display: none;">
                    <?php include "admin/reqStat22.php"; ?>
                </main>

                <main class="tabcontent" id="statcon1" style="display: none;">
                    <?php include "admin/reqStat33.php"; ?>
                </main>

                <main class="tabcontent" id="statfuneral1" style="display: none;">
                    <?php include "admin/reqStat44.php"; ?>
                </main>

                <main class="tabcontent" id="statwed1" style="display: none;">
                    <?php include "admin/reqStat55.php"; ?>
                </main>

                <!-- Walk-in Reservation -->

                <main class="tabcontent" id="statbap" style="display: none;">
                    <?php include "admin/reqStat1.php"; ?>
                </main>

                <main class="tabcontent" id="statbless" style="display: none;">
                    <?php include "admin/reqStat01.php"; ?>
                </main>

                <main class="tabcontent" id="statcom" style="display: none;">
                    <?php include "admin/reqStat2.php"; ?>
                </main>

                <main class="tabcontent" id="statcon" style="display: none;">
                    <?php include "admin/reqStat3.php"; ?>
                </main>

                <main class="tabcontent" id="statfuneral" style="display: none;">
                    <?php include "admin/reqStat4.php"; ?>
                </main>

                <main class="tabcontent" id="statwed" style="display: none;">
                    <?php include "admin/reqStat5.php"; ?>
                </main>



                <main class="tabcontent" id="wedding" style="display: none;">
                    <?php include "admin/wedding.php"; ?>
                </main>

                <main class="tabcontent" id="baptismal" style="display: none;">
                    <?php include "admin/baptismal.php"; ?>
                </main>
                    
                <main class="tabcontent" id="communion" style="display: none;">
                    <?php include "admin/communion.php"; ?>
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
                <?php include "admin/bapModal.php" ?>
                <?php include "admin/blessModal.php" ?>
                <?php include "admin/commModal.php" ?>
                <?php include "admin/conModal.php" ?>
                <?php include "admin/funeralModal.php" ?>
                <?php include "admin/weddModal.php" ?>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    </body>
</html>
