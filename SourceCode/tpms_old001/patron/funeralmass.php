<div class="container-fluid" style="margin-top: 10px;">
  <div class="card">
    <div class="card-header">
      <h5 class="card-title">Funeral Mass Reservation Form</h5>
    </div>
    <div class="card-body">

      <form action="php/saveFuneral1.php" method="post" enctype="multipart/form-data" autocomplete="off">
              
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
                    <input value="Online" name="transactType" style="display: none;" id="transactType">
                    <input value="gcash" name="payMethod" style="display: none;" id="payMethod">
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
                        <i class="fa-solid fa-user"></i> 
                        Father's name (Firstname-Middle Initial-Surname)
                      </label>
                      <input class="form-control" type="text" id="fName" name="fName" placeholder="Enter father's name" required />
                    </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-outline">
                       <label class="form-label" for="typeText">
                        <i class="fa-solid fa-user"></i> 
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
                        <input class="form-control" type="number" id="contact" name="contact" placeholder="Enter contact number" required />
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
                        Interment
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
                      <select class="form-control" id="sacrament" name="sacrament">
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
                      <select class="form-control" id="lastsacrament" name="lastsacrament">
                        <option disabled selected>Select an option</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
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
                      <input type="number" class="form-control" id="amount" name="amount" value="2000" readonly required>
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