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
                      <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#generateBap<?php echo $row['id']; ?>"> <i class="fa-solid fa-pen-to-square"></i> Print
                      </button>
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
                       <label class="form-label fw-bold" for="typeText">
                        He / She received the last Sacrament before Death?
                      </label>
                      <select class="form-select" id="sacrament" name="sacrament">
                        <option disabled selected>Select an option</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                  </div>
              </div>

              <div class="row my-3">
                <div class="col-md-12">
                  <div class="form-outline">
                       <label class="form-label fw-bold" for="typeText">
                        He / She was not able to receive the last Sacraments before death?
                      </label>
                      <select class="form-select" id="lastsacrament" name="lastsacrament">
                        <option disabled selected>Select an option</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
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

                              <option value="Disapproved, Because mismatch files" <?php echo ($row['status'] === 'Disapproved, Because mismatch files') ? 'selected' : ''; ?>>Disapproved due to file mismatch</option>
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

      });
    </script>