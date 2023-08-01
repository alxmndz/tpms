<div class="container-fluid" style="margin-top: 10px;">
				<div class="card">
					<div class="card-header">
						<i class="fa-solid fa-calendar-plus"></i>
						Create an Event
					</div>
					<div class="card-body">
						<form class="" action="php/eventlist/save.php" method="post" enctype="multipart/form-data" autocomplete="off">
							<div class="row my-3">
	                          <div class="col-md-6">
	                              <div class="form-outline">
	                                  <label class="form-label" for="typeText">
	                                    <i class="fa-regular fa-calendar"></i>
	                                    Event Title
	                                  </label>
	                                <input type="text" name="title" class="form-control" placeholder="Enter Event Title" required>
	                            </div>
	                        </div>
	                        <div class="col-md-6">
	                            <div class="form-outline">
	                                <label class="form-label" for="typeText">
	                                  <i class="fa-solid fa-calendar-day"></i>
	                                    Event Day
	                                </label>
	                    			<select type="text" name="eventday" class="form-control" required>
										<option disabled>Select an option</option>
										<option value="Monday">Monday</option>
										<option value="Tuesday">Tuesday</option>
										<option value="Wednesday">Wednesday</option>
										<option value="Thursday">Thursday</option>
										<option value="Friday">Friday</option>
										<option value="Saturday">Saturday</option>
										<option value="Sunday">Sunday</option>
									</select>
	                            </div>
	                        </div>
	                    </div>

	                    <div class="row my-3">
	                          <div class="col-md-6">
	                              <div class="form-outline">
	                                  <label class="form-label" for="typeText">
	                                    <i class="fa-regular fa-clock"></i>
	                                    Start Time
	                                  </label>
	                                <input type="time" name="start" class="form-control" required>
	                            </div>
	                        </div>
	                        <div class="col-md-6">
	                            <div class="form-outline">
	                                <label class="form-label" for="typeText">
	                                  <i class="fa-solid fa-clock"></i>
	                                    End Time
	                                </label>
	                    			<input type="time" name="endtime" class="form-control" required>
	                            </div>
	                        </div>
	                    </div>

							<div class="row my-3">
		                        <div class="col-md-12">
		                            <div class="form-outline">
		                                <label class="form-label" for="typeText"><i class="fa-solid fa-location-dot"></i> Location</label>
		                                <input type="text" name="location" class="form-control" placeholder="Enter Event Location" required>
		                            </div>
		                        </div>
		                    </div>

		                    <div class="row my-3">
	                          <div class="col-md-6">
	                              <div class="form-outline">
	                                  <label class="form-label" for="typeText">
	                                    <i class="fa-solid fa-pen-nib"></i>
	                                    Event Description
	                                  </label>
	                                <input type="text" name="description" class="form-control" placeholder="Enter Event Description" required>
	                            </div>
	                        </div>
	                        <div class="col-md-6">
	                            <div class="form-outline">
	                                <label class="form-label" for="typeText">
	                                  <i class="fa-solid fa-calendar-day"></i>
	                                    Day Number
	                                </label>
	                    			<input type="number" name="daynumber" class="form-control" placeholder="Enter Day Number" required>
	                            </div>
	                        </div>
	                    </div>
							

						<div class="row my-3">
		                    <div class="col-md-12">
		                        <div class="form-outline">
		                             <label class="form-label" for="typeText"><i class="fa-solid fa-calendar-days"></i> Month</label>
		                             <select type="text" name="month" class="form-control" required>
										<option disabled>Select event month</option>
										<option value="JAN">January</option>
										<option value="FEB">February</option>
										<option value="MAR">March</option>
										<option value="APR">April</option>
										<option value="MAY">May</option>
										<option value="JUN">June</option>
										<option value="JUL">July</option>
										<option value="AUG">August</option>
										<option value="SEP">September</option>
										<option value="OCT">October</option>
										<option value="NOV">November</option>
										<option value="DEC">December</option>
									</select>
		                        </div>
		                    </div>
		                </div>	
		                <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Submit</button>  
						</form>
					</div>
				</div>
			</div>