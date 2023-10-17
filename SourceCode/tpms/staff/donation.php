  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <div class="container-fluid" style="margin-top: 10px;">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center">
                    <i class="fa-solid fa-hand-holding-dollar"></i>
                    <span class="fs-5 fw-bold">Donation</span>
                    <div class="ms-auto">
                      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#donate"><i class="fa-solid fa-hand-holding-dollar"></i></button>
                    </div>
                </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped" style="margin-top: 10px;" id="datatablesSimple38">
            <?php
            include_once 'php/dbconn.php';
            $result = mysqli_query($conn, "SELECT * FROM donation ORDER BY id DESC");
            if (mysqli_num_rows($result) > 0) {
            ?>
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Contact</th>
                  <th>Transaction Date</th>
                  <th>Amount</th>
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
                    <td><?php echo date("M d, Y", strtotime($row["donatedDate"])); ?></td>
                    <td>₱<?php echo number_format($row["amount"]); ?></td>

                    <td>
                      <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#view<?php echo $row['id']; ?>">
                        <i class="fa-solid fa-eye"></i> View Details
                      </button>
                    </td>
                  </tr>

            <!-- View Modal -->
            <div class="modal fade" id="view<?php echo $row['id']; ?>">
              <div class="modal-dialog modal-dialog-centered modal-md">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="viewModalLabel">View Data</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <div class="row">
                              <div class="col-md-6">
                                  <img id="receipt" src="donate/<?php echo $row['receipt']; ?>" style="max-width: 100%; height: auto; max-height: 300px;"
                                      alt="receipt" class="mx-auto mb-3">
                              </div>
                              <div class="col-md-6">
                                  <p><strong>Name:</strong> <?php echo $row["name"]; ?></p>
                                  <p><strong>Contact:</strong> <?php echo $row["contact"]; ?></p>
                                  <p><strong>Transaction Date:</strong> <?php echo date("M d, Y", strtotime($row["donatedDate"])); ?></p>
                                  <p><strong>Amount:</strong> ₱<?php echo number_format($row["amount"]); ?></p>
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>


          <script>
            $(document).ready(function() {
                $('[id^="viewModal"]').on('shown.bs.modal', function() {
                    var modalId = $(this).attr('id');
                    var rowId = modalId.replace('viewModal', '');
                    var receiptSrc = '../donate/<?php echo $row["receipt"]; ?>'; 
                    
                    $('#receiptImage' + rowId).attr('src', receiptSrc);
                });
            });
            </script>


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
    const datatablesSimple = document.getElementById('datatablesSimple38');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});
</script>