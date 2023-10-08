<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<style type="text/css">
<?php include "css/counter.css";  ?>
  .my-card{
      border-radius:50%;
  }
</style>
<div class="container-fluid px-4" style="margin-top: 0px;">

  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h5><i class="fa-solid fa-chart-line"></i> Dashboard</h5>
      </div>
      <div class="card-body">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
      <div class="col">
         <div class="card radius-10 border-start border-0 border-3 border-info" style="margin-top: 10px;">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div>
                <p class="mb-0 text-secondary">Event List</p>
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
              <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i class="fa-solid fa-calendar-days"></i>
              </div>
            </div>
          </div>
         </div>
         </div>
         <div class="col">
        <div class="card radius-10 border-start border-0 border-3 border-danger" style="margin-top: 10px;">
           <div class="card-body">
             <div class="d-flex align-items-center">
               <div>
                 <p class="mb-0 text-secondary">Requests</p>
                 <h4 class="my-1 text-danger">
                  <?php
                    $conn = new mysqli("localhost","root","","tpms");
                      if ($conn->connect_error) {
                        die("Connection failed : " . $conn->connect_error);
                      }
                      $sql = "SELECT COUNT(*) FROM request";
                      $result = $conn->query($sql);
                      while($row = mysqli_fetch_array($result)){
                      echo $row['COUNT(*)'];
                      }
                   ?>
                </h4>
               </div>
               <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class="fa-solid fa-scroll"></i>
               </div>
             </div>
           </div>
        </div>
        </div>
        <div class="col">
        <div class="card radius-10 border-start border-0 border-3 border-success" style="margin-top: 10px;">
           <div class="card-body">
             <div class="d-flex align-items-center">
               <div>
                 <p class="mb-0 text-secondary">Request Payment </p>
                 <h4 class="my-1 text-success">
                   <?php
                                                      $conn = new mysqli("localhost", "root", "", "tpms");
                                                      if ($conn->connect_error) {
                                                          die("Connection failed: " . $conn->connect_error);
                                                      }

                                                      $sql = "SELECT SUM(amount) AS total FROM request";
                                                      $result = $conn->query($sql);

                                                      if ($result) {
                                                          $row = $result->fetch_assoc();
                                                          $sum = $row['total'];

                                                          // Format the sum with a comma for thousands separator and a peso sign.
                                                          $formatted_sum = '₱' . number_format($sum, 2, '.', ',');

                                                          echo $formatted_sum;
                                                      } else {
                                                          echo "Error: " . $conn->error;
                                                      }

                                                      $conn->close();
                                                      ?>
                 </h4>
               </div>
               <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class="fa-solid fa-dollar-sign"></i>
               </div>
             </div>
           </div>
        </div>
        </div>
        <div class="col">
        <div class="card radius-10 border-start border-0 border-3 border-warning" style="margin-top: 10px;">
           <div class="card-body">
             <div class="d-flex align-items-center">
               <div>
                 <p class="mb-0 text-secondary">Donation</p>
                 <h4 class="my-1 text-warning">
                   <?php
                                                      $conn = new mysqli("localhost", "root", "", "tpms");
                                                      if ($conn->connect_error) {
                                                          die("Connection failed: " . $conn->connect_error);
                                                      }

                                                      $sql = "SELECT SUM(amount) AS total FROM donation";
                                                      $result = $conn->query($sql);

                                                      if ($result) {
                                                          $row = $result->fetch_assoc();
                                                          $sum = $row['total'];

                                                          // Format the sum with a comma for thousands separator and a peso sign.
                                                          $formatted_sum = '₱' . number_format($sum, 2, '.', ',');

                                                          echo $formatted_sum;
                                                      } else {
                                                          echo "Error: " . $conn->error;
                                                      }

                                                      $conn->close();
                                                      ?>
                 </h4>
               </div>
               <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class="fa-solid fa-hand-holding-dollar"></i>
               </div>
             </div>
           </div>
        </div>
        </div> 
      </div>
      </div>
    </div>
  </div>
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="col-sm-6 mx-auto"> <!-- Add mx-auto class here -->
              <div class="card">
                <div class="card-body d-flex justify-content-between">
                  <div class="text-left">
                    <h5 class="card-title">Baptismal</h5>
                    <p class="card-text">
                      Total Reservation
                    </p>
                  </div>
                  <div class="text-right">
                      <h1>
                        <?php
                          $conn = new mysqli("localhost","root","","tpms");
                           if ($conn->connect_error) {
                            die("Connection failed : " . $conn->connect_error);
                          }
                          $sql = "SELECT COUNT(*) FROM baptismal_tbl";
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
        <div class="carousel-item">
            <div class="col-sm-6 mx-auto"> <!-- Add mx-auto class here -->
                <div class="card">
                    <div class="card-body d-flex justify-content-between">
                      <div class="text-left">
                        <h5 class="card-title">Blessing</h5>
                        <p class="card-text">
                          Total Reservation
                        </p>
                      </div>
                      <div class="text-right">
                          <h1>
                            <?php
                              $conn = new mysqli("localhost","root","","tpms");
                               if ($conn->connect_error) {
                                die("Connection failed : " . $conn->connect_error);
                              }
                              $sql = "SELECT COUNT(*) FROM blessing_tbl";
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
        <div class="carousel-item">
            <div class="col-sm-6 mx-auto"> <!-- Add mx-auto class here -->
              <div class="card">
                <div class="card-body d-flex justify-content-between">
                  <div class="text-left">
                    <h5 class="card-title">Communion</h5>
                    <p class="card-text">
                      Total Reservation
                    </p>
                  </div>
                  <div class="text-right">
                      <h1>
                        <?php
                          $conn = new mysqli("localhost","root","","tpms");
                           if ($conn->connect_error) {
                            die("Connection failed : " . $conn->connect_error);
                          }
                          $sql = "SELECT COUNT(*) FROM communion_tbl";
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
        <div class="carousel-item">
            <div class="col-sm-6 mx-auto"> <!-- Add mx-auto class here -->
                <div class="card">
                    <div class="card-body d-flex justify-content-between">
                      <div class="text-left">
                        <h5 class="card-title">Confirmation</h5>
                        <p class="card-text">
                          Total Reservation
                        </p>
                      </div>
                      <div class="text-right">
                          <h1>
                            <?php
                              $conn = new mysqli("localhost","root","","tpms");
                               if ($conn->connect_error) {
                                die("Connection failed : " . $conn->connect_error);
                              }
                              $sql = "SELECT COUNT(*) FROM confirmation_tbl";
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
        <div class="carousel-item">
            <div class="col-sm-6 mx-auto"> <!-- Add mx-auto class here -->
              <div class="card">
                <div class="card-body d-flex justify-content-between">
                  <div class="text-left">
                    <h5 class="card-title">Funeral Mass</h5>
                    <p class="card-text">
                      Total Reservation
                    </p>
                  </div>
                  <div class="text-right">
                      <h1>
                        <?php
                          $conn = new mysqli("localhost","root","","tpms");
                           if ($conn->connect_error) {
                            die("Connection failed : " . $conn->connect_error);
                          }
                          $sql = "SELECT COUNT(*) FROM funeralmass_tbl";
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
        <div class="carousel-item">
            <div class="col-sm-6 mx-auto"> <!-- Add mx-auto class here -->
                <div class="card">
                    <div class="card-body d-flex justify-content-between">
                      <div class="text-left">
                        <h5 class="card-title">Wedding</h5>
                        <p class="card-text">
                          Total Reservation
                        </p>
                      </div>
                      <div class="text-right">
                          <h1>
                            <?php
                              $conn = new mysqli("localhost","root","","tpms");
                               if ($conn->connect_error) {
                                die("Connection failed : " . $conn->connect_error);
                              }
                              $sql = "SELECT COUNT(*) FROM wedding_tbl";
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
        <!-- Repeat the same structure for other carousel items -->
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


   <div class="container">
     <div class="card">
       <div class="card-body">
         <div class="card-header">
           Events
         </div>

         <div class="row mt-3">
            <?php
              include_once 'php/dbconn.php';
              $result = mysqli_query($conn, "SELECT * FROM eventlist ORDER BY id DESC LIMIT 4");
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
          <div class="col-sm-4 col-md-3">
             <div class="card">
               <div class="card-body">
                  <div class="card-title"><b><?php echo $row["title"] ?></b></div>
                  <div class="card-text"><i class="fa-regular fa-clock"></i> <?php echo date("h:i A", strtotime($row["start"])); ?> - <?php echo date("h:i A", strtotime($row["endtime"])); ?>
          </div>
                <div class="card-text"><i class="fa-solid fa-location-dot"></i> <?php echo $row["location"] ?></div>
                                      <div class="card-text"><i class="fa-regular fa-sun"></i> <?php echo $row["eventday"] ?></div>
                <div class="card-text"><span><?php echo $row["description"] ?></span></div>
                <div class="card-text"><small class="text-muted"><?php echo $row["month"] ?> <?php echo $row["daynumber"] ?></small></div>
              </div>
            </div>
          </div>
        <?php
          }
      } else {
          echo "No result found";
      }
    ?>
   </div>

       </div>
     </div>                    
   </div>