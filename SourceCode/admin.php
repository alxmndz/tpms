<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Saint Vincent Ferrer | Admin</title>
        <!--Icon-->
        <link rel="icon" type="image/x-icon" href="assets/admin.ico" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Saint Vincent Ferrer</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!"><i class="fa-solid fa-chart-simple"></i> Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!"><i class="fa-solid fa-calendar"></i> Events</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!"><i class="fa-solid fa-file"></i> Credentials</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!"><i class="fa-solid fa-check"></i> Approvals</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!"><i class="fa-solid fa-scroll"></i> Announcements</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!"><i class="fa-solid fa-bell"></i> Reports</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle">Menu</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/img/nav-logo.ico"></a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#!"><img src="../assets/img/nav-logo.ico"></a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#!"><i class="fa-solid fa-right-from-bracket"></i> Log out</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                    <h1 class="mt-4">Simple Sidebar</h1>
                    <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
                    <p>
                        Make sure to keep all page content within the
                        <code>#page-content-wrapper</code>
                        . The top navbar is optional, and just for demonstration. Just create an element with the
                        <code>#sidebarToggle</code>
                        ID which will toggle the menu when clicked.
                    </p>
                </div>


            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/admin.js"></script>
    </body>
</html>
