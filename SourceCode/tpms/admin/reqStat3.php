<div class="container" style="margin-top: 10px;">
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center">
        <span class="fs-5 fw-bold">Confirmation Status</span>
      </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped" id="datatablesSimple5" style="margin-top: 10px;">
          <?php
            include_once 'php/dbconn.php';
            $result = mysqli_query($conn, "SELECT * FROM confirmation_tbl WHERE transactType = 'Walk-In' ORDER BY id DESC;");
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
          <tbody id="searchResults6">
            <?php
              $i = 0;
              while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
              <td><?php echo $row["name"]; ?></td>
              <td><?php echo $row["contact"]; ?></td>
              <td><?php echo date("M d, Y", strtotime($row["transactDate"])); ?></td>
              <td><?php echo date("M d, Y", strtotime($row["conDate"])); ?></td>
              <td><?php echo date("h:i A", strtotime($row["conTime"])); ?></td>
              <td><?php echo $row["status"]; ?></td>
              <td>
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#myModal1<?php echo $row['id']; ?>">
                  <i class="fa-solid fa-pen-to-square"></i> Update
                </button>
                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#printCert<?php echo $row['id']; ?>"> <i class="fa-solid fa-print"></i> Generate
                </button>
              </td>
            </tr>



            <div class="modal modal-lg fade" id="printCert<?php echo $row['id']; ?>">
    <div class="modal-dialog">
        <div class="modal-content" style="text-align: center;">

            <!-- Modal Body -->
            <div class="modal-body mb-5">
              <div class="certificate" style="border: 2px solid black; padding: 100px;">
                  <div class="certificate-title mt-2">
                      <h4 style="font-family: 'Old English Five', sans-serif;">
                        <img src="assets/img/nav-logo.png" alt="Logo" class="img-fluid rounded-circle" style="width: 40px;"> Confirmation Certificate<br>
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
                        <p>on the <b><?php echo date("M d, Y", strtotime($row["conDate"])); ?></b></p>
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
                        Date Issued: <?php echo date("M d, Y", strtotime($row["conDate"])); ?>
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

            <div class="modal modal-lg fade" id="myModal1<?php echo $row['id']; ?>">
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
                            <img src="receipt/<?php echo $row['receipt']; ?>" alt="Image" class="img-fluid">
                        </div>

                        <!-- Right Side (Form) -->
                        <div class="col-md-6">
                    <form action="php/updateCon.php" method="post" enctype="multipart/form-data" autocomplete="off">
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
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-calendar"></i> Confirmation Date</label>
                                      <input class="form-control" type="date" id="conDate" name="conDate" value="<?php echo $row['conDate']; ?>" required disabled>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                   <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-clock"></i> Confirmation Time</label>
                                      <input class="form-control" type="time" id="conTime" name="conTime" value="<?php echo $row['conTime']; ?>" required disabled>
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
        <div class="col-md-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="bapCert" name="bapCert" value="Baptismal Certificate" <?php echo ($row['bapCert'] === 'Baptismal Certificate') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="bapCert">Baptismal Certificate</label>
          </div>
        </div>
      </div>
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
                                      <select class="form-select" id="status" name="status" required>
                                        <option value="Approved" <?php echo ($row['status'] === 'Approved') ? 'selected' : ''; ?>>Approved</option>

                                          <option value="In Process" <?php echo ($row['status'] === 'In Process') ? 'selected' : ''; ?>>In Process</option>

                                          <option value="Disapproved, Because mismatch files" <?php echo ($row['status'] === 'Disapproved, Because mismatch files') ? 'selected' : ''; ?>>Disapproved due to file mismatch</option>
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

<script>
window.addEventListener('DOMContentLoaded', event => {
    const datatablesSimple = document.getElementById('datatablesSimple5');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});
</script>
