<div class="container" style="margin-top: 10px;">
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center">
        <span class="fs-5 fw-bold">Funeral Status</span>
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
        <table class="table table-striped" id="funTbl" style="margin-top: 10px;">
          <?php
              include_once 'php/dbconn.php';
              $result = mysqli_query($conn, "SELECT
                          f.id ,
                          f.name ,
                          f.fName ,
                          f.mName ,
                          f.contact ,
                          f.widow ,
                          f.address ,
                          f.deathDate ,
                          f.age,
                          f.buryDate,
                          f.cause,
                          f.sacrament,
                          f.lastsacrament,
                          f.amount,
                          f.receipt,
                          f.status,
                          f.transactDate,
                          f.transactType,
                          f.refNum
                    FROM funeralmass_tbl f
                    LEFT JOIN users u ON u.id = f.addedBy
                    WHERE f.addedBy = '$id' ORDER BY f.id DESC");
            if (mysqli_num_rows($result) > 0) {
          ?>
          <thead>
            <tr>
              <th>Name</th>
              <th>Transaction Date</th>
              <th>Reserved Date</th>
              <th>Interment</th>
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
              <td><?php echo date("M d, Y", strtotime($row["transactDate"])); ?></td>
              <td><?php echo date("M d, Y", strtotime($row["deathDate"])); ?></td>
              <td><?php echo date("M d, Y", strtotime($row["buryDate"])); ?></td>
              <td><?php echo date("M d, Y", strtotime($row["buryDate"])); ?></td>
              <td>
                <span class="status-badge <?php echo getStatusColorClass($row['status']); ?>">
                  <?php echo $row["status"]; ?>
                </span>
              </td>
              <td>
                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#viewFun<?php echo $row['id']; ?>"> <i class="fa-solid fa-eye"></i>
                </button>
                <?php
                  if ($row['status'] === 'Approved' && empty($row['refNum']) && empty($row['amount']) && empty($row['receipt'])) {
                  ?>
                      <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#payFun<?php echo $row['id']; ?>">
                          <i class="fa-solid fa-peso-sign"></i>
                      </button>
                  <?php
                  }
                ?>
              </td>
            </tr>

<div class="modal fade" id="payFun<?php echo $row['id']; ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Funeral Payment Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="php/payFun.php" method="POST" enctype="multipart/form-data" autocomplete="off">

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
                      <input type="number" class="form-control" id="inputNumber" name="amount" value="1000" readonly required>
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

            <div class="modal fade" id="viewFun<?php echo $row['id']; ?>">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Baptismal Reservation</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <div class="row">
                        <!-- Left Side (Image) -->
                        <div class="col-md-6">
                            <img src="receipt/<?php echo $row['receipt']; ?>" alt="Image" class="img-fluid">
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
                                        Father's Name
                                      </label>
                          <input class="form-control" type="tel" id="fName" name="fName" value="<?php echo $row['fName']; ?>" required disabled>
                                  </div>
                              </div>
                          </div>
                          <div class="row my-3">
                              <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText">Mother's Name</label>
                                      <input class="form-control" type="text" id="mName" name="mName" value="<?php echo $row['mName']; ?>" required disabled>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"> Husband or Wife of</label>
                                      <input class="form-control" type="text" id="widow" name="widow" value="<?php echo $row['widow']; ?>" required disabled>
                                  </div>
                              </div>
                          </div>
                          <div class="row my-3">
                            <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText">Date of death</label>
                                      <input class="form-control" type="date" id="deathDate" name="deathDate" value="<?php echo $row['deathDate']; ?>" required disabled>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                   <div class="form-outline">
                                      <label class="form-label" for="typeText">Interment</label>
                                      <input class="form-control" type="date" id="buryDate" name="buryDate" value="<?php echo $row['buryDate']; ?>" required disabled>
                                  </div>
                            </div>
                          </div>
                          <div class="row my-3">
                              <div class="col-md-12">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-phone"></i> Contact Number</label>
                                      <input class="form-control" type="number" id="contact" name="contact" value="<?php echo $row['contact']; ?>" required disabled>
                                  </div>
                              </div>
                          </div>
                          
                          <div class="row my-3">
                              <div class="col-md-12">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-skull"></i> Cause of death</label>
                                      <input class="form-control" type="text" id="cause" name="cause" value="<?php echo $row['cause']; ?>" required disabled>
                                  </div>
                              </div>
                          </div>
                          <div class="row my-3">
                              <div class="col-md-12">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"> He / She received the last Sacrament before Death?</label>
                                      <select class="form-select" id="cause" name="cause" required disabled>
                                          <option value="Yes" <?php echo ($row['sacrament'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                          <option value="No" <?php echo ($row['sacrament'] === 'No') ? 'selected' : ''; ?>>No</option>
                                      </select>
                                  </div>
                              </div>
                          </div>
                          <div class="row my-3">
                              <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-money-bill-1-wave"></i> Amount Price</label>
                                      <input class="form-control" type="number" id="amount" name="amount" value="<?php echo $row['amount']; ?>" required disabled>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-barcode"></i> Reference No.</label>
                                      <input class="form-control" type="number" id="refNum" name="refNum" value="<?php echo $row['refNum']; ?>" required disabled>
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
    var table = $('#funTbl').DataTable({
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