<?php
  include_once '../dbconn.php';

  if (count($_POST) > 0) {
    $baptismal = $_POST['baptismal'];
    $blessing = $_POST['blessing'];
    $communion = $_POST['communion'];
    $confirmation = $_POST['confirmation'];
    $funeralmass = $_POST['funeralmass'];
    $wedding = $_POST['wedding'];
    $cert = $_POST['cert'];
    $id = $_POST['id'];

      // Update the account type in the database
      mysqli_query($conn, "UPDATE eventsprice SET baptismal='$baptismal',blessing='$blessing',communion='$communion',confirmation='$confirmation',funeralmass='$funeralmass',wedding='$wedding',cert='$cert' WHERE id='$id'");

       echo "<script type='text/javascript'>
        alert('Events Prices Updated Successfully!');
        window.location = '../../admin.php';
      </script>";
  }

  $result = mysqli_query($conn, "SELECT * FROM eventsprice WHERE id='" . $_GET['id'] . "'");
  $row = mysqli_fetch_array($result);
?>