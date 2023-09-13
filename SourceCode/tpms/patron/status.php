<div class="container" style="margin-top: 10px;">
    <div class="row">
        <!-- Requests Table -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <i class="fa-solid fa-file-alt"></i>
                    Requests
                </div>
                <div class="card-body">
                    <div class="d-flex mb-2">
                        <input type="text" id="searchInput1" class="form-control form-control-sm me-2" placeholder="Type to search..." autocomplete="off">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                    <?php
                    include_once 'php/dbconn.php';
                    $result = mysqli_query($conn, "SELECT
                                                    r.id,
                                                    r.event,
                                                    r.transactDate,
                                                    r.status
                                                FROM request r
                                                LEFT JOIN users u ON u.id = r.addedBy
                                                WHERE r.addedBy = '$id' LIMIT 5");
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                    <thead>
                        <tr>
                            <th>Certificate Type</th>
                            <th>Request Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row["event"]; ?></td>
                            <td><?php echo date("M-d-y", strtotime($row["transactDate"])); ?></td>
                            <td><?php echo $row["status"]; ?></td>
                            <td><button class="btn btn-success btn-sm">View</button></td>
                        </tr>
                        <?php
                        $i++;
                        }
                        ?>
                    </tbody>
                    <?php
                    } else {
                        echo "No result found";
                    }
                    ?>
                </table>
             </div>
        </div>
    </div>
 </div>

    <!-- Donations Table -->
    <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <i class="fa-solid fa-hand-holding-dollar"></i>
                    Donation
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="d-flex mb-2">
                            <input type="text" id="searchInput2" class="form-control form-control-sm me-2" placeholder="Type to search..." autocomplete="off">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa-solid fa-hand-holding-dollar"></i></button>
                        </div>
                        <table class="table table-striped">
                    <?php
                    include_once 'php/dbconn.php';
                    $result = mysqli_query($conn, "SELECT
                                                    d.id,
                                                    d.amount,
                                                    d.donatedDate
                                                FROM donation d
                                                LEFT JOIN users u ON u.id = d.addedBy
                                                WHERE d.addedBy = '$id' LIMIT 5");
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                    <thead>
                        <tr>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row["amount"]; ?></td>
                            <td><?php echo date("M-d-y", strtotime($row["donatedDate"])); ?></td>
                            <td><button class="btn btn-success btn-sm">View</button></td>
                        </tr>
                        <?php
                        $i++;
                        }
                        ?>
                    </tbody>
                    <?php
                    } else {
                        echo "No result found";
                    }
                    ?>
                </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Wedding -->
<div class="container" style="margin-top: 10px;">
    <div class="row">
        <!-- Wedding Table -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Wedding
                </div>
                <div class="card-body">
                    <div class="d-flex mb-2">
                        <input type="text" id="searchInput3" class="form-control form-control-sm me-2" placeholder="Type to search..." autocomplete="off">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                          <?php
                          include_once 'php/dbconn.php';
                          $result = mysqli_query($conn, "SELECT
                                                          w.package AS Package,
                                                          w.resTime AS ReservedTime,
                                                          w.transactDate AS Date,
                                                          w.status AS Status
                                                      FROM wedding_tbl w
                                                      LEFT JOIN users u ON u.id = w.addedBy
                                                      WHERE w.addedBy = '$id' LIMIT 5");
                          if (mysqli_num_rows($result) > 0) {
                          ?>
                              <thead>
                                  <tr>
                                      <th>Package</th>
                                      <th>Date</th>
                                      <th>Time</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  $i = 0;
                                  while ($row = mysqli_fetch_array($result)) {
                                  ?>
                                      <tr>
                                          <td><?php echo $row["Package"]; ?></td>
                                          <td><?php echo date("M-d-y", strtotime($row["Date"])); ?></td>
                                          <td><?php echo date("h:i A", strtotime($row["ReservedTime"])); ?></td>
                                          <td><?php echo $row["Status"]; ?></td>
                                          <td><button class="btn btn-success btn-sm">View</button></td>
                                      </tr>
                                  <?php
                                  $i++;
                                  }
                                  ?>
                              </tbody>
                          <?php
                          } else {
                              echo "No result found";
                          }
                          ?>
                      </table>
             </div>
        </div>
    </div>
 </div>

    <!-- Baptismal Table -->
    <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Baptismal
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="d-flex mb-2">
                            <input type="text" id="searchInput4" class="form-control form-control-sm me-2" placeholder="Type to search..." autocomplete="off">
                        </div>
                        <table class="table table-striped">
                    <?php
                          include_once 'php/dbconn.php';
                          $result = mysqli_query($conn, "SELECT
                                                          b.bapTime ,
                                                          b.bapDate ,
                                                          b.status 
                                                      FROM baptismal_tbl b
                                                      LEFT JOIN users u ON u.id = b.addedBy
                                                      WHERE b.addedBy = '$id' LIMIT 5");
                          if (mysqli_num_rows($result) > 0) {
                          ?>
                              <thead>
                                  <tr>
                                      <th>Date</th>
                                      <th>Time</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  $i = 0;
                                  while ($row = mysqli_fetch_array($result)) {
                                  ?>
                                      <tr>
                                          <td><?php echo date("M-d-y", strtotime($row["bapDate"])); ?></td>
                                          <td><?php echo date("h:i A", strtotime($row["bapTime"])); ?></td>
                                          <td><?php echo $row["status"]; ?></td>
                                          <td><button class="btn btn-success btn-sm">View</button></td>
                                      </tr>
                                  <?php
                                  $i++;
                                  }
                                  ?>
                              </tbody>
                          <?php
                          } else {
                              echo "No result found";
                          }
                          ?>
                </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "saveDonation.php"; ?>