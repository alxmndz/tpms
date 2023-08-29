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
            <a class="navbar-brand ps-3" href="patron.php"><img class="logo" src="assets/icons/svf.png"> St. Vincent Ferrer</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
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
                            <div class="sb-sidenav-menu-heading">Main</div>

                            <a class="nav-link tablinks" onclick="openCity(event, 'eventlist')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-regular fa-calendar-days"></i></div>
                                Event List
                            </a>
                            <a class="nav-link tablinks" onclick="openCity(event, 'reserve')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-regular fa-calendar-plus"></i></div>
                                Reservation
                            </a>
                            <a class="nav-link tablinks" onclick="openCity(event, 'status')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-check"></i></div>
                                Status
                            </a>

                            <div class="sb-sidenav-menu-heading">Credentials/Services</div>
                            <a class="nav-link tablinks" onclick="openCity(event, 'request')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-scroll"></i></div>
                                Request Certificate
                            </a>

                            <div class="sb-sidenav-menu-heading">Others</div>
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


                <main class="tabcontent" id="request" style="display: none;">
                    <?php include "patron/request.php" ?>
                </main>

                <main class="tabcontent" id="donation" style="display: none;">
                    <?php include "patron/donation.php" ?>
                </main>

                <main class="tabcontent" id="reserve" style="display: none;">
                    <?php include "patron/reserve.php" ?>
                </main>

                <!-- Event Reservation -->
                <main class="tabcontent" id="wedding" style="display: none;">
                    <?php include "patron/wedding.php" ?>
                </main>

                <main class="tabcontent" id="baptismal" style="display: none;">
                    <?php include "patron/baptismal.php" ?>
                </main>

                <main class="tabcontent" id="blessing" style="display: none;">
                    <?php include "patron/blessing.php" ?>
                </main>

                <main class="tabcontent" id="communion" style="display: none;">
                    <?php include "patron/communion.php" ?>
                </main>

                <main class="tabcontent" id="confirmation" style="display: none;">
                    <?php include "patron/confirmation.php" ?>
                </main>

                <main class="tabcontent" id="funeralmass" style="display: none;">
                    <?php include "patron/funeralmass.php" ?>
                </main>

                    <?php 
                          } else {
                            header("Location: loginform.php");
                            exit();
                          }
                        ?>
                <main class="tabcontent" id="eventlist">
                    <?php include "patron/calendar.php"; ?>
                </main>

                <main class="tabcontent" id="status" style="display: none;">
                    <?php include "patron/status.php" ?>
                </main>

                <main class="tabcontent" id="announcement" style="display: none;">
                    <?php include "patron/announcement.php" ?>
                </main>

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
