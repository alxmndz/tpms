<div class="container-fluid" style="margin-top: 10px;">
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center">
        <i class="fa-solid fa-scroll me-2"></i>
        <span class="fs-5 fw-bold">Request Status</span>
        <div class="ms-auto">
          <label class="me-2">Show entries:</label>
          <select id="entriesSelect2" class="form-select form-select-sm">
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
          <input type="text" id="searchInput2" class="form-control form-control-sm me-2" placeholder="Type to search...">
          <button class="btn btn-primary btn-sm" onclick="openCity(event, 'reqcert')"> Request</button>
        </div>

        <table class="table table-striped" id="dataTable" style="margin-top: 10px;">
          <?php
            include_once 'php/dbconn.php';
            $result = mysqli_query($conn, "SELECT * FROM request");
            if (mysqli_num_rows($result) > 0) {
          ?>
          <thead>
            <tr>
              <th>Name</th>
              <th>Contact</th>
              <th>Address</th>
              <th>Certificate Type</th>
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
              <td><?php echo $row["status"]; ?></td>
              <td>
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal1<?php echo $row['id']; ?>"><i class="fa-solid fa-pen-to-square"></i> Update</button>
              </td>
            </tr>
            <!-- Update Modal -->
            <div class="modal fade" id="updateModal1<?php echo $row['id']; ?>">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  
                  <div class="modal-header">
                    <h4 class="modal-title"><i class="fa-solid fa-chart-simple"></i> Update Request</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>

                  <div class="modal-body">
                    <form class="" action="php/request/update.php" method="post" enctype="multipart/form-data" autocomplete="off">
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
                            <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-home"></i> Address</label>
                                      <input class="form-control" type="text" id="address" name="address" value="<?php echo $row['address']; ?>" required disabled>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-outline">
                                      <label class="form-label" for="typeText"><i class="fa-solid fa-calendar"></i> Event</label>
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
                                          <option value="Ready to pick up" <?php echo ($row['status'] === 'Ready to pick up') ? 'selected' : ''; ?>>Ready to pick up</option>

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
    const searchInput = document.getElementById("searchInput2");
    const searchResults = document.getElementById("searchResults2").getElementsByTagName("tr");
    const entriesSelect = document.getElementById("entriesSelect2");

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