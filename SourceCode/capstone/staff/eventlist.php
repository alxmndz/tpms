<link rel="stylesheet" href="css/datatables.min.css">
<link rel="stylesheet" href="css/datatable.css">               
<div class="container" style="margin-top: 10px;">
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center">
        <span class="fs-5 fw-bold">Event List Details</span>
        <div class="ms-auto">
          <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#evntLST"><i class="fa-solid fa-calendar-days"></i> Add Event</button>
        </div>
      </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped" style="margin-top: 10px;" id="eventListTBL">
          <?php
            include_once 'php/dbconn.php';
            $result = mysqli_query($conn, "SELECT * FROM eventlist ORDER BY id DESC;");  
            if (mysqli_num_rows($result) > 0) {
          ?>
          <thead>
            <tr>
              <th>Title</th>
              <th>Event Date</th>
              <th>Event Time</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="searchResults4">
            <?php
              $i = 0;
              while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
              <td><?php echo $row["title"]; ?></td>
              <td><?php echo date("M d, Y", strtotime($row["eventDate"])); ?></td>
              <td><?php echo date("h:i A", strtotime($row["eventTime"])); ?></td>
              <td><?php echo $row["description"]; ?></td>
              <td>
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#updateEvnt<?php echo $row['id']; ?>"> <i class="fa-solid fa-pen-to-square"></i> Update
                </button>
              </td>
            </tr>

<div class="modal fade" id="updateEvnt<?php echo $row['id']; ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Event List Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="php/updateEvntList.php" method="POST" enctype="multipart/form-data" autocomplete="off">

          <div class="row my-3">
              <div class="col-md-12">
                 <div class="form-outline">
                  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                   <label class="form-label fw-bold" for="typeText">
                      Event Title
                    </label>
                  <input class="form-control" type="text" id="evntTitle" name="evntTitle" value="<?php echo $row['title']; ?>" required />
                </div>
            </div>
          </div>

          <div class="row my-3">
            <div class="col-md-6">
              <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                    Event Date
                  </label>
                  <input class="form-control" type="date" name="eventDate" id="eventDate" value="<?php echo $row['eventDate']; ?>" required>
                </div>
              </div>


              <div class="col-md-6">
                <div class="form-outline">
                     <label class="form-label fw-bold" for="typeText">
                      Event Time
                    </label>
                    <input  class="form-control" type="time" name="eventTime" id="eventTime" value="<?php echo $row['eventTime']; ?>" required>
                  </div>
                </div>
            </div>

            <div class="row my-3">
              <div class="col-md-12">
                 <div class="form-outline">
                   <label class="form-label fw-bold" for="typeText">
                      Description
                    </label>
                  <input class="form-control" type="text" id="description" name="description" value="<?php echo $row['description']; ?>" required />
                </div>
            </div>
          </div>
        
        <button class="btn btn-success" name="btn-save" id="btn-save" style="float: right;">Submit</button>
        </form>

      </div>
    </div>
  </div>
</div>
            
            <?php
                $i++;
              }
            ?>
            <?php
              } else {
                echo "No result found";
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/datatables.min.js"></script>
    <script src="js/pdfmake.min.js"></script>
    <script src="js/vfs_fonts.js"></script>
    <script>
      $(document).ready(function(){
    
          var table = $('#eventListTBL').DataTable({
              
              buttons:['copy', 'csv', 'excel', 'pdf', 'print']
              
          });
          
          
          table.buttons().container()
          .appendTo('#example_wrapper .col-md-6:eq(0)');

      });
    </script>