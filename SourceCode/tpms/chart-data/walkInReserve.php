<?php 
  include "../php/dbconn.php";

  // Default values to the current month and year
  $defaultMonth = date('m');
  $defaultYear = date('Y');

  // Extract month and year from the selected date or use the default values
  $selectedMonth = isset($_GET['selectedMonth']) ? $_GET['selectedMonth'] : $defaultMonth;
  $selectedYear = isset($_GET['selectedYear']) ? $_GET['selectedYear'] : $defaultYear;

  $query1 = "SELECT COUNT(*) AS count FROM baptismal_tbl WHERE transactType = 'Walk-In' AND MONTH(tDate) = $selectedMonth AND YEAR(tDate) = $selectedYear";
  $query2 = "SELECT COUNT(*) AS count FROM blessing_tbl WHERE transactType = 'Walk-In' AND MONTH(transactDate) = $selectedMonth AND YEAR(transactDate) = $selectedYear";
  $query3 = "SELECT COUNT(*) AS count FROM communion_tbl WHERE transactType = 'Walk-In' AND MONTH(transactDate) = $selectedMonth AND YEAR(transactDate) = $selectedYear";
  $query4 = "SELECT COUNT(*) AS count FROM confirmation_tbl WHERE transactType = 'Walk-In' AND MONTH(transactDate) = $selectedMonth AND YEAR(transactDate) = $selectedYear";
  $query5 = "SELECT COUNT(*) AS count FROM funeralmass_tbl WHERE transactType = 'Walk-In' AND MONTH(transactDate) = $selectedMonth AND YEAR(transactDate) = $selectedYear";
  $query6 = "SELECT COUNT(*) AS count FROM wedding_tbl WHERE transactType = 'Walk-In' AND MONTH(transactDate) = $selectedMonth AND YEAR(transactDate) = $selectedYear";

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

  $counts = [$data1['count'], $data2['count'], $data3['count'], $data4['count'], $data5['count'], $data6['count']];
?>