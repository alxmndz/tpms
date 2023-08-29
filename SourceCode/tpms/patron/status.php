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
                                                    r.amount,
                                                    r.status
                                                FROM request r
                                                LEFT JOIN users u ON u.id = r.addedBy
                                                WHERE r.addedBy = '$id' LIMIT 5");
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                    <thead>
                        <tr>
                            <th>Event</th>
                            <th>Amount</th>
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
                            <td><?php echo $row["amount"]; ?></td>
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
                            <td><?php echo $row["donatedDate"]; ?></td>
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
                    <thead>
                        <tr>
                            <th>Receipt</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                        </tr>
                    </tbody>
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
                    <thead>
                        <tr>
                            <th>Receipt</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        </tr>
                    </tbody>
                </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Donation</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <form class="" action="php/donate.php" method="post" enctype="multipart/form-data" autocomplete="off">

                                <input value="<?php echo $id?>" name="addedBy" style="display: none;" id="addedBy">
                                <input class="form-control" type="hidden" id="name" name="name" value="<?php echo $_SESSION['name'] ?>" required />
                       
                                <input class="form-control" type="hidden" id="email" name="email" value="<?php echo $_SESSION['email'] ?>" required />
                                <input class="form-control" type="hidden" id="address" name="address" value="<?php echo $_SESSION['address'] ?>" required/>

                                <input class="form-control" type="hidden" id="contact" name="contact" value="<?php echo $_SESSION['contact'] ?>" required/>
                                
                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-calendar"></i> Date Donated</label>
                                <input class="form-control" type="date" id="date" name="date" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-money-bill-1-wave"></i> Donation Amount</label>
                                <input class="form-control" type="text" type="number" id="amount" name="amount" placeholder="Enter Donation Amount" oninput="formatMoney(this)" required>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-receipt"></i>
                                  Receipt
                                </label>
                                <input class="form-control"type="file" id="receipt" name="receipt" required>
                            </div>
                        </div>
                    </div>
                        <div class="form-group mb-2">             
                          <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Submit</button>  
                        </div>
                                                 
                      </form>
      </div>

    </div>
  </div>
</div>