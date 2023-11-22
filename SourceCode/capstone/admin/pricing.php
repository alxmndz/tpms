<div class="container mt-3">
  <div class="card">
    <?php
    include_once 'php/dbconn.php';
    $result = mysqli_query($conn, "SELECT * FROM eventsprice");
    if (mysqli_num_rows($result) > 0) {
      $i = 0;
      while ($row = mysqli_fetch_array($result)) {
    ?>
        <div class="card-header">
          <h5 class="fw-bold">Transactions Prices</h5>
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#eventUp<?php echo $row["id"]; ?>"><i class="fas fa-pen-to-square"></i> Update</button>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Event Type</th>
                  <th>Pricing</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Baptismal</td>
                  <td>₱<?php echo number_format($row["baptismal"]); ?></td>
                </tr>
                <tr>
                  <td>Blessing</td>
                  <td>₱<?php echo number_format($row["blessing"]); ?></td>
                </tr>
                <tr>
                  <td>Communion</td>
                  <td>₱<?php echo number_format($row["communion"]); ?></td>
                </tr>
                <tr>
                  <td>Confirmation</td>
                  <td>₱<?php echo number_format($row["confirmation"]); ?></td>
                </tr>
                <tr>
                  <td>Funeral Mass</td>
                  <td>₱<?php echo number_format($row["funeralmass"]); ?></td>
                </tr>
                <tr>
                  <td>Wedding</td>
                  <td>₱<?php echo number_format($row["wedding"]); ?></td>
                </tr>
                <tr>
                  <td>Certificates</td>
                  <td>₱<?php echo number_format($row["cert"]); ?></td>
                </tr>

                <div class="modal" id="eventUp<?php echo $row["id"]; ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Update Transactions Prices</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>
                      <!-- Modal body -->
                      <div class="modal-body">
                        <form action="php/pricing/updateevntprice.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                          <div class="mb-3">
                            <input type="hidden" id="id" name="id" class="form-control" value="<?php echo $row["id"]; ?>" required>
                            <label for="baptismal" class="form-label">Baptismal Price</label>
                            <input type="number" id="baptismal" name="baptismal" class="form-control" value="<?php echo $row["baptismal"]; ?>" required>
                          </div>
                          <div class="mb-3">
                              <label for="blessing" class="form-label">Blessing Price</label>
                              <input type="number" id="blessing" name="blessing" class="form-control" value="<?php echo $row["blessing"]; ?>" required>
                            </div>
                            <div class="mb-3">
                              <label for="communion" class="form-label">Communion Price</label>
                              <input type="number" id="communion" name="communion" class="form-control" value="<?php echo $row["communion"]; ?>" required>
                            </div>
                            <div class="mb-3">
                              <label for="confirmation" class="form-label">Confirmation Price</label>
                              <input type="number" id="confirmation" name="confirmation" class="form-control" value="<?php echo $row["confirmation"]; ?>" required>
                            </div>
                            <div class="mb-3">
                              <label for="funeralmass" class="form-label">Funeral Mass Price</label>
                              <input type="number" id="funeralmass" name="funeralmass" class="form-control" value="<?php echo $row["funeralmass"]; ?>" required>
                            </div>
                            <div class="mb-3">
                              <label for="wedding" class="form-label">Wedding Price</label>
                              <input type="number" id="wedding" name="wedding" class="form-control" value="<?php echo $row["wedding"]; ?>" required>
                            </div>
                            <div class="mb-3">
                              <label for="cert" class="form-label">Certificate Price</label>
                              <input type="number" id="cert" name="cert" class="form-control" value="<?php echo $row["cert"]; ?>" required>
                            </div>
                          <!-- Other fields for update form -->
                          <button type="submit" class="btn btn-primary">Update Prices</button>
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

  <!-- certificates -->
  <!-- Remove the HTML code for the table on the right side -->
</div>
