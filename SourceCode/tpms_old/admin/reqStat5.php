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
            $result = mysqli_query($conn, "SELECT * FROM wedding_tbl WHERE transactType = 'Walk-In'");
            // Create an array to store the requirements from the database
            $databaseRequirements = array();
            $dataFromDatabase = [
                'Birth Certificate',   // Assume this data is retrieved from the database
                'Parents Marriage Contract',
                'Confirmation Certificate',
                'Certificate of No Marriage',
                '2x2 Pictures for Marriage Bann',
                'Marriage License',
                '3R Size Pictures'
                // Add other data items as needed
            ];
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
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal1<?php echo $row['id']; ?>"><i class="fa-solid fa-pen-to-square"></i> Update</button>
            </tr>

            <div class="modal modal-lg fade" id="updateModal1<?php echo $row['id']; ?>">
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
                                Groom's Name
                              </label>
                            <input class="form-control" type="text" id="groom" name="groom" value="<?php echo $row['groom']; ?>" required disabled/>
                          </div>
                        </div>

                        <div class="col-md-6">
                           <div class="form-outline">
                               <label class="form-label" for="typeText">
                                <i class="fa-solid fa-user"></i> 
                                Bride's Name
                               </label>
                            <input class="form-control" type="text" id="bride" name="bride" value="<?php echo $row['bride']; ?>" required disabled/>
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
                            <input class="form-control" type="tel" id="gContact" name="gContact" value="<?php echo $row['gContact']; ?>" required disabled/>
                          </div>
                        </div>

                        <div class="col-md-6">
                           <div class="form-outline">
                               <label class="form-label" for="typeText">
                                <i class="fa-solid fa-phone"></i> 
                                Bride's Contact
                               </label>
                            <input class="form-control" type="tel" id="bContact" name="bContact" value="<?php echo $row['bContact']; ?>" required disabled/>
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
                            <input class="form-control" type="text" id="gAddress" name="gAddress" value="<?php echo $row['gAddress']; ?>" required disabled/>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-home"></i> 
                                Bride's Address
                              </label>
                            <input class="form-control" type="text" id="bAddress" name="bAddress" value="<?php echo $row['bAddress']; ?>" required disabled/>
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
                            <select class="form-select" id="package" name="package" required disabled>
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
                            <select class="form-select" id="intention" name="intention" required disabled>
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
                                Reserved Date
                              </label>
                            <input type="date" class="form-control" id="wdate" name="wdate" value="<?php echo $row['wdate']; ?>" required disabled/>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-clock"></i>
                                Reserved Time
                              </label>
                            <input type="time" class="form-control" id="resTime" name="resTime" value="<?php echo $row['resTime']; ?>" required disabled/>
                          </div>
                        </div>
                      </div>

<div class="container mb-3">
  <div class="card">
    <div class="card-body">
      <div class="text-center">
        <span class="modal-header mb-2 text-center"><strong>Baptismal Requirements</strong></span>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="birthCertificate" name="birthCert" value="Birth Certificate" <?php echo ($row['birthCert'] === 'Birth Certificate') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="birthCertificate">Birth Certificate</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="bapCert" name="bapCert" value="Parents Marriage Contract" <?php echo ($row['bapCert'] === 'Baptismal Certificate') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="bapCert">Baptismal Certificate</label>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="conCert" name="conCert" value="Confirmation Certificate" <?php echo ($row['conCert'] === 'Confirmation Certificate') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="conCert">Confirmation Certificate</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="cenomar" name="cenomar" value="Certificate of No Marriage" <?php echo ($row['cenomar'] === 'Certificate of No Marriage') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="cenomar">Certificate of No Marriage</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="marriageLicense" name="marriageLicense" value="Certificate of No Marriage" <?php echo ($row['marriageLicense'] === 'Marriage License') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="marriageLicense">Marriage License</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="RPic" name="RPic" value="Certificate of No Marriage" <?php echo ($row['RPic'] === '3R Size Pictures') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="RPic">3R Size Pictures</label>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="MBPic" name="MBPic" value="Certificate of No Marriage" <?php echo ($row['MBPic'] === '2x2 Pictures for Marriage Bann') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="MBPic">2x2 Pictures for Marriage Bann</label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

                    <div class="row my-3">
                        <div class="col-md-12">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                Transaction Type
                              </label>
                            <input type="text" class="form-control" id="transactType" name="transactType" value="<?php echo $row['transactType']; ?>" required disabled />
                          </div>
                        </div>
                      </div>

                    <div class="row my-3">
                        <div class="col-md-6">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-money-bill-1-wave"></i>
                                Amount
                              </label>
                            <input type="number" class="form-control" id="amount" name="amount" value="<?php echo $row['amount']; ?>" required disabled />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-barcode"></i>
                                Reference No.
                              </label>
                            <input type="number" class="form-control" id="refNum" name="refNum" value="<?php echo $row['refNum']; ?>" required disabled />
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