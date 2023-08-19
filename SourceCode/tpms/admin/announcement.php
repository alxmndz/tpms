	<div class="container-fluid">
		<div class="row" style="margin-top: 10px;">
			<!-- Left column for Announcements -->
			<div class="col-md-6">
				<div class="card">
					<div class="card-header d-flex align-items-center">
			      <i class="fa-solid fa-users me-2"></i>
			      <span class="fs-5 fw-bold">Accounts</span>
			      <div class="ms-auto">
			        <label class="me-2">Show entries:</label>
			        <select id="entriesSelect3" class="form-select form-select-sm">
			          <option value="all">All</option>
			          <option value="5">5</option>
			          <option value="10">10</option>
			          <option value="20">20</option>
			        </select>
			      </div>
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
					              <td><?php echo date("h:i A", strtotime($row["start"])); ?></td>
            						<td><?php echo date("h:i A", strtotime($row["endtime"])); ?></td>
					              <td><?php echo $row["location"]; ?></td>
					              <td><?php echo $row["description"]; ?></td>
					              <td>
					                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal4<?php echo $row['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
					                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal4<?php echo $row['id']; ?>"><i class="fa-solid fa-trash"></i></button>
					              </td>
					            </tr>

					            <div class="modal fade" id="updateModal4<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true" role="dialog">
					            	<div class="modal-dialog">
					            		<div class="modal-content">
					            			<div class="modal-header">
					            				<h5><i class="fa-solid fa-bell"></i> Update Announcement</h5>
					            				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					            			</div>
					            			<div class="modal-body">
					            				<form action="php/announcement/update.php" method="POST" enctype="multipart/form-data" autocomplete="off">
																<div class="row my-3">
																				<input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">
										                          <div class="col-md-12">
										                              <div class="form-outline">
										                                  <label class="form-label" for="typeText">
										                                    <i class="fa-solid fa-pen-to-square"></i>
										                                    Announcement Title
										                                  </label>
										                                <input type="text" name="title" class="form-control" value="<?php echo $row['title']; ?>" required>
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
										                    			<input type="date" name="eventdate" class="form-control" value="<?php echo $row['eventdate']; ?>" required>
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
										                                <input type="time" id="start" name="start" class="form-control" value="<?php echo $row['start']; ?>" required>
										                            </div>
										                        </div>
										                        <div class="col-md-6">
										                            <div class="form-outline">
										                                <label class="form-label" for="typeText">
										                                  <i class="fa-solid fa-clock"></i>
										                                    End Time
										                                </label>
										                    			<input type="time" id="endtime" name="endtime" class="form-control" value="<?php echo $row['endtime']; ?>" required>
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
										                                <input type="text" name="description" class="form-control" value="<?php echo $row['description']; ?>" required>
										                            	</div>
										                        	</div>
										                        	<div class="col-md-6">
										                              <div class="form-outline">
										                                  <label class="form-label" for="typeText">
										                                    <i class="fa-solid fa-location-dot"></i>
										                                    Location
										                                  </label>
										                                <input type="text" name="location" class="form-control" value="<?php echo $row['location']; ?>" required>
										                            	</div>
										                        	</div>
										                    	</div>
															<button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Submit</button>
															</form>
					            			</div>
													 </div>
					            	</div>
					            </div>


					            <div class="modal fade" id="deleteModal4<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true" role="dialog">
				              <div class="modal-dialog">
				                <div class="modal-content">
				                  <div class="modal-header">
				                    <h5 class="modal-title"><i class="fa-solid fa-trash" style="color: red;"></i> Delete Account</h5>
				                  </div>
				                  <form id="deleteForm" action="php/announcement/delete.php" autocomplete="off" method="POST">
				                    <div class="modal-body">
				                      <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">
				                      <span>Do you really want to delete the announcement for <b><?php echo $row['title']; ?></b>?</span>
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

			<!-- Right column for the form -->
			<div class="col-md-6" style="margin-top: 5px;">
				<div class="card">
					<div class="card-header">
						<i class="fa-solid fa-plus"></i>
						Create Announcement
					</div>
					<div class="card-body">
						<form action="php/announcement/save.php" method="POST" enctype="multipart/form-data" autocomplete="off">
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
  const entriesSelect = document.getElementById("entriesSelect3");

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
      const title = row.cells[0].innerText.toLowerCase();
      const date = row.cells[1].innerText.toLowerCase();
      const start = row.cells[2].innerText.toLowerCase();
      const end = row.cells[3].innerText.toLowerCase();
      const location = row.cells[4].innerText.toLowerCase();
      const description = row.cells[4].innerText.toLowerCase();

      if (title.includes(searchTerm) || date.includes(searchTerm) || start.includes(searchTerm) || end.includes(searchTerm) || location.includes(searchTerm) || description.includes(searchTerm))  {
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