<div class="modal modal-lg fade" id="blessModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Blessing Reservation Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="php/saveBlessPT.php" method="post" enctype="multipart/form-data" autocomplete="off">
            
            <div class="row my-3">
              <div class="col-md-6">
                <div class="form-outline">
                  <input value="<?php echo $id?>" name="addedBy" style="display: none;" id="addedBy">
                  <input value="Online" name="transactType" style="display: none;" id="transactType">
                  <input value="gcash" name="payMethod" style="display: none;" id="payMethod">
                     <label class="form-label" for="typeText">
                      <i class="fa-solid fa-user"></i> 
                      Name (Firstname-Middle Initial-Surname)
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
                      Blessing Date
                    </label>
                    <input class="form-control" type="date" id="blessDate" name="blessDate" required />
                  </div>
                </div>
            </div>

            <div class="row my-3">
              <div class="col-md-12">
                <div class="form-outline">
                     <label class="form-label" for="typeText">
                      <i class="fa-solid fa-clock"></i> 
                      Blessing Time
                    </label>
                    <select class="form-select" id="blessTime" name="blessTime" required>
                        <option value="" disabled selected>Select Blessing Time</option>
                        <option value="08:00 AM">8:00 AM</option>
                        <option value="08:30 AM">8:30 AM</option>
                        <option value="09:00 AM">9:00 AM</option>
                        <option value="09:30 AM">9:30 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="10:30 AM">10:30 AM</option>
                        <option value="11:00 AM">11:00 AM</option>
                        <option value="11:30 AM">11:30 AM</option>
                    </select>
                  </div>
                </div>
            </div>

            <div class="row my-3">
              <div class="col-md-12">
                <div class="form-outline">
                     <label class="form-label" for="typeText">
                      Intention
                    </label>
                    <input class="form-control" type="text" id="intention" name="intention" placeholder="Enter your intention" required>
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