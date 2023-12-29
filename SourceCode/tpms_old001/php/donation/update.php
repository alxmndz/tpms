<?php
  include_once 'dbconn.php';

  if (count($_POST) > 0) {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $donatedDate = $_POST['donatedDate'];
    $amount = $_POST['amount'];
    $event = $_POST['event'];
    $id = $_POST['id'];

      // Update the account type in the database
      mysqli_query($conn, "UPDATE donation SET name='$name',contact='$contact',email='$email',address='$address',donatedDate='$donatedDate',amount='$amount',event='$event' WHERE id='$id'");

       echo "<script type='text/javascript'>
        alert('Updated Successfully!');
        window.location = '../../admin.php';
      </script>";
  }

  $result = mysqli_query($conn, "SELECT * FROM donation WHERE id='" . $_GET['id'] . "'");
  $row = mysqli_fetch_array($result);
?>