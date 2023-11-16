<?php
  include "php/dbconn.php";

  // Define an array to map numerical months to month names
  $monthNames = [
    1 => 'January',
    2 => 'February',
    3 => 'March',
    4 => 'April',
    5 => 'May',
    6 => 'June',
    7 => 'July',
    8 => 'August',
    9 => 'September',
    10 => 'October',
    11 => 'November',
    12 => 'December'
  ];

  // Fetch data for each month
  $months = range(1, 12); // Assuming 1 to 12 represent months
  $tableCounts = [];

  foreach ($months as $month) {
    $query1 = "SELECT COUNT(*) AS countsReserved FROM baptismal_tbl WHERE MONTH(tDate) = $month";
    $query2 = "SELECT COUNT(*) AS countsReserved FROM blessing_tbl WHERE MONTH(transactDate) = $month";
    $query3 = "SELECT COUNT(*) AS countsReserved FROM communion_tbl WHERE MONTH(transactDate) = $month";
    $query4 = "SELECT COUNT(*) AS countsReserved FROM confirmation_tbl WHERE MONTH(transactDate) = $month";
    $query5 = "SELECT COUNT(*) AS countsReserved FROM funeralmass_tbl WHERE MONTH(transactDate) = $month";
    $query6 = "SELECT COUNT(*) AS countsReserved FROM wedding_tbl WHERE MONTH(transactDate) = $month";

    $result1 = mysqli_query($conn, $query1);
    $result2 = mysqli_query($conn, $query2);
    $result3 = mysqli_query($conn, $query3);
    $result4 = mysqli_query($conn, $query4);
    $result5 = mysqli_query($conn, $query5);
    $result6 = mysqli_query($conn, $query6);

    $data1 = mysqli_fetch_array($result1);
    $data2 = mysqli_fetch_array($result2);
    $data3 = mysqli_fetch_array($result3);
    $data4 = mysqli_fetch_array($result4);
    $data5 = mysqli_fetch_array($result5);
    $data6 = mysqli_fetch_array($result6);

    $tableCounts['Baptism'][] = $data1['countsReserved'];
    $tableCounts['Blessing'][] = $data2['countsReserved'];
    $tableCounts['Communion'][] = $data3['countsReserved'];
    $tableCounts['Confirmation'][] = $data4['countsReserved'];
    $tableCounts['FuneralMass'][] = $data5['countsReserved'];
    $tableCounts['Wedding'][] = $data6['countsReserved'];
  }
?>