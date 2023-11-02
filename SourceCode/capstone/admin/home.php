<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="css/counter.css">
<link rel="stylesheet" type="text/css" href="css/calendar.css">

<div class="container">
  <h5><i class="fas fa-house"></i> Home</h5>
        <div class="row">
            <div class="col-md-3 mt-3">
                <div class="card-counter">
                    <div class="icon-container">
                        <i class="icon fas fa-calendar-days"></i>
                    </div>
                    <div class="counter-value">
                        <p class="mb-0 text-secondary">Total Events</p>
                                                <h4 class="my-1 text-center">
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
                </div>
            </div>
            <div class="col-md-3 mt-3">
                <div class="card-counter">
                    <div class="icon-container1">
                        <i class="icon fas fa-pen-to-square"></i>
                    </div>
                    <div class="counter-value">
                        <p class="mb-0 text-secondary">Total Requests</p>
                                                   <h4 class="my-1 text-center">
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
                </div>
            </div>
            <div class="col-md-3 mt-3">
                <div class="card-counter">
                    <div class="icon-container2" style="background: #52BE80;">
                        <i class="icon fas fa-scroll"></i>
                    </div>
                    <div class="counter-value">
                        <p class="mb-0 text-secondary">Certificates</p>
                                                 <h4 class="my-1 text-center">
                                                   <?php
                                                  $conn = new mysqli("localhost", "root", "", "tpms");
                                                  if ($conn->connect_error) {
                                                      die("Connection failed: " . $conn->connect_error);
                                                  }

                                                  $sql = "SELECT SUM(amount) AS total FROM request"; // Use an alias for the SUM() result.
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
                                                  ?>
                                                 </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-3">
                <div class="card-counter">
                    <div class="icon-container2">
                        <i class="icon fas fa-peso-sign"></i>
                    </div>
                    <div class="counter-value">
                        <p class="mb-0 text-secondary">Total Donations</p>
                                                 <h4 class="my-1 text-center">
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
                </div>
            </div>

        </div>
    </div>
