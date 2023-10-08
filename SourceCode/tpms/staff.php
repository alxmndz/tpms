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
            <a class="navbar-brand ps-3" href="staff.php"><img class="logo" src="assets/icons/svf.png"> Tuy Parish Management System</a>

            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
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
                            <div class="sb-sidenav-menu-heading">Home</div>
                            <a class="nav-link tablinks" onclick="openCity(event, 'dashboard')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-chart-line"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link tablinks" onclick="openCity(event, 'eventlist')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-regular fa-calendar-days"></i></div>
                                Create Event
                            </a>

                            <a class="nav-link tablinks" onclick="openCity(event, 'reserve')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-plus"></i></div>
                                Reservation
                            </a>

                            <div class="sb-sidenav-menu-heading">Status</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-handshake"></i></div>
                                Walk-In Reservation
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link tablinks" onclick="openCity(event, 'reqBap')" href="#">Baptismal</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'reqBless')" href="#">Blessings</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'reqCom')" href="#">Communion</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'reqCon')" href="#">Confirmation</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'reqFuneral')" href="#">Funeral</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'reqWedd')" href="#">Wedding</a>
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
                                    <a class="nav-link tablinks" onclick="openCity(event, 'reqBap1')" href="#">Baptismal</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'reqBless1')" href="#">Blessings</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'reqCom1')" href="#">Communion</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'reqCon1')" href="#">Confirmation</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'reqFuneral1')" href="#">Funeral</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'reqWedd1')" href="#">Wedding</a>
                                </nav>
                            </div>

                            <a class="nav-link tablinks" onclick="openCity(event, 'request')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-scroll"></i></div>
                                Request Certificate
                            </a>

                            <div class="sb-sidenav-menu-heading">Announcements/Reports</div>
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
                    <?php include "staff/dashboard.php"; ?>
                </main>

                <main class="tabcontent" id="eventlist" style="display: none;">
                    <?php include "staff/eventlist.php"; ?>
                </main>

                <main class="tabcontent" id="donation" style="display: none;">
                    
                </main>

                <main class="tabcontent" id="request" style="display: none;">
                    <?php include "staff/request.php"; ?>
                </main>

                <main class="tabcontent" id="reserve" style="display: none;">
                    <?php include "staff/reserve.php"; ?>
                </main>

                <main class="tabcontent" id="announcement" style="display: none;">
                    <?php include "staff/announcement.php"; ?>
                </main>

                <!-- Walk In Reservation -->

                <main class="tabcontent" id="reqBap" style="display: none;">
                    <?php include "staff/reqBap.php"; ?>
                </main>

                <main class="tabcontent" id="reqBless" style="display: none;">
                    <?php include "staff/reqBless.php"; ?>
                </main>

                <main class="tabcontent" id="reqCom" style="display: none;">
                    <?php include "staff/reqCom.php"; ?>
                </main>

                <main class="tabcontent" id="reqCon" style="display: none;">
                    <?php include "staff/reqCon.php"; ?>
                </main>

                <main class="tabcontent" id="reqFuneral" style="display: none;">
                    <?php include "staff/reqFuneral.php"; ?>
                </main>

                <main class="tabcontent" id="reqWedd" style="display: none;">
                    <?php include "staff/reqWedd.php"; ?>
                </main>
                

                <!-- Online Reservation -->

                <main class="tabcontent" id="reqBap1" style="display: none;">
                    <?php include "staff/reqBap1.php"; ?>
                </main>

                <main class="tabcontent" id="reqBless1" style="display: none;">
                    <?php include "staff/reqBless1.php"; ?>
                </main>

                <main class="tabcontent" id="reqCom1" style="display: none;">
                    <?php include "staff/reqCom1.php"; ?>
                </main>

                <main class="tabcontent" id="reqCon1" style="display: none;">
                    <?php include "staff/reqCon1.php"; ?>
                </main>

                <main class="tabcontent" id="reqFuneral1" style="display: none;">
                    <?php include "staff/reqFuneral1.php"; ?>
                </main>

                <main class="tabcontent" id="reqWedd1" style="display: none;">
                    <?php include "staff/reqWedd1.php"; ?>
                </main>

                <main class="tabcontent" id="reqCert" style="display: none;">
                    <?php include "staff/reqCert.php"; ?>
                </main>

                <?php include "staff/bapModal.php" ?>
                <?php include "staff/blessModal.php" ?>
                <?php include "staff/commModal.php" ?>
                <?php include "staff/conModal.php" ?>
                <?php include "staff/funeralModal.php" ?>
                <?php include "staff/weddModal.php" ?>

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
