<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid mt-4">
  <div class="card">
    <div class="card-header d-flex align-items-center">
      <i class="fa-solid fa-users me-2"></i>
      <span class="fs-5 fw-bold">Accounts</span>
      <div class="ms-auto">
        <label class="me-2">Show entries:</label>
        <select id="entriesSelect" class="form-select form-select-sm">
          <option value="all">All</option>
          <option value="5">5</option>
          <option value="10">10</option>
          <option value="20">20</option>
        </select>
      </div>
    </div>
    <div class="card-body">
      <div class="input-group mb-3">
        <input type="text" id="searchInput" class="form-control form-control-sm" placeholder="Type to search..." autocomplete="off">
        <span class="input-group-text"><i class="fa-solid fa-search"></i></span>
      </div>
      <div class="table-responsive">
        <table class="table table-light table-hover">
          <?php
            include_once 'php/dbconn.php';
            $result = mysqli_query($conn, "SELECT * FROM users ORDER BY name");
            if (mysqli_num_rows($result) > 0) {
          ?>
          <thead>
            <tr>
              <th>Name</th>
              <th>Contact</th>
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
                    <h5 class="modal-title" id="updateModalLabel"><i class="fa-solid fa-users" style="color: blue;"></i> Update Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form id="updateForm" action="php/accounts/update.php" autocomplete="off" method="POST">
                    <span id="message"><?php if (isset($message)) { echo $message; } ?></span>
                    <div class="modal-body">
                      <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">
                      <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
                      </div>
                      <div class="mb-3">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $row['contact']; ?>" required>
                      </div>
                      <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
                      </div>
                      <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address']; ?>" required>
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

<script>
document.addEventListener("DOMContentLoaded", function() {
  const searchInput = document.getElementById("searchInput");
  const searchResults = document.getElementById("searchResults").getElementsByTagName("tr");
  const entriesSelect = document.getElementById("entriesSelect");

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
      const type = row.cells[4].innerText.toLowerCase();

      if (name.includes(searchTerm) || contact.includes(searchTerm) || email.includes(searchTerm) || address.includes(searchTerm) || type.includes(searchTerm)) {
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
</body>
</html>
