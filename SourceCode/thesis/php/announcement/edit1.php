<?php
  include_once 'dbconn.php';
  if (count($_POST) > 0) {
    mysqli_query($conn, "UPDATE announcements SET announceTitle='" . $_POST['announceTitle'] . "', announceDate ='" . $_POST['announceDate'] . "', announceTime ='" . $_POST['announceTime'] . "', announceDesc ='" . $_POST['announceDesc'] . "' WHERE announceID='" . $_POST['announceID'] . "'");
    $message = "Announcement Updated Successfully";
    echo json_encode($message);
    exit();
  }

  $result = mysqli_query($conn, "SELECT * FROM announcements WHERE announceID='" . $_GET['announceID'] . "'");
  $row = mysqli_fetch_array($result);
?>

<?php include "header.php"; ?>
</head>
<body>
  <div class="modal d-flex justify-content-center" style="margin-top: 50px;">
    <div class="container">
      <div class="modal-dialog">
        <div class="modal-content">
          <section>
            <div class="container">
              <div class="row align-items-center h-100">
                <div class="card container h-100" style="background: #FFFFFF;">
                  <a href="../../staff.php">
                    <button type="button" id="btn1" class="btn-close" data-bs-dismiss="modal" style="margin-top: 25px; margin-left: 1230px; float: right; cursor: pointer; "></button>
                  </a>
                  <div class="card-body">
                    <h4>
                      <b>
                        Announcements
                      </b>
                    </h4>
                    <hr>
                    <form class="" id="updateForm" method="POST">
                      <div class="md-3">
                        <p class="alert">
                          <span id="message"><?php if (isset($message)) { echo $message; } ?></span>
                        </p>
                        <p>
                          <input type="hidden" name="announceID" class="form-control" value="<?php echo $row['announceID']; ?>">
                        </p>
                        <p>
                          <i class="fa-solid fa-pen"></i>
                          Title
                          <input class="form-control" type="text" id="announceTitle" name="announceTitle" value="<?php echo $row['announceTitle']; ?>" required>
                        </p>
                        <p>
                          <i class="fa-solid fa-calendar-days" class="form-control"></i>
                          Date
                          <input type="date" class="form-control datetime" name="announceDate" value="<?php echo $row['announceDate']; ?>" required>
                        </p>
                        <p>
                          <i class="fa-solid fa-business-time"></i>
                          Time
                          <input type="time" class="form-control" name="announceTime" value="<?php echo $row['announceTime']; ?>" required>
                        </p>
                      </div>
                      <div class="md-3">
                        <div class="md-3">
                          <p><i class="fa-solid fa-pen-to-square"></i> Description
                            <input type="text" name="announceDesc" class="form-control" value="<?php echo $row['announceDesc']; ?>" required>
                          </p>
                          </p>
                        </div>
                        <div class="md-3">
                        </div>
                        <button type="submit" name="submit" value="Submit" class="btn btn-primary" style="float: right;">Submit</button>
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
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  // Submit form using AJAX
  document.getElementById("updateForm").addEventListener("submit", function (event) {
    event.preventDefault();
    var form = event.target;
    var formData = new FormData(form);

    // Send AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "", true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);
          if (response) {
            swal("Success", response, "success").then(function () {
              window.location.href = "../../staff.php";
            });
          }
        } else {
          swal("Error", "An error occurred while updating the announcement", "error");
        }
      }
    };
    xhr.send(formData);
  });
</script>
</body>
</html>
