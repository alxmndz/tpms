<!-- The Donation Modal -->
<div class="modal fade" id="donate">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <span class="modal-title"><i class="fa-solid fa-hand-holding-dollar"></i> Add Donation</span>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
                    <form class="" action="php/donate1.php" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="row my-3">
                          <div class="col-md-12">
                              <div class="form-outline">
                                <input value="<?php echo $id?>" name="addedBy" style="display: none;" id="addedBy">
                                <input value="Walk-In" name="transactType" style="display: none;" id="transactType">
                                  <label class="form-label" for="typeText">
                                    <i class="fa-solid fa-user"></i> 
                                    Name
                                  </label>
                                <input class="form-control" type="text" id="name" name="name" placeholder="Enter your name">
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-phone"></i> Contact</label>
                                <input class="form-control" type="tel" id="contact" name="contact" placeholder="Enter Contact Number" maxlength="11" onkeyup="limitDigits(this)" required>
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

        <div class="container my-4" id="gcashDetails">
            <div class="card">
              <div class="card-header bg-primary text-white">
                GCash Details
              </div>
              <div class="card-body">
                <!-- ... (GCash details content) -->
                <div class="mb-3">
                  <label for="amount" class="form-label">Amount</label>
                  <input type="number" class="form-control" id="inputNumber11" name="amount" value="1000" readonly required>
                </div>
                <div class="mb-3">
                  <label for="receipt" class="form-label">Receipt Image</label>
                  <input type="file" class="form-control" id="inputFile11" name="receipt" required>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group mb-2">             
            <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Submit</button>  
          </div>
        </form>

      </div>

    </div>
  </div>
</div>

<script>
  // Add an event listener to the payment method radio buttons
  document.addEventListener('DOMContentLoaded', function () {
    var gcashRadio11 = document.getElementById('gcashRadio11');
    var faceToFaceRadio11 = document.getElementById('faceToFaceRadio11');
    var inputNumber11 = document.getElementById('inputNumber11');
    var inputFile11 = document.getElementById('inputFile11');

    // Function to enable or disable input fields based on the selected payment method
    function toggleInputFields() {
      if (gcashRadio11.checked) {
        inputNumber11.removeAttribute('disabled');
        inputFile11.removeAttribute('disabled');
      } else {
        inputNumber11.setAttribute('disabled', 'disabled');
        inputFile11.setAttribute('disabled', 'disabled');
      }
    }

    // Add event listeners for changes in the selected payment method
    gcashRadio11.addEventListener('change', toggleInputFields);
    faceToFaceRadio11.addEventListener('change', toggleInputFields);

    // Initial call to set the initial state based on the default selected payment method
    toggleInputFields();
  });
</script>

<script type="text/javascript">
  function limitDigits(input) {
  if (input.value.length > 11) {
    input.value = input.value.substring(0, 11);
  }
}
</script>