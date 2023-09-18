 <div class="container" style="margin-top: 10px;">
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center">
        <span class="fs-5 fw-bold">Wedding Reservation Status</span>
        <div class="ms-auto" style="margin-right: 5px;">
          <label class="me-2">Show entries:</label>
          <select id="entriesSelect8" class="form-select form-select-sm">
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
          <input type="text" id="searchInput8" class="form-control form-control-sm me-2" placeholder="Type to search...">
        </div>

        <table class="table table-striped" id="dataTable" style="margin-top: 10px;">
          <?php
            include_once 'php/dbconn.php';
            $result = mysqli_query($conn, "SELECT * FROM wedding_tbl");
            if (mysqli_num_rows($result) > 0) {
          ?>
          <thead>
            <tr>
              <th>Groom</th>
              <th>Bride</th>
              <th>Transaction Date</th>
              <th>Wedding Date</th>
              <th>Wedding Time</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="searchResults8">
            <?php
              $i = 0;
              while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
              <td><?php echo $row["groom"]; ?></td>
              <td><?php echo $row["bride"]; ?></td>
              <td><?php echo date("M d, Y", strtotime($row["transactDate"])); ?></td>
              <td><?php echo date("M d, Y", strtotime($row["wdate"])); ?></td>
              <td><?php echo date("h:i A", strtotime($row["resTime"])); ?></td>
              <td><?php echo $row["status"]; ?></td>
              <td>
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $row['id']; ?>"><i class="fa-solid fa-pen-to-square"></i> Update</button>
            </tr>

            <div class="modal fade" id="updateModal<?php echo $row['id']; ?>">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
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
                                Groom's Name
                              </label>
                            <input class="form-control" type="text" id="groom" name="groom" value="<?php echo $row['groom']; ?>" required />
                          </div>
                        </div>

                        <div class="col-md-6">
                           <div class="form-outline">
                               <label class="form-label" for="typeText">
                                <i class="fa-solid fa-user"></i> 
                                Bride's Name
                               </label>
                            <input class="form-control" type="text" id="bride" name="bride" value="<?php echo $row['bride']; ?>" required />
                          </div>
                        </div>
                      </div>

                      <div class="row my-3">
                        <div class="col-md-6">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-phone"></i> 
                                Groom's Contact
                              </label>
                            <input class="form-control" type="tel" id="gContact" name="gContact" value="<?php echo $row['gContact']; ?>" required />
                          </div>
                        </div>

                        <div class="col-md-6">
                           <div class="form-outline">
                               <label class="form-label" for="typeText">
                                <i class="fa-solid fa-phone"></i> 
                                Bride's Contact
                               </label>
                            <input class="form-control" type="tel" id="bContact" name="bContact" value="<?php echo $row['bContact']; ?>" required />
                          </div>
                        </div>
                      </div>

                      <div class="row my-3">
                        <div class="col-md-6">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-home"></i> 
                                Groom's Address
                              </label>
                            <input class="form-control" type="text" id="gAddress" name="gAddress" value="<?php echo $row['gAddress']; ?>" required />
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-home"></i> 
                                Bride's Address
                              </label>
                            <input class="form-control" type="text" id="bAddress" name="bAddress" value="<?php echo $row['bAddress']; ?>" required />
                          </div>
                        </div>
                      </div>

                      <div class="row my-3">
                        <div class="col-md-12">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-box-open"></i>
                                Package
                              </label>
                            <select class="form-select" id="package" name="package" required>
                              <option value="Package 1" <?php echo ($row['package'] === 'Package 1') ? 'selected' : ''; ?>>Package 1</option>
                              <option value="Package 2" <?php echo ($row['package'] === 'Package 2') ? 'selected' : ''; ?>>Package 2</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="row my-3">
                        <div class="col-md-12">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                Does both of you are baptize?
                              </label>
                            <select class="form-select" id="intention" name="intention" required>
                              <option disabled selected>Select an option</option>
                              <option value="Yes" <?php echo ($row['intention'] === 'Yes') ? 'selected' : ''; ?>>Yes</option>
                              <option value="No" <?php echo ($row['intention'] === 'No') ? 'selected' : ''; ?>>No</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="row my-3">
                        <div class="col-md-6">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-calendar"></i>
                                Date
                              </label>
                            <input type="date" class="form-control" id="wdate" name="wdate" value="<?php echo $row['wdate']; ?>" required />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-clock"></i>
                                Reserved Time
                              </label>
                            <input type="time" class="form-control" id="resTime" name="resTime" value="<?php echo $row['resTime']; ?>" required />
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
  const searchInput = document.getElementById("searchInput8");
  const searchResults = document.getElementById("searchResults8").getElementsByTagName("tr");
  const entriesSelect = document.getElementById("entriesSelect8");

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
      const groom = row.cells[0].innerText.toLowerCase();
      const bride = row.cells[1].innerText.toLowerCase();
      const wdate = row.cells[2].innerText.toLowerCase();
      const status = row.cells[3].innerText.toLowerCase();

      if (groom.includes(searchTerm) || bride.includes(searchTerm) || wdate.includes(searchTerm) || status.includes(searchTerm)) {
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