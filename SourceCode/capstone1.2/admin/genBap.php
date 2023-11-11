<!-- Baptismal Modal-->
<div class="modal fade" id="genBap">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Baptismal Certificate Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="php/.php" method="POST" enctype="multipart/form-data" autocomplete="off">

          <div class="row my-3">
              <div class="col-md-12">
                 <div class="form-outline">
                   <label class="form-label" for="typeText">
                    <i class="fa-solid fa-user"></i> 
                      Name
                    </label>
                  <input class="form-control" type="text" id="fullname" name="fullname" placeholder="Enter your name" required />
                </div>
            </div>
          </div>

          <div class="row my-3">
            <div class="col-md-6">
              <div class="form-outline">
                   <label class="form-label" for="typeText">
                    <i class="fa-solid fa-user"></i> 
                    Father's Name
                  </label>
                  <input  class="form-control" type="text" name="fatherName" placeholder="Enter father's name" required>
                </div>
              </div>


              <div class="col-md-6">
                <div class="form-outline">
                     <label class="form-label" for="typeText">
                      <i class="fa-solid fa-user"></i> 
                      Mother's Name
                    </label>
                    <input  class="form-control" type="text" name="motherName" placeholder="Enter mother's name" required>
                  </div>
                </div>
            </div>

            <div class="row my-3">
              <div class="col-md-6">
                 <div class="form-outline">
                   <label class="form-label" for="typeText">
                    <i class="fa-solid fa-house"></i> 
                      Birth Place
                    </label>
                  <input class="form-control" type="text" id="birthPlace" name="birthPlace" placeholder="Enter your birthplace" required />
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-outline">
                   <label class="form-label" for="typeText">
                    <i class="fa-solid fa-calendar-days"></i>
                    Birth Date
                  </label>
                  <input class="form-control" type="date" id="birthDate" name="birthDate" required />
                </div>
              </div>
          </div>

          <div class="row my-3">
            <div class="col-md-12">
              <div class="form-outline">
                   <label class="form-label" for="typeText">
                    <i class="fa-solid fa-calendar-days"></i>
                    Reserved Date
                  </label>
                  <input class="form-control" type="date" id="resDate" name="resDate" required />
                </div>
              </div>
          </div>

          <div class="row my-3">
              <div class="col-md-12">
                 <div class="form-outline">
                   <label class="form-label" for="typeText">
                    <i class="fa-solid fa-user"></i> 
                      Priest's Name
                    </label>
                  <input class="form-control" type="text" id="priest" name="priest" placeholder="Enter Priest's Name" required />
                </div>
            </div>
          </div>
 
           <div class="row my-3">
              <div class="col-md-6">
                <div class="form-outline">
                     <label class="form-label" for="typeText">
                      <i class="fa-solid fa-users"></i> 
                      Sponsor's Name
                    </label>
                    <input  class="form-control" type="text" name="sponsor1" placeholder="Enter sponsor's name" required>
                  </div>
                </div>


                <div class="col-md-6">
                  <div class="form-outline">
                       <label class="form-label" for="typeText">
                        <i class="fa-solid fa-users"></i> 
                        Sponsor's Name
                      </label>
                      <input  class="form-control" type="text" name="sponsor2" placeholder="Enter sponsor's name" required>
                    </div>
                  </div>
              </div>

          <div class="row my-3">
              <div class="col-md-12">
                <label class="form-label" for="status">
                    <i class="fa-solid fa-chart-simple"></i> 
                    Status
                  </label>
                 <div class="form-outline">
                  <select class="form-select" id="status" name="status">
                    <option disabled selected>Select a status</option>
                    <option value="Approved">Approved</option>
                    <option value="In Process">In Process</option>
                    <option value="Disapproved, Because mismatch files">Disapproved, Because mismatch files</option>
                  </select>
                </div>
            </div>
          </div>
        
        <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Submit</button>
        </form>

      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function limitDigits(input) {
  if (input.value.length > 11) {
    input.value = input.value.substring(0, 11);
  }
}
</script>