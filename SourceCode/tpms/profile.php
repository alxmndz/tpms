<link rel="stylesheet" type="text/css" href="css/counter.css">
<div class="container mt-4 d-flex justify-content-center align-items-center">
  <div class="row">
    <div class="col-md-4 d-flex justify-content-center" style="margin-top: 10px;">
      <div class="card">
        <div class="row g-0">
          <div class="col-md-4 d-flex justify-content-center align-items-center">
            <center>
              <img src="assets/img/profile/<?php echo $userIMG; ?>" class="card-img" alt="profile">
            </center>
          </div>
          <div class="col-md-8 d-flex justify-content-center align-items-center">
            <div class="card-body">
              <center>
                <h5 class="card-title">Welcome, <?php echo $_SESSION['uname'] ?></h5>
                <p class="card-text">Profile Details</p>
                <p class="card-text"><i class="fa-solid fa-user"></i> <?php echo $_SESSION['name'] ?></p>
                <p class="card-text"><i class="fa-solid fa-phone"></i> <?php echo $_SESSION['contact'] ?></p>
              </center>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 d-flex justify-content-center" style="margin-top: 10px;">
      <div class="card">
        <div class="row g-0">
          <div class="col-md-4 d-flex justify-content-center align-items-center">
            <center>
              <img src="assets/icons/gcash.png" class="card-img" alt="gcash">
            </center>
          </div>
          <div class="col-md-8 d-flex justify-content-center align-items-center">
            <div class="card-body">
              <center>
                <br>
                <h4 class="card-title">Transaction</h4>
                <p class="card-text">GCash Method</p>
                <p class="card-text">For payment method use this contact:</i></p>
                <p class="card-text"><i class="fa-solid fa-phone"></i> 0917 835 0117</p>
              </center>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 d-flex justify-content-center" style="margin-top: 10px;">
      <div class="card">
        <div class="row g-0">
          <div class="col-md-4 d-flex justify-content-center align-items-center">
            <center>
              <img src="assets/icons/svf.png" class="card-img" alt="profile">
            </center>
          </div>
          <div class="col-md-8 d-flex justify-content-center align-items-center">
            <div class="card-body">
              <center>
                <h4 class="card-title">Saint Vincent Ferrer Church</h4>
                <p class="card-text"><i class="fa-solid fa-location-dot"></i> V. Calingasan St., Tuy, Batangas</p>
                <p class="card-text"><i class="fa-solid fa-phone"></i> 0906 403 0788</p>
                <p class="card-text"><i class="fa-solid fa-envelope"></i> svftuy@gmail.com</p>
              </center>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="counter">
                <span class="counter-value">
                  <?php
                    $conn = new mysqli("localhost","root","","tpms");
                      if ($conn->connect_error) {
                        die("Connection failed : " . $conn->connect_error);
                      }
                      $sql = "SELECT COUNT(*) FROM request r 
                              LEFT JOIN users u ON u.id = r.addedBy
                              WHERE r.addedBy = '$id' AND status = 'Approved'";
                      $result = $conn->query($sql);
                      while($row = mysqli_fetch_array($result)){
                      echo $row['COUNT(*)'];
                      }
                  ?>
                </span>
                <h3>Approved Requests</h3>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="counter red">
                <span class="counter-value">
                  <?php
                    $conn = new mysqli("localhost","root","","tpms");
                      if ($conn->connect_error) {
                        die("Connection failed : " . $conn->connect_error);
                      }
                      $sql = "SELECT COUNT(amount) FROM donation d 
                              LEFT JOIN users u ON u.id = d.addedBy
                              WHERE d.addedBy = '$id'";
                      $result = $conn->query($sql);
                      while($row = mysqli_fetch_array($result)){
                      echo $row['COUNT(amount)'];
                      }
                  ?>
                </span>
                <h3>Total Donation</h3>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="counter blue">
                <span class="counter-value">
                  <?php
                    $conn = new mysqli("localhost","root","","tpms");
                      if ($conn->connect_error) {
                        die("Connection failed : " . $conn->connect_error);
                      }
                      $sql = "SELECT COUNT(*) FROM donation";
                      $result = $conn->query($sql);
                      while($row = mysqli_fetch_array($result)){
                      echo $row['COUNT(*)'];
                      }
                  ?>
                </span>
                <h3>Events</h3>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="counter green">
                <span class="counter-value">
                  <?php
                    $conn = new mysqli("localhost","root","","tpms");
                      if ($conn->connect_error) {
                        die("Connection failed : " . $conn->connect_error);
                      }
                      $sql = "SELECT COUNT(*) FROM donation";
                      $result = $conn->query($sql);
                      while($row = mysqli_fetch_array($result)){
                      echo $row['COUNT(*)'];
                      }
                  ?>
                </span>
                <h3>Announcements</h3>
            </div>
        </div>
    </div>
</div>
