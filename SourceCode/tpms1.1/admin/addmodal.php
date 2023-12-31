<!-- The Donation Modal -->
<div class="modal fade" id="donate">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <span class="modal-title"><i class="fa-solid fa-hand-holding-dollar"></i> Add Donation</span>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
                    <form class="" action="php/donate1.php" method="post" enctype="multipart/form-data" autocomplete="off">
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
                                  <i class="fa-solid fa-envelope"></i> 
                                    Email
                                </label>
                    <input class="form-control" type="text" id="email" name="email" placeholder="Enter your email" required />
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-home"></i> Address</label>
                                <input class="form-control" type="text" id="address" name="address" placeholder="Enter Home Address" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-home"></i> Contact</label>
                                <input class="form-control" type="tel" id="contact" name="contact" placeholder="Enter Contact Number" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-calendar"></i> Date Donated</label>
                                <input class="form-control" type="date" id="date" name="date" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-6">
                            <div class="form-outline">
                              <label class="form-label" for="typeText"><i class="fa-solid fa-money-bill-1-wave"></i> Donation Amount</label>
                                <input class="form-control" type="number" id="amount" name="amount" placeholder="Enter Donation Amount" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-receipt"></i>
                                  Receipt
                                </label>
                                <input class="form-control"type="file" id="receipt" name="receipt" required>
                            </div>
                        </div>
                    </div>
          <div class="form-group mb-2">             
            <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Submit</button>  
          </div>
        </form>

      </div>

    </div>
  </div>
</div>



<!-- Blessing Modal -->
<div class="modal fade" id="bless">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <span>Blessing Reservation Form</span>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
          <form action="php/saveBless.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            
            <div class="row my-3">
              <div class="col-md-6">
                <div class="form-outline">
                  <input value="<?php echo $id?>" name="addedBy" style="display: none;" id="addedBy">
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
              <div class="col-md-6">
                <div class="form-outline">
                     <label class="form-label" for="typeText">
                      <i class="fa-solid fa-envelope"></i> 
                      Email
                    </label>
                    <input class="form-control" type="text" id="email" name="email" placeholder="Enter your email" required>
                  </div>
                </div>

                <div class="col-md-6">
                   <div class="form-outline">
                     <label class="form-label" for="typeText">
                      <i class="fa-solid fa-house"></i> 
                        Address
                      </label>
                    <input class="form-control" type="text" id="address" name="address" placeholder="Enter your adress" required>
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
                    <input class="form-control" type="date" id="blessDate" name="blessDate" required>
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
                    <input class="form-control" type="time" id="blessTime" name="blessTime" required>
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

          <button class="btn btn-success" type="submit" name="btn-save" id="btn-save" style="float: right;">Submit</button> 

        </form>

      </div>

    </div>
  </div>
</div>



<!-- Funeral Mass -->
<div class="modal fade" id="funeral">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <span>Funeral Mass Reservation Form</span>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="php/saveFuneral.php" method="POST" enctype="multipart/form-data" autocomplete="off">
          
              <div class="row my-3">
                <div class="col-md-12">
                  <div class="form-outline">
                    <input value="<?php echo $id?>" name="addedBy" style="display: none;" id="addedBy">
                       <label class="form-label" for="typeText">
                        <i class="fa-solid fa-user"></i> 
                        Name
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
                        Father's name
                      </label>
                      <input class="form-control" type="text" id="fName" name="fName" placeholder="Enter father's name" required />
                    </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-outline">
                       <label class="form-label" for="typeText">
                        <i class="fa-solid fa-user"></i> 
                          Mother's name
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
                <div class="col-md-12">
                  <div class="form-outline">
                       <label class="form-label" for="typeText">
                        <i class="fa-solid fa-home"></i> 
                        Address
                      </label>
                      <input class="form-control" type="text" id="address" name="address" placeholder="Enter the address" required />
                    </div>
                  </div>
              </div>

              <div class="row my-3">
                <div class="col-md-6">
                  <div class="form-outline">
                       <label class="form-label" for="typeText">
                        <i class="fa-solid fa-calendar-days"></i> 
                        Date
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
                        Bury Date
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
</div>


<!-- Confirmation Modal -->
<div class="modal fade" id="confirmation">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <span>Confirmation Reservation Form</span>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="php/saveCon.php" method="POST" enctype="multipart/form-data" autocomplete="off">
          
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
                      <input class="form-control" type="date" id="conDate" name="conDate" required />
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
                      <input class="form-control" type="time" id="conTime" name="conTime" required />
                    </div>
                  </div>
              </div>

              <div class="row my-3">
                <div class="col-md-6">
                  <div class="form-outline">
                       <label class="form-label" for="typeText">
                        <i class="fa-solid fa-folder-open"></i> 
                        Baptismal Certificate (Original/Photocopy)
                      </label>
                      <input class="form-control" type="file" id="bapCert" name="bapCert" required />
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
</div>


<!-- Communion Modal-->
<div class="modal fade" id="comModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <span>Communion Reservation Form</span>
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
                     <label class="form-label" for="typeText">
                      <i class="fa-solid fa-folder-open"></i> 
                      Baptismal Certificate (Original/Photocopy)
                    </label>
                    <input class="form-control" type="file" id="bapCert" name="bapCert" required />
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
</div>

<!-- Baptismal Modal-->
<div class="modal fade" id="bapModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <span>Baptismal Reservation Form</span>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="php/saveBap.php" method="POST" enctype="multipart/form-data" autocomplete="off">

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
                      <input type="file" class="form-control" id="receipt" name="receipt" required>
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

<!-- Wedding Modal-->
<div class="modal fade" id="wedModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <span>Wedding Reservation Form</span>
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
                <div class="col-md-12">
                  <div class="form-outline">
                      <label class="form-label" for="typeText">
                        <i class="fa-solid fa-envelope"></i> 
                        Email
                      </label>
                    <input class="form-control" type="text" id="email" name="email" placeholder="Enter email" required />
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

<!-- Template Format -->
<div class="modal fade" id="#">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <span>Confirmation Reservation Form</span>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        
      </div>
    </div>
  </div>
</div>