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
                          <div class="col-md-12">
                              <div class="form-outline">
                                <input value="<?php echo $id?>" name="addedBy" style="display: none;" id="addedBy">
                                  <label class="form-label" for="typeText">
                                    <i class="fa-solid fa-user"></i> 
                                    Name
                                  </label>
                                <input class="form-control" type="text" id="name" name="name" placeholder="Enter your name" required />
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