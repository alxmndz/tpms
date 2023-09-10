<div class="container" style="margin-top: 10px;">
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center">
        <span class="fs-5 fw-bold">Funeral Mass Status</span>
        <div class="ms-auto" style="margin-right: 5px;">
          <label class="me-2">Show entries:</label>
          <select id="entriesSelect7" class="form-select form-select-sm">
            <option value="all">All</option>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="20">20</option>
          </select>
        </div>
      </div>
    <div class="card-body">
      <div class="table-responsive">
        <div class="d-flex">
          <input type="text" id="searchInput7" class="form-control form-control-sm me-2" placeholder="Type to search...">
        </div>

        <table class="table table-striped" id="dataTable" style="margin-top: 10px;">
          <?php
            include_once 'php/dbconn.php';
            $result = mysqli_query($conn, "SELECT * FROM funeralmass_tbl");
            if (mysqli_num_rows($result) > 0) {
          ?>
          <thead>
            <tr>
              <th>Name</th>
              <th>Address</th>
              <th>Date of Death</th>
              <th>Bury Death</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="searchResults7">
            <?php
              $i = 0;
              while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
              <td><?php echo $row["name"]; ?></td>
              <td><?php echo $row["address"]; ?></td>
              <td><?php echo date("M-d-y", strtotime($row["deathDate"])); ?></td>
              <td><?php echo date("M-d-y", strtotime($row["buryDate"])); ?></td>
              <td><?php echo $row["status"]; ?></td>
              <td>
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal7<?php echo $row['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#view7<?php echo $row['id']; ?>"><i class="fa-solid fa-eye"></i></button>
                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal7<?php echo $row['id']; ?>"><i class="fa-solid fa-trash"></i></button>
              </td>
            </tr>

            <!-- Update Modal -->
            <div class="modal fade" id="updateModal7<?php echo $row['id']; ?>">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  
                  <div class="modal-header">
                    <h4 class="modal-title"><i class="fa-solid fa-chart-simple"></i> Update Request</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>

                  <div class="modal-body">
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
                                      <input class="form-control" type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText">
                                        Father's Name
                                      </label>
                          <input class="form-control" type="tel" id="fName" name="fName" value="<?php echo $row['fName']; ?>" required>
                                  </div>
                              </div>
                          </div>
                          <div class="row my-3">
                              <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText">Mother's Name</label>
                                      <input class="form-control" type="text" id="mName" name="mName" value="<?php echo $row['mName']; ?>" required>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"> Husband or Wife (Widowed of)</label>
                                      <input class="form-control" type="text" id="widow" name="widow" value="<?php echo $row['widow']; ?>" required>
                                  </div>
                              </div>
                          </div>
                          <div class="row my-3">
                            <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText">Date of death</label>
                                      <input class="form-control" type="date" id="deathDate" name="deathDate" value="<?php echo $row['deathDate']; ?>" required>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                   <div class="form-outline">
                                      <label class="form-label" for="typeText">Interment</label>
                                      <input class="form-control" type="date" id="buryDate" name="buryDate" value="<?php echo $row['buryDate']; ?>" required>
                                  </div>
                            </div>
                          </div>
                          <div class="row my-3">
                              <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText">Cause of death</label>
                                      <input class="form-control" type="text" id="cause" name="cause" value="<?php echo $row['cause']; ?>" required>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"> He / She received the last Sacrament before Death?</label>
                                      <select class="form-control" id="cause" name="cause" required>
                                          <option value="Yes" <?php echo ($row['sacrament'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                          <option value="No" <?php echo ($row['sacrament'] === 'No') ? 'selected' : ''; ?>>No</option>
                                      </select>
                                  </div>
                              </div>
                          </div>
                          <div class="row my-3">
                              <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-money-bill-1-wave"></i> Amount Price</label>
                                      <input class="form-control" type="number" id="amount" name="amount" value="<?php echo $row['amount']; ?>" required>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-outline">
                                    <label class="form-label" for="typeText"><i class="fa-solid fa-chart-simple"></i> Status</label>
                                      <select class="form-control" id="status" name="status" required>
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

                        <div class="form-group mb-2">             
                          <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Submit</button>  
                        </div>                      
                    </form>
                  </div>

                </div>
              </div>
            </div>

            <!-- View Modal -->
            <div class="modal fade" id="view7<?php echo $row['id']; ?>">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="viewModalLabel">View Data</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <div class="row">
                              <div class="col-md-6 text-start">
                                  <img id="receipt" src="receipt/<?php echo $row['receipt']; ?>" alt="receipt" class="mx-auto mb-3" style="max-width: 100%; height: auto;">
                              </div>
                              <div class="col-md-6">
                                  <p><strong>Name:</strong> <?php echo $row["name"]; ?></p>
                                  <p><strong>Age:</strong> <?php echo $row["age"]; ?></p>
                                  <p><strong>Address:</strong> <?php echo $row["address"]; ?></p>
                                  <p><strong>Father's Name:</strong> <?php echo $row["fName"]; ?></p>
                                  <p><strong>Mother's Name:</strong> <?php echo $row["mName"]; ?></p>
                                  <p><strong>Widow:</strong> <?php echo $row["widow"]; ?></p>
                                  <p><strong>Date of death:</strong> <?php echo date("M-d-y", strtotime($row["deathDate"])); ?></p>
                                  <p><strong>Internment:</strong> <?php echo date("M-d-y", strtotime($row["buryDate"])); ?></p>
                                  <p><strong>Cause of death:</strong> <?php echo $row["cause"]; ?></p>
                                  <p><strong>Received the last Sacrament before Death?:</strong> <?php echo $row["sacrament"]; ?></p>
                                  <p><strong>Was not able to receive the last Sacraments before death?:</strong> <?php echo $row["lastsacrament"]; ?></p>
                                  <p><strong>Amount:</strong> ₱<?php echo number_format($row["amount"]); ?></p>
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
                $('[id^="viewModal1"]').on('shown.bs.modal', function() {
                    var modalId = $(this).attr('id');
                    var rowId = modalId.replace('viewModal1', '');
                    var receiptSrc = '../receipt/<?php echo $row["receipt"]; ?>'; 
                    
                    $('#receiptImage' + rowId).attr('src', receiptSrc);
                });
            });
            </script>

            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal7<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title"><i class="fa-solid fa-trash"></i> Delete Reservation</h5>
                  </div>
                  <form id="deleteForm" action="" autocomplete="off" method="POST">
                    <div class="modal-body">
                      <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">
                      <span>Do you really want to delete the data of <b><?php echo $row['name']; ?></b>?</span>
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

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("searchInput7");
    const searchResults = document.getElementById("searchResults7").getElementsByTagName("tr");
    const entriesSelect = document.getElementById("entriesSelect7");

    // Add event listener to the search input
    searchInput.addEventListener("input", function() {
      applyFilter();
    });

    // Add event listener to the entries select
    entriesSelect.addEventListener("change", function() {
      applyFilter();
    });

    function applyFilter() {
      const searchTerm = searchInput.value.toLowerCase();
      const entriesToShow = entriesSelect.value;

      // Loop through the table rows and show/hide based on search term and entries select
      let shownEntries = 0;
      for (let i = 0; i < searchResults.length; i++) {
        const row = searchResults[i];
        const name = row.cells[0].innerText.toLowerCase();
        const contact = row.cells[1].innerText.toLowerCase();
        const email = row.cells[2].innerText.toLowerCase();
        const address = row.cells[3].innerText.toLowerCase();
        const event = row.cells[4].innerText.toLowerCase();
        const status = row.cells[5].innerText.toLowerCase();

        if (name.includes(searchTerm) || contact.includes(searchTerm) || email.includes(searchTerm) || address.includes(searchTerm) || event.includes(searchTerm) || status.includes(searchTerm)) {
          row.style.display = "";
          shownEntries++;
          if (entriesToShow !== "all" && shownEntries > entriesToShow) {
            row.style.display = "none";
          }
        } else {
          row.style.display = "none";
        }
      }
    }

  });
  </script>