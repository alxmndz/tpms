<div class="container" style="margin-top: 10px;">
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center">
        <span class="fs-5 fw-bold">Communion Status</span>
        <div class="ms-auto" style="margin-right: 5px;">
          <label class="me-2">Show entries:</label>
          <select id="entriesSelect5" class="form-select form-select-sm">
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
          <input type="text" id="searchInput5" class="form-control form-control-sm me-2" placeholder="Type to search...">
        </div>

        <table class="table table-striped" id="dataTable" style="margin-top: 10px;">
          <?php
            include_once 'php/dbconn.php';
            $result = mysqli_query($conn, "SELECT * FROM communion_tbl");
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
          <tbody id="searchResults5">
            <?php
              $i = 0;
              while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
              <td><?php echo $row["name"]; ?></td>
              <td><?php echo $row["contact"]; ?></td>
              <td><?php echo date("M d, Y", strtotime($row["comDate"])); ?></td>
              <td><?php echo date("M d, Y", strtotime($row["comDate"])); ?></td>
              <td><?php echo date("h:i A", strtotime($row["comTime"])); ?></td>
              <td><?php echo $row["status"]; ?></td>
              <td>
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#myModal1<?php echo $row['id']; ?>">
                  <i class="fa-solid fa-pen-to-square"></i> Update
                </button>
              </td>
            </tr>

            <div class="modal fade" id="myModal1<?php echo $row['id']; ?>">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Update Reservation</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>

                  <!-- Modal body -->
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
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-home"></i> Communion Date</label>
                                      <input class="form-control" type="date" id="comDate" name="comDate" value="<?php echo $row['comDate']; ?>" required >
                                  </div>
                              </div>
                              <div class="col-md-6">
                                   <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-home"></i> Communion Time</label>
                                      <input class="form-control" type="time" id="comTime" name="comTime" value="<?php echo $row['comTime']; ?>" required>
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
    const searchInput = document.getElementById("searchInput5");
    const searchResults = document.getElementById("searchResults5").getElementsByTagName("tr");
    const entriesSelect = document.getElementById("entriesSelect5");

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
        const comDate = row.cells[1].innerText.toLowerCase();
        const comTime = row.cells[2].innerText.toLowerCase();
        const status = row.cells[3].innerText.toLowerCase();

        if (name.includes(searchTerm) || comDate.includes(searchTerm) || comTime.includes(searchTerm) || status.includes(searchTerm)) {
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