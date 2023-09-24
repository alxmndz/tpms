<!-- Communion Modal-->
<div class="modal fade" id="comModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Communion Reservation Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="php/saveCom.php" method="POST" enctype="multipart/form-data" autocomplete="off">

          <div class="row my-3">
              <div class="col-md-6">
                <div class="form-outline">
                  <input value="<?php echo $id?>" name="addedBy" style="display: none;" id="addedBy">
                     <label class="form-label" for="typeText">
                      <i class="fa-solid fa-user"></i> 
                      Name
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
                    <input class="form-control" type="tel" id="contact" name="contact" placeholder="Enter your contact number" required />
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
                    <input class="form-control" type="time" id="comTime" name="comTime" required />
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
                                  <input class="form-check-input" type="checkbox" id="bapCertificate" name="requirements[]" value="Baptismal Certificate">
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

            <hr>

            <div class="row my-3">
              <div class="card">
                <div class="card-body">

                  <div class="col-md-12">
                    <div class="form-outline">
                      <label class="form-label" for="typeText">
                        <i class="fa-solid fa-dollar-sign"></i>
                        Please select your preferred Payment Method
                      </label>
                      <div class="row">

                        <div class="col-md-6">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="payMethod" value="gcash" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                              GCash Payment
                            </label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="payMethod" value="face-to-face">
                            <label class="form-check-label" for="flexRadioDefault2">
                              Face-to-face Payment
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>

          <div class="container my-4">
            <div class="card">
              <div class="card-header bg-primary text-white">
                GCash Details
              </div>
              <div class="card-body">
                 <div class="row my-3">
                  <div class="col-md-6">
                    <div class="text-center">
                      <img class="img-fluid" src="assets/icons/gcash.png" alt="GCash Logo" style="max-width: 100px; max-height: 100px;">
                      <p class="card-text">For payment method contact:</p>
                      <p class="mt-2"><i class="fas fa-phone"></i> 0917 835 0117</p>
                    </div>
                  </div>
                 <div class="col-md-6"> 
                    
                      <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="inputNumber" name="amount" placeholder="Enter Amount" required>
                      </div>
                      <div class="mb-3">
                        <label for="receipt" class="form-label">Receipt Image</label>
                        <input type="file" class="form-control" id="inputFile" name="receipt" accept="image/*" required>
                      </div>

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


<script type="text/javascript" src="js/payMethod.js"></script>