<?php
include "../php/dbconn.php";

// Queries for counting events without specifying the month and year
$query1 = "SELECT COUNT(event) AS countReq1 FROM request WHERE event = 'Baptismal Certificate'";
$query2 = "SELECT COUNT(event) AS countReq2 FROM request WHERE event = 'Communion Certificate'";
$query3 = "SELECT COUNT(event) AS countReq3 FROM request WHERE event = 'Confirmation Certificate'";
$query4 = "SELECT COUNT(event) AS countReq4 FROM request WHERE event = 'Death Certificate'";
$query5 = "SELECT COUNT(event) AS countReq5 FROM request WHERE event = 'Marriage Certificate'";

$result1 = mysqli_query($conn, $query1);
$result2 = mysqli_query($conn, $query2);
$result3 = mysqli_query($conn, $query3);
$result4 = mysqli_query($conn, $query4);
$result5 = mysqli_query($conn, $query5);

$data1 = mysqli_fetch_array($result1);
$data2 = mysqli_fetch_array($result2);
$data3 = mysqli_fetch_array($result3);
$data4 = mysqli_fetch_array($result4);
$data5 = mysqli_fetch_array($result5);

// Store counts in an array
$requestCounts = [$data1['countReq1'], $data2['countReq2'], $data3['countReq3'], $data4['countReq4'], $data5['countReq5']];

// Close the database connection
mysqli_close($conn);
?>
