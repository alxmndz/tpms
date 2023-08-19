<div class="container-fluid" style="margin-top: 10px;">
    
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Blessing Reservation Form</h5>
      </div>
      <div class="card-body">
          <form action="#">
            
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
                    <input class="form-control" type="tel" id="contact" placeholder="Enter your contact number" required />
                  </div>
              </div>
            </div>

            <div class="row my-3">
              <div class="col-md-6">
                <div class="form-outline">
                     <label class="form-label" for="typeText">
                      <i class="fa-solid fa-envelope"></i> 
                      Email
                    </label>
                    <input class="form-control" type="text" id="email" name="email" placeholder="Enter your email" required />
                  </div>
                </div>

                <div class="col-md-6">
                   <div class="form-outline">
                     <label class="form-label" for="typeText">
                      <i class="fa-solid fa-house"></i> 
                        Address
                      </label>
                    <input class="form-control" type="text" id="address" placeholder="Enter your adress" required />
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
                    <input class="form-control" type="date" id="blessDate" name="blessDate" required />
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
                    <input class="form-control" type="time" id="blessTime" name="blessTime" required />
                  </div>
                </div>
            </div>

            <div class="row my-3">
              <div class="col-md-12">
                <div class="form-outline">
                     <label class="form-label" for="typeText">
                      Intention
                    </label>
                    <select class="form-control" id="intention" name="intention" required>
                      <option disabled selected>Select an Intention</option>
                      <option value="Sponsor">Major Sponsor</option>
                      <option value="Thanksgive">Thanksgiving</option>
                      <option value="Birthday">Birthday</option>
                      <option value="Wedding Anniversarry">Wedding Anniversarry</option>
                      <option value="Petition">Petition</option>
                      <option value="Recovery">Healing/Recovery</option>
                      <option value="Soul">Soul</option>
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
                    <form>
                      <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter Amount" required>
                      </div>
                      <div class="mb-3">
                        <label for="receipt" class="form-label">Receipt Image</label>
                        <input type="file" class="form-control" id="receipt" name="receipt" accept="image/*" required>
                      </div>
                    </form>
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