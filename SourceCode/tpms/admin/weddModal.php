<!-- Wedding Modal-->
<div class="modal fade" id="wedModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Wedding Reservation Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">

        <form action="php/saveWed.php" method="POST" enctype="multipart/form-data" autocomplete="off">
          <div class="row my-3">
                <div class="col-md-6">
                  <div class="form-outline">
                    <input value="<?php echo $id?>" name="addedBy" style="display: none;" id="addedBy">
                      <label class="form-label" for="typeText">
                        <i class="fa-solid fa-user"></i> 
                        Groom's Name
                      </label>
                    <input class="form-control" type="text" id="groom" name="groom" placeholder="Enter groom's name" required />
                  </div>
                </div>

                <div class="col-md-6">
                   <div class="form-outline">
                       <label class="form-label" for="typeText">
                        <i class="fa-solid fa-user"></i> 
                        Bride's Name
                       </label>
                    <input class="form-control" type="text" id="bride" name="bride" placeholder="Enter bride's name" required />
                  </div>
                </div>
              </div>

              <div class="row my-3">
                <div class="col-md-6">
                  <div class="form-outline">
                      <label class="form-label" for="typeText">
                        <i class="fa-solid fa-phone"></i> 
                        Groom's Contact
                      </label>
                    <input class="form-control" type="tel" id="gContact" name="gContact" placeholder="Enter groom's contact" required />
                  </div>
                </div>

                <div class="col-md-6">
                   <div class="form-outline">
                       <label class="form-label" for="typeText">
                        <i class="fa-solid fa-phone"></i> 
                        Bride's Contact
                       </label>
                    <input class="form-control" type="tel" id="bContact" name="bContact" placeholder="Enter bride's contact" required />
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
                    <input class="form-control" type="text" id="gAddress" name="gAddress" placeholder="Enter Groom's Address" required />
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-outline">
                      <label class="form-label" for="typeText">
                        <i class="fa-solid fa-home"></i> 
                        Bride's Address
                      </label>
                    <input class="form-control" type="text" id="bAddress" name="bAddress" placeholder="Enter Bride's Address" required />
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
                <div class="col-md-12">
                  <div class="form-outline">
                      <label class="form-label" for="typeText">
                        <i class="fa-solid fa-calendar"></i>
                        Date
                      </label>
                    <input type="date" class="form-control" id="wdate" name="wdate" required />
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
                    <input type="time" class="form-control" id="resTime" name="resTime" required />
                  </div>
                </div>
              </div>

              <div class="row my-3">
                <div class="col-md-12">
                  <div class="form-outline">
                      <label class="form-label" for="typeText">
                        <i class="fa-solid fa-calendar-days"></i>
                        Transaction Date
                      </label>
                    <input type="date" class="form-control" id="transactDate" name="transactDate" required />
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
                          <label class="form-check-label" for="birthCertificate">
                            Groom's Birth Certificate
                          </label>
                        </td>
                        <td>
                          <input class="form-check-input" type="checkbox" id="gBirthCert" name="requirements[]" value="Groom's Birth Certificate">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label class="form-check-label" for="birthCertificate">
                            Bride's Birth Certificate
                          </label>
                        </td>
                        <td>
                          <input class="form-check-input" type="checkbox" id="bBirthCert" name="requirements[]" value="Bride's Birth Certificate">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label class="form-check-label" for="birthCertificate">
                            Groom's Baptismal Certificate
                          </label>
                        </td>
                        <td>
                          <input class="form-check-input" type="checkbox" id="gBapCert" name="requirements[]" value="Groom's Baptismal Certificate">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label class="form-check-label" for="birthCertificate">
                            Bride's Baptismal Certificate
                          </label>
                        </td>
                        <td>
                          <input class="form-check-input" type="checkbox" id="bBapCert" name="requirements[]" value="Bride's Baptismal Certificate">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label class="form-check-label" for="birthCertificate">
                            Groom's Confirmation Certificate
                          </label>
                        </td>
                        <td>
                          <input class="form-check-input" type="checkbox" id="gConCert" name="requirements[]" value="Groom's Birth Certificate">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label class="form-check-label" for="birthCertificate">
                            Bride's Confirmation Certificate
                          </label>
                        </td>
                        <td>
                          <input class="form-check-input" type="checkbox" id="bConCert" name="requirements[]" value="Bride's Confirmation Certificate">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label class="form-check-label" for="cenomar">
                            Certificate of No Marriage
                          </label>
                        </td>
                        <td>
                          <input class="form-check-input" type="checkbox" id="cenomar" name="requirements[]" value="Certificate of No Marriage">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label class="form-check-label" for="marriageLicense">
                            Marriage License
                          </label>
                        </td>
                        <td>
                          <input class="form-check-input" type="checkbox" id="marriageLicense" name="requirements[]" value="Marriage License">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label class="form-check-label" for="3RSize">
                            3R Size Picture (Groom)
                          </label>
                        </td>
                        <td>
                          <input class="form-check-input" type="checkbox" id="RSize" name="requirements[]" value="3R Size (Groom's Picture)">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label class="form-check-label" for="3RSize">
                            3R Size Picture (Bride)
                          </label>
                        </td>
                        <td>
                          <input class="form-check-input" type="checkbox" id="RSize" name="requirements[]" value="3R Size (Bride's Picture)">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label class="form-check-label" for="mBann">
                            2x2 Picture for Marriage Bann (Groom)
                          </label>
                        </td>
                        <td>
                          <input class="form-check-input" type="checkbox" id="mBann" name="requirements[]" value="2x2 Picture for Marriage Bann (Groom)">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label class="form-check-label" for="mBann">
                            2x2 Picture for Marriage Bann (Bride)
                          </label>
                        </td>
                        <td>
                          <input class="form-check-input" type="checkbox" id="mBann" name="requirements[]" value="2x2 Picture for Marriage Bann (Bride)">
                        </td>
                      </tr>
                    </tbody>
                  </table>
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
                            <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter Amount" required>
                          </div>
                          <div class="mb-3">
                            <label for="receipt" class="form-label">Receipt Image</label>
                            <input type="file" class="form-control" id="receipt" name="receipt" required>
                          </div>

                      </div>
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