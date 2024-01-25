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
    <link rel="stylesheet" href="../css/data-table.css">
    <link rel="stylesheet" href="../css/datatable.css">
    <link rel="stylesheet" href="../css/text-align.css">
    <link rel="stylesheet" href="../css/datatables.min.css">
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
                <li>
                    <a href="reservation.php">Reservation</a>
                </li>
                <li class="active">
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
                <span>Request</span>
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
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <p><span class="text-muted fw-bold">Request Status</p>
                    </div>
                    <div class="col-md-6 mb-3 text-md-end">
                        <div class="ms-auto">
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#request"> Request</button>
                            <div class="status-dropdown btn-group">
                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="statusDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Filter by Status
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="statusDropdown">
                                    <li><a class="dropdown-item filter-btn" data-status="all" href="#">All</a></li>
                                    <li><a class="dropdown-item filter-btn" data-status="Ready to pick up" href="#">Ready to pick up</a></li>
                                    <li><a class="dropdown-item filter-btn" data-status="Released" href="#">Released</a></li>
                                    <li><a class="dropdown-item filter-btn" data-status="In Process" href="#">In Process</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
    <table id="example" class="display responsive nowrap table" style="width:100%">
        <?php
        include_once '../php/dbconn.php';
        $result = mysqli_query($conn, "SELECT * FROM request ORDER BY id DESC");
        if (mysqli_num_rows($result) > 0) {
        ?>
        <thead class="thead-dark">
        <tr class="align-middle">
            <th>Name</th>
            <!-- Hide other table headers on small screens -->
            <th class="hidden-sm">Certificate Type</th>
            <th class="hidden-sm">Transaction Date</th>
            <th class="hidden-sm">Pickup Date</th>
            <th class="hidden-sm">Released Date</th>
            <th class="hidden-sm">Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr class="align-middle odd">
                <td class="align-middle"><?php echo $row["name"]; ?></td>
                <!-- Hide other table data cells on small screens -->
                <td class="align-middle hidden-sm"><?php echo $row["event"]; ?></td>
                <td class="align-middle hidden-sm"><?php echo date("M d, Y", strtotime($row["transactDate"])); ?></td>
                <td class="align-middle hidden-sm <?php echo ($row["whenToPickUp"] === null || $row["whenToPickUp"] === '0000-00-00'); ?>">
                    <?php
                    if ($row["whenToPickUp"] === null || $row["whenToPickUp"] === '0000-00-00') {
                        echo "No Pick Up Date Yet";
                    } else {
                        echo date("M d, Y", strtotime($row["whenToPickUp"]));
                    }
                    ?>
                </td>
                <td class="align-middle hidden-sm <?php echo ($row["pickUpDt"] === null || $row["pickUpDt"] === '0000-00-00'); ?>">
                    <?php
                    if ($row["pickUpDt"] === null || $row["pickUpDt"] === '0000-00-00') {
                        echo "No Release Date Yet";
                    } else {
                        echo date("M d, Y", strtotime($row["pickUpDt"]));
                    }
                    ?>
                </td>
                <td class="align-middle hidden-sm fw-bold">
                    <span class="status-badge" style="background-color:
                                <?php
                    switch ($row["status"]) {
                        case "Released":
                            echo "#16A085";
                            break;
                        case "Ready to pick up":
                            echo "#2E86C1";
                            break;
                        case "In Process":
                            echo "#F39C12";
                            break;
                        // Add more cases if needed
                        default:
                            echo ""; // Default color if status doesn't match any case
                    }
                    ?>;
                        border-radius: 10px;
                        padding: 8px;
                        color:#fff;
                    " class="status-badge">
                        <?php echo $row["status"]; ?>
                </td>
                <td class="align-middle dtr-hidden">
                    <button class="view-btn" data-bs-toggle="modal"data-bs-target="#update<?php echo $row['id']; ?>">
                        <i class="fas fa-eye"></i>
                    </button>
                </td>
                <?php
                $i++;
            }
            } else {
                echo "No result found";
            }
            ?>
            </tr>
        </tbody>
    </table>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script src="../js/datatables.min.js"></script>
    <script>
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

        $(document).ready(function () {
            var table = $('#example').DataTable({
                responsive: true
            });

            table.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');

            // Status filter button click event
            $('.filter-btn').on('click', function () {
            var status = $(this).data('status');

            // Show all rows if 'All' is selected, otherwise filter by status
            table.column(5).search(status === 'all' ? '' : status).draw();

            // Show/hide columns based on the selected filter
            if (status === 'Ready to pick up') {
                table.column(3).visible(true);
                table.column(4).visible(false);
            } else if (status === 'Released') {
                table.column(3).visible(false);
                table.column(4).visible(true);
            } else {
                table.column(3).visible(false);
                table.column(4).visible(false);
            }
            });
            
            function getStatusColor(status) {
                switch (status) {
                    case "Released":
                        return "#16A085";
                    case "Ready to pick up":
                        return "#2E86C1";
                    case "In Process":
                        return "#F39C12";
                    // Add more cases if needed
                    default:
                        return ""; // Default color if status doesn't match any case
                }
            }
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
