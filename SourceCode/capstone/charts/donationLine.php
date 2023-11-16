<?php
    $query = $conn->query("
    SELECT 
        MONTHNAME(donatedDate) as monthname,
        SUM(amount) as totalAmount
    FROM donation
    GROUP BY MONTH(donatedDate)
    ORDER BY MONTH(donatedDate)
    ");

    foreach ($query as $data) {
        $donatedDate[] = $data['monthname'];
        $totalAmount[] = $data['totalAmount'];
    }
?>