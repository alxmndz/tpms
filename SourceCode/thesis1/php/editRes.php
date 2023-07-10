<?php
  include_once 'dbconn.php';
  if(count($_POST)>0) {
  mysqli_query($conn,"UPDATE eventres SET name='" . $_POST['name'] . "', eventName ='" . $_POST['eventName'] . "', eventDate ='" . $_POST['eventDate'] . "', eventTime ='" . $_POST['eventTime'] . "', contactNum ='" . $_POST['contactNum'] . "', address ='" . $_POST['address'] . "', sponsored ='" . $_POST['sponsored'] . "', package ='" . $_POST['package'] . "', amount ='" . $_POST['amount'] . "', email ='" . $_POST['email'] . "', status ='" . $_POST['status'] . "' WHERE eventResID='" . $_POST['eventResID'] . "'");
    $message = "Report has updated successfully";
    }
      $result = mysqli_query($conn,"SELECT * FROM eventres WHERE eventResID='" . $_GET['eventResID'] . "'");
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

  <title>Admin | Edit Reservation Data</title>

</head>
<body>
  <div class=" modal d-flex justify-content-center" style="margin-top: 10px;">
    <div class="container">
      <div class="">
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
                          Reservation
                          </b>
                        </h4>
                      <hr>

                <form class="" action="" method="post">
                        <div class="md-3" >
                          <p class="alert">
                            <?php if(isset($message)) { echo $message; } 
                            ?>
                          </p>
                        </div>
                        <p>
                          <input type="hidden" name="eventResID" class="form-control" value="<?php echo $row['eventResID']; ?>">
                        </p>
                        <div class="row my-3">
                           <div class="col-md-6">
                              <div class="form-outline">
                                  <label class="form-label" for="typeText">
                                    <i class="fa-solid fa-user"></i> 
                                    Full name
                                  </label>
                                <input class="form-control" type="text" id="name" name="name" value="<?php echo $row['name']; ?>"  autocomplete="off" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText">
                                  <i class="fa-solid fa-calendar-days"></i> 
                                    Event
                                </label>
                                <select class="form-control" id="eventName" name="eventName" value="<?php echo $row['eventName']; ?>" required>
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
                      </div>
                         
                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-calendar"></i> Date</label>
                                <input class="form-control" type="date" id="eventDate" name="eventDate" value="<?php echo $row['eventDate']; ?>" autocomplete="off" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fas fa-clock"></i> Time</label>
                                <input class="form-control" type="time" id="eventTime" name="eventTime" value="<?php echo $row['eventTime']; ?>" autocomplete="off" required />
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-phone"></i> Contact</label>
                                <input class="form-control" type="text" id="contactNum" name="contactNum" autocomplete="off" value="<?php echo $row['contactNum']; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-envelope"></i>
                                  Email
                                </label>
                                <input class="form-control"type="text"id="email" name="email" value="<?php echo $row['email']; ?>" placeholder="Enter email" required>
                            </div>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-md-12">
                          <div class="form-outline">
                              <label class="form-label" for="typeText"><i class="fa-solid fa-home"></i> Address</label>
                                <input class="form-control" type="text" id="address" name="address" value="<?php echo $row['address']; ?>" placeholder="Enter address" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                      <div class="col-md-12">
                        <div class="form-outline">
                            <label class="form-label" for="typeText"><i class="fa-solid fa-users"></i> Sponsor</label>
                            <input class="form-control" type="text" id="sponsored" name="sponsored"  autocomplete="off" value="<?php echo $row['sponsored']; ?>" required>
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
                                <select class="form-control" id="package" name="package" value="<?php echo $row['package']; ?>" required>
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
                                <input class="form-control" type="text" id="amount" name="amount" value="<?php echo $row['amount']; ?>" placeholder="Enter amount" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                                        
                      <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-heart"></i> Status</label>
                                    <select class="form-control" id="status" name="status" value="status" required>
                                      <option value=""></option>
                                      <option value="Disapproved">Disapproved</option>
                                      <option value="Approved">Approved</option>
                                      <option value="Pending">Pending</option>
                                    </select>
                                </div>
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
</div>
</body>
</html>