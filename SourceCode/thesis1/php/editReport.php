<?php
  include_once 'dbconn.php';
  if(count($_POST)>0) {
  mysqli_query($conn,"UPDATE reports SET reportTitle='" . $_POST['reportTitle'] . "', reportDate ='" . $_POST['reportDate'] . "', reportTime ='" . $_POST['reportTime'] . "', description ='" . $_POST['reportDesc'] . "' WHERE reportID='" . $_POST['reportID'] . "'");
    $message = "Report has updated successfully";
    }
      $result = mysqli_query($conn,"SELECT * FROM reports WHERE reportID='" . $_GET['reportID'] . "'");
      $row= mysqli_fetch_array($result);
    ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="../images/admin.png" />
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/update.css">
  <title>Admin | Edit Report Data</title>

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
                          <button type="button" id="btn1" class="btn-close" data-bs-dismiss="modal" style="margin-top: 25px; margin-left: 1230px; float: right; cursor: pointer; " ></button>
                        </a>
                      <div class="card-body">
                        <h4>
                          <b>
                          Reports
                          </b>
                        </h4>
                      <hr>

                <form class="" action="" method="POST">
                    <div class="md-3" >
                      <p class="alert">
                        <?php if(isset($message)) { echo $message; } ?>
                      </p>
                      <p>
                        <input type="hidden" name="reportID" class="form-control" value="<?php echo $row['reportID']; ?>">
                      </p>
                      <p>
                        <i class="fa-solid fa-pen"></i>
                          Title
                          <input class="form-control" type="text" id="reportTitle" name="reportTitle" value="<?php echo $row['reportTitle']; ?>" required>
                      </p>
                      <p>
                        <i class="fa-solid fa-calendar-days" class="form-control"></i>
                          Date
                        <input type="date"  class="form-control datetime" name="reportDate" value="<?php echo $row['reportDate']; ?>" required>
                      </p>
                      <p>
                        <i class="fa-solid fa-business-time"></i>
                          Time
                        <input type="time"  class="form-control" name="reportTime" value="<?php echo $row['reportTime']; ?>" required>
                      </p>                   
                    </div>
                      <div class="md-3">
                          <div class="md-3">
                              <p><i class="fa-solid fa-pen-to-square"></i> Description
                                <textarea class="form-control" name="reportDesc" required>
                                  <?php echo $row['description']; ?>
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