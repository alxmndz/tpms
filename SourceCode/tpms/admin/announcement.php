<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/icons/team_icon/admin.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/datatable.css">
    <link rel="stylesheet" href="../css/datatables.min.css">
    <title>Admin - Tuy Parish Management System</title>
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
    <div id="sidebar">
        <h5 class="logo"><img src="../assets/icons/logo.png">Tuy Parish Management</h5>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php"><i class="fas fa-home"></i> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="calendar.php"><i class="fas fa-calendar-days"></i> Calendar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="accounts.php"><i class="fas fa-users"></i> Accounts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="reserve.php"><i class="fa-solid fa-user-pen"></i> Reservation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#cert">
                    <i class="fas fa-caret-down"></i> Generate Certificate
                </a>
                <div class="collapse" id="cert">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link" href="certificate/bapGenCert.php"> Baptismal Certificate</a></li>
                        <li class="nav-item"><a class="nav-link" href="certificate/comGenCert.php"> Communion Certificate</a></li>
                        <li class="nav-item"><a class="nav-link" href="certificate/conGenCert.php"> Confirmation Certificate</a></li>
                        <li class="nav-item"><a class="nav-link" href="certificate/deathGenCert.php"> Death Certificate</a></li>
                        <li class="nav-item"><a class="nav-link" href="certificate/marriageGenCert.php"> Marriage Certificate</a></li>
                    </ul>
                </div>
            </li>
    
            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#walkIn-reserve">
                    <i class="fas fa-caret-down"></i> Walk-In Reservations
                </a>
                <div class="collapse" id="walkIn-reserve">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link" href="walk-in/baptismal.php"> Baptismal</a></li>
                        <li class="nav-item"><a class="nav-link" href="walk-in/blessing.php"> Blessing</a></li>
                        <li class="nav-item"><a class="nav-link" href="walk-in/communion.php"> Communion</a></li>
                        <li class="nav-item"><a class="nav-link" href="walk-in/confirmation.php"> Confirmation</a></li>
                        <li class="nav-item"><a class="nav-link" href="walk-in/funeralmass.php"> Funeral Mass</a></li>
                        <li class="nav-item"><a class="nav-link" href="walk-in/wedding.php"> Wedding</a></li>
                        <!-- Add more items as needed -->
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#online-reserve">
                    <i class="fas fa-caret-down"></i> Online Reservations
                </a>
                <div class="collapse" id="online-reserve">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link" href="online/baptismal.php"> Baptismal</a></li>
                        <li class="nav-item"><a class="nav-link" href="online/blessing.php"> Blessing</a></li>
                        <li class="nav-item"><a class="nav-link" href="online/communion.php"> Communion</a></li>
                        <li class="nav-item"><a class="nav-link" href="online/confirmation.php"> Confirmation</a></li>
                        <li class="nav-item"><a class="nav-link" href="online/funeralmass.php"> Funeral Mass</a></li>
                        <li class="nav-item"><a class="nav-link" href="online/wedding.php"> Wedding</a></li>
                        <!-- Add more items as needed -->
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="request.php"><i class="fas fa-folder-open"></i> Request Certificates</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pricing.php"><i class="fas fa-peso-sign"></i> Pricing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="donation.php"><i class="fas fa-heart-pulse"></i> Donation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-custom active" href="announcement.php"><i class="fas fa-bell"></i> Announcement</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#reports-menu">
                    <i class="fas fa-caret-down"></i> Reports
                </a>
                <div class="collapse" id="reports-menu">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link" href="charts.php"><i class="fas fa-pie-chart"></i> Charts Summary</a></li>
                        <li class="nav-item"><a class="nav-link" href="summary.php"><i class="fas fa-table"></i> Report Summary</a></li>
                        <li class="nav-item"><a class="nav-link" href="donation-sum.php"><i class="fas fa-heart-pulse"></i> Donation Summary</a></li>
                        <!-- Add more items as needed -->
                    </ul>
                </div>
            </li>
        </ul>
    </div>

<div id="content">
    <header>
        <img src="../assets/icons/system/menus.png" class="menu-bar">
        <div class="ms-auto">
			<div class="dropdown">
				<img src="../assets/profile/<?php echo $_SESSION['profile']; ?>" class="profile">
				<div class="dropdown-content">
					<a href="#">Profile <i class="fas fa-user" style="float: right;"></i></a>
					<a href="../php/logout.php">Logout <i class="fas fa-power-off" style="float: right;"></i></a>
				</div>
			</div>
		</div>
    </header>
    <h3 class="fw-bold">Welcome <?php echo $_SESSION['uname']; ?></h3>
    <div class="row">
        <div class="col-md-6">
            <p><span class="text-muted">Admin ></span> Announcement</p>
        </div>
        <div class="col-md-6 text-end"> <!-- Use 'text-end' class to align text to the right -->
            <div class="ms-auto">
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#announceModal">
                <i class="fa-solid fa-pen-to-square"></i> Add Announcement
                </button>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="accounts">
        <table id="example" class="display responsive nowrap table" style="width:100%">
                    <?php
                      include_once '../php/dbconn.php';
                      $result = mysqli_query($conn, "SELECT * FROM announcement ORDER BY id DESC");
                      if (mysqli_num_rows($result) > 0) {
                    ?>
            <thead class="thead-dark">
                <tr class="align-middle">
                    <th>Event Picture</th>
                    <th>Event Title</th>
                    <th>Date Posted</th>
                    <th>Event Date</th>
                    <th>Event Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                        $i = 0;
                        while ($row = mysqli_fetch_array($result)) {
                      ?>
                <tr>
                    <td class="align-middle">
                        <div class="profile-picture">
                            <img src="../assets/announcement/<?php echo $row["announcePic"]; ?>" alt="Profile 1" class="img-thumbnail">
                        </div>
                    </td>
                    <td class="align-middle"><?php echo $row["title"]; ?></td>
                    <td class="align-middle"><?php echo date("M d, Y", strtotime($row["postDate"])); ?></td>
                    <td class="align-middle">
                        <?php
                        $announceDate = $row["announceDate"];
                        echo !empty($announceDate) ? date("M d, Y", strtotime($announceDate)) : "No date";
                        ?>
                    </td>
                    <td class="align-middle">
                        <?php
                        $announceTime = $row["announceTime"];
                        echo !empty($announceTime) ? date("M d, Y h:i:s A", strtotime($announceTime)) : "No time";
                        ?>
                    </td>
                    <td class="align-middle"><button class="update-btn"><i class="fas fa-pen"></i></button></td>
                </tr>
                <?php
                          $i++;
                        }
                      ?>
                      <?php
                        } else {
                          echo "No result found";
                        }
                      ?>
            </tbody>
        </table>
    </div>
    <footer class="py-4 mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Tuy Parish 2023</div>
                <div> 
            </div>
        </div>
    </footer>    
</div>

</div>
<?php 
  } else {
    header("Location: ../login.php");
    exit();
  }
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/datatables.min.js"></script>
    <script src="../js/pdfmake.min.js"></script>
    <script src="../js/vfs_fonts.js"></script>

    <script>
      $(document).ready(function(){
    
          var table = $('#example').DataTable({
          });
          
          
          table.buttons().container()
          .appendTo('#example_wrapper .col-md-6:eq(0)');

      });
    </script>
</body>
</html>
