<div class="container" style="margin-top: 10px;">
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center">
        <span class="fs-5 fw-bold">Wedding Status</span>
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
        <table class="table table-striped" id="wedTbl" style="margin-top: 10px;">
          <?php
              include_once 'php/dbconn.php';
              // Assuming you have a query to fetch the value from the table
                              $selectQuery = "SELECT wedding FROM eventsprice";
                              $result = mysqli_query($conn, $selectQuery);

                              if ($result && mysqli_num_rows($result) > 0) {
                                  // Fetch the value
                                  $row = mysqli_fetch_assoc($result);
                                  $wedding = $row['wedding'];
                              } else {
                                  // Default value if no data is found
                                  $wedding = 1000; // You can set any default value here
                              }
              $result = mysqli_query($conn, "SELECT
                          wed.id,
                          wed.groom,
                          wed.bride,
                          wed.gContact,
                          wed.bContact,
                          wed.gAddress,
                          wed.bAddress,
                          wed.package,
                          wed.intention,
                          wed.wdate,
                          wed.resTime,
                          wed.gBirthCert,
                          wed.bBirthCert,
                          wed.gBapCert,
                          wed.bBapcert,
                          wed.gConCert,
                          wed.bConCert,
                          wed.cenomar,
                          wed.marriageLicense,
                          wed.RPic1,
                          wed.RPic2,
                          wed.MBPic1,
                          wed.MBPic2,
                          wed.amount,
                          wed.receipt,
                          wed.refNum,
                          wed.status,
                          wed.transactDate

                    FROM wedding_tbl wed 
                    LEFT JOIN users u ON u.id = wed.addedBy
                    WHERE wed.addedBy = '$id' ORDER BY wed.id DESC");
            if (mysqli_num_rows($result) > 0) {
          ?>
          <thead>
            <tr>
              <th>Name</th>
              <th>Bride</th>
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
              <td><?php echo $row["groom"]; ?></td>
              <td><?php echo $row["bride"]; ?></td>
              <td><?php echo date("M d, Y", strtotime($row["transactDate"])); ?></td>
              <td><?php echo date("M d, Y", strtotime($row["wdate"])); ?></td>
              <td><?php echo date("h:i A", strtotime($row["resTime"])); ?></td>
              <td>
                <span class="status-badge <?php echo getStatusColorClass($row['status']); ?>">
                  <?php echo $row["status"]; ?>
                </span>
              </td>
              <td>
                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#viewWed<?php echo $row['id']; ?>"> <i class="fa-solid fa-eye"></i>
                </button>
                <?php
                  if ($row['status'] === 'Approved' && empty($row['refNum']) && empty($row['amount']) && empty($row['receipt'])) {
                  ?>
                      <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#payWed<?php echo $row['id']; ?>">
                          <i class="fa-solid fa-peso-sign"></i>
                      </button>
                  <?php
                  }
                ?>
              </td>
            </tr>

<div class="modal fade" id="payWed<?php echo $row['id']; ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Wedding Payment Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="php/payWedd.php" method="POST" enctype="multipart/form-data" autocomplete="off">

          <div class="container my-4" id="gcashDetails">
            <div class="card">
              <div class="card-header bg-primary text-white">
                GCash Details
              </div>
              <div class="card-body">

                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['id']; ?>" required>
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
                      <input type="number" class="form-control" id="inputNumber" name="amount" value="<?php $wedding; ?>" readonly required>
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

            <div class="modal fade" id="viewWed<?php echo $row['id']; ?>">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Wedding Reservation</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                    <!-- Left Side (Image) -->
                    <div class="col-md-6">
                        <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="receipt/<?php echo $row['receipt']; ?>" alt="Image 1" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="birthCert/<?php echo $row['gBirthCert']; ?>" alt="Image 2" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="birthCert/<?php echo $row['bBirthCert']; ?>" alt="Image 3" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="bapCert/<?php echo $row['gBapCert']; ?>" alt="Image 4" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="bapCert/<?php echo $row['bBapCert']; ?>" alt="Image 5" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="conCert/<?php echo $row['gConCert']; ?>" alt="Image 6" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="conCert/<?php echo $row['bConCert']; ?>" alt="Image 7" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="cenomar/<?php echo $row['cenomar']; ?>" alt="Image 8" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="marriageLicense/<?php echo $row['marriageLicense']; ?>" alt="Image 9" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="pics/<?php echo $row['RPic1']; ?>" alt="Image 10" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="pics/<?php echo $row['RPic2']; ?>" alt="Image 11" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="pics/<?php echo $row['MBPic1']; ?>" alt="Image 12" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="pics/<?php echo $row['MBPic2']; ?>" alt="Image 13" class="d-block w-100">
                                </div>
                            </div>

                            <!-- Add carousel controls -->
                            <a class="carousel-control-prev" href="#imageCarousel" role="button" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="false"></span>
                                <span class="visually-hidden">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#imageCarousel" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="false"></span>
                                <span class="visually-hidden">Next</span>
                            </a>
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
                                Groom's Name
                              </label>
                            <input class="form-control" type="text" id="groom" name="groom" value="<?php echo $row['groom']; ?>" required disabled/>
                          </div>
                        </div>

                        <div class="col-md-6">
                           <div class="form-outline">
                               <label class="form-label" for="typeText">
                                <i class="fa-solid fa-user"></i> 
                                Bride's Name
                               </label>
                            <input class="form-control" type="text" id="bride" name="bride" value="<?php echo $row['bride']; ?>" required disabled/>
                          </div>
                        </div>
                      </div>

                      <div class="row my-3">
                        <div class="col-md-6">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                Groom's Contact No.
                              </label>
                            <input class="form-control" type="tel" id="gContact" name="gContact" value="<?php echo $row['gContact']; ?>" required disabled/>
                          </div>
                        </div>

                        <div class="col-md-6">
                           <div class="form-outline">
                               <label class="form-label" for="typeText">
                                Bride's Contact No.
                               </label>
                            <input class="form-control" type="tel" id="bContact" name="bContact" value="<?php echo $row['bContact']; ?>" required disabled/>
                          </div>
                        </div>
                      </div>

                      <div class="row my-3">
                        <div class="col-md-6">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-home"></i> 
                                Groom's Address
                              </label>
                            <input class="form-control" type="text" id="gAddress" name="gAddress" value="<?php echo $row['gAddress']; ?>" required disabled/>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-home"></i> 
                                Bride's Address
                              </label>
                            <input class="form-control" type="text" id="bAddress" name="bAddress" value="<?php echo $row['bAddress']; ?>" required disabled/>
                          </div>
                        </div>
                      </div>

                      <div class="row my-3">
                        <div class="col-md-12">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-box-open"></i>
                                Package
                              </label>
                            <select class="form-select" id="package" name="package" required disabled>
                              <option value="Package 1" <?php echo ($row['package'] === 'Package 1') ? 'selected' : ''; ?>>Package 1</option>
                              <option value="Package 2" <?php echo ($row['package'] === 'Package 2') ? 'selected' : ''; ?>>Package 2</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="row my-3">
                        <div class="col-md-12">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                Does both of you are baptize?
                              </label>
                            <select class="form-select" id="intention" name="intention" required disabled>
                              <option disabled selected>Select an option</option>
                              <option value="Yes" <?php echo ($row['intention'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                              <option value="No" <?php echo ($row['intention'] === 'No') ? 'selected' : ''; ?>>No</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="row my-3">
                        <div class="col-md-6">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-calendar"></i>
                                Reserved Date
                              </label>
                            <input type="date" class="form-control" id="wdate" name="wdate" value="<?php echo $row['wdate']; ?>" required disabled/>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-clock"></i>
                                Reserved Time
                              </label>
                            <input type="time" class="form-control" id="resTime" name="resTime" value="<?php echo $row['resTime']; ?>" required disabled/>
                          </div>
                        </div>
                      </div>

                    <div class="row my-3">
                        <div class="col-md-6">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-money-bill-1-wave"></i>
                                Amount
                              </label>
                            <input type="number" class="form-control" id="amount" name="amount" value="<?php echo $row['amount']; ?>" required disabled />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-barcode"></i>
                                Reference No.
                              </label>
                            <input type="number" class="form-control" id="refNum" name="refNum" value="<?php echo $row['refNum']; ?>" required disabled />
                          </div>
                        </div>
                      </div>

                      <div class="row my-3">
                        <div class="col-md-12">
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
    var table = $('#wedTbl').DataTable({
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