<?php
include_once 'php/config.php';
session_start();

if(isset($_SESSION['user_id']) && isset($_SESSION['fname']) && isset($_SESSION['lname'])){
  $id = $_SESSION['user_id'];
  $sql=mysqli_query($conn,"SELECT img FROM accounts WHERE user_id = '$id'");
  $img = mysqli_fetch_assoc($sql);
  $userIMG = $img['img'];

?>
<?php 
    include_once "links2.php";
 ?>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="patron.php"><img src="assets/img/header-bg.jpg" style="height: 25px; width: 25px; object-fit: cover; border-radius: 30px;"> St. Vincent Parish</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
              <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" 
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #343a40;  float: left;">
                          <i class="fas fa-user fa-fw" style="color: whitesmoke;"></i>
                        </a>
                      <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" onclick="openCity(event, 'profile')" href="#!"><img src="images/<?php echo $userIMG; ?>" class="img-circle mx-auto mb-3" style="height: 30px; width: 30px; margin-top: 10px; object-fit: cover;"> Profile</a></li>
                            <li>
                              <hr class="dropdown-divider">
                            </li>
                          <li>
                            <a class="dropdown-item" href="php/logout.php?">
                            <i class="icon-power"></i>
                            Logout
                          </a>
                        </li>
                      </ul>
                  </li>
              </ul>
          </nav>
            
        <!-- Navbar-->
        </nav>
        <!-- sidebar -->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">

                            <div class="sb-sidenav-menu-heading">Home</div>
                            <a class="nav-link tablinks" onclick="openCity(event, 'calendar')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar"></i></div>
                                Calendar
                            </a>

                        <div class="sb-sidenav-menu-heading">Credentials/Services</div>

                             <a class="nav-link tablinks" onclick="openCity(event, 'forms')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-folder-open"></i></div>
                                Request certificate
                            </a>
                            <a class="nav-link tablinks" onclick="openCity(event, 'reservation')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-pen"></i></div>
                                Event Reservation
                            </a>  

                        <div class="sb-sidenav-menu-heading">Others</div>

                            <a class="nav-link tablinks" onclick="openCity(event, 'donation')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-money-bill-1-wave"></i></div>
                                Donation
                            </a> 
                            <a class="nav-link tablinks" onclick="openCity(event, 'announcement')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-exclamation"></i></div>
                                Announcement
                            </a>
                </nav>
            </div>


            <div id="layoutSidenav_content">

                <!-- Start of the tabs -->
              <main  class="tabcontent" id="profile" style="display: none;">
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Profile</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Profile Details</li>
                    </ol>

                </div>
                <div class="row container-fluid align-items-center">
                  <div class="row">
                    <div class="col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
                      <div class="profile-card card rounded-lg shadow p-2 p-md-3 mb-4 text-center position-relative overflow-hidden">
                        <div class="banner"></div>
                        <img src="images/<?php echo $userIMG; ?>" class="img-circle mx-auto mb-3" style="object-fit: cover;">
                        <h3 class="mb-3"><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></h3>
                        <div class="text-left mb-3">
                          <p class="mb-1"><i class="fa fa-envelope me-2"></i><?php echo $_SESSION['email']; ?></p>
                        </div>
                        <?php 
                          } else {
                            header("Location: login-rev.php");
                            exit();
                          }
                        ?>
                      </div>
                    </div>
                  </div>

              </main>

              <main class="tabcontent" id="calendar">
                <?php include "calendar1.php"; ?>
              </main>

              <main class="tabcontent" id="forms" style="display: none;">
                <?php include "usercontent/forms.php"; ?>
              </main>

              <main class="tabcontent" id="reservation" style="display: none;">
                <?php include "usercontent/reservation.php"; ?>
              </main>

              <main class="tabcontent" id="announcement" style="display: none;">
                <?php include "usercontent/announcement.php"; ?>
              </main>
              <main class="tabcontent" id="donation" style="display: none;">
                <?php include "usercontent/donation.php"; ?>
              </main>

          </div>
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
            </div>
        </div>
    </body>
</html>