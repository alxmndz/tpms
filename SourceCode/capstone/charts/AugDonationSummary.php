<?php
    include"php/dbconn.php";

    $selectedMonth = 7;
    $selectedYear = isset($_GET['selectedYear']) ? $_GET['selectedYear'] : $defaultYear;

    // Construct the SQL query with the WHERE clause
    $sql = "SELECT SUM(amount) AS total FROM donation WHERE MONTH(donatedDate) = $selectedMonth AND YEAR(donatedDate) = $selectedYear";

    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $sum = $row['total'];

        // Format the sum with a comma for thousands separator and a peso sign.
        $formattedSumAug = '₱' . number_format($sum, 2, '.', ',');
    } else {
        $formattedSumAug = "Error: " . $conn->error;
    }
?>
