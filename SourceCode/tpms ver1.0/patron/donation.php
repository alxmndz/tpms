<div class="container-fluid px-4" style="margin-top: 20px;">
	<div class="card">
		<div class="card-body">
			<h5 class="card-title"><i class="fa-solid fa-hand-holding-dollar" style="color: #1ABC9C;"></i> Donation</h5>
    	<hr>
			 <form class="" action="php/donate.php" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="row my-3">
                          <div class="col-md-6">
                              <div class="form-outline">
                                <input value="<?php echo $id?>" name="addedBy" style="display: none;" id="addedBy">
                                  <label class="form-label" for="typeText">
                                    <i class="fa-solid fa-user"></i> 
                                    Name
                                  </label>
                                <input class="form-control" type="text" id="name" name="name" value="<?php echo $_SESSION['name'] ?>" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText">
                                  <i class="fa-solid fa-envelope"></i> 
                                    Email
                                </label>
                    <input class="form-control" type="text" id="email" name="email" value="<?php echo $_SESSION['email'] ?>" required />
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-home"></i> Address</label>
                                <input class="form-control" type="text" id="address" name="address" value="<?php echo $_SESSION['address'] ?>" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-home"></i> Contact</label>
                                <input class="form-control" type="tel" id="contact" name="contact" value="<?php echo $_SESSION['contact'] ?>" required/>
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
                        <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-money-bill-1-wave"></i> Donation Amount</label>
                                <input class="form-control" type="number" id="amount" name="amount" placeholder="Enter Donation Amount" required />
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-6">
                            <div class="form-outline">
                              <label class="form-label" for="typeText"><i class="fa-solid fa-calendar"></i> Event</label>
                                <select class="form-control" id="event" name="event"required>
                                    <option disabled selected>Select an option</option>
                                    <option value="Baptismal">Baptismal</option>
                                    <option value="Communion">Communion</option>
                                    <option value="Confirmation">Confirmation</option>
                                    <option value="Funeral">Funeral</option>
                                    <option value="Thanks Giving">Thanks Giving</option>
                                    <option value="Wedding">Wedding</option>
                                </select>
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