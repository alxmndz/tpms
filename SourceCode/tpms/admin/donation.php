<!DOCTYPE html>
<html>

<head>
  <title>Donation Records</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    /* Add any additional CSS styling you want here */
  </style>
</head>

<body>

  <div class="container-fluid" style="margin-top: 30px;">
    <div class="card mb-4">
      <div class="card-header">
        <i class="fa-solid fa-hand-holding-dollar"></i>
        Donation
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <div class="d-flex">
            <input type="text" id="searchInput1" class="form-control form-control-sm me-2" placeholder="Type to search..." autocomplete="off">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#donate">Add Donation</button>
          </div>
          <table class="table table-striped" style="margin-top: 10px;">
            <?php
            include_once 'php/dbconn.php';
            $result = mysqli_query($conn, "SELECT * FROM donation");
            if (mysqli_num_rows($result) > 0) {
            ?>
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Contact</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Date</th>
                  <th>Amount</th>
                  <th>Event</th>
                  <th>Donation</th>
                </tr>
              </thead>
              <tbody id="searchResults1">
                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                ?>
                  <tr>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["contact"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["address"]; ?></td>
                    <td><?php echo $row["donatedDate"]; ?></td>
                    <td><?php echo $row["amount"]; ?></td>
                    <td><?php echo $row["event"]; ?></td>
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
              </tbody>
          </table>
        </div>
        <?php
          } else {
            echo "No result found";
          }
        ?>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const searchInput = document.getElementById("searchInput1");
      const searchResults = document.getElementById("searchResults1").getElementsByTagName("tr");

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
          const donatedDate = row.cells[4].innerText.toLowerCase();
          const amount = row.cells[5].innerText.toLowerCase();
          const event = row.cells[6].innerText.toLowerCase();

          if (
            name.includes(searchTerm) ||
            contact.includes(searchTerm) ||
            email.includes(searchTerm) ||
            address.includes(searchTerm) ||
            donatedDate.includes(searchTerm) ||
            amount.includes(searchTerm) ||
            event.includes(searchTerm)
          ) {
            row.style.display = "";
          } else {
            row.style.display = "none";
          }
        }
      });
    });
  </script>

  <!-- Add any additional JavaScript or libraries you want here -->

</body>

</html>
