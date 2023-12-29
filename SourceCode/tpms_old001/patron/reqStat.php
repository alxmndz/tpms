<div class="container-fluid" style="margin-top: 10px;">
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center">
        <i class="fa-solid fa-scroll me-2"></i>
        <span class="fs-5 fw-bold">Request Status</span>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped" id="datatablesSimple23" style="margin-top: 10px;">
          <?php
            include_once 'php/dbconn.php';
            $result = mysqli_query($conn, "
            SELECT
                          r.id,
                          r.name,
                          r.contact,
                          r.address,
                          r.event,
                          r.status,
                          r.amount,
                          r.refNum,
                          r.receipt,
                          r.payMethod,
                          r.transactType,
                          r.transactDate
                    FROM request r
                    LEFT JOIN users u ON u.id = r.addedBy
                    WHERE r.addedBy = '$id' ORDER BY r.id DESC;

          ");
            if (mysqli_num_rows($result) > 0) {
          ?>
          <thead>
            <tr>
              <th>Name</th>
              <th>Contact</th>
              <th>Address</th>
              <th>Certificate Type</th>
              <th>Transaction Date</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="searchResults2">
            <?php
              $i = 0;
              while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
              <td><?php echo $row["name"]; ?></td>
              <td><?php echo $row["contact"]; ?></td>
              <td><?php echo $row["address"]; ?></td>
              <td><?php echo $row["event"]; ?></td>
              <td><?php echo date("M d, Y", strtotime($row["transactDate"])); ?></td>
              <td><?php echo $row["status"]; ?></td>
              <td>
                <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#updateModal1<?php echo $row['id']; ?>"><i class="fa-solid fa-eye"></i> View</button>
              </td>
            </tr>

            <div class="modal fade" id="updateModal1<?php echo $row['id']; ?>">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  
                  <div class="modal-header">
                    <h4 class="modal-title"><i class="fa-solid fa-chart-simple"></i> Update Request</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>

                  <div class="modal-body">
                    <form  method="post" enctype="multipart/form-data" autocomplete="off">
                      <div class="row">
                        <!-- Left Side (Image) -->
                        <div class="col-md-6">
                            <!-- Add your image here -->
                            <img src="receipt/<?php echo $row['receipt']; ?>" alt="Your Image" class="img-fluid">
                        </div>
                        
                        <!-- Right Side (Input Fields) -->
                     <div class="col-md-6">
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
                              <div class="col-md-12">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-scroll"></i> Type of Certificate</label>
                                      <select class="form-select" id="event" name="event" required disabled>
                                        <option value="Baptismal Certificate" <?php echo ($row['event'] === 'Baptismal Certificate') ? 'selected' : ''; ?>>Baptismal Certificate</option>
                                        <option value="Communion Certificate" <?php echo ($row['event'] === 'Communion Certificate') ? 'selected' : ''; ?>>Communion Certificate</option>
                                        <option value="Confirmation Certificate" <?php echo ($row['event'] === 'Confirmation Certificate') ? 'selected' : ''; ?>>Confirmation Certificate</option>
                                        <option value="Death Certificate" <?php echo ($row['event'] === 'Death Certificate') ? 'selected' : ''; ?>>Death Certificate</option>
                                        <option value="Marriage Certificate" <?php echo ($row['event'] === 'Marriage Certificate') ? 'selected' : ''; ?>>Marriage Certificate</option>
                                      </select>
                                  </div>
                              </div>
                          </div>
                          <div class="row my-3">
                              <div class="col-md-12">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText">Transaction Type</label>
                                      <input class="form-control" type="text" id="transactType" name="transactType" value="<?php echo $row['transactType']; ?>" required disabled>
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
                                          <option value="Ready to pick up" <?php echo ($row['status'] === 'Ready to pick up') ? 'selected' : ''; ?>>Ready to pick up</option>

                                          <option value="Picked Up" <?php echo ($row['status'] === 'Picked Up') ? 'selected' : ''; ?>>Picked Up</option>

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
    const datatablesSimple = document.getElementById('datatablesSimple23');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});
</script>