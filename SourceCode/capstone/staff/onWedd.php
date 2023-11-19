Disapprove, mismatch files<link rel="stylesheet" href="css/datatables.min.css">
<link rel="stylesheet" href="css/datatable.css">    
 <div class="container" style="margin-top: 10px;">
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center">
        <span class="fs-5 fw-bold">Wedding Reservation Status</span>
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
        <table class="table table-striped" id="onWeddTable" style="margin-top: 10px;">
          <?php
            include_once 'php/dbconn.php';
            $result = mysqli_query($conn, "SELECT * FROM wedding_tbl WHERE transactType != 'Walk-In' ORDER BY id DESC;");
            // Create an array to store the requirements from the database
            $databaseRequirements = array();
            $dataFromDatabase = [
                'Birth Certificate',   // Assume this data is retrieved from the database
                'Parents Marriage Contract',
                'Confirmation Certificate',
                'Certificate of No Marriage',
                '2x2 Pictures for Marriage Bann',
                'Marriage License',
                '3R Size Pictures'
                // Add other data items as needed
            ];
            if (mysqli_num_rows($result) > 0) {
          ?>
          <thead>
            <tr>
              <th>Groom</th>
              <th>Bride</th>
              <th>Transaction Date</th>
              <th>Reserved Date</th>
              <th>Reserved Time</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="searchResults8">
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
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal1<?php echo $row['id']; ?>"><i class="fa-solid fa-pen-to-square"></i> Update</button>
            </tr>

            <div class="modal modal-lg fade" id="updateModal1<?php echo $row['id']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Reservation</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal Body -->
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
                    <form action="php/updateWedd1.php" method="post" enctype="multipart/form-data" autocomplete="off">
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
                                <i class="fa-solid fa-phone"></i> 
                                Groom's Contact
                              </label>
                            <input class="form-control" type="tel" id="gContact" name="gContact" value="<?php echo $row['gContact']; ?>" required disabled/>
                          </div>
                        </div>

                        <div class="col-md-6">
                           <div class="form-outline">
                               <label class="form-label" for="typeText">
                                <i class="fa-solid fa-phone"></i> 
                                Bride's Contact
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
                            <select class="form-select" id="status" name="status" required>
                              <option value="Approved" <?php echo ($row['status'] === 'Approved') ? 'selected' : ''; ?>>Approved</option>

                              <option value="In Process" <?php echo ($row['status'] === 'In Process') ? 'selected' : ''; ?>>In Process</option>

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
    
          var table = $('#onWeddTable').DataTable({
              
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