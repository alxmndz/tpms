<?php
include "../dbconn.php";

// Default values to the current month and year
$defaultMonth = date('m');
$defaultYear = date('Y');

// Extract month and year from the selected date or use the default values
$selectedMonth = isset($_GET['selectedMonth']) ? $_GET['selectedMonth'] : $defaultMonth;
$selectedYear = isset($_GET['selectedYear']) ? $_GET['selectedYear'] : $defaultYear;

// Construct the SQL query with the WHERE clause
$sql = "SELECT * FROM eventlist WHERE MONTH(generatedDate) = $selectedMonth AND YEAR(generatedDate) = $selectedYear";

$result = $conn->query($sql);

if ($result) {
    $totalEvents = $result->num_rows;
} else {
    echo "Error: " . $conn->error;
}
?>