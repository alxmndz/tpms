<?php
  include_once 'dbconn.php';

  if (count($_POST) > 0) {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $event = $_POST['event'];
    $amount = $_POST['amount'];
    $status = $_POST['status'];
    $id = $_POST['id'];

      // Update the account type in the database
      mysqli_query($conn, "UPDATE request SET name='$name',contact='$contact',email='$email',address='$address',event='$event',status='$status',amount='$amount' WHERE id='$id'");

       echo "<script type='text/javascript'>
        alert('Request Updated!');
        window.location = '../../admin.php';
      </script>";
  }

  $result = mysqli_query($conn, "SELECT * FROM request WHERE id='" . $_GET['id'] . "'");
  $row = mysqli_fetch_array($result);
?>