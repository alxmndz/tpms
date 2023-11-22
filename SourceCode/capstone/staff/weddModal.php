<!-- Wedding Modal-->
<div class="modal fade" id="weddModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Wedding Reservation Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="php/saveWedST.php" method="POST" enctype="multipart/form-data" autocomplete="off">

          <div class="row my-3">
            <div class="col-md-6">
              <div class="form-outline">
                <input value="<?php echo $id?>" name="addedBy" style="display: none;" id="addedBy">
                   <label class="form-label" for="typeText">
                    <i class="fa-solid fa-user"></i> 
                    Groom (Firstname-Middle Initial-Surname)
                  </label>
                  <input  class="form-control" type="text" name="groom" placeholder="Enter the groom's name" required>
                </div>
              </div>

              <div class="col-md-6">
                 <div class="form-outline">
                   <label class="form-label" for="typeText">
                    <i class="fa-solid fa-user"></i> 
                      Bride (Firstname-Middle Initial-Surname)
                    </label>
                  <input class="form-control" type="text" id="bride" name="bride" placeholder="Enter the bride's name" required />
                </div>
            </div>
          </div>

          <div class="row my-3">
            <div class="col-md-12">
              <div class="form-outline">
                  <label class="form-label" for="typeText">
                    <i class="fa-solid fa-phone"></i> 
                    Groom's Contact Number
                  </label>
                  <input  class="form-control" type="number" name="gContact" placeholder="Enter the groom's contact number" maxlength="11" onkeyup="limitDigits(this)" required>
                </div>
              </div>
          </div>

          <div class="row my-3">
            <div class="col-md-12">
              <div class="form-outline">
                <label class="form-label" for="typeText">
                    <i class="fa-solid fa-phone"></i> 
                      Bride's Contact Number
                    </label>
                  <input class="form-control" type="number" name="bContact" placeholder="Enter the bride's contact number" maxlength="11" onkeyup="limitDigits(this)" required />
                </div>
              </div>
          </div>

          <div class="row my-3">
            <div class="col-md-6">
              <div class="form-outline">
                <label class="form-label" for="typeText">
                    <i class="fa-solid fa-home"></i> 
                    Groom's Address
                  </label>
                  <input  class="form-control" type="text" name="gAddress" placeholder="Enter groom's address" required>   
              </div>
            </div>

              <div class="col-md-6">
                 <div class="form-outline">
                   <label class="form-label" for="typeText">
                    <i class="fa-solid fa-home"></i> 
                    Bride's Address
                  </label>
                  <input  class="form-control" type="text" name="bAddress" placeholder="Enter bride's address" required>
                </div>
            </div>
          </div>

          <div class="row my-3">
            <div class="col-md-12">
              <div class="form-outline">
                   <label class="form-label" for="typeText">
                        <i class="fa-solid fa-box-open"></i>
                        Package
                      </label>
                    <select class="form-select" id="package" name="package" required>
                      <option disabled selected>Select an option</option>
                      <option value="Package 1">Package 1</option>
                      <option value="Package 2">Package 2</option>
                    </select>
                </div>
              </div>
          </div>

          <div class="row my-3">
            <div class="col-md-12">
              <div class="form-outline">
                    <label class="form-label" for="typeText">
                        Does both of you are baptize?
                      </label>
                    <select class="form-select" id="intention" name="intention" required>
                      <option disabled selected>Select an option</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                </div>
              </div>
          </div>

          <div class="row my-3">
            <div class="col-md-6">
              <div class="form-outline">
                  <label class="form-label" for="typeText">
                    <i class="fa-solid fa-calendar"></i>
                    Wedding Date
                  </label>
                <input type="date" class="form-control" id="wdate" name="wdate" required />
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-outline">
                  <label class="form-label" for="typeText">
                    <i class="fa-solid fa-clock"></i>
                    Reserved Time
                  </label>
                <input type="time" class="form-control" id="resTime" name="resTime" required />
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <center> <h5 class="card-title">Wedding Requirements</h5></center>
              <table class="table">
                <tbody>
                  <tr>
                    <td>
                      <label class="form-check-label" for="WeddingCertificate">
                        Birth Certificate
                      </label>
                    </td>
                    <td>
                      <input class="form-check-input" type="checkbox" id="birthCertificate" name="birthCert" value="Birth Certificate">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label class="form-check-label" for="marriageContract">
                        Baptismal Certificate
                      </label>
                    </td>
                    <td>
                      <input class="form-check-input" type="checkbox" id="bapCert" name="bapCert" value="Baptismal Certificate">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label class="form-check-label" for="conCert">
                        Confirmation Certificate
                      </label>
                    </td>
                    <td>
                      <input class="form-check-input" type="checkbox" id="conCert" name="conCert" value="Confirmation Certificate">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label class="form-check-label" for="cenomar">
                        Certificate of No Marriage
                      </label>
                    </td>
                    <td>
                      <input class="form-check-input" type="checkbox" id="cenomar" name="cenomar" value="Certificate of No Marriage">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label class="form-check-label" for="marriageLicense">
                        Marriage License
                      </label>
                    </td>
                    <td>
                      <input class="form-check-input" type="checkbox" id="marriageLicense" name="marriageLicense" value="Marriage License">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label class="form-check-label" for="RPic">
                       3R Size Pictures
                      </label>
                    </td>
                    <td>
                      <input class="form-check-input" type="checkbox" id="RPic" name="RPic" value="3R Size Pictures">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label class="form-check-label" for="MBPic">
                        2x2 Pictures for Marriage Bann
                      </label>
                    </td>
                    <td>
                      <input class="form-check-input" type="checkbox" id="MBPic" name="MBPic" value="2x2 Pictures for Marriage Bann">
                    </td>
                  </tr>
                </tbody>
              </table>
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
                      <input class="form-check-input" type="radio" name="payMethod" value="gcash" id="gcashRadio5" checked>
                      <label class="form-check-label" for="gcashRadio">
                        GCash Payment
                      </label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="payMethod" value="face-to-face" id="faceToFaceRadio5">
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
                    <?php
                    include_once 'php/dbconn.php';

                    // Assuming you have a query to fetch the value from the table
                    $selectQuery = "SELECT wedding FROM eventsprice";
                    $result = mysqli_query($conn, $selectQuery);

                    if ($result && mysqli_num_rows($result) > 0) {
                        // Fetch the value
                        $row = mysqli_fetch_assoc($result);
                        $wedding = $row['wedding'];
                    } else {
                        // Default value if no data is found
                        $wedding = 1000; // You can set any default value here
                    }
                    ?>
                    <input type="number" class="form-control" id="inputNumber5" name="amount" value="<?php echo $wedding ?>" readonly required>
                  </div>
                  <div class="mb-3">
                    <label for="refNum" class="form-label">Reference Number</label>
                    <input type="number" class="form-control" id="inputRefNum5" name="refNum" placeholder="Enter your Reference Number" required>
                  </div>
                  <div class="mb-3">
                    <label for="receipt" class="form-label">Receipt Image</label>
                    <input type="file" class="form-control" id="inputFile5" name="receipt" required>
                  </div>
                </div>
              </div>
            </div>
              <button class="btn btn-success" type="submit" name="btn-save" id="btn-save" style="float: right;">Submit</button>
        </form>

      </div>
    </div>
  </div>
</div>

<script>
  // Add an event listener to the payment method radio buttons
  document.addEventListener('DOMContentLoaded', function () {
    var gcashRadio5 = document.getElementById('gcashRadio5');
    var faceToFaceRadio5 = document.getElementById('faceToFaceRadio5');
    var inputNumber5 = document.getElementById('inputNumber5');
    var inputFile5 = document.getElementById('inputFile5');
    var inputRefNum5 = document.getElementById('inputRefNum5');

    // Function to enable or disable input fields based on the selected payment method
    function toggleInputFields() {
      if (gcashRadio5.checked) {
        inputNumber5.removeAttribute('disabled');
        inputFile5.removeAttribute('disabled');
        inputRefNum5.removeAttribute('disabled');
      } else {
        inputNumber5.setAttribute('disabled', 'disabled');
        inputFile5.setAttribute('disabled', 'disabled');
        inputRefNum5.setAttribute('disabled', 'disabled');
      }
    }

    // Add event listeners for changes in the selected payment method
    gcashRadio5.addEventListener('change', toggleInputFields);
    faceToFaceRadio5.addEventListener('change', toggleInputFields);

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