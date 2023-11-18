<link rel="stylesheet" href="css/datatables.min.css">
<link rel="stylesheet" href="css/datatable.css"> 
<div class="container" style="margin-top: 10px;">
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center">
        <span class="fs-5 fw-bold">Marriage Certificate Status</span>
        <div class="ms-auto">
          <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#genWedd"><i class="fa-solid fa-pen-to-square"></i> Generate</button>
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
        <table class="table table-striped" id="s" style="margin-top: 10px;">
          <?php
            include_once 'php/dbconn.php';
            $result = mysqli_query($conn, "SELECT * FROM certmarriage ORDER BY id DESC");
            if (mysqli_num_rows($result) > 0) {
            ?>
              <thead>
                <tr>
                  <th>Groom</th>
                  <th>Bride</th>
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
                    <td><?php echo $row["groom"]; ?></td>
                    <td><?php echo $row["bride"]; ?></td>
                    <td><?php echo date("M d, Y", strtotime($row["generatedDate"])); ?></td>
                    <td>
                      <span class="status-badge <?php echo getStatusColorClass($row['status']); ?>">
                        <?php echo $row["status"]; ?>
                       </span>
                    </td>
                    <td>
                      <a type="button" class="btn btn-sm btn-primary" href="admin/previewWedd.php?id=<?php echo $row["id"]; ?>"> <i class="fa-solid fa-pen-to-square"></i> Preview
                      </a>
                      <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#updateGenWedd<?php echo $row['id']; ?>"> <i class="fa-solid fa-pen-to-square"></i> Update
                      </button>
                    </td>
                  </tr>


<div class="modal fade" id="updateGenWedd<?php echo $row['id']; ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Marriage Certificate Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="php/certificate/updateWedd.php" method="POST" enctype="multipart/form-data" autocomplete="off">

          <div class="row my-3">
            <div class="col-md-6">
              <div class="form-outline">
                <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">
                <input value="<?php echo $id?>" name="addedBy" style="display: none;" id="addedBy">
                   <label class="form-label fw-bold" for="typeText">
                    Groom (Firstname-Middle Initial-Surname)
                  </label>
                  <input  class="form-control" type="text" name="groom" value="<?php echo $row['groom']; ?>" required disabled>
                </div>
              </div>

              <div class="col-md-6">
                 <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                      Bride (Firstname-Middle Initial-Surname)
                    </label>
                  <input class="form-control" type="text" id="bride" name="bride" value="<?php echo $row['bride']; ?>" required disabled/>
                </div>
            </div>
          </div>

          <div class="row my-3">
            <div class="col-md-12">
              <div class="form-outline">
                  <label class="form-label fw-bold" for="typeText">
                    Groom's Age
                  </label>
                  <input  class="form-control" type="number" name="gAge" value="<?php echo $row['gAge']; ?>" required disabled>
                </div>
              </div>
          </div>

          <div class="row my-3">
            <div class="col-md-12">
              <div class="form-outline">
                <label class="form-label fw-bold" for="typeText">
                      Bride's Age
                    </label>
                  <input class="form-control" type="number" name="bAge" value="<?php echo $row['bAge']; ?>" required disabled/>
                </div>
              </div>
          </div>

          <div class="row my-3">
            <div class="col-md-6">
              <div class="form-outline">
                <label class="form-label fw-bold" for="typeText">
                    Groom's Marital Status
                  </label>
                  <input  class="form-control" type="text" name="maritalStatus" value="<?php echo $row['maritalStatus']; ?>" required disabled>   
              </div>
            </div>

              <div class="col-md-6">
                 <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                    Bride's Marital Status
                  </label>
                  <input  class="form-control" type="text" name="maritalStatus2" value="<?php echo $row['maritalStatus2']; ?>" required disabled>
                </div>
            </div>
          </div>

          <div class="row my-3">
            <div class="col-md-6">
              <div class="form-outline">
                <label class="form-label fw-bold" for="typeText">
                    Groom's Nationality
                  </label>
                  <input  class="form-control" type="text" name="gNat" value="<?php echo $row['gNat']; ?>" required disabled>   
              </div>
            </div>

              <div class="col-md-6">
                 <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                    Bride's Nationality
                  </label>
                  <input  class="form-control" type="text" name="bNat" value="<?php echo $row['bNat']; ?>" required disabled>
                </div>
            </div>
          </div>

          <div class="row my-3">
            <div class="col-md-6">
              <div class="form-outline">
                <label class="form-label fw-bold" for="typeText">
                    Groom's Residence
                  </label>
                  <input  class="form-control" type="text" name="gResidence" value="<?php echo $row['gResidence']; ?>" required disabled>   
              </div>
            </div>

              <div class="col-md-6">
                 <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                    Bride's Residence
                  </label>
                  <input  class="form-control" type="text" name="bResidence" value="<?php echo $row['bResidence']; ?>" required disabled>
                </div>
            </div>
          </div>

          <div class="row my-3">
            <div class="col-md-6">
              <div class="form-outline">
                <label class="form-label fw-bold" for="typeText">
                    Groom's Father
                  </label>
                  <input  class="form-control" type="text" name="gFather" value="<?php echo $row['gFather']; ?>" required disabled>   
              </div>
            </div>

              <div class="col-md-6">
                 <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                    Groom's Mother
                  </label>
                  <input  class="form-control" type="text" name="gMother" value="<?php echo $row['gMother']; ?>" required disabled>
                </div>
            </div>
          </div>

          <div class="row my-3">
            <div class="col-md-6">
              <div class="form-outline">
                <label class="form-label fw-bold" for="typeText">
                    Bride's Father
                  </label>
                  <input  class="form-control" type="text" name="bFather" value="<?php echo $row['bFather']; ?>" required disabled>   
              </div>
            </div>

              <div class="col-md-6">
                 <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                    Bride's Mother
                  </label>
                  <input  class="form-control" type="text" name="bMother" value="<?php echo $row['bMother']; ?>" required disabled>
                </div>
            </div>
          </div>

          <div class="row my-3">
            <div class="col-md-12">
              <div class="form-outline">
                <label class="form-label fw-bold" for="typeText">
                    Married Date
                  </label>
                  <input  class="form-control" type="date" name="marriedDate" value="<?php echo $row['marriedDate']; ?>" required disabled>   
              </div>
            </div>
          </div>

          <div class="row my-3">
            <div class="col-md-12">
              <div class="form-outline">
                <label class="form-label fw-bold" for="typeText">
                    Priest Name
                  </label>
                  <input  class="form-control" type="priest" name="priest" value="<?php echo $row['priest']; ?>" required disabled>   
              </div>
            </div>
          </div>

          <div class="row my-3">
            <div class="col-md-6">
              <div class="form-outline">
                <label class="form-label fw-bold" for="typeText">
                    Sponsor 1
                  </label>
                  <input  class="form-control" type="text" name="sponsor1" value="<?php echo $row['sponsor1']; ?>" required disabled>   
              </div>
            </div>

              <div class="col-md-6">
                 <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                    Sponsor 2
                  </label>
                  <input  class="form-control" type="text" name="sponsor2" value="<?php echo $row['sponsor2']; ?>" required disabled>
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

              <button class="btn btn-success" type="submit" name="btn-save" id="btn-save" style="float: right;">Submit</button>
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
    
          var table = $('#s').DataTable({
              
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
              table.column(3).search('').draw();
              break;
            default:
              // Show rows based on the selected status
              table.column(3).search(status).draw();
              break;
          }
        });

      });
    </script>