<div class="container-fluid px-4">
    <div class="card">
  <div class="card-body">
    <h1 class="card-title">Reservation</h1>
    <hr>
    <form action="php/addreserve2.php" method="post" enctype="multipart/form-data">
      <div class="row my-3">
        <div class="col-md-6">
          <div class="form-group">
            <label for="name"><i class="fa-solid fa-user"></i> Full name</label>
            <input class="form-control" type="text" id="name" name="name" placeholder="Enter your name" autocomplete="off" required />
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="eventName"><i class="fa-solid fa-calendar-days"></i> Event</label>
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
          <div class="form-group">
            <input value="<?php echo $id?>" name="addedBy" style="display: none;" id="addedBy" />
          </div>
      <div class="row my-3">
        <div class="col-md-12">
          <div class="form-group">
            <label for="eventDate"><i class="fa-solid fa-calendar"></i> Date</label>
            <input class="form-control" type="date" id="eventDate" name="eventDate" autocomplete="off" required />
          </div>
        </div>
      </div>
      <div class="row my-3">
        <div class="col-md-12">
          <div class="form-group">
            <label for="eventTime"><i class="fas fa-clock"></i> Time</label>
            <input class="form-control" type="time" id="eventTime" name="eventTime" autocomplete="off" required />
          </div>
        </div>
      </div>
      <div class="row my-3">
        <div class="col-md-6">
          <div class="form-group">
            <label for="contactNum"><i class="fa-solid fa-phone"></i> Contact</label>
            <input class="form-control" type="text" id="contactNum" name="contactNum" placeholder="Enter contact number" autocomplete="off" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="email"><i class="fa-solid fa-envelope"></i> Email</label>
            <input class="form-control" type="text" id="email" name="email" placeholder="Enter email" required>
          </div>
        </div>
      </div>
      <div class="row my-3">
        <div class="col-md-12">
          <div class="form-group">
            <label for="address"><i class="fa-solid fa-home"></i> Address</label>
            <input class="form-control" type="text" id="address" name="address" placeholder="Enter address" autocomplete="off" required>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label for="sponsored"><i class="fa-solid fa-users"></i> Sponsor</label>
            <input class="form-control" type="text" id="sponsored" name="sponsored" placeholder="Enter sponsor" autocomplete="off" required>
          </div>
        </div>
      </div>
      <div class="row my-3">
        <div class="col-md-6">
          <div class="form-group">
            <label for="package"><i class="fa-solid fa-box"></i> Package</label>
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
          <div class="form-group">
            <label for="amount"><i class="fa-solid fa-money-bill-1-wave"></i> Amount Price</label>
            <input class="form-control" type="text" id="amount" name="amount" placeholder="Enter amount" autocomplete="off" required>
          </div>
        </div>
      </div>
      
      <div class="row my-3">
        <div class="col-md-12">
          <div class="form-group">
            <label for="credentialfile"><i class="fa-solid fa-folder-open"></i> Credential</label>
            <input class="form-control" type="file" id="credentialfile" name="credentialfile" required>
          </div>
        </div>
      </div>
      <div class="form-group mb-2">
        <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right; margin-top: 10px;">Submit</button>
      </div>
    </form>
  </div>
</div>
                    
</div>