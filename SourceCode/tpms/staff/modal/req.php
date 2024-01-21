<div class="modal fade" id="request">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Request Certificate</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form class="" action="../php/request/staff.php" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="form-group">
                    <input value="<?php echo $id?>" name="addedBy" style="display: none;" id="addedBy">
                    <input type="hidden" name="transactType" class="form-control" value="Walk-In">
                  </div>
                        <div class="row my-3">
                          <div class="col-md-6">
                              <div class="form-outline">
                                  <label class="form-label" for="typeText">
                                    <i class="fa-solid fa-user"></i> 
                                    Full Name
                                  </label>
                                <input class="form-control" type="text" id="name" name="name" placeholder="Enter your name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText">
                                  <i class="fa-solid fa-phone"></i> 
                                    Contact Number
                                </label>
                    <input class="form-control" type="number" id="contact" name="contact" placeholder="Enter your contact number"  maxlength="11" onkeyup="limitDigits(this)"  required>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                      <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-home"></i> Address</label>
                                <select class="form-select" id="address" name="address" required>
                                   <option disabled selected>Select an address</option>
                                   <option value="Acle, Tuy, Batangas">Acle</option>
                                   <option value="Bayudbud, Tuy, Batangas">Bayudbud</option>
                                   <option value="Bolboc, Tuy, Batangas">Bolboc</option>
                                   <option value="Dalima, Tuy, Batangas">Dalima</option>
                                   <option value="Dao, Tuy, Batangas">Dao</option>
                                   <option value="Guinhawa, Tuy, Batangas">Guinhawa</option>
                                   <option value="Lumbangan, Tuy, Batangas">Lumbangan</option>
                                   <option value="Luntal, Tuy, Batangas">Luntal</option>
                                   <option value="Magahis, Tuy, Batangas">Magahis</option>
                                   <option value="Malibu, Tuy, Batangas">Malibu</option>
                                   <option value="Mataywanac, Tuy, Batangas">Mataywanac</option>
                                   <option value="Palincaro, Tuy, Batangas">Palincaro</option>
                                   <option value="Luna, Tuy, Batangas">Luna</option>
                                   <option value="Burgos, Tuy, Batangas">Burgos</option>
                                   <option value="Rizal, Tuy, Batangas">Rizal</option>
                                   <option value="Rillo, Tuy, Batangas">Rillo</option>
                                   <option value="Putol, Tuy, Batangas">Putol</option>
                                   <option value="Sabang, Tuy, Batangas">Sabang</option>
                                   <option value="San Jose, Tuy, Batangas">San Jose</option>
                                   <option value="San Jose (Putic), Tuy, Batangas">San Jose (Putic)</option>
                                   <option value="Talon, Tuy, Batangas">Talon</option>
                                   <option value="Toong, Tuy, Batangas">Toong</option>
                                   <option value="Tuyon-tuyon, Tuy, Batangas">Tuyon-tuyon</option>
                               </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-calendar"></i> Type of Certificate</label>
                                <select class="form-select" id="event" name="event" required>
                                    <option disabled selected> Select a certificate</option>
                                    <option value="Baptismal Certificate">Baptismal Certificate</option>
                                    <option value="Communion Certificate">Communion Certificate</option>
                                    <option value="Confirmation Certificate">Confirmation Certificate</option>
                                    <option value="Death Certificate">Death Certificate</option>
                                    <option value="Marriage Certificate">Marriage Certificate</option>
                                </select>
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
                                      <input class="form-check-input" type="radio" name="payMethod" value="gcash" id="gcashRadio" checked>
                                      <label class="form-check-label" for="gcashRadio">
                                          GCash Payment
                                      </label>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-check">
                                      <input class="form-check-input" type="radio" name="payMethod" value="face-to-face" id="faceToFaceRadio">
                                      <label class="form-check-label" for="faceToFaceRadio">
                                          Face-to-face Payment
                                      </label>
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
                <!-- ... (GCash details content) -->
                <div class="col-md-12">
    <div class="mb-3">
        <label for="amount" class="form-label">Amount</label>
        <?php
            include_once '../php/dbconn.php';

            // Assuming you have a query to fetch the value from the table
            $selectQuery = "SELECT cert FROM eventsprice";
            $result = mysqli_query($conn, $selectQuery);

            if ($result && mysqli_num_rows($result) > 0) {
                // Fetch the value
                $row = mysqli_fetch_assoc($result);
                $cert = $row['cert'];
            } else {
                // Default value if no data is found
                $cert = 1000; // You can set any default value here
            }
        ?>
        <input type="number" class="form-control" id="amount" name="amount" value="<?php echo $cert; ?>" readonly required>
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
  // Add an event listener to the payment method radio buttons
  document.addEventListener('DOMContentLoaded', function () {
    var gcashRadio = document.getElementById('gcashRadio');
    var faceToFaceRadio = document.getElementById('faceToFaceRadio');
    var inputRefNum = document.getElementById('inputRefNum');
    var donateReceipt = document.getElementById('donateReceipt');

    // Function to enable or disable input fields based on the selected payment method
    function toggleInputFields() {
      if (gcashRadio.checked) {
        donateReceipt.removeAttribute('disabled');
        inputRefNum.removeAttribute('disabled');
      } else {
        donateReceipt.setAttribute('disabled', 'disabled');
        inputRefNum.setAttribute('disabled', 'disabled');
      }
    }

    // Add event listeners for changes in the selected payment method
    gcashRadio.addEventListener('change', toggleInputFields);
    faceToFaceRadio.addEventListener('change', toggleInputFields);

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