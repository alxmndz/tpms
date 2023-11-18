  <link rel="stylesheet" href="css/datatables.min.css">
  <link rel="stylesheet" href="css/datatable.css">  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <div class="container-fluid" style="margin-top: 10px;">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center">
                    <i class="fa-solid fa-print"></i>
                    <span class="fs-5 fw-bold">Death Certificate Status</span>
                    <div class="ms-auto">
                      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#genFun"><i class="fa-solid fa-pen-to-square"></i> Generate</button>
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
          <table class="table table-striped" style="margin-top: 10px;" id="certFunTbl">
            <?php
            include_once 'php/dbconn.php';
            $result = mysqli_query($conn, "SELECT * FROM certfun ORDER BY id DESC");
            if (mysqli_num_rows($result) > 0) {
            ?>
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Date</th>
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
                    <td><?php echo $row["deceasedName"]; ?></td>
                    <td><?php echo date("M d, Y", strtotime($row["generatedDate"])); ?></td>
                    <td>
                      <span class="status-badge <?php echo getStatusColorClass($row['status']); ?>">
                        <?php echo $row["status"]; ?>
                       </span>
                    </td>
                    <td>
                      <a type="button" class="btn btn-sm btn-primary" href="admin/previewFun.php?id=<?php echo $row["id"]; ?>"> <i class="fa-solid fa-pen-to-square"></i> Preview
                      </a>
                      <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#updateGenFun<?php echo $row['id']; ?>"> <i class="fa-solid fa-pen-to-square"></i> Update
                      </button>
                    </td>
                  </tr>

<div class="modal fade" id="updateGenFun<?php echo $row['id']; ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Death Certificate Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="php/certificate/updateFun.php" method="POST" enctype="multipart/form-data" autocomplete="off">
              <div class="row my-3">
                <div class="col-md-12">
                  <div class="form-outline">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">
                       <label class="form-label fw-bold" for="typeText">
                        Name (Firstname-Middle Initial-Surname)
                      </label>
                      <input class="form-control" type="text" id="deceasedName" name="deceasedName" value="<?php echo $row['deceasedName']; ?>" required disabled/>
                    </div>
                  </div>
              </div>

              <div class="row my-3">
                <div class="col-md-6">
                  <div class="form-outline">
                       <label class="form-label fw-bold" for="typeText">
                        Father's name (Firstname-Middle Initial-Surname)
                      </label>
                      <input class="form-control" type="text" id="fName" name="fName" value="<?php echo $row['fatherName']; ?>" required disabled/>
                    </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-outline">
                       <label class="form-label fw-bold" for="typeText">
                          Mother's name (Firstname-Middle Initial-Surname)
                        </label>
                      <input class="form-control" type="tel" id="mName" name="mName" value="<?php echo $row['motherName']; ?>" required disabled/>
                    </div>
                </div>
              </div>

              <div class="row my-3">
                <div class="col-md-12">
                  <div class="form-outline">
                       <label class="form-label fw-bold" for="typeText">
                        Husband or Wife (Widowed of)
                      </label>
                      <input class="form-control" type="text" id="widow" name="widow" value="<?php echo $row['widow']; ?>" required disabled/>
                    </div>
                  </div>
              </div>

              <div class="row my-3">
                <div class="col-md-6">
                  <div class="form-outline">
                       <label class="form-label fw-bold" for="typeText">
                        Address
                      </label>
                      <input class="form-control" type="text" id="address" name="address" value="<?php echo $row['residentAdd']; ?>" required disabled/>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-outline">
                         <label class="form-label fw-bold" for="typeText">
                          Date of Death
                        </label>
                        <input class="form-control" type="date" id="deathDate" name="deathDate" value="<?php echo $row['deathDate']; ?>" required disabled/>
                      </div>
                  </div>
              </div>


              <div class="row my-3">
                <div class="col-md-6">
                 <div class="form-outline">
                       <label class="form-label fw-bold" for="typeText">
                          Age
                        </label>
                      <input class="form-control" type="number" id="age" name="age" value="<?php echo $row['age']; ?>" required disabled/>
                    </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-outline">
                       <label class="form-label fw-bold" for="typeText">
                        Internment
                      </label>
                      <input class="form-control" type="date" id="buryDate" name="buryDate" value="<?php echo $row['internment']; ?>" required disabled/>
                    </div>
                </div>
              </div>

              <div class="row my-3">
                <div class="col-md-12">
                  <div class="form-outline">
                       <label class="form-label fw-bold" for="typeText">
                          Cause of death
                        </label>
                      <input class="form-control" type="text" id="cause" name="cause" value="<?php echo $row['causeOfDeath']; ?>" required disabled/>
                    </div>
                  </div>
              </div>

              <div class="row my-3">
                            <div class="col-md-12">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"> He/She received Last Sacrament before Death?</label>
                                      <select class="form-select" id="sbd" name="sbd" required disabled>
                                          <option value="Yes" <?php echo ($row['sbd'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                          <option value="No" <?php echo ($row['sbd'] === 'No') ? 'selected' : ''; ?>>No</option>
                                      </select>
                                  </div>
                              </div>
                          </div>

              <div class="row my-3">
                            <div class="col-md-12">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"> He/She was not able receive Last Sacrament before Death?</label>
                                      <select class="form-select" id="sbd2" name="sbd2" required disabled>
                                          <option value="Yes" <?php echo ($row['sbd2'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                          <option value="No" <?php echo ($row['sbd2'] === 'No') ? 'selected' : ''; ?>>No</option>
                                      </select>
                                  </div>
                              </div>
                          </div>

              <div class="row my-3">
                <div class="col-md-12">
                  <div class="form-outline">
                       <label class="form-label fw-bold" for="typeText">
                        Priest
                      </label>
                      <input class="form-control" type="text" id="priest" name="priest" value="<?php echo $row['priest']; ?>" required disabled/>
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

        <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Submit</button>
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
    
          var table = $('#certFunTbl').DataTable({
              
              buttons:['copy', 'csv', 'excel', 'pdf', 'print']
              
          });
          
          
          table.buttons().container()
          .appendTo('#example_wrapper .col-md-6:eq(0)');

          $('.filter-btn').on('click', function () {
          var status = $(this).data('status');

          // Use a switch statement to handle each status separately
          switch (status) {
            case 'all':
              // Show all rows if 'All' is selected
              table.column(2).search('').draw();
              break;
            default:
              // Show rows based on the selected status
              table.column(2).search(status).draw();
              break;
          }
        });

      });
    </script>