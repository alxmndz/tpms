<?php 
  include "../php/dbconn.php";

  // Default values to the current month and year
  $defaultMonth = date('m');
  $defaultYear = date('Y');

  // Extract month and year from the selected date or use the default values
  $selectedMonth = isset($_GET['selectedMonth']) ? $_GET['selectedMonth'] : $defaultMonth;
  $selectedYear = isset($_GET['selectedYear']) ? $_GET['selectedYear'] : $defaultYear;

	$query1 = "SELECT COUNT(event) AS countReq1 FROM request WHERE event = 'Baptismal Certificate'AND MONTH(transactDate) = $selectedMonth AND YEAR(transactDate) = $selectedYear";
	$query2 = "SELECT COUNT(event) AS countReq2 FROM request WHERE event = 'Communion Certificate'AND MONTH(transactDate) = $selectedMonth AND YEAR(transactDate) = $selectedYear";
	$query3 = "SELECT COUNT(event) AS countReq3 FROM request WHERE event = 'Confirmation Certificate'AND MONTH(transactDate) = $selectedMonth AND YEAR(transactDate) = $selectedYear";
	$query4 = "SELECT COUNT(event) AS countReq4 FROM request WHERE event = 'Death Certificate'AND MONTH(transactDate) = $selectedMonth AND YEAR(transactDate) = $selectedYear";
	$query5 = "SELECT COUNT(event) AS countReq5 FROM request WHERE event = 'Marriage Certificate'AND MONTH(transactDate) = $selectedMonth AND YEAR(transactDate) = $selectedYear";

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

	$requestCounts = [$data1['countReq1'], $data2['countReq2'], $data3['countReq3'], $data4['countReq4'], $data5['countReq5']];
?>