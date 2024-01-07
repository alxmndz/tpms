<?php
    // Assume $selectedYear is the selected year; you should set this value based on user input or any other source
     $selectedYear = isset($_GET['selectedYear']) ? $_GET['selectedYear'] : $defaultYear; // Change this accordingly

    $query = $conn->query("
    SELECT 
        MONTHNAME(donatedDate) as monthname,
        SUM(amount) as totalAmount
    FROM donation
    WHERE YEAR(donatedDate) = $selectedYear
    GROUP BY MONTH(donatedDate)
    ORDER BY MONTH(donatedDate)
    ");

    foreach ($query as $data) {
        $donatedDate[] = $data['monthname'];
        $totalAmount[] = $data['totalAmount'];
    }
?>
