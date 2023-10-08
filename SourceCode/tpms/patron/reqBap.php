<div class="container" style="margin-top: 10px;">
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center">
        <span class="fs-5 fw-bold">Baptismal Status</span>
      </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped" id="datatablesSimple16" style="margin-top: 10px;">
          <?php
              include_once 'php/dbconn.php';
              $result = mysqli_query($conn, "SELECT
                          b.id ,
                          b.name ,
                          b.contact ,
                          b.address ,
                          b.tDate ,
                          b.bapTime ,
                          b.bapDate ,
                          b.amount ,
                          b.refNum,
                          b.status,
                          b.receipt,
                          b.birthCert,
                          b.marriageCont,
                          b.sponsor1,
                          b.sponsor2 
                    FROM baptismal_tbl b
                    LEFT JOIN users u ON u.id = b.addedBy
                    WHERE b.addedBy = '$id' ORDER BY b.id DESC");
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
                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $row['id']; ?>"> <i class="fa-solid fa-eye"></i> View
                </button>
              </td>
            </tr>

            <div class="modal fade" id="myModal<?php echo $row['id']; ?>">
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
                                      <input class="form-control" type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required readonly>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText">
                                        <i class="fa-solid fa-phone"></i> 
                                          Contact Number
                                      </label>
                          <input class="form-control" type="tel" id="contact" name="contact" value="<?php echo $row['contact']; ?>" required readonly>
                                  </div>
                              </div>
                          </div>
                          <div class="row my-3">
                            <div class="col-md-12">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-home"></i> Address</label>
                                      <input class="form-control" type="text" id="address" name="address" value="<?php echo $row['address']; ?>" required readonly>
                                  </div>
                              </div>
                          </div>
                          <div class="row my-3">
                            <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-calendar"></i> Baptismal Date</label>
                                      <input class="form-control" type="date" id="bapDate" name="bapDate" value="<?php echo $row['bapDate']; ?>" required readonly>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                   <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-clock"></i> Baptismal Time</label>
                                      <input class="form-control" type="time" id="bapTime" name="bapTime" value="<?php echo $row['bapTime']; ?>" required readonly>
                                  </div>
                            </div>
                          </div>
                          <div class="row my-3">
                            <div class="col-md-12">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-barcode"></i> Reference No.</label>
                                      <input class="form-control" type="number" id="refNum" name="refNum" value="<?php echo $row['refNum']; ?>" required readonly>
                                  </div>
                              </div>
                          </div>
                          <div class="row my-3">
                              <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-money-bill-1-wave"></i> Amount Price</label>
                                      <input class="form-control" type="number" id="amount" name="amount" value="<?php echo $row['amount']; ?>" required readonly>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-outline">
                                    <label class="form-label" for="typeText"><i class="fa-solid fa-chart-simple"></i> Status</label>
                                      <select class="form-select" id="status" name="status" required disabled>
                                        <option value="Approved" <?php echo ($row['status'] === 'Approved') ? 'selected' : ''; ?>>Approved</option>

                                          <option value="In Process" <?php echo ($row['status'] === 'In Process') ? 'selected' : ''; ?>>In Process</option>

                                          <option value="Disapproved, Because mismatch files" <?php echo ($row['status'] === 'Disapproved, Because mismatch files') ? 'selected' : ''; ?>>Disapproved due to file mismatch</option>

                                          <option value="Disapproved due to non-compliance" <?php echo ($row['status'] === 'Disapproved due to non-compliance') ? 'selected' : ''; ?>>Disapproved due to non-compliance</option>

                                          <option value="Disapproved due to duplicate submission" <?php echo ($row['status'] === 'Disapproved due to duplicate submission') ? 'selected' : ''; ?>>Disapproved due to duplicate submission</option>

                                          <option value="Disapproved due to Quality Issue" <?php echo ($row['status'] === 'Disapproved due to Quality Issue') ? 'selected' : ''; ?>>Disapproved due to quality issue</option>
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

<script>
window.addEventListener('DOMContentLoaded', event => {
    const datatablesSimple = document.getElementById('datatablesSimple16');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});
</script>