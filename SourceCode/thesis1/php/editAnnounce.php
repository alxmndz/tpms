<?php
  include_once 'dbconn.php';
  if(count($_POST)>0) {
  mysqli_query($conn,"UPDATE announcements SET announceTitle='" . $_POST['announceTitle'] . "', announceDate ='" . $_POST['announceDate'] . "', announceTime ='" . $_POST['announceTime'] . "', announceDesc ='" . $_POST['announceDesc'] . "' WHERE announceID='" . $_POST['announceID'] . "'");
    $message = "Announcement Updated Successfully";
    }
      $result = mysqli_query($conn,"SELECT * FROM announcements WHERE announceID='" . $_GET['announceID'] . "'");
      $row= mysqli_fetch_array($result);
    ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="../images/admin.png" />
  
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
  <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
  <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
  <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
  <title>Admin | Edit Announcement Data</title>

</head>
<body>
  <div class=" modal d-flex justify-content-center" style="margin-top: 50px;">
    <div class="container">
      <div class="modal-dialog">
          <div class="modal-content">

            <section>
              <div class="container">
                <div class="row align-items-center h-100">
                   <div class="card container h-100" style="background: #FFFFFF;">
                  
                        <a href="../dashboard.php">
                          <button type="button" id="btn1" class="btn-close" data-bs-dismiss="modal" style="margin-top: 25px; margin-left: 1230px; float: right; cursor: pointer; "><i class="fa-solid fa-xmark"></i></button>
                        </a>
                      <div class="card-body">
                        <h4>
                          <b>
                          Announcements
                          </b>
                        </h4>
                      <hr>

                <form class="" action="" method="POST">
                    <div class="md-3" >
                      <p class="alert">
                        <?php if(isset($message)) { echo $message; } ?>
                      </p>
                      <p>
                        <input type="hidden" name="announceID" class="form-control" value="<?php echo $row['announceID']; ?>">
                      </p>
                      <p>
                        <i class="fa-solid fa-pen"></i>
                          Title
                          <input class="form-control" type="text" id="announceTitle" name="announceTitle" value="<?php echo $row['announceTitle']; ?>" required>
                      </p>
                      <p>
                        <i class="fa-solid fa-calendar-days" class="form-control"></i>
                          Date
                        <input type="date"  class="form-control datetime" name="announceDate" value="<?php echo $row['announceDate']; ?>" required>
                      </p>
                      <p>
                        <i class="fa-solid fa-business-time"></i>
                          Time
                        <input type="time"  class="form-control" name="announceTime" value="<?php echo $row['announceTime']; ?>" required>
                      </p>                   
                    </div>
                      <div class="md-3">
                          <div class="md-3">
                              <p><i class="fa-solid fa-pen-to-square"></i> Description
                                <textarea class="form-control" name="announceDesc" id="announceDesc" required>
                                  <?php echo $row['announceDesc']; ?>
                                </textarea>
                          </p>
                        </p>
                      </div>
                      <div class="md-3">
                      </div>
                      <button type="submit" name="submit" value="Submit" class="btn btn-primary" style="float: right;">Sumbit</button>
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
</body>
</html>