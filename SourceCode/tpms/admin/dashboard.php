<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css
">
<style type="text/css">
 @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
  *{
    font-family: "Poppins", sans-serif;
  }
  .my-card{
      border-radius:50%;
  }
</style>
<div class="container-fluid px-4" style="margin-top: 10px;">
                        <div class="container-fluid">
                          <div class="card">
                            <div class="card-header">
                              <span><i class="fa-solid fa-chart-line"></i> Dashboard</span>
                            </div>
                            <div class="jumbotron">
                              <div class="row w-100">
                                      <div class="col-md-3" style="margin-top: 5px;">
                                          <div class="card border-info mx-sm-1 p-3">
                                              <div class="card border-info shadow text-info p-3 my-card" ><span class="fa-solid fa-calendar" aria-hidden="true"></span></div>
                                              <div class="text-info text-center mt-3"><h4>Events</h4></div>
                                              <div class="text-info text-center mt-2">
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
                                      <div class="col-md-3" style="margin-top: 5px;">
                                          <div class="card border-success mx-sm-1 p-3">
                                              <div class="card border-success shadow text-success p-3 my-card"><span class="fa-solid fa-hand-holding-dollar" aria-hidden="true"></span></div>
                                              <div class="text-success text-center mt-3"><h4>Donations</h4></div>
                                              <div class="text-success text-center mt-2">
                                                <h1>
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
                                                </h1>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-3" style="margin-top: 5px;">
                                          <div class="card border-danger mx-sm-1 p-3">
                                              <div class="card border-danger shadow text-danger p-3 my-card" ><span class="fa-solid fa-users" aria-hidden="true"></span></div>
                                              <div class="text-danger text-center mt-3"><h4>Accounts</h4></div>
                                              <div class="text-danger text-center mt-2">
                                                <h1>
                                                  <?php
                                                  $conn = new mysqli("localhost","root","","tpms");
                                                    if ($conn->connect_error) {
                                                      die("Connection failed : " . $conn->connect_error);
                                                    }
                                                    $sql = "SELECT COUNT(*) FROM users";
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
                                              <div class="card border-warning shadow text-warning p-3 my-card" ><span class="fa-solid fa-bell" aria-hidden="true"></span></div>
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

                        <div class="container-fluid" style="margin-top: 10px;">
                          <div class="row">
                            <div class="col-md-8">
                              <!-- Table -->
                              <div class="card mb-4">
                                <div class="card-header">
                                  <i class="fa-solid fa-hand-holding-dollar"></i>
                                  Donation
                                </div>
                                <div class="card-body">
                                  <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                      <?php
                                        include_once 'php/dbconn.php';
                                        $result = mysqli_query($conn, "SELECT * FROM donation ORDER BY name LIMIT 10");
                                        if (mysqli_num_rows($result) > 0) {
                                      ?>
                                      <thead>
                                        <tr>
                                          <th>Name</th>
                                          <th>Contact</th>
                                          <th>Email</th>
                                          <th>Amount</th>
                                          <th>Event</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                          $i = 0;
                                          while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <tr>
                                          <td><?php echo $row["name"]; ?></td>
                                          <td><?php echo $row["contact"]; ?></td>
                                          <td><?php echo $row["email"]; ?></td>
                                          <td><?php echo $row["amount"]; ?></td>
                                          <td><?php echo $row["event"]; ?></td>
                                          <?php
                                            $i++;
                                          }
                                        ?>
                                        </tr>
                                        <?php
                                          } else {
                                            echo "No result found";
                                          }
                                        ?>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-4" style="margin-top: 10px;">
                                <!-- Card beside the table -->
                                <div class="card">
                                  <div class="card-header">
                                    <i class="fa-regular fa-calendar"></i> Events
                                  </div>
                                  <div class="card-body">
                                      <?php
                                      include_once 'php/dbconn.php';
                                      $result = mysqli_query($conn, "SELECT * FROM eventlist LIMIT 3");
                                      if (mysqli_num_rows($result) > 0) {
                                      ?>
                                      <div class="row">
                                        <?php
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <div class="col-12" style="margin-top: 10px;">
                                          <div class="card">
                                            <div class="card-body">
                                              <div class="card-title"><b><?php echo $row["title"] ?></b></div>
                                              <div class="card-text"><i class="fa-regular fa-clock"></i> <?php echo $row["start"] ?> - <?php echo $row["endtime"] ?></div>
                                              <div class="card-text"><i class="fa-solid fa-location-dot"></i> <?php echo $row["location"] ?></div>
                                              <div class="card-text"><i class="fa-regular fa-sun"></i> <?php echo $row["eventday"] ?></div>
                                              <div class="card-text"><span><?php echo $row["description"] ?></span></div>
                                              <div class="card-text"><small class="text-muted"><?php echo $row["month"] ?> <?php echo $row["daynumber"] ?></small></div>
                                            </div>
                                          </div>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                      </div>
                                      <?php
                                      } else {
                                        echo "No result found";
                                      }
                                      ?>
                                  </div>
                                </div>
                              </div>
                            
                          </div>
                        </div>
                    </div>