	<div class="container-fluid">
		<div class="row" style="margin-top: 20px;">
			<!-- Left column for Announcements -->
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<i class="fa-solid fa-bell"></i>
						Announcements
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<input type="text" id="searchInput3" class="form-control mb-3" placeholder="Type to search...">
					        <table class="table table-light table-hover">
					          <?php
					            include_once 'php/dbconn.php';
					            $result = mysqli_query($conn, "SELECT * FROM announcement");
					            if (mysqli_num_rows($result) > 0) {
					          ?>
					          <thead>
					            <tr>
					              <th>Title</th>
					              <th>Date</th>
					              <th>Start</th>
					              <th>End</th>
					              <th>Location</th>
					              <th>Description</th>
					              <th>Action</th>
					            </tr>
					          </thead>
					          <tbody id="searchResults3">
					            <?php
					              $i = 0;
					              while ($row = mysqli_fetch_array($result)) {
					            ?>
					            <tr>
					              <td><?php echo $row["title"]; ?></td>
					              <td><?php echo $row["eventdate"]; ?></td>
					              <td><?php echo $row["start"]; ?></td>
					              <td><?php echo $row["endtime"]; ?></td>
					              <td><?php echo $row["location"]; ?></td>
					              <td><?php echo $row["description"]; ?></td>
					              <td>
					                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#updateModal<?php echo $row['id']; ?>"><i class="fa-regular fa-pen-to-square"></i></button>
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

			<!-- Right column for the form -->
			<div class="col-md-6" style="margin-top: 5px;">
				<div class="card">
					<div class="card-header">
						<i class="fa-solid fa-plus"></i>
						Create Announcement
					</div>
					<div class="card-body">
						<form action="php/announcement/save1.php" method="POST" enctype="multipart/form-data" autocomplete="off">
							<div class="row my-3">
	                          <div class="col-md-12">
	                              <div class="form-outline">
	                                  <label class="form-label" for="typeText">
	                                    <i class="fa-solid fa-pen-to-square"></i>
	                                    Announcement Title
	                                  </label>
	                                <input type="text" name="title" class="form-control" placeholder="Enter Event Title" required>
	                            </div>
	                        </div>
	                    </div>

	                    <div class="row my-3">
	                    	<div class="col-md-12">
	                            <div class="form-outline">
	                                <label class="form-label" for="typeText">
	                                  <i class="fa-solid fa-calendar"></i>
	                                    Event Day
	                                </label>
	                    			<input type="date" name="eventdate" class="form-control" required>
	                            </div>
	                        </div>
	                    </div>

	                    <div class="row my-3">
	                          <div class="col-md-6">
	                              <div class="form-outline">
	                                  <label class="form-label" for="typeText">
	                                    <i class="fa-regular fa-clock"></i>
	                                    Start Time
	                                  </label>
	                                <input type="time" name="start" class="form-control" required>
	                            </div>
	                        </div>
	                        <div class="col-md-6">
	                            <div class="form-outline">
	                                <label class="form-label" for="typeText">
	                                  <i class="fa-solid fa-clock"></i>
	                                    End Time
	                                </label>
	                    			<input type="time" name="endtime" class="form-control" required>
	                            </div>
	                        </div>
	                    </div>
		                    <div class="row my-3">
	                          	<div class="col-md-6">
	                              <div class="form-outline">
	                                  <label class="form-label" for="typeText">
	                                    <i class="fa-solid fa-pen-nib"></i>
	                                    Event Description
	                                  </label>
	                                <input type="text" name="description" class="form-control" placeholder="Enter Event Description" required>
	                            	</div>
	                        	</div>
	                        	<div class="col-md-6">
	                              <div class="form-outline">
	                                  <label class="form-label" for="typeText">
	                                    <i class="fa-solid fa-location-dot"></i>
	                                    Location
	                                  </label>
	                                <input type="text" name="location" class="form-control" placeholder="Enter Event Location" required>
	                            	</div>
	                        	</div>
	                    	</div>
						<button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const searchInput = document.getElementById("searchInput3");
  const searchResults = document.getElementById("searchResults3").getElementsByTagName("tr");

  // Add event listener to the search input
  searchInput.addEventListener("input", function() {
    const searchTerm = searchInput.value.toLowerCase();

    // Loop through the table rows and show/hide based on search term
    for (let i = 0; i < searchResults.length; i++) {
      const row = searchResults[i];
      const title = row.cells[0].innerText.toLowerCase();
      const date = row.cells[1].innerText.toLowerCase();
      const start = row.cells[2].innerText.toLowerCase();
      const end = row.cells[3].innerText.toLowerCase();
      const location = row.cells[4].innerText.toLowerCase();
      const description = row.cells[5].innerText.toLowerCase();

      if (title.includes(searchTerm) || date.includes(searchTerm) || start.includes(searchTerm) || end.includes(searchTerm) || location.includes(searchTerm)  || description.includes(searchTerm)) {
        row.style.display = "";
      } else {
        row.style.display = "none";
      }
    }
  });
});
</script>