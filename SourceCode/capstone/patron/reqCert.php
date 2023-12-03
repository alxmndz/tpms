<div class="container-fluid px-4" style="margin-top: 20px;">
	<div class="card">
		<div class="card-body">
			<h5 class="card-title"><i class="fa-solid fa-scroll"></i> Request Certificate</h5>
    	<hr>
			 <form class="" action="php/addReqCertPT.php" method="post" enctype="multipart/form-data" autocomplete="off">
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
                                <input class="form-control" type="text" id="name" name="name" value="<?php echo $_SESSION['name']?>" required readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText">
                                  <i class="fa-solid fa-phone"></i> 
                                    Contact Number
                                </label>
                    <input class="form-control" type="tel" id="contact" name="contact" value="<?php echo $_SESSION['contact']?>" required readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                      <div class="col-md-6" style="margin-top: 10px;">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-home"></i> Address</label>
                                <input class="form-control" type="text" id="address" name="address" value="<?php echo $_SESSION['address']?>" required readonly>
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-top: 10px;">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-calendar"></i> Type of Certificate</label>
                                <select class="form-select" id="event" name="event" required>
                                    <option disabled selected>Select a type of certificate</option>
                                    <option value="Baptismal Certificate">Baptismal Certificate</option>
                                    <option value="Communion Certificate">Communion Certificate</option>
                                    <option value="Confirmation Certificate">Confirmation Certificate</option>
                                    <option value="Death Certificate">Death Certificate</option>
                                    <option value="Marriage Certificate">Marriage Certificate</option>
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
