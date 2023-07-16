<div class="container-fluid px-4">
	<div class="card">
		<div class="card-body">
			<h1 class="card-title">Donation</h1>
    	<hr>
			 <form class="" action="php/donate.php" method="post" enctype="multipart/form-data">
                        <div class="row my-3">
                          <div class="col-md-6">
                              <div class="form-outline">
                                  <label class="form-label" for="typeText">
                                    <i class="fa-solid fa-user"></i> 
                                    First name
                                  </label>
                                <input class="form-control" type="text" id="fname" name="fname" placeholder="Enter firstname"  autocomplete="off" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText">
                                  <i class="fa-solid fa-user"></i> 
                                    Lastname
                                </label>
                    <input class="form-control" type="text" id="lname" name="lname" placeholder="Enter lastname" autocomplete="off" required />
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-phone"></i> Contact Number</label>
                                <input class="form-control" type="text" id="contact" name="contact" placeholder="Enter Contact Number"  autocomplete="off" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-hashtag"></i> Reference Number</label>
                                <input class="form-control" type="text" id="refNum" name="refNum" placeholder="Enter Reference Number"  autocomplete="off" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-money-bill-1-wave"></i> Donation Amount</label>
                                <input class="form-control" type="text" id="donateAmount" name="donateAmount" placeholder="Enter Donation"  autocomplete="off" required />
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-envelope"></i> Date</label>
                                <input class="form-control" type="date" id="donateDate" name="donateDate" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-receipt"></i>
                                  Receipt
                                </label>
                                <input class="form-control"type="file"id="donateReceipt" name="donateReceipt" required>
                            </div>
                        </div>
                    </div>             
                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                              <label class="form-label" for="typeText"><i class="fa-solid fa-calendar"></i> Event</label>
                                <select class="form-control" id="donateEvent" name="donateEvent"required>
                                    <option value=""></option>
                                    <option value="Baptismal">Baptismal</option>
                                    <option value="Communion">Communion</option>
                                    <option value="Confirmation">Confirmation</option>
                                    <option value="Funeral">Funeral</option>
                                    <option value="Wedding">Wedding</option>
                                </select>
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