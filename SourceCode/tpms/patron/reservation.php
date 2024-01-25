<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/icons/svf.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/patron.css">
    <link rel="stylesheet" href="../css/dist/calendar.css">
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
                <li>
                    <a href="home.php">Calendar</a>
                </li>
                <li class="active">
                    <a href="reservation.php">Reservation</a>
                </li>
                <li>
                    <a href="request.php">Request Certificate</a>
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
                    <a href="donation.php">Donation</a>
                </li>
                <li>
                    <a href="announcement.php">Announcement</a>
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
                <span>Reservation</span>
                <div class="collapse navbar-collapse text-end" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto" style="padding-right: 20px; margin-left: auto !important;">
                        <li class="nav-item">
                            <a class="nav-link nav-link-logo">
                                <img src="../assets/profile/<?php echo $_SESSION['profile']; ?>" alt="Logo">
                                <?php echo $_SESSION['uname']; ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

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

        </div>
    </div>

    <div class="overlay"></div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
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
