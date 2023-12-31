<link rel="stylesheet" href="css/datatables.min.css">
<link rel="stylesheet" href="css/datatable.css">  
<div class="container-fluid" style="margin-top: 10px;">
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center">
        <i class="fa-solid fa-scroll me-2"></i>
        <span class="fs-5 fw-bold">Request Status</span>
        <div class="ms-auto">
          <button class="btn btn-primary btn-sm" onclick="openCity(event, 'reqcert')"> Request</button>
          <div class="status-dropdown btn-group">
            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="statusDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              Filter by Status
            </button>
            <ul class="dropdown-menu" aria-labelledby="statusDropdown">
              <li><a class="dropdown-item filter-btn" data-status="all" href="#">All</a></li>
              <li><a class="dropdown-item filter-btn" data-status="Ready to pick up" href="#">Ready to pick up</a></li>
              <li><a class="dropdown-item filter-btn" data-status="Released" href="#">Released</a></li>
              <li><a class="dropdown-item filter-btn" data-status="In Process" href="#">In Process</a></li>
            </ul>
          </div>
        </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped" id="reqsTbl" style="margin-top: 10px;">
          <?php
            include_once 'php/dbconn.php';
            $result = mysqli_query($conn, "SELECT * FROM request ORDER BY id DESC");
            if (mysqli_num_rows($result) > 0) {
          ?>
          <thead>
            <tr>
              <th>Name</th>
              <th>Certificate Type</th>
              <th>Transaction Date</th>
              <th>Pick Up Date</th>
              <th>Released Date</th>
              
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="searchResults2">
            <?php
              $i = 0;
              while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
              <td><?php echo $row["name"]; ?></td>
              <td><?php echo $row["event"]; ?></td>
              <td><?php echo date("M d, Y", strtotime($row["transactDate"])); ?></td>
              <td class="<?php echo ($row["whenToPickUp"] === null || $row["whenToPickUp"] === '0000-00-00'); ?>">
                  <?php
                      if ($row["whenToPickUp"] === null || $row["whenToPickUp"] === '0000-00-00') {
                          echo "No Pick Up Date Yet";
                      } else {
                          echo date("M d, Y", strtotime($row["whenToPickUp"]));
                      }
                  ?>
              </td>
              <td class="<?php echo ($row["pickUpDt"] === null || $row["pickUpDt"] === '0000-00-00'); ?>">
                  <?php
                      if ($row["pickUpDt"] === null || $row["pickUpDt"] === '0000-00-00') {
                          echo "No Release Date Yet";
                      } else {
                          echo date("M d, Y", strtotime($row["pickUpDt"]));
                      }
                  ?>
              </td>
              <td>
                <span class="text-center status-badge <?php echo getStatusColorClass($row['status']); ?>">
                  <?php echo $row["status"]; ?>
                 </span>
              </td>
              <td>
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal1<?php echo $row['id']; ?>"><i class="fa-solid fa-pen-to-square"></i> Update</button>
              </td>
            </tr>


            <!-- Update Modal -->
            <div class="modal fade" id="updateModal1<?php echo $row['id']; ?>">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  
                  <div class="modal-header">
                    <h4 class="modal-title"><i class="fa-solid fa-chart-simple"></i> Update Request</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>

                  <div class="modal-body">
                    <form class="" action="php/request/update.php" method="post" enctype="multipart/form-data" autocomplete="off">
                      <div class="row">
                        <!-- Left Side (Image) -->
                        <div class="col-md-6">
                            <!-- Add your image here -->
                            <img src="receipt/<?php echo $row['receipt']; ?>" alt="Your Image" class="img-fluid">
                        </div>
                        
                        <!-- Right Side (Input Fields) -->
                     <div class="col-md-6">
                        <div class="form-group">
                          <input type="date" name="pickUpDt" class="form-control" value="<?php echo date('Y-m-d'); ?>" style="display: none;">
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
                              <div class="col-md-12">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-calendar"></i> Event</label>
                                      <select class="form-select" id="event" name="event" required disabled>
                                        <option value="Baptismal Certificate" <?php echo ($row['event'] === 'Baptismal Certificate') ? 'selected' : ''; ?>>Baptismal Certificate</option>
                                        <option value="Communion Certificate" <?php echo ($row['event'] === 'Communion Certificate') ? 'selected' : ''; ?>>Communion Certificate</option>
                                        <option value="Confirmation Certificate" <?php echo ($row['event'] === 'Confirmation Certificate') ? 'selected' : ''; ?>>Confirmation Certificate</option>
                                        <option value="Death Certificate" <?php echo ($row['event'] === 'Death Certificate') ? 'selected' : ''; ?>>Death Certificate</option>
                                        <option value="Marriage Certificate" <?php echo ($row['event'] === 'Marriage Certificate') ? 'selected' : ''; ?>>Marriage Certificate</option>
                                      </select>
                                  </div>
                              </div>
                          </div>
                          <div class="row my-3">
                              <div class="col-md-12">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText">Transaction Type</label>
                                      <input class="form-control" type="text" id="transactType" name="transactType" value="<?php echo $row['transactType']; ?>" required disabled>
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
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-barcode"></i> Reference No.</label>
                                      <input class="form-control" type="number" id="refNum" name="refNum" value="<?php echo $row['refNum']; ?>" required disabled>
                                  </div>
                              </div>
                          </div>
                          <div class="row my-3">
                              <div class="col-md-12">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText">Payment Method</label>
                                      <input class="form-control" type="text" id="payMethod" name="payMethod" value="<?php echo $row['payMethod']; ?>" required disabled>
                                  </div>
                              </div>
                          </div>

                          <div class="row my-3">
                              <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText">Pick Up Date</label>
                                      <input class="form-control" type="date" id="whenToPickUp" name="whenToPickUp" value="<?php echo $row['whenToPickUp']; ?>" disabled>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText">Released Date</label>
                                      <input class="form-control" type="date" id="pickUpDt" name="pickUpDt" value="<?php echo $row['pickUpDt']; ?>" disabled>
                                  </div>
                              </div>
                          </div>
                          

                          <div class="row my-3">
                            <div class="col-md-12">
                                  <div class="form-outline">
                                    <label class="form-label" for="typeText"><i class="fa-solid fa-chart-simple"></i> Status</label>
                                      <select class="form-select" id="status" name="status" required>
                                          <option value="Ready to pick up" <?php echo ($row['status'] === 'Ready to pick up') ? 'selected' : ''; ?>>Ready to pick up</option>

                                          <option value="Released" <?php echo ($row['status'] === 'Released') ? 'selected' : ''; ?>>Released</option>

                                          <option value="In Process" <?php echo ($row['status'] === 'In Process') ? 'selected' : ''; ?>>In Process</option>
                                      </select>
                                  </div>
                              </div>
                          </div>

                        <div class="form-group mb-2">             
                          <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Save Changes</button>  
                        </div>                      
                    </form>
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
  $(document).ready(function () {
    // DataTable initialization
    var table = $('#reqsTbl').DataTable({
      buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
    });

    // Move buttons container
    table.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');

    // Status filter button click event
    $('.filter-btn').on('click', function () {
      var status = $(this).data('status');

      // Show all rows if 'All' is selected, otherwise filter by status
      table.column(5).search(status === 'all' ? '' : status).draw();

      // Show/hide columns based on the selected filter
      if (status === 'Ready to pick up') {
        table.column(3).visible(true);
        table.column(4).visible(false);
      } else if (status === 'Picked Up') {
        table.column(3).visible(false);
        table.column(4).visible(true);
      } else {
        table.column(3).visible(false);
        table.column(4).visible(false);
      }
    });
  });
</script>

