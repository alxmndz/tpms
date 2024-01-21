<!-- Baptismal Modal-->
<div class="modal fade" id="baptismal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Baptismal Certificate Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="../../php/certificates/staff-baptism.php" method="POST" enctype="multipart/form-data" autocomplete="off">

          <div class="row my-3">
              <div class="col-md-12">
                 <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                      Name
                    </label>
                  <input class="form-control" type="text" id="fullname" name="fullname" placeholder="Enter your name" required />
                </div>
            </div>
          </div>

          <div class="row my-3">
            <div class="col-md-6">
              <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                    Father's Name
                  </label>
                  <input  class="form-control" type="text" name="fatherName" placeholder="Enter father's name" required>
                </div>
              </div>


              <div class="col-md-6">
                <div class="form-outline">
                     <label class="form-label fw-bold" for="typeText">
                      Mother's Name
                    </label>
                    <input  class="form-control" type="text" name="motherName" placeholder="Enter mother's name" required>
                  </div>
                </div>
            </div>

            <div class="row my-3">
              <div class="col-md-6">
                 <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                      Birth Place
                    </label>
                  <input class="form-control" type="text" id="birthPlace" name="birthPlace" placeholder="Enter your birthplace" required />
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                    Birth Date
                  </label>
                  <input class="form-control" type="date" id="birthDate" name="birthDate" required />
                </div>
              </div>
          </div>

          <div class="row my-3">
            <div class="col-md-12">
              <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                    Reserved Date
                  </label>
                  <input class="form-control" type="date" id="resDate" name="resDate" required />
                </div>
              </div>
          </div>

          <div class="row my-3">
              <div class="col-md-12">
                 <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                      Priest's Name
                    </label>
                  <input class="form-control" type="text" id="priest" name="priest" placeholder="Enter Priest's Name" required />
                </div>
            </div>
          </div>
 
           <div class="row my-3">
              <div class="col-md-6">
                <div class="form-outline">
                     <label class="form-label fw-bold" for="typeText">
                      Sponsor's Name
                    </label>
                    <input  class="form-control" type="text" name="sponsor1" placeholder="Enter sponsor's name" required>
                  </div>
                </div>


                <div class="col-md-6">
                  <div class="form-outline">
                       <label class="form-label fw-bold" for="typeText">
                        Sponsor's Name
                      </label>
                      <input  class="form-control" type="text" name="sponsor2" placeholder="Enter sponsor's name" required>
                    </div>
                  </div>
              </div>
        
        <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Submit</button>
        </form>

      </div>
    </div>
  </div>
</div>

<!-- Communion Modal-->
<div class="modal fade" id="communion">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Communion Certificate Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="../../php/certificates/staff-comm.php" method="POST" enctype="multipart/form-data" autocomplete="off">

          <div class="row my-3">
              <div class="col-md-12">
                 <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                      Name
                    </label>
                  <input class="form-control" type="text" id="fullname" name="fullname" placeholder="Enter your name" required />
                </div>
            </div>
          </div>

          <div class="row my-3">
            <div class="col-md-6">
              <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                    Father's Name
                  </label>
                  <input  class="form-control" type="text" name="fatherName" placeholder="Enter father's name" required>
                </div>
              </div>


              <div class="col-md-6">
                <div class="form-outline">
                     <label class="form-label fw-bold" for="typeText">
                      Mother's Name
                    </label>
                    <input  class="form-control" type="text" name="motherName" placeholder="Enter mother's name" required>
                  </div>
                </div>
            </div>

            <div class="row my-3">
              <div class="col-md-6">
                 <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                      Birth Place
                    </label>
                  <input class="form-control" type="text" id="birthPlace" name="birthPlace" placeholder="Enter your birthplace" required />
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                    Birth Date
                  </label>
                  <input class="form-control" type="date" id="birthDate" name="birthDate" required />
                </div>
              </div>
          </div>

          <div class="row my-3">
            <div class="col-md-12">
              <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                    Reserved Date
                  </label>
                  <input class="form-control" type="date" id="resDate" name="resDate" required />
                </div>
              </div>
          </div>

          <div class="row my-3">
              <div class="col-md-12">
                 <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                      Priest's Name
                    </label>
                  <input class="form-control" type="text" id="priest" name="priest" placeholder="Enter Priest's Name" required />
                </div>
            </div>
          </div>
 
           <div class="row my-3">
              <div class="col-md-6">
                <div class="form-outline">
                     <label class="form-label fw-bold" for="typeText">
                      Sponsor's Name
                    </label>
                    <input  class="form-control" type="text" name="sponsor1" placeholder="Enter sponsor's name" required>
                  </div>
                </div>


                <div class="col-md-6">
                  <div class="form-outline">
                       <label class="form-label fw-bold" for="typeText">
                        Sponsor's Name
                      </label>
                      <input  class="form-control" type="text" name="sponsor2" placeholder="Enter sponsor's name" required>
                    </div>
                  </div>
              </div>
        
        <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Submit</button>
        </form>

      </div>
    </div>
  </div>
</div>

<!-- Confirmation Modal-->
<div class="modal fade" id="confirmation">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Confirmation Certificate Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="../../php/certificates/staff-con.php" method="POST" enctype="multipart/form-data" autocomplete="off">

          <div class="row my-3">
              <div class="col-md-12">
                 <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                      Name
                    </label>
                  <input class="form-control" type="text" id="fullname" name="fullname" placeholder="Enter your name" required />
                </div>
            </div>
          </div>

          <div class="row my-3">
            <div class="col-md-6">
              <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                    Father's Name
                  </label>
                  <input  class="form-control" type="text" name="fatherName" placeholder="Enter father's name" required>
                </div>
              </div>


              <div class="col-md-6">
                <div class="form-outline">
                     <label class="form-label fw-bold" for="typeText">
                      Mother's Name
                    </label>
                    <input  class="form-control" type="text" name="motherName" placeholder="Enter mother's name" required>
                  </div>
                </div>
            </div>

            <div class="row my-3">
              <div class="col-md-6">
                 <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                      Birth Place
                    </label>
                  <input class="form-control" type="text" id="birthPlace" name="birthPlace" placeholder="Enter your birthplace" required />
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                    Birth Date
                  </label>
                  <input class="form-control" type="date" id="birthDate" name="birthDate" required />
                </div>
              </div>
          </div>

          <div class="row my-3">
            <div class="col-md-12">
              <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                    Reserved Date
                  </label>
                  <input class="form-control" type="date" id="resDate" name="resDate" required />
                </div>
              </div>
          </div>

          <div class="row my-3">
              <div class="col-md-12">
                 <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                      Priest's Name
                    </label>
                  <input class="form-control" type="text" id="priest" name="priest" placeholder="Enter Priest's Name" required />
                </div>
            </div>
          </div>
 
           <div class="row my-3">
              <div class="col-md-6">
                <div class="form-outline">
                     <label class="form-label fw-bold" for="typeText">
                      Sponsor's Name
                    </label>
                    <input  class="form-control" type="text" name="sponsor1" placeholder="Enter sponsor's name" required>
                  </div>
                </div>


                <div class="col-md-6">
                  <div class="form-outline">
                       <label class="form-label fw-bold" for="typeText">
                        Sponsor's Name
                      </label>
                      <input  class="form-control" type="text" name="sponsor2" placeholder="Enter sponsor's name" required>
                    </div>
                  </div>
              </div>
        
        <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Submit</button>
        </form>

      </div>
    </div>
  </div>
</div>

<!-- Death Certificate Modal-->
<div class="modal fade" id="funeral">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Death Certificate Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="../../php/certificates/staff-funeral.php" method="POST" enctype="multipart/form-data" autocomplete="off">
              <div class="row my-3">
                <div class="col-md-12">
                  <div class="form-outline">
                       <label class="form-label fw-bold" for="typeText">
                        Name (Firstname-Middle Initial-Surname)
                      </label>
                      <input class="form-control" type="text" id="deceasedName" name="deceasedName" placeholder="Enter the name of the deceased" required />
                    </div>
                  </div>
              </div>

              <div class="row my-3">
                <div class="col-md-6">
                  <div class="form-outline">
                       <label class="form-label fw-bold" for="typeText">
                        Father's name (Firstname-Middle Initial-Surname)
                      </label>
                      <input class="form-control" type="text" id="fName" name="fName" placeholder="Enter father's name" required />
                    </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-outline">
                       <label class="form-label fw-bold" for="typeText">
                          Mother's name (Firstname-Middle Initial-Surname)
                        </label>
                      <input class="form-control" type="tel" id="mName" name="mName" placeholder="Enter mother's name" required />
                    </div>
                </div>
              </div>

              <div class="row my-3">
                <div class="col-md-12">
                  <div class="form-outline">
                       <label class="form-label fw-bold" for="typeText">
                        Husband or Wife (Widowed of)
                      </label>
                      <input class="form-control" type="text" id="widow" name="widow" placeholder="Enter the widowed of the deceased" required />
                    </div>
                  </div>
              </div>

              <div class="row my-3">
                <div class="col-md-6">
                  <div class="form-outline">
                       <label class="form-label fw-bold" for="typeText">
                        Address
                      </label>
                      <input class="form-control" type="text" id="address" name="address" placeholder="Enter the address" required />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-outline">
                         <label class="form-label fw-bold" for="typeText">
                          Date of Death
                        </label>
                        <input class="form-control" type="date" id="deathDate" name="deathDate" required />
                      </div>
                  </div>
              </div>


              <div class="row my-3">
                <div class="col-md-6">
                 <div class="form-outline">
                       <label class="form-label fw-bold" for="typeText">
                          Age
                        </label>
                      <input class="form-control" type="number" id="age" name="age" placeholder="Enter age of the deceased" required />
                    </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-outline">
                       <label class="form-label fw-bold" for="typeText">
                        Internment
                      </label>
                      <input class="form-control" type="date" id="buryDate" name="buryDate" required />
                    </div>
                </div>
              </div>

              <div class="row my-3">
                <div class="col-md-12">
                  <div class="form-outline">
                       <label class="form-label fw-bold" for="typeText">
                          Cause of death
                        </label>
                      <input class="form-control" type="text" id="cause" name="cause" placeholder="Enter cause of death" required />
                    </div>
                  </div>
              </div>

              <div class="row my-3">
                <div class="col-md-12">
                    <div class="form-outline">
                        <label class="form-label fw-bold" for="typeText">
                            He / She received the last Sacrament before Death?
                        </label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sacrament" id="sacramentYes" value="Yes">
                                    <label class="form-check-label" for="sacramentYes">Yes</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sacrament" id="sacramentNo" value="No">
                                    <label class="form-check-label" for="sacramentNo">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-3">
                <div class="col-md-12">
                    <div class="form-outline">
                        <label class="form-label fw-bold" for="typeText">
                            He / She was not able to receive the last Sacraments before death?
                        </label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="lastsacrament" id="lastsacramentYes" value="Yes">
                                    <label class="form-check-label" for="lastsacramentYes">Yes</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="lastsacrament" id="lastsacramentNo" value="No">
                                    <label class="form-check-label" for="lastsacramentNo">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              <div class="row my-3">
                <div class="col-md-12">
                  <div class="form-outline">
                       <label class="form-label fw-bold" for="typeText">
                        Priest
                      </label>
                      <input class="form-control" type="text" id="priest" name="priest" placeholder="Enter the name of the priest" required />
                    </div>
                  </div>
              </div>

        <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Submit</button>
      </form>

      </div>
    </div>
  </div>
</div>
<script>
    // Add event listeners to toggle the opposite radio button
    function toggleRadioButtons(source, target) {
        document.getElementById(source).addEventListener('click', function () {
            document.getElementById(target).checked = this.checked;
        });
    }

    toggleRadioButtons('sacramentYes', 'lastsacramentNo');
    toggleRadioButtons('sacramentNo', 'lastsacramentYes');
    toggleRadioButtons('lastsacramentYes', 'sacramentNo');
    toggleRadioButtons('lastsacramentNo', 'sacramentYes');
</script>

<!-- Wedding Modal-->
<div class="modal fade" id="wedding">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Marriage Certificate Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="../../php/certificates/staff-wedd.php" method="POST" enctype="multipart/form-data" autocomplete="off">

          <div class="row my-3">
            <div class="col-md-6">
              <div class="form-outline">
                <input value="<?php echo $id?>" name="addedBy" style="display: none;" id="addedBy">
                   <label class="form-label fw-bold" for="typeText">
                    Groom (Firstname-Middle Initial-Surname)
                  </label>
                  <input  class="form-control" type="text" name="groom" placeholder="Enter the groom's name" required>
                </div>
              </div>

              <div class="col-md-6">
                 <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                      Bride (Firstname-Middle Initial-Surname)
                    </label>
                  <input class="form-control" type="text" id="bride" name="bride" placeholder="Enter the bride's name" required />
                </div>
            </div>
          </div>

          <div class="row my-3">
            <div class="col-md-12">
              <div class="form-outline">
                  <label class="form-label fw-bold" for="typeText">
                    Groom's Age
                  </label>
                  <input  class="form-control" type="number" name="gAge" placeholder="Enter the age"  required>
                </div>
              </div>
          </div>

          <div class="row my-3">
            <div class="col-md-12">
              <div class="form-outline">
                <label class="form-label fw-bold" for="typeText">
                      Bride's Age
                    </label>
                  <input class="form-control" type="number" name="bAge" placeholder="Enter the age"  required />
                </div>
              </div>
          </div>

          <div class="row my-3">
            <div class="col-md-6">
              <div class="form-outline">
                <label class="form-label fw-bold" for="typeText">
                    Groom's Marital Status
                  </label>
                  <input  class="form-control" type="text" name="maritalStatus" placeholder="Enter groom's marital status" required>   
              </div>
            </div>

              <div class="col-md-6">
                 <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                    Bride's Marital Status
                  </label>
                  <input  class="form-control" type="text" name="maritalStatus2" placeholder="Enter bride's marital status" required>
                </div>
            </div>
          </div>

          <div class="row my-3">
            <div class="col-md-6">
              <div class="form-outline">
                <label class="form-label fw-bold" for="typeText">
                    Groom's Nationality
                  </label>
                  <input  class="form-control" type="text" name="gNat" placeholder="Enter groom's Nationality" required>   
              </div>
            </div>

              <div class="col-md-6">
                 <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                    Bride's Nationality
                  </label>
                  <input  class="form-control" type="text" name="bNat" placeholder="Enter bride's Nationality" required>
                </div>
            </div>
          </div>

          <div class="row my-3">
            <div class="col-md-6">
              <div class="form-outline">
                <label class="form-label fw-bold" for="typeText">
                    Groom's Residence
                  </label>
                  <input  class="form-control" type="text" name="gResidence" placeholder="Enter groom's Residence" required>   
              </div>
            </div>

              <div class="col-md-6">
                 <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                    Bride's Residence
                  </label>
                  <input  class="form-control" type="text" name="bResidence" placeholder="Enter bride's Residence" required>
                </div>
            </div>
          </div>

          <div class="row my-3">
            <div class="col-md-6">
              <div class="form-outline">
                <label class="form-label fw-bold" for="typeText">
                    Groom's Father
                  </label>
                  <input  class="form-control" type="text" name="gFather" placeholder="Enter groom's Father" required>   
              </div>
            </div>

              <div class="col-md-6">
                 <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                    Groom's Mother
                  </label>
                  <input  class="form-control" type="text" name="gMother" placeholder="Enter groom's Mother" required>
                </div>
            </div>
          </div>

          <div class="row my-3">
            <div class="col-md-6">
              <div class="form-outline">
                <label class="form-label fw-bold" for="typeText">
                    Bride's Father
                  </label>
                  <input  class="form-control" type="text" name="bFather" placeholder="Enter groom's Father" required>   
              </div>
            </div>

              <div class="col-md-6">
                 <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                    Bride's Mother
                  </label>
                  <input  class="form-control" type="text" name="bMother" placeholder="Enter bride's Mother" required>
                </div>
            </div>
          </div>

          <div class="row my-3">
            <div class="col-md-12">
              <div class="form-outline">
                <label class="form-label fw-bold" for="typeText">
                    Married Date
                  </label>
                  <input  class="form-control" type="date" name="marriedDate" required>   
              </div>
            </div>
          </div>

          <div class="row my-3">
            <div class="col-md-12">
              <div class="form-outline">
                <label class="form-label fw-bold" for="typeText">
                    Priest Name
                  </label>
                  <input  class="form-control" type="priest" name="priest" placeholder="Enter Priest's name" required>   
              </div>
            </div>
          </div>

          <div class="row my-3">
            <div class="col-md-6">
              <div class="form-outline">
                <label class="form-label fw-bold" for="typeText">
                    Sponsor 1
                  </label>
                  <input  class="form-control" type="text" name="sponsor1" placeholder="Enter sponsor" required>   
              </div>
            </div>

              <div class="col-md-6">
                 <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                    Sponsor 2
                  </label>
                  <input  class="form-control" type="text" name="sponsor2" placeholder="Enter sponsor" required>
                </div>
            </div>
          </div>

              <button class="btn btn-success" type="submit" name="btn-save" id="btn-save" style="float: right;">Submit</button>
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
