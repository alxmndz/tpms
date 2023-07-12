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
    include_once "links.php";
 ?>
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
                            <a class="nav-link tablinks" onclick="openCity(event, 'dashboard')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                                Dashboard
                            </a>

                            <a class="nav-link tablinks" onclick="openCity(event, 'patron')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                                Accounts
                            </a>

                        <div class="sb-sidenav-menu-heading">Certificate/Forms</div>

                             <a class="nav-link tablinks" onclick="openCity(event, 'forms')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-folder-open"></i></div>
                                Request certificate
                            </a>
                            <a class="nav-link tablinks" onclick="openCity(event, '')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-certificate"></i></div>
                                Certificate
                            </a>  

                        <div class="sb-sidenav-menu-heading">Appointments</div>
                        
                            <a class="nav-link tablinks" onclick="openCity(event, 'cal')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar"></i></div>
                                Events List
                            </a>

                            <a class="nav-link tablinks" onclick="openCity(event, 'eventRes')" href="#">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-book-open"></i></div>
                                Event Reservation
                            </a> 

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
                        
                      <div class="container py-5">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addForms" name="btn-save" id="btn-save myBtn" style="float: right; margin-bottom: 15px;" ><i class="fa-solid fa-plus"></i> Create New</button>
                                <table class="table text-center table-bordered text-dark">
                                 <?php
                                      include_once 'php/config.php';
                                      $result = mysqli_query($conn,"SELECT * FROM forms");
                                        if (mysqli_num_rows($result) > 0) {
                                    ?>
                                    <thead>
                                      <tr>
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
                                      <a href="php/forms/edit.php?formsID=<?php echo $row["formsID"]; ?>">
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
                                        <a href="php/forms/delete.php?formsID=<?php echo $row["formsID"]; ?>">
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
                    </main>

                  <main class="tabcontent" id="announcement" style="display: none;">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Announcement</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Dashboard</a></li>
                            <li class="breadcrumb-item active">Announcement</li>
                        </ol>
                        <div class="container py-5 ">
                            
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAnnounce" name="btn-save" id="btn-save myBtn" style="float: right; margin-bottom: 15px;" >
                                  <i class="fa-solid fa-plus"></i> Create New
                                </button>
                             <table class="table table-bordered text-center " style="color: black;">
                                    <?php
                                      include_once 'php/dbconn.php';
                                      $result = mysqli_query($conn,"SELECT * FROM announcements");
                                        if (mysqli_num_rows($result) > 0) {
                                    ?>
                                      <thead>
                                        <tr>
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
                                        <a href="php/announcement/edit.php?announceID=<?php echo $row["announceID"]; ?>">
                                          <button class="btn btn-primary">
                                          <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        </a>
                                      </td>
                                      
                                      <td>
                                        <a href="php/announcement/delete.php?announceID=<?php echo $row["announceID"]; ?>">
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
                  </main>

                <main class="tabcontent" id="patron" style="display: none;">
                   <div class="container-fluid px-4">
                        <h1 class="mt-4">Accounts</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Dashboard</a></li>
                            <li class="breadcrumb-item active">Accounts</li>
                        </ol>
                  <div class="container py-5 ">
                                <table class="table table-bordered text-center " style="color: black;">
                                    <?php
                                    include_once 'php/dbconn.php';
                                    $result = mysqli_query($conn,"SELECT * FROM accounts");
                                      if (mysqli_num_rows($result) > 0) {
                                  ?>
                                      <thead>
                                        <tr>
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
                                        <a href="php/user/edit.php?user_id=<?php echo $row["user_id"]; ?>">
                                            <button class="btn btn-primary" >
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                        </a>
                                      </td>

                                      <td>
                                        <a href="php/user/delete.php?user_id=<?php echo $row["user_id"]; ?>">
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
                </main>

                <main class="tabcontent" id="report" style="display: none;">
                  <div class="container-fluid px-4">
                        <h1 class="mt-4">Report</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Dashboard</a></li>
                            <li class="breadcrumb-item active">Report</li>
                        </ol>
                      <div class="container py-5 ">
   
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addReport" name="btn-save" id="btn-save myBtn" style="float: right; margin-bottom: 15px;" >
                          <i class="fa-solid fa-plus"></i> Create New
                        </button>
                             <table class="table table-bordered text-center " style="color: black;">
                                <?php
                                  include_once 'php/dbconn.php';
                                  $result = mysqli_query($conn,"SELECT * FROM reports");
                                    if (mysqli_num_rows($result) > 0) {
                                ?>
                                    <thead>
                                      <tr>
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
                                        <a href="php/report/edit.php?reportID=<?php echo $row["reportID"]; ?>">
                                          <button class="btn btn-primary" >
                                            <i class="fa-solid fa-pen-to-square"></i>
                                          </button>
                                        </a>
                                      </td>
                                      <td>
                                        <a href="php/report/delete.php?reportID=<?php echo $row["reportID"]; ?>">
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
              </main>

              <main  class="tabcontent" id="eventRes" style="display: none;">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Event Reservation</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a>Dashboard</a></li>
                            <li class="breadcrumb-item active">Event Reservation</li>
                        </ol>
                        
                      <div class="container py-5 ">
                            
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRes" name="btn-save" id="btn-save myBtn" style="float: right; margin-bottom: 15px;" ><i class="fa-solid fa-plus"></i> Add Reservation</button>
                                <table class="table table-bordered text-center " style="color: black;">
                                 <?php
                                      include_once 'php/config.php';
                                      $result = mysqli_query($conn,"SELECT * FROM eventres");
                                        if (mysqli_num_rows($result) > 0) {
                                    ?>
                                    <thead>
                                      <tr>
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
                                      <a href="php/reserve/edit.php?eventResID=<?php echo $row["eventResID"]; ?>">
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
                                        <a href="php/reserve/delete.php?eventResID=<?php echo $row["eventResID"]; ?>">
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
                </main>
              </div>
                <?php 
                include_once "modals.php"; 
                ?>
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