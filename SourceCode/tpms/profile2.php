<link rel="stylesheet" type="text/css" href="css/counter.css">
<div class="container mt-4 d-flex justify-content-center align-items-center">
  <div class="row" style="margin-top: 10px;">
    <div class="col-md-4 d-flex justify-content-center">
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
                <p class="card-text"><i class="fa-solid fa-envelope"></i> <?php echo $_SESSION['email'] ?></p>
              </center>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 d-flex justify-content-center">
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
    <div class="col-md-4 d-flex justify-content-center">
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
  <div class="container-fluid">
                          <div class="card">
                            <div class="card-header">
                              <span><i class="fa-solid fa-chart-line"></i> Dashboard</span>
                            </div>
                            <div class="jumbotron">
                              <div class="row w-100">
                                      <div class="col-md-3" style="margin-top: 5px;">
                                          <div class="card border-info mx-sm-1 p-3">
                                              <div class="card border-info shadow text-info p-3 my-card" ><i class="fa-solid fa-thumbs-up" aria-hidden="true"></i></div>
                                              <div class="text-info text-center mt-3"><h4>Approved Requests</h4></div>
                                              <div class="text-info text-center mt-2">
                                                <h1>
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
                                                </h1>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-3" style="margin-top: 5px;">
                                          <div class="card border-success mx-sm-1 p-3">
                                              <div class="card border-success shadow text-success p-3 my-card"><i class="fa-solid fa-hand-holding-dollar" aria-hidden="true"></i></div>
                                              <div class="text-success text-center mt-3"><h4>Total Donations</h4></div>
                                              <div class="text-success text-center mt-2">
                                                <h1>
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
                                                </h1>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-3" style="margin-top: 5px;">
                                          <div class="card border-danger mx-sm-1 p-3">
                                              <div class="card border-danger shadow text-danger p-3 my-card" ><i class="fa-solid fa-calendar" aria-hidden="true"></i></div>
                                              <div class="text-danger text-center mt-3"><h4>Total Event Lists</h4></div>
                                              <div class="text-danger text-center mt-2">
                                                <h1>
                                                  <?php
                                                    $conn = new mysqli("localhost","root","","tpms");
                                                      if ($conn->connect_error) {
                                                        die("Connection failed : " . $conn->connect_error);
                                                      }
                                                      $sql = "SELECT COUNT(*) FROM eventlist";
                                                      $result = $conn->query($sql);
                                                      while($row = mysqli_fetch_array($result)){
                                                      echo $row['COUNT(*)'];
                                                      }
                                                  ?>
                                                </h1>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="card border-warning mx-sm-1 p-3">
                                              <div class="card border-warning shadow text-warning p-3 my-card" ><i class="fa-solid fa-bell" aria-hidden="true"></i></div>
                                              <div class="text-warning text-center mt-3"><h4>Announcement</h4></div>
                                              <div class="text-warning text-center mt-2">
                                                <h1>
                                                <?php
                                                  $conn = new mysqli("localhost","root","","tpms");
                                                    if ($conn->connect_error) {
                                                      die("Connection failed : " . $conn->connect_error);
                                                    }
                                                    $sql = "SELECT COUNT(*) FROM announcement";
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
                        </div>
</div>
