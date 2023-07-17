<?php
  include_once 'dbconn.php';

  if (count($_POST) > 0) {
    $type = $_POST['type'];
    $user_id = $_POST['user_id'];

    // Validate the type field
    if ($type === '') {
      $response = array(
        'status' => 'error',
        'message' => 'Please select an account type'
      );
    } else {
      // Update the account type in the database
      mysqli_query($conn, "UPDATE accounts SET type='$type' WHERE user_id='$user_id'");

      $response = array(
        'status' => 'success',
        'message' => 'Updated successfully'
      );
    }

    // Encode the response array as JSON
    $jsonResponse = json_encode($response);

    // Output the JSON response
    echo $jsonResponse;
    exit;
  }

  $result = mysqli_query($conn, "SELECT * FROM accounts WHERE user_id='" . $_GET['user_id'] . "'");
  $row = mysqli_fetch_array($result);
?>

<?php include "header.php"; ?>
<body>
  <div class="modal d-flex justify-content-center" style="margin-top: 100px;">
    <div class="container">
      <div class="modal-dialog">
        <div class="modal-content">
          <section>
            <div class="container">
              <div class="row align-items-center h-100">
                <div class="card container h-100" style="background: #FFFFFF;">
                  <a href="../../dashboard.php">
                    <button type="button" id="btn1" class="btn-close" data-bs-dismiss="modal" style="margin-top: 15px; margin-left: 1230px; float: right; cursor: pointer;"></button>
                  </a>
                  <div class="card-body">
                    <h4>
                      <b>Edit Accounts</b>
                    </h4>
                    <hr>

                    <form id="updateForm" class="" action="" method="POST">
                      <div class="md-3">
                        <p>
                          <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['user_id']; ?>">
                        </p>
                        <p>
                          <i class="fa-solid fa-user"></i>
                          Firstname
                          <input class="form-control" type="text" id="fname" name="fname" value="<?php echo $row['fname']; ?>">
                        </p>
                        <p>
                          <i class="fa-solid fa-user" class="form-control"></i>
                          Lastname
                          <input type="text" class="form-control datetime" name="lname" value="<?php echo $row['lname']; ?>">
                        </p>
                        <p>
                          <i class="fa-solid fa-envelope"></i>
                          Email
                          <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>" disabled>
                        </p>
                        <p>
                          <i class="fa-solid fa-users"></i>
                          Account Type
                          <select class="form-control" id="type" name="type">
                            <option value=""></option>
                            <option value="admin">Admin</option>
                            <option value="staff">Staff</option>
                            <option value="patron">Patron</option>
                          </select>
                        </p>
                      </div>
                      <div class="md-3"></div>
                      <button type="submit" name="submit" value="Submit" class="btn btn-primary" style="float: right;">Submit</button>
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

  <!-- Include the SweetAlert library -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    // Use AJAX to submit the form data
    document.getElementById('updateForm').addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent the form from submitting normally

      // Create a new FormData object and append form data to it
      var formData = new FormData(this);

      // Send an AJAX request
      var xhr = new XMLHttpRequest();
      xhr.open('POST', '');
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);

          // Display SweetAlert notification based on the response
          Swal.fire({
            icon: response.status === 'success' ? 'success' : 'error',
            title: response.message,
            showConfirmButton: false,
            timer: 1500
          }).then(function() {
            if (response.status === 'success') {
              window.location.href = '../../dashboard.php';
            }
          });
        }
      };
      xhr.send(formData);
    });
  </script>
</body>
</html>
