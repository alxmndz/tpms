<div class="modal fade" id="addForms">
          <div class="modal-dialog ">
            <div class="modal-content">
              <section>
                <div class="container">
                  <div class="row justify-content-center align-items-center h-100">
                    <div class="card container h-100" style="background: #f1f1f1;">

                      <button type="button" id="btn1" class="btn-close" data-bs-dismiss="modal" style="margin-top: 10px; margin-left: 450px; float: left; cursor: pointer; " ></button>
                    <div class="card-body">
                      <h4>Request Forms</h4>
                      <hr>
                      <form class="" action="php/addforms.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <input value="<?php echo $id?>" name="addedBy" style="display: none;" id="addedBy" />
                        </div>
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
                                <label class="form-label" for="typeText"><i class="fa-solid fa-home"></i> Address</label>
                                <input class="form-control" type="text" id="address" name="address" placeholder="Enter address"  autocomplete="off" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-phone"></i> Contact Number</label>
                                <input class="form-control" type="text" id="mobilePhone" name="mobilePhone" placeholder="Enter contact number"  autocomplete="off" required />
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-envelope"></i> E-mail</label>
                                <input class="form-control" type="tel" id="email" name="email" placeholder="Enter email" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                              <label class="form-label" for="typeText"><i class="fa-solid fa-calendar"></i> Event</label>
                                <select class="form-control" id="formType" name="formType"required>
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
                    <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-money-bill-1-wave"></i> Reference Number</label>
                                <input class="form-control" type="text" id="refNum" name="refNum" placeholder="Enter reference number" autocomplete="off" required>
                            </div>
                        </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-money-bill-1-wave"></i>Amount Price</label>
                                <input class="form-control" type="text" id="amount" name="amount" placeholder="Enter amount" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                                        
                    <div class="row my-3">
                        <div class="col-md-6">
                            <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-receipt"></i>
                                  Receipt
                                </label>
                                <input class="form-control"type="file"id="receiptIMG" name="receiptIMG"placeholder="Pick receipt" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-heart"></i> Status</label>
                                    <select class="form-control" id="status" name="status" required>
                                      <option value=""></option>
                                      <option value="Disapproved">Disapproved</option>
                                      <option value="Approved">Approved</option>
                                      <option value="Pending">Pending</option>
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
                </div>
              </section>
            </div>
          </div>
        </div>

        <div class="modal fade" id="addReport">
          <div class="modal-dialog ">
            <div class="modal-content">
              <section>
                <div class="container">
                  <div class="row justify-content-center align-items-center h-100">
                    <div class="card container h-100" style="background: #f1f1f1;">

                      <button type="button" id="btn1" class="btn-close" data-bs-dismiss="modal" style="margin-top: 25px; margin-left: 450px; float: left; cursor: pointer; " ></button>
                    <div class="card-body">
                      <h4>Report</h4>
                      <hr>
                      <form class="" action="php/report/save.php" method="post">
                            <div class="md-3">
                              <p>
                                <i class="fa-solid fa-pen"></i> 
                                  Title
                                <input class="form-control" type="text" id="reportTitle" name="reportTitle" autocomplete="off" placeholder="Report Title" required>
                              </p>
                              <p>
                                <i class="fa-solid fa-calendar-days" class="form-control"></i> 
                                  Date
                                <input type="date"  class="form-control datetime" id="reportDate" name="reportDate" autocomplete="off" required>
                              </p>
                              <p>
                                <i class="fa-solid fa-business-time"></i>
                                  Time
                                <input type="time"  class="form-control" id="reportTime" name="reportTime" autocomplete="off" required>
                              </p>
                                                
                            </div>

                          <div class="md-3">
                            <div class="mb-3">
                                <p>
                                  <i class="fa-solid fa-circle-info"></i>
                                    Description
                                    <input type="text"  class="form-control" id="description" name="description" autocomplete="off" placeholder="Description" required>
                                </p>    
                            </div>
                            <div class="mb-3">
                                <p>
                                  <i class="fa-solid fa-calendar"></i>
                                    Event Type
                                    <select class="form-control" id="type" name="type">
                                      <option value=""></option>
                                      <option value="Baptismal">Baptismal</option>
                                      <option value="Blessing">Blessing</option>
                                      <option value="Communion">Communion</option>
                                      <option value="Confirmation">Confirmation</option>
                                      <option value="Funeral">Funeral</option>
                                      <option value="Wedding">Wedding</option>
                                    </select>
                                </p>    
                            </div>  

                            <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Submit</button>  
                        </div>
                                                 
                      </form>
                                          
                    </div>

                  </div> 
                  </div>
                </div>
              </section>
            </div>
          </div>
        </div>

          <div class="modal fade" id="addAnnounce" >
            <div class="container">
              <div class="modal-dialog">
                 <div class="modal-content">
                   <section>
                                 <div class="container">
                                   <div class="row align-items-center h-100">
                                     <div class="card container h-100" style="background: #FFFFFF;">

                                        <button type="button" id="btn1" class="btn-close" data-bs-dismiss="modal" style="margin-top: 25px; margin-left: 450px; float: right; cursor: pointer; " ></button>
                                      <div class="card-body">
                                        <h4>Announcements</h4>
                                        <hr>
                                        <form class="" action="php/announcement/save.php" method="POST">

                                              <div class="md-3" style="margin-bottom: 10px;">
                                                <p>
                                                  <i class="fa-solid fa-pen"></i>
                                                   Title
                                                    <input class="form-control" type="text" id="announceTitle" name="announceTitle" placeholder="Enter the announcement title" required>
                                                </p>
                                                <p>
                                                  <i class="fa-solid fa-calendar-days" class="form-control"></i>
                                                   Date
                                                  <input type="date"  class="form-control datetime" name="announceDate" required>
                                                </p>
                                                <p>
                                                  <i class="fa-solid fa-business-time"></i>
                                                   Time
                                                  <input type="time"  class="form-control" name="announceTime" required>
                                                </p>
                                                
                                              </div>
                                              <div class="md-3">
                                                  <div class="md-3">
                                                      <p><i class="fa-solid fa-pen-to-square"></i> Description
                                                        <textarea class="form-control" name="announceDesc" id="announceDesc" required></textarea>
                                                  </p>
                                                </p>
                                              </div>
                                              <div class="md-3">
                                              </div>
                                              <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Submit</button>
                                          </div>  
                                        </form>
                                      </div>
                                    </div> 
                                   </div>
                                 </div>
                                </section>
                              </div>             
                            </div> 
                          </div>         
                        </div>

        <div class="modal fade" id="addRes">
          <div class="modal-dialog ">
            <div class="modal-content">
              <section>
                <div class="container">
                  <div class="row justify-content-center align-items-center h-100">
                    <div class="card container h-100" style="background: #f1f1f1;">

                      <button type="button" id="btn1" class="btn-close" data-bs-dismiss="modal" style="margin-top: 25px; margin-left: 450px; float: left; cursor: pointer; " ></button>
                    <div class="card-body">
                      <h1>Reservation</h1>
                      <hr>

                      <form class="" action="php/addReserve.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <input value="<?php echo $id?>" name="addedBy" style="display: none;" id="addedBy" />
                        </div>
                            <div class="row my-3">
                          <div class="col-md-6">
                              <div class="form-outline">
                                  <label class="form-label" for="typeText">
                                    <i class="fa-solid fa-user"></i> 
                                    Full name
                                  </label>
                                <input class="form-control" type="text" id="name" name="name" placeholder="Enter your name"  autocomplete="off" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText">
                                  <i class="fa-solid fa-calendar-days"></i> 
                                    Event
                                </label>
                                <select class="form-control" id="eventName" name="eventName" required>
                                    <option value=""></option>
                                    <option value="Baptismal">Baptismal</option>
                                    <option value="Blessing">Blessing</option>
                                    <option value="Communion">Communion</option>
                                    <option value="Confirmation">Confirmation</option>
                                    <option value="Funeral">Funeral</option>
                                    <option value="Wedding">Wedding</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-calendar"></i> Date</label>
                                <input class="form-control" type="date" id="eventDate" name="eventDate"  autocomplete="off" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fas fa-clock"></i> Time</label>
                                <input class="form-control" type="time" id="eventTime" name="eventTime"  autocomplete="off" required />
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-phone"></i> Contact</label>
                                <input class="form-control" type="text" id="contactNum" name="contactNum" placeholder="Enter contact number" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                              <label class="form-label" for="typeText">
                                <i class="fa-solid fa-envelope"></i>
                                  Email
                                </label>
                                <input class="form-control"type="text"id="email" name="email"placeholder="Enter email" required>
                            </div>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-md-12">
                          <div class="form-outline">
                              <label class="form-label" for="typeText"><i class="fa-solid fa-home"></i> Address</label>
                                <input class="form-control" type="text" id="address" name="address" placeholder="Enter address" autocomplete="off" required>
                            </div>
                        </div>

                      <div class="col-md-12">
                        <div class="form-outline">
                            <label class="form-label" for="typeText"><i class="fa-solid fa-users"></i> Sponsor</label>
                            <input class="form-control" type="text" id="sponsored" name="sponsored" placeholder="Enter sponsor" autocomplete="off" required>
                          </div>
                      </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText">
                                  <i class="fa-solid fa-box"></i> 
                                    Package
                                </label>
                                <select class="form-control" id="package" name="package" required>
                                    <option value=""></option>
                                    <option value="Baptismal">Baptismal</option>
                                    <option value="Blessing">Blessing</option>
                                    <option value="Communion">Communion</option>
                                    <option value="Confirmation">Confirmation</option>
                                    <option value="Funeral">Funeral</option>
                                    <option value="Wedding">Wedding</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-money-bill-1-wave"></i> Amount Price</label>
                                <input class="form-control" type="text" id="amount" name="amount" placeholder="Enter amount" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                                        
                      <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText"><i class="fa-solid fa-heart"></i> Status</label>
                                    <select class="form-control" id="status" name="status" required>
                                      <option value=""></option>
                                      <option value="Disapproved">Disapproved</option>
                                      <option value="Approved">Approved</option>
                                      <option value="Pending">Pending</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                      <div class="row my-3">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <label class="form-label" for="typeText">
                                <i class="fa-solid fa-folder-open"></i>
                                  Credential
                                </label>
                                <input class="form-control" type="file" id="credentialfile" name="credentialfile" required>
                            </div>
                        </div>

                        <div class="form-group mb-2">             
                          <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right; margin-top: 10px;">Submit</button>  
                        </div>
                                                 
                      </form>
                                          
                    </div>

                  </div> 
                  </div>
                </div>
              </section>
            </div>
          </div>
        </div>