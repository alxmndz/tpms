<link rel="stylesheet" href="css/datatables.min.css">
<link rel="stylesheet" href="css/datatable.css">               
<div class="container" style="margin-top: 10px;">
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center">
        <span class="fs-5 fw-bold">Event List Details</span>
        <div class="ms-auto">
          <button type="button" class="btn btn-primary btn-sm"><i class="fa-solid fa-calendar-days"></i> Add Event</button>
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
              <td><?php echo $row["decription"]; ?></td>
            </tr>
            
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