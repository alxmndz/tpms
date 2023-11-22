<div class="card container">
	<div class="card-header">
		<span class="modal-title"><i class="fa-solid fa-scroll"></i> Request Certificate</span>
		<i class="fa-solid fa-circle-arrow-left" style="float: right; cursor: pointer;" onclick="openCity(event, 'reqs')"></i>
	</div>
	<div class="card-body">
		<form class="" action="php/addReqCertST.php" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="form-group">
                    <input value="<?php echo $id?>" name="addedBy" style="display: none;" id="addedBy">
                    <input type="hidden" name="transactType" class="form-control" value="Walk-In">
                  </div>
                        <div class="row my-3">
                          <div class="col-md-6">
                              <div class="form-outline">
                                  <label class="form-label" for="typeText">
                                    <i class="fa-solid fa-user"></i> 
                                    Name (Firstname-Middle Initial-Surname)
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
                    <input class="form-control" type="tel" id="contact" name="contact" placeholder="Enter your contact number" required>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                      <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-home"></i> Address</label>
                                <input class="form-control" type="text" id="address" name="address" placeholder="Enter your home address" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-calendar"></i> Type of certificate</label>
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
                        <input class="form-check-input" type="radio" name="payMethod" value="gcash" id="gcashRadio6" checked>
                        <label class="form-check-label" for="gcashRadio6">
                            GCash Payment
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payMethod" value="face-to-face" id="faceToFaceRadio6">
                        <label class="form-check-label" for="faceToFaceRadio6">
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
                    <input type="number" class="form-control" id="inputNumber6" name="amount" value="<?php echo $cert; ?>" readonly required>
                </div>
                <div class="mb-3">
                    <label for="refNum" class="form-label">Reference Number</label>
                    <input type="number" class="form-control" id="inputRefNum6" name="refNum" placeholder="Enter your Reference Number" required>
                </div>
                <div class="mb-3">
                    <label for="receipt" class="form-label">Receipt Image</label>
                    <input type="file" class="form-control" id="inputFile6" name="receipt" required>
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


<script>
  // Get references to the event select and amount input
  const eventSelect = document.getElementById('event');
  const amountInput = document.getElementById('amount');

  // Define the event-price mapping
  const eventPrices = {
    'Baptismal Certificate': 10,
    'Communion Certificate': 15,
    'Confirmation Certificate': 20,
    'Death Certificate': 25,
    'Marriage Certificate': 30,
  };

  // Function to update the amount input based on the selected event
  function updateAmount() {
    const selectedEvent = eventSelect.value;
    const eventPrice = eventPrices[selectedEvent] || 0;
    amountInput.value = eventPrice;
    amountInput.disabled = eventPrice === 0;
  }

  // Attach an event listener to the event select
  eventSelect.addEventListener('change', updateAmount);

  // Initialize the amount based on the initial event value
  updateAmount();
</script>

<script>
        document.addEventListener("DOMContentLoaded", function () {
            const gcashDetails = document.getElementById("gcashDetails");
            const gcashRadio = document.getElementById("gcashRadio6");
            const faceToFaceRadio = document.getElementById("faceToFaceRadio6");

            // Function to enable GCash details
            function enableGCashDetails() {
                gcashDetails.style.display = "block";
                const inputs = gcashDetails.querySelectorAll("input");
                inputs.forEach(input => {
                    input.removeAttribute("disabled");
                });
            }

            // Function to disable GCash details
            function disableGCashDetails() {
                gcashDetails.style.display = "none";
                const inputs = gcashDetails.querySelectorAll("input");
                inputs.forEach(input => {
                    input.setAttribute("disabled", "true");
                });
            }

            // Add event listeners to radio buttons
            gcashRadio.addEventListener("change", enableGCashDetails);
            faceToFaceRadio.addEventListener("change", disableGCashDetails);

            // Initially, disable GCash details
            disableGCashDetails();
        });
    </script>