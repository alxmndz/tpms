<link rel="stylesheet" href="css/datatables.min.css">
<link rel="stylesheet" href="css/datatable.css">  
<div class="container" style="margin-top: 10px;">
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center">
        <span class="fs-5 fw-bold">Baptismal Status</span>
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
        <table class="table table-striped" id="onBapTable" style="margin-top: 10px;">
          <?php
            include_once 'php/dbconn.php';
            $result = mysqli_query($conn, "SELECT * FROM baptismal_tbl WHERE transactType != 'Walk-In' ORDER BY id DESC;");
            // Create an array to store the requirements from the database
            $databaseRequirements = array();
            $dataFromDatabase = [
                'Birth Certificate',   // Assume this data is retrieved from the database
                'Parents Marriage Contract',
                'Sponsor 1',
                'Sponsor 2'
                // Add other data items as needed
            ];

                
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
              <td><?php echo $row["name"] ; ?></td>
              <td><?php echo $row["contact"]; ?></td>
              <td><?php echo date("M d, Y", strtotime($row["tDate"])); ?></td>
              <td><?php echo date("M d, Y", strtotime($row["bapDate"])); ?></td>
              <td><?php echo date("h:i A", strtotime($row["bapTime"])); ?></td>
              <td>
                <span class="status-badge <?php echo getStatusColorClass($row['status']); ?>">
                  <?php echo $row["status"]; ?>
                 </span>
              </td>
              <td>
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $row['id']; ?>"> <i class="fa-solid fa-pen-to-square"></i> Update
                </button>
              </td>
            </tr>

  <div class="modal modal-lg fade" id="myModal<?php echo $row['id']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Reservation</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal Body -->
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
                                    <img src="birthCert/<?php echo $row['birthCert']; ?>" alt="Image 2" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="marriageCont/<?php echo $row['marriageCont']; ?>" alt="Image 3" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="sponsors/<?php echo $row['sponsor1']; ?>" alt="Image 4" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="sponsors/<?php echo $row['sponsor2']; ?>" alt="Image 5" class="d-block w-100">
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
                        <form action="php/updateBap.php" method="post" enctype="multipart/form-data" autocomplete="off">
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
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-calendar"></i> Baptismal Date</label>
                                      <input class="form-control" type="date" id="bapDate" name="bapDate" value="<?php echo $row['bapDate']; ?>" required disabled>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                   <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-clock"></i> Baptismal Time</label>
                                      <select class="form-select" id="bapTime" name="bapTime" required disabled>
                                            <option selected disabled>Select a time</option>
                                            <option value="08:00 AM" <?php echo ($row['bapTime'] === '08:00 AM') ? 'selected' : ''; ?>>8:00 AM</option>
                                            <option value="08:30 AM" <?php echo ($row['bapTime'] === '08:30 AM') ? 'selected' : ''; ?>>8:30 AM</option>
                                            <option value="09:00 AM" <?php echo ($row['bapTime'] === '09:00 AM') ? 'selected' : ''; ?>>9:00 AM</option>
                                            <option value="09:30 AM" <?php echo ($row['bapTime'] === '09:30 AM') ? 'selected' : ''; ?>>9:30 AM</option>
                                            <option value="10:00 AM" <?php echo ($row['bapTime'] === '10:00 AM') ? 'selected' : ''; ?>>10:00 AM</option>
                                            <option value="10:30 AM" <?php echo ($row['bapTime'] === '10:30 AM') ? 'selected' : ''; ?>>10:30 AM</option>
                                        </select>
                                  </div>
                            </div>
                          </div>

                          <div class="row my-3">
                              <div class="col-md-12">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-money-bill-1-wave"></i> Amount Price</label>
                                      <input class="form-control" value="<?php echo $row['amount']; ?>" disabled>
                                  </div>
                              </div>
                          </div>
                        
                          <div class="row my-3">
                            <div class="col-md-12">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-barcode"></i> Reference Number</label>
                                      <input class="form-control" type="number" id="refNum" name="refNum" value="<?php echo $row['refNum']; ?>" required disabled>
                                  </div>
                              </div>
                          </div>

                          <div class="row my-3">
                              <div class="col-md-12">
                                  <div class="form-outline">
                                    <label class="form-label" for="typeText"><i class="fa-solid fa-chart-simple"></i> Status</label>
                                      <select class="form-select" id="status" name="status" required>
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
    
          var table = $('#onBapTable').DataTable({
              
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