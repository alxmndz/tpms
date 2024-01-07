<?php
  include "../../dbconn.php";

  // Assume $selectedYear is the selected year; you should set this value based on user input or any other source
  $selectedYear = isset($_GET['selectedYear']) ? $_GET['selectedYear']: $defaultYear; // Change this accordingly

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

  // Fetch data for January only
  $month = 11; // Assuming you want to fetch data for January
  $baptismCount = 0;
  $blessingCount = 0;
  $communionCount = 0;
  $confirmationCount = 0;
  $funeralMassCount = 0;
  $weddingCount = 0;

  $query1 = "SELECT COUNT(*) AS countsReserved1 FROM baptismal_tbl WHERE MONTH(tDate) = $month AND YEAR(tDate) = $selectedYear";
  $query2 = "SELECT COUNT(*) AS countsReserved2 FROM blessing_tbl WHERE MONTH(transactDate) = $month AND YEAR(transactDate) = $selectedYear";
  $query3 = "SELECT COUNT(*) AS countsReserved3 FROM communion_tbl WHERE MONTH(transactDate) = $month AND YEAR(transactDate) = $selectedYear";
  $query4 = "SELECT COUNT(*) AS countsReserved4 FROM confirmation_tbl WHERE MONTH(transactDate) = $month AND YEAR(transactDate) = $selectedYear";
  $query5 = "SELECT COUNT(*) AS countsReserved5 FROM funeralmass_tbl WHERE MONTH(transactDate) = $month AND YEAR(transactDate) = $selectedYear";
  $query6 = "SELECT COUNT(*) AS countsReserved6 FROM wedding_tbl WHERE MONTH(transactDate) = $month AND YEAR(transactDate) = $selectedYear";

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

  $baptismCountNov = $data1['countsReserved1'];
  $blessingCountNov = $data2['countsReserved2'];
  $communionCountNov = $data3['countsReserved3'];
  $confirmationCountNov = $data4['countsReserved4'];
  $funeralMassCountNov = $data5['countsReserved5'];
  $weddingCountNov = $data6['countsReserved6'];
?>