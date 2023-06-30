<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/admin.ico" />
        <title>Saint Vincent Ferrer Church | Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/dashboard.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css”>
    </head>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="dashboard.php">Saint Vincent Parish</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                      <i class="fa-solid fa-user"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                          <a class="dropdown-item" href="#!">
                          Profile 
                          </a>
                        </li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="php/logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- sidebar -->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">

                            <div class="sb-sidenav-menu-heading">Welcome to admin</div>
                            <div class="sb-sidenav-menu-heading">Home</div>
                            <a class="nav-link tablinks" onclick="openCity(event, 'dashboard')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                                Dashboard
                            </a>

                            <a class="nav-link tablinks" onclick="openCity(event, 'patron')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                                Patrons
                            </a>
                            <a class="nav-link tablinks" onclick="openCity(event, 'announcement')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-exclamation"></i></div>
                                Announcement
                            </a>
                            <a class="nav-link tablinks" onclick="openCity(event, 'report')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-microphone"></i></div>
                                Report
                            </a>

                            <div class="sb-sidenav-menu-heading">Forms Approval</div>
                            <a class="nav-link tablinks" onclick="openCity(event, '')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-check-to-slot"></i></div>
                                Approval
                            </a>

                            
                            <div class="sb-sidenav-menu-heading">Credentials</div>
                            <a onclick="openCity(event, 'forms')" class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">

                                <div class="sb-nav-link-icon"><i class="fa-solid fa-folder-open"></i></div>
                                Request Forms
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link tablinks" onclick="openCity(event, 'baptismal')" href="#">Baptismal</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'communion')" href="#">Communion</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'funeral')" href="#">Funeral</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'kumpil')" href="#">Kumpil</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'marriage')" href="#">Marriage</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Transactions 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                          <div class="collapse" id="collapseLayouts" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">  
                              <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                  <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link tablinks" onclick="openCity(event, 'baptismal')" href="#">Baptismal</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'funeral')" href="#">Funeral</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'kumpil')" href="#">Kumpil</a>
                                    <a class="nav-link tablinks" onclick="openCity(event, 'marriage')" href="#">Marriage</a>
                                </nav>
                              </div>
                           </nav>
                        </div>
                    </div>
                </nav>
            </div>


            <div id="layoutSidenav_content">

                <!-- Start of the tabs -->
                <main  class="tabcontent" id="dashboard">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <hr>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">
                                        <i class="fa-solid fa-user"></i> 
                                        Patrons
                                        <div style="float: right;">
                                            <span>
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
                                          </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">
                                        <i class="fa-solid fa-circle-exclamation"></i> 
                                        Announcements
                                        <div style="float: right;">
                                            <span><?php
                                                $conn = new mysqli("localhost","root","","thesis");
                                                    if ($conn->connect_error) {
                                                        die("Connection failed : " . $conn->connect_error);
                                                    }
                                                        $sql = "SELECT COUNT(*) FROM announcements";
                                                        $result = $conn->query($sql);
                                                        while($row = mysqli_fetch_array($result)){
                                                        echo $row['COUNT(*)'];
                                                    }
                                            ?>  </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"><i class="fa-solid fa-folder-open"></i> 
                                    Request Forms
                                <div style="float: right;">
                                        <span>
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
                                        </span>
                                    </div>
                                </div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">
                                        <i class="fa-solid fa-microphone"></i>
                                        Reports
                                        <div style="float: right;">
                                            <span><?php
                                                $conn = new mysqli("localhost","root","","thesis");
                                                    if ($conn->connect_error) {
                                                        die("Connection failed : " . $conn->connect_error);
                                                    }
                                                        $sql = "SELECT COUNT(*) FROM reports";
                                                        $result = $conn->query($sql);
                                                        while($row = mysqli_fetch_array($result)){
                                                        echo $row['COUNT(*)'];
                                                    }
                                            ?>  </span>
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
                <main  class="tabcontent" id="forms">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Requested Forms</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Dashboard</a></li>
                            <li class="breadcrumb-item active">Requested Forms</li>
                        </ol>
                        <hr>
                        
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
                                    <thead>
                                      <tr class= "table-dark">
                                        <td scope="col">Firstname</td>
                                        <td scope="col">Lastname</td>
                                        <td scope="col">Address</td>
                                        <td scope="col">Mobile Phone</td>
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

                <main  class="tabcontent" id="baptismal">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Baptismal</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Baptismal</li>
                        </ol>
                        <hr>

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
                                        <td scope="col">Mobile Phone</td>
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

                <main  class="tabcontent" id="communion">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Communion</h1>
                        <ol class="breadcrumb mb-4">
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
                                        <td scope="col">Mobile Phone</td>
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

                 <main  class="tabcontent" id="funeral">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Funeral</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Funeral</li>
                        </ol>
                        <hr> 
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
                                        <td scope="col">Mobile Phone</td>
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

                <main  class="tabcontent" id="kumpil">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Kumpil</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Kumpil</li>
                        </ol>
                        <hr>
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
                                        <td scope="col">Mobile Phone</td>
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

                <main  class="tabcontent" id="marriage" name="marriage">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Marriage</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Marriage</li>
                        </ol>
                        <hr>
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
                                        <td scope="col">Mobile Phone</td>
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

                <main  class="tabcontent" id="transaction">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Transactions</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Dashboard</a></li>
                            <li class="breadcrumb-item active">Transactions</li>
                        </ol>
                        <hr>
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
                                        <a href="php/deleteUser.php?donateID=<?php echo $row["donateID"]; ?>">
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

                  <main  class="tabcontent" id="announcement">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Announcement</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Dashboard</a></li>
                            <li class="breadcrumb-item active">Announcement</li>
                        </ol>
                        <hr>
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
                                        <button class="btn btn-success" >
                                          <i class="fa-solid fa-eye"></i>
                                        </button>
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

                <main class="tabcontent" id="patron">
                   <div class="container-fluid px-4">
                        <h1 class="mt-4">Patrons</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Dashboard</a></li>
                            <li class="breadcrumb-item active">Patrons</li>
                        </ol>
                      <hr>
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
                                        <button class="btn btn-primary" >
                                          <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
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

                <main  class="tabcontent" id="report">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Report</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Dashboard</a></li>
                            <li class="breadcrumb-item active">Report</li>
                        </ol>
                        <hr>
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
                                        <button class="btn btn-primary" >
                                          <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
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
                                        <hr>
                                        <form class="" action="php/addReqForm.php" method="post">
                                          <div class="row my-3">
                                            <div class="col-md-6">
                                                <div class="form-outline">
                                                    <label class="form-label" for="typeText"><i class="fa-solid fa-user"></i> First name</label>
                                                    <input class="form-control" type="text" id="fname" name="fname" placeholder="Enter firstname" required autocomplete="off" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-outline">
                                                    <label class="form-label" for="typeText"><i class="fa-solid fa-user"></i> Surname</label>
                                                    <input class="form-control" type="text" id="lname" name="lname" placeholder="Enter lastname" required autocomplete="off" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            <div class="col-md-12">
                                                <div class="form-outline">
                                                    <label class="form-label" for="typeText"><i class="fa-solid fa-home"></i> Address</label>
                                                    <input class="form-control" type="text" id="address" name="address" placeholder="Enter address" required autocomplete="off" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            <div class="col-md-12">
                                                <div class="form-outline">
                                                    <label class="form-label" for="typeText"><i class="fa-solid fa-phone"></i> Contact Number</label>
                                                    <input class="form-control" type="text" id="mobilePhone" name="mobilePhone" placeholder="Enter contact number" required autocomplete="off" />
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
                                                    <select class="form-control" id="formType" name="formType">
                                                        <option value=""></option>
                                                        <option value="Baptismal">Baptismal</option>
                                                        <option value="Confirmation">Confirmation</option>
                                                        <option value="Communion">Communion</option>
                                                        <option value="Funeral">Funeral</option>
                                                        <option value="Wedding">Wedding</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            <div class="col-md-12">
                                                <div class="form-outline">
                                                  <label class="form-label" for="typeText">
                                                    <i class="fa-solid fa-credit-card"></i>
                                                    Payment Type
                                                  </label>
                                                    <select class="form-control" id="optionPay" name="optionPay">
                                                      <option value=""></option>
                                                      <option value="Face-to-face">Face-to-face</option>
                                                      <option value="GCash">GCash</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-outline">
                                                    <label class="form-label" for="typeText"><i class="fa-solid fa-money-bill-1-wave"></i> Reference Number</label>
                                                    <input class="form-control" type="text" id="refNum" name="refNum" placeholder="Enter reference number" autocomplete="off" required>
                                                </div>
                                            </div><div class="col-md-6">
                                                <div class="form-outline">
                                                    <label class="form-label" for="typeText"><i class="fa-solid fa-money-bill-1-wave"></i>Amount Price</label>
                                                    <input class="form-control" type="text" id="amount" name="amount" placeholder="Enter amount" autocomplete="off" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                           <div class="col-md-12">
                                                <div class="form-outline">
                                                    <label class="form-label" for="typeText"><i class="fa-solid fa-box-open"></i> Package</label>
                                                    <select class="form-control" id="pack" name="pack">
                                                        <option value=""></option>
                                                        <option value="Baptismal Package">Baptism Package</option>
                                                        <option value="Confimation Package">Confirmation Package</option>
                                                        <option value="Communion Package">Communion Package</option>
                                                        <option value="Funeral Package">Funeral Package</option>
                                                        <option value="Wedding Package">Wedding Package</option>
                                                    </select>
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
                                                    <input class="form-control" type="file" id="receiptIMG" name="receiptIMG" placeholder="Pick receipt">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-outline">
                                                  <label class="form-label" for="typeText"><i class="fa-solid fa-heart"></i> Status</label>
                                                    <select class="form-control" id="status" name="status">
                                                      <option value=""></option>
                                                      <option value="Disapproved">Disapproved</option>
                                                      <option value="Approved">Approved</option>
                                                      <option value="Pending">Pending</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                <!-- This tags supports the system -->
                                <div class="form-group mb-2">  
                                      <div class="md-3">

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
                                        <hr>
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

        <div class="modal" id="addDonate">
          <div class="modal-dialog ">
            <div class="modal-content">
                                <section>
                                 <div class="container">
                                   <div class="row justify-content-center align-items-center h-100">
                                     <div class="card container h-100" style="background: #f1f1f1;">

                                        <button type="button" id="btn1" class="btn-close" data-bs-dismiss="modal" style="margin-top: 25px; margin-left: 450px; float: left; cursor: pointer; " ></button>
                                      <div class="card-body">

                                        <h1>Transactions</h1>
                                        <hr>

                                         <form class="" action="php/insertDonate.php" method="post">
                                           <div class="md-3">
                                                <p>
                                                  <i class="fa-solid fa-user"></i> 
                                                    Firstname
                                                  <input class="form-control" type="text" id="fname" name="fname" placeholder="Enter firstname" required>
                                                </p>
                                                <p>
                                                  <i class="fa-solid fa-user"></i> 
                                                    Lastname
                                                  <input class="form-control" type="text" id="lname" name="lname" placeholder="Enter lastname" required>
                                                </p>
                                                <p>
                                                  <i class="fa-solid fa-money-bill-1-wave"></i> 
                                                    Donation Amount
                                                  <input class="form-control" type="text" id="donateAmount" name="donateAmount" placeholder="Enter donation amount" required>
                                                </p>
                                                <p>
                                                  <i class="fa-solid fa-calendar-days" class="form-control"></i> 
                                                    Date
                                                  <input type="date"  class="form-control datetime" id="donateDate" name="donateDate" required>
                                                </p>
                                                
                                              </div>

                                              <div class="md-3">
                                                  <div class="mb-3">
                                                      <p>
                                                        <i class="fa-solid fa-folder-open"></i>
                                                          Donation Receipt
                                                        <input type="file"  class="form-control" id="donateReceipt" name="donateReceipt" required>
                                                      </p>
                                                       <p><i class="fa-solid fa-calendar"></i> Event
                                                        <select class="form-control" id="donateEvent" name="donateEvent">
                                                          <option value=""></option>
                                                          <option value="Kumpil">Kumpil</option>
                                                          <option value="Pamisa">Pamisa</option>
                                                          <option value="Baptismal">Baptismal</option>
                                                          <option value="Funeral">Funeral</option>
                                                          <option value="Blessing">Blessing</option>
                                                          <option value="Confirmation">Confirmation</option>
                                                          <option value="Communion">Communion</option>
                                                        </select>
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
                                        <hr>
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


                <!-- END NG MGA TABS -->
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

    </body>
</html>
