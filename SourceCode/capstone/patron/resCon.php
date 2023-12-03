<div class="container" style="margin-top: 10px;">
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center">
        <span class="fs-5 fw-bold">Confirmation Status</span>
        <div class="ms-auto">
          <div class="status-dropdown btn-group">
            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="statusDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              Filter by Status
            </button>
            <ul class="dropdown-menu" aria-labelledby="statusDropdown">
              <li><a class="dropdown-item filter-btn" data-status="all" href="#">All</a></li>
              <li><a class="dropdown-item filter-btn" data-status="Approved" href="#">Approved</a></li>
              <li><a class="dropdown-item filter-btn" data-status="Disapprove, mismatch files" href="#">Disapprove</a></li>
              <li><a class="dropdown-item filter-btn" data-status="In Process" href="#">In Process</a></li>
            </ul>
          </div>
        </div>
     </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped" id="conTbl" style="margin-top: 10px;">
          <?php
              include_once 'php/dbconn.php';
              // Assuming you have a query to fetch the value from the table
                      $selectQuery = "SELECT confirmation FROM eventsprice";
                      $result = mysqli_query($conn, $selectQuery);

                      if ($result && mysqli_num_rows($result) > 0) {
                          // Fetch the value
                          $row = mysqli_fetch_assoc($result);
                          $confirmation = $row['confirmation'];
                      } else {
                          // Default value if no data is found
                          $confirmation = 1000; // You can set any default value here
                      }
              $result = mysqli_query($conn, "SELECT
                          con.id ,
                          con.name ,
                          con.contact ,
                          con.address ,
                          con.transactDate ,
                          con.conTime ,
                          con.conDate ,
                          con.description ,
                          con.amount ,
                          con.refNum,
                          con.status,
                          con.receipt,
                          con.transactType,
                          con.bapCert
                    FROM confirmation_tbl con
                    LEFT JOIN users u ON u.id = con.addedBy
                    WHERE con.addedBy = '$id' ORDER BY con.id DESC");
            if (mysqli_num_rows($result) > 0) {
          ?>
          <thead>
            <tr>
              <th>Name</th>
              <th>Contact Number</th>
              <th>Transaction Date</th>
              <th>Reserved Date</th>
              <th>Reserved Time</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="searchResults4">
            <?php
              $i = 0;
              while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
              <td><?php echo $row["name"]; ?></td>
              <td><?php echo $row["contact"]; ?></td>
              <td><?php echo date("M d, Y", strtotime($row["transactDate"])); ?></td>
              <td><?php echo date("M d, Y", strtotime($row["conDate"])); ?></td>
              <td><?php echo date("h:i A", strtotime($row["conTime"])); ?></td>
              <td>
                <span class="status-badge <?php echo getStatusColorClass($row['status']); ?>">
                  <?php echo $row["status"]; ?>
                 </span>
              </td>
              <td>
                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#viewCon<?php echo $row['id']; ?>"> <i class="fa-solid fa-eye"></i>
                </button>
                <?php
                  if ($row['status'] === 'Approved' && empty($row['refNum']) && empty($row['amount']) && empty($row['receipt'])) {
                  ?>
                      <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#payCon<?php echo $row['id']; ?>">
                          <i class="fa-solid fa-peso-sign"></i>
                      </button>
                  <?php
                  }
                ?>
              </td>
            </tr>


<div class="modal fade" id="payCon<?php echo $row['id']; ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Confirmation Payment Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="php/payCon.php" method="POST" enctype="multipart/form-data" autocomplete="off">

          <div class="container my-4" id="gcashDetails">
            <div class="card">
              <div class="card-header bg-primary text-white">
                GCash Details
              </div>
              <div class="card-body">

                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['id']; ?>" required>
                <input type="hidden" class="form-control" id="status" name="status" value="Reserved" required>
                <input type="hidden" class="form-control" id="payDate" name="payDate" value="<?php echo date('Y-m-d'); ?>" required>
                <input type="hidden" class="form-control" id="payMethod" name="payMethod" value="gcash" required>

                <div class="row my-3">
                    <div class="col-md-6 mt-5">
                      <div class="text-center">
                        <img class="img-fluid" src="assets/icons/gcash.png" alt="GCash Logo" style="max-width: 100px; max-height: 100px;">
                        <p class="card-text">For payment method contact:</p>
                        <p class="mt-2"><i class="fas fa-phone"></i> 0917 835 0117</p>
                      </div>
                    </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="amount" class="form-label">Amount</label>
                      <input type="number" class="form-control" id="inputNumber" name="amount" value="<?php echo $confirmation; ?>" readonly required>
                    </div>
                    <div class="mb-3">
                      <label for="refNum" class="form-label">Reference Number</label>
                      <input type="number" class="form-control" id="inputRefNum" name="refNum" placeholder="Enter your Reference Number" required>
                    </div>
                    <div class="mb-3">
                      <label for="receipt" class="form-label">Receipt Image</label>
                      <input type="file" class="form-control" id="inputFile" name="receipt" required>
                    </div>
                  </div>
                </div>


              </div>
            </div>
          </div>

          <div class="col-md-6 ms-auto">
            <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

            <div class="modal fade" id="viewCon<?php echo $row['id']; ?>">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Confirmation Reservation</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <div class="row">
                    <!-- Left Side (Image) -->
                    <div class="col-md-6">
                        <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="receipt/<?php echo $row['receipt']; ?>" alt="Image 1" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="bapCert/<?php echo $row['bapCert']; ?>" alt="Image 2" class="d-block w-100">
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Right Side (Form) -->
                    <div class="col-md-6">
                    <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                      <div class="form-group">
                          <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">
                        </div>
                              <div class="row my-3">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label" for="typeText">
                                          <i class="fa-solid fa-user"></i> 
                                          Name
                                        </label>
                                      <input class="form-control" type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required disabled>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText">
                                        <i class="fa-solid fa-phone"></i> 
                                          Contact Number
                                      </label>
                          <input class="form-control" type="tel" id="contact" name="contact" value="<?php echo $row['contact']; ?>" required disabled>
                                  </div>
                              </div>
                          </div>
                          <div class="row my-3">
                            <div class="col-md-12">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-home"></i> Address</label>
                                      <input class="form-control" type="text" id="address" name="address" value="<?php echo $row['address']; ?>" required disabled>
                                  </div>
                              </div>
                          </div>
                          <div class="row my-3">
                            <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-calendar"></i> Blessing Date</label>
                                      <input class="form-control" type="date" id="conDate" name="conDate" value="<?php echo $row['conDate']; ?>" required disabled>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                   <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-clock"></i> Blessing Time</label>
                                      <select class="form-select" id="conTime" name="conTime" required disabled>
                                            <option selected disabled>Select a time</option>
                                            <option value="08:00 AM" <?php echo ($row['conTime'] === '08:00 AM') ? 'selected' : ''; ?>>8:00 AM</option>
                                            <option value="08:30 AM" <?php echo ($row['conTime'] === '08:30 AM') ? 'selected' : ''; ?>>8:30 AM</option>
                                            <option value="09:00 AM" <?php echo ($row['conTime'] === '09:00 AM') ? 'selected' : ''; ?>>9:00 AM</option>
                                            <option value="09:30 AM" <?php echo ($row['conTime'] === '09:30 AM') ? 'selected' : ''; ?>>9:30 AM</option>
                                            <option value="10:00 AM" <?php echo ($row['conTime'] === '10:00 AM') ? 'selected' : ''; ?>>10:00 AM</option>
                                            <option value="10:30 AM" <?php echo ($row['conTime'] === '10:30 AM') ? 'selected' : ''; ?>>10:30 AM</option>
                                            <option value="11:00 AM" <?php echo ($row['conTime'] === '11:00 AM') ? 'selected' : ''; ?>>11:00 AM</option>
                                        </select>
                                  </div>
                            </div>
                          </div>
                          <div class="row my-3">
                            <div class="col-md-12">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText">Description</label>
                                      <input class="form-control" type="text" id="description" name="description" value="<?php echo $row['description']; ?>" required disabled>
                                  </div>
                              </div>
                          </div>
                          <div class="row my-3">
                            <div class="col-md-12">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-barcode"></i> Reference No.</label>
                                      <input class="form-control" type="number" id="refNum" name="refNum" value="<?php echo $row['refNum']; ?>" required disabled>
                                  </div>
                              </div>
                          </div>
                          <div class="row my-3">
                              <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-money-bill-1-wave"></i> Amount Price</label>
                                      <input class="form-control" value="<?php echo $row['amount']; ?>" required disabled>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-outline">
                                    <label class="form-label" for="typeText"><i class="fa-solid fa-chart-simple"></i> Status</label>
                                      <select class="form-select" id="status" name="status" required disabled>
                                        <option value="Approved" <?php echo ($row['status'] === 'Approved') ? 'selected' : ''; ?>>Approved</option>

                                          <option value="In Process" <?php echo ($row['status'] === 'In Process') ? 'selected' : ''; ?>>In Process</option>

                                          <option value="Disapproved, Because mismatch files" <?php echo ($row['status'] === 'Disapproved, Because mismatch files') ? 'selected' : ''; ?>>Disapproved due to file mismatch</option>
                                      </select>
                                  </div>
                              </div>
                          </div>                     
                    </form>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

            
            <?php
                $i++;
              }
            ?>
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

<script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/datatables.min.js"></script>
    <script src="js/pdfmake.min.js"></script>
    <script src="js/vfs_fonts.js"></script>
<script>
  $(document).ready(function(){
    // DataTable initialization
    var table = $('#conTbl').DataTable({
      buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
    });

    // Move buttons container
    table.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');

    // Status filter button click event
    $('.filter-btn').on('click', function () {
      var status = $(this).data('status');

      // Use a switch statement to handle each status separately
      switch (status) {
        case 'all':
          // Show all rows if 'All' is selected
          table.column(5).search('').draw();
          break;
        default:
          // Show rows based on the selected status
          table.column(5).search(status).draw();
          break;
      }
    });

  });
</script>