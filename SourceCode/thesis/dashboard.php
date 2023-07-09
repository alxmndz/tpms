<?php
include_once 'php/config.php';
session_start();

if(isset($_SESSION['user_id']) && isset($_SESSION['fname']) && isset($_SESSION['lname'])){
  $id = $_SESSION['user_id'];
  $sql=mysqli_query($conn,"SELECT img FROM accounts WHERE user_id = '$id'");
  $img = mysqli_fetch_assoc($sql);
  $userIMG = $img['img'];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/admin.ico" />
        <title>Saint Vincent Ferrer Church | Admin</title>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/dashboard.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css”>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/update.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
        <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
        <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
        <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
        <link rel="stylesheet" type="text/css" href="css/profile.css">
     </head>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="dashboard.php"><img src="assets/img/header-bg.jpg" style="height: 25px; width: 25px; object-fit: cover; border-radius: 30px;"> St. Vincent Parish</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
              <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" 
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #343a40;">
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
                            <a class="nav-link tablinks" onclick="openCity(event, 'dashboard')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                                Dashboard
                            </a>

                            <a class="nav-link tablinks" onclick="openCity(event, 'patron')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                                Accounts
                            </a>
                        <div class="sb-sidenav-menu-heading">Certificate/Forms</div>

                            <a onclick="openCity(event, 'forms')" class="nav-link collapsed" role="button" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">

                                <div class="sb-nav-link-icon"><i class="fa-solid fa-folder-open"></i></div>
                                Request Certificate
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse multi-collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link tablinks" onclick="openCity(event, 'baptismal')" href="#">Baptismal</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'communion')" href="#">Communion</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'kumpil')" href="#">Confirmation</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'funeral')" href="#">Death Certificate</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'marriage')" href="#">Marriage</a>
                                </nav>
                            </div>   
                        <div class="sb-sidenav-menu-heading">Appointments</div>
                        
                            <a class="nav-link tablinks" onclick="openCity(event, 'cal')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar"></i></div>
                                Events List
                            </a>

                            <a onclick="openCity(event, 'eventRes')" class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">

                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                  Reservation 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            
                              <div class="collapse" id="collapseLayouts1" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                  <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link tablinks" onclick="openCity(event, 'bRes')" href="#">Baptismal</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'blRes')" href="#">Blessing</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'comRes')" href="#">Communion</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'conRes')" href="#">Confirmation</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'fRes')" href="#">Funeral</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'wRes')" href="#">Wedding</a>
                                </nav>
                              </div>

                        <div class="sb-sidenav-menu-heading">Reports</div>
                              <a class="nav-link tablinks" onclick="openCity(event, 'announcement')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-exclamation"></i></div>
                                Announcement
                            </a>
                            <a class="nav-link tablinks" onclick="openCity(event, 'report')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-microphone"></i></div>
                                Report
                            </a>
                    </div>
                    <div class="sb-sidenav-footer">
                          <div class="small">Logged in as:</div>
                          <?php echo $_SESSION['type']; ?>
                      </div>
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
                      <div class="profile-card card rounded-lg shadow p-4 p-xl-5 mb-4 text-center position-relative overflow-hidden">
                        <div class="banner"></div>
                        <img src="images/<?php echo $userIMG; ?>" class="img-circle mx-auto mb-3">
                        <h3 class="mb-4"><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></h3>
                        <div class="text-left mb-4">
                          <p class="mb-2"><i class="fa fa-envelope mr-2"></i><?php echo $_SESSION['email']; ?></p>
                          <p class="mb-2"><i class="fa fa-phone mr-2"></i> +0906 403 0788</p>
                          <p class="mb-2"><i class="fa fa-map-marker-alt mr-2"></i> V. Calingasan Street, Burgos St, Tuy, Batangas</p>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </main>

                <main  class="tabcontent" id="dashboard">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>

                        </div>
                        <div class="row container-fluid align-items-center">

                          <div class="col-xl-5 col-md-12" style="margin-left: 50px;">
                            <div class="card overflow-hidden">
                              <div class="card-content">
                                <div class="card-body cleartfix">
                                  <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                      <img src="images/<?php echo $userIMG; ?>" style="height: 50px; width: 50px; border-radius: 50px; margin-left: 90px; object-fit: cover;">
                                    </div>
                                    <div class="media-body"  style="margin-top: 15px; margin-left: 10px;">
                                      <h3> Welcome <b><?php echo $_SESSION['fname']; ?></b></h3>
                                      </div>
                                      <?php 
                                        }else{
                                          header("Location: login-rev.php");
                                          exit();
                                      }
                                      ?>
                                    <div class="align-self-center">
                                      <h1></h1>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-xl-6 col-md-12">
                            <div class="card overflow-hidden">
                              <div class="card-content">
                                <div class="card-body cleartfix">
                                  <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                      <i class="icon-wallet info font-large-2 mr-2"></i>
                                    </div>
                                    <div class="media-body" style="margin-top: 25px;">
                                      <h4>Total Funds</h4>
                                      <span></span>
                                    </div>
                                    <div class="align-self-center">
                                      <h1>
                                        <?php
                                          $conn = new mysqli("localhost","root","","thesis");
                                              if ($conn->connect_error) {
                                                  die("Connection failed : " . $conn->connect_error);
                                              }
                                              $sql = "SELECT COUNT(*) FROM accounts";
                                              $result = $conn->query($sql);
                                              while($row = mysqli_fetch_array($result)){
                                              echo $row['COUNT(*)'];
                                              }
                                        ?>
                                      </h1>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                           <div class="container-fluid col-xl-3 col-sm-6 col-12"> 
                              <div class="card">
                                <div class="card-content">
                                  <div class="card-body">
                                    <div class="media d-flex">
                                      <div class="align-self-center">
                                        <i class="icon-user success font-large-2 float-right"></i>
                                      </div>
                                      <div class="media-body text-right">
                                        <h3>
                                          <?php
                                                $conn = new mysqli("localhost","root","","thesis");
                                                    if ($conn->connect_error) {
                                                        die("Connection failed : " . $conn->connect_error);
                                                    }
                                                        $sql = "SELECT COUNT(*) FROM accounts";
                                                        $result = $conn->query($sql);
                                                        while($row = mysqli_fetch_array($result)){
                                                        echo $row['COUNT(*)'];
                                                    }
                                            ?> 
                                          </h3>
                                        <span>Accounts</span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12"> 
                              <div class="card">
                                <div class="card-content">
                                  <div class="card-body">
                                    <div class="media d-flex">
                                      <div class="align-self-center">
                                        <i class="icon-bell warning font-large-2 float-left"></i>
                                      </div>
                                      <div class="media-body text-right">
                                        <h3>
                                          <?php
                                                $conn = new mysqli("localhost","root","","thesis");
                                                    if ($conn->connect_error) {
                                                        die("Connection failed : " . $conn->connect_error);
                                                    }
                                                        $sql = "SELECT COUNT(*) FROM announcements";
                                                        $result = $conn->query($sql);
                                                        while($row = mysqli_fetch_array($result)){
                                                        echo $row['COUNT(*)'];
                                                    }
                                            ?> 
                                          </h3>
                                        <span>Announcements</span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12"> 
                              <div class="card">
                                <div class="card-content">
                                  <div class="card-body">
                                    <div class="media d-flex">
                                      <div class="align-self-center">
                                        <i class="icon-book-open primary font-large-2 float-right"></i>
                                      </div>
                                      <div class="media-body text-right">
                                        <h3>
                                          <?php
                                                $conn = new mysqli("localhost","root","","thesis");
                                                    if ($conn->connect_error) {
                                                        die("Connection failed : " . $conn->connect_error);
                                                    }
                                                        $sql = "SELECT COUNT(*) FROM forms";
                                                        $result = $conn->query($sql);
                                                        while($row = mysqli_fetch_array($result)){
                                                        echo $row['COUNT(*)'];
                                                    }
                                            ?> 
                                          </h3>
                                        <span>Requests</span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12"> 
                              <div class="card">
                                <div class="card-content">
                                  <div class="card-body">
                                    <div class="media d-flex">
                                      <div class="align-self-center">
                                        <i class="icon-pencil success font-large-2 float-left"></i>
                                      </div>
                                      <div class="media-body text-right">
                                        <h3>
                                          <?php
                                                $conn = new mysqli("localhost","root","","thesis");
                                                    if ($conn->connect_error) {
                                                        die("Connection failed : " . $conn->connect_error);
                                                    }
                                                        $sql = "SELECT COUNT(*) FROM reports";
                                                        $result = $conn->query($sql);
                                                        while($row = mysqli_fetch_array($result)){
                                                        echo $row['COUNT(*)'];
                                                    }
                                            ?> 
                                          </h3>
                                        <span>Reports</span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </main>

                <!-- NEW TABS -->
                <main  class="tabcontent" id="forms" style="display: none;">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Requested Forms</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Dashboard</a></li>
                            <li class="breadcrumb-item active">Requested Forms</li>
                        </ol>
                        
                      <div class="container py-5 ">
                        <div class="row justify-content-center align-items-center h-100">
                            <div class="card container h-100" style="background: #ECF0F1;">
                              <div class="card-body">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addForms" name="btn-save" id="btn-save myBtn" style="float: right; margin-bottom: 15px;" ><i class="fa-solid fa-plus"></i> Create New</button>
                                <table class="table text-center">
                                 <?php
                                      include_once 'php/config.php';
                                      $result = mysqli_query($conn,"SELECT * FROM forms");
                                        if (mysqli_num_rows($result) > 0) {
                                    ?>
                                    <thead class="thead-dark">
                                      <tr class= "table-dark">
                                        <td scope="col">Firstname</td>
                                        <td scope="col">Lastname</td>
                                        <td scope="col">Address</td>
                                        <td scope="col">Contacts</td>
                                        <td scope="col">Email</td>
                                        <td scope="col">Type</td>
                                        <td scope="col">Status</td>
                                        <td scope="col" colspan="3">Action</td>
                                      </tr>
                                    </thead>
                                      <?php
                                    $i=0;
                                    while($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr class="text-center">
                                      <td><?php echo $row["fname"]; ?></td>
                                      <td><?php echo $row["lname"]; ?></td>
                                      <td><?php echo $row["address"]; ?></td>
                                      <td><?php echo $row["mobilePhone"] ?></td>
                                      <td><?php echo $row["email"]; ?></td>
                                      <td><?php echo $row["formType"]; ?></td>
                                      <td><?php echo $row["status"]; ?></td>
                                      <td>
                                        <button class="btn btn-primary" >
                                          <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                      </td>
                                      <td>
                                        <button class="btn btn-success" >
                                          <i class="fa-solid fa-eye"></i>
                                        </button>
                                      </td>
                                      <td>
                                        <a href="php/deleteForms.php?formsID=<?php echo $row["formsID"]; ?>">
                                              <button class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                              </button>
                                            </a>
                                          </td>
                                    </tr>
                                      <?php
                                        $i++;
                                        }
                                      ?>
                                    </tbody>
                                 <?php
                                }
                                else
                                {
                                    echo "No result found";
                                }
                                ?>
                                    </table>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                </main>

                <main class="tabcontent" id="baptismal" style="display: none;">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Baptismal</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Requested Forms</a></li>
                            <li class="breadcrumb-item active">Baptismal</li>
                        </ol>

                        <div class="container py-5 ">
                        <div class="row justify-content-center align-items-center h-100">
                            <div class="card container h-100" style="background: #ECF0F1;">
                              <div class="card-body">
                                <table class="table text-center">
                                 <?php
                                      include_once 'php/dbconn.php';
                                      $result = mysqli_query($conn,"SELECT * FROM forms WHERE formType = 'Baptismal'");
                                        if (mysqli_num_rows($result) > 0) {
                                    ?>
                                    <thead>
                                      <tr class= "table-dark">
                                        <td scope="col">Firstname</td>
                                        <td scope="col">Lastname</td>
                                        <td scope="col">Address</td>
                                        <td scope="col">Contacts</td>
                                        <td scope="col">Email</td>
                                        <td scope="col">Type</td>
                                        <td scope="col">Status</td>
                                        <td scope="col" colspan="3">Action</td>
                                      </tr>
                                    </thead>
                                      <?php
                                    $i=0;
                                    while($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr class="text-center">
                                      <td><?php echo $row["fname"]; ?></td>
                                      <td><?php echo $row["lname"]; ?></td>
                                      <td><?php echo $row["address"]; ?></td>
                                      <td><?php echo $row["mobilePhone"]; ?></td>
                                      <td><?php echo $row["email"]; ?></td>
                                      <td><?php echo $row["formType"]; ?></td>
                                      <td><?php echo $row["status"]; ?></td>
                                      <td>
                                        <button class="btn btn-primary" >
                                          <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                      </td>
                                      <td>
                                        <button class="btn btn-success" >
                                          <i class="fa-solid fa-eye"></i>
                                        </button>
                                      </td>
                                      <td>
                                        <a href="php/deleteForms.php?formsID=<?php echo $row["formsID"]; ?>">
                                              <button class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                              </button>
                                            </a>
                                          </td>
                                    </tr>
                                      <?php
                                        $i++;
                                        }
                                      ?>
                                    </tbody>
                                 <?php
                                }
                                else
                                {
                                    echo "No result found";
                                }
                                ?>
                                    </table>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                </main>

                <main  class="tabcontent" id="communion" style="display: none;">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Communion</h1>

                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Requested Forms</a></li>
                            <li class="breadcrumb-item active">Communion</li>
                        </ol>

                        <div class="container py-5 ">
                        <div class="row justify-content-center align-items-center h-100">
                            <div class="card container h-100" style="background: #ECF0F1;">
                              <div class="card-body">
                                <table class="table text-center">
                                 <?php
                                      include_once 'php/dbconn.php';
                                      $result = mysqli_query($conn,"SELECT * FROM forms WHERE formType = 'Communion'");
                                        if (mysqli_num_rows($result) > 0) {
                                    ?>
                                    <thead>
                                      <tr class= "table-dark">
                                        <td scope="col">Firstname</td>
                                        <td scope="col">Lastname</td>
                                        <td scope="col">Address</td>
                                        <td scope="col">Contacts</td>
                                        <td scope="col">Email</td>
                                        <td scope="col">Type</td>
                                        <td scope="col">Status</td>
                                        <td scope="col" colspan="3">Action</td>
                                      </tr>
                                    </thead>
                                      <?php
                                    $i=0;
                                    while($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr class="text-center">
                                      <td><?php echo $row["fname"]; ?></td>
                                      <td><?php echo $row["lname"]; ?></td>
                                      <td><?php echo $row["address"]; ?></td>
                                      <td><?php echo $row["mobilePhone"]; ?></td>
                                      <td><?php echo $row["email"]; ?></td>
                                      <td><?php echo $row["formType"]; ?></td>
                                      <td><?php echo $row["status"]; ?></td>
                                      <td>
                                        <button class="btn btn-primary" >
                                          <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                      </td>
                                      <td>
                                        <button class="btn btn-success" >
                                          <i class="fa-solid fa-eye"></i>
                                        </button>
                                      </td>
                                      <td>
                                        <a href="php/deleteForms.php?formsID=<?php echo $row["formsID"]; ?>">
                                              <button class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                              </button>
                                            </a>
                                          </td>
                                    </tr>
                                      <?php
                                        $i++;
                                        }
                                      ?>
                                    </tbody>
                                 <?php
                                }
                                else
                                {
                                    echo "No result found";
                                }
                                ?>
                                    </table>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                </main>

                 <main class="tabcontent" id="funeral" style="display: none;">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Funeral</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Requested Forms</a></li>
                            <li class="breadcrumb-item active">Funeral</li>
                        </ol>
                        <div class="container py-5 ">
                        <div class="row justify-content-center align-items-center h-100">
                            <div class="card container h-100" style="background: #ECF0F1;">
                              <div class="card-body">
                                <table class="table text-center">
                                 <?php
                                      include_once 'php/dbconn.php';
                                      $result = mysqli_query($conn,"SELECT * FROM forms WHERE formType = 'Funeral'");
                                        if (mysqli_num_rows($result) > 0) {
                                    ?>
                                    <thead>
                                      <tr class= "table-dark">
                                        <td scope="col">Firstname</td>
                                        <td scope="col">Lastname</td>
                                        <td scope="col">Address</td>
                                        <td scope="col">Contacts</td>
                                        <td scope="col">Email</td>
                                        <td scope="col">Type</td>
                                        <td scope="col">Status</td>
                                        <td scope="col" colspan="3">Action</td>
                                      </tr>
                                    </thead>
                                      <?php
                                    $i=0;
                                    while($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr class="text-center">
                                      <td><?php echo $row["fname"]; ?></td>
                                      <td><?php echo $row["lname"]; ?></td>
                                      <td><?php echo $row["address"]; ?></td>
                                      <td><?php echo $row["mobilePhone"]; ?></td>
                                      <td><?php echo $row["email"]; ?></td>
                                      <td><?php echo $row["formType"]; ?></td>
                                      <td><?php echo $row["status"]; ?></td>
                                      <td>
                                        <button class="btn btn-primary" >
                                          <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                      </td>
                                      <td>
                                        <button class="btn btn-success" >
                                          <i class="fa-solid fa-eye"></i>
                                        </button>
                                      </td>
                                      <td>
                                        <a href="php/deleteForms.php?formsID=<?php echo $row["formsID"]; ?>">
                                              <button class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                              </button>
                                            </a>
                                          </td>
                                    </tr>
                                      <?php
                                        $i++;
                                        }
                                      ?>
                                    </tbody>
                                 <?php
                                }
                                else
                                {
                                    echo "No result found";
                                }
                                ?>
                                    </table>
                                  </div>
                              </div>
                          </div>
                      </div>      
                    </div>
                </main>

                <main class="tabcontent" id="kumpil" style="display: none;">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Confirmation</h1>

                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Requested Forms</a></li>
                            <li class="breadcrumb-item active">Confirmation</li>
                        </ol>
                        <div class="container py-5 ">
                        <div class="row justify-content-center align-items-center h-100">
                            <div class="card container h-100" style="background: #ECF0F1;">
                              <div class="card-body">
                                <table class="table text-center">
                                 <?php
                                      include_once 'php/dbconn.php';
                                      $result = mysqli_query($conn,"SELECT * FROM forms WHERE formType = 'Confirmation'");
                                        if (mysqli_num_rows($result) > 0) {
                                    ?>
                                    <thead>
                                      <tr class= "table-dark">
                                        <td scope="col">Firstname</td>
                                        <td scope="col">Lastname</td>
                                        <td scope="col">Address</td>
                                        <td scope="col">Contacts</td>
                                        <td scope="col">Email</td>
                                        <td scope="col">Type</td>
                                        <td scope="col">Status</td>
                                        <td scope="col" colspan="3">Action</td>
                                      </tr>
                                    </thead>
                                      <?php
                                    $i=0;
                                    while($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr class="text-center">
                                      <td><?php echo $row["fname"]; ?></td>
                                      <td><?php echo $row["lname"]; ?></td>
                                      <td><?php echo $row["address"]; ?></td>
                                      <td><?php echo $row["mobilePhone"]; ?></td>
                                      <td><?php echo $row["email"]; ?></td>
                                      <td><?php echo $row["formType"]; ?></td>
                                      <td><?php echo $row["status"]; ?></td>
                                      <td>
                                        <button class="btn btn-primary" >
                                          <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                      </td>
                                      <td>
                                        <button class="btn btn-success" >
                                          <i class="fa-solid fa-eye"></i>
                                        </button>
                                      </td>
                                      <td>
                                        <a href="php/deleteForms.php?formsID=<?php echo $row["formsID"]; ?>">
                                              <button class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                              </button>
                                            </a>
                                          </td>
                                    </tr>
                                      <?php
                                        $i++;
                                        }
                                      ?>
                                    </tbody>
                                 <?php
                                }
                                else
                                {
                                    echo "No result found";
                                }
                                ?>
                                    </table>
                                  </div>
                              </div>
                          </div>
                      </div> 
                    </div>
                </main>

                <main class="tabcontent" id="marriage" name="marriage" style="display: none;">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Marriage</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Requested Forms</a></li>
                            <li class="breadcrumb-item active">Marriage</li>
                        </ol>
                        <div class="container py-5 ">
                        <div class="row justify-content-center align-items-center h-100">
                            <div class="card container h-100" style="background: #ECF0F1;">
                              <div class="card-body">
                                <table class="table text-center">
                                 <?php
                                      include_once 'php/dbconn.php';
                                      $result = mysqli_query($conn,"SELECT * FROM forms WHERE formType = 'Wedding'");
                                        if (mysqli_num_rows($result) > 0) {
                                    ?>
                                    <thead>
                                      <tr class= "table-dark">
                                        <td scope="col">Firstname</td>
                                        <td scope="col">Lastname</td>
                                        <td scope="col">Address</td>
                                        <td scope="col">Contacts</td>
                                        <td scope="col">Email</td>
                                        <td scope="col">Type</td>
                                        <td scope="col">Status</td>
                                        <td scope="col" colspan="3">Action</td>
                                      </tr>
                                    </thead>
                                      <?php
                                    $i=0;
                                    while($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr class="text-center">
                                      <td><?php echo $row["fname"]; ?></td>
                                      <td><?php echo $row["lname"]; ?></td>
                                      <td><?php echo $row["address"]; ?></td>
                                      <td><?php echo $row["mobilePhone"]; ?></td>
                                      <td><?php echo $row["email"]; ?></td>
                                      <td><?php echo $row["formType"]; ?></td>
                                      <td><?php echo $row["status"]; ?></td>
                                      <td>
                                        <button class="btn btn-primary" >
                                          <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                      </td>
                                      <td>
                                        <button class="btn btn-success" >
                                          <i class="fa-solid fa-eye"></i>
                                        </button>
                                      </td>
                                      <td>
                                        <a href="php/deleteForms.php?formsID=<?php echo $row["formsID"]; ?>">
                                              <button class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                              </button>
                                            </a>
                                          </td>
                                    </tr>
                                      <?php
                                        $i++;
                                        }
                                      ?>
                                    </tbody>
                                 <?php
                                }
                                else
                                {
                                    echo "No result found";
                                }
                                ?>
                                    </table>
                                  </div>
                              </div>
                          </div>
                      </div> 
                    </div>
                </main>

                <main class="tabcontent" id="transaction" style="display: none;">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Transactions</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Dashboard</a></li>
                            <li class="breadcrumb-item active">Transactions</li>
                        </ol>
                        <div class="container py-5 ">
                          <div class="row justify-content-center align-items-center h-100">
                            <div class="card container h-100" style="background: #ECF0F1;">
                              <div class="card-body">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDonate" name="btn-save" id="btn-save myBtn" style="float: right; margin-bottom: 15px;" ><i class="fa-solid fa-plus"></i> Create New</button>
                                <table class="table text-center">
                                  <?php
                                      include_once 'php/dbconn.php';
                                      $result = mysqli_query($conn,"SELECT * FROM donation");
                                        if (mysqli_num_rows($result) > 0) {
                                    ?>
                                      <thead>
                                        <tr class= "table-dark">
                                          <td scope="col">Firstname</td>
                                          <td scope="col">Lastname</td>
                                          <td scope="col">Amount</td>
                                          <td scope="col">Date</td>
                                          <td scope="col">Receipt</td>
                                          <td scope="col">Event</td>
                                          <td scope="col" colspan="4">Action</td>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                    $i=0;
                                    while($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr class="text-center">
                                      <td><?php echo $row["fname"]; ?></td>
                                      <td><?php echo $row["lname"]; ?></td>
                                      <td><?php echo $row["donateAmount"]; ?></td>
                                      <td><?php echo $row["donateDate"]; ?></td>
                                      <td><?php echo $row["donateReceipt"]; ?></td>
                                      <td><?php echo $row["donateEvent"]; ?></td>
                                      <td>
                                      <td>
                                        <button class="btn btn-primary" >
                                          <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                      </td>
                                      <td>
                                        <a href="php/deleteDonate.php?donateID=<?php echo $row["donateID"]; ?>">
                                              <button class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                              </button>
                                            </a>
                                          </td>
                                        </td>
                                    </tr>
                                      <?php
                                        $i++;
                                        }
                                      ?>
                                    </tbody>
                                 <?php
                                }
                                else
                                {
                                    echo "No result found";
                                }
                                ?>
                                    </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                </main>

                  <main class="tabcontent" id="announcement" style="display: none;">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Announcement</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Dashboard</a></li>
                            <li class="breadcrumb-item active">Announcement</li>
                        </ol>
                        <div class="container py-5 ">
                        <div class="row justify-content-center align-items-center h-100">
                            <div class="card container h-100" style="background: #ECF0F1;">
                              <div class="card-body">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAnnounce" name="btn-save" id="btn-save myBtn" style="float: right; margin-bottom: 15px;" ><i class="fa-solid fa-plus"></i> Create New</button>
                                  <table class="table text-center">
                                    <?php
                                      include_once 'php/dbconn.php';
                                      $result = mysqli_query($conn,"SELECT * FROM announcements");
                                        if (mysqli_num_rows($result) > 0) {
                                    ?>
                                      <thead>
                                        <tr class= "table-dark">
                                          <td scope="col">Announcement Title</td>
                                          <td scope="col">Date</td>
                                          <td scope="col">Time</td>
                                          <td scope="col">Description</td>
                                          <td scope="col" colspan="5">Action</td>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                    $i=0;
                                    while($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr class="text-center">
                                      <td><?php echo $row["announceTitle"]; ?></td>
                                      <td><?php echo $row["announceDate"]; ?></td>
                                      <td><?php echo $row["announceTime"]; ?></td>
                                      <td><?php echo $row["announceDesc"]; ?></td>
                                      <td>
                                      <td>
                                        <a href="php/editAnnounce.php?announceID=<?php echo $row["announceID"]; ?>">
                                          <button class="btn btn-primary">
                                          <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        </a>
                                      </td>
                                      
                                      <td>
                                        <a href="php/deleteAnnouncement.php?announceID=<?php echo $row["announceID"]; ?>">
                                              <button class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                              </button>
                                            </a>
                                          </td>
                                        </td>
                                    </tr>
                                      <?php
                                        $i++;
                                        }
                                      ?>
                                    </tbody>
                                 <?php
                                }
                                else
                                {
                                    echo "No result found";
                                }
                                ?>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

                <main class="tabcontent" id="patron" style="display: none;">
                   <div class="container-fluid px-4">
                        <h1 class="mt-4">Accounts</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Dashboard</a></li>
                            <li class="breadcrumb-item active">Accounts</li>
                        </ol>
                  <div class="container py-5 ">
                          <div class="row justify-content-center align-items-center h-100">
                            <div class="card container h-200" style="background: #ECF0F1;">
                              <div class="card-body">
                                <table class="table">
                                    <?php
                                    include_once 'php/dbconn.php';
                                    $result = mysqli_query($conn,"SELECT * FROM accounts");
                                      if (mysqli_num_rows($result) > 0) {
                                  ?>
                                      <thead>
                                        <tr class= "table-dark text-center">
                                          <td scope="col">Firstname</td>
                                          <td scope="col">Lastname</td>
                                          <td scope="col">Email</td>
                                          <td scope="col">Account Type</td>
                                          <td scope="col" colspan="3">Action</td>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                    $i=0;
                                    while($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr class="text-center">
                                      <td><?php echo $row["fname"]; ?></td>
                                      <td><?php echo $row["lname"]; ?></td>
                                      <td><?php echo $row["email"]; ?></td>
                                      <td><?php echo $row["type"]; ?></td>
                                      <td>
                                      <td>
                                        <a href="php/editPatron.php?user_id=<?php echo $row["user_id"]; ?>">
                                            <button class="btn btn-primary" >
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                        </a>
                                      </td>

                                      <td>
                                        <a href="php/deleteUser.php?user_id=<?php echo $row["user_id"]; ?>">
                                              <button class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                              </button>
                                            </a>
                                          </td>
                                        </td>
                                    </tr>
                                      <?php
                                        $i++;
                                        }
                                      ?>
                                    </tbody>
                                 <?php
                                }
                                else
                                {
                                    echo "No result found";
                                }
                                ?> 
                                    </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                </main>

                <main class="tabcontent" id="report" style="display: none;">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Report</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Dashboard</a></li>
                            <li class="breadcrumb-item active">Report</li>
                        </ol>
                      <div class="container py-5 ">
                        <div class="row justify-content-center align-items-center h-100">
                            <div class="card container h-100" style="background: #ECF0F1;">
                             
                              <div class="card-body">
                               <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addReport" name="btn-save" id="btn-save myBtn" style="float: right; margin-bottom: 15px;" >
                                  <i class="fa-solid fa-plus"></i> Create New
                                </button>
                                
                              <table class="table text-center">
                                <?php
                                  include_once 'php/dbconn.php';
                                  $result = mysqli_query($conn,"SELECT * FROM reports");
                                    if (mysqli_num_rows($result) > 0) {
                                ?>
                                    <thead>
                                          <tr class= table-dark>
                                            <td scope="row">Report Title</td>
                                            <td scope="row">Date</td>
                                            <td scope="row">Time</td>
                                            <td scope="row">Description</td>
                                            <td scope="row" colspan="3">Actions</td>
                                          </tr>
                                        </thead>

                                  <tbody>
                                  <?php
                                    $i=0;
                                    while($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                      <td><?php echo $row["reportTitle"]; ?></td>
                                      <td><?php echo $row["reportDate"]; ?></td>
                                      <td><?php echo $row["reportTime"]; ?></td>
                                      <td><?php echo $row["description"]; ?></td>
                                      <td>
                                      <td>
                                        <a href="php/editReport.php?reportID=<?php echo $row["reportID"]; ?>">
                                          <button class="btn btn-primary" >
                                            <i class="fa-solid fa-pen-to-square"></i>
                                          </button>
                                        </a>
                                      </td>
                                      <td>
                                        <a href="php/deleteReport.php?reportID=<?php echo $row["reportID"]; ?>">
                                              <button class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                              </button>
                                            </a>
                                          </td>
                                        </td>
                                    </tr>
                                      <?php
                                        $i++;
                                        }
                                      ?>
                                    </table>
                                 <?php
                                }
                                else
                                {
                                    echo "No result found";
                                }
                                ?>
                                    
                                  </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </main>

                <main class="tabcontent" id="bRes" style="display: none;">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Baptismal</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Event Reservation</a></li>
                            <li class="breadcrumb-item active">Baptismal</li>
                        </ol>

                        <div class="container py-5 ">
                        <div class="row justify-content-center align-items-center h-100">
                            <div class="card container h-100" style="background: #ECF0F1;">
                              <div class="card-body">
                                <table class="table text-center">
                                 <?php
                                      include_once 'php/dbconn.php';
                                      $result = mysqli_query($conn,"SELECT * FROM eventres WHERE eventName = 'Baptismal'");
                                        if (mysqli_num_rows($result) > 0) {
                                    ?>
                                    <thead>
                                      <tr class= "table-dark">
                                        <td scope="col">Patron name</td>
                                        <td scope="col">Type</td>
                                        <td scope="col">Address</td>
                                        <td scope="col">Contacts</td>
                                        <td scope="col">Email</td>
                                        <td scope="col">Status</td>
                                        <td scope="col" colspan="3">Action</td>
                                      </tr>
                                    </thead>
                                      <?php
                                    $i=0;
                                    while($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr class="text-center">
                                      <td><?php echo $row["name"]; ?></td>
                                      <td><?php echo $row["eventName"]; ?></td>
                                      <td><?php echo $row["address"]; ?></td>
                                      <td><?php echo $row["contactNum"]; ?></td>
                                      <td><?php echo $row["email"]; ?></td>
                                      <td><?php echo $row["status"]; ?></td>
                                      <td>
                                        <button class="btn btn-primary" >
                                          <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                      </td>
                                      <td>
                                        <button class="btn btn-success" >
                                          <i class="fa-solid fa-eye"></i>
                                        </button>
                                      </td>
                                      <td>
                                        <a href="php/deleteReserve.php?eventResID=<?php echo $row["eventResID"]; ?>">
                                              <button class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                              </button>
                                            </a>
                                          </td>
                                    </tr>
                                      <?php
                                        $i++;
                                        }
                                      ?>
                                    </tbody>
                                 <?php
                                }
                                else
                                {
                                    echo "No result found";
                                }
                                ?>
                                    </table>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                </main>
                <main class="tabcontent" id="blRes" style="display: none;">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Blessing</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Event Reservation</a></li>
                            <li class="breadcrumb-item active">Blessing</li>
                        </ol>

                        <div class="container py-5 ">
                        <div class="row justify-content-center align-items-center h-100">
                            <div class="card container h-100" style="background: #ECF0F1;">
                              <div class="card-body">
                                <table class="table text-center">
                                 <?php
                                      include_once 'php/dbconn.php';
                                      $result = mysqli_query($conn,"SELECT * FROM eventres WHERE eventName = 'Blessing'");
                                        if (mysqli_num_rows($result) > 0) {
                                    ?>
                                    <thead>
                                      <tr class= "table-dark">
                                        <td scope="col">Patron name</td>
                                        <td scope="col">Type</td>
                                        <td scope="col">Address</td>
                                        <td scope="col">Contacts</td>
                                        <td scope="col">Email</td>
                                        <td scope="col">Status</td>
                                        <td scope="col" colspan="3">Action</td>
                                      </tr>
                                    </thead>
                                      <?php
                                    $i=0;
                                    while($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr class="text-center">
                                      <td><?php echo $row["name"]; ?></td>
                                      <td><?php echo $row["eventName"]; ?></td>
                                      <td><?php echo $row["address"]; ?></td>
                                      <td><?php echo $row["contactNum"]; ?></td>
                                      <td><?php echo $row["email"]; ?></td>
                                      <td><?php echo $row["status"]; ?></td>
                                      <td>
                                        <button class="btn btn-primary" >
                                          <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                      </td>
                                      <td>
                                        <button class="btn btn-success" >
                                          <i class="fa-solid fa-eye"></i>
                                        </button>
                                      </td>
                                      <td>
                                        <a href="php/deleteReserve.php?eventResID=<?php echo $row["eventResID"]; ?>">
                                              <button class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                              </button>
                                            </a>
                                          </td>
                                    </tr>
                                      <?php
                                        $i++;
                                        }
                                      ?>
                                    </tbody>
                                 <?php
                                }
                                else
                                {
                                    echo "No result found";
                                }
                                ?>
                                    </table>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                </main>
                <main class="tabcontent" id="comRes" style="display: none;">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Communion</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Event Reservation</a></li>
                            <li class="breadcrumb-item active">Communion</li>
                        </ol>

                        <div class="container py-5 ">
                        <div class="row justify-content-center align-items-center h-100">
                            <div class="card container h-100" style="background: #ECF0F1;">
                              <div class="card-body">
                                <table class="table text-center">
                                 <?php
                                      include_once 'php/dbconn.php';
                                      $result = mysqli_query($conn,"SELECT * FROM eventres WHERE eventName = 'Communion'");
                                        if (mysqli_num_rows($result) > 0) {
                                    ?>
                                    <thead>
                                      <tr class= "table-dark">
                                        <td scope="col">Patron name</td>
                                        <td scope="col">Type</td>
                                        <td scope="col">Address</td>
                                        <td scope="col">Contacts</td>
                                        <td scope="col">Email</td>
                                        <td scope="col">Status</td>
                                        <td scope="col" colspan="3">Action</td>
                                      </tr>
                                    </thead>
                                      <?php
                                    $i=0;
                                    while($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr class="text-center">
                                      <td><?php echo $row["name"]; ?></td>
                                      <td><?php echo $row["eventName"]; ?></td>
                                      <td><?php echo $row["address"]; ?></td>
                                      <td><?php echo $row["contactNum"]; ?></td>
                                      <td><?php echo $row["email"]; ?></td>
                                      <td><?php echo $row["status"]; ?></td>
                                      <td>
                                        <button class="btn btn-primary" >
                                          <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                      </td>
                                      <td>
                                        <button class="btn btn-success" >
                                          <i class="fa-solid fa-eye"></i>
                                        </button>
                                      </td>
                                      <td>
                                        <a href="php/deleteReserve.php?eventResID=<?php echo $row["eventResID"]; ?>">
                                              <button class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                              </button>
                                            </a>
                                          </td>
                                    </tr>
                                      <?php
                                        $i++;
                                        }
                                      ?>
                                    </tbody>
                                 <?php
                                }
                                else
                                {
                                    echo "No result found";
                                }
                                ?>
                                    </table>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                </main>

                <main class="tabcontent" id="fRes" style="display: none;">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Funeral</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Event Reservation</a></li>
                            <li class="breadcrumb-item active">Funeral</li>
                        </ol>

                        <div class="container py-5 ">
                        <div class="row justify-content-center align-items-center h-100">
                            <div class="card container h-100" style="background: #ECF0F1;">
                              <div class="card-body">
                                <table class="table text-center">
                                 <?php
                                      include_once 'php/dbconn.php';
                                      $result = mysqli_query($conn,"SELECT * FROM eventres WHERE eventName = 'Funeral'");
                                        if (mysqli_num_rows($result) > 0) {
                                    ?>
                                    <thead>
                                      <tr class= "table-dark">
                                        <td scope="col">Patron name</td>
                                        <td scope="col">Type</td>
                                        <td scope="col">Address</td>
                                        <td scope="col">Contacts</td>
                                        <td scope="col">Email</td>
                                        <td scope="col">Status</td>
                                        <td scope="col" colspan="3">Action</td>
                                      </tr>
                                    </thead>
                                      <?php
                                    $i=0;
                                    while($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr class="text-center">
                                      <td><?php echo $row["name"]; ?></td>
                                      <td><?php echo $row["eventName"]; ?></td>
                                      <td><?php echo $row["address"]; ?></td>
                                      <td><?php echo $row["contactNum"]; ?></td>
                                      <td><?php echo $row["email"]; ?></td>
                                      <td><?php echo $row["status"]; ?></td>
                                      <td>
                                        <button class="btn btn-primary" >
                                          <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                      </td>
                                      <td>
                                        <button class="btn btn-success" >
                                          <i class="fa-solid fa-eye"></i>
                                        </button>
                                      </td>
                                      <td>
                                        <a href="php/deleteReserve.php?eventResID=<?php echo $row["eventResID"]; ?>">
                                              <button class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                              </button>
                                            </a>
                                          </td>
                                    </tr>
                                      <?php
                                        $i++;
                                        }
                                      ?>
                                    </tbody>
                                 <?php
                                }
                                else
                                {
                                    echo "No result found";
                                }
                                ?>
                                    </table>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                </main>
                <main class="tabcontent" id="wRes" style="display: none;">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Weddding</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Event Reservation</a></li>
                            <li class="breadcrumb-item active">Weddding</li>
                        </ol>

                        <div class="container py-5 ">
                        <div class="row justify-content-center align-items-center h-100">
                            <div class="card container h-100" style="background: #ECF0F1;">
                              <div class="card-body">
                                <table class="table text-center">
                                 <?php
                                      include_once 'php/dbconn.php';
                                      $result = mysqli_query($conn,"SELECT * FROM eventres WHERE eventName = 'Wedding'");
                                        if (mysqli_num_rows($result) > 0) {
                                    ?>
                                    <thead>
                                      <tr class= "table-dark">
                                        <td scope="col">Patron name</td>
                                        <td scope="col">Type</td>
                                        <td scope="col">Address</td>
                                        <td scope="col">Contacts</td>
                                        <td scope="col">Email</td>
                                        <td scope="col">Status</td>
                                        <td scope="col" colspan="3">Action</td>
                                      </tr>
                                    </thead>
                                      <?php
                                    $i=0;
                                    while($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr class="text-center">
                                      <td><?php echo $row["name"]; ?></td>
                                      <td><?php echo $row["eventName"]; ?></td>
                                      <td><?php echo $row["address"]; ?></td>
                                      <td><?php echo $row["contactNum"]; ?></td>
                                      <td><?php echo $row["email"]; ?></td>
                                      <td><?php echo $row["status"]; ?></td>
                                      <td>
                                        <button class="btn btn-primary" >
                                          <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                      </td>
                                      <td>
                                        <button class="btn btn-success" >
                                          <i class="fa-solid fa-eye"></i>
                                        </button>
                                      </td>
                                      <td>
                                        <a href="php/deleteReserve.php?eventResID=<?php echo $row["eventResID"]; ?>">
                                              <button class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                              </button>
                                            </a>
                                          </td>
                                    </tr>
                                      <?php
                                        $i++;
                                        }
                                      ?>
                                    </tbody>
                                 <?php
                                }
                                else
                                {
                                    echo "No result found";
                                }
                                ?>
                                    </table>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                </main>
                <main class="tabcontent" id="conRes" style="display: none;">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Baptismal</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Event Reservation</a></li>
                            <li class="breadcrumb-item active">Baptismal</li>
                        </ol>

                        <div class="container py-5 ">
                        <div class="row justify-content-center align-items-center h-100">
                            <div class="card container h-100" style="background: #ECF0F1;">
                              <div class="card-body">
                                <table class="table text-center">
                                 <?php
                                      include_once 'php/dbconn.php';
                                      $result = mysqli_query($conn,"SELECT * FROM eventres WHERE eventName = 'Confirmation'");
                                        if (mysqli_num_rows($result) > 0) {
                                    ?>
                                    <thead>
                                      <tr class= "table-dark">
                                        <td scope="col">Patron name</td>
                                        <td scope="col">Type</td>
                                        <td scope="col">Address</td>
                                        <td scope="col">Contacts</td>
                                        <td scope="col">Email</td>
                                        <td scope="col">Status</td>
                                        <td scope="col" colspan="3">Action</td>
                                      </tr>
                                    </thead>
                                      <?php
                                    $i=0;
                                    while($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr class="text-center">
                                      <td><?php echo $row["name"]; ?></td>
                                      <td><?php echo $row["eventName"]; ?></td>
                                      <td><?php echo $row["address"]; ?></td>
                                      <td><?php echo $row["contactNum"]; ?></td>
                                      <td><?php echo $row["email"]; ?></td>
                                      <td><?php echo $row["status"]; ?></td>
                                      <td>
                                        <button class="btn btn-primary" >
                                          <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                      </td>
                                      <td>
                                        <button class="btn btn-success" >
                                          <i class="fa-solid fa-eye"></i>
                                        </button>
                                      </td>
                                      <td>
                                        <a href="php/deleteReserve.php?eventResID=<?php echo $row["eventResID"]; ?>">
                                              <button class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                              </button>
                                            </a>
                                          </td>
                                    </tr>
                                      <?php
                                        $i++;
                                        }
                                      ?>
                                    </tbody>
                                 <?php
                                }
                                else
                                {
                                    echo "No result found";
                                }
                                ?>
                                    </table>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                </main>
                <main  class="tabcontent" id="eventRes" style="display: none;">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Event Reservation</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Dashboard</a></li>
                            <li class="breadcrumb-item active">Event Reservation</li>
                        </ol>
                        
                      <div class="container py-5 ">
                        <div class="row justify-content-center align-items-center h-100">
                            <div class="card container h-100" style="background: #ECF0F1;">
                              <div class="card-body">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRes" name="btn-save" id="btn-save myBtn" style="float: right; margin-bottom: 15px;" ><i class="fa-solid fa-plus"></i> Add Reservation</button>
                                <table class="table text-center">
                                 <?php
                                      include_once 'php/config.php';
                                      $result = mysqli_query($conn,"SELECT * FROM eventres");
                                        if (mysqli_num_rows($result) > 0) {
                                    ?>
                                    <thead class="thead-dark">
                                      <tr class= "table-dark">
                                        <td scope="col">Name</td>
                                        <td scope="col">Event</td>
                                        <td scope="col">Date</td>
                                        <td scope="col">Time</td>
                                        <td scope="col">Contact</td>
                                        <td scope="col">Address</td>
                                        <td scope="col">Email</td>
                                        <td scope="col" colspan="3">Action</td>
                                      </tr>
                                    </thead>
                                      <?php
                                    $i=0;
                                    while($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr class="text-center">
                                      <td><?php echo $row["name"]; ?></td>
                                      <td><?php echo $row["eventName"]; ?></td>
                                      <td><?php echo $row["eventDate"]; ?></td>
                                      <td><?php echo $row["eventTime"] ?></td>
                                      <td><?php echo $row["contactNum"]; ?></td>
                                      <td><?php echo $row["address"]; ?></td>
                                      <td><?php echo $row["email"]; ?></td>
                                      <td>
                                      <a href="php/editRes.php?eventResID=<?php echo $row["eventResID"]; ?>">
                                        <button class="btn btn-primary" >
                                          <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                      </a>
                                      </td>
                                      <td>
                                        <button class="btn btn-success" >
                                          <i class="fa-solid fa-eye"></i>
                                        </button>
                                      </td>
                                      <td>
                                        <a href="php/deleteReserve.php?eventResID=<?php echo $row["eventResID"]; ?>">
                                              <button class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                              </button>
                                            </a>
                                          </td>
                                    </tr>
                                      <?php
                                        $i++;
                                        }
                                      ?>
                                    </tbody>
                                 <?php
                                }
                                else
                                {
                                    echo "No result found";
                                }
                                ?>
                                    </table>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                </main>

                
        <div class="modal" id="addForms">
          <div class="modal-dialog ">
            <div class="modal-content">
              <section>
                <div class="container">
                  <div class="row justify-content-center align-items-center h-100">
                    <div class="card container h-100" style="background: #f1f1f1;">

                      <button type="button" id="btn1" class="btn-close" data-bs-dismiss="modal" style="margin-top: 10px; margin-left: 450px; float: left; cursor: pointer; " ></button>
                    <div class="card-body">
                      <h2>Request Forms</h2>

                      <form class="" action="php/addReqForm.php" method="post" enctype="multipart/form-data">
                        <div class="row my-3">
                          <div class="col-md-6">
                              <div class="form-outline">
                                  <label class="form-label" for="typeText">
                                    <i class="fa-solid fa-user"></i> 
                                    First name
                                  </label>
                                <input class="form-control" type="text" id="fname" name="fname" placeholder="Enter firstname"  autocomplete="off" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText">
                                  <i class="fa-solid fa-user"></i> 
                                    Lastname
                                </label>
                    <input class="form-control" type="text" id="lname" name="lname" placeholder="Enter lastname" autocomplete="off" required />
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-home"></i> Address</label>
                                <input class="form-control" type="text" id="address" name="address" placeholder="Enter address"  autocomplete="off" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-phone"></i> Contact Number</label>
                                <input class="form-control" type="text" id="mobilePhone" name="mobilePhone" placeholder="Enter contact number"  autocomplete="off" required />
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-envelope"></i> E-mail</label>
                                <input class="form-control" type="tel" id="email" name="email" placeholder="Enter email" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                              <label class="form-label" for="typeText"><i class="fa-solid fa-calendar"></i> Event</label>
                                <select class="form-control" id="formType" name="formType"required>
                                    <option value=""></option>
                                    <option value="Baptismal">Baptismal</option>
                                    <option value="Communion">Communion</option>
                                    <option value="Confirmation">Confirmation</option>
                                    <option value="Funeral">Funeral</option>
                                    <option value="Wedding">Wedding</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-money-bill-1-wave"></i> Reference Number</label>
                                <input class="form-control" type="text" id="refNum" name="refNum" placeholder="Enter reference number" autocomplete="off" required>
                            </div>
                        </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-money-bill-1-wave"></i>Amount Price</label>
                                <input class="form-control" type="text" id="amount" name="amount" placeholder="Enter amount" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                                        
                    <div class="row my-3">
                        <div class="col-md-6">
                            <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-receipt"></i>
                                  Receipt
                                </label>
                                <input class="form-control"type="file"id="receiptIMG" name="receiptIMG"placeholder="Pick receipt" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-heart"></i> Status</label>
                                    <select class="form-control" id="status" name="status" required>
                                      <option value=""></option>
                                      <option value="Disapproved">Disapproved</option>
                                      <option value="Approved">Approved</option>
                                      <option value="Pending">Pending</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">             
                          <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Submit</button>  
                        </div>
                                                 
                      </form>
                                          
                    </div>

                  </div> 
                  </div>
                </div>
              </section>
            </div>
          </div>
        </div>

        <div class="modal" id="addReport">
          <div class="modal-dialog ">
            <div class="modal-content">
              <section>
                <div class="container">
                  <div class="row justify-content-center align-items-center h-100">
                    <div class="card container h-100" style="background: #f1f1f1;">

                      <button type="button" id="btn1" class="btn-close" data-bs-dismiss="modal" style="margin-top: 25px; margin-left: 450px; float: left; cursor: pointer; " ></button>
                    <div class="card-body">
                      <h1>Report</h1>

                      <form class="" action="php/addReport.php" method="post">
                            <div class="md-3">
                              <p>
                                <i class="fa-solid fa-pen"></i> 
                                  Title
                                <input class="form-control" type="text" id="reportTitle" name="reportTitle" placeholder="Enter the report title" required>
                              </p>
                              <p>
                                <i class="fa-solid fa-calendar-days" class="form-control"></i> 
                                  Date
                                <input type="date"  class="form-control datetime" id="reportDate" name="reportDate" required>
                              </p>
                              <p>
                                <i class="fa-solid fa-business-time"></i>
                                  Time
                                <input type="time"  class="form-control" id="reportTime" name="reportTime" required>
                              </p>
                                                
                            </div>

                            <div class="md-3">
                                <div class="mb-3">
                                    <p>
                                      <i class="fa-solid fa-circle-info"></i>
                                        Description
                                      <textarea rows="2" class="form-control form" name="description" required></textarea>
                                    </p>
                                       
                            </div>  

                            <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Submit</button>  
                        </div>
                                                 
                      </form>
                                          
                    </div>

                  </div> 
                  </div>
                </div>
              </section>
            </div>
          </div>
        </div> 
          <div class="modal" id="addAnnounce" >
            <div class="container">
              <div class="modal-dialog">
                 <div class="modal-content">
                   <section>
                                 <div class="container">
                                   <div class="row align-items-center h-100">
                                     <div class="card container h-100" style="background: #FFFFFF;">

                                        <button type="button" id="btn1" class="btn-close" data-bs-dismiss="modal" style="margin-top: 25px; margin-left: 450px; float: right; cursor: pointer; " ></button>
                                      <div class="card-body">
                                        <h4>Announcements</h4>

                                        <form class="" action="php/addAnnounce.php" method="POST">

                                              <div class="md-3" style="margin-bottom: 10px;">
                                                <p>
                                                  <i class="fa-solid fa-pen"></i>
                                                   Title
                                                    <input class="form-control" type="text" id="announceTitle" name="announceTitle" placeholder="Enter the announcement title" required>
                                                </p>
                                                <p>
                                                  <i class="fa-solid fa-calendar-days" class="form-control"></i>
                                                   Date
                                                  <input type="date"  class="form-control datetime" name="announceDate" required>
                                                </p>
                                                <p>
                                                  <i class="fa-solid fa-business-time"></i>
                                                   Time
                                                  <input type="time"  class="form-control" name="announceTime" required>
                                                </p>
                                                
                                              </div>
                                              <div class="md-3">
                                                  <div class="md-3">
                                                      <p><i class="fa-solid fa-pen-to-square"></i> Description
                                                        <textarea class="form-control" name="announceDesc" id="announceDesc" required></textarea>
                                                  </p>
                                                </p>
                                              </div>
                                              <div class="md-3">
                                              </div>
                                              <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Submit</button>
                                          </div>  
                                        </form>
                                      </div>

                                    </div> 
                                   </div>
                                 </div>
                                </section>
                 </div>             
              </div> 
            </div>         
          </div>

          <div class="modal" id="addRes">
          <div class="modal-dialog ">
            <div class="modal-content">
              <section>
                <div class="container">
                  <div class="row justify-content-center align-items-center h-100">
                    <div class="card container h-100" style="background: #f1f1f1;">

                      <button type="button" id="btn1" class="btn-close" data-bs-dismiss="modal" style="margin-top: 25px; margin-left: 450px; float: left; cursor: pointer; " ></button>
                    <div class="card-body">
                      <h1>Reservation</h1>
                      <hr>

                      <form class="" action="php/addReserve.php" method="post" enctype="multipart/form-data">
                            <div class="row my-3">
                          <div class="col-md-6">
                              <div class="form-outline">
                                  <label class="form-label" for="typeText">
                                    <i class="fa-solid fa-user"></i> 
                                    Full name
                                  </label>
                                <input class="form-control" type="text" id="name" name="name" placeholder="Enter your name"  autocomplete="off" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText">
                                  <i class="fa-solid fa-calendar-days"></i> 
                                    Event
                                </label>
                                <select class="form-control" id="eventName" name="eventName" required>
                                    <option value=""></option>
                                    <option value="Baptismal">Baptismal</option>
                                    <option value="Blessing">Blessing</option>
                                    <option value="Communion">Communion</option>
                                    <option value="Confirmation">Confirmation</option>
                                    <option value="Funeral">Funeral</option>
                                    <option value="Wedding">Wedding</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-calendar"></i> Date</label>
                                <input class="form-control" type="date" id="eventDate" name="eventDate"  autocomplete="off" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fas fa-clock"></i> Time</label>
                                <input class="form-control" type="time" id="eventTime" name="eventTime"  autocomplete="off" required />
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-phone"></i> Contact</label>
                                <input class="form-control" type="text" id="contactNum" name="contactNum" placeholder="Enter contact number" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-envelope"></i>
                                  Email
                                </label>
                                <input class="form-control"type="text"id="email" name="email"placeholder="Enter email" required>
                            </div>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-md-12">
                          <div class="form-outline">
                              <label class="form-label" for="typeText"><i class="fa-solid fa-home"></i> Address</label>
                                <input class="form-control" type="text" id="address" name="address" placeholder="Enter address" autocomplete="off" required>
                            </div>
                        </div>

                      <div class="col-md-12">
                        <div class="form-outline">
                            <label class="form-label" for="typeText"><i class="fa-solid fa-users"></i> Sponsor</label>
                            <input class="form-control" type="text" id="sponsored" name="sponsored" placeholder="Enter sponsor" autocomplete="off" required>
                          </div>
                      </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText">
                                  <i class="fa-solid fa-box"></i> 
                                    Package
                                </label>
                                <select class="form-control" id="package" name="package" required>
                                    <option value=""></option>
                                    <option value="Baptismal">Baptismal</option>
                                    <option value="Blessing">Blessing</option>
                                    <option value="Communion">Communion</option>
                                    <option value="Confirmation">Confirmation</option>
                                    <option value="Funeral">Funeral</option>
                                    <option value="Wedding">Wedding</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-money-bill-1-wave"></i> Amount Price</label>
                                <input class="form-control" type="text" id="amount" name="amount" placeholder="Enter amount" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                                        
                      <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-heart"></i> Status</label>
                                    <select class="form-control" id="status" name="status" required>
                                      <option value=""></option>
                                      <option value="Disapproved">Disapproved</option>
                                      <option value="Approved">Approved</option>
                                      <option value="Pending">Pending</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                      <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText">
                                <i class="fa-solid fa-folder-open"></i>
                                  Credential
                                </label>
                                <input class="form-control" type="file" id="credentialfile" name="credentialfile" required>
                            </div>
                        </div>

                        <div class="form-group mb-2">             
                          <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right; margin-top: 10px;">Submit</button>  
                        </div>
                                                 
                      </form>
                                          
                    </div>

                  </div> 
                  </div>
                </div>
              </section>
            </div>
          </div>
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


                <!-- END OF TABS -->
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Saint Vincent Ferrer Parish (2023)</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/dashboard.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
         <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/demo/chart-pie-demo.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>