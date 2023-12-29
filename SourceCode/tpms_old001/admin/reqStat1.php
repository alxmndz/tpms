<link href="https://fonts.cdnfonts.com/css/old-english-five" rel="stylesheet">                
<div class="container" style="margin-top: 10px;">
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center">
        <span class="fs-5 fw-bold">Baptismal Status</span>
      </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped" style="margin-top: 10px;" id="datatablesSimple2">
          <?php
            include_once 'php/dbconn.php';
            $result = mysqli_query($conn, "SELECT * FROM baptismal_tbl WHERE transactType = 'Walk-In' ORDER BY id DESC;");
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
              <td><?php echo $row["name"]; ?></td>
              <td><?php echo $row["contact"]; ?></td>
              <td><?php echo date("M d, Y", strtotime($row["tDate"])); ?></td>
              <td><?php echo date("M d, Y", strtotime($row["bapDate"])); ?></td>
              <td><?php echo date("h:i A", strtotime($row["bapTime"])); ?></td>
              <td><?php echo $row["status"]; ?></td>
              <td>
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#myModal23<?php echo $row['id']; ?>"> <i class="fa-solid fa-pen-to-square"></i> Update
                </button>
                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#myModal24<?php echo $row['id']; ?>"> <i class="fa-solid fa-print"></i> Generate
                </button>
              </td>
            </tr>

  <div class="modal modal-lg fade" id="myModal24<?php echo $row['id']; ?>">
    <div class="modal-dialog">
        <div class="modal-content" style="text-align: center;">

            <!-- Modal Body -->
            <div class="modal-body mb-5">
              <div class="certificate" style="border: 2px solid black; padding: 100px;">
                  <div class="certificate-title mt-2">
                      <h4 style="font-family: 'Old English Five', sans-serif;">
                        <img src="assets/img/nav-logo.png" alt="Logo" class="img-fluid rounded-circle" style="width: 40px;"> Baptismal Certificate<br>
                        <span><b>Saint Vincent Ferrer Parish</b></span>
                      </h4>
                      
                  </div>
                  <div class="certificate-content" style="margin-top: 60px;">
                    <p>This is to certify that</p>
                      <h5 style="font-family: Lucida Handwriting, cursive; border-bottom: 3px solid gold; display: inline-block;padding-bottom: 7px;">
                        <?php echo $row['name']; ?>
                      </h5>
                    <div class="mt-3">
                      <p>Child of [father]</p>
                      <p>and [mother]</p>
                      <p>Born in [birthplace]</p>
                      <p>on the [birthday]</p>
                      <p>has received</p>
                      <h4><b style="font-family: 'Old English Five', sans-serif;" class="mt-3">The Holy Sacrament of Baptism</b></h4>
                      <p>according to the rite of the Roman Catholic Church</p>
                      <div class="mt-5">
                        <p>on the <b><?php echo date("M d, Y", strtotime($row["bapDate"])); ?></b></p>
                        <p>By the [priest]</p>
                        <p>The sponsors being [sponsor1 name]</p>
                        <p>and [sponsor2 name]</p>
                      </div>
                      <div class="mt-5">
                        <p>As appears on the Baptismal Register No. <?php echo $row['id']; ?> of this church.</p>
                      </div>
                    </div>
                  </div>

                   <div class="baptized-by mt-5">
                    <div class="left-side" style="float: left; margin-left: 15px;">
                      <span>
                        Date Issued: <?php echo date("M d, Y", strtotime($row["bapDate"])); ?>
                      </span>
                      <br>
                      <span>
                        Purpose: For Record/Reference
                      </span>
                    </div>
                    <div class="right-side" style="float: right; margin-right: 15px;">
                      <span>
                        Rev. Fr. Leo Edgardo Villostas
                      </span><br>
                      <p>Parish Priest</p>
                    </div>
                  </div>
              </div>
            </div>

        </div>
      </div>
  </div>

  <div class="modal modal-lg fade" id="myModal23<?php echo $row['id']; ?>">
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
                        <img src="receipt/<?php echo $row['receipt']; ?>" alt="Image" class="img-fluid">
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
                                      <input class="form-control" type="time" id="bapTime" name="bapTime" value="<?php echo $row['bapTime']; ?>" required disabled>
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
                                    <label class="form-label" for="typeText"><i class="fa-solid fa-chart-simple"></i> Status</label>
                                      <select class="form-select" id="status" name="status" required>
                                        <option value="Approved" <?php echo ($row['status'] === 'Approved') ? 'selected' : ''; ?>>Approved</option>

                                          <option value="In Process" <?php echo ($row['status'] === 'In Process') ? 'selected' : ''; ?>>In Process</option>

                                          <option value="Disapproved, Because mismatch files" <?php echo ($row['status'] === 'Disapproved, Because mismatch files') ? 'selected' : ''; ?>>Disapproved due to file mismatch</option>
                                      </select>
                                  </div>
                              </div>
                          </div>

<div class="container mb-3">
  <div class="card">
    <div class="card-body">
      <div class="text-center">
        <span class="modal-header mb-3 text-center"><strong>Baptismal Requirements</strong></span>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="birthCertificate" name="birthCert" value="Birth Certificate" <?php echo ($row['birthCert'] === 'Birth Certificate') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="birthCertificate">Birth Certificate</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="marriageContract" name="marriageCont" value="Parents Marriage Contract" <?php echo ($row['marriageCont'] === 'Parents Marriage Contract') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="marriageContract">Parents Marriage Contract</label>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="sponsor1" name="sponsor1" value="Sponsor 1" <?php echo ($row['sponsor1'] === 'Sponsor 1') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="sponsor1">Sponsor 1</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="sponsor2" name="sponsor2" value="Sponsor 2" <?php echo ($row['sponsor2'] === 'Sponsor 2') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="sponsor2">Sponsor 2</label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
                        
                          <div class="row my-3">
                            <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText">Payment method</label>
                                      <input class="form-control" type="text" id="payMethod" name="payMethod" value="<?php echo $row['payMethod']; ?>" required disabled>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText">Reference Number</label>
                                      <input class="form-control" type="number" id="refNum" name="refNum" value="<?php echo $row['refNum']; ?>" required disabled>
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

<script>
window.addEventListener('DOMContentLoaded', event => {
    const datatablesSimple = document.getElementById('datatablesSimple2');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});

</script>