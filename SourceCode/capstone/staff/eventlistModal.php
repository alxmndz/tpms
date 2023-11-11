<div class="modal fade" id="evntLST">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Event List Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="php/saveEvnt.php" method="POST" enctype="multipart/form-data" autocomplete="off">

          <div class="row my-3">
              <div class="col-md-12">
                 <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                      Event Title
                    </label>
                  <input class="form-control" type="text" id="evntTitle" name="evntTitle" placeholder="Enter event title" required />
                </div>
            </div>
          </div>

          <div class="row my-3">
            <div class="col-md-6">
              <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                    Event Date
                  </label>
                  <input class="form-control" type="date" name="eventDate" id="eventDate" required>
                </div>
              </div>


              <div class="col-md-6">
                <div class="form-outline">
                     <label class="form-label fw-bold" for="typeText">
                      Event Time
                    </label>
                    <input  class="form-control" type="time" name="eventTime" id="eventTime" required>
                  </div>
                </div>
            </div>

            <div class="row my-3">
              <div class="col-md-12">
                 <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                      Description
                    </label>
                  <input class="form-control" type="text" id="description" name="description" placeholder="Enter event description" required />
                </div>
            </div>
          </div>
        
        <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Submit</button>
        </form>

      </div>
    </div>
  </div>
</div>