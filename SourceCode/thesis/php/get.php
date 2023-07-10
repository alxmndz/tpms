<?php
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "thesis"; 

    $mysqli = new mysqli($servername, $username, $password, $dbname);

    if ($mysqli->connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli->connect_error;
      exit();
    }

    
    $sql = "SELECT * FROM accounts";

   
    $results = $mysqli->query($sql);

    
    $row = $results->fetch_all(MYSQLI_ASSOC);

    
    $results->free_result();

    
    $mysqli->close();

    echo json_encode($row);
?>