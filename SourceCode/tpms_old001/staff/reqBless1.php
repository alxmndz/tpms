<div class="container" style="margin-top: 10px;">
  <div class="card mb-4">
      <div class="card-header d-flex align-items-center">
        <span class="fs-5 fw-bold">Blessing Status</span>
      </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped" id="datatablesSimple32" style="margin-top: 10px;">
          <?php
            include_once 'php/dbconn.php';
            $result = mysqli_query($conn, "SELECT * FROM blessing_tbl WHERE transactType != 'Walk-In' ORDER BY id DESC;");
            if (mysqli_num_rows($result) > 0) {
          ?>
          <thead>
            <tr>
              <th>Name</th>
              <th>Contact Number</th>
              <th>Transaction Date</th>
              <th>Blessing Date</th>
              <th>Blessing Time</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="searchResults3">
            <?php
              $i = 0;
              while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
              <td><?php echo $row["name"]; ?></td>
              <td><?php echo $row["contact"]; ?></td>
              <td><?php echo date("M d, Y", strtotime($row["transactDate"])); ?></td>
              <td><?php echo date("M d, Y", strtotime($row["blessDate"])); ?></td>
              <td><?php echo date("h:i A", strtotime($row["blessTime"])); ?></td>
              <td><?php echo $row["status"]; ?></td>
              <td>
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $row['id']; ?>"><i class="fa-solid fa-pen-to-square"></i> Update
                </button>
              </td>
            </tr>

  <div class="modal modal-lg fade" id="myModal<?php echo $row['id']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">View Reservation</h4>
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
                            <form action="php/updateBless1.php" method="post" enctype="multipart/form-data" autocomplete="off">
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
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-calendar"></i> Bless Date</label>
                                      <input class="form-control" type="date" id="blessDate" name="blessDate" value="<?php echo $row['blessDate']; ?>" required disabled>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                   <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-clock"></i> Bless Time</label>
                                      <input class="form-control" type="time" id="blessTime" name="blessTime" value="<?php echo $row['blessTime']; ?>" required disabled>
                                  </div>
                            </div>
                          </div>
                          <div class="row my-3">
                            <div class="col-md-6">
                                  <div class="form-outline">
                                    <label class="form-label" for="typeText">Intention</label>
                                      <select class="form-select" id="intention" name="intention" required disabled>
                                        <option value="Sponsor" <?php echo ($row['intention'] === 'Sponsor') ? 'selected' : ''; ?>>Major Sponsor</option>
                                        <option value="Thanksgiving" <?php echo ($row['intention'] === 'Thanksgiving') ? 'selected' : ''; ?>>Thanksgiving</option>
                                        <option value="Birthday" <?php echo ($row['intention'] === 'Birthday') ? 'selected' : ''; ?>>Birthday</option>
                                        <option value="Wedding Anniversarry" <?php echo ($row['intention'] === 'Wedding Anniversarry') ? 'selected' : ''; ?>>Wedding Anniversarry</option>
                                        <option value="Petition" <?php echo ($row['intention'] === 'Petition') ? 'selected' : ''; ?>>Petition</option>
                                        <option value="Recovery" <?php echo ($row['intention'] === 'Recovery') ? 'selected' : ''; ?>>Healing/Recovery</option>
                                        <option value="Soul" <?php echo ($row['intention'] === 'Soul') ? 'selected' : ''; ?>>Soul</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-money-bill-1-wave"></i> Amount Price</label>
                                      <input class="form-control" type="number" id="amount" name="amount" value="<?php echo $row['amount']; ?>" required disabled>
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
                                      <select class="form-select" id="status" name="status" required disabled>
                                        <option value="Approved" <?php echo ($row['status'] === 'Approved') ? 'selected' : ''; ?>>Approved</option>

                                          <option value="In Process" <?php echo ($row['status'] === 'In Process') ? 'selected' : ''; ?>>In Process</option>

                                          <option value="Disapproved, Because mismatch files" <?php echo ($row['status'] === 'Disapproved, Because mismatch files') ? 'selected' : ''; ?>>Disapproved due to file mismatch</option>
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
    const datatablesSimple = document.getElementById('datatablesSimple32');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});
</script>