<div class="modal fade" id="donation">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><i class="fas fa-peso-sign"></i> Donate</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form class="" action="../php/donate/staff.php" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="row my-3">
                          <div class="col-md-12">
                              <div class="form-outline">
                                <input value="<?php echo $id?>" name="addedBy" style="display: none;" id="addedBy">
                                <input value="Walk-In" name="transactType" style="display: none;" id="transactType">
                                  <label class="form-label" for="typeText">
                                    <i class="fa-solid fa-user"></i> 
                                    Name
                                  </label>
                                <input class="form-control" type="text" id="name" name="name" placeholder="Enter your name (Optional)">
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-phone"></i> Contact</label>
                                <input class="form-control" type="number" id="contact" name="contact" placeholder="Enter Contact Number (Optional)" maxlength="11" onkeyup="limitDigits(this)">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
            <div class="form-outline">
              <label class="form-label" for="typeText">
                <i class="fa-solid fa-dollar-sign"></i>
                Please select your preferred Payment Method
              </label>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="payMethod" value="gcash" id="gcashRadio11" checked>
                    <label class="form-check-label" for="gcashRadio">
                      GCash Payment
                    </label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="payMethod" value="face-to-face" id="faceToFaceRadio11">
                    <label class="form-check-label" for="faceToFaceRadio">
                      Face-to-face Payment
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <div class="my-4" id="gcashDetails">
            <div class="card">
                <div class="card-header bg-primary text-white">
                GCash Details
                </div>
              <div class="card-body">
                  <div class="col-md-12">
                      <div class="mb-3">
                      <label for="amount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="donateAmount" name="amount" placeholder="Enter amount of donation" required>
                      </div>

                      <div class="mb-3">
                          <label for="refNum" class="form-label">Reference Number</label>
                          <input type="number" class="form-control" id="inputRefNum" name="refNum" placeholder="Enter your Reference Number" required>
                      </div>

                      <div class="mb-3">
                          <label for="receipt" class="form-label">Receipt Image</label>
                          <input type="file" class="form-control" id="donateReceipt" name="receipt" required>
                      </div>
                  </div>
              </div>
            </div>
        </div>
    </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Submit</button>  
      </div>
      </form>

    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var gcashRadio11 = document.getElementById('gcashRadio11');
    var faceToFaceRadio11 = document.getElementById('faceToFaceRadio11');
    var inputRefNum = document.getElementById('inputRefNum');
    var donateReceipt = document.getElementById('donateReceipt');

    function toggleInputFields() {
      if (gcashRadio11.checked) {
        donateReceipt.removeAttribute('disabled');
        inputRefNum.removeAttribute('disabled');
      } else {
        donateReceipt.setAttribute('disabled', 'disabled');
        inputRefNum.setAttribute('disabled', 'disabled'); // Disable inputRefNum for faceToFace
      }
    }

    gcashRadio11.addEventListener('change', toggleInputFields);
    faceToFaceRadio11.addEventListener('change', toggleInputFields);

    toggleInputFields(); // Initial call to set the initial state based on the default selected payment method
  });
</script>


<script type="text/javascript">
  function limitDigits(input) {
  if (input.value.length > 11) {
    input.value = input.value.substring(0, 11);
  }
}
</script>
