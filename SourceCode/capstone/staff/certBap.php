  <link rel="stylesheet" href="css/datatables.min.css">
  <link rel="stylesheet" href="css/datatable.css">  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <div class="container-fluid" style="margin-top: 10px;">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center">
                    <i class="fa-solid fa-print"></i>
                    <span class="fs-5 fw-bold">Baptismal Certificate Status</span>
                    <div class="ms-auto">
                      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#genBap"><i class="fa-solid fa-pen-to-square"></i> Generate</button>
                      <div class="status-dropdown btn-group">
                        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="statusDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                          Filter by Status
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="statusDropdown">
                          <li><a class="dropdown-item filter-btn" data-status="all" href="#">All</a></li>
                          <li><a class="dropdown-item filter-btn" data-status="Approved" href="#">Approved</a></li>
                          <li><a class="dropdown-item filter-btn" data-status="Disapprove, mismatch files" href="#">Disapprove</a></li>
                          <li><a class="dropdown-item filter-btn" data-status="In Process" href="#">In Process</a></li>
                        </ul>
                      </div>
                    </div>
                </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped" style="margin-top: 10px;" id="certBapTbl">
            <?php
            include_once 'php/dbconn.php';
            $result = mysqli_query($conn, "SELECT * FROM certBap ORDER BY id DESC");
            if (mysqli_num_rows($result) > 0) {
            ?>
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                ?>
                  <tr>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo date("M d, Y", strtotime($row["generatedDate"])); ?></td>
                    <td>
                      <span class="status-badge <?php echo getStatusColorClass($row['status']); ?>">
                        <?php echo $row["status"]; ?>
                       </span>
                    </td>
                    <td>
                      <a type="button" class="btn btn-sm btn-primary" href="staff/previewBap.php?id=<?php echo $row["id"]; ?>"> <i class="fa-solid fa-pen-to-square"></i> Preview
                      </a>
                    </td>
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
    
          var table = $('#certBapTbl').DataTable({
              
              buttons:['copy', 'csv', 'excel', 'pdf', 'print']
              
          });
          
          
          table.buttons().container()
          .appendTo('#example_wrapper .col-md-6:eq(0)');

          $('.filter-btn').on('click', function () {
          var status = $(this).data('status');

          // Use a switch statement to handle each status separately
          switch (status) {
            case 'all':
              // Show all rows if 'All' is selected
              table.column(2).search('').draw();
              break;
            default:
              // Show rows based on the selected status
              table.column(2).search(status).draw();
              break;
          }
        });

      });
    </script>