<div class="modal modal-lg fade" id="baptismModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Baptismal Reservation Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="php/saveBapPT.php" method="post" enctype="multipart/form-data" autocomplete="off">

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
                  <input class="form-control" type="text" id="name" name="name" placeholder="Enter baptismal candidate" required />
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
                    Baptismal Date
                  </label>
                  <input class="form-control" type="date" id="bapDate" name="bapDate" required />
                </div>
              </div>
          </div>

          <div class="row my-3">
            <div class="col-md-12">
              <div class="form-outline">
                   <label class="form-label" for="typeText">
                    <i class="fa-solid fa-clock"></i> 
                    Basptimal Time
                  </label>
                  <input class="form-control" type="time" id="bapTime" name="bapTime" required />
                </div>
              </div>
          </div>

          <div class="row my-3">
            <div class="col-md-6">
              <div class="form-outline">
                   <label class="form-label" for="typeText">
                    <i class="fa-solid fa-baby"></i> 
                    Birth Certificate(child going to be baptize)
                  </label>
                  <input class="form-control" type="file" id="birthCert" name="birthCert" required />
                </div>
              </div>

              <div class="col-md-6">
                 <div class="form-outline">
                   <label class="form-label" for="typeText"> 
                      Parents Marriage Contract
                    </label>
                  <input class="form-control" type="file" id="marriageCont" name="marriageCont" required />
                </div>
            </div>
          </div>

          <hr>

          <div class="row my-3">
            <label class="form-label" for="typeText"> 
               Godfather/Mother Confirmation Certificate (2 sponsors only)
            </label>
            <div class="col-md-6">
              <div class="form-outline">
                  <label class="form-label" for="typeText">
                     Sponsor 1
                  </label>
                  <input class="form-control" type="file" id="sponsor1" name="sponsor1" required />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-outline">
                  <label class="form-label" for="typeText">
                     Sponsor 2
                  </label>
                  <input class="form-control" type="file" id="sponsor2" name="sponsor2" required />
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