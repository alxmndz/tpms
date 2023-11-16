<link rel="stylesheet" href="css/datatables.min.css">
<link rel="stylesheet" href="css/datatable.css">    
<div class="container-fluid">
  <div class="card">
    <div class="card-header d-flex align-items-center">
      <i class="fa-solid fa-users me-2"></i>
      <span class="fs-5 fw-bold">Accounts</span>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-light table-hover table-responsive" id="accTbl">
          <?php
            include 'php/dbconn.php';
            $result = mysqli_query($conn, "SELECT * FROM users ORDER BY name");
            if (mysqli_num_rows($result) > 0) {
          ?>
          <thead>
            <tr>
              <th>Name</th>
              <th>Contact Number</th>
              <th>Email</th>
              <th>Address</th>
              <th>Type</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="searchResults">
            <?php
              $i = 0;
              while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
              <td><?php echo $row["name"]; ?></td>
              <td><?php echo $row["contact"]; ?></td>
              <td><?php echo $row["email"]; ?></td>
              <td><?php echo $row["address"]; ?></td>
              <td><?php echo $row["type"]; ?></td>
              <td>

                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $row['id']; ?>">
                  <i class="fa-solid fa-pen-to-square">
                </i></button>
                
                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $row['id']; ?>">
                    <i class="fa-solid fa-trash"></i>
                </button>
              </td>
            </tr>

            <div class="modal fade" id="updateModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel"><i class="fa-solid fa-users" ></i> Update Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form id="updateForm" action="php/accounts/update.php" autocomplete="off" method="POST">
                    <span id="message"><?php if (isset($message)) { echo $message; } ?></span>
                    <div class="modal-body">
                      <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">
                      <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" disabled>
                      </div>
                      <div class="mb-3">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $row['contact']; ?>" disabled>
                      </div>
                      <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" disabled>
                      </div>
                      <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address']; ?>" disabled>
                      </div>
                      <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select class="form-select" id="type" name="type" required>
                          <option value="admin" <?php echo ($row['type'] === 'admin') ? 'selected' : ''; ?>>Admin</option>
                          <option value="patron" <?php echo ($row['type'] === 'patron') ? 'selected' : ''; ?>>Patron</option>
                          <option value="staff" <?php echo ($row['type'] === 'staff') ? 'selected' : ''; ?>>Staff</option>
                        </select>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Save changes</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="modal fade" id="deleteModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title"><i class="fa-solid fa-trash" style="color: red;"></i> Delete Account</h5>
                  </div>
                  <form id="deleteForm" action="php/accounts/delete.php" autocomplete="off" method="POST">
                    <div class="modal-body">
                      <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">
                      <span>Do you really want to delete the data of <b><?php echo $row['uname']; ?></b>?</span>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-danger">Delete</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </form>
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
    
          var table = $('#accTbl').DataTable({
              
              buttons:['copy', 'csv', 'excel', 'pdf', 'print']
              
          });
          
          
          table.buttons().container()
          .appendTo('#example_wrapper .col-md-6:eq(0)');

      });
    </script>
