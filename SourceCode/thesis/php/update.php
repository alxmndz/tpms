<?php
    $request = $_REQUEST; 
    $reportID = $request['reportID']; 
    $email = $request['email']; 
    $fname = $request['fname']; 
    $lname = $request['lname'];
    $type = $request['type'];

    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "thesis"; 

    $mysqli = new mysqli($servername, $username, $password, $dbname);

    if ($mysqli->connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli->connect_error;
      exit();
    }

    $sql = "UPDATE accounts SET email='".$email."', first_name='".$first_name."', last_name='".$last_name."', type='".$type."' WHERE reportID='".$reportID."'";

    if ($mysqli->query($sql)) {
      echo "Sucessfully Updated.";
    } else {
      return "Error: " . $sql . "<br>" . $mysqli->error;
    }


    $mysqli->close();
?>