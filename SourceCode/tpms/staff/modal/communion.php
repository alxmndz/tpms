<!-- Communion Modal-->
<div class="modal fade" id="communion">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Communion Reservation Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="../php/reservation/staff-communion.php" method="POST" enctype="multipart/form-data" autocomplete="off">

          <div class="row my-3">
              <div class="col-md-6">
                <div class="form-outline">
                  <input value="<?php echo $id?>" name="addedBy" style="display: none;" id="addedBy">
                  <input type="hidden" class="form-control" id="payDate" name="payDate" value="<?php echo date('Y-m-d'); ?>" required>
                     <label class="form-label" for="typeText">
                      <i class="fa-solid fa-user"></i> 
                      Name (Fullname)
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
            </div>

            <div class="row my-3">
              <div class="col-md-12">
                <div class="form-outline">
                     <label class="form-label" for="typeText">
                      <i class="fa-solid fa-calendar-days"></i> 
                      Date
                    </label>
                    <input class="form-control" type="date" id="comDate" name="comDate" required />
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
                    <select class="form-select" id="comTime" name="comTime" required>
                        <option value="" disabled selected>Select Communion Time</option>
                        <option value="08:00 AM">8:00 AM</option>
                        <option value="08:30 AM">8:30 AM</option>
                        <option value="09:00 AM">9:00 AM</option>
                        <option value="09:30 AM">9:30 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="10:30 AM">10:30 AM</option>
                        <option value="11:00 AM">11:00 AM</option>
                        <option value="11:30 AM">11:30 AM</option>
                        <option value="12:00 AM">12:00 PM</option>
                    </select>
                  </div>
                </div>
            </div>

            <div class="row my-3">
              <div class="col-md-6">
                <div class="form-outline">
                     <div class="card">
                        <div class="card-body">
                          <table class="table">
                            <tbody>
                              <tr>
                                <td>
                                  <label class="form-check-label" for="bapCertificate">
                                    Baptismal Certificate
                                  </label>
                                </td>
                                <td>
                                  <input class="form-check-input" type="checkbox" id="bapCert" name="bapCert" value="Baptismal Certificate">
                                </td>
                              </tr>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
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

            <div class="row my-3">
              <div class="col-md-12">
                 <div class="form-outline">
                  <input class="form-control" type="hidden" id="transactType" name="transactType" value="Walk-In" required />
                </div>
            </div>
          </div>

            <hr>

            <div class="col-md-12">
              <div class="form-outline">
                <label class="form-label" for="typeText">
                  <i class="fa-solid fa-dollar-sign"></i>
                  Please select your preferred Payment Method
                </label>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="payMethod" value="gcash" id="gcashRadio2" checked>
                      <label class="form-check-label" for="gcashRadio">
                        GCash Payment
                      </label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="payMethod" value="face-to-face" id="faceToFaceRadio2">
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
                    <!-- ... (GCash details content) -->
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <?php
                        include_once '../php/dbconn.php';

                        // Assuming you have a query to fetch the value from the table
                        $selectQuery = "SELECT communion FROM eventsprice";
                        $result = mysqli_query($conn, $selectQuery);

                        if ($result && mysqli_num_rows($result) > 0) {
                            // Fetch the value
                            $row = mysqli_fetch_assoc($result);
                            $communion = $row['communion'];
                        } else {
                            // Default value if no data is found
                            $communion = 1000; // You can set any default value here
                        }
                        ?>
                        <input type="number" class="form-control" id="inputNumber2" name="amount" value="<?php echo $communion; ?>" readonly required>
                    </div>
                    <div class="mb-3">
                        <label for="refNum" class="form-label">Reference Number</label>
                        <input type="number" class="form-control" id="inputRefNum2" name="refNum" placeholder="Enter your Reference Number" required>
                    </div>
                    <div class="mb-3">
                        <label for="receipt" class="form-label">Receipt Image</label>
                        <input type="file" class="form-control" id="inputFile2" name="receipt" required>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
          <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Submit</button>
        </form>

      </div>
    </div>
  </div>
</div>


<script>
  // Add an event listener to the payment method radio buttons
  document.addEventListener('DOMContentLoaded', function () {
    var gcashRadio2 = document.getElementById('gcashRadio2');
    var faceToFaceRadio2 = document.getElementById('faceToFaceRadio2');
    var inputNumber2 = document.getElementById('inputNumber2');
    var inputFile2 = document.getElementById('inputFile2');
    var inputRefNum2 = document.getElementById('inputRefNum2');

    // Function to enable or disable input fields based on the selected payment method
    function toggleInputFields() {
      if (gcashRadio2.checked) {
        inputNumber2.removeAttribute('disabled');
        inputFile2.removeAttribute('disabled');
        inputRefNum2.removeAttribute('disabled');
      } else {
        inputNumber2.setAttribute('disabled', 'disabled');
        inputFile2.setAttribute('disabled', 'disabled');
        inputRefNum2.setAttribute('disabled', 'disabled');
      }
    }

    // Add event listeners for changes in the selected payment method
    gcashRadio2.addEventListener('change', toggleInputFields);
    faceToFaceRadio2.addEventListener('change', toggleInputFields);

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