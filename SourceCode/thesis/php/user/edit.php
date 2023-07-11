<?php
  include_once 'dbconn.php';
  if(count($_POST)>0) {
  mysqli_query($conn,"UPDATE accounts SET type='" . $_POST['type'] . "' WHERE user_id='" . $_POST['user_id'] . "'");
    $message = "Updated successfully";
    }
      $result = mysqli_query($conn,"SELECT * FROM accounts WHERE user_id='" . $_GET['user_id'] . "'");
      $row= mysqli_fetch_array($result);
    ?>
    <?php include "header.php"; ?>
<body>
  <div class=" modal d-flex justify-content-center" style="margin-top: 100px;">
    <div class="container">
      <div class="modal-dialog">
          <div class="modal-content">

            <section>
              <div class="container">
                <div class="row align-items-center h-100">
                   <div class="card container h-100" style="background: #FFFFFF;">
                  
                        <a href="../../dashboard.php">
                          <button type="button" id="btn1" class="btn-close" data-bs-dismiss="modal" style="margin-top: 15px; margin-left: 1230px; float: right; cursor: pointer;"></button>
                        </a>
                      <div class="card-body">
                        <h4>
                          <b>
                          Edit Accounts
                          </b>
                        </h4>
                      <hr>

                <form class="" action="" method="POST">
                    <div class="md-3" >
                      
                    <?php
                    // PHP program to pop an alert
                    // message box on the screen
                      
                    // Function definition
                    function function_alert($message) {
                          
                      if(isset($message)) {
                        echo "<script>alert('$message');</script>";
                    }
                  }
                      
                      
                    // Function call
                    function_alert("Updated Successfully!");
                      
                    ?>
                      <p>
                        <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['user_id']; ?>">
                      </p>
                      <p>
                        <i class="fa-solid fa-user"></i>
                          Firstname
                          <input class="form-control" type="text" id="fname" name="fname" value="<?php echo $row['fname']; ?>" disabled>
                      </p>
                      <p>
                        <i class="fa-solid fa-user" class="form-control"></i>
                          Lastname
                        <input type="text"  class="form-control datetime" name="lname" value="<?php echo $row['lname']; ?>" disabled>
                      </p>
                      <p>
                        <i class="fa-solid fa-envelope"></i>
                          Email
                        <input type="text"  class="form-control" name="email" value="<?php echo $row['email']; ?>" disabled>
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
                      <button type="submit" name="submit" value="Submit" class="btn btn-primary" style="float: right;">Submit</button>
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