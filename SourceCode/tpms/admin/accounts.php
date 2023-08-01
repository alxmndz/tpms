<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<div class="container-fluid" style="margin-top: 30px;">
  <div class="card mb-4">
    <div class="card-header">
      <i class="fa-solid fa-users"></i>
      Accounts
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <input type="text" id="searchInput" class="form-control mb-3" placeholder="Type to search..." autocomplete="off">
        <table class="table table-light table-hover">
          <?php
            include_once 'php/dbconn.php';
            $result = mysqli_query($conn, "SELECT * FROM users");
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
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#updateModal<?php echo $row['id']; ?>"><i class="fa-regular fa-pen-to-square"></i></button>
                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#viewModal<?php echo $row['id']; ?>"><i class="fa-solid fa-eye"></i></button>
                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $row['id']; ?>"><i class="fa-solid fa-trash"></i></button>
              </td>
              <?php
                $i++;
              }
            ?>
            </tr>
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

  // Add event listener to the search input
  searchInput.addEventListener("input", function() {
    const searchTerm = searchInput.value.toLowerCase();

    // Loop through the table rows and show/hide based on search term
    for (let i = 0; i < searchResults.length; i++) {
      const row = searchResults[i];
      const name = row.cells[0].innerText.toLowerCase();
      const contact = row.cells[1].innerText.toLowerCase();
      const email = row.cells[2].innerText.toLowerCase();
      const address = row.cells[3].innerText.toLowerCase();
      const type = row.cells[4].innerText.toLowerCase();

      if (name.includes(searchTerm) || contact.includes(searchTerm) || email.includes(searchTerm) || address.includes(searchTerm) || type.includes(searchTerm)) {
        row.style.display = "";
      } else {
        row.style.display = "none";
      }
    }
  });
});
</script>

</body>
</html>
