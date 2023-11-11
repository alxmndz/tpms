<div class="modal fade modal-lg" id="weddModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Wedding Reservation Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="php/saveWed1.php" method="post" enctype="multipart/form-data" autocomplete="off">

              <div class="row my-3">
                <div class="col-md-6">
                  <div class="form-outline">
                    <input value="<?php echo $id?>" name="addedBy" style="display: none;" id="addedBy">
                    <input value="Online" name="transactType" style="display: none;" id="transactType">
                    <input value="gcash" name="payMethod" style="display: none;" id="payMethod">
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
                    <input class="form-control" type="tel" id="groom" name="gContact" placeholder="Enter groom's contact" required />
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
                    <select class="form-control" id="package" name="package" required>
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
                    <select class="form-control" id="intention" name="intention" required>
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
                        Wedding Date
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

              <div>
                <h5> Wedding's Credentials</h5>
              </div>

              <div class="row my-3">
                <div class="col-md-6">
                  <div class="form-outline">
                      <label class="form-label" for="typeText">
                        <i class="fa-solid fa-cake-candles"></i>
                        Groom's Birth Certificate
                      </label>
                    <input type="file" class="form-control" id="gBirthCert" name="gBirthCert" required />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-outline">
                      <label class="form-label" for="typeText">
                        <i class="fa-solid fa-cake-candles"></i>
                        Bride's Birth Certificate
                      </label>
                    <input type="file" class="form-control" id="bBirthCert" name="bBirthCert" required />
                  </div>
                </div>
              </div>

              <div class="row my-3">
                <div class="col-md-6">
                  <div class="form-outline">
                      <label class="form-label" for="typeText">
                        <i class="fa-solid fa-baby"></i>
                        Groom's Baptismal Certificate (Original/Photocopy)
                      </label>
                    <input type="file" class="form-control" id="gBapCert" name="gBapCert" required />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-outline">
                      <label class="form-label" for="typeText">
                        <i class="fa-solid fa-baby"></i>
                        Bride's Baptismal Certificate (Original/Photocopy)
                      </label>
                    <input type="file" class="form-control" id="bBapCert" name="bBapCert" required />
                  </div>
                </div>
              </div>

              <div class="row my-3">
                <div class="col-md-6">
                  <div class="form-outline">
                      <label class="form-label" for="typeText">
                        Groom's Confirmation Certificate (For marriage purpose)
                      </label>
                    <input type="file" class="form-control" id="gConCert" name="gConCert" required />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-outline">
                      <label class="form-label" for="typeText">
                        Bride's Confirmation Certificate (For marriage purpose)
                      </label>
                    <input type="file" class="form-control" id="bConCert" name="bConCert" required />
                  </div>
                </div>
              </div>

              <div class="row my-3">
                <div class="col-md-12">
                  <div class="form-outline">
                      <label class="form-label" for="typeText">
                        Certificate of No Marriage <em>(CENOMAR)</em>
                      </label>
                    <input type="file" class="form-control" id="cenomar" name="cenomar" required />
                  </div>
                </div>
              </div>

              <div class="row my-3">
                <div class="col-md-12">
                  <div class="form-outline">
                      <label class="form-label" for="typeText">
                        <i class="fa-solid fa-id-card"></i>
                        Marriage License (From Municipality)
                      </label>
                    <input type="file" class="form-control" id="marriageLicense" name="marriageLicense" required />
                  </div>
                </div>
              </div>

              <hr>

              <div class="row my-3">
                <label class="form-label" for="typeText">
                  3R Size Pictures (2 copies)
                </label>
                <div class="col-md-6">
                  <div class="form-outline">
                    <input type="file" class="form-control" id="RPic1" name="RPic1" required />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-outline">
                    <input type="file" class="form-control" id="RPic2" name="RPic2" required />
                  </div>
                </div>
              </div>

              <div class="row my-3">
                <label class="form-label" for="typeText">
                  2x2 Pictures for Marriage Bann
                </label>
                <div class="col-md-6">
                  <div class="form-outline">
                    <label class="form-label" for="typeText">
                      Groom's Picture
                    </label>
                    <input type="file" class="form-control" id="MBPic1" name="MBPic1" required />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-outline">
                    <label class="form-label" for="typeText">
                      Bride's Picture
                    </label>
                    <input type="file" class="form-control" id="MBPic2" name="MBPic2" required />
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
                            <input type="number" class="form-control" id="amount" name="amount" value="3000" readonly required>
                          </div>
                          <div class="mb-3">
                            <label for="amount" class="form-label">Reference Number</label>
                            <input type="number" class="form-control" id="refNum" name="refNum" placeholder="Enter the Reference Number" required>
                          </div>
                          <div class="mb-3">
                            <label for="receipt" class="form-label">Receipt Image</label>
                            <input type="file" class="form-control" id="receipt" name="receipt" accept="image/*" required>
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