<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="css/counter.css">
<style type="text/css">
 @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
  *{
    font-family: "Poppins", sans-serif;
  }
  .my-card{
      border-radius:50%;
  }
</style>
                                  <div class="container-fluid">
                                    <div class="card" style="margin-top: 20px;">
                                      <div class="card-header">
                                        <h5><i class="fa-solid fa-chart-line"></i> Dashboard</h5>
                                      </div>
                                      <div class="card-body">
                                      <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                                        <div class="col">
                                         <div class="card radius-10 border-start border-0 border-3 border-info">
                                          <div class="card-body">
                                            <div class="d-flex align-items-center">
                                              <div>
                                                <p class="mb-0 text-secondary">Events</p>
                                                <h4 class="my-1 text-info">
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
                                              </h4>
                                              </div>
                                                <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i class="fa-solid fa-calendar"></i>
                                              </div>
                                            </div>
                                          </div>
                                         </div>
                                        </div>
                                        <div class="col">
                                        <div class="card radius-10 border-start border-0 border-3 border-danger">
                                           <div class="card-body">
                                             <div class="d-flex align-items-center">
                                               <div>
                                                 <p class="mb-0 text-secondary">Total Donations</p>
                                                 <h4 class="my-1 text-danger">
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
                                                </h4>
                                               </div>
                                               <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class="fa-solid fa-hand-holding-dollar"></i>
                                               </div>
                                             </div>
                                           </div>
                                        </div>
                                        </div>
                                        <div class="col">
                                        <div class="card radius-10 border-start border-0 border-3 border-success">
                                           <div class="card-body">
                                             <div class="d-flex align-items-center">
                                               <div>
                                                 <p class="mb-0 text-secondary">Accounts</p>
                                                 <h4 class="my-1 text-success">
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
                                                 </h4>
                                               </div>
                                               <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class="fa-solid fa-users"></i>
                                               </div>
                                             </div>
                                           </div>
                                        </div>
                                        </div>
                                        <div class="col">
                                        <div class="card radius-10 border-start border-0 border-3 border-warning">
                                           <div class="card-body">
                                             <div class="d-flex align-items-center">
                                               <div>
                                                 <p class="mb-0 text-secondary">Announcements</p>
                                                 <h4 class="my-1 text-warning">
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
                                                 </h4>
                                               </div>
                                               <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class="fa-solid fa-bell"></i>
                                               </div>
                                             </div>
                                           </div>
                                        </div>
                                        </div> 
                                      </div>
                                      </div>
                                    </div>    
                                  </div>

        <div class="container-fluid" >
                          <div class="row">
                            <div class="col-md-8">
                              <!-- Table -->
                              <div class="card mb-4" style="margin-top: 10px;">
                                <div class="card-header">
                                  <i class="fa-solid fa-hand-holding-dollar"></i>
                                  Donation
                                </div>
                                <div class="card-body">
                                  <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                      <?php
                                        include_once 'php/dbconn.php';
                                        $result = mysqli_query($conn, "SELECT * FROM donation ORDER BY name LIMIT 15");
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