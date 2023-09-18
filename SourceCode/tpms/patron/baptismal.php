<div class="container-fluid" style="margin-top: 10px;">
  <div class="card">
    <div class="card-header">
      <div class="card-title"><h5 class="form-title">Baptismal Reservation Form</h5></div>
    </div>
    <div class="card-body">
      <form action="php/saveBap1.php" method="post" enctype="multipart/form-data" autocomplete="off">

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
                  <input class="form-control" type="date" id="bapDate" name="bapDate" required />
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
                  <input class="form-control" type="time" id="bapTime" name="bapTime" required />
                </div>
              </div>
          </div>

          <div class="row my-3">
            <div class="col-md-6">
              <div class="form-outline">
                   <label class="form-label" for="typeText">
                    <i class="fa-solid fa-baby"></i> 
                    Birth Certificate(child going to be baptize)
                  </label>
                  <input class="form-control" type="file" id="birthCert" name="birthCert" required />
                </div>
              </div>

              <div class="col-md-6">
                 <div class="form-outline">
                   <label class="form-label" for="typeText"> 
                      Parents Marriage Contract
                    </label>
                  <input class="form-control" type="file" id="marriageCont" name="marriageCont" required />
                </div>
            </div>
          </div>

          <hr>

          <div class="row my-3">
            <label class="form-label" for="typeText"> 
               Godfather/Mother Confirmation Certificate (2 sponsors only)
            </label>
            <div class="col-md-6">
              <div class="form-outline">
                  <label class="form-label" for="typeText">
                     Sponsor 1
                  </label>
                  <input class="form-control" type="file" id="sponsor1" name="sponsor1" required />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-outline">
                  <label class="form-label" for="typeText">
                     Sponsor 2
                  </label>
                  <input class="form-control" type="file" id="sponsor2" name="sponsor2" required />
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