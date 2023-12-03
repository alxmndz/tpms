<link rel="stylesheet" href="css/datatables.min.css">
<link rel="stylesheet" href="css/datatable.css"> 
<div class="container" style="margin-top: 10px;">
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center">
        <span class="fs-5 fw-bold">Funeral Mass Status</span>
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
              <li><a class="dropdown-item filter-btn" data-status="Reserved" href="#">Reserved</a></li>
            </ul>
          </div>
        </div>
      </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped" id="walkFunTable" style="margin-top: 10px;">
          <?php
            include_once 'php/dbconn.php';
            $result = mysqli_query($conn, "SELECT * FROM funeralmass_tbl WHERE transactType = 'Walk-In' ORDER BY id DESC;
            ");
            if (mysqli_num_rows($result) > 0) {
          ?>
          <thead>
            <tr>
              <th>Requested By</th>
              <th>Contact Number</th>
              <th>Transaction Date</th>
              <th>Date of Death</th>
              <th>Internment</th>
              <th>Reserved Time</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="searchResults7">
            <?php
              $i = 0;
              while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
              <td><?php echo $row["reqBy"]; ?></td>
              <td><?php echo $row["contact"]; ?></td>
              <td><?php echo date("M d, Y", strtotime($row["transactDate"])); ?></td>
              <td><?php echo date("M d, Y", strtotime($row["deathDate"])); ?></td>
              <td><?php echo date("M d, Y", strtotime($row["buryDate"])); ?></td>
              <td><?php echo date("h:i A", strtotime($row["resTime"])); ?></td>
              <td>
                <span class="status-badge <?php echo getStatusColorClass($row['status']); ?>">
                  <?php echo $row["status"]; ?>
                 </span>
              </td>
              <td>

                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#viewFunw<?php echo $row['id']; ?>">
                  <i class="fa-solid fa-eye"></i> View
                </button>
              </td>
            </tr>

            <div class="modal modal-lg fade" id="viewFunw<?php echo $row['id']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">View Funeral Mass Reservation</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Left Side (Image) -->
                        <div class="col-md-6">
                            <img src="receipt/<?php echo $row['receipt']; ?>" alt="Image" class="img-fluid">
                        </div>

                        <!-- Right Side (Form) -->
                        <div class="col-md-6">
                    <form action="php/updateFun.php" method="post" enctype="multipart/form-data" autocomplete="off">
                      <div class="form-group">
                          <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">
                        </div>
                              <div class="row my-3">
                                <div class="col-md-12">
                                    <div class="form-outline">
                                        <label class="form-label" for="typeText">
                                          <i class="fa-solid fa-user-plus"></i> 
                                          Requested By
                                        </label>
                                      <input class="form-control" type="text" id="reqBy" name="reqBy" value="<?php echo $row['reqBy']; ?>" required disabled>
                                  </div>
                              </div>
                          </div>
                              <div class="row my-3">
                                <div class="col-md-12">
                                    <div class="form-outline">
                                        <label class="form-label" for="typeText">
                                          <i class="fa-solid fa-user"></i> 
                                          Name
                                        </label>
                                      <input class="form-control" type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required disabled>
                                  </div>
                              </div>
                          </div>
                          <div class="row my-3">
                            <div class="col-md-12">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText">
                                        <i class="fa-solid fa-person"></i>
                                        Father's Name
                                      </label>
                          <input class="form-control" type="tel" id="fName" name="fName" value="<?php echo $row['fName']; ?>" required disabled>
                                  </div>
                              </div>
                          </div>
                          <div class="row my-3">
                            <div class="col-md-12">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText">
                                        <i class="fa-solid fa-person-dress"></i>
                                        Mother's Name
                                      </label>
                                      <input class="form-control" type="text" id="mName" name="mName" value="<?php echo $row['mName']; ?>" required disabled>
                                  </div>
                              </div>
                          </div>
                          <div class="row my-3">
                              <div class="col-md-12">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"> Husband or Wife of</label>
                                      <input class="form-control" type="text" id="widow" name="widow" value="<?php echo $row['widow']; ?>" required disabled>
                                  </div>
                              </div>
                          </div>
                          <div class="row my-3">
                              <div class="col-md-12">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"> Contact Number</label>
                                      <input class="form-control" type="text" id="contact" name="contact" value="<?php echo $row['contact']; ?>" required disabled>
                                  </div>
                              </div>
                          </div>
                          <div class="row my-3">
                            <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-calendar"></i> Date of death</label>
                                      <input class="form-control" type="date" id="deathDate" name="deathDate" value="<?php echo $row['deathDate']; ?>" required disabled>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                   <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-calendar"></i> Interment</label>
                                      <input class="form-control" type="date" id="buryDate" name="buryDate" value="<?php echo $row['buryDate']; ?>" required disabled>
                                  </div>
                            </div>
                          </div>
                          
                          <div class="row my-3">
                            <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-clock"></i> Reserved Time</label>
                                      <select class="form-select" id="resTime" name="resTime" required disabled>
                                            <option selected disabled>Select a time</option>
                                            <option value="08:00 AM" <?php echo ($row['resTime'] === '08:00 AM') ? 'selected' : ''; ?>>8:00 AM</option>
                                            <option value="08:30 AM" <?php echo ($row['resTime'] === '08:30 AM') ? 'selected' : ''; ?>>8:30 AM</option>
                                            <option value="09:00 AM" <?php echo ($row['resTime'] === '09:00 AM') ? 'selected' : ''; ?>>9:00 AM</option>
                                            <option value="09:30 AM" <?php echo ($row['resTime'] === '09:30 AM') ? 'selected' : ''; ?>>9:30 AM</option>
                                            <option value="10:00 AM" <?php echo ($row['resTime'] === '10:00 AM') ? 'selected' : ''; ?>>10:00 AM</option>
                                            <option value="10:30 AM" <?php echo ($row['resTime'] === '10:30 AM') ? 'selected' : ''; ?>>10:30 AM</option>
                                            <option value="11:00 AM" <?php echo ($row['resTime'] === '11:00 AM') ? 'selected' : ''; ?>>11:00 AM</option>
                                            <option value="11:30 AM" <?php echo ($row['resTime'] === '11:30 AM') ? 'selected' : ''; ?>>11:30 AM</option>
                                            <option value="11:00 AM" <?php echo ($row['resTime'] === '12:00 AM') ? 'selected' : ''; ?>>11:00 AM</option>
                                            <option value="11:30 AM" <?php echo ($row['resTime'] === '12:30 AM') ? 'selected' : ''; ?>>11:30 AM</option>
                                            <option value="11:00 AM" <?php echo ($row['resTime'] === '1:00 AM') ? 'selected' : ''; ?>>11:00 AM</option>
                                            <option value="11:30 AM" <?php echo ($row['resTime'] === '1:30 AM') ? 'selected' : ''; ?>>11:30 AM</option>
                                            <option value="11:00 AM" <?php echo ($row['resTime'] === '2:00 AM') ? 'selected' : ''; ?>>11:00 AM</option>
                                            <option value="11:30 AM" <?php echo ($row['resTime'] === '2:30 AM') ? 'selected' : ''; ?>>11:30 AM</option>
                                            <option value="11:00 AM" <?php echo ($row['resTime'] === '3:00 AM') ? 'selected' : ''; ?>>11:00 AM</option>
                                        </select>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-skull"></i> Cause of death</label>
                                      <input class="form-control" type="text" id="cause" name="cause" value="<?php echo $row['cause']; ?>" required disabled>
                                  </div>
                              </div>
                          </div>
                          <div class="row my-3">
                            <div class="col-md-12">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"> He/She received Last Sacrament before Death?</label>
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
                                      <label class="form-label" for="typeText">Transaction Type</label>
                                      <input class="form-control" type="text" id="transactType" name="transactType" value="<?php echo $row['transactType']; ?>" required disabled>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText">Payment method</label>
                                      <input class="form-control" type="text" id="payMethod" name="payMethod" value="<?php echo $row['payMethod']; ?>" required disabled>
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
                                          
                                          <option value="Reserved" <?php echo ($row['status'] === 'Reserved') ? 'selected' : ''; ?>>Reserved</option>

                                          <option value="Disapprove, mismatch files" <?php echo ($row['status'] === 'Disapprove, mismatch files') ? 'selected' : ''; ?>>Disapprove, mismatch files</option>
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
    
          var table = $('#walkFunTable').DataTable({
              
              buttons:['copy', 'csv', 'excel', 'pdf', 'print']
              
          });
          
          
          table.buttons().container()
          .appendTo('#example_wrapper .col-md-6:eq(0)');

          // Status filter button click event
          $('.filter-btn').on('click', function () {
            var status = $(this).data('status');

            // Use a switch statement to handle each status separately
            switch (status) {
              case 'all':
                // Show all rows if 'All' is selected
                table.column(6).search('').draw();
                break;
              default:
                // Show rows based on the selected status
                table.column(6).search(status).draw();
                break;
            }
          });

      });
    </script>