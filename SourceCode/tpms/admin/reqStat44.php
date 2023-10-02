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
            $result = mysqli_query($conn, "SELECT * FROM funeralmass_tbl WHERE transactType != 'Walk-In'");
            if (mysqli_num_rows($result) > 0) {
          ?>
          <thead>
            <tr>
              <th>Name</th>
              <th>Contact Number</th>
              <th>Transaction Date</th>
              <th>Date of Death</th>
              <th>Internment</th>
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
              <td><?php echo $row["contact"]; ?></td>
              <td><?php echo date("M d, Y", strtotime($row["transactDate"])); ?></td>
              <td><?php echo date("M d, Y", strtotime($row["deathDate"])); ?></td>
              <td><?php echo date("M d, Y", strtotime($row["buryDate"])); ?></td>
              <td><?php echo $row["status"]; ?></td>
              <td>

                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $row['id']; ?>">
                  <i class="fa-solid fa-pen-to-square"></i> Update
                </button>
              </td>
            </tr>

            <div class="modal modal-lg fade" id="myModal<?php echo $row['id']; ?>">
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
                                        Father's Name
                                      </label>
                          <input class="form-control" type="tel" id="fName" name="fName" value="<?php echo $row['fName']; ?>" required disabled>
                                  </div>
                              </div>
                          </div>
                          <div class="row my-3">
                              <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText">Mother's Name</label>
                                      <input class="form-control" type="text" id="mName" name="mName" value="<?php echo $row['mName']; ?>" required disabled>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"> Husband or Wife of</label>
                                      <input class="form-control" type="text" id="widow" name="widow" value="<?php echo $row['widow']; ?>" required disabled>
                                  </div>
                              </div>
                          </div>
                          <div class="row my-3">
                            <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText">Date of death</label>
                                      <input class="form-control" type="date" id="deathDate" name="deathDate" value="<?php echo $row['deathDate']; ?>" required disabled>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                   <div class="form-outline">
                                      <label class="form-label" for="typeText">Interment</label>
                                      <input class="form-control" type="date" id="buryDate" name="buryDate" value="<?php echo $row['buryDate']; ?>" required disabled>
                                  </div>
                            </div>
                          </div>
                          
                          <div class="row my-3">
                              <div class="col-md-12">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-skull"></i> Cause of death</label>
                                      <input class="form-control" type="text" id="cause" name="cause" value="<?php echo $row['cause']; ?>" required disabled>
                                  </div>
                              </div>
                          </div>
                          <div class="row my-3">
                              <div class="col-md-12">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"> He / She received the last Sacrament before Death?</label>
                                      <select class="form-select" id="cause" name="cause" required disabled>
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
        const deathDate = row.cells[1].innerText.toLowerCase();
        const buryDate = row.cells[2].innerText.toLowerCase();
        const status = row.cells[3].innerText.toLowerCase();

        if (name.includes(searchTerm) || deathDate.includes(searchTerm) || buryDate.includes(searchTerm) || status.includes(searchTerm)) {
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