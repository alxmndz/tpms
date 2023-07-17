<div class="container-fluid px-4">
                    <h1 class="mt-4">Status</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">My Request Certificates</li>
                    </ol>

                </div>
                <div class="container py-5">
                  <table class="table text-center table-bordered text-dark">
                      <?php
                      include_once 'php/dbconn.php';
                      $result = mysqli_query($conn, "SELECT
                                            a.fname,
                                            a.lname,
                                            f.formsID,
                                            f.mobilePhone,
                                            f.email,
                                            f.address,
                                            f.formType,
                                            f.refNum,
                                            f.amount,
                                            f.receiptIMG,
                                            f.status
                                        FROM forms f
                                        LEFT JOIN accounts a ON a.user_id = f.addedBy
                                        WHERE f.addedBy = '$id'");
                      if (mysqli_num_rows($result) > 0) {
                      ?>
                      <thead>
                          <tr>
                              <th scope="col">Firstname</th>
                              <th scope="col">Lastname</th>
                              <th scope="col">Contact</th>
                              <th scope="col">Email</th>
                              <th scope="col">Type</th>
                              <th scope="col">Status</th>
                              <th scope="col">View</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                          $i = 0;
                          while($row = mysqli_fetch_array($result)) {
                          ?>
                          <tr class="text-center">
                              <td><?php echo $row["fname"]; ?></td>
                              <td><?php echo $row["lname"]; ?></td>
                              <td><?php echo $row["mobilePhone"]; ?></td>
                              <td><?php echo $row["email"]; ?></td>
                              <td><?php echo $row["formType"]; ?></td>
                              <td><?php echo $row["status"]; ?></td>
                              <td>
                                  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#viewModal<?php echo $row['formsID']; ?>">
                                      <i class="fa-solid fa-eye"></i>
                                  </button>
                              </td>
                          </tr>
<div class="modal fade" id="viewModal<?php echo $row['formsID']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">View Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 text-start">
                        <p><strong>Receipt:</strong></p>
                        <img id="receiptImage" src="rcpts/<?php echo $row['receiptIMG']; ?>" style="max-width: 250px;" alt="receipt" class="mx-auto mb-3" style="max-width: 100%; height: auto;">
                    </div>
                    <div class="col-md-6 text-end">
                        <p><strong>Firstname:</strong> <?php echo $row["fname"]; ?></p>
                        <p><strong>Lastname:</strong> <?php echo $row["lname"]; ?></p>
                        <p><strong>Address:</strong> <?php echo $row["address"]; ?></p>
                        <p><strong>Contacts:</strong> <?php echo $row["mobilePhone"]; ?></p>
                        <p><strong>Email:</strong> <?php echo $row["email"]; ?></p>
                        <p><strong>Type:</strong> <?php echo $row["formType"]; ?></p>
                        <p><strong>Reference:</strong> <?php echo $row["refNum"]; ?></p>
                        <p><strong>Amount:</strong> <?php echo $row["amount"]; ?></p>
                        <p><strong>Status:</strong> <?php echo $row["status"]; ?></p>
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
        // Update receipt image source when the modal is shown
        $('#viewModal<?php echo $row['formsID']; ?>').on('shown.bs.modal', function() {
            var receiptSrc = 'rcpts/<?php echo $row["receiptIMG"]; ?>';
            $('#receiptImage').attr('src', receiptSrc);
        });
    });
</script>


                      <?php
                              $i++;
                          }
                          ?>
                      </tbody>
                      <?php
                      }
                      else {
                          echo "No result found";
                      }
                      ?>
                  </table>
              </div>