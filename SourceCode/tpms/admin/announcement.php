	<div class="container-fluid">
		<div class="row" style="margin-top: 10px;">
			<!-- Left column for Announcements -->
			<div class="col-md-6">
				<div class="card">
					<div class="card-header d-flex align-items-center">
			      <i class="fa-solid fa-bell me-2"></i>
			      <span class="fs-5 fw-bold">Announcements</span>
			    </div>
					<div class="card-body">
						<div class="table-responsive">
					        <table class="table table-light table-hover" id="datatablesSimple15">
					          <?php
					            include_once 'php/dbconn.php';
					            $result = mysqli_query($conn, "SELECT * FROM announcement LIMIT 5");
					            if (mysqli_num_rows($result) > 0) {
					          ?>
					          <thead>
					            <tr>
					              <th>Title</th>
					              <th>Date</th>
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
					              <td><?php echo date("M-d-y", strtotime($row["eventdate"])); ?></td>
					              <td><?php echo $row["description"]; ?></td>
					              <td>
					                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal4<?php echo $row['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
					                <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal4<?php echo $row['id']; ?>"><i class="fa-solid fa-eye"></i></button>
					                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal4<?php echo $row['id']; ?>"><i class="fa-solid fa-trash"></i></button>
					              </td>
					            </tr>

					            <!-- Update Modal -->
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
										                          	<div class="col-md-12">
										                              <div class="form-outline">
										                                  <label class="form-label" for="typeText">
										                                    <i class="fa-solid fa-pen-nib"></i>
										                                    Event Description
										                                  </label>
										                                <input type="text" name="description" class="form-control" value="<?php echo $row['description']; ?>" required>
										                            	</div>
										                        	</div>
										                    	</div>
															<button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Submit</button>
															</form>
					            			</div>
													 </div>
					            	</div>
					            </div>

					            <!-- Delete Modal -->
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

				            <!-- View Modal -->
				            <div class="modal fade" id="viewModal4<?php echo $row['id']; ?>">
				              <div class="modal-dialog modal-dialog-centered modal-md">
				                  <div class="modal-content">
				                      <div class="modal-header">
				                          <h5 class="modal-title" id="viewModalLabel">View Data</h5>
				                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				                      </div>
				                      <div class="modal-body">
				                          <div class="row">
				                              <div class="col-md-6">
				                                  <img id="announcePic" src="announcement/<?php echo $row['announcePic']; ?>" style="max-width: 100%; height: auto; max-height: 300px;"
				                                      alt="Announcement Picture" class="mx-auto mb-3">
				                              </div>
				                              <div class="col-md-6">
				                                  <p><strong>Title:</strong> <?php echo $row["title"]; ?></p>
				                                  <p><strong>Date:</strong> <?php echo $row["eventdate"]; ?></p>
				                                  <p><strong>Description:</strong> <?php echo $row["description"]; ?></p>
				                              </div>
				                          </div>
				                      </div>
				                      <div class="modal-footer">
				                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				                      </div>
				                  </div>
				              </div>
				          </div>

				          <script>
			            $(document).ready(function() {
			                $('[id^="viewModal"]').on('shown.bs.modal', function() {
			                    var modalId = $(this).attr('id');
			                    var rowId = modalId.replace('viewModal', '');
			                    var announceSrc = 'announcement/<?php echo $row["announcePic"]; ?>'; 
			                    
			                    $('#receiptImage' + rowId).attr('src', announceSrc);
			                });
			            });
			            </script>

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
						<form action="php/addAnnounce.php" method="POST" enctype="multipart/form-data" autocomplete="off">
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
	                          	<div class="col-md-12">
	                              <div class="form-outline">
	                                  <label class="form-label" for="typeText">
	                                    <i class="fa-solid fa-pen-nib"></i>
	                                    Event Description
	                                  </label>
	                                <input type="text" name="description" class="form-control" placeholder="Enter Event Description" required>
	                            	</div>
	                        	</div>
	                    	</div>

	                    	<div class="row my-3">
	                    	<div class="col-md-12">
	                            <div class="form-outline">
	                                <label class="form-label" for="typeText">
	                                  <i class="fa-solid fa-image"></i>
	                                    Announcement Picture
	                                </label>
	                    					<input type="file" name="announcePic" class="form-control" required>
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
window.addEventListener('DOMContentLoaded', event => {
    const datatablesSimple = document.getElementById('datatablesSimple15');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});
</script>