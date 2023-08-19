<style type="text/css">
  @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
  *{
    font-family: "Poppins", sans-serif;
  }
</style>
<div class="container-fluid px-4" style="margin-top: 20px;">
	<div class="card">
		<div class="card-body">
			<h5 class="card-title"><i class="fa-solid fa-scroll" style="color: #2E86C1;"></i> Request Certificate</h5>
    	<hr>
			 <form class="" action="php/addreq.php" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="form-group">
                    <input value="<?php echo $id?>" name="addedBy" style="display: none;" id="addedBy">
                  </div>
                        <div class="row my-3">
                          <div class="col-md-6">
                              <div class="form-outline">
                                  <label class="form-label" for="typeText">
                                    <i class="fa-solid fa-user"></i> 
                                    Name
                                  </label>
                                <input class="form-control" type="text" id="name" name="name" value="<?php echo $_SESSION['name']?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText">
                                  <i class="fa-solid fa-phone"></i> 
                                    Contact Number
                                </label>
                    <input class="form-control" type="tel" id="contact" name="contact" value="<?php echo $_SESSION['contact']?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-envelope"></i> Email</label>
                                <input class="form-control" type="text" id="email" name="email" value="<?php echo $_SESSION['email']?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                      <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-home"></i> Address</label>
                                <input class="form-control" type="text" id="address" name="address" value="<?php echo $_SESSION['address']?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-calendar"></i> Event</label>
                                <select class="form-control" id="event" name="event" required>
                                    <option disabled selected> Select an event</option>>
                                    <option value="Baptismal Certificate">Baptismal Certificate</option>
                                    <option value="Communion Certificate">Communion Certificate</option>
                                    <option value="Confirmation Certificate">Confirmation Certificate</option>
                                    <option value="Death Certificate">Death Certificate</option>
                                    <option value="Marriage Certificate">Marriage Certificate</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-money-bill-1-wave"></i> Amount Price</label>
                                <input class="form-control" type="number" id="amount" name="amount" placeholder="Enter amount" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-receipt"></i>
                                  Receipt
                                </label>
                                <input class="form-control" type="file" id="receipt" name="receipt" required>
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