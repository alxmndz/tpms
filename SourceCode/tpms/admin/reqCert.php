<div class="card container">
	<div class="card-header">
		<span class="modal-title"><i class="fa-solid fa-scroll"></i> Request Certificate</span>
		<i class="fa-solid fa-circle-arrow-left" style="float: right; cursor: pointer;" onclick="openCity(event, 'request')"></i>
	</div>
	<div class="card-body">
		<form class="" action="php/addreq1.php" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="form-group">
                    <input value="<?php echo $id?>" name="addedBy" style="display: none;" id="addedBy">
                  </div>
                        <div class="row my-3">
                          <div class="col-md-6">
                              <div class="form-outline">
                                  <label class="form-label" for="typeText">
                                    <i class="fa-solid fa-user"></i> 
                                    Name
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
                        <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-envelope"></i> Email</label>
                                <input class="form-control" type="text" id="email" name="email" placeholder="Enter your email" required>
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
                                <label class="form-label" for="typeText"><i class="fa-solid fa-calendar"></i> Event</label>
                                <select class="form-control" id="event" name="event" required>
                                    <option disabled selected> Select an event</option>
                                    <option value="Baptismal Certificate">Baptismal Certificate</option>
                                    <option value="Communion Certificate">Communion Certificate</option>
                                    <option value="Confirmation Certificate">Confirmation Certificate</option>
                                    <option value="Death Certificate">Death Certificate</option>
                                    <option value="Marriage Certificate">Marriage Certificate</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-money-bill-1-wave"></i> Amount Price</label>
                                <input class="form-control" type="number" id="amount" name="amount" placeholder="Enter amount" required readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-receipt"></i>
                                  Receipt
                                </label>
                                <input class="form-control" type="file" id="receipt" name="receipt" required>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                              <label class="form-label" for="typeText"><i class="fa-solid fa-chart-simple"></i> Status</label>
                                <select class="form-control" id="status" name="status"required>
                                    <option disabled selected>Select an option</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Disapproved">Disapproved</option>
                                    <option value="Pending">Pending</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                              <label class="form-label" for="typeText"><i class="fa-solid fa-calendar"></i> Transaction Date</label>
                            <input class="form-control" type="date" id="transactDate" name="transactDate" required>
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