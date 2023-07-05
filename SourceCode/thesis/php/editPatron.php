<?php
  include_once 'dbconn.php';
  if(count($_POST)>0) {
  mysqli_query($conn,"UPDATE accounts SET type='" . $_POST['type'] . "' WHERE user_id='" . $_POST['user_id'] . "'");
    $message = "Account has updated successfully";
    }
      $result = mysqli_query($conn,"SELECT * FROM accounts WHERE user_id='" . $_GET['user_id'] . "'");
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
  <title>Admin | Edit Accounts Type</title>

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
                          Accounts
                          </b>
                        </h4>
                      <hr>

                <form class="" action="" method="POST">
                    <div class="md-3" >
                      <p class="alert">
                        <?php if(isset($message)) { echo $message; } ?>
                      </p>
                      <p>
                        <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['user_id']; ?>">
                      </p>
                      <p>
                        <i class="fa-solid fa-user"></i>
                          Firstname
                          <input class="form-control" type="text" id="fname" name="fname" value="<?php echo $row['fname']; ?>">
                      </p>
                      <p>
                        <i class="fa-solid fa-user" class="form-control"></i>
                          Lastname
                        <input type="text"  class="form-control datetime" name="lname" value="<?php echo $row['lname']; ?>" required>
                      </p>
                      <p>
                        <i class="fa-solid fa-envelope"></i>
                          Email
                        <input type="text"  class="form-control" name="email" value="<?php echo $row['email']; ?>" required>
                      </p>
                      <p>
                        <i class="fa-solid fa-users"></i>
                          Account Type
                        <select class="form-control" id="type" name="type">
                            <option value=""></option>
                            <option value="admin">Admin</option>
                            <option value="staff">Staff</option>
                            <option value="patron">Patron</option>
                        </select>
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