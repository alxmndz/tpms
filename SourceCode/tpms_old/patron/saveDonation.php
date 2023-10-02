<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Donation</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <form class="" action="php/donate.php" method="post" enctype="multipart/form-data" autocomplete="off">

                                <input value="<?php echo $id?>" name="addedBy" style="display: none;" id="addedBy">
                                <input class="form-control" type="hidden" id="name" name="name" value="<?php echo $_SESSION['name'] ?>" required />
                       
                                <input class="form-control" type="hidden" id="email" name="email" value="<?php echo $_SESSION['email'] ?>" required />
                                <input class="form-control" type="hidden" id="address" name="address" value="<?php echo $_SESSION['address'] ?>" required/>

                                <input class="form-control" type="hidden" id="contact" name="contact" value="<?php echo $_SESSION['contact'] ?>" required/>
                                
                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-calendar"></i> Date Donated</label>
                                <input class="form-control" type="date" id="date" name="date" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-money-bill-1-wave"></i> Donation Amount</label>
                                <input class="form-control" type="text" type="number" id="amount" name="amount" placeholder="Enter Donation Amount" oninput="formatMoney(this)" required>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12">
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