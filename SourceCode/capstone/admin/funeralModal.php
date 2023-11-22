<!-- Funeral Mass -->
<div class="modal fade" id="funeral">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Funeral Mass Reservation Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="php/saveFuneral.php" method="POST" enctype="multipart/form-data" autocomplete="off">
              <div class="row my-3">
                <div class="col-md-12">
                  <div class="form-outline">
                       <label class="form-label" for="typeText">
                        <i class="fa-solid fa-user-plus"></i>
                        Requested By (Firstname-Middle Initial-Surname)
                      </label>
                      <input class="form-control" type="text" id="reqBy" name="reqBy" placeholder="Enter the name of the person who requested" required />
                    </div>
                  </div>
              </div>
              <div class="row my-3">
                <div class="col-md-12">
                  <div class="form-outline">
                    <input value="<?php echo $id?>" name="addedBy" style="display: none;" id="addedBy">
                       <label class="form-label" for="typeText">
                        <i class="fa-solid fa-user"></i> 
                        Name (Firstname-Middle Initial-Surname)
                      </label>
                      <input class="form-control" type="text" id="name" name="name" placeholder="Enter the name of the deceased" required />
                    </div>
                  </div>
              </div>

              <div class="row my-3">
                <div class="col-md-6">
                  <div class="form-outline">
                       <label class="form-label" for="typeText">
                        <i class="fa-solid fa-person"></i>
                        Father's name (Firstname-Middle Initial-Surname)
                      </label>
                      <input class="form-control" type="text" id="fName" name="fName" placeholder="Enter father's name" required />
                    </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-outline">
                       <label class="form-label" for="typeText">
                        <i class="fa-solid fa-person-dress"></i> 
                          Mother's name (Firstname-Middle Initial-Surname)
                        </label>
                      <input class="form-control" type="tel" id="mName" name="mName" placeholder="Enter mother's name" required />
                    </div>
                </div>
              </div>

              <div class="row my-3">
                <div class="col-md-12">
                  <div class="form-outline">
                       <label class="form-label" for="typeText">
                        <i class="fa-solid fa-user"></i> 
                        Husband or Wife (Widowed of)
                      </label>
                      <input class="form-control" type="text" id="widow" name="widow" placeholder="Enter the widowed of the deceased" required />
                    </div>
                  </div>
              </div>

              <div class="row my-3">
                <div class="col-md-6">
                  <div class="form-outline">
                       <label class="form-label" for="typeText">
                        <i class="fa-solid fa-home"></i> 
                        Address
                      </label>
                      <input class="form-control" type="text" id="address" name="address" placeholder="Enter the address" required />
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
                <div class="col-md-6">
                  <div class="form-outline">
                       <label class="form-label" for="typeText">
                        <i class="fa-solid fa-calendar-days"></i> 
                        Date of Death
                      </label>
                      <input class="form-control" type="date" id="deathDate" name="deathDate" required />
                    </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-outline">
                       <label class="form-label" for="typeText">
                        <i class="fa-solid fa-user"></i> 
                          Age
                        </label>
                      <input class="form-control" type="number" id="age" name="age" placeholder="Enter age of the deceased" required />
                    </div>
                </div>
              </div>

              <div class="row my-3">
                <div class="col-md-6">
                  <div class="form-outline">
                       <label class="form-label" for="typeText">
                        <i class="fa-solid fa-calendar-days"></i> 
                        Internment
                      </label>
                      <input class="form-control" type="date" id="buryDate" name="buryDate" required />
                    </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-outline">
                       <label class="form-label" for="typeText">
                        <i class="fa-solid fa-skull"></i>
                          Cause of death
                        </label>
                      <input class="form-control" type="text" id="cause" name="cause" placeholder="Enter cause of death" required />
                    </div>
                </div>
              </div>

              <div class="row my-3">
                <div class="col-md-12">
                  <div class="form-outline">
                       <label class="form-label" for="typeText">
                        <i class="fa-solid fa-clock"></i>
                        Reserved Time
                      </label>
                      <input class="form-control" type="time" id="resTime" name="resTime" required>
                    </div>
                  </div>
              </div>

              <div class="row my-3">
                <div class="col-md-12">
                  <div class="form-outline">
                       <label class="form-label" for="typeText">
                        <i class="fa-solid fa-question"></i>
                        He / She received the last Sacrament before Death?
                      </label>
                      <select class="form-select" id="sacrament" name="sacrament">
                        <option disabled selected>Select an option</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                  </div>
              </div>

              <div class="row my-3">
                <div class="col-md-12">
                  <div class="form-outline">
                       <label class="form-label" for="typeText">
                        <i class="fa-solid fa-question"></i>
                        He / She was not able to receive the last Sacraments before death?
                      </label>
                      <select class="form-select" id="lastsacrament" name="lastsacrament">
                        <option disabled selected>Select an option</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                  </div>
              </div>

              <div class="row my-3">
                    <div class="col-md-12">
                      <label class="form-label" for="status">
                          <i class="fa-solid fa-chart-simple"></i> 
                          Status
                        </label>
                       <div class="form-outline">
                        <select class="form-select" id="status" name="status">
                          <option disabled selected>Select a status</option>
                          <option value="Approved">Approved</option>
                          <option value="In Process">In Process</option>
                          <option value="Disapprove, mismatch files">Disapprove, mismatch files</option>
                        </select>
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
                      <input class="form-check-input" type="radio" name="payMethod" value="gcash" id="gcashRadio4" checked>
                      <label class="form-check-label" for="gcashRadio">
                        GCash Payment
                      </label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="payMethod" value="face-to-face" id="faceToFaceRadio4">
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
                    $selectQuery = "SELECT funeralmass FROM eventsprice";
                    $result = mysqli_query($conn, $selectQuery);

                    if ($result && mysqli_num_rows($result) > 0) {
                        // Fetch the value
                        $row = mysqli_fetch_assoc($result);
                        $funeralmass = $row['funeralmass'];
                    } else {
                        // Default value if no data is found
                        $funeralmass = 1000; // You can set any default value here
                    }
                    ?>
                    <input type="number" class="form-control" id="inputNumber4" name="amount" value="<?php echo $funeralmass; ?>" readonly required>
                  </div>
                  <div class="mb-3">
                    <label for="refNum" class="form-label">Reference Number</label>
                    <input type="number" class="form-control" id="inputRefNum4" name="refNum" placeholder="Enter your Reference Number" required>
                  </div>
                  <div class="mb-3">
                    <label for="receipt" class="form-label">Receipt Image</label>
                    <input type="file" class="form-control" id="inputFile4" name="receipt" required>
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
    var gcashRadio4 = document.getElementById('gcashRadio4');
    var faceToFaceRadio4 = document.getElementById('faceToFaceRadio4');
    var inputNumber4 = document.getElementById('inputNumber4');
    var inputFile4 = document.getElementById('inputFile4');
    var inputRefNum4 = document.getElementById('inputRefNum4');

    // Function to enable or disable input fields based on the selected payment method
    function toggleInputFields() {
      if (gcashRadio4.checked) {
        inputNumber4.removeAttribute('disabled');
        inputFile4.removeAttribute('disabled');
        inputRefNum4.removeAttribute('disabled');
      } else {
        inputNumber4.setAttribute('disabled', 'disabled');
        inputFile4.setAttribute('disabled', 'disabled');
        inputRefNum4.setAttribute('disabled', 'disabled');
      }
    }

    // Add event listeners for changes in the selected payment method
    gcashRadio4.addEventListener('change', toggleInputFields);
    faceToFaceRadio4.addEventListener('change', toggleInputFields);

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