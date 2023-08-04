<?php
  include_once 'dbconn.php';

  if (count($_POST) > 0) {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $type = $_POST['type'];
    $id = $_POST['id'];

    // Validate the type field
    if ($name === '' && $contact === '' && $email === '' && $address === '' && $type === '') {
      $response = array(
        'status' => 'error',
        'message' => 'Please complete filling the form'
      );
    } else {
      // Update the account type in the database
      mysqli_query($conn, "UPDATE users SET name='$name',contact='$contact',email='$email',address='$address',type='$type' WHERE id='$id'");

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

  $result = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $_GET['id'] . "'");
  $row = mysqli_fetch_array($result);
?>