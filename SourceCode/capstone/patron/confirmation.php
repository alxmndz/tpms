<div class="modal fade modal-lg" id="conModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Confirmation Reservation Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="php/saveConPT.php" method="post" enctype="multipart/form-data" autocomplete="off">
          
            <div class="row my-3">
                <div class="col-md-6">
                  <div class="form-outline">
                    <input value="<?php echo $id?>" name="addedBy" style="display: none;" id="addedBy">
                    <input value="Online" name="transactType" style="display: none;" id="transactType">
                    <input value="gcash" name="payMethod" style="display: none;" id="payMethod">
                       <label class="form-label" for="typeText">
                        <i class="fa-solid fa-user"></i> 
                        Name
                      </label>
                      <input class="form-control" type="text" id="name" name="name" placeholder="Enter your name" required />
                    </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-outline">
                       <label class="form-label" for="typeText">
                        <i class="fa-solid fa-phone"></i> 
                          Contact Number
                        </label>
                      <input class="form-control" type="number" id="contact" name="contact" placeholder="Enter your contact number" maxlength="11" onkeyup="limitDigits(this)" required />
                    </div>
                </div>
              </div>

              <div class="row my-3">
                  <div class="col-md-12">
                     <div class="form-outline">
                       <label class="form-label" for="typeText">
                        <i class="fa-solid fa-house"></i> 
                          Address
                        </label>
                      <input class="form-control" type="text" id="address" name="address" placeholder="Enter your adress" required />
                    </div>
                </div>
              </div>

              <div class="row my-3">
                <div class="col-md-12">
                  <div class="form-outline">
                       <label class="form-label" for="typeText">
                        <i class="fa-solid fa-calendar-days"></i> 
                        Date
                      </label>
                      <input class="form-control" type="date" id="conDate" name="conDate" required />
                    </div>
                  </div>
              </div>

              <div class="row my-3">
                <div class="col-md-12">
                  <div class="form-outline">
                       <label class="form-label" for="typeText">
                        <i class="fa-solid fa-clock"></i> 
                        Time
                      </label>
                      <input class="form-control" type="time" id="conTime" name="conTime" required />
                    </div>
                  </div>
              </div>

              <div class="row my-3">
                <div class="col-md-6">
                  <div class="form-outline">
                       <label class="form-label" for="typeText">
                        <i class="fa-solid fa-folder-open"></i> 
                        Baptismal Certificate (Original/Photocopy)
                      </label>
                      <input class="form-control" type="file" id="bapCert" name="bapCert" required />
                    </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-outline">
                       <label class="form-label" for="typeText">
                          Description (if none, comment "N/A")
                        </label>
                      <input class="form-control" type="text" id="desc" name="desc" placeholder="Enter your description" required />
                    </div>
                </div>
              </div>
            
            <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Submit</button>
        </form>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
  function limitDigits(input) {
  if (input.value.length > 11) {
    input.value = input.value.substring(0, 11);
  }
}
</script>