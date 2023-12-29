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
					        <table class="table table-light table-hover" id="datatablesSimple37">
					          <?php
					            include_once 'php/dbconn.php';
					            $result = mysqli_query($conn, "SELECT * FROM announcement");
					            if (mysqli_num_rows($result) > 0) {
					          ?>
					          <thead>
					            <tr>
					              <th>Title</th>
					              <th>Description</th>
					              <th>Posted Date</th>
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
					              <td><?php echo $row["description"]; ?></td>
					              <td><?php echo date("M d, Y", strtotime($row["postDate"])); ?></td>
					              <td>
					                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#upModal<?php echo $row['id']; ?>">
												    <i class="fa-solid fa-pen-to-square"></i>
												  </button>
												  <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#myModal">
												    <i class="fa-solid fa-trash"></i>
												  </button>
					              </td>


					            <div class="modal fade" id="upModal<?php echo $row['id']; ?>">
											  <div class="modal-dialog">
											    <div class="modal-content">

											      <!-- Modal Header -->
											      <div class="modal-header">
											        <h4 class="modal-title">Modal Heading</h4>
											        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
											      </div>

											      <!-- Modal body -->
											      <div class="modal-body">
											        <form action="php/announcement/update.php" method="POST" enctype="multipart/form-data" autocomplete="off">
											        	<div class="row">
				                              <div class="col-md-6">
				                                  <img id="announcePic" src="announcement/<?php echo $row['announcePic']; ?>" style="max-width: 100%; height: auto; max-height: 300px;"
				                                      alt="Announcement Picture" class="mx-auto mb-3">
				                              </div>
				                              <div class="col-md-6">
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
										                                    <i class="fa-solid fa-pen-nib"></i>
										                                    Event Description
										                                  </label>
										                                <input type="text" name="description" class="form-control" value="<?php echo $row['description']; ?>" required>
										                            	</div>
										                        	</div>
										                    	</div>
				                              </div>
				                          </div>
															<button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Save Changes</button>
															</form>
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


					            <div class="modal fade" id="myModal">
											  <div class="modal-dialog">
											    <div class="modal-content">

											      <!-- Modal Header -->
											      <div class="modal-header">
				                    	<h5 class="modal-title"><i class="fa-solid fa-trash"></i> Delete Announcement</h5>
											        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
											      </div>

											      <!-- Modal body -->
											      <div class="modal-body">
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
											</div>	

					            <!-- Delete Modal -->
					            <div class="modal fade" id="deleteModal10<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true" role="dialog">
				              <div class="modal-dialog">
				                <div class="modal-content">
				                  
				                  
				                </div>
				              </div>
				            </div>

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
						<form action="php/addAnnounce1.php" method="POST" enctype="multipart/form-data" autocomplete="off">
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
    const datatablesSimple = document.getElementById('datatablesSimple37');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});
</script>