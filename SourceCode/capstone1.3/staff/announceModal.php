<div class="modal fade" id="announceModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <span class="modal-title">Add Announcement</span>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
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