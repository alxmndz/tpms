<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin - Tuy Parish Management System</title>
  <!-- Icon -->
  <link rel="icon" type="image/x-icon" href="assets/icons/admin.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
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
                                        <li><a href="#"><i class="bi bi-calendar3"></i> <span class="item-text">Home</span></a></li>
                                        <li><a href="#"><i class="bi bi-pencil-square"></i> <span class="item-text">Reservation</span></a></li>
                                        <li><a href="#"><i class="bi bi-people"></i> <span class="item-text">Accounts</span></a></li>
                                        <li><a href="#"><i class="bi bi-calendar3"></i> <span class="item-text">Generate Certificate</span></a></li>

                                        <li class="mb-3 mt-3"><span>STATUS</span></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                <i class="bi bi-graph-up"></i> <span class="item-text">Walk-In Reserve</span>
                                            </a>
                                            <ul class="dropdown-menu no-border">
                                                <li><a class="dropdown-item custom-dropdown-item" href="#">Item 1</a></li>
                                                <li><a class="dropdown-item custom-dropdown-item" href="#">Item 2</a></li>
                                                <li><a class="dropdown-item custom-dropdown-item" href="#">Item 3</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                <i class="bi bi-graph-up"></i> <span class="item-text">Online Reserve</span>
                                            </a>
                                            <ul class="dropdown-menu no-border">
                                                <li><a class="dropdown-item custom-dropdown-item" href="#">Item 1</a></li>
                                                <li><a class="dropdown-item custom-dropdown-item" href="#">Item 2</a></li>
                                                <li><a class="dropdown-item custom-dropdown-item" href="#">Item 3</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><i class="bi bi-book"></i> <span class="item-text">Request Certificate</span></a></li>

                                        <li class="mb-3 mt-3"><span>OTHERS</span></li>
                                        <li><a href="#"><i class="bi bi-pencil-square"></i> <span class="item-text">Donation</span></a></li>
                                        <li><a href="#"><i class="bi bi-people"></i> <span class="item-text">Announcement</span></a></li>
                                         <li><a href="#"><i class="bi bi-people"></i> <span class="item-text">Reports</span></a></li>
                                    </ul>
                                </div>
                              </div>

                            <div class="btn-group">
                                <a href="#" class="dropdown-toggle text-white text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="usericon"><img src="assets/icons/profile.png"></span>
                                    <span class="textnone">Username</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" style="background: #fff; color: #148F77;">
                                    <li><button class="dropdown-item" type="button"><i class="bi bi-lock-fill"></i> Profile</button></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><button class="dropdown-item" type="button"><i class="bi bi-box-arrow-right"></i> Sign out</button></li>
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

                    <div id="home">
                      <?php include"admin/home.php"; ?>
                    </div>


                </div>
            </div>

        </div>
    </div>

</body>
</html>
